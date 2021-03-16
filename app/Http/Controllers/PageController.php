<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        return view('page.show', compact('page'));
    }
}
