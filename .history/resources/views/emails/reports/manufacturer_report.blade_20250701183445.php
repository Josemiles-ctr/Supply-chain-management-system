<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


Hello {{ $user->name }},


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
