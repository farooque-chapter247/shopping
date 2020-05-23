@extends('layouts.modal')

@push('modal-title') 
    Change Password   @endpush
@push('modal-id','change-password')


@section('modal-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="error-change-password text-danger">

                </div>
        
                <form id="change-password-form" method="post" action="{{route('admin.change.password')}}">
                @csrf
               
                    
                    <div class="form-group">
                        <label for="password"> Old Password <sup class="text-danger">*</sup></sup></label>
                        <input type="password" class="form-control" id="password" value="" name="old_password" required placeholder="Enter Old password.." >
                    </div> 
                    
                    <div class="form-group">
                        <label for="password"> New Password <sup class="text-danger">*</sup></sup></label>
                        <input type="password" class="form-control" id="password" value="" name="password" required placeholder="Enter new password.." >
                    </div> 
                    <div class="form-group">
                        <button type="submit" id="change-password"  class="btn btn-alt-primary">Save</button>
                    </div>
                </form>
  
        	
        </div>
    </div>
</div>
@stop