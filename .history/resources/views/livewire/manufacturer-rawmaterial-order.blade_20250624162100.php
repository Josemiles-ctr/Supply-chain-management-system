<div x-data="{ open: false }" class="relative">

    <!-- Layout Header -->
    <x-layouts.dashboard-component-heading
      title="Raw Material Orders"
      :description="__('Manage your Raw Material Purchase Orders')">
    </x-layouts.dashboard-component-heading>
  
    <!-- Trigger Button -->
    <div class="p-6 flex justify-end">
      <button @click="open = 'openorder'"
              class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
        Orders Section
      </button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 z-0">
    
      <h2 class="text-xl font-semibold mb-2 ">Raw Materials Order History</h2>
  <div class="relative overflow-x-auto rounded-lg shadow-md">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                  Supplier Name
              </th>
              <th scope="col" class="px-6 py-3">
                Quantity
              </th>
                <th scope="col" class="px-6 py-3">
                    Total Price
                </th>
                <th scope="col" class="px-6 py-3">
                  Order Date
              </th>
              Selective design for the stat
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                  Expected Delivery Date
              </th>
                <th scope="col" class="px-6 py-3">
                    Delivery Option
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
              </th>
            </tr>
        </thead>
        <tbody>
          @foreach($rawmaterial_purchase_orders as $order)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="flex items-center pl-auto py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <div class="ps-3">
                    <div class="text-base font-semibold">{{$order->rawmaterial->name}}</div>
                </div>  
            </th>
            <td class="px-6 py-4">
             {{$order->supplier->name}}
            </td>
            <td class="px-6 py-4">
              {{$order->quantity}}
             </td>
            <td class="px-6 py-4">
              {{$order->total_price}}
             </td>
             <td class="px-6 py-4">
              {{$order->order_date}}
             </td>
             <td class="px-6 py-4">
              {{$order->status}}
             </td>
             <td class="px-6 py-4">
              {{$order->expected_delivery_date}}
             </td>
             <td class="px-6 py-4">
              {{$order->delivery_option}}
             </td>
             <td>
               <button
                class="bg-red-400 text-white px-4 py-2 cursor-pointer rounded hover:bg-red-700 transition">
              Cancel
              </button>
             </td>
          </tr>
          @endforeach
        </tbody>
       
    </table>
  </div>
  </div>
  </div>
  