<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'price',
        'details_en',
        'details_ar',
        'photo',
        'created_at',
    ];
    protected $hidden  = ['created_at'];
    public $timestamps =false;
}
