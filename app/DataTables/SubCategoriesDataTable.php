<?php

namespace App\DataTables;

use Modules\SubCategory\Entities\SubCategory;
use Modules\Category\Entities\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\QueryDataTable;
use Illuminate\Support\Str;


class SubCategoriesDataTable extends DataTable
{
     /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */


    public function list($category){


        $query =SubCategory::where("category_id",$category->id)->orderBy('created_at','desc');

    
        return datatables()->of($query)->editColumn('description', function($query) {
            if(!empty($query->description)){
                return Str::limit($query->description,35, ' ...');

            }
        })->editColumn('name', function($query) {
            if(!empty($query->name)){
                return Str::ucfirst($query->name);

            }
        })->make(true);
    }

    public function dataTable($query)
    {   
   
        return datatables()
            ->eloquent($query);
    }




    /**
     * Get query source of dataTable.
     *
     * @param \App\SubCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubCategory $model)
    {         
            $data =$model->newQuery();
            return $data->with(['category']);
    }
}
