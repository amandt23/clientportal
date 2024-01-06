@component('mail::message')

Dear Admin,<br><br>

You have a query against Order ID: {{$order->number}}. Check your dashboard and answer the query. 
Below is the reply to your query: <br><br>

Client’s Message: <br> {{$msg}} <br><br>


Warms Regards
My Perfect Writing Limited
Support Department