<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Check;


class CheckMember extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('check');
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
        
        $check = new Check;
        $check->name = $request->name;
        $check->users_cellphone = $request->cellphone;
        $check->check = false;

        $check->save();
        \Session::flash('flash_message', '新增成功!! ');
        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        if($check = Check::find($id)){
            if($check->check == true){
                \Session::flash('flash_message', '已領票!! ');

            }else{
                \Session::flash('flash_message', '未領票!! ');
            }
        }else{
            \Session::flash('flash_message', '無該會員!! ');
        }
        return view('check');
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
    public function update(Request $request)
    {
        $id = $request->id;
        $update = Check::find($id);
        if($update->check){
            \Session::flash('flash_message', '此會員已購票!! ');
        }else{
            $update->check = true;
            $update->update();
            \Session::flash('flash_message', '已更新會員購票資訊!! ');
        }
        return redirect('/update');
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
