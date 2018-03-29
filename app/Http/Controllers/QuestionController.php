<?php

namespace App\Http\Controllers;

use App\Option;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('results');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $questions = Question::all();
        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $question = new Question;

        $this->validate($request, array(
            'question' => 'required | max:500 | min:20'
        ));

        $question->question = $request->input('question');
        $question->save();

        Session::flash('success', 'Question successfully added');

        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $options = Option::all();
        return view('questions.show')->with('question', $question)->with('options', $options);
    }


    public function results($q_id){
        $question = Question::find($q_id);
        $options = Option::all();

        $sum = 0;
        foreach($question->options as $options){
            $each_votes = $options->votes_count;
            $sum += $each_votes;
        }

        return view('questions.result')->
            with('question', $question)->
            with('options', $options)->
            with('sum', $sum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        $this->validate($request, array(
            'question' => 'required | max:500 | min:20'
        ));

        $question->question = $request->input('question');
        $question->save();

        Session::flash('success', 'Question successfully Updated');

        return redirect()->route('question.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        $question->delete();

        Session::flash('success', 'Question successfully Deleted');

        return redirect()->route('question.index');
    }
}
