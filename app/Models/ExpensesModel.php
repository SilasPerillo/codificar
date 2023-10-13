<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesModel extends Model
{
    protected $fillable = ['deputy_id', 'month', 'value'];
    protected $table = 'expenses';

    public function deputy()
    {
        return $this->belongsTo(DeputyModel::class, 'deputy_id', 'id');
    }
}
