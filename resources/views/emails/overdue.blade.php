@component('mail::message')

Dear Admin,<br><br>

We'd like to urgently draw your attention to an order on the "My Perfect Writing" platform that is past its delivery deadline.<br><br>

<b>Order Details: </b>
Client Name: {{$user->name}} <br>
Order ID: {{$order->number}} <br>
Original Deadline : {{$order->dead_line}} {{$order->deadline_time}} <br>
Current Date: {{date('Y-m-d h:i:A', strtotime(now()))}} <br><br>

This order is now overdue by {{$hoursDifference}} hours We emphasize the importance of resolving this promptly to maintain our commitment to timeliness and client satisfaction.
Please review the details of the order in the admin portal and ensure its completion at the earliest.

Thank you for addressing this matter with urgency.


Warm regards,
My Perfect Writing Team
