<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $short = Str::random(6);

        $link = Link::create([
            'url' => $request->url,
            'short' => $short,
        ]);
        return response()->json($link);
    }

    public function redirect($short)
    {
        $link = Link::where('short_url', $short)->firstOrFail();
        return redirect($link->url);
    }

    public function index()
    {
        return Link::all();
    }
}
