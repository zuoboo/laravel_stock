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
        $item->quantity = $request->quantity;
        $item->save();
        if ($item->quantity == 1) {
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env("LINE_MESSAGE_CHANNEL_TOKEN"));
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env("LINE_MESSAGE_CHANNEL_SECRET")]);

            $word = $item->name . "が残り少ないので買いに行ってください";
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($word);
            $response = $bot->pushMessage('U995b337233088dbc2c7be26dd0e7af4f', $textMessageBuilder);
            if ($response->isSucceeded()) {
                return redirect()->route('items.index')->with('message', 'LINEを送りました、確認してください');
            }

            // Failed
            echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        } else {
            return redirect()->route('items.index')->with('message', '編集完了!');
        }


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
