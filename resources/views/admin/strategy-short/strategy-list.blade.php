@extends('admin.layouts.app')
@section('pageTitle', 'Strategy List')
@section('content')
<div class="p-2 active-cont mt-5">
	<h1 class="mb-3 text-center section-title">Strategy List (Short)</h1>	
	<table class="table mx-auto text-center">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th scope="col">Type</th>
				<th scope="col">Video</th>
				<th scope="col">Operation</th>
			</tr>
		</thead>
		<tbody>
			@foreach($strategies as $strategy)
				<tr>
					@php
						$number=$loop->index+1;
						$index=$strategy->id;
						$name=$strategy->name;
						$desc=$strategy->description;
						$type=$strategy->type;
						$video=$strategy->video;
						$link='/admin/edit-strategy-short?id='.$index.'&name='.$name.'&desc='.$desc.'&type='.$type.'&video='.$video;
					@endphp
					<td scope="row">{{$number}}</td>
					<td id="{{'name'.$index}}">{{$strategy->name}}</td>
					<td id="{{'desc'.$index}}">{{$strategy->description}}</td>
					<td id="{{'type'.$index}}">{{$strategy->type}}</td>
					<td id="{{'video'.$index}}">{{$strategy->video}}</td>
					<td class="text-center">
						<a class="btn btn-outline" id="{{'edit'.$index}}" href="{{$link}}">
							Edit
						</a>
						<button type="button" class="btn btn-delete" id="{{'delete'.$index}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
							Delete
						</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
    <div class="text-right pr-3" style="margin-right: 1vw;">
        <a class="btn btn-outline" href="{{route('add-strategy-short')}}">Add Strategy</a>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel">Delete Strategy</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="text"></div>
				<form id="delete-form" method="post" action="/admin/delete-strategy-short">
            		{{ csrf_field() }}
					<div class="form-group mt-3">
						<input type="hidden" name="strategy-id" id="strategy-id">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-outline" id="delete" value="Delete Strategy"/>
			</div>
		</div>
	</div>
</div>
@stop
@section('js')
	<script type="text/javascript">
		$(".btn-delete").click(function(){
			$row=this.id.substring(6,7);
			$name=$("#name"+$row).html();
			$type=$("#type"+$row).html();
			$text="Do you wish to delete "+$name+" of type "+$type+"?";
			$(".text").html($text);
			$("#strategy-id").val($row);
		});

		$("#delete").click(function(){
			$("#delete-form").submit();
		});
	</script>
@stop