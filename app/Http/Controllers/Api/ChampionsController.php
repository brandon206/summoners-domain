<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Champion;
use App\ChampionTrait;

class ChampionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $champion_data = Champion::all();
        foreach ($champion_data as $champion)
        {
            $traits = $champion::find($champion->id)->traits;
            $listOfTraits = [];
            for ($x = 0; $x < count($traits); $x++) {
                array_push($listOfTraits, $traits[$x]->trait); 
            }
            $champion->traits = $listOfTraits;
        }
        return $champion_data;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $champion_data = Champion::find($id);
        $traits = $champion_data->traits;
        $listOfTraits = [];
        for ($x = 0; $x < count($traits); $x++) {
            array_push($listOfTraits, $traits[$x]->trait);
        }
        $champion_data->traits = $listOfTraits;
        return $champion_data;
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
        //
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
}
