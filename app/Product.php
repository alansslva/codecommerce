<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = array('name','description','price','recommend','featured','category_id');

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }
}
