@extends('layouts.app')
@section('pageTitle','Refund Policy')
@section('css')
    <link href="{{asset('css/support.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="heading text-center py-4">
        <h1><i>REFUND POLICY</i></h1>
    </div>
    <div class="container mt-4">
        <p>
            We thank you and appreciate your subscription to our website. Please read the policy, 
            conditions and process carefully as they will give you important information and 
            guidelines about your rights and obligations as our subscriber, concerning the 
            subscription you make on our website. We make every effort to have our website meet your 
            expectations.
        </p>
        <p>
            However, if due to any reason or unavoidable circumstances, you wish to cancel your 
            subscription and claim a refund, in case of silver, gold or platinum subscription plans, 
            we shall cancel your subscription and process your refund within seven working days of 
            receiving your request, provided the request for refund has been received in the first 
            30 days from the date of payment of the subscription package (effective from 16th October 
            2022).
        </p>
        <p>
            In case of strategies purchased, <strong>No Refund</strong> will be available. 
        </p>
        <p>
            In case of recurring subscription plans, <strong>No Refund</strong> will be available. 
            However, if you choose to unsubscribe you will not be charged once your paid subscription 
            period expires.
        </p>
        <p>
            The amount refundable to you for the silver, gold or platinum subscription plans and the 
            mode of refund is as under:
        <p>
        <p>
            For all users subscribing post 16th October, 2022, pro-rata refund of subscription amount 
            paid (net of GST on the entire amount) shall be available only for the first 30 days from 
            the date of payment of the subscription package and subsequently no refund shall be 
            granted. This is also applicable in case of subscription extensions. The cancellation 
            request shall be processed only if such a request is raised from the registered email 
            address of the subscribed member via email addressed to 
            <a href="mailto:{{config('app.contact')}}?subject=Unsubscribe">{{config('app.contact')}}</a> 
            The amount of refund that a subscriber is eligible for will be determined on the basis of 
            the unexpired subscription period. For calculating the refund amount the entire GST portion 
            which is included in the subscription amount received shall first be reduced and the 
            refund amount will be calculated based on the net subscription amount (net of GST) and 
            will be proportionate to the balance days of the subscription period as divided by total 
            subscription period. Under the provisions of section 12 to 14 of the GST Act, the time of
            supply of service is earliest of issuance of invoice or receipt of payment and hence GST 
            is payable in full on advances at the time the subscriber makes payment.
        </p>
        <p>
            To illustrate if the subscription amount paid by the subscriber is &#8377; 1,000/- for one year and 
            the subscriber seeks a refund after 20 days, the refund will be determined as under:
            <p>
                <strong>Gross Subscription Amount:</strong> &#8377; 1000
            </p>
            <p>
                <strong>GST on the same (18% rate at the time of subscription):</strong> &#8377; 152.5 which is calculated as (1000 * <sup>18</sup>&frasl;<sub>118</sub>)
            </p>
            <p>
                <strong>Gross Subscription Amount:</strong> &#8377; 847.5
            </p>
            <p>
                <strong>Total Subscription Period:</strong> 365 days
            </p>
            <p>
                <strong>Unexpired Subscription Period:</strong> 365-20 = 345 days
            </p>
            <p>
                Refund = (Net Subscription Amount * <sup>Unexpired Subscription Period</sup>&frasl;<sub>Total Subscription Period</sub>)<br/>
                Refund = (847.5 * <sup>345</sup>&frasl;<sub>365</sub>) = 801.06 &#8776; &#8377; 801
            </p>
        </p>
        <p>
            The refund will be processed and credited through the same payment gateway from which 
            the subscription amount was received. In the event that the subscription was received 
            directly by cheque/bank transfer, the refund would be given by issuing an, at par cheque 
            drawn on any scheduled bank in India and would be issued only in the name of the 
            subscriber. The cheque would be couriered to the address provided by the subscriber in 
            the request for cancellation. In such cases, the email requesting for cancellation should 
            clearly provide the name, address, contact number and bank details of the subscriber 
            seeking the cancellation and refund.No refund will be issued to any subscriber residing 
            out of India in case payment has been received other than through a payment gateway.
        </p>
        <p>
            If your refund is not received within 7 working days of the cancellation request being 
            placed, please contact us by raising a query via email to 
            <a href="mailto:{{config('app.contact')}}?subject=Refund Query">{{config('app.contact')}}</a> 
        </p>
    </div>
@stop