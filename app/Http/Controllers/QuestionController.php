<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller {
    public function index() {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create() { return view('questions.create'); }

    public function store(Request $request) {
        Question::create([
            'type' => $request->type,
            'question' => $request->question,
            'options' => $request->options ? explode('|',$request->options) : null,
            'answer' => $request->answer,
        ]);
        return redirect()->route('questions.index');
    }

    public function uploadCsv(Request $request) {
        $request->validate(['csv_file'=>'required|mimes:csv,txt']);
        $rows = array_map('str_getcsv', file($request->file('csv_file')->getRealPath()));
        $header = array_shift($rows);
        foreach($rows as $row){
            $data = array_combine($header,$row);
            Question::create([
                'type'=>$data['type'],
                'question'=>$data['question'],
                'options'=>$data['options']?explode('|',$data['options']):null,
                'answer'=>$data['answer'],
            ]);
        }
        return redirect()->route('questions.index');
    }
}
