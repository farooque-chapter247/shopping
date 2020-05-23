<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Product\Services\ProductService;

class ProductController extends Controller
{
    protected $service;
    
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

       /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Product $product)
    {   
        $products =Product::where('category_id',$product->category->id)->where('id','!=',$product->id)->get();

        return view('product.detail')->with( ['product'=>$product ,'products'=>$products]);
    }

    public function list(Category $category ,Request $request)
    {   
        $request= $request->all();
        
        $products =$this->service->getAllProducts($request,$category);
        return view('product.product-list')->with( ['products'=>$products ,'dropdown'=>Category::all(),'category_id'=>$category->id ,'request'=>$request ,'filter_category'=>$category->id]);
    }


 
}
