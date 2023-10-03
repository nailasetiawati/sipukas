<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorsCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Income()
    {
        return $this->hasMany(Income::class);
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
