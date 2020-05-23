<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia; 
    protected $fillable = [];


    function getCategoryImg(){
        $media = $this->getFirstMedia('category');
     
        if($media)
            return $media->getFullUrl();
        else
            return asset('media/avatars/avatar1.jpg');
    }

    public function subcategory()
    {
        return $this->hasMany('App\Module\Entities\SubCategory');
    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('category')->singleFile();
           
    }

    function products(){
     
        return $this->hasMany(\Modules\Product\Entities\Product::class);
        
    }
}
