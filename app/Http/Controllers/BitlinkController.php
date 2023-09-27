<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Bitlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BitlinkController extends Controller
{    
    public function index(string $url)
    {
        $bitlink = Bitlink::where('new_url', $url)->first();
        return $bitlink?->main_url !== null ?
            redirect()->to($bitlink->main_url) :
            view('error', ['error' => (object) [
                'code'    => 404,
                'message' => 'Page not found' 
            ]]);
    }

    public function create()
    {
        return view('bit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url',
            'path' => 'nullable|unique:bitlinks,new_url|string'
        ], attributes: ['path' => 'caminho']);
        $url = $request->url;
        $newUrl = $request->input('path') ? str()->slug($request->input('path')) : Str::random(8);
        try{
            Bitlink::create([
                'main_url' => $url,
                'new_url' => $newUrl,
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return view('error', ['error' => (object) [
                'code'    => 500,
                'message' => 'Internal server error'
            ]]);
        }
        return redirect()->route('create-bitlink')->with('newUrl', $newUrl);
    }

    public function list()
    {
        return view('list-links', [
            'links' => Bitlink::all()
        ]);
    }
}
