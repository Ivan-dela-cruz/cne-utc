<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\User;
use App\Organization;
use App\Position;
use App\Enclosure;
use App\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('admin');
    }
    public function dashBoard()
    {
        $users = User::where('status',1)->get()->count();
        $enclosures = Enclosure::where('status',1)->get()->count();
        $electores = Enclosure::where('status',1)->get()->sum('voters');
        $positions = Position::where('status',1)->get()->count();
        $candidates = Candidate::where('status',1)->get()->count();
        $locations = Location::where('status',1)->get()->count();
        $organizations = Organization::where('status',1)->get()->count();
        return view('admin.init.dashboard',compact('users','enclosures','positions','candidates','locations','organizations','electores'));
    }
}
