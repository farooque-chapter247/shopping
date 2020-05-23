<?php

namespace Modules\SubCategory\Repositories;
use Modules\SubCategory\Entities\SubCategory;





class SubCategoryRepository
{
    
    /**
     * Save the change in the model
     *
     * @param  array $data
     * @param  Modules\SubCategory\Entities\SubCategory $category
     *
     * @return Modules\SubCategory\Entities\SubCategory
     */
    private $subcategory;

    function __construct(SubCategory $subcategory){
        $this->subcategory = $subcategory;
    }

    function save(array $data, SubCategory $subcategory)
	{  
      
  
        $subcategory->name= (!empty($data['name'])?$data['name']:$subcategory->name);
        $subcategory->category_id= (!empty($data['category_id'])?$data['category_id']:$subcategory->category_id);
        // $subcategory->category_id= 1;
        $subcategory->description = (!empty($data['description'])?$data['description']:$subcategory->description);
    

      
   
        $subcategory->save();
        if(isset($data['file'])){
            $this->fileUpload($data ,$subcategory);
        } 
  
		return $subcategory;
    }


    function fileUpload($data , SubCategory $subcategory)
    {
        $subcategory->addMediaFromRequest('file')->toMediaCollection('subcategory'); 
        return $subcategory->getFirstMedia('subcategory')->getFullUrl();           
    }
    

     /**
     * remove the change in the model
     *
     * @param  array $data
     * @param  Modules\SubCategory\Entities\subCategory $SubCategory
     *
     * @return Modules\SubCategory\Entities\SubCategory
     */
	function delete(SubCategory $subcategory)
	{
		try{

		    $subcategory->delete();	
			return true;
		}
		catch(Exception $e){
			return false;
		}
		
    }
    

    function fetchSubCategories($params = []){

        $no_paginate = false;

        $data =$this->subcategory->select('sub_categories.id','sub_categories.name');
  
        if(isset($params['category_id'])){
            if(!empty($params['category_id'])){
                $data    =$data->where('sub_categories.category_id','=',$params['category_id']);
                
               

            }
        }  
   
        if(!empty($params['search']))
        {
            $no_paginate = true;
            $data=$data->where('sub_categories.name','like',"%".$params['search']."%");
            
        
        }
        
        if(!$no_paginate)
            return $data->paginate(5);

        return $data->get();
       
    }





}