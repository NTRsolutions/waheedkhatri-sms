<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memberstype;
use App\Members;
use App\ExcelModel;
use App\ReceiveSms;

class MembersController extends Controller
{

	public function membersData(){
//		$getData = Members::whereNull('type')->get();
		$getData = Memberstype::with('members')->get();
		$dataType = 'invidual';
		return view('backend.members_data', compact('getData', 'dataType'));
	}

	public function registerForm(){
		$meberType = Memberstype::get();
		return view('backend.add_member' ,compact('meberType'));
	}
	public function excellMembersData(){
		//$getData  = Members::where('type','Excel')->get();
		$getData = Memberstype::with('members')->get();
//		dd($getData->type);
		$dataType = 'Excell';
		return view('backend.members_data', compact('getData', 'dataType'));
	}
	public function ExcelForm(){
		$meberType = Memberstype::get();
		return view('backend.add_memberby_excel' ,compact('meberType'));
	}

	public function membersType($id){
		//Members::where('id',$id)->get();
		$membersType = Memberstype::find($id);
		$getData = Members::with('membersType')->where('membertype_id',$id)->get();

		return view('backend.members_databytype', compact('getData', 'membersType'));
	}

	public function deletMember($id){
		Members::where('id',$id)->delete();
		return redirect()->route('members-data');
	}

	public function deletMemberExcel($id){
		Members::where('id',$id)->delete();
		return redirect()->route('excel-members-data');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'address' => 'required',
			'phone' => 'required',
			'password' => 'required|string|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'address' => $data['address'],
			'phone' => $data['phone'],
			'remember_token' => $data['_token'],
			'type' => 'user',
			'password' => bcrypt($data['password']),
		]);
	}
	public function register(Request $request)
	{
		$data = ['membertype_id' => $request->membertype_id,'name'=> $request->name ,'phone'=> $request->phone, 'type' => 'invidual'];
		Members::create($data);

		return redirect()->route('members-data');
	}


	public function smsPage(){
		$meberType = Memberstype::get();
		return view('backend.bulksms' ,compact('meberType'));
	}

	public function smsSinglePage(){
		return view('backend.singlesms');
	}

	public function clicktocall(){
		return view('backend.clicktocall');
	}
	public function browserCall(){
		return view('backend.browsercall');
	}

	/*
	 * Delete Member Record
	 * */
	public function deleteMemberStop($phone,$sms_id){

		Members::where('phone',$phone)->delete();
		ReceiveSms::where('id',$sms_id)->delete();
		return redirect()->route('receivesmsdata');
	}

}
