<?php

namespace App\Http\Controllers;

use App\Document;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $documents = Document::latest()->take(5)->get();
        return view('home.index', [
            'documents' => $documents,
        ]);
    }
}
