<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = array('name','description');

    public function product()
    {
        return $this->hasMany('CodeCommerce\Product');
    }
}
