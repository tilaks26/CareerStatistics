<?php

namespace App\Http\Controllers;

use DB;
use Job;
use Illuminate\Http\Request;

class ViewController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, array(
                'month' => 'required',
                'year' => 'required',
            ));

        $users = DB::table('job')->where('month', $request->month)->where('year', $request->year)->get();
        $value = '<col width="130"> <col width="80"> <tr> <th class="col-md-3">Name</th> <th class="col-md-3">Position</th> <th class="col-md-3">Email</th> </tr>';
        foreach ($users as $user) {
            $value .= '<tr> <td class="col-md-3"> ' . $user->username . '</td>';
            $value .= ' <td class="col-md-3"> ' . $user->position . '</td>';
            $value .= ' <td class="col-md-3"> ' . $user->email . '</td> </tr>';
        }

        return response()->json([
            'status' => 'success',
            'msg' => $value
        ]);
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
