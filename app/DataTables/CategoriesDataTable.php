<?php

namespace App\DataTables;

use Modules\Category\Entities\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class CategoriesDataTable extends DataTable
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
                    return Str::ucfirst($query->name);

                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
    {
        return $model->newQuery()->orderBy('created_at','desc');
    }
}
