<?php

namespace App\Http\Controllers;

use App\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agents::all();
        return view('Agents.index') ->with('agents', $agents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'first_name'       => 'required',
            'last_name'       => 'required',
            'company'       => 'required'

        );
        $validator = Validator::make($request->all(), $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('agents/create')
                ->withErrors($validator)
                ->withInput($request->all())->with('message', 'There is a problem ...');
        } else {
            $agents = new Agents([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'company' => $request->get('company')
            ]);
            $agents->save();
            return redirect('agents/create')->with('message', 'Added new agent!');
        }
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
