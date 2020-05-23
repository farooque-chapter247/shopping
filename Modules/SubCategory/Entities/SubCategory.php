<?php

namespace Modules\SubCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class SubCategory extends Model implements HasMedia
{
    use InteractsWithMedia; 
    protected $fillable = [];

    function getCategoryImg(){
        $media = $this->getFirstMedia('subcategory');
     
        if($media)
            return $media->getFullUrl();
        else
            return asset('media/avatars/avatar1.jpg');
    }

    function category(){
     
        return $this->belongsTo(\Modules\Category\Entities\Category::class);
        
    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('subcategory')->singleFile();
           
    }


}
