<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Category\Services\CategoryService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $categoryservice;
    public function __construct(CategoryService $categoryservice)
    {
        $this->categoryservice=$categoryservice;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {   
        return view('home');
    }

       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Category $category ,Request $request)
    {   
       
        $products = $this->categoryservice->getProductByCategory($request->all());
        return view('welcome')->with(['categories'=>$products ,'dropdown'=>$category::all(),'request'=>$request->all()]);
    }
}
