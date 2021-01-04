<?php

namespace App\Http\Controllers\Web;
use App\Organization;
use App\Location;
use App\Position;
use App\Enclosure;
use App\Vote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ResultController extends Controller
{
    public function index()
    {
        
        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $num_org = Organization::where('status', 1)->count();
        $organizations = Organization::join('votes','votes.organization_id','=','organizations.id')
        ->join('locations','votes.canton','=','locations.id')
        ->join('locations as parishes','votes.parish','=','parishes.id')
        ->select('organizations.name as organization','locations.name as canton','parishes.name as parish',
                 'votes.gender','votes.meeting','votes.votes','votes.type_vote','votes.type_election')
        ->paginate(10);
       
        $positions = Position::orderBy('name','ASC')->where('status',1)->get();

        return view('web.results.index', compact('organizations','num_org' ,'cantons','positions'));
    }
    public function getResum(Request $request, $id)
    {
        $position = $request->query('position');
        $enclosures = Enclosure::where('location_id',$id)->where('status',1)->get();

        $data = [
            'voters'=>$enclosures->sum('voters'),
            'voters_mas'=>$enclosures->sum('voters')/2,
            'voters_fem'=>$enclosures->sum('voters')/2,
            'total'=> $enclosures->sum('meeting_total'),
            'mas'=> $enclosures->sum('meeting_mas'),
            'fem'=>$enclosures->sum('meeting_fem')
        ];

        $vote_t = Vote::where('type_vote','T')->where('type_election',$position)->where('parish',$id)->sum('votes');
        $vote_tfem = Vote::where('type_vote','T')->where('type_election',$position)->where('parish',$id)->where('gender','meeting_fem')->sum('votes');
        $vote_tmas = Vote::where('type_vote','T')->where('type_election',$position)->where('parish',$id)->where('gender','meeting_mas')->sum('votes');

        $vote_n = Vote::where('type_vote','N')->where('type_election',$position)->where('parish',$id)->sum('votes');
        $vote_nfem = Vote::where('type_vote','N')->where('type_election',$position)->where('parish',$id)->where('gender','meeting_fem')->sum('votes');
        $vote_nmas = Vote::where('type_vote','N')->where('type_election',$position)->where('parish',$id)->where('gender','meeting_mas')->sum('votes');

        $vote_b = Vote::where('type_vote','B')->where('type_election',$position)->where('parish',$id)->sum('votes');
        $vote_bfem = Vote::where('type_vote','B')->where('type_election',$position)->where('parish',$id)->where('gender','meeting_fem')->sum('votes');
        $vote_bmas = Vote::where('type_vote','B')->where('type_election',$position)->where('parish',$id)->where('gender','meeting_mas')->sum('votes');


        return view('web.results.resum',
        compact('data','vote_t','vote_n','vote_b',
                'vote_tfem','vote_tmas',
                'vote_nfem','vote_nmas',
                'vote_bfem','vote_bmas'
                ));
    }
    public function getTotal(Request $request,$id)
    {
        $position = $request->query('position');
        $organizations = Organization::join('votes','votes.organization_id','=','organizations.id')
        ->join('locations as parishes','votes.parish','=','parishes.id')
        ->select('organizations.name as organization','parishes.id as parish_id',
                 'votes.votes','votes.type_vote','votes.type_election','votes.type_election')
        ->where('parishes.id',$id)
        ->where('votes.type_election',$position)
        ->orderBy('votes.votes','DESC')
        ->groupBy('organizations.name')
        ->get();
        
        $total = 0;
       foreach($organizations as $organization){
            $total += $organization->votes;
       }
        
       return view('web.results.total',compact('organizations','total'));
    }

    public function getChart(Request $request,$id)
    {
        $position = $request->query('position');
        $organizations = Organization::join('votes','votes.organization_id','=','organizations.id')
        ->join('locations as parishes','votes.parish','=','parishes.id')
        ->select('organizations.name as organization','parishes.id as parish_id',
                 'votes.votes','votes.type_vote','votes.type_election','votes.type_election')
        ->where('parishes.id',$id)
        ->where('votes.type_election',$position)
        ->orderBy('votes.votes','DESC')
        ->groupBy('organizations.name')
        ->get();
        
        $total = 0;
        foreach($organizations as $organization){
            $total += $organization->votes;
        }

       $values =  array();
       $labels = array();
       $cont = 0;
       foreach($organizations as $organization){
          $values[$cont] = round(($organization->votes/$total)*100,2);
          $labels[$cont] = $organization->organization;
          
          $cont ++;
       }
        
       return response()->json([
           'values_organization'=>$values,
           'labels'=>$labels
       ]);
    }

    public function webster(Request $request)
    {
        $position = $request->query('position');
        $counter = $this->getDiv($position);
        $series =  $this->getImparSeries($counter);
        $organizations = Organization::where('status',1)->get(['id','name']);
        $results = new Collection();
        $final = new Collection();
        foreach($organizations as $organization){
            $lista = new Collection();
            $votes = $organization->votes()->where('type_election',$position)->sum('votes');
            $lt1 = new Collection();
            for ($i=0; $i < count($series) ; $i++) { 
                $lt2 = new Collection();
                $lt2 = [
                    'name' =>$organization->name,
                    'votes' => sprintf('%0.5f', ($votes/$series[$i]))
                ];
                $final->push( $lt2);
                $lt1->push($lt2);
            }
            $lista = [
                'id'=>$organization->id,
                'organization'=>$organization->name,
                'votes'=>$votes,
                'lista'=>$lt1
            ];
            $results->push($lista);
        }

        $sorted = $final->sortByDesc("votes");
        $winners =  $sorted->values()->all();
        $collection = collect($winners);
        $webster = collect($collection->take($counter));
       
        //$chunk->all()
       return view('web.westerm.table',compact('results','series','webster'));
        
       
    }
    public function websterTemplate(Request $request)
    {
        $positions = Position::orderBy('name','ASC')->where('status',1)->get();
        return view('web.westerm.index',compact('positions'))->render();
    }
    public function getDiv($position)
    {
        $div = 1;
        switch( $position){
            case "PR": 
                $div = 1;
                break;
            case "AN": 
                $div = 15;
                break;
            case "AP": 
                $div = 4;
                break;
            case "PA": 
                $div = 5;
                break;
        }
        return $div;
    }

    public function getImparSeries($limit)
    {
        $lista = array();
        $cont = 0;
        for ($i=1; $i < 100; $i++) {
            if ( $i % 2 != 0) { 
                $lista[$cont] = $i;
                $cont ++;
               
               if($limit==$cont){
                    break;
               }
            }
        }
        return  $lista;
    }
}
