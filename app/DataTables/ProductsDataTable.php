<?php

namespace App\DataTables;

use Modules\Product\Entities\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class ProductsDataTable extends DataTable
{
     /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {   
   
        return datatables()
            ->eloquent($query)->editColumn('description', function($query) {
                if(!empty($query->description)){
                    return Str::limit($query->description,35, ' ...');

                }
            })->editColumn('name', function($query) {
                if(!empty($query->name)){
                    return Str::limit(Str::ucfirst($query->name),30, ' ...');

                }
            })->editColumn('actual_price', function($query) {
                if(!empty($query->actual_price)){
                    return  '$'.$query->actual_price;
    
                }
            })->editColumn('sell_price', function($query) {
                if(!empty($query->sell_price)){
                    return  '$'.$query->sell_price;
    
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        $data =$model->newQuery()->orderBy('created_at','desc');
        return $data->with(['category','subcategory']);
    }
}