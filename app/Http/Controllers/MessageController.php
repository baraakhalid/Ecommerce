<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FavoritProduct;
use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::all();
        return response()->view('admin.contact-requests.index',['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth('user')->check()){

        $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
        $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
        return response()->view('front.contact',['name'=>$request->user()->name ,'email'=>$request->user()->email  ,'numOfProductsFavorite'=>$numOfProductsFavorite ,'numOfProductsCart'=>$numOfProductsCart]);
        }
        return response()->view('front.contact');

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
            'name' => 'required|string|min:3',
            'email' => 'required|email|exists:users,email',
            'message' => 'required|string|min:3',


        ]);


        if (!$validator->fails()) {
            $message = new Message();
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->message = $request->input('message');

            $isSaved = $message->save();
            if ($isSaved)
            return response()->json(
                ['message' => $isSaved ? 'Message Sent Successfully' : 'Send Failed!'],
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $isDeleted = $message->delete();
        
        return response()->json(
            [
                'title' => $isDeleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $isDeleted ? 'Message deleted successfully' : 'Message deleting failed!',
                'icon' => $isDeleted ? 'success' : 'error'
            ],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
