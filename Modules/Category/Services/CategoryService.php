<?php
namespace Modules\Category\Services;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Category\Entities\Category;

class CategoryService
{
    //Product repository object
	protected $repository;

	/**
     * Constructor
     *
     * @param  \Modules\Project\Repositories\CategoryRepository $repository
     *
     * @return Modules\Project\Repositories\CategoryRepository
     */
	function __construct(CategoryRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
     * Add Project
     *
     * @param  array $request
     *
     * @return \App\Services\ProjectService
     */
	function add($request)
	{
		return $this->repository->save($request, (new Category()));
	}

	/**
     * Update Project
     *
     * @param  Modules\Project\Entities\Category $project
     * @param  array $request
     *
     * @return \App\Services\ProductService
     */
	function update(Category $category, $request)
	{
		return $this->repository->save($request,$category);
	}

	/**
     * Delete Project
     *
     * @param  Modules\Project\Entities\Project $project
     *
     * @return \App\Services\CategoryService
     */
	function delete(Category $category)
	{
		try{
			return $this->repository->delete($category);	
		}
		catch(Exception $e){
			return false;
		}
		
     }


     public function categoryUpload($request,$category)
     {
         return $this->repository->fileUpload($request,$category);
     }
     

     public function getProductByCategory($request)
     {
         return $this->repository->getProductByCategory($request);
     }

     
} 