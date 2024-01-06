@component('mail::message')

Dear Admin,<br><br>

We've just received a new order on "My Perfect Writing" platform.<br><br>

<?php  								
$d = \Carbon\Carbon::parse($order->created_at);
$c = \Carbon\Carbon::parse($order->dead_line. $order->deadline_time);
$diff = $d->diff($c);

// Your given UK date and time string
$dateString = $order->dead_line . ' ' . $order->deadline_time;

// Timezone for the UK (assuming London)
$ukTimezone = new DateTimeZone('Europe/London');

// Create a DateTime object with the given date and UK timezone
$dateTime = DateTime::createFromFormat('Y-m-d h:i A', $dateString, $ukTimezone);

// Timezone for Pakistan
$pakistanTimezone = new DateTimeZone('Asia/Karachi');

// Convert the DateTime object to Pakistan timezone
$dateTime->setTimezone($pakistanTimezone);

// Format and output the result
$pkdeadline = $dateTime->format('Y-m-d h:i:s A');

date_default_timezone_set('Asia/Karachi');
$pak_order_date = date('d-m-y h:i:s A');

?>

Client Name: {{$user->name}} <br>
Client Email: {{$user->email}} <br>
Order ID: {{$order->number}} <br>
Order Date: {{date('Y-m-d h:i:s A', strtotime($order->created_at))}} <br>
Pk Order Receive Date: {{$pak_order_date}} <br>
Topic : {{$order->service}} <br>
No. of Pages: {{$order->quantity}} <br>
Order Amount: {{$order->total}} <br>
Deadline : {{$order->dead_line}} {{$order->deadline_time}} ( {{$diff->days}} Days & {{$diff->h}} hours )<br>
PK Deadline : {{$pkdeadline}} <br><br>

Please visit the admin portal to view the complete order details and assign it to a suitable writer.

Thank you for ensuring our commitment to excellence.

Warm regards,
My Perfect Writing Team
