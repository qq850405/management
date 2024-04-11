<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPhoto extends Model
{
    use HasFactory;

    ##test 
    protected $fillable = ['filename', 'alt'];
    protected $table = 'main_photos';
}
