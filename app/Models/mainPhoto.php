<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mainPhoto extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'alt'];
    protected $table = 'main_photos';
}
