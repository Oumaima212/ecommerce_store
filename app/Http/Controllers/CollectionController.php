<?php

namespace App\Http\Controllers;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        $collections = Collection :: all();
        return view('collection.index', compact('collections'));
    }

    public function show($slug)
    {
        $collection = Collection::where('slug', $slug)->firstOrFail();
        return view('collection.show', compact('collection'));
    }

}
