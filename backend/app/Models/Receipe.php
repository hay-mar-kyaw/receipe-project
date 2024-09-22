<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    use HasFactory;

    //a receipe has a category

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query,$filter){

        $query->when($filter['category'] ?? false, function($query, $filter){
            $query->whereHas('category', function($catQuery) use($filter)
                {
                    $catQuery->where('name',$filter);
                });
        });
    }
}
