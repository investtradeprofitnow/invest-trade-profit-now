@extends("layouts.app")
@section("pageTitle", "Feedback")
@section("css")
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
	<style type="text/css">
		.star-input {
			display: none;
		}
		.star {
			font-size: 3vw;
			color: gold;
			-webkit-text-stroke: 2px black;
		}
		.star-input:checked + .star ~ .star {
			color: white;
			-webkit-text-stroke: 2px black;
		}
	</style>
@stop
@section("content")
<h1 class="mb-3 text-center"><strong><i>Feedback</i></strong></h1>
<div class="container box py-3"> 
    @if(session("success"))
        <div class="success p-3">{{session("success")}}</div>
    @endif
    <h5 class="pt-3">If our strategies have helped you gain profit, please spare some time and provide your valuable feedback</h5>
    <form method="post" action="{{route('save-feedback')}}">
    	{{ csrf_field() }}
		<input type="radio" class="star-input" name="star-rating" id="star-1" value="1">
		<label for="star-1" class="star"><i class="fas fa-star"></i></label>
		<input type="radio" class="star-input" name="star-rating" id="star-2" value="2">
		<label for="star-2" class="star"><i class="fas fa-star"></i></label>
		<input type="radio" class="star-input" name="star-rating" id="star-3" value="3">
		<label for="star-3" class="star"><i class="fas fa-star"></i></label>
		<input type="radio" class="star-input" name="star-rating" id="star-4" value="4">
		<label for="star-4" class="star"><i class="fas fa-star"></i></label>
		<input type="radio" class="star-input" name="star-rating" id="star-5" value="5">
		<label for="star-5" class="star"><i class="fas fa-star"></i></label>
        <input type="hidden" name="rating" id="rating"/>
        <h5 class="pt-4 pb-2"><b>Feedback:</b></h5>
        <textarea id="feedback" name="feedback" rows="5" cols="60" required></textarea>
		<p class="text-right"><span id="count">0</span>/5000</p>
		<div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" name="anonymous" id="anonymous">
            <label class="form-check-label" for="anonymous">Check this box if you do not want to disclose your name in the feedback section.
        </div>
		<input type="submit" id="submit" class="btn btn-outline-success mt-3" value="Submit Feedback"/>
	</form>
</div>
@stop
@section("js")
<script type="text/javascript">
	$("#feedback").keyup(function(){
  		$("#count").text($(this).val().length);
	});

	$("#submit").click(function(){
        $rating=$("input:radio[name='star-rating']:checked").val();
        $feedback=$("#feedback").val();
        if(typeof($rating)=="undefined")
            $rating="5";
        $("#rating").val($rating);
	});
</script>
@stop