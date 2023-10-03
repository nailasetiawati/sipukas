<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function DonorsCategory()
    {
        return $this->belongsTo(DonorsCategory::class, 'donor_category_id');
    }
}
