<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Civ;
use App\Bonus;

class CivsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $civs = Civ::all();
        $bonuses = Bonus::all();
        return view('civs.index',['civs'=>$civs, 'bonuses' => $bonuses]);
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
        $civ = Civ::find($id);
        $bonuses = Civ::find($id)->bonuses;
        return view('civs.edit', ['civ'=>$civ, 'bonuses' => $bonuses]);
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
        $civ = Civ::find($id);
        $bonuses =  Bonus::where('civ_id',"=",$id)->get();

        $i = 0;
        foreach($bonuses as $bonus) {
            $bonus->bonus_type = $request->input('bonus' . $i);
            $bonus->save();
            $i++;
        }

        $civ->name = $request->input('name');
        $civ->expansion = $request->input('expansion');
        $civ->army_type = $request->input('army_type');
        $civ->team_bonus = $request->input('team_bonus');
        $civ->save();

        return redirect('/civs')->with('success', ('Civilization ' . $civ->name . ' Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $civ = Civ::find($id);
        $bonuses =  Bonus::where('civ_id',"=",$id)->get();

        foreach($bonuses as $bonus) {
            $bonus->delete();
        }

        $civ->delete();

        return redirect('/civs')->with('success', ('Civilization ' . $civ->name . ' Removed'));
    }
}
