@extends("admin.layouts.app")
@section("pageTitle", "Coupons List")
@section("content")
	<div class="p-2 active-cont mt-5">
		<h1 class="mb-3 text-center section-title">Coupons List</h1>	
		<table class="table mx-auto text-center">
			<thead>
				<tr>
					<th scope="col">Sr. No.</th>
					<th scope="col">Coupon Code</th>
					<th scope="col">Description</th>
					<th scope="col">Discount</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				@foreach($coupons as $coupon)
					<tr>
						@php
							$number=$loop->index+1;
							$index=$coupon->id;
							$type=$coupon->type;		
						@endphp
						<td scope="row">{{$number}}</td>
						<td id="{{'code'.$index}}">{{$coupon->code}}</td>
						<td id="{{'desc'.$index}}">{{$coupon->description}}</td>                    
						<input type="hidden" id="{{'discount'.$index}}" value="{{$coupon->discount}}"/>
						<input type="hidden" id="{{'type'.$index}}" value="{{$coupon->type}}"/>
						@if($type=="percent")
							<td>{{$coupon->discount}}%</td>
						@else
							<td>&#8377; {{$coupon->discount}}</td>
						@endif
						<td class="text-center">
							<a class="btn btn-outline" id="{{'edit'.$index}}" href="{{route('edit-coupon',$index)}}">
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
			<a class="btn btn-outline" href="{{route('add-coupon')}}">Add Coupon</a>
		</div>
	</div>
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Delete Coupon</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="text"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
					<a role="button" class="btn btn-outline" id="delete">Delete Coupon</a>
				</div>
			</div>
		</div>
	</div>
@stop
@section("js")
	<script type="text/javascript">
		$(".btn-delete").click(function(){
			$row=this.id.substring(6,7);
			$name=$("#code"+$row).html();
			$text="Do you wish to delete the coupon code "+$name+"?";
			$(".text").html($text);
			$action="/admin/delete-coupon/"+$row;
        	$("#delete").attr("href",$action);
			$("#coupon-id").val($row);
		});
	</script>
@stop