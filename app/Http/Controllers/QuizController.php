<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller {
    public function start() {
        $questions = Question::all();
        return view('quiz.start', compact('questions'));
    }

    public function submit(Request $request) {
        $attempt = Attempt::create(['user_id'=>Auth::id(),'score'=>0]);
        $score = 0;
        foreach($request->answers as $qid=>$given){
            $q = Question::find($qid);
            $correct = strtolower(trim($given))==strtolower(trim($q->answer));
            if($correct) $score++;
            Answer::create(['attempt_id'=>$attempt->id,'question_id'=>$qid,'given_answer'=>$given,'is_correct'=>$correct]);
        }
        $attempt->update(['score'=>$score]);
        return redirect()->route('quiz.result',$attempt->id);
    }

    public function result($id){
        $attempt = Attempt::with('answers.question')->findOrFail($id);
        return view('quiz.result',compact('attempt'));
    }
}
