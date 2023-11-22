<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Customer;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
        protected $primaryKey = 'prodID';
protected $casts = [
        'is_admin' => true,
    ];
        protected $appends = ["favorite"];
public function getFavoriteAttribute() {
         return 2;
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','subID');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'favorites','prodID');
    }


}
