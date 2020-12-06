<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;

class HomeController extends Controller
{
    //
    public function index()
    {
        //
        $positions = Position::orderBy('name', 'ASC')->get();
        return view('web.index',compact('positions'));
    }
}
