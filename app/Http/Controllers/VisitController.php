<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class VisitController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return App\Link $link
     */
    public function store(Request $request, Link $link)
    {
        return $link->visits()
                ->create([
                    'user_agent' => $request->userAgent()
                ]);
    }
}
