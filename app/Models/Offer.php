<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'details',
        'created_at',

    ];
    protected $hidden  = ['created_at'];
    public $timestamps =false;
}
