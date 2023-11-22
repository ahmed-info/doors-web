<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
class Slide extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
}
