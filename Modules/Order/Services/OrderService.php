<?php
namespace Modules\Order\Services;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Entities\Order;
use Modules\OrderItem\Entities\OrderItem;

class OrderService
{
    //Product repository object
	protected $repository;

	/**
     * Constructor
     *
     * @param  \Modules\Project\Repositories\OrderRepository $repository
     *
     * @return Modules\Project\Repositories\OrderRepository
     */
	function __construct(OrderRepository $repository)
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
	function storeOrder($stripCharges)
	{    
   
		return $this->repository->storeOrder($stripCharges);
	}



     
} 