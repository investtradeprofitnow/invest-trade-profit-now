@extends("admin.layouts.app")
@section("pageTitle", "Refunds List")
@section("css")
	<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <style type="text/css">
		.refund-link{
			text-decoration: none;
    		color: #34BBE3;
		}

		.refund-link:hover{
			text-decoration: none;
    		color: #34BBE3;
		}

		.paginate_button {
			border-radius: 0 !important;
		}
	</style>
@stop
@section("content")
    <div class="p-2 active-cont mt-5">
		<h1 class="mb-3 text-center section-title">Refunds List</h1>	
		<table class="table mx-auto text-center" id="refunds-table">
			<thead>
				<tr>
					<th scope="col" class="text-center">Sr. No.</th>
					<th scope="col" class="text-center">Email</th>
					<th scope="col" class="text-center">Amount</th>
					<th scope="col" class="text-center">Status</th>
					<th scope="col" class="text-center">Date</th>
					<th scope="col" class="text-center">Operation</th>
				</tr>
			</thead>
			<tbody>
				@foreach($refunds as $refund)
					<tr>
						@php
							$number=$loop->index+1;
							$index=$refund->refund_id;
							$date=$refund->created_at->format("d-m-Y");
						@endphp
						<td scope="row">{{$number}}</td>
						<td id="{{'email'.$index}}">{{$refund->email}}</td>
						<td id="{{'amount'.$index}}">{{$refund->amount}}</td>
						@if($refund->status=="Refund Initiated")
							<td id="{{'status'.$index}}" class="refund initiated">{{$refund->status}}</td>
						@elseif($refund->status=="Refund Processed")
							<td id="{{'status'.$index}}" class="refund processed">{{$refund->status}}</td>
						@else
							<td id="{{'status'.$index}}" class="refund closed">{{$refund->status}}</td>
						@endif
						<td id="{{'date'.$index}}">{{$date}}</td>
						<td class="text-center">							
							@if($refund->status=="Refund Initiated")
								<a href="{{route('update-refund-status',[$refund->refund_id,'Refund Processed'])}}" class="refund-link">Update to Refund Processed</a>
							@elseif($refund->status=="Refund Processed")
								<a href="{{route('update-refund-status',[$refund->refund_id,'Refund Closed'])}}" class="refund-link">Update to Refund Closed</a>
							@endif
						</td>
					</tr>
				@endforeach
            </tbody>
        </table>
    </div>
@stop
@section('js')
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#refunds-table").DataTable({
  				"columnDefs": [ {
      					"targets": [0,2,3,5],
						"orderable": false
    				},
					{
						"targets": [0,2,3,4,5],
						"searchable": false
					}
				]
			});
		});
		$(".refund-link").click(function(e){
			$text = $(this).html();
			if($text=="Update to Refund Processed"){
				$btn = confirm("Are you sure you want the process the refund?");
				if(!$btn){
					e.preventDefault();
				}
			}
			else if($text=="Update to Refund Closed"){
				$btn = confirm("Are you sure you want the close the refund?");
				if(!$btn){
					e.preventDefault();
				}
			}
		});
	</script>
@stop