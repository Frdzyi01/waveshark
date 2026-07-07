<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrateOldProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-old-products
                            {--source=auto : Source mode: "auto", "sql" (from .sql file), or "db" (from active database)}
                            {--file=database/waveshar_ventures.sql : Path to the legacy SQL backup file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate production data from legacy product tables to the new unified database structure.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('');
        $this->info('========================================');
        $this->info('WaveShark Product Migration');
        $this->info('========================================');
        $this->line('Migration Started');

        $sourceMode = $this->option('source');
        $sqlFilePath = base_path($this->option('file'));

        if ($sourceMode === 'auto') {
            if (app()->environment('production') && Schema::hasTable('langkawi_products') && DB::table('langkawi_products')->count() > 0) {
                $sourceMode = 'db';
            } else {
                $sourceMode = file_exists($sqlFilePath) ? 'sql' : 'db';
            }
        }

        $this->info("Mode Selected: " . strtoupper($sourceMode) . ($sourceMode === 'sql' ? " ({$this->option('file')})" : " (Live Production Database)"));

        $stats = [
            'destinations_created' => 0,
            'destinations_existing' => 0,
            'categories_created' => 0,
            'categories_existing' => 0,
            'products_imported' => 0,
            'products_updated' => 0,
            'products_skipped' => 0,
        ];

        // In-memory caches to prevent N+1 queries
        $destinationCache = [];
        $categoryCache = [];

        $tablesToProcess = [
            [
                'original' => 'langkawi_products',
                'temp' => 'temp_legacy_langkawi_products',
                'name' => 'Langkawi',
                'slug' => 'langkawi'
            ],
            [
                'original' => 'sabah_products',
                'temp' => 'temp_legacy_sabah_products',
                'name' => 'Sabah',
                'slug' => 'sabah'
            ],
            [
                'original' => 'st_john_products',
                'temp' => 'temp_legacy_st_john_products',
                'name' => 'St John Islands',
                'slug' => 'stjohnislands'
            ],
        ];

        try {
            if ($sourceMode === 'sql') {
                if (!file_exists($sqlFilePath)) {
                    $this->error("SQL file not found at: {$sqlFilePath}");
                    return Command::FAILURE;
                }

                $this->line('Importing temporary tables from SQL file...');
                foreach ($tablesToProcess as $meta) {
                    if (!$this->importTableFromSql($sqlFilePath, $meta['original'], $meta['temp'])) {
                        $this->warn("Failed to import temporary table for [{$meta['original']}] from SQL file.");
                    }
                }
            }

            DB::transaction(function () use (&$stats, &$destinationCache, &$categoryCache, $sourceMode, $tablesToProcess) {
                foreach ($tablesToProcess as $meta) {
                    $tableName = $sourceMode === 'sql' ? $meta['temp'] : $meta['original'];
                    $this->line("Processing {$meta['name']} (from table: {$tableName})...");

                    $this->processLegacyTable(
                        tableName: $tableName,
                        destinationName: $meta['name'],
                        destinationSlug: $meta['slug'],
                        stats: $stats,
                        destinationCache: $destinationCache,
                        categoryCache: $categoryCache
                    );
                }
            });

            $this->line('');
            $this->info('----------------------------------------');
            $this->line("Destination Created  : {$stats['destinations_created']}");
            $this->line("Destination Existing : {$stats['destinations_existing']}");
            $this->line("Category Created     : {$stats['categories_created']}");
            $this->line("Category Existing    : {$stats['categories_existing']}");
            $this->line("Products Imported    : {$stats['products_imported']}");
            $this->line("Products Updated     : {$stats['products_updated']}");
            $this->line("Products Skipped     : {$stats['products_skipped']}");
            $this->info('========================================');
            $this->info('Migration Completed');
            $this->info('Migration Finished Successfully');
            $this->info('========================================');
            $this->line('');

            return Command::SUCCESS;

        } catch (\Throwable $e) {
            $this->error('An error occurred during migration. All changes have been rolled back!');
            $this->error('Error details: ' . $e->getMessage());
            $this->line($e->getTraceAsString());

            return Command::FAILURE;

        } finally {
            // Clean up temporary tables if in SQL mode
            if ($sourceMode === 'sql') {
                $this->line('Cleaning up temporary database tables...');
                foreach ($tablesToProcess as $meta) {
                    Schema::dropIfExists($meta['temp']);
                }
            }
        }
    }

    /**
     * Import a specific table from the SQL dump into a MySQL temporary staging table.
     */
    protected function importTableFromSql(string $filePath, string $originalTable, string $tempTable): bool
    {
        Schema::dropIfExists($tempTable);

        $handle = fopen($filePath, 'r');
        if (!$handle) {
            return false;
        }

        $inCreate = false;
        $inInsert = false;
        $createSql = '';
        $insertSql = '';

        while (($line = fgets($handle)) !== false) {
            if (!$inCreate && preg_match('/CREATE\s+TABLE\s+`?' . preg_quote($originalTable, '/') . '`?/i', $line)) {
                $inCreate = true;
                $line = preg_replace('/CREATE\s+TABLE\s+`?' . preg_quote($originalTable, '/') . '`?/i', "CREATE TABLE `{$tempTable}`", $line);
            }

            if ($inCreate) {
                $createSql .= $line;
                if (preg_match('/;\s*$/', $line)) {
                    $inCreate = false;
                    try {
                        DB::statement($createSql);
                    } catch (\Throwable $e) {
                        $this->error("Error creating table {$tempTable}: " . $e->getMessage());
                        fclose($handle);
                        return false;
                    }
                }
                continue;
            }

            if (!$inInsert && preg_match('/INSERT\s+INTO\s+`?' . preg_quote($originalTable, '/') . '`?/i', $line)) {
                $inInsert = true;
                $line = preg_replace('/INSERT\s+INTO\s+`?' . preg_quote($originalTable, '/') . '`?/i', "INSERT INTO `{$tempTable}`", $line);
            }

            if ($inInsert) {
                $insertSql .= $line;
                if (preg_match('/;\s*$/', $line)) {
                    $inInsert = false;
                    try {
                        DB::statement($insertSql);
                    } catch (\Throwable $e) {
                        $this->error("Error inserting into {$tempTable}: " . $e->getMessage());
                    }
                    $insertSql = '';
                }
                continue;
            }
        }

        fclose($handle);

        return Schema::hasTable($tempTable);
    }

    /**
     * Process a legacy product table in read-only mode using cursor/chunking.
     */
    protected function processLegacyTable(
        string $tableName,
        string $destinationName,
        string $destinationSlug,
        array &$stats,
        array &$destinationCache,
        array &$categoryCache
    ): void {
        if (!Schema::hasTable($tableName)) {
            $this->warn("Table [{$tableName}] does not exist. Skipping...");
            return;
        }

        if (!isset($destinationCache[$destinationSlug])) {
            $destination = Destination::firstOrCreate(
                ['slug' => $destinationSlug],
                ['name' => $destinationName]
            );

            if ($destination->wasRecentlyCreated) {
                $stats['destinations_created']++;
            } else {
                $stats['destinations_existing']++;
            }

            $destinationCache[$destinationSlug] = $destination;
        }

        $destination = $destinationCache[$destinationSlug];

        $query = DB::table($tableName)->orderBy('id');

        foreach ($query->cursor() as $row) {
            if (empty($row->title) || empty($row->service_category)) {
                $stats['products_skipped']++;
                continue;
            }

            $catSlug = $row->service_category;
            $cacheKey = $destination->id . '_' . $catSlug;

            if (!isset($categoryCache[$cacheKey])) {
                $catName = $this->getPrettyCategoryName($catSlug);

                $category = Category::firstOrCreate(
                    [
                        'destination_id' => $destination->id,
                        'slug' => $catSlug,
                    ],
                    [
                        'name' => $catName,
                    ]
                );

                if ($category->wasRecentlyCreated) {
                    $stats['categories_created']++;
                } else {
                    $stats['categories_existing']++;
                }

                $categoryCache[$cacheKey] = $category;
            }

            $category = $categoryCache[$cacheKey];

            $product = Product::updateOrCreate(
                [
                    'category_id' => $category->id,
                    'title' => $row->title,
                ],
                [
                    'description' => $row->description,
                    'price' => $row->price,
                    'image' => $row->image,
                    'status' => $row->status ?? 'available',
                    'created_at' => $row->created_at ?? now(),
                    'updated_at' => $row->updated_at ?? now(),
                ]
            );

            if ($product->wasRecentlyCreated) {
                $stats['products_imported']++;
            } else {
                $stats['products_updated']++;
            }
        }
    }

    /**
     * Map slug to a cleaner category display name.
     */
    protected function getPrettyCategoryName(string $slug): string
    {
        $names = [
            'car-rental' => 'Car Rental',
            'island-hopping' => 'Island Hopping',
            'airport-transfer' => 'Airport Transfer',
            'mangrove-tour' => 'Mangrove Tour',
            'jetski' => 'Jet Ski',
            'sunset-cruise' => 'Sunset Cruise',
            'sunset-dinner-cruise' => 'Sunset Dinner Cruise',
            'fishing-charter' => 'Fishing Charter',
            'mount-climbing' => 'Mount Climbing',
            'stjohn-car-rental' => 'LEVIATHAN 8',
            'stjohn-island-hopping' => 'OCEAN DIVA',
            'stjohn-airport-transfer' => 'SG YACHT',
            'stjohn-mangrove-tour' => 'Mangrove Tour',
            'stjohn-jetski' => 'Jet Ski',
            'stjohn-sunset-cruise' => 'Sunset Cruise',
        ];

        if (isset($names[$slug])) {
            return $names[$slug];
        }

        $cleaned = preg_replace('/^stjohn-/', '', $slug);
        return ucwords(str_replace('-', ' ', $cleaned));
    }
}
