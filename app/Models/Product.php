<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
}
