@component('mail::message')

Dear {{$user->name}},<br><br>

Your query against Order ID: {{$order->number}} has been answered. Check your dashboard and let us know if we have answered your query. 
Below is the reply to your query: <br><br>

Admin’s reply: <br> {{$msg}} <br><br>


Warms Regards
My Perfect Writing Limited
Support Department

