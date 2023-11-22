<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Slide;
class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'subID';

    function category() {
        return $this->belongsTo(Category::class,'category_id','cateID');
    }

    public function slide()
    {
        return $this->hasOne(Slide::class);
    }

}
