@extends('layouts.app')

@section('content')

	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$listing->listing_name}} <a href="/listings" class="btn btn-primary btn-sm float-right">Go Back</a></div>

                <div class="card-body">
                  <div class="col-md-12">
                    <br>
                    <ul class="list-group">
                      <li class="list-group-item">Address: {{$listing->address}}</li>
                      <li class="list-group-item">Country: {{$listing->country}}</li>
                      <li class="list-group-item">State: {{$listing->state}}</li>
                      <li class="list-group-item">Zip: {{$listing->zip}}</li>
                      <li class="list-group-item">Email: {{$listing->email}}</li>
                    </ul>
                    <hr>
                    <div class="card">
                      Credit card number: {{$listing->credit_card_number}}
                    </div>
                  </div>
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