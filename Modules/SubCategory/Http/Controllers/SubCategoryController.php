<?php

namespace Modules\SubCategory\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Enums\AlertStatusClass;
use App\DataTables\SubCategoriesDataTable;
use Modules\SubCategory\Entities\SubCategory;
use Modules\Category\Entities\Category;
use Modules\SubCategory\Http\Resources\SubCategorySelectBox;
use Modules\SubCategory\Services\SubCategoryService;
use Modules\SubCategory\Http\Requests\AddRequest;
use Modules\SubCategory\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Cache;

class SubCategoryController extends Controller
{
  

    protected $service;
    function __construct(SubCategoryService $service)
    {
        $this->service = $service;
    }
    
    
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Category $category)
    {

        return view('subcategory::index')->with([
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Category $category)
    {
        return view('subcategory::create')->with(['category'=>$category]);
    }

    public function datatables(SubCategoriesDataTable $datatable,Category $category )
    {   
      
       
        return $datatable->list($category);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AddRequest $request)
    {

        $subcategory = $this->service->add($request->all());

 
        Session::flash('message','Subcategory Add successfully.'); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));

        return redirect()->route('subcategory',$subcategory->category_id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('subcategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(SubCategory $subcategory)
    {
     
        return view('subcategory::edit')->with([
            'subcategory' => $subcategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateRequest $request,SubCategory $subcategory)
    {
        $this->service->update($subcategory,$request->all());
        Session::flash('message','Subcategory updated successfully'); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));
        return redirect()->route('subcategory',$subcategory->category_id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $message ='Opps some error occure !';
        $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_INTERNAL_SERVER_ERROR);
        

        if($this->service->delete($subcategory))
        {
            $message =  'Subcategory deleted Successfully';
            $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_OK);
        }
        Session::flash('message',$message); 
        Session::flash('status', $status);

        return redirect()->back();
    }


    public function subcategoryUpload(Request $request,SubCategory $subcategory)
    {   
        if($request->hasFile('file'))
        {       
            $url = $this->service->subcategoryUpload($request->all(),$subcategory);            
            return response()->json([
                'status' => 'success',
                'image'  =>  $url   
            ]);          
        }
    }

    public function subCategoryFetch(Request $request){
    
        return response()->json([
            'results' => SubCategorySelectBox::collection(
                            $this->service->fetchSubCategories($request->all())
                        )
        ]);
    }
}
