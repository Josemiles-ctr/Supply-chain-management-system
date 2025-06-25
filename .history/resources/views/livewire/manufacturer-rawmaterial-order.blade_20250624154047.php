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
        Order Rawmaterials
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
                    Total Price
                </th>
                <th scope="col" class="px-6 py-3">
                  Order Date
              </th>
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
        
       
    </table>
  </div>
  </div>
  </div>
  