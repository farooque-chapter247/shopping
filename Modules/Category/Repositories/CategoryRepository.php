<?php

namespace Modules\Category\Repositories;
use Modules\Category\Entities\Category;


use Auth;


class CategoryRepository
{
    
    /**
     * Save the change in the model
     *
     * @param  array $data
     * @param  Modules\Category\Entities\Category $category
     *
     * @return Modules\Category\Entities\Category
     */

    function save(array $data, Category $category)
	{  
      
        
        $category->name= (!empty($data['name'])?$data['name']:$category->name);
        $category->description = (!empty($data['description'])?$data['description']:$category->description);
    
        //$Category->user_id=Auth::user()->id;
      
        
        $category->save();
     
        if(isset($data['file'])){
            $this->fileUpload($data ,$category);
        } 
  
		return $category;
    }


    function fileUpload($data , Category $category)
    {
        $category->addMediaFromRequest('file')->toMediaCollection('category'); 
        return $category->getFirstMedia('category')->getFullUrl();           
    }
    

     /**
     * remove the change in the model
     *
     * @param  array $data
     * @param  Modules\Category\Entities\Category $Category
     *
     * @return Modules\Category\Entities\Category
     */
	function delete(Category $Category)
	{
		try{

		    $Category->delete();	
			return true;
		}
		catch(Exception $e){
			return false;
		}
		
    }

    function getProductByCategory($request=[])
    {
        $category=new Category;
        if(isset($request['category_id']) || isset($request['name'])){
            if($request['category_id']){
              $category=  $category::where('id',$request['category_id']);    
            }   
            $category =$category->whereHas('products', function ($query) use ($request){
                $query->where('name', 'like', '%'.$request['name'].'%');
            })
            ->with(['products' => function($query) use ($request){
              
                $query->where('name', 'like', '%'.$request['name'].'%');
           
            }])->get();
        }else{
            $category =$category::all();
            $category =$category->load(['products']);
        }
        return $category;
    }
    





}