@component('mail::message')

Dear Admin,<br><br>

We've just received a new order on "My Perfect Writing" platform.<br><br>

Client Name: {{$user->name}} <br>
Order ID: {{$order->number}} <br>
Order Date: {{date('Y-m-d h:i:A', strtotime($order->created_at))}} <br>
Topic : {{$order->service}} <br>
No. of Pages: {{$order->quantity}} <br>
Amount : {{$order->amount}} <br><br>

To ensure smooth order processing and to maintain our service's credibility, please review the unpaid order in the admin portal and consider taking appropriate action.
Your diligence in these matters helps us maintain a seamless experience for our clients.

Warm regards,
My Perfect Writing Team

