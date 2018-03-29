<?php

namespace App\Http\Controllers;

use App\Option;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $option = new Option;

        $this->validate($request, array(
            'description' => 'required | min:2'
        ));

        $option->description = $request->input('description');
        $option->question_id = $id;
        $option->save();

        Session::flash('success', 'Option successfully added');

        return redirect()->route('question.show', $id);
    }


    /*public function vote($q_id, $o_id)
    {

    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $q_id)
    {
        $option = Option::find($id);
        $question = Question::find($q_id);
        return view('options.edit')->with('option', $option)->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $q_id)
    {
        $option = Option::find($id);

        $this->validate($request, array(
            'description' => 'required | min:2'
        ));

        $option->description = $request->input('description');
        $option->save();

        Session::flash('success', 'Option successfully Updated');

        return redirect()->route('question.show', $q_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $q_id)
    {

        $option = Option::find($id);

        $option->delete();

        Session::flash('success', 'Option successfully Deleted');

        return redirect()->route('question.show', $q_id);
    }
}
