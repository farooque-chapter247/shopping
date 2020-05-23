@extends('admin.layouts.backend')

@section('content')

<!-- start page content -->
<!-- Page Content -->
<div class="content">
{{  Breadcrumbs::render('Order') }}
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Order</h3>
          
        </div>
        <div class="block-content">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">  
                             
                        <div class="card-body">
                            <form action="{{ route('order') }}" class="table-form" method="get"> 
                                <div class="row"> 
                                    <div class="form-group col-md-3"> 
                       
                                        <select class="select2 form-control" id="status" name="status" placeholder="search by status" >
                                            <option value="">Select Status</option>
                                            @foreach($orderstatus as $status)

                                                <option value="{{$status}}"  @if(isset($request['status'])) @if($request['status']==$status) selected="selected" @endif @endif>{{$status}}</option>
                                            @endforeach
                                        </select>   
                                    </div>
                                    <div class="form-group col-md-4">
  
                                           <input type="text"  value=" @if(isset($request['created_at'])) {{$request['created_at']}} @endif "  class="js-flatpickr form-control bg-white" data-mode="single" id="date-mode-change"  name="created_at" required placeholder="filter by date" data-date-format="Y-m-d">
                                           
                                             
                                    </div>
                                    <div class="col-lg-1 col-sm-1">
                                        <div class="form-group">
                                    
                                            <button type="submit" class="btn btn-alt-primary">Search</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-1">
                                        <div class="form-group">
                                            <a href="{{route('order')}}" class="btn btn-alt-danger"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table  class="table table-striped table-bordered display nowrap responsive js-dataTable-full" data-url="{{route('order.list')}}" >
                                    <thead>
                                        <tr>  
                                            <th scope="col">Order Number</th>                      
											<th scope="col">User</th>
											<th scope="col">Total Amount</th>
                                            <th scope="col">Order Date</th>
											<th scope="col">Status</th>
                                            <th scope="col"width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    </tbody>
                                </table>
                            </div>           
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END Page Content -->
<div class="full-modal">
</div>
             
@endsection


@section('css_after')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/flatpickr/flatpickr.min.css')}}">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

@endsection
@section('js_after')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.css')}}">
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/order-datatable.js')}}"></script>
    <!-- Page JS Code -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('js/table_datatables.js') }}"></script>
<script src="{{ asset('js/order.js') }}"></script>

@endsection
