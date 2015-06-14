<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;

//use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;
use Request;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCommentRequest $request
     * @return Response
     */
	public function store(CreateCommentRequest $request)
	{
        $input = Request::all();
        Comment::Create(array('user_id' => Auth::user()->id, 'text'=> $input['text'], 'date_id'=>$input['date_id']));
        flash()->success('Kommentar gespeichert');
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
        $comment = Comment::find($id);
        $comment->delete();
        flash()->success('Kommentar entfernt');
        return Redirect::route('index');
	}

}
