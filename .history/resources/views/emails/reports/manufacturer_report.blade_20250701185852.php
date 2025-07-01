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
                Raw Material Stock Comment:
            </th>
            <th>
                Number
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Still in Stock
            </td>
            <td>
                {{ $still }}
            </td>
        </tr>
        <tr>
            <td>
                Running Low
            </td>
            <td>
                {{ $low }}
            </td>
        </tr>
        <tr>
            <td>
                Out of Stock
            </td>
            <td>
                {{ $out }}
            </td>
    </tbody>
</table>
mail::panel
    <h2>Raw Materials Purchase Orders</h2>
    <p>
        The following table contains the details of all purchase orders made this week:
    </p>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Supplier</th>
                <th>Status</th>
                <th>Total Cost</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->supplier->name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>${{ number_format($order->total_cost, 2) }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
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
