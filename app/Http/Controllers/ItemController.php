<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        // dd($request);


        Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'memo' => $request->memo,
        ]);

        return redirect()->route('items.index')->with('message', '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        // dd($request);
        $quantity = $request->quantity;
        // if ($quantity == 3) {
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env("LINE_MESSAGE_CHANNEL_TOKEN"));
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env("LINE_MESSAGE_CHANNEL_SECRET")]);

            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('💩');
            $response = $bot->pushMessage('U995b337233088dbc2c7be26dd0e7af4f', $textMessageBuilder);
            if ($response->isSucceeded()) {
                // echo 'LINEを送りました';
                return redirect()->route('items.index')->with('message', 'LINEを送りました!');
            }

            // Failed
            echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        // }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
