<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{


    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        'dateFrom'
    ];


    public function category()
{
return $this->belongsTo(Category::class);
}

    public static $rules = array(
    'first_name' => 'required',
    'last_name' => 'required',
    'gender' => 'required',
    'email' => 'required',
    'tel' => 'required',
    'address' => 'required',
    'building' => 'required',
    'detail' => 'required',

  );

  public function getDetail()
  {
    $txt = 'ID:' . $this->id . ' ' . $this->first_name .   $this->last_name .   $this->gender . $this->email . $this->tel . $this->address . $this->building . $this->detail;
    return $txt;
  }
  public function book()
  {
    return $this->hasOne('App\Models\Book');
  }
  public function books()
  {
    return $this->hasMany('App\Models\Book');
  }




public function scopeKeywordSearch(Builder $query, $keyword,$keyword_gender ,$dateFrom)
{
    if ($keyword) {
        $query->where('first_name', 'like', "%{$keyword}%")
              ->orWhere('last_name', 'like', "%{$keyword}%")
              ->orWhere('email', 'like', "%{$keyword}%");
    }

    if ($keyword_gender) {
        $query->orWhere('gender', '=', $keyword_gender);
    }

    if ($dateFrom) {
        $query->whereDate('created_at', $dateFrom);
    }


      return $query;

    }


    public function scopeCategorySearch(Builder $query, $category_id)
    {
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        return $query;
    }
}