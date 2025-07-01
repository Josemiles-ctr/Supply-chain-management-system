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
            <td style="color: green">Delivered</td>
            <td style="color: green">{{ $deliveredCount }}</td>
        </tr>
        <tr>
            <td style="color: blue">Confirmed</td>
            <td style="color: blue">{{ $confirmedCount }}</td>
        </tr>
        <tr>
            <td style="color: orange">Pending</td>
            <td style="color: orange">{{ $pendingCount }}</td>
        </tr>
        <tr>
            <td style="color: red">Cancelled</td>
            <td style="color: red">{{ $cancelledCount }}</td>
        </tr>
    </tbody>
</table>
<h2>Raw Materials Current Stock Summary:</h2>
<table>
    <thead>
        <tr>
            <th>
                Raw Material C
            </th>
            <th>
                Current Stock Level
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currentStock as $material)
            <tr>
                <td>{{ $material->name }}</td>
                <td>{{ $material->current_stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-mail::button :url="''">
View Report
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
