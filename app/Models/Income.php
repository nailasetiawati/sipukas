<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function DonorsCategory()
    {
        return $this->belongsTo(DonorsCategory::class, 'donor_category_id');
    }
}
