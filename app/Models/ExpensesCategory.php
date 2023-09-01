<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function IsExpenses()
    {
        return $this->hasMany(IsExpenses::class);
    }
}
