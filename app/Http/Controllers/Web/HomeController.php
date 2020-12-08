<?php

namespace App\Http\Controllers\Web;

use App\Candidate;
use App\Enclosure;
use App\Http\Controllers\Controller;
use App\Location;
use App\Organization;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    //
    public function index()
    {
        //
        $positions = Position::orderBy('name', 'ASC')->where('status', 1)->get();
        return view('web.index', compact('positions'));
    }

    public function getMapTemplate(Request $request)
    {
        $province = $request->province_id;
        $canton = $request->canton_id;
        $parish = $request->parish_id;

        return view('web.maps.map', compact('province', 'canton', 'parish'));
    }

    public function getSelectTemplate()
    {
        $enclosures = Enclosure::orderBy('name', 'ASC')->get(['id', 'name']);
        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $parishes = Location::where('type', 3)->get(['id', 'name']);
        $pres = Candidate::where('position_id', 1)
            ->orderBy('name', 'ASC')
            ->get();
        $vice = Candidate::where('position_id', 2)
            ->orderBy('name', 'ASC')
            ->get();
        $num_org = Organization::where('status', 1)->count();
        $candidates = new Collection();
        foreach ($pres as $pre) {
            $lista = new Collection();
            foreach ($vice as $vic) {
                if ($pre->organization_id == $vic->organization_id) {
                    $lista = [
                        'presi' => $pre,
                        'vice' => $vic
                    ];
                }
            }
            $candidates->push($lista);
        }
        return view('web.selects.index', compact('candidates', 'num_org', 'enclosures', 'cantons', 'parishes'));
    }

    public function getSelectParish($id)
    {
        $parishes = Location::where('type_id',$id)->where('type',3)->get();
        $parish = $parishes->first();
        $view_select = view('web.selects.parishes',compact('parishes'))->render();
        return response()->json([
            'view'=>$view_select,
            'location_id' => $parish->id
        ]);
    }
    public function getSelectEnclosure($id)
    {
        $enclosures = Enclosure::where('location_id',$id)->get();
        return view('web.selects.enclosures',compact('enclosures'))->render();
    }

}
