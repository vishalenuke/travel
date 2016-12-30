<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Input;
use Redirect;
use View;
class RoleController extends Controller {

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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			$input = Request::all();			
			$modal = new Role;
			$modal=$modal->create($input);
			$modal->save();
			Session::flash('message','Role added successfully.');
		}catch(\Exception $e){
			Session::flash('error','Role not added.');
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
			$modal = Role::find($id);
			$array=arrayFromObject($modal,$input);
			$modal->update($array);
			Session::flash('message','Role updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','Role not updated.');
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
		//
		try{
			//$input = Request::all();			
			$modal = Role::find($id);
			$modal->delete();
			Session::flash('message','Role deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','Role not deleted.');
		}	
		return Redirect::back();
		
	}

}
