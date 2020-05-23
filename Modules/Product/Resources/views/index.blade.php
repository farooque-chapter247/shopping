@extends('admin.layouts.backend')

@section('content')

<!-- start page content -->
<!-- Page Content -->
<div class="content">
{{  Breadcrumbs::render('product') }}
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Products</h3>
            <div class="block-options">
                <a class="btn-block-option" href="{{ route('product.add') }}"> <i class="fa fa-plus mr-2"></i>Add Product</a>  
            </div>
        </div>
        <div class="block-content">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">  
                    <!-- @include('admin.partials.loader')                       -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table table-striped table-bordered display nowrap responsive js-dataTable-full" data-url="{{route('product.list')}}" >
                                    <thead>
                                        <tr>  
                                            <th scope="col">Name</th> 
                                            <th scope="col">Actual Price</th>    
                                            <th scope="col">Sell Price</th>                      
                               
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
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

@endsection
@section('js_after')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>


<script type="text/javascript" src="{{ asset('js/product-datatable.js')}}"></script>
    <!-- Page JS Code -->
<script src="{{ asset('js/table_datatables.js') }}"></script>


@endsection
