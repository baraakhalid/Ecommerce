<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth('user')->check()){
            
            $addresses=Address::with(['city','area'])->where('user_id' , $request->user()->id)->get();

            return response()->json(['message'=>'success' , 'addresses' => $addresses]);

        }
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
        $validator = Validator($request->all(), [
            'street' => 'required|string|min:3',
            'building' => 'required|string|min:3',
            'flat' => 'required|string|min:3',
            'street' => 'required|string|min:3',
            'cityId' => 'required|numeric|exists:cities,id',
            'areaId' => 'required|numeric|exists:areas,id',
         
          
        ]);

        if (!$validator->fails()) {
            $address = new Address();
            $address->street = $request->input('street');
            $address->building = $request->input('building');
            $address->flate_num	 = $request->input('flat');
            $address->city_id = $request->input('cityId');
            $address->area_id = $request->input('areaId');

            $isSaved = $request->user()->addresses()->save($address);
            $addressId = $address->id;
           
           
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!' ,'id'=>$addressId],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        $data=Address::with(['city','area'])->where('id',$address->id)->first();

        return response()->json(['message'=>'success' , 'data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
