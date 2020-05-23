<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Product extends Model implements HasMedia
{
    use InteractsWithMedia; 
    public $registerMediaConversionsUsingModelInstance = true;
    protected $fillable = [];



    function getProductImg(){
        $media = $this->getFirstMedia('product');
     
        if($media)
            return $media->getFullUrl();
        else
            return asset('media/avatars/avatar1.jpg');
    }

    function category(){
     
        return $this->belongsTo(\Modules\Category\Entities\Category::class);
        
    }

    function subCategory(){
     
        return $this->belongsTo(\Modules\SubCategory\Entities\SubCategory::class);
        
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('product')->singleFile();
           
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(200)
              ->height(200)
              ->sharpen(10);
    }

    function getProductImgThumb(){
        $media = $this->getFirstMedia('product');
     
        if($media)
            return $media->getFullUrl('thumb');
        else
            return asset('media/avatars/avatar1.jpg');
    }



}
