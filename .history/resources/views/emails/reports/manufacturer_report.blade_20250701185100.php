<x-mail::message>
# WEEKLY RAW MATERIALS PURCHASE REPORT


<h1>Hello {{ $user->name }},</h1>
<p> Here is your weekly raw materials purchase report for this week of {{ $date }}.
    This report includes details of all raw materials purchased from various suppliers, including quantities, costs, and any relevant notes.
    Also included are purchase orders and their statuses.
    Please review the attached report for detailed information on your purchases.
</p>
<h2>Raw materials purchase Summary:</h2>
<table>
    <thead>
        <tr>
            <th>
                Purchase Order Status
            </th>
            <th>
                Number of Purchase Orders
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Delivered</td>
            <td col>{{ $deliveredCount }}</td>
        </tr>
        <tr>
            <td>Confirmed</td>
            <td style="color: blue">{{ $confirmedCount }}</td>
        </tr>
        <tr>
            <td>Pending</td>
            <td style="color: orange">{{ $pendingCount }}</td>
        </tr>
        <tr>
            <td>Cancelled</td>
            <td style="color: red">{{ $cancelledCount }}</td>
        </tr>
    </tbody>
</table>



<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
