<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Vote;
use App\Location;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $type = $request->query('type');

        $cantons = Location::where('type', 2)->get(['id', 'name']);
        $organizations = Organization::orderBy('name','ASC')->get();
        $num_org = Organization::where('status', 1)->count();
        $votes = Vote::all();
        $list = [
            'PR'=>'PRESIDENCIA',
            'AN'=>'ASAMBLEISTAS NACIONALES',
            'AP'=>'ASAMBLEISTAS PROVINCIALES',
            'PA'=>'PARLAMENTARIOS ANDINOS'
          ];

        if(!is_null($type)){
            $locations = Location::where('type', $type)
            ->where('name', 'like', "%{$keyword}%")
            ->paginate(10);
        }else{
            $locations = Location::where('type', 1)->paginate(10);
            $type = "1";
        }
        return view('admin.votes.index', compact('votes','list','organizations','num_org' ,'cantons','locations', 'keyword','type'));
    }

    public function getTable(Request $request)
    {
       
        
        $can = $request->canton;
       
        $par = $request->parish;
        $en = $request->enclosure;
        $gen = $request->gender;
        $mee = $request->meeting;
        $org = $request->organization;
        $pos = $request->position;
       
        $votes = Vote::where('canton',$can)
        ->where('parish',$par)
        ->where('enclosure',$en)
        ->where('gender',$gen)
        ->where('meeting',$mee)
       // ->where('organization_id',$org)
        ->where('type_election',$pos)
        ->get();
        
        return view('admin.votes.table',compact('votes'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    
             $user = Auth::user()->id;

            DB::beginTransaction();
            $data = $request->all();
            $vote = new Vote();
            $data['user_id']= $user;
                if($data['gender']=="on") 
                 {
                    $data['gender']=1;

                  }
                  else{

                     $data['gender']=0;

                  }
                  
            $data['type_vote']=1;
            $data['election_id']=1;
            
         
            $vote->fill($data);
            $vote->save();
            DB::commit();
            return redirect()->route('inicio')->with('status', '¡Voto realizado con exito!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeVotes(Request $request, $id)
    {
        $vote = Vote::find($id);
        $vote->votes = $request->votes;
        $vote->save();

        return response()->json([
            'status'=>true,
            'location'=>$vote
        ],200);
        
    }
}
