<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


Hello {{ $user->name }},
Here is your weekly raw materials purchase report for this wee

<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
