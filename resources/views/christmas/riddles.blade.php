@extends("christmas.app")
@section("pageTitle", "Christmas Riddles")
@section("css")
    <style type="text/css">
        li, label{
            font-weight: bold;
        }
        .container{
            width: 50%;
        }
    </style>
@stop
@section("content")
    <h1 class="py-3 text-center"><strong><i>Christmas Riddles</i></strong></h1>
    <div class="christmas-bg">
        <div class="container text-left pt-3">
            @if(session("success"))
                <div class="success mb-3 p-3">{{session("success")}}</div>
            @endif
            <form id="riddles-form" method="post" action="{{route('send-riddles-mail')}}">
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
                        I have many colours,<br/>
                        lovely and bright,<br/>
                        I turn houses,<br/>
                        Into a beautiful sight.
                        <div class="form-group mt-3">
                            <label for="riddle1">Answer:</label>
                            <input type="text" class="form-control" name="riddle1" id="riddle1" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	What do you see at the end of Christmas?
                        <div class="form-group mt-3">
                            <label for="riddle2">Answer:</label>
                            <input type="text" class="form-control" name="riddle2" id="riddle2" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                        Even though everyone thinks,<br/>
                        I belong to the toes,<br/>
                        I am hung up for gifts,<br/>
                        Every child knows.
                        <div class="form-group mt-3">
                            <label for="riddle3">Answer:</label>
                            <input type="text" class="form-control" name="riddle3" id="riddle3" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	What has lot of needles but cannot sew?
                        <div class="form-group mt-3">
                            <label for="riddle4">Answer:</label>
                            <input type="text" class="form-control" name="riddle4" id="riddle4" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	When going around the world,<br/>
                        I can find the way,<br/>
                        I go to every country,<br/>
                        While helping Santa pull the sleigh.
                        <div class="form-group mt-3">
                            <label for="riddle5">Answer:</label>
                            <input type="text" class="form-control" name="riddle5" id="riddle5" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                        What did Santa need when he sprained his ankle?
                        <div class="form-group mt-3">
                            <label for="riddle6">Answer:</label>
                            <input type="text" class="form-control" name="riddle6" id="riddle6" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	You can hold and shake me,<br/>
                        I can easily break,<br/>
                        I have lots of snow,<br/>
                        But it is all fake.
                        <div class="form-group mt-3">
                            <label for="riddle7">Answer:</label>
                            <input type="text" class="form-control" name="riddle7" id="riddle7" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	When does Christmas come before Thanksgiving?
                        <div class="form-group mt-3">
                            <label for="riddle8">Answer:</label>
                            <input type="text" class="form-control" name="riddle8" id="riddle8" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	Making everything white is my aim,<br/>
                        No two pieces of mine are same,<br/>
                        Playing with me is everyone's favourite winter game,<br/>
                        Guess guess, what is my name?
                        <div class="form-group mt-3">
                            <label for="riddle9">Answer:</label>
                            <input type="text" class="form-control" name="riddle9" id="riddle9" maxlength="20" size="20" required>
                        </div>
                    </li>
                    <li class="mt-4">
                    	I am a famous Christmas treat,<br/>
                        I am brown all over my tiny feet.<br/>
                        <div class="form-group mt-3">
                            <label for="riddle10">Answer:</label>
                            <input type="text" class="form-control" name="riddle10" id="riddle10" maxlength="20" size="20" required>
                        </div>
                    </li>
                </ol>
                <div class="form-group mt-3 text-right">
                    <button type="submit" class="btn btn-success">Submit Riddles</button>
                </div>
            </form>
        </div>
    </div>
@stop