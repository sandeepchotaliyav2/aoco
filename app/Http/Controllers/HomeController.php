<?php

namespace App\Http\Controllers;
use App\User_files;
use App\CRMRequest;
use Illuminate\Http\Request;
use Excel;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all request table data
        $requestData = CRMRequest::all();
        $requestData['data'] = $requestData->toArray();
        return view('home',$requestData);
    }

    public function create_request()
    {
        return view('admin.admin_create_request');
    }

    public function adminUploadFile(Request $request)
    {
        $fileData = $request->all();
        $request_id = $request->request_id;
        $reqData = CRMRequest::where('id', $request_id)->first();
        print_r($reqData->toArray());
        //die('data');

        if($reqData['work_type'] == "map-out"){
            $dataa = $this->getFileData($fileData,$request_id);
            print_r($dataa);
        }
        // foreach ($files['upload'] as $file) {
        //     //Get file name
        //     $filename = $file->getClientOriginalName();
        //     //Move Uploaded File
        //     $destinationPath = 'uploads';
        //     $filename = time().'_'.$filename;
        //     // $path = $file->move($destinationPath,$filename);

        //     // $data = User_files::create([
        //     //     'user_id' => "2",
        //     //     'request_id' => $request->request_id,
        //     //     'file_path' => $filename,
        //     //     'file_name'=>$file->getClientOriginalName(),
        //     //     'outbound_type'=>"MOU",
        //     //     'created'=>time(),
        //     //     'status'=>"active"
        //     // ]);

        //     // print_r($data);
        //     $userFileName = "Affiliate Menus by Profile 08_17_2017_02_38_39_AM_USA_Allocation (1).xlsx";

        //     //get excel file data

        //     $data = $this->getFileData($userFileName);
        //     $data->each(function($sheet) {

        //         // Loop through all rows
        //         $sheet->each(function($row) {
        //             print_r($row);die;
        //         });

        //     });
            
        // }
        
    }

    public function getFileData($data,$request_id)
    {
        ini_set('memory_limit', '12800M');

        foreach ($data['upload'] as $file) {
            //Get file name
            $filename = $file->getClientOriginalName();
            //Move Uploaded File
            $destinationPath = 'uploads';
            $filename = time().'_'.$filename;
            // $path = $file->move($destinationPath,$filename);

            $data = User_files::create([
                'user_id' => "2",
                'request_id' => $request_id,
                'file_path' => $filename,
                'file_name'=>$file->getClientOriginalName(),
                'outbound_type'=>"MOU",
                'created'=>time(),
                'status'=>"active"
            ]);
            $path = 'public/uploads/'.$filename;

            return Excel::load($path, function($reader) {
                   
                   })->get();
        }        
    }
}
