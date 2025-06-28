<div class="relative">

  <!-- Layout Header -->
  <x-layouts.dashboard-component-heading
    title="Manage Rawmaterial Orders"
    :description="__('Manage all your rawmaterial orders here. Place new orders, view current stock, and manage inventory efficiently.')">
  </x-layouts.dashboard-component-heading>

  <!-- Trigger Button -->
  <div class="p-6 flex justify-end">
    <button @click="open = 'openorder'"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
      Order Rawmaterials
    </button>
  </div>

  <!-- Table (ALWAYS visible) -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 z-0">

    <h2 class="text-xl font-semibold mb-2 ">Raw Materials Purchase Order History</h2>
<div class="relative overflow-x-auto rounded-lg shadow-md">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-5">
                  Material Name
              </th>
              <th scope="col" class="px-6 py-5">
                Supplier Name
            </th>
              <th scope="col" class="px-6 py-5">
                 Quantity
              </th>
              <th scope="col" class="px-6 py-5">
                  Total Price
              </th>
              <th scope="col" class="px-6 py-5">
                  Order Date
              </th>
              <th scope="col" class="px-6 py-5">
                Expected Delivery Date
            </th>
            <th scope="col" class="px-6 py-5">
              Status
          </th>
          <th scope="col" class="px-6 py-5">
              Action
        </th>
          </tr>
      </thead>
      <tbody>
        @foreach($rawmaterial_orders as $order)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="flex items-center pl-auto py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="ps-3">
                      <div class="text-base font-semibold">{{$order->rawmaterial->name}}</div>
                  </div>  
              </th>
              <td class="px-6 py-4">
                  &nbsp;{{$order->supplier->name}}
              </td>
              <td class="px-6 py-4">
                {{$order->quantity}}
            </td>
            <td class="px-6 py-4">
             ${{$order->total_price}}
          </td>
              <td class="px-6 py-4">
                  {{$order->order_date}}
          
              </td>
              <td class="px-6 py-4">
                {{$order->expected_delivery_date}}
            </td>
              @php
                  $status = $order->status;
                  $styles = match($status) {
                      'pending' => 'bg-yellow-500',
                      'delivered' => 'bg-green-500',
                      'cancelled' => 'bg-red-500',
                      'confirmed' => 'bg-blue-500',
                      default => 'bg-gray-500',
                  };
              @endphp
              <td>
                  <div class="flex items-center">
                      <div class="h-3.5 w-3.5 rounded-full {{$styles}} me-2"></div>{{$order->status}}
                  </div>
              </td>
              <td>
                @if($order->status == 'pending')
                <form wire:submit.prevent="cancelOrder({{ $order->id }})" class="inline">
                  <button type="submit"
                          class="px-3 py-1.5 bg-red-400 text-white rounded-lg hover:bg-red-700 transition cursor-pointer">
                      Cancel
                  </button>
                </form>
                  @elseif($order->status == 'delivered')
                  <div
                          class="px-3 py-1.5 text-green-400">
                      Delivered
                  </div>
                  @elseif($order->status == 'cancelled')
                  <div
                          class="px-3 py-1.5 text-red-400">
                      Cancelled
                  </div>
                  @elseif($order->status == 'confirmed')
                  <div
                          class="px-3 py-1.5 text-blue-400">
                      Confirmed
                  </div>
                  @endif
                
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
