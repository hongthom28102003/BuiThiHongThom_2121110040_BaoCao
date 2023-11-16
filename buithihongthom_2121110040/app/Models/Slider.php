<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = '2121110040_slider';

    protected $fillable = [
        'name',
        'link',
        'sort_order',
        'position',
        'created_by',
        'updated_by', 
    ];
}
