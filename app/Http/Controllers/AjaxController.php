<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index(){
        $users = DB::table('ajax')->get();
        return view('ajaxprac')->with('users',$users);
    }

    public function getdata(){
        $users = DB::table('ajax')->get();
        return response()->json(['users'=>$users,'status'=>"ok"]);
    }
    public function store(Request $request){
        // return "ok";
        // dd($request);
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|email'
        ]);
        // $validator = Validator::make($request->all,[
        //     'name'  => 'required',
        //     'email' => 'required|email'
        // ]);

        // if($validator->fails()){
        //     return response()->json([
        //         'status' => 200,
        //     ]);
        // }
        // else{

        // }
        $data = array([
            'name'  => $request->input('name'),
            'email' => $request->input('email')
        ]);
        // dd($data);
        DB::table('ajax')->insert($data);
        // dd($data);
        // return back()->with('resp','record inserted');
        return response()->json('ok');
    }

    public function edit($id){
        $user = DB::table('ajax')->where('id',$id)->get()[0];
         return response()->json($user);
    }
    public function update(Request $request){
        // dd($request);

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required'
        ]);
        DB::table('ajax')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return  response()->json("ok");

    }

    public function destroy($id){
        $deleted = DB::table('ajax')->where('id',$id)->delete();
        return response()->json($deleted);
    }
}
