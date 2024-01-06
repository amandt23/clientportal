@component('mail::message')

Dear Admin,<br><br>

We'd like to inform you of a revision request received for an order placed on "My Perfect Writing" platform.<br><br>

<b>Order Details:</b>
Client Name: {{$user->name}} <br>
Order ID: {{$order->number}} <br>

Original Deadline : {{$order->dead_line}} {{$order->deadline_time}} <br>
Revision Deadline : {{$deadlineR}} <br><br>

Client's Comments: {{$msg}} <br><br>
We kindly request you to review the feedback and ensure the necessary adjustments are made promptly.

Thank you for your continued dedication to quality and client satisfaction.


Warm regards,
My Perfect Writing Team
