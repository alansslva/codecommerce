<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = array('name','description','price');
}
