<?php

namespace Modules\Product\Repositories;
use Modules\Product\Entities\Product;


use Auth;


class ProductRepository
{
    
    /**
     * Save the change in the model
     *
     * @param  array $data
     * @param  Modules\Product\Entities\Product $category
     *
     * @return Modules\Product\Entities\Product
     */

    function save(array $data, Product $product)
	{  

   
        $product->name= (!empty($data['name'])?$data['name']:$product->name);
        $product->description = (!empty($data['description'])?$data['description']:$product->description);
        $product->category_id= (!empty($data['category_id'])?$data['category_id']:$product->category_id);
        $product->sub_category_id = (!empty($data['sub_category_id'])?$data['sub_category_id']:$product->sub_category_id);
        $product->actual_price= (!empty($data['actual_price'])?$data['actual_price']:$product->actual_price);
        $product->sell_price = (!empty($data['sell_price'])?$data['sell_price']:$product->sell_price);
        $product->skunumber= (!empty($data['skunumber'])?$data['skunumber']:$product->name);

        //$Category->user_id=Auth::user()->id;
      
        
        $product->save();

        if(isset($data['file'])){
            
            $this->fileUpload($data ,$product);
        } 
  
		return $product;
    }


    function fileUpload($data ,Product $product)
    {  
     
    

        $product->addMediaFromRequest('file')->toMediaCollection('product');
        return $product->getFirstMedia('product')->getFullUrl();           
    }
    

     /**
     * remove the change in the model
     *
     * @param  array $data
     * @param  Modules\Product\Entities\Product $Product
     *
     * @return Modules\Product\Entities\Product
     */
	function delete(Product $product)
	{
		try{

		    $product->delete();	
			return true;
		}
		catch(Exception $e){
			return false;
		}
		
    }

   
	function getAllProducts($request,$category)
	{
        $product =new Product;

     
        if(!empty($request)){
            if(isset($request['sort_by'])){
                if($request['sort_by']==1){
                    $product =$product->orderBy('sell_price','asc');
                }else if($request['sort_by']==2){
                    $product =$product->orderBy('sell_price','desc');
                }else{
                    $product =$product->orderBy('created_at','desc');
                }
               
            }
            if(isset($request['name'])){
    
                $product =$product->where('name',$request['name']);
            } 
            if(isset($request['category_id'])){
    
                $product =$product->where('category_id',$request['category_id']);
            } 

        }else{
            $product =$product::where('category_id',$category->id);
        }
    

        
        return $product->get();
		
    }
}    