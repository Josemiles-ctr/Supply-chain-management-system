<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


Hello {{ $user->name }},
Here is your weekly raw materials purchase report for this week of {{ $date }}.
This report includes details of all raw materials purchased from various suppllier, including quantities, costs, and any relevant notes.

<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
