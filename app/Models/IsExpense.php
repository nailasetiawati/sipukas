<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsExpense extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ExpenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
