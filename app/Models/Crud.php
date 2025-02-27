<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'controller_path',
        'environment',
        'view_path',
        'route_param',
        'fields',
    ];
}
