<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Option;
use App\Question;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;

class PollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('polls.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function vote(Request $request, $q_id)
    {

        $this->validate($request, array(
            'choice' => 'required'
        ));

        $selected_option = $request->input('choice');
        
        $option = Option::where([
                ['id', '=', $selected_option],
                ['question_id', '=', $q_id],
            ])->first();

        $user = Auth::id();

        $votes = DB::table('users')->select('vote_count')->where('id','=',$user)->first();

        if($votes->vote_count<3) {
            $option->votes_count += 1;
            $option->save();

            DB::table('users')->where('id', '=', $user)->increment('vote_count');

            Session::flash('success', 'Гласувахте успешно!');
        }else {
            Session::flash('danger', 'Не може да гласувате повече от 3 пъти :(');
        }
        return redirect()->route('question.result', $q_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('polls.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
