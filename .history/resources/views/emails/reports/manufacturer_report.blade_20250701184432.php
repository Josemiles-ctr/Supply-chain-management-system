<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


<h1>Hello {{ $user->name }},</h1>
<p> Here is your weekly raw materials purchase report for this week of {{ $date }}.
    This report includes details of all raw materials purchased from various suppliers, including quantities, costs, and any relevant notes.
    Also included are purchase orders and their statuses.
    Please review the attached report for detailed information on your purchases.
</p>
<h2> Summary:</h2>



<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
