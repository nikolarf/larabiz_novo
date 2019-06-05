@extends('layouts.app')

@php
    //dd($listings);    
@endphp

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Business Listings</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif

                    @if(count($listings))
                        <table class="table table-striped">
                            <ul class="list-group">
                                @foreach($listings as $listing)
                                   <li class="list-group-item"><a href="/listings/{{$listing->id}}">{{$listing->listing_name}}</a></li>
                                @endforeach
                            </ul>
                        </table>
                    @else
                        <p>No listings found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
