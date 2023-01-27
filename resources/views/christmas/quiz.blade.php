@extends("christmas.app")
@section("pageTitle", "Christmas Quiz")
@section("css")
    <style type="text/css">       
        li, label{
            font-weight: bold;
        } 
        .container{
            width: 50% !important;
        }
    </style>
@stop
@section("content")
    <h1 class="py-3 text-center"><strong><i>Christmas Quiz</i></strong></h1>
    <div class="christmas-bg">
        <div class="container text-left pt-3">
            @if(session("success"))
                <div class="success mb-3 p-3">{{session("success")}}</div>
            @endif
            <form id="riddles-form" method="post" action="{{route('send-quiz-mail')}}">
                {{ csrf_field() }}
                <div class="form-group mt-3">
                    <label for="riddle1">Your Name:</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="50" size="50" required>
                </div>
                <div class="form-group mt-3">
                    <label for="riddle1">Your Email:</label>
                    <input type="email" class="form-control" name="email" id="email" maxlength="50" size="50" required>
                </div>
                <ol>
                    <li class="mt-4">
                    	Whose birth is celebrated as Christmas? And what are the parents name of the child?
                        <div class="form-group mt-3">
                            <label for="child">Child:</label>
                            <input type="text" class="form-control" name="child" id="child" maxlength="20" size="20" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="mother">Mother:</label>
                            <input type="text" class="form-control" name="mother" id="mother" maxlength="20" size="20" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="father">Father:</label>
                            <input type="text" class="form-control" name="father" id="father" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	How many reindeers does a Santa Claus sleigh have? What are the reindeer's name?
                        <div class="form-group mt-3">
                            <label for="number">Number:</label>
                            <input type="text" class="form-control" name="number" id="number" maxlength="2" size="20" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="names">Reindeer Names: (Seperate by comma)</label>
                            <input type="text" class="form-control" name="reindeer-names" id="reindeer-names" maxlength="100" size="100" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	What is the birthplace of Jesus?
                        <div class="form-group mt-3">
                            <label for="birthplace">Answer:</label>
                            <input type="text" class="form-control" name="birthplace" id="birthplace" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	What is sung on Christmas and name any one of it?
                        <div class="form-group mt-3">
                            <label for="riddle4">Answer:</label>
                            <input type="text" class="form-control" name="carol" id="carol" maxlength="20" size="20" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="riddle4">Name one:</label>
                            <input type="text" class="form-control" name="carol-name" id="carol-name" maxlength="50" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                        What are the three traditional colours for Christmas?
                        <div class="form-group mt-3">
                            <label for="riddle5">Answer (seperated by commas):</label>
                            <input type="text" class="form-control" name="colours" id="colours" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	What are the hangings on the Christmas Tree called?
                        <div class="form-group mt-3">
                            <label for="riddle6">Answer:</label>
                            <input type="text" class="form-control" name="hanging" id="hanging" maxlength="20" size="20" required>
                        </div>
                    </li>
                </ol>
                <div class="form-group mt-3 text-right">
                    <button type="submit" class="btn btn-success">Submit Quiz</button>
                </div>
            </form>
        </div>
    </div>
@stop