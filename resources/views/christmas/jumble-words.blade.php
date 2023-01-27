@extends("christmas.app")
@section("pageTitle", "Christmas Jumble Words")
@section("css")
    <style type="text/css">       
        .col-6, label{
            font-weight: bold;
        } 
        .container{
            width: 50% !important;
        }
    </style>
@stop
@section("content")
    <h1 class="py-3 text-center"><strong><i>Christmas Jumble Words</i></strong></h1>
    <div class="christmas-bg">
        <div class="container text-left pt-3">
            @if(session("success"))
                <div class="success mb-3 p-3">{{session("success")}}</div>
            @endif
            <p>
                Here are 10 jumbled words related to Christmas. Solve the Jumble Words and write the answers in the box next to the words.
            </p>
            <form id="riddles-form" method="post" action="{{route('send-jumble-words-mail')}}">
                {{ csrf_field() }}
                <div class="form-group mt-3">
                    <label for="riddle1">Your Name:</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="50" size="50" required>
                </div>
                <div class="form-group mt-3">
                    <label for="riddle1">Your Email:</label>
                    <input type="email" class="form-control" name="email" id="email" maxlength="50" size="50" required>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        1. RCASOL
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word1" id="word1" maxlength="6" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        2. ESOELTMTI
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word2" id="word2" maxlength="9" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        3. NSAUAALCST
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word3" id="word3" maxlength="10" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        4. NMARNTOE
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word4" id="word4" maxlength="8" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        5. GHSILE
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word5" id="word5" maxlength="6" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        6. FGSIT
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word6" id="word6" maxlength="5" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        7. NYADEACCN
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word7" id="word7" maxlength="9" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        8. DREEENIR
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word8" id="word8" maxlength="8" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        9. SWANNOM
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word9" id="word9" maxlength="7" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 my-auto">
                        10. YMICENH
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="word10" id="word10" maxlength="7" size="10" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3 text-right">
                    <button type="submit" class="btn btn-success">Submit Jumble Words</button>
                </div>
            </form>
        </div>        
    </div>
@stop