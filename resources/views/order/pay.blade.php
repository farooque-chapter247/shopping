@extends('layouts.front-layout')

@section('content')
<div class="container">
  

  <div class="card mt-5 col-md-8 offset-2">
    <div class="card-header">Billing Address</div>
    <div class="card-body">
    <div class="col-md-12">

    @if($billing->count())
    <form data-parsley-validate id="save-address">
          <div class="modal-body">
         
              <div class="form-group">
      
                <label for="name">Name</label>
                <input type="text" required="" value="{{old('name', $billing[0]->name)}}" data-parsley-required-message="Name field is rquired" name="name" class="form-control" id="name"  placeholder="name">
    
              </div>
              <div class="form-group">
           
                <label for="address">Address</label>
                <label for="address">Line1</label>
                <input type="text" required="" value="{{old('line',$billing[0]->line1)}}"  data-parsley-required-message="Line1 field is rquired" name="line1"  class="form-control" id="line1"  placeholder="line1">
    
              </div>
              <div class="form-group">
            

                <label for="city">city</label>
                <input type="text" required="" value="{{old('city',$billing[0]->city)}}"  data-parsley-required-message="city field is rquired" name="city"  class="form-control" id="city"  placeholder="city">
    
              </div>
              <div class="form-group">
             

                <label for="state">state</label>
                <input type="text" required="" value="{{old('name',$billing[0]->state)}}"  data-parsley-required-message="state field is rquired"  name="state" class="form-control" id="state"  placeholder="state">
    
              </div>
              <div class="form-group">
            

                <label for="state">country</label>
                <input type="text" required="" value="{{old('country',$billing[0]->country)}}"  data-parsley-required-message="country field is rquired" name="country" class="form-control" id="country"  placeholder="country">
    
              </div>
              <div class="form-group">
          

                <label for="postalcode">Postal Code</label>
                <input type="text" required="" value="{{old('postal_code',$billing[0]->postal_code)}}"  data-parsley-required-message="Postal Code field is rquired" name="postal_code"  class="form-control" id="postal-code"  placeholder="Postal code">
    
              </div>
              </div>
              <div class="modal-footer">
      
                <button type="Submit" class="btn btn-primary"  >Save &Pay</button>
              </div>
           
           </form>
        @else
        
        <form data-parsley-validate id="save-address">
          <div class="modal-body">
         
              <div class="form-group">
          
                <label for="name">Name</label>
                <input type="text" required="" value="" data-parsley-required-message="Name field is rquired" name="name" class="form-control" id="name"  placeholder="name">
    
              </div>
              <div class="form-group">
     
                <label for="address">Address</label>
                <label for="address">Line1</label>
                <input type="text" required=""   data-parsley-required-message="Line1 field is rquired" name="line1"  class="form-control" id="line1"  placeholder="line1">
    
              </div>
              <div class="form-group">
            

                <label for="city">city</label>
                <input type="text" required="" data-parsley-required-message="city field is rquired" name="city"  class="form-control" id="city"  placeholder="city">
    
              </div>
              <div class="form-group">
           

                <label for="state">state</label>
                <input type="text" required=""   data-parsley-required-message="state field is rquired"  name="state" class="form-control" id="state"  placeholder="state">
    
              </div>
              <div class="form-group">
       

                <label for="state">country</label>
                <input type="text" required=""   data-parsley-required-message="country field is rquired" name="country" class="form-control" id="country"  placeholder="country">
    
              </div>
              <div class="form-group">
                

                <label for="postalcode">Postal Code</label>
                <input type="text" required=""   data-parsley-required-message="Postal Code field is rquired" name="postal_code"  class="form-control" id="postal-code"  placeholder="Postal code">
    
              </div>
              </div>
              <div class="modal-footer">
      
                <button type="Submit" class="btn btn-primary" id="save-address" >Save &Pay</button>
              </div>
           
           </form>

        @endif   
</div>
    </div> 
    
  </div>
</div>
  

<!-- //modal -->
<!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="paymentModalLabel">Pay <span class="text-danger pay-amount"></span>${{$amount}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="loading invisible" ></div>
            <form>
              <div class="form-group">
                <span class="text-danger payment-error"></span><br>
                <label for="card-holder-name">Card Holder Name</label>
                <input type="text" class="form-control" id="card-holder-name"  placeholder="Card Holder name">
    
              </div>
              <div class ="form-group">
                <label for="card-element">Cards Detail</label>
                <div id="card-element"></div>
              </div> 
           </form>            

              <!-- Stripe Elements Placeholder -->
             


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="card-button" >Pay</button> 
          </div>
        </div>
      </div>
    </div>

   

    
    @routes 
</body> 


    <!-- Page JS Code -->
    
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ mix('js/validation/parsley-validation.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>

<script src="{{ asset('js/stripe.js') }}"></script>

</html>

@endsection

@section('css_after')

<link rel="stylesheet" href="{{asset('css/front-order-detail.css')}}">
<link rel="stylesheet" href="{{asset('css/loader.css')}}">

@endsection

@section('js_after')
  <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{ mix('js/validation/parsley-validation.js') }}"></script>
  <script src="https://js.stripe.com/v3/"></script>

  <script src="{{ asset('js/stripe.js') }}"></script>
@endsection

