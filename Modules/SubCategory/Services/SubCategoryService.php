<?php
namespace Modules\SubCategory\Services;
use Modules\SubCategory\Repositories\SubCategoryRepository;
use Modules\SubCategory\Entities\SubCategory;

class SubCategoryService
{
    //Product repository object
	protected $repository;

	/**
     * Constructor
     *
     * @param  \Modules\Project\Repositories\SubCategoryRepository $repository
     *
     * @return Modules\Project\Repositories\SubCategoryRepository
     */
	function __construct(SubCategoryRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
     * Add Project
     *
     * @param  array $request
     *
     * @return \App\Services\SubCategoryService
     */
	function add($request)
	{
		return $this->repository->save($request, (new SubCategory()));
	}

	/**
     * Update Project
     *
     * @param  Modules\Project\Entities\SubCategory $project
     * @param  array $request
     *
     * @return \App\Services\ProductService
     */
	function update(SubCategory $subcategory, $request)
	{
		return $this->repository->save($request,$subcategory);
	}

	/**
     * Delete Project
     *
     * @param  Modules\Project\Entities\Project $project
     *
     * @return \App\Services\SubCategoryService
     */
	function delete(SubCategory $subcategory)
	{
		try{
			return $this->repository->delete($subcategory);	
		}
		catch(Exception $e){
			return false;
		}
		
     }



     public function subcategoryUpload($request,$subcategory)
     {
         return $this->repository->fileUpload($request,$subcategory);
     }

     function fetchsubCategories($params = []){
          return $this->repository->fetchSubCategories($params);
     }
     


     
} 