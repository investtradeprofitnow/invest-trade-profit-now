@extends('layouts.app')
@section('pageTitle', 'Strategy List')
@section('css')
    <style type="text/css">
        h1{
            color: #34BBE3;
        }

        .btn-success{
            border-radius: 25px;
        }

        .coupon-table{
            width: 50%;
        }
        
        .coupon-table td{
            padding-top: 25px;
        }

        #discRow td{
            color: red;
        }
        
        @media screen (min-width: 769px) and (max-width: 992px){
            .coupon-table{
                width:80%;
            }
        }

        @media screen and (max-width: 768px){
            .coupon-table{
                width:100%;
            }
        }
    </style>
@stop
@section('content')
    <div class="p-2 active-cont mt-5 container">
        <a href="{{route('strategy-list')}}" class="btn btn-outline mb-4" role="button">Back To Strategy List</a>
        @if(session("cartStrategies"))
            <h1 class="mb-3 text-center section-title">Strategy List</h1>	
            <table class="table mx-auto text-center">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $strategyList = session()->get("cartStrategies");
                        $total=0;
                    @endphp
                    @foreach(session("cartStrategies") as $key=>$value)
                        @php
                            $number=$loop->index+1;                        
                            $index=$key;
                            $total=$total+$value['price'];
                        @endphp
                        <tr classs="text-left">
                            <td scope="row">{{$number}}</td>
                            <td id="{{'name'.$index}}">{{$value['name']}}</td>
                            <td id="{{'type'.$index}}">{{$value['type']}}</td>
                            <td>
                                <button type="button" class="btn btn-delete" id="{{'delete'.$index}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
							        Delete
						        </button>
                            </td>
                            <td id="{{'video'.$index}}">{{$value['price']}}</td>
                        </tr>
                    @endforeach
                    <tr id="discRow">
                        
                    </tr>
                    <tr>
                        <td colspan=4 class="text-right">Total Amount</td>
                        <td id="total">{{$total}}</td>
                        <input type="hidden" id="totalAmt" value="{{$total}}"/>
                        <input type="hidden" id="coupon-id" name="coupon-id"/>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <a role="button" class="btn btn-success px-3 py-2 mb-5" href="" id="order">Proceed To Pay</a>
            </div>
        @endif

        @if(count($coupons)>0)
            <h4 class="section-title">Available Coupons</h4>
            <table class="table coupon-table">
                @foreach($coupons as $coupon)
                    <tr>
                        <td width="60%">
                            <b>{{$coupon->code}}</b><br/>
                            {{$coupon->description}}
                        </td>
                        <td>
                            <button class="btn btn-success" id="btn{{$coupon->id}}" onclick="calculateDiscount({{$coupon->discount}}, '{{$coupon->type}}', {{$coupon->id}})">Apply Coupon</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <a role="button" class="btn btn-outline" id="delete">Delete Strategy</a>
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
            $action="/delete-from-cart/"+$row;
            $("#delete").attr("href",$action);
			$("#strategy-id").val($row);
		});

		$("#delete").click(function(){
			$("#delete-form").submit();
		});

        function calculateDiscount($discount, $type, $id){
            $total = $("#totalAmt").val();
            $updated_amount=0;
            if($type=="percent"){
                $discount = Math.ceil(($discount*$total)/100);
            }
            $updated_amount = $total - $discount;
            $text = "<td colspan='4' class='text-right'>Discount</td>"+
                        "<td>"+$discount+"</td>";
            $("#discRow").html($text);
            $("#total").html($updated_amount);
            $("#coupon-id").val($id);
        }

        $("#order").click(function(){
            $amount=$("#total").html();
            $couponId=$("#coupon-id").val()==""?null:$("#coupon-id").val();
            $action="/save-strategies/"+$amount+"/"+$couponId;
            $("#order").attr("href",$action);
        });
	</script>
@stop