<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;
  use HasFactory;

  protected $guarded = [];

  // protected $table = 'products';
  // protected $fillable = [
  //   'category_id',
  //   'product_name',
  //   'product_short_description',
  //   'product_long_description',
  //   'product_price',
  //   'product_quantity',
  //   'product_alert_quantity',
  //   'product_thumbnail_photo',
  // ];

  function onetoonerelationwithcategorytable()
  {
    return $this->hasOne('App\Models\Category', 'id', 'category_id')->withTrashed();
  }
}
