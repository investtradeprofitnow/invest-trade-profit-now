<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\SendChristmasMail;

class ChristmasController extends Controller
{
    public function crossword(){
        return view("christmas.crossword");
    }

    public function riddles(){
        return view("christmas.riddles");
    }

    public function sendRiddlesMail(Request $request){
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email",
            "riddle1" => "required",
            "riddle2" => "required",
            "riddle3" => "required",
            "riddle4" => "required",
            "riddle5" => "required",
            "riddle6" => "required",
            "riddle7" => "required",
            "riddle8" => "required",
            "riddle9" => "required",
            "riddle10" => "required",
        ]);
        $name = $request->name;
        $email = $request->email;
        $answers = array($request->riddle1, $request->riddle2, $request->riddle3, $request->riddle4, 
                        $request->riddle5, $request->riddle6, $request->riddle7, $request->riddle8,
                        $request->riddle9, $request->riddle10);
        Mail::to("sddmsinvesttradeprofitnow@gmail.com")->send(new SendChristmasMail($name, $email, $answers, "Riddles Answers:","riddles"));
        return redirect()->back()->with("success","Your answers have been submitted");
    }

    public function jumbleWords(){
        return view("christmas.jumble-words");
    }

    public function sendJumbleWordsMail(Request $request){
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email",
            "word1" => "required",
            "word2" => "required",
            "word3" => "required",
            "word4" => "required",
            "word5" => "required",
            "word6" => "required",
            "word7" => "required",
            "word8" => "required",
            "word9" => "required",
            "word10" => "required",
        ]);
        $name = $request->name;
        $email = $request->email;
        $answers = array($request->word1, $request->word2, $request->word3, $request->word4, 
                        $request->word5, $request->word6, $request->word7, $request->word8,
                        $request->word9, $request->word10);
        Mail::to("sddmsinvesttradeprofitnow@gmail.com")->send(new SendChristmasMail($name, $email, $answers, "Jumble Words Answers:","jumble words"));
        return redirect()->back()->with("success","Your answers have been submitted");
    }

    public function quiz(){
        return view("christmas.quiz");
    }

    public function sendQuizMail(Request $request){
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email",
            "child" => "required",
            "mother" => "required",
            "father" => "required",
            "number" => "required",
            "reindeer-names" => "required",
            "birthplace" => "required",
            "carol" => "required",
            "carol-name" => "required",
            "colours" => "required",
            "hanging" => "required",
        ]);
        $answer1 = "Child: ".$request->child."<br/>Mother: ".$request->mother."<br/>Father: ".$request->father;
        $answer2 = "Number of Reindeer: ".$request->number."<br/>Reindeer Names: ".$request->reindeer-names;
        $answer3 = "Birthplace: ".$request->birthplace;
        $answer4 = "Answer: ".$request->carol."<br/>Carol Name: ".$request->carol-name;
        $answer5 = "Colours ".$request->colours;
        $answer6 = "Answer: ".$request->hanging;
        $name = $request->name;
        $email = $request->email;
        $answers = array($answer1, $answer2, $answer3, $answer4, $answer5, $answer6);
    }
}
