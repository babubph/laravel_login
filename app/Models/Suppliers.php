<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'company_name',
        'company_type',
        'name',
        'contact',
        'email',
        'address',
        'status',
    ];
}
