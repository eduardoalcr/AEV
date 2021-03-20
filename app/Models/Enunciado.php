<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enunciado extends Model
{
    use HasFactory;
    protected $fillable = ['enu_codigo', 'enu_nome','enu_mat_codigo'];
}
