<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filmekle extends Model
{
    protected $table = 'filmler';

    protected $fillable = [
        'film_adi',
        'kategori',
    ];
    use HasFactory;
}
