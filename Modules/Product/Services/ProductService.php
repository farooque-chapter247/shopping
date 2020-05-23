<?php
namespace Modules\Product\Services;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Entities\Product;

class ProductService
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
	function __construct(ProductRepository $repository)
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
		return $this->repository->save($request, (new Product()));
	}

	/**
     * Update Project
     *
     * @param  Modules\Project\Entities\Category $project
     * @param  array $request
     *
     * @return \App\Services\ProductService
     */
	function update(Product $product, $request)
	{
		return $this->repository->save($request,$product);
	}

	/**
     * Delete Project
     *
     * @param  Modules\Project\Entities\Project $project
     *
     * @return \App\Services\CategoryService
     */
	function delete(Product $product)
	{
		try{
			return $this->repository->delete($product);	
		}
		catch(Exception $e){
			return false;
		}
		
     }


     public function productUpload($request,$product)
     {
         return $this->repository->fileUpload($request,$product);
     }
     
     public function getAllProducts($request,$category)
     {
         return $this->repository->getAllProducts($request,$category);
     }


     
} 