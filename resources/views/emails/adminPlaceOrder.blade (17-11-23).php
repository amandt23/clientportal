@component('mail::message')

Dear Admin,<br><br>

We've just received a new order on "My Perfect Writing" platform.<br><br>

Client Name: {{$user->name}} <br>
Client Email: {{$user->email}} <br>
Order ID: {{$order->number}} <br>
Order Date: {{date('Y-m-d h:i:A', strtotime($order->created_at))}} <br>
Topic : {{$order->service}} <br>
No. of Pages: {{$order->quantity}} <br>
Order Amount: {{$order->total}} <br>
Deadline : {{$order->dead_line}} {{$order->deadline_time}} <br><br>

Please visit the admin portal to view the complete order details and assign it to a suitable writer.

Thank you for ensuring our commitment to excellence.

Warm regards,
My Perfect Writing Team
