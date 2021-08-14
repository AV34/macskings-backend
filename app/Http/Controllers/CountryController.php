<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lookups\CountryCollection;
use App\Models\Lookups\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Lookups\Country as CountryResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CountryCollection(Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'phone_code' => 'required|string|max:255',
//            'country_code' => 'required|string|max:255'
//        ]);

        if ($this->validateInputs($request)->fails()){
            return response(['errors' => $this->validateInputs($request)->errors()], 422);
        }

        $country = Country::create([
            'name' => $request->name,
            'phone_code' => $request->phoneCode,
            'country_code' => $request->countryCode,
        ]);

        return new CountryResource($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'phone_code' => 'required|string|max:255',
//            'country_code' => 'required|string|max:255'
//        ]);

        if ($this->validateInputs($request)->fails()){
            return response(['errors' => $this->validateInputs()->errors()], 422);
        }

        $country->update([
            'name' => $request->name,
            'phone_code' => $request->phoneCode,
            'country_code' => $request->countryCode,
        ]);

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
//        $country->delete();
    }

    private function validateInputs(Request $request){
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phoneCode' => 'required|string|max:255',
            'countryCode' => 'required|string|max:255'
        ]);
    }
}
