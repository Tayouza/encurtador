<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Bitlink;
use Illuminate\Http\Request;

class BitlinkController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return redirect
     */
    public function index(string $url)
    {
        $bitlink = Bitlink::where('new_url', $url)->first();
        return $bitlink?->main_url !== null ? redirect()->to($bitlink->main_url) : view('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['url' => 'required|url']);
        $url = $request->url;
        $newUrl = Str::random(8);
        Bitlink::create([
            'main_url' => $url,
            'new_url' => $newUrl,
        ]);
        return redirect()->route('create-bitlink')->with('newUrl', $newUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
