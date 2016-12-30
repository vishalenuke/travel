<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Input;
use Redirect;
use View;
class CityController extends Controller {

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
			$model = new City;
			$model=$model->create($input);
			$model->save();
			Session::flash('message','City added successfully.');
		}catch(\Exception $e){
			Session::flash('error','City not added.');
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
			$model = City::find($id);
			$array=arrayFromObject($model,$input);
			$model->update($array);
			Session::flash('message','City updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','City not updated.');
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
			$model = City::find($id);
			$model->delete();
			Session::flash('message','City deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','City not deleted.');
		}	
		return Redirect::back();
		
	}

}
