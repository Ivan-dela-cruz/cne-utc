<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\Candidate;
use App\Enclosure;
use App\Http\Controllers\Controller;
use App\Location;
use App\Organization;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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

        $pres = Candidate::where('indent', env('POSITION_PRESIDENT', 'PR'))
            ->orderBy('name', 'ASC')
            ->get();
        $vice = Candidate::where('indent',env('POSITION_VICEPRESIDENT', 'VP'))
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
        return view('web.selects.index', compact('candidates','num_org', 'cantons'));
    }


    public function getSelectTemplateNational()
    {
        
        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $organizations = Organization::orderBy('name','ASC')->get();
        $num_org = Organization::where('status', 1)->count();
        
        return view('web.selects.national', compact('organizations','num_org' ,'cantons'));
    }
   

 public function getSelectTemplateProvince()
    {
        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $organizations = Organization::orderBy('name','ASC')->get();
        $num_org = Organization::where('status', 1)->count();
        
        return view('web.selects.province', compact('organizations','num_org' ,'cantons'));
    }
    public function getSelectTemplateParlament()
    {
        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $organizations = Organization::orderBy('name','ASC')->get();
        $num_org = Organization::where('status', 1)->count();
        
        return view('web.selects.parlament', compact('organizations','num_org' ,'cantons'));
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
    public function getMeeting($id,$gender)
    {
        $enclosure = Enclosure::find($id);
        $meetings = $enclosure[$gender];
        
        return view('web.selects.meeting',compact('meetings'))->render();
    }

    public function storeVotes(Request $request)
    {
        $id = Auth::user()->id;
        $data = $request->all();
        $list = $data['list'];
        $org = $data['organizations'];
        for ($i=0; $i < count($list); $i++) { 
           $vote = new Vote();
           $vote->user_id= $id;
           $vote->organization_id= $org[$i];
           $vote->canton= $data['canton'];
           $vote->parish= $data['parish'];
           $vote->enclosure= $data['enclosure'];
           $vote->gender= $data['gender'];
           $vote->meeting= $data['meeting'];
           $vote->votes= $list[$i];
           $vote->type_vote= env('TYPE_VOTE_ELECTION','T');
           $vote->type_election= $data['type_election'];
           $vote->save();
        }
        
            $vote = new Vote();
            $vote->user_id= $id;
            $vote->organization_id= 0;
            $vote->canton= $data['canton'];
            $vote->parish= $data['parish'];
            $vote->enclosure= $data['enclosure'];
            $vote->gender= $data['gender'];
            $vote->meeting= $data['meeting'];
            $vote->votes= $data['vote_null'];
            $vote->type_vote= env('TYPE_VOTE_NULL','N');
            $vote->type_election= $data['type_election'];
            $vote->save();

            $vote2 = new Vote();
            $vote2->user_id= $id;
            $vote2->organization_id= 0;
            $vote2->canton= $data['canton'];
            $vote2->parish= $data['parish'];
            $vote2->enclosure= $data['enclosure'];
            $vote2->gender= $data['gender'];
            $vote2->meeting= $data['meeting'];
            $vote2->votes= $data['vote_blank'];
            $vote2->type_vote= env('TYPE_VOTE_BLANK','B');
            $vote2->type_election= $data['type_election'];
            $vote2->save();

         return redirect()->route('national');
    }
    public function redirectUrlSelect($path)
    {
        switch($path){
            case env('POSITION_PRESIDENT','PR'):
                return redirect()->route('president'); 
                break;
            case env('POSITION_NATIONAL','NA'): 
                return redirect()->route('national'); 
                break;
            case env('POSITION_PROVINCE','AP'): 
                return redirect()->route('province'); 
            break;
            case env('POSITION_PARLAMENT','PA'): 
                return redirect()->route('parlament'); 
            break;

        }
    }
}
