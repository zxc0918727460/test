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
		$name = $request->name;
		if($member = Check::where('name', $name)->get()->isNotEmpty()){
			\Session::flash('flash_message', '新增失敗，姓名重複');
			return redirect('/create')->withInput();
		} else {
			$check = new Check;
			$check->name = $request->name;
			$check->users_cellphone = $request->cellphone;
			$check->ticket_check = false;
	
			$check->save();
			\Session::flash('flash_message', '新增成功!! ');
		}
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
		$name = $request->member_name;
		if($xx = Check::where('name', $name)->first()){
			if($xx->ticket_check == true){
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
		$name = $request->member_name;
		if(	$update = Check::where('name', $name)->first()){
			if($update->ticket_check){
				\Session::flash('flash_message', '此會員已購票!! ');
			}else{
				$update->ticket_check = true;
				$update->update();
				\Session::flash('flash_message', '已更新會員購票資訊!! ');
			}	
		}else{
			\Session::flash('flash_message', '查無會員!! ');
		}
		return view('update');
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
