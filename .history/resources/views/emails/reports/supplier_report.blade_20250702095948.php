<x-mail::message>
# Supplier's Weekly Report
Hello {{ $supplier->name }},
This is your weekly report for the period ending {{ $reportDate }}.

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
