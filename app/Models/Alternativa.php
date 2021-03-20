<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    use HasFactory;
    protected $fillable = ['alt_codigo', 'alt_nome','alt_correcao', 'alt_enu_codigo'];
}
