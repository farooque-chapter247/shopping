<?php

namespace Modules\Product\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Enums\AlertStatusClass;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Product\Services\ProductService;
use Modules\Product\Http\Requests\AddRequest;
use Modules\Product\Http\Requests\UpdateRequest;
use App\DataTables\ProductsDataTable;
use Carbon\Carbon;

class ProductController extends Controller
{
    
    protected $service;
    
    
    
    
    function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function datatables(ProductsDataTable $datatable)
    {   
      

        return $datatable->ajax();
    }
    
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
       
        return view('product::create')->with(['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AddRequest $request)
    {

        $product = $this->service->add($request->all());

 
        Session::flash('message','Product Add successfully.'); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));

        return redirect()->route('product');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Product $product)
    {
     
  
        return view('product::edit')->with([
            'product' => $product->load('subCategory'),
            'categories'=>Category::all()
        ]);
    }    

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateRequest $request,Product $product)
    {
        $this->service->update($product,$request->all());
        Session::flash('message','Product updated successfully'); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $message ='Opps some error occure !';
        $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_INTERNAL_SERVER_ERROR);
        

        if($this->service->delete($product))
        {
            $message =  'Product deleted Successfully';
            $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_OK);
        }
        Session::flash('message',$message); 
        Session::flash('status', $status);

        return redirect()->route('product');
    }

    public function productUpload(Request $request,Product $product)
    {   
        if($request->hasFile('file'))
        {       
            $url = $this->service->productUpload($request->all(),$product);            
            return response()->json([
                'status' => 'success',
                'image'  =>  $url   
            ]);          
        }
    }

    public function tempUpload(Request $request){
        // $request =$request->all();
        // dd($request);
        $product =new Product();
        $product->addMediaFromBase64($request->image)->toMediaCollection('product');
 
        // $urlToFirstListImage = $product->getFirstMediaUrl('file', 'thumb');
        $urlToFirstTemporaryListImage = $product->getFirstTemporaryUrl(Carbon::now()->addMinutes(5));
        // $fullPathToFirstListImage = $product->getFirstMediaPath('image', 'thumb');
        dd($urlToFirstTemporaryListImage);
    }
}
