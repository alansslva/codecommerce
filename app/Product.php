<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        //
        protected $fillable = [
            'name',
            'description',
            'price',
            'recommend',
            'featured',
            'category_id'
        ];

        public function category()
        {
            return $this->belongsTo('CodeCommerce\Category');
        }

        public function images()
        {
            return $this->hasMany('CodeCommerce\ProductImage');
        }

         public function tags()
        {
            return $this->belongsToMany('CodeCommerce\Tag');
        }

        public function scopeFeatured($query)
        {
            return $query->where('featured','=',1);
        }

        public function scopeRecommend($query)
        {
            return $query->where('recommend','=',1);
        }

    }
