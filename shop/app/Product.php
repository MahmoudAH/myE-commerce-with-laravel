<?php

namespace App;
use Laravel\Scout\Searchable;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;
    protected $fillable = ['quantity'];
   /* protected $fillable = [
        'name', 'details', 'price','description',
        'featured','image',
    ];*/
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function presentPrice()
    {
      return '$'.number_format($this->price / 100, 2);

         }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

}
