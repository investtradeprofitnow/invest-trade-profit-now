@extends("admin.layouts.app")
@section("pageTitle", "Strategy List")
@section("content")
	<div class="p-2 active-cont mt-5">
		<h1 class="mb-3 text-center section-title">Strategy List (Short)</h1>
		@if(session()->has("error"))
			<div class="error mb-3 p-3">{!!session()->get("error")!!}</div>
		@endif
		<table class="table mx-auto text-center">
			<thead>
				<tr>
					<th scope="col">Sr. No.</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">Type</th>
					<th scope="col">Photo</th>
					<th scope="col">Purchase Link</th>
					<th scope="col">Active</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				@foreach($strategies as $strategy)
					<tr>
						@php
							$number=$loop->index+1;
							$index=$strategy->strategy_short_id;		
							$desc=substr($strategy->description,0,49);			
						@endphp
						<td scope="row">{{$number}}</td>
						<td id="{{'name'.$index}}">{{$strategy->name}}</td>
						@if($strategy->description==$desc)
							<td id="{{'desc'.$index}}" class="text-left">{!! $strategy->description !!}</td>
						@else
							<td id="{{'desc'.$index}}" class="text-left">{!! nl2br($desc) !!} <a id="{{'link'.$index}}" class="desc" data-toggle="modal" data-target="#descriptionModal">Read More...</a></td>
							<div id="{{'description'.$index}}" class=""style="display:none;">
								{{$strategy->description}}
							</div>
						@endif
						<td id="{{'type'.$index}}">{{$strategy->type}}</td>
						<td id="{{'type'.$index}}">{{$strategy->photo}}</td>
						<td id="{{'link'.$index}}">{{$strategy->link}}</td>
						<td id="{{'active'.$index}}">{{$strategy->active}}</td>
						<td class="text-center">
							<a class="btn btn-outline" id="{{'edit'.$index}}" href="{{route('edit-strategy-short',$index)}}">
								Edit
							</a>
							<button type="button" class="btn btn-delete mt-2" id="{{'delete'.$index}}">
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
	<div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="descriptionModalLabel">Modal title</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@stop
@section("js")
	<script type="text/javascript">
		$(".desc").click(function(){
			$row=this.id.substring(4,5);
			$description = $("#description"+$row).text();
			$(".modal-body").html($description);
			$("#descriptionModal").modal("show");
		});

		$(".btn-delete").click(function(){			
			$row=this.id.substring(6,7);
			$name=$("#name"+$row).html();
			$type=$("#type"+$row).html();
			$btn = confirm("Do you wish to delete "+$name+" of type "+$type+"?");
            if(!$btn){
                e.preventDefault();
            }
			else{
				$action="/admin/delete-strategy-short/"+$row;
				$("#delete").attr("href",$action);
				$("#strategy-id").val($row);
				window.location = $action;
			}
		});
	</script>
@stop