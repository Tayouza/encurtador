<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitlink extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_url',
        'new_url'
    ];
}
