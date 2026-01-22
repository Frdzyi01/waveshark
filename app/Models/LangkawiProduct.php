<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LangkawiProduct extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'service_category',
        'image',
        'title',
        'description',
        'price',
        'status',
    ];
}
