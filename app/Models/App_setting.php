<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_title',
        'contact',
        'email',
        'address',
        'meta_dis',
        'meta_keyword',
        'logo_img',
    ];
}
