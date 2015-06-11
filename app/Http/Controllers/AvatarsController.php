<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Avatar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AvatarsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $directory = "avatarImages";
		$avatars = File::allFiles($directory);
        $avatarPaths = array();

        foreach ($avatars as $file) {
            $file = (string)$file;
            array_push($avatarPaths,pathinfo($file));
        }
        $avatarPaths = json_decode(json_encode($avatarPaths), FALSE);
        //return $avatarPaths;
        return view('avatars.index', compact('avatarPaths'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($filename)
	{
       $user = User::findOrFail(Auth::user()->id);
       if ($user->avatar){
            $user->avatar->update(['filename' => $filename]);
        }
        else{
            $avatar = Avatar::create(['filename' => $filename, 'user_id' => $user->id]);
        }
        flash()->success('Avatar gespeichert');
        return Redirect::route('index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	}

}
