<x-mail::message>
# Supplier's Weekly Report
Hello {{ $supplier->name }},
This is your weekly report for the period ending {{ $reportDate }}.
Here are the details of your report:
<table>
    <thead>
        <tr>
            <th>Raw Materials Order status</th>
            <th>Number of Orders</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="color">Pending</td>
            <td>{{ $pendingOrdersCount }}</td>
        </tr>
    </tbody>

</table>
- Total Sales: ${{ number_format($totalSales, 2) }}

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
