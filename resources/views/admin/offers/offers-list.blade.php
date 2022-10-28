@extends("admin.layouts.app")
@section("pageTitle", "Offers List")
@section("content")
	<div class="p-2 active-cont mt-5">
		<h1 class="mb-3 text-center section-title">Offer List</h1>	
		<table class="table mx-auto text-center">
			<thead>
				<tr>
					<th scope="col">Sr. No.</th>
					<th scope="col">Strategy Name</th>
					<th scope="col">Description</th>
					<th scope="col">Discount</th>
					<th scope="col">Subscribers</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				@foreach($offers as $offer)
					<tr>
						@php
							$number=$loop->index+1;
							$index=$offer->offer_id;
							$type=$offer->type;		
						@endphp
						<td scope="row">{{$number}}</td>
						<input type="hidden" id="{{'strategy-id'.$index}}" value="{{$offer->strategy_id}}"/>
						<td id="{{'strategy-name'.$index}}">{{$offer->strategy_name}}</td>
						<td id="{{'desc'.$index}}">{{$offer->description}}</td>                    
						<input type="hidden" id="{{'discount'.$index}}" value="{{$offer->discount}}"/>
						<input type="hidden" id="{{'type'.$index}}" value="{{$offer->type}}"/>
						@if($type=="percent")
							<td>{{$offer->discount}}%</td>
						@else
							<td>&#8377; {{$offer->discount}}</td>
						@endif
						<td id="{{'subscribers'.$index}}">{{$offer->subscribers}}</td>
						<td class="text-center">
							<a class="btn btn-outline" id="{{'edit'.$index}}" href="{{route('edit-offer',$index)}}">
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
			<a class="btn btn-outline" href="{{route('add-offer')}}">Add Offer</a>
		</div>
	</div>
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Delete Offer</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="text"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
					<a role="button" class="btn btn-outline" id="delete">Delete Offer</a>
				</div>
			</div>
		</div>
	</div>
@stop
@section("js")
	<script type="text/javascript">
		$(".btn-delete").click(function(){
			$row=this.id.substring(6,7);
			$name=$("#strategy-name"+$row).html();
			$text="Do you wish to delete the offer for "+$name+"?";
			$(".text").html($text);
			$action="/admin/delete-offer/"+$row;
        	$("#delete").attr("href",$action);
			$("#offer-id").val($row);
		});
	</script>
@stop