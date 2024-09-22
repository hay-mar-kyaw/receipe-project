<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //a category has many receipes
    public function receipes(){
        return $this->hasMany(Receipe::class);
    }
}
