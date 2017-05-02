<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\HtmlString;
use Auth;
use App\Resource;
use Job;
use DB;
use Log;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Show the Manage Resources page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resource()
    {
        $names = DB::table('job')->select('name')->groupBy('name')->get();
        $rnames = DB::table('resource')->select('name')->whereNotNull('link')->groupBy('name')->get();
        $error = 2;
        return view('/resource', ['names' => $names, 'error' => $error, 'rnames' => $rnames]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
                'name' => 'required|max:255',
                'link' => 'required|max:255',
            ));

        $resource = new Resource;
        $duplicate = DB::table('resource')->select('name')->where('name', $request->name)->get();
        Log::info($duplicate);
        Log::info("--------");
        if ($duplicate->count() == 0)
        {
            Log::info(" IF INSIDE ");
            $resource->name = $request->name;
            $resource->link = $request->link;
            $resource->save();
            $insert_err = 1;
        }
        else
        {
            DB::table('resource')
                ->where('name', $request->name)
                ->update(['link' => $request->link]);

            $insert_err = 0;
        }

        $names = DB::table('job')->select('name')->groupBy('name')->get();
        $rnames = DB::table('resource')->select('name')->whereNotNull('link')->groupBy('name')->get();
        return view('/resource', ['names' => $names, 'error' => $insert_err, 'rnames' => $rnames]);
    }

    /**
     * Remove resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $this->validate($request, array(
                'name' => 'required|max:255',
            ));

        DB::table('resource')
            ->where('name', $request->name)
            ->update(['link' => NULL]);
        Log::info("Coming to remove");
        $names = DB::table('job')->select('name')->groupBy('name')->get();
        $error = 3;
        $rnames = DB::table('resource')->select('name')->whereNotNull('link')->groupBy('name')->get();
        return view('/resource', ['names' => $names, 'error' => $error, 'rnames' => $rnames]);
    }

    /**
     * Show the Manage Companies page.
     *
     * @return \Illuminate\Http\Response
     */
    public function company()
    {
        $names = DB::table('job')->select('username')->get();
        $positions = [];
        $error = 2;
        return view('/company', ['names' => $names, 'positions' => $positions, 'error' => $error]);
    }

    /**
     * Show the Manage Companies page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function positions(Request $request)
    {
        $positions = DB::table('job')->select('position')->where('username', $request->username)->get();
        $value = "";
        foreach ($positions as $temp) {
            $value .= "<option value='" . $temp->position . "'>" . $temp->position ."</option>";
        }
        return response()->json([
            'status' => 'success',
            'msg' => $value
        ]);
    }

    /**
     * Delete a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $this->validate($request, array(
                'name' => 'required|max:255',
                'position' => 'required',
            ));

        DB::table('job')->where('username', $request->name)->where('position', $request->position)->delete();
        $error = 0;
        $positions = [];
        $names = DB::table('job')->select('username')->get();
        return view('/company', ['names' => $names, 'positions' => $positions, 'error' => $error]);
    }

}
