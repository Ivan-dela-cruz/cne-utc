<?php

namespace App\Http\Controllers\Web;
use App\Organization;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {

        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $num_org = Organization::where('status', 1)->count();
        $organizations = Organization::join('votes','votes.organization_id','=','organizations.id')
        ->join('locations','votes.canton','=','locations.id')
        ->join('locations as parishes','votes.parish','=','parishes.id')
        ->join('enclosures','votes.enclosure','=','enclosures.id')
        ->select('organizations.name as organization','locations.name as canton','parishes.name as parish',
        'enclosures.name as enclosure','votes.gender','votes.meeting','votes.votes','votes.type_vote','votes.type_election')
        ->paginate(10);
       

        return view('web.results.index', compact('organizations','num_org' ,'cantons'));
    }
}
