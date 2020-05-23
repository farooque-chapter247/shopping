<?php

namespace App\DataTables;


use Modules\Order\Entities\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\QueryDataTable;
use Yajra\DataTables\Html\Builder;
use App\Enums\OrderStatus;

class OrdersDataTable extends DataTable
{
     /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */


    public function list($request){


        $query = new Order;
        if(isset($request['status'])){
            if($request['status']!=''){

                $query =$query->where('status',$request['status']);
            }
            if($request['date']!=''){
                $query->whereBetween('created_at', [$request['date'],$request['date'].' 23:59:59']);
            }
            // $query =$query->where('created_at',$request['date']);
        }
  
            
      

        $query =$query->orderBy('created_at','desc')->with('user');

    
        return datatables()->of($query)
        ->editColumn('total', function($query) {
            if(!empty($query->total)){
                return  '$'.$query->total;

            }
        })
        ->editColumn('status', function($query) {
            $orderstatus=OrderStatus::toArray();
            $html='<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">'.$query->status.'<span class="caret"></span></button><ul class="dropdown-menu">';
            foreach($orderstatus as $status)
            {
                if($status!=$query->status){
                    $html.='<li><a href="'.route('order.status.change',$query->id).'?status='.$status.'">'.$status.'</a></li>';
                }
            }

            $html.="</ul></div>";
            return $html;
            
        
        }) ->rawColumns(['status'])->make(true);
    } 

    public function dataTable($query)
    {   
   
        return datatables()
            ->eloquent($query)->editColumn('total', function($query) {
                if(!empty($query->total)){
                    return  '$'.$query->total;

                }
            })
            ->editColumn('status', function($query) {
                $orderstatus=OrderStatus::toArray();
                $html='<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">'.$query->status.'<span class="caret"></span></button><ul class="dropdown-menu">';
                foreach($orderstatus as $status)
                {
                    if($status!=$query->status){
                        $html.='<li><a href="'.route('order.status.change',$query->id).'?status='.$status.'">'.$status.'</a></li>';
                    }
                }

                $html.="</ul></div>";
                return $html;
                
            
            }) ->rawColumns(['status']);
    }




    /**
     * Get query source of dataTable.
     *
     * @param \App\SubCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {         
            $data =$model->newQuery();
            return $data->with(['user']);
    }
}
