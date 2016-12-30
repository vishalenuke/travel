<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Input;
use Redirect;
use View;
class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		
	}

	public function arrayFromObject($object,$input){
		$array=array();
		foreach ($object as $key => $value) {
      			$array[$key]=isset($input[$key])?$input[$key]:'';
  		}
  		return $array;
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			$input = Request::all();
			$user=new User;
			$user=$user->create($input);


			$user->save();
			Session::flash('message','User added successfully.');
		}catch(\Exception $e){
			Session::flash('error','User not added.');
		}
		
		return Redirect::back();		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
	
		
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try{
			$input = Request::all();
			$user=User::find($id);
			$userArray=arrayFromObject($user,$input);
			$user=$user->update($userArray);
			Session::flash('message','User updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','User not updated.');
		}	
		return Redirect::back();
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{			
			$user=User::find($id);
			$user->delete();
			Session::flash('message','User deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','User not deleted.');
		}	
		return Redirect::back();
		
	}

}
