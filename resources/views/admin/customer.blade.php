@extends('admin.layouts.app')
@section('pageTitle', 'Customer Information')
@section('css')
	<link href="{{asset('css/cust-info.css')}}" rel='stylesheet'>
@stop
@section('content')
<div class="p-2 active-cont">
	<h1 class="mb-3 text-center section-title">Customer List</h1>	
	<table class="table mx-auto text-center">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Customer Role</th>
				<th scope="col">Edit</th>
			</tr>
		</thead>
		<tbody>
			@foreach($customers as $cust)
				<tr>
					@php
						$index=$loop->index+1
					@endphp
					<td scope="row">{{$index}}</td>
					<td id="{{'name'.$index}}">{{$cust->name}}</td>
					<td id="{{'role'.$index}}">{{$cust->role}}</td>
					<td class="text-center">
						<button type="button" class="btn btn-outline edit-button" id="{{'edit'.$index}}" data-bs-toggle="modal" data-bs-target="#custInfoModal">
							Edit
						</button>
						<input type="hidden" id="{{'cust-id'.$index}}" value="{{$index}}"/>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="modal fade" id="custInfoModal" tabindex="-1" aria-labelledby="custInfoModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="custInfoModalLabel">Update Customer Information</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="form">
					<?php
					if(isset($error)){
					?>
						<div class="error">{{$error}}</div>
					<?php
						}
					?>
					<form id="cust-role-form" method="post" action="/updateRole">
            			{{ csrf_field() }}
						<div class="form-group mt-3">
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name" id="name" readonly>
						</div>
						<div class="form-group mt-3">
							<label for="role">Role:</label>
							<select id="role" name="role">
								<option value="Customer">Customer</option>
								<option value="Admin">Admin</option>
							</select>
						</div>
						<div class="form-group mt-3">
							<input type="hidden" name="cust-id" id="cust-id">
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-outline" id="update" value="UPDATE ROLE"/>
			</div>
		</div>
	</div>
</div>
@stop
@section('js')
	<script type="text/javascript">
		$(".edit-button").click(function(){
			$row=this.id.substring(4,5);
			$name=$("#name"+$row).html();
			$role=$("#role"+$row).html();
			$id=$("#cust-id"+$row).val();
			$("#role option[value='"+$role+"']").attr("selected","selected");
			$("#name").val($name);
			$("#cust-id").val($id);
		});

		$("#update").click(function(e){
			$("#cust-role-form").submit();
		});
	</script>
@stop