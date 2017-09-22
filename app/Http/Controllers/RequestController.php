<?php

namespace App\Http\Controllers;

use Auth;
use App\CRMRequest;
use App\Master;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $requestData = CRMRequest::all();
        $requestData['data'] = $requestData->toArray();
        return view('requests.index',$requestData);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('requests.addrequest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Auth::check()) {
            // The user is logged in...
            $newRequest = new CRMRequest;
            $allInputs = $request->all();
            $newRequest->fill($allInputs);
            $newRequest->user_id = Auth::id();
            $newRequest->start_date = date('Y-m-d', strtotime($request->start_date));
            $newRequest->due_date = date('Y-m-d', strtotime($request->due_date));
            $newRequest->save();
            
            //store status message
            Session::flash('success_msg', 'Request added successfully!');
            return redirect()->route('allrequests');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        return view('requests.view', ['crmreq' => CRMRequest::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        /**
         * Find drop-down data from "Masters" Table
         */
        $workType = Master::all()->where('type','work');
        $mduType = Master::all()->where('type','mdu');
        $caseType = Master::all()->where('type','casetype');
        
        $requestData = CRMRequest::find($id);
        
        $requestData['data'] = $requestData->toArray(); 
        $requestData['worktype'] = $workType->toArray();
        $requestData['mdutype'] = $mduType->toArray();
        $requestData['casetype'] = $caseType->toArray();
        
        //return view('requests.editrequest')->with('crmreq', $request);
        return view('requests.editrequest',$requestData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $updateData = $request->all();
        CRMRequest::find($id)->update($updateData);
        return redirect()->route('allrequests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        CRMRequest::find($id)->delete();
        return redirect()->route('allrequests');
    }

}
