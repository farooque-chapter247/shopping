<?php

namespace Modules\Category\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Enums\AlertStatusClass;
use App\DataTables\CategoriesDataTable;
use Modules\Category\Entities\Category;
use Modules\Category\Services\CategoryService;
use Modules\Category\Http\Requests\AddRequest;
use Modules\Category\Http\Requests\UpdateRequest;


class CategoryController extends Controller
{
    
    protected $service;
    
    
    
    
    function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    
    
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {  
        return view('category::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('category::create');
    }

    public function datatables(CategoriesDataTable $datatable)
    {   
      

        return $datatable->ajax();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AddRequest $request)
    {
        
        $category = $this->service->add($request->all());

 
        Session::flash('message','Category Add successfully.'); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));

        return redirect()->route('category');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Category $category)
    {

     
        return view('category::edit')->with([
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateRequest $request,Category $category)
    {
        $this->service->update($category,$request->all());
        Session::flash('message','Category updated successfully'); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        $message ='Opps some error occure !';
        $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_INTERNAL_SERVER_ERROR);
        

        if($this->service->delete($category))
        {
            $message =  'Category deleted Successfully';
            $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_OK);
        }
        Session::flash('message',$message); 
        Session::flash('status', $status);

        return redirect()->route('category');
    }

    public function categoryUpload(Request $request,Category $category)
    {   
        if($request->hasFile('file'))
        {       
            $url = $this->service->categoryUpload($request->all(),$category);            
            return response()->json([
                'status' => 'success',
                'image'  =>  $url   
            ]);          
        }
    }
}
