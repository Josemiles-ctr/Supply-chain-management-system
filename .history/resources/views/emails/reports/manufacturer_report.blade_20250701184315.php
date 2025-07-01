<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


<h1>Hello {{ $user->name }},</
Here is your weekly raw materials purchase report for this week of {{ $date }}.
This report includes details of all raw materials purchased from various suppliers, including quantities, costs, and any relevant notes.
Also included are purchase orders and their statuses.
Please review the attached report for detailed information on your purchases.


<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
