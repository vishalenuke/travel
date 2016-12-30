<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Input;
use Redirect;
use View;
class StateController extends Controller {

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
			$model = new State;
			$model=$model->create($input);
			$model->save();
			Session::flash('message','State added successfully.');
		}catch(\Exception $e){
			Session::flash('error','State not added.');
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
			$model = State::find($id);
			$array=arrayFromObject($model,$input);
			$model->update($array);
			Session::flash('message','State updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','State not updated.');
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
			$model = State::find($id);
			$model->delete();
			Session::flash('message','State deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','State not deleted.');
		}	
		return Redirect::back();
		
	}

}
