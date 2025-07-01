<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


Hello {{ $user->name }},
Here is your weekly raw materials purchase report for this week of {{ $date }}.
This report includes details of all raw materials purchased from various supplliers, including quantities, costs, and any relevant notes.
Also in

<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
