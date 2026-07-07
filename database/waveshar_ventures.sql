-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Jul 2026 pada 18.09
-- Versi server: 11.4.12-MariaDB
-- Versi PHP: 8.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waveshar_ventures`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('waveshark-travel-cache-admil@gmail.com|183.171.71.238', 'i:1;', 1782199841),
('waveshark-travel-cache-admil@gmail.com|183.171.71.238:timer', 'i:1782199841;', 1782199841),
('waveshark-travel-cache-admin@example.com|103.18.34.197', 'i:1;', 1780461085),
('waveshark-travel-cache-admin@example.com|103.18.34.197:timer', 'i:1780461085;', 1780461085),
('waveshark-travel-cache-admin@gmail.com|2001:448a:2098:1327:145c:bca0:1076:bdbd', 'i:3;', 1773836894),
('waveshark-travel-cache-admin@gmail.com|2001:448a:2098:1327:145c:bca0:1076:bdbd:timer', 'i:1773836894;', 1773836894),
('waveshark-travel-cache-admin@wavesharktravel.com|103.18.34.197', 'i:1;', 1772528176),
('waveshark-travel-cache-admin@wavesharktravel.com|103.18.34.197:timer', 'i:1772528176;', 1772528176),
('waveshark-travel-cache-admin@wavesharktravel.com|103.18.34.237', 'i:5;', 1782196149),
('waveshark-travel-cache-admin@wavesharktravel.com|103.18.34.237:timer', 'i:1782196149;', 1782196149),
('waveshark-travel-cache-admin@wavesharktravel.com|183.171.97.215', 'i:4;', 1773843708),
('waveshark-travel-cache-admin@wavesharktravel.com|183.171.97.215:timer', 'i:1773843708;', 1773843708),
('waveshark-travel-cache-admin@wavesharktravel.com|2001:448a:2098:665e:9564:e216:195e:e6e4', 'i:1;', 1783248083),
('waveshark-travel-cache-admin@wavesharktravel.com|2001:448a:2098:665e:9564:e216:195e:e6e4:timer', 'i:1783248083;', 1783248083),
('waveshark-travel-cache-adminwaveshark@gmail.com|183.171.70.1', 'i:2;', 1772547933),
('waveshark-travel-cache-adminwaveshark@gmail.com|183.171.70.1:timer', 'i:1772547933;', 1772547933),
('waveshark-travel-cache-riyan@gmail.com|2001:448a:2098:1327:145c:bca0:1076:bdbd', 'i:3;', 1773836882),
('waveshark-travel-cache-riyan@gmail.com|2001:448a:2098:1327:145c:bca0:1076:bdbd:timer', 'i:1773836882;', 1773836882);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_services`
--

CREATE TABLE `landing_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_services`
--

INSERT INTO `landing_services` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'images/services/1769194982.jpg', 'JET SKI', 'Jet ski adventures in Langkawi range from short rentals. Travelers can operate high-performance watercraft (often SeaDoo or Yamaha models) after a safety briefing, with options to ride solo or with a partner.', '2026-01-23 12:03:02', '2026-01-28 06:43:22'),
(2, 'images/services/1769195510.jpg', 'AIRPORT TRANSFER', 'Langkawi airport transfer services provide a seamless transition between Langkawi International Airport (LGK) and your accommodation.', '2026-01-23 12:11:50', '2026-01-28 06:41:47'),
(3, 'images/services/1769195528.jpg', 'SUNSET CRUISE', 'A Langkawi sunset cruise offers an enchanting evening on the Andaman Sea, where you can glide past majestic limestone karsts and silhouetted islands as the horizon ignites in a breathtaking display of gold and crimson.', '2026-01-23 12:12:08', '2026-01-28 06:47:08'),
(4, 'images/services/1769195555.jpg', 'MANGROVE TOUR', 'Mangrove tours in Langkawi primarily center around the Kilim Karst Geoforest Park, a UNESCO-recognized site featuring a 500-million-year-old geological landscape of limestone formations and ancient coral.', '2026-01-23 12:12:35', '2026-01-28 06:44:09'),
(5, 'images/services/1769652780.jpg', 'ISLAND HOPPING', 'Langkawi island hopping is the island\'s most iconic nautical adventure, typically spanning 3.5 to 4 hours as it whisks travelers across the turquoise waters of the Andaman Sea to explore the southern archipelago of the UNESCO Global Geopark.', '2026-01-23 12:18:22', '2026-01-28 19:13:00'),
(6, 'images/services/1782200188.jpg', 'ISLAND B', 'Introducing Island B, Singapore’s newest 100-foot superyacht — a masterpiece of modern luxury and Italian design. Perfect for both private and corporate events, Island B can host up to 50 guests in ultimate comfort. With spacious decks, elegant interiors, and premium amenities including BBQ dining, water toys, and karaoke, this stunning vessel promises an unforgettable experience on the waters of Singapore.', '2026-06-23 00:36:28', '2026-06-23 00:36:28'),
(7, 'images/services/1782200190.jpg', 'ISLAND B', 'Introducing Island B, Singapore’s newest 100-foot superyacht — a masterpiece of modern luxury and Italian design. Perfect for both private and corporate events, Island B can host up to 50 guests in ultimate comfort. With spacious decks, elegant interiors, and premium amenities including BBQ dining, water toys, and karaoke, this stunning vessel promises an unforgettable experience on the waters of Singapore.', '2026-06-23 00:36:30', '2026-06-23 00:36:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `langkawi_products`
--

CREATE TABLE `langkawi_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `langkawi_products`
--

INSERT INTO `langkawi_products` (`id`, `service_category`, `image`, `title`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'car-rental', '/images/langkawi-products/20260205105851.jpeg', 'PERODUA AXIA', 'Please be advised that prices may vary depending on the season.', 'RM80', 'available', '2026-01-22 10:47:54', '2026-02-05 03:58:51'),
(2, 'jetski', '/images/langkawi-products/20260122181538.jpg', 'JET SKI FUN RIDE', 'A Jet Ski Fun Ride is a high-speed, heart-pumping water adventure designed for those who want a quick burst of adrenaline without the commitment of a full guided tour. Unlike longer excursions that focus on sightseeing, a fun ride is all about speed, freedom, and play in a designated open-water zone.', 'RM150', 'available', '2026-01-22 11:15:38', '2026-01-28 07:35:23'),
(3, 'jetski', '/images/langkawi-products/20260318084333.jpeg', 'JET SKI TOUR', 'A jet ski tour is an exhilarating guided adventure that combines high-speed thrills with scenic exploration of coastal landscapes, hidden islands, and marine ecosystems.', 'RM500', 'available', '2026-01-28 05:42:21', '2026-03-18 01:43:33'),
(4, 'jetski', '/images/langkawi-products/20260318084304.jpeg', 'JET SKI PULAU TUBA', 'A jet ski tour to Pulau Tuba offers a unique blend of thrilling high-speed adventure, immersion in authentic local culture, and exploration of untouched natural landscapes, away from the main tourist crowds.', 'RM500', 'available', '2026-01-28 05:46:29', '2026-03-18 01:43:04'),
(6, 'car-rental', '/images/langkawi-products/20260205105919.jpeg', 'PROTON PERSONA', 'Please be advised that prices may vary depending on the season.', 'RM90', 'available', '2026-01-28 05:59:56', '2026-02-05 03:59:19'),
(7, 'car-rental', '/images/langkawi-products/20260205110022.jpeg', 'TOYOTA VIOS', 'Please be advised that prices may vary depending on the season.', 'RM120', 'available', '2026-01-28 06:01:13', '2026-02-05 04:00:22'),
(8, 'car-rental', '/images/langkawi-products/20260205105951.jpeg', 'HONDA CIVIC 1.5TC', 'Please be advised that prices may vary depending on the season.', 'RM180', 'available', '2026-01-28 06:03:06', '2026-02-05 03:59:51'),
(9, 'sunset-cruise', '/images/langkawi-products/20260318084234.jpeg', 'WAVESHARK II (PRIVATE)', 'Get Mesmerized by the Perfect Blend of High-Octane Fun and Pure Coastal Elegance on Your Own Private Charter.', 'RM2500 (10 PAX, 4 HOURS) ADD HOURS: RM500/HRS', 'available', '2026-01-28 06:10:48', '2026-03-18 07:45:26'),
(10, 'car-rental', '/images/langkawi-products/20260129021230.jpeg', 'TOYOTA CAMRY', 'Please be advised that prices may vary depending on the season.', 'RM170', 'available', '2026-01-28 06:22:41', '2026-01-28 19:12:30'),
(11, 'island-hopping', '/images/langkawi-products/20260318083145.jpeg', 'ISLAND HOPPING PRIVATE', 'A private island hopping tour in Langkawi, offers an exclusive 4-hour journey.', 'RM450', 'available', '2026-01-28 06:31:59', '2026-03-18 01:31:45'),
(12, 'island-hopping', '/images/langkawi-products/20260318083117.jpeg', 'ISLAND HOPPING SHARING', 'A shared island hopping tour in Langkawi provides a budget-friendly 3.5 to 4-hour group adventure.', 'RM45 (Adult) RM35 (Child)', 'available', '2026-01-28 06:34:10', '2026-03-18 01:31:17'),
(13, 'airport-transfer', '/images/langkawi-products/20260129042424.jpeg', 'AIRPORT TRANSFER (SEDAN CAR)', 'IN AND AROUND THE CENANG VICINITY.', 'RM100', 'available', '2026-01-28 21:24:24', '2026-01-28 21:29:38'),
(14, 'airport-transfer', '/images/langkawi-products/20260129042720.jpeg', 'AIRPORT TRANSFER (SEDAN CAR)', 'KUAH AND THE NEARBY AREA.', 'RM120', 'available', '2026-01-28 21:27:20', '2026-01-28 21:34:19'),
(15, 'airport-transfer', '/images/langkawi-products/20260129043220.jpeg', 'AIRPORT TRANSFER (SEDAN CAR)', 'IN AND AROUND THE TANJUNG RHU VACINITY.', 'RM120', 'available', '2026-01-28 21:32:20', '2026-01-28 21:33:56'),
(16, 'airport-transfer', '/images/langkawi-products/20260129043327.jpeg', 'AIRPORT TRANSFER (SEDAN CAR)', 'IN AND AROUND THE DATAI VACINITY.', 'RM250', 'available', '2026-01-28 21:33:27', '2026-01-28 21:33:27'),
(18, 'sunset-cruise', '/images/langkawi-products/20260318085514.jpeg', 'FUN FISHING', 'Discover the serenity of the water and find your flow with a peaceful escape into nature’s most rewarding hobby.', 'RM2500 (10 PAX, 4 HOURS) ADD HOURS: RM500/HRS', 'available', '2026-03-18 01:55:14', '2026-03-18 07:46:51'),
(19, 'sunset-cruise', '/images/langkawi-products/20260318090502.jpeg', 'E-FOIL', 'Elevate your coastal escape with a private E-Foil excursion, designed to provide a sophisticated, high-performance adventure for those seeking the ultimate thrill on the water. Our professional E-Foil charters combine expert-led instruction with premium equipment, ensuring a safe and exhilarating flight over the ocean for riders of all skill levels.', 'RM3500 (10 PAX, 4 HOURS) ADD HOURS: RM500/HRS', 'available', '2026-03-18 02:05:02', '2026-03-18 07:44:17'),
(20, 'sunset-cruise', '/images/langkawi-products/20260318092002.jpeg', 'PRIVATE TRANSFERS: YOUR LOCATION OF CHOICE', 'Our professional private charters offer the perfect balance of high-speed day excursions and luxurious overnight voyages, providing seamless travel to the region’s most exclusive coastal destinations.', 'Contact us for enquiries', 'available', '2026-03-18 02:19:09', '2026-03-18 02:33:12'),
(21, 'mangrove-tour', '/images/langkawi-products/20260318142907.jpeg', 'MANGROVE TOUR (PRIVATE)', 'The \"Mangrove Island\" of Langkawi refers to the Kilim Karst Geoforest Park, a UNESCO-listed site on the island\'s northeast coast. It is a massive ecosystem of ancient limestone formations (some up to 490 million years old) and lush mangrove forests that act as a nursery for marine life and a home for diverse wildlife. Top Attractions: Bat Cave (Gua Kelawar), Eagle Watching & Feeding, Crocodile Cave (Gua Buaya), Floating Fish Farm & Restaurant and Gorilla Mountain.', 'RM400', 'available', '2026-03-18 07:29:07', '2026-03-18 07:44:07'),
(22, 'mangrove-tour', '/images/langkawi-products/20260318143159.jpeg', 'MANGROVE TOUR (SHARING)', 'The \"Mangrove Island\" of Langkawi refers to the Kilim Karst Geoforest Park, a UNESCO-listed site on the island\'s northeast coast. It is a massive ecosystem of ancient limestone formations (some up to 490 million years old) and lush mangrove forests that act as a nursery for marine life and a home for diverse wildlife. Top Attractions: Bat Cave (Gua Kelawar), Eagle Watching & Feeding, Crocodile Cave (Gua Buaya), Floating Fish Farm & Restaurant and Gorilla Mountain.', 'RM140 (Adult) RM110 (Children)', 'available', '2026-03-18 07:31:59', '2026-03-18 07:43:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_19_171839_create_services_table', 2),
(5, '2026_01_19_171841_create_tour_packages_table', 2),
(6, '2026_01_22_163603_create_products_table', 3),
(7, '2026_01_22_173231_create_langkawi_products_table', 4),
(8, '2026_01_22_181958_create_sabah_products_table', 5),
(9, '2026_01_22_181959_create_st_john_products_table', 5),
(10, '2026_01_22_182723_create_sabah_products_table', 6),
(11, '2026_01_22_182724_create_st_john_products_table', 6),
(12, '2026_01_23_185818_create_landing_services_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `service_category`, `title`, `description`, `price`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'car-rental', 'Economy Compact (Axia/Myvi)', 'Perfect for couples or small families. Fuel efficient and easy to park.', 120.00, 'images/car-rental.jpeg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(2, 'car-rental', 'Sedan Comfort (Vios/City)', 'Comfortable ride for 4-5 passengers with ample luggage space.', 180.00, 'images/car-rental.jpeg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(3, 'car-rental', 'MPV Family (Innova/Serena)', 'Spacious 7-seater for larger groups to explore together.', 250.00, 'images/car-rental.jpeg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(4, 'car-rental', 'Luxury SUV (X70/CRV)', 'Travel in style and comfort with premium features.', 350.00, 'images/car-rental.jpeg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(5, 'island-hopping', 'Standard Island Hopping (Shared)', 'Visit Pregnant Maiden Island, Eagle Feeding, and Beras Basah Island. 4 hours tour.', 40.00, 'images/islands-hopping.jpg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(6, 'island-hopping', 'Private Boat Charter (8 Pax)', 'Exclusive boat for your group. Flexible timing and privacy guaranteed.', 450.00, 'images/islands-hopping.jpg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(7, 'airport-transfer', 'Airport to Hotel (Pantai Cenang)', 'One-way transfer from LGK Airport to Pantai Cenang area.', 50.00, 'images/airport-transfer.jpg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(8, 'mangrove-tour', 'Kilim Geoforest Park (Shared)', 'Explore the ancient mangroves, bat cave, and fish farm.', 90.00, 'images/mangrove-tour.jpg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(9, 'jetski', 'Mega Water Sports Tour A (4 Hours)', 'The ultimate island adventure. Visit 8 islands including Dayang Bunting.', 750.00, 'images/jetski.jpg', '2026-01-22 09:37:37', '2026-01-22 09:37:37'),
(10, 'sunset-cruise', 'Tropical Charters Sunset Cruise', 'Includes BBQ dinner, salt water jacuzzi style net, and free flow drinks.', 220.00, 'images/sunset.jpg', '2026-01-22 09:37:37', '2026-01-22 09:37:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sabah_products`
--

CREATE TABLE `sabah_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sabah_products`
--

INSERT INTO `sabah_products` (`id`, `service_category`, `image`, `title`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 'sunset-dinner-cruise', '/images/sabah-products/20260304110638.jpeg', 'North Borneo Cruise', 'Experience a romantic sunset dinner cruise with stunnning sea & mountain view, perfect for couples and families. Enjoy a delicious buffet and live band as you sail past  sparkling city lights along the waterfront.', 'RM365', 'available', '2026-03-03 08:46:45', '2026-03-04 04:06:38'),
(4, 'mount-climbing', '/images/sabah-products/20260303160857.jpg', 'Double Decker Pontoon Boat', 'Double-decker pontoon boat experience packed with fun water activities. Enjoy a lively party pool and thrilling rides like banana boat, flying fish, sea trampoline, and mega ducky — perfect for groups, celebrations, and unforgettable moments on the water.', 'RM1688', 'available', '2026-03-03 09:08:57', '2026-03-03 09:08:57'),
(5, 'mount-climbing', '/images/sabah-products/20260303161843.jpg', '28ft Chaparral Cruiser', 'Cruiser experience with exciting water activities for all ages. Enjoy the party pool and adrenaline-filled rides like banana boat, flying fish, sea trampoline, and mega ducky — perfect for fun, laughter, and unforgettable moments at sea.', 'RM1988 ( 8pax 3hr45min )', 'available', '2026-03-03 09:18:43', '2026-03-03 09:24:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `page`, `number`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 'sabah', '01', 'test sabah', 'test sabahtest sabahtest sabahtest sabahtest sabahtest sabahtest sabahtest sabahtest sabah', '2026-01-19 10:38:02', '2026-01-22 09:58:51'),
(4, 'stjohnislands', '01', 'test st john islands', 'test st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islandstest st john islands', '2026-01-19 10:40:20', '2026-01-22 09:58:51'),
(5, 'langkawi', '01', 'test test test lengkawi', 'test test test lengkawitest test test lgkawitest test test lengkawitest test test lengkawi', '2026-01-19 10:45:40', '2026-01-22 09:58:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_john_products`
--

CREATE TABLE `st_john_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `st_john_products`
--

INSERT INTO `st_john_products` (`id`, `service_category`, `image`, `title`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 'stjohn-car-rental', '/images/stjohn-products/20260318094706.jpeg', 'LEVIATHAN 8 (WEEKDAYS) Monday - Thursday', 'The Leviathan 8 is a 105ft luxury superyacht designed to deliver a premier maritime experience, featuring a spacious flybridge with a deck Jacuzzi and a professional crew dedicated to unforgettable private celebrations.\r\n\r\nTake advantage of our EXCLUSIVE PROMOTIONAL RATES for all booking untill 30 April.', '2870 (10 PAX, 4 HRS)', 'available', '2026-01-23 11:34:52', '2026-03-18 05:29:12'),
(3, 'stjohn-car-rental', '/images/stjohn-products/20260318100254.jpeg', 'LEVIATHAN 8 (WEEKEND) Friday - Sunday', 'The Leviathan 8 is a 105ft luxury superyacht designed to deliver a premier maritime experience, featuring a spacious flybridge with a deck Jacuzzi and a professional crew dedicated to unforgettable private celebrations.\r\n\r\nTake advantage of our EXCLUSIVE PROMOTIONAL RATES for all bookings untill 30 April.', '3770 (10 PAX, 4 HRS)', 'available', '2026-03-18 03:02:54', '2026-03-18 05:29:07'),
(4, 'stjohn-island-hopping', '/images/stjohn-products/20260318102858.jpeg', 'OCEAN DIVA (WEEKDAYS) Monday - Friday', 'The Ocean Diva is a premier Lagoon 450 sailing catamaran that offers a perfect blend of luxury and space, accommodating up to 27 guests for unforgettable private celebrations and corporate events in Singapore. \r\n\r\nTake advantage of our EXCLUSIVE PROMOTIONAL RATES for all bookings untill 30 April.', '1520 (10 PAX, 4 HRS)', 'available', '2026-03-18 03:28:58', '2026-03-18 05:29:00'),
(5, 'stjohn-island-hopping', '/images/stjohn-products/20260318103428.jpeg', 'OCEAN DIVA (WEEKEND) Saturday - Sunday', 'The Ocean Diva is a premier Lagoon 450 sailing catamaran that offers a perfect blend of luxury and space, accommodating up to 27 guests for unforgettable private celebrations and corporate events in Singapore.\r\n\r\nTake advantage of our EXCLUSIVE PROMOTIONAL RATES for all bookings untill 30 April.', '1900 (10 PAX, 4 HRS) EXTRA PAX: $80 / EXTRA HOURS: $350', 'available', '2026-03-18 03:34:28', '2026-03-18 05:28:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tour_packages`
--

CREATE TABLE `tour_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tour_packages`
--

INSERT INTO `tour_packages` (`id`, `page`, `title`, `description`, `price`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'langkawi', 'test package 1', 'test test test test langkawai ejnaehjnea', '10000', 'tour_packages/b0wfr4G3MuzadXOc9HlX2SMRNoj44SH7WMRpFjnE.jpg', '2026-01-19 10:46:43', '2026-01-22 09:58:51'),
(3, 'langkawi', 'tour beach', 'tour', '5000', 'tour_packages/zSDsD6JafOw5Vz1MjVyZY2HS41oN0JbpxtP4sJpf.jpg', '2026-01-21 07:38:41', '2026-01-22 09:58:51'),
(4, 'langkawi', 'Jetski', 'Jeksi di langkawi', '50000', 'tour_packages/N9mXXXDzQZDwfhYV92C8wzarxgaDNklLSfEP1Eqt.jpg', '2026-01-21 10:40:48', '2026-01-22 09:58:51'),
(5, 'sabah', 'test', 'test', '2000', 'tour_packages/TurRlyzkUcfNSIkAWCY2gnuejbJcfiBZWNR4J4ny.jpg', '2026-01-21 11:02:17', '2026-01-22 09:58:51'),
(6, 'sabah', 'test 223', 'dsgad', '10000', 'tour_packages/x7K0Rxf03yZgHvCOi28FVlfDTioN3wUWryOvTCxM.jpg', '2026-01-21 11:02:38', '2026-01-22 09:58:51'),
(7, 'stjohnislands', 'test john', 'heda', '29999', 'tour_packages/oHKE2521LPmA8RfseXEL9ZPTD43hU71EIrHQPeDC.jpg', '2026-01-21 11:03:50', '2026-01-22 09:58:51'),
(8, 'stjohnislands', 'sdsda', 'dsasdas', '22222', 'tour_packages/YCP7bxKeueB2Hpedr1bmJdoiUwJgaXRgsYrjjNOd.jpg', '2026-01-21 11:04:02', '2026-01-22 09:58:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'riyan', 'admin@gmail.com', NULL, '$2y$12$TZK/kKTN/AWkl7Puq1UhheFl/I7TWZOR1gUODvacM./Z7/FcEueCu', NULL, '2026-01-19 10:26:03', '2026-01-19 10:26:03'),
(2, 'riyan', 'riyan@gmail.com', NULL, '$2y$12$r8Zq7LWKdJjm2iy/3SAqXOcERpnI95Q6eyBsLcKbMA1t0WSRXdu/2', NULL, '2026-01-22 10:22:24', '2026-01-22 10:22:24'),
(3, 'Admin', 'admin-waveshark@gmail.com', NULL, '$2y$12$Yb2qG9XDh93YuYs33h8GKu18WYqL/XX8bt9QToxi0RDnp553n/tn6', 'fo2qxBGIaJijkentbe7hS26KHiUgaJpRFxRvWqWyOpd8EOP3SuyFTn1HcNUe', '2026-01-27 05:40:11', '2026-01-27 05:40:11'),
(4, 'riyan', 'riyanfirdzi@gmail.com', NULL, '$2y$12$EzlSEyKQdrctz4uxcsAON.cFDYSm1szf1dDKI13M4c8L3uXJYo9Fa', NULL, '2026-03-03 01:56:30', '2026-03-03 01:56:30'),
(5, 'admin', 'adminwavesharktravel@gmail.com', NULL, '$2y$12$XSBJHZKy0QKGOysjEAb2rOSXENQxG2kFJeMe4wgke0INEQ1NVcISC', 'BhG61zFzKkF9U46pYgNcVamantUuXkYOizZVx9YiFJ8bpflLITQVU5h0MjfI', '2026-03-03 07:17:39', '2026-03-03 07:17:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_services`
--
ALTER TABLE `landing_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `langkawi_products`
--
ALTER TABLE `langkawi_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_service_category_index` (`service_category`);

--
-- Indeks untuk tabel `sabah_products`
--
ALTER TABLE `sabah_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `st_john_products`
--
ALTER TABLE `st_john_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tour_packages`
--
ALTER TABLE `tour_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `landing_services`
--
ALTER TABLE `landing_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `langkawi_products`
--
ALTER TABLE `langkawi_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sabah_products`
--
ALTER TABLE `sabah_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `st_john_products`
--
ALTER TABLE `st_john_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tour_packages`
--
ALTER TABLE `tour_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
