<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Date;
use App\User;


//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Redirect;

class DatesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $period = getCurrentDates();
        $dates = Date::with('users')->with('comments.user')->where('date', '>=', $period[0]->format('Y-m-d'))->where('date', '<=', end($period)->format('Y-m-d'))->orderBy('date')->get();
        foreach ($period as $day)
        {
            Date::firstOrCreate(array('date' => $day->format('Y-m-d')));
        }
        return view('dates.index', compact('dates'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Request::all();
        $date = Date::find($input['date_id']);
        $user = User::find($input['user_id']);
        $date->users()->save($user);
        flash()->success('Teilnahme gespeichert');
        return Redirect::route('index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $user_id
	 * @return Response
	 */
	public function destroy($user_id)
	{
        $input = Request::all();
        $date = Date::find($input['date_id']);
        $date->users()->detach($user_id);
        flash()->success('Teilnahme entfernt');
        return Redirect::route('index');
	}

}
