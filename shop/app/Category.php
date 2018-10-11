<?php

namespace App;
use App\Product;
use App\user;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
