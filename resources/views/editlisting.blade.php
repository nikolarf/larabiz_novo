@extends('layouts.app')

@section('content')

	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Listing <a class="btn btn-success btn-sm float-right" href="/home">Go Back</a></div>

                
    <div class="col-md-12">
      <br>
      <form action="/listings/{{$listing->id}}" method="POST" class="needs-validation" novalidate>
        {{ csrf_field() }}
	      <div class="mb-3">
	        <label for="firstName">Listing Name</label>
	        <input type="text" class="form-control" id="firstName" placeholder="" value="{{$listing->listing_name}}" name="listing_name" required>
	        <div class="invalid-feedback">
	          Valid listing name is required.
	        </div>
	      </div>
        
        <div class="mb-3">
          <label for="username">Listing Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" name="listing_username" value="{{$listing->listing_username}}" required>
            <div class="invalid-feedback" style="width: 100%;">
              Listing username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="listing@example.com" name="email" value="{{$listing->email}}">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="{{$listing->address}}" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" name="country" value="{{$listing->country}}" required>
              @foreach($country as $c)
                <option @if($listing->country == $c) selected @endif>{{$c}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select name="state" class="custom-select d-block w-100" id="state" name="state" value="{{$listing->state}}" required>
              @foreach($state as $s)
                <option @if($listing->state == $s) selected @endif>{{$s}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" name="zip" value="{{$listing->zip}}" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          @if($listing->shipping_address == 'on')
            <input type="checkbox" class="custom-control-input" id="same-address" name="shipping_address" checked>
          @else
            <input type="checkbox" class="custom-control-input" id="same-address" name="shipping_address">
          @endif
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          @if($listing->save_information == 'on')
            <input type="checkbox" class="custom-control-input" id="save-info" name="save_information" checked>
          @else
            <input type="checkbox" class="custom-control-input" id="save-info" name="save_information">
          @endif
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            @if($listing->paymentMethod == 1)
              <input id="credit" name="paymentMethod" value="1" type="radio" class="custom-control-input" checked required>
            @else
              <input id="credit" name="paymentMethod" value="1" type="radio" class="custom-control-input" required>
            @endif
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            @if($listing->paymentMethod == 2)
              <input id="debit" name="paymentMethod" value="2" type="radio" class="custom-control-input" checked required>
            @else
              <input id="debit" name="paymentMethod" value="2" type="radio" class="custom-control-input" required>
            @endif
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            @if($listing->paymentMethod == 3)
              <input id="paypal" name="paymentMethod" value="3" type="radio" class="custom-control-input" checked required>
            @else
              <input id="paypal" name="paymentMethod" value="3" type="radio" class="custom-control-input" required>
            @endif
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" name="name_on_card" value="{{$listing->name_on_card}}" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" name="credit_card_number" value="{{$listing->credit_card_number}}" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" name="expiration" value="{{$listing->expiration}}" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" name="cvv" value="{{$listing->cvv}}" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <input name="_method" type="hidden" value="PUT">
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update Listing</button>
      </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
      $( document ).ready(function() {
          $('#same-address').on('change', function(){
             this.value = this.checked ? 1 : 2;
             // alert(this.value);
          }).change();
      });
      $( document ).ready(function() {
          $('#save-info').on('change', function(){
             this.value = this.checked ? 1 : 2;
             // alert(this.value);
          }).change();
      });
    </script> --}}
@endsection