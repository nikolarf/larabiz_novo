<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $country = ['United States', 'Serbia', 'Russia'];
    private $state = ['California', 'New York', 'Ohio'];

    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();

        return view('listings')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('createlisting')->with(['country' => $this->country, 'state' => $this->state]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        $this->validate($request, [
            'listing_name' => 'required',
            'email' => 'email'
        ]);

        $listing = new Listing;
        $listing->listing_name = $request->input('listing_name');
        $listing->listing_username = $request->input('listing_username');
        $listing->email = $request->input('email');
        $listing->address = $request->input('address');
        $listing->country = $request->input('country');
        $listing->state = $request->input('state');
        $listing->zip = $request->input('zip');
        if($request->input('shipping_address') && $request->input('shipping_address')!=NULL){
            $listing->shipping_address = 'on';
        }else{
            $listing->shipping_address = 'off';
        }
        if($request->input('save_information') && $request->input('save_information')!=NULL){
            $listing->save_information = 'on';
        }else{
            $listing->save_information = 'off';
        }
        $listing->paymentMethod = $request->input('paymentMethod');
        $listing->name_on_card = $request->input('name_on_card');
        $listing->credit_card_number = $request->input('credit_card_number');
        $listing->expiration = $request->input('expiration');
        $listing->cvv = $request->input('cvv');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/home')->with('success', 'Listing Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        //dd($listing);
        return view('showlisting')->with(['country' => $this->country, 'state' => $this->state, 'listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        //dd($listing);
        return view('editlisting')->with(['country' => $this->country, 'state' => $this->state, 'listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);

        $this->validate($request, [
            'listing_name' => 'required',
            'email' => 'email'
        ]);

        $listing = Listing::find($id);
        $listing->listing_name = $request->input('listing_name');
        $listing->listing_username = $request->input('listing_username');
        $listing->email = $request->input('email');
        $listing->address = $request->input('address');
        $listing->country = $request->input('country');
        $listing->state = $request->input('state');
        $listing->zip = $request->input('zip');
        if($request->input('shipping_address') && $request->input('shipping_address')!=NULL){
            $listing->shipping_address = 'on';
        }else{
            $listing->shipping_address = 'off';
        }
        if($request->input('save_information') && $request->input('save_information')!=NULL){
            $listing->save_information = 'on';
        }else{
            $listing->save_information = 'off';
        }
        $listing->paymentMethod = $request->input('paymentMethod');
        $listing->name_on_card = $request->input('name_on_card');
        $listing->credit_card_number = $request->input('credit_card_number');
        $listing->expiration = $request->input('expiration');
        $listing->cvv = $request->input('cvv');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/home')->with('success', 'Listing Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/home')->with('success', 'Listing Deleted');
    }
}
