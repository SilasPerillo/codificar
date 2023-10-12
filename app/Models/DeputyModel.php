<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeputyModel extends Model
{
    protected $fillable = ['id', 'nome'];
    protected $table = 'deputies';
}
