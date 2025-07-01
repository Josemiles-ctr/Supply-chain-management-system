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
                    T
                </th>
                <th scope="col" class="px-6 py-3">
                    Current Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Comment
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
              </th>
            </tr>
        </thead>
        {{-- <tbody>
          @foreach($rawmaterials as $rawmaterial)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center pl-auto py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$rawmaterial->name}}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                 {{$rawmaterial->category->name}}
              </td>
                <td class="px-6 py-4">
                    $&nbsp;{{$rawmaterial->price}}
                </td>
                <td class="px-6 py-4">
                  {{$rawmaterial->current_stock}}
              </td>
              @php
              $stock = (int) $rawmaterial->current_stock;
              $reorder = (int) $rawmaterial->reorder_level;
            
              if ($stock < $reorder) {
                  $styles = 'bg-red-500';
                  $status = 'Out Of Stock';
              } elseif ($stock <= $reorder + 10) {
                  $styles = 'bg-orange-500';
                  $status = 'Running Out Of Stock';
              } else {
                  $styles = 'bg-green-500';
                  $status = 'Still in Stock';
              }
            @endphp
            
            
  
  
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-3.5 w-3.5 rounded-full {{$styles}} me-2"></div>{{$status}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
                  <button wire:click="select_rawmaterial({{ $rawmaterial->id }})"
                    class="bg-red-600 text-white px-4 py-2 cursor-pointer rounded hover:bg-green-700 transition">
                  Cancel
                  </button>
  
  
                </td>
            </tr>
            @endforeach
        </tbody> --}}
    </table>
  </div>
  </div>
  </div>
  