<x-mail::message>
# Supplier's Weekly Report
Hello {{ $supplier->name }},
This is your weekly report for the period ending {{ $reportDate }}.
Here is the brief summary of your raw materials orders over the last week:
<h2>Raw Materials Purchase Summary</h2>
<table>
    <thead>
        <tr>
            <th>Raw Materials Order status</th>
            <th>Number of Orders</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="color:orangered">Pending</td>
            <td style="color:orangered">{{ $pendingOrdersCount }}</td>
        </tr>
        <tr>
            <td style="color:blue">Confirmed</td>
            <td style="color:blue">{{ $confirmedOrdersCount }}</td>
        </tr>
        <tr>
            <td style="color:green">Delivered</td>
            <td style="color:green">{{ $deliveredOrdersCount }}</td>
        </tr>
        <tr>
            <td style="color:red">Cancelled</td>
            <td style="color:red">{{ $cancelledOrdersCount }}</td>
        </tr>

        <tr>
            <td><strong>Total</strong></td>
            <td><strong>{{ $totalOrdersCount }}</strong></td>
        </tr>
    </tbody>

</table>
 Total Sales: ${{ number_format($totalSales, 2) }}

<p>
    Please review the attached report for full details.
</p>

<x-mail::panel>
    <strong>Note:</strong> This report is automatically generated. If you have any questions, please contact us.
    <ul>
        <li>For any discrepancies, please reach out to our support team.</li>
        <li>Ensure to check the status of your orders regularly.</li>
        <li>Keep track of your inventory levels to avoid stockouts.</li>
        <li>We appreciate your continued partnership and look forward to serving you.</li>
    </ul>
</x-mail::panel>


<x-mail::button :url="''">
View Full Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
