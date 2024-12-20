<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
        'image',
        'name',
        'slug'
    ];

    public function BoardingHouses(){
        return $this->hasMany(BoardingHouse::class);
    }
}
