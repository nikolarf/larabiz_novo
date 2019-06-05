@extends('layouts.app')

@php
    //dd($listings);    
@endphp

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <span class="float-right"><a class="btn btn-success btn-sm" href="/listings/create">Add Listing</a></span></div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif

                    <h3>Your Listings</h3>

                    @if(count($listings))
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($listings as $listing)
                                <tr>
                                    <td>{{ $listing->listing_name }}</td>
                                    <td><a class="float-right btn btn-primary btn-sm" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                                    <td>
                                        <form action="/listings/{{$listing->id}}" method="POST" class="float-left" onsubmit="return confirm('Are you sure?');">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger float-right btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
