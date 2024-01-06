@component('mail::message')

Dear Admin,<br><br>

A new support ticket has been submitted on the "My Perfect Writing" platform, and we're bringing it to your attention.<br><br>

<b>Ticket Details: </b>
Client Name: {{$user->name}} <br>
Ticket  ID: {{$ticket->ticket_id}} <br>
Submission Date: {{date('Y-m-d h:i:A', strtotime($ticket->created_at))}} <br>
Issue Category : {{$ticket->category}} <br>
Priority : {{$ticket->priority}} <br><br>

Client's Initial Message: {{$msg}}<br><br>
To ensure our clients receive timely assistance, please review the ticket in the admin portal and address the matter accordingly.
Your prompt attention to this issue helps us uphold our reputation for outstanding client support.


Warm regards,
My Perfect Writing Team

