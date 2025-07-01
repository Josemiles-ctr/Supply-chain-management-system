<div x-data="{ open: false }" class="relative">

  <!-- Layout Header -->
  <x-layouts.dashboard-component-heading
    title="Manufacturer Inventory"
    :description="__('Manage your inventory of products and Raw Materials')">
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
    
<div class="relative overflow-x-auto rounded-lg shadow-md">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Name
              </th>
              <th scope="col" class="px-6 py-3">
                  Price 
              </th>
              <th scope="col" class="px-6 py-3">
                  Current Stock
              </th>
              <th scope="col" class="px-6 py-3">
                  Comment
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach($rawmaterials as $rawmaterial)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="flex items-center pl-auto py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="ps-3">
                      <div class="text-base font-semibold">{{$rawmaterial->name}}</div>
                  </div>  
              </th>
              <td class="px-6 py-4">
                  $ {{$rawmaterial->price}}
              </td>
              @php
            $styles= [
              $rawmaterial->current_stock < $rawmaterial->reoderlevel => ' bg-red-500',

              $rawmaterial->current_stock <= $rawmaterial->reoderlevel + 10  => ' bg-orange-500',
              $rawmaterial->current_stock > $rawmaterial->reoderlevel + 11 => 'Out Of Stock'
             ]
             @endphp
             @php
              if($rawmaterial->current_stock < $rawmaterial->reoderlevel) {
                $styles=' bg-red-500';
                $status
              }'Running Out Of Stock',
              $rawmaterial->current_stock <= $rawmaterial->reoderlevel + 10 => ' bg-orange-500',
              $rawmaterial->current_stock > $rawmaterial->reoderlevel + 11 => 'Still in stock'
             ]
             @endphp
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      <div class="h-2.5 w-2.5 rounded-full {{$styles}} me-2"></div>{{$statements}}
                  </div>
              </td>
              <td class="px-6 py-4">
                  <!-- Modal toggle -->
                  <a @click="open = 'openedit'" href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ReOrder Now</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

  </div>

  <!-- Modal Overlay and Box -->
  <div x-show="open==='openorder'"
       x-transition
       class="fixed inset-0 z-[9999] flex items-center justify-center pointer-events-none"> 
    
    <!-- Dark Background (doesn’t block clicks) -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <!-- Modal Box (blocks clicks) -->
    <div @click.away="open = false"
         class="relative z-10 bg-white w-full max-w-lg rounded-xl shadow-lg p-6 pointer-events-auto"
         x-transition
         @keydown.escape.window="open = false">
      
      <!-- Modal Header -->
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Submit Order Information</h2>

      <!-- Form Inside Modal -->
      <form @submit.prevent="alert('Form submitted!'); open = false;">
        <div class="space-y-4">
          <!-- Name Field -->
          <div class="max-w-full mx-auto">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" required
                   class="mt-1 block w-full px-4 py-2 border text-black border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>

          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" required
                   class="mt-1 block w-full px-4 py-2 border text-black border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button"
                  @click="open = false"
                  class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
            Cancel
          </button>

          <button type="submit"
                  class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Finish
          </button>
        </div>
      </form>

    </div>
  </div>
   







  <div x-show="open==='openedit'"
       x-transition
       class="fixed inset-0 z-[9999] flex items-center justify-center pointer-events-none">
    
    <!-- Dark Background (doesn’t block clicks) -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Modal Box (blocks clicks) -->
    <div @click.away="open = false"
         class="relative z-10 bg-white w-full max-w-lg rounded-xl shadow-lg p-6 pointer-events-auto"
         x-transition
         @keydown.escape.window="open = false">
      
      <!-- Modal Header -->
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit product</h2>

      <!-- Form Inside Modal -->
      <form @submit.prevent="alert('Form submitted!'); open = false;">
        <div class="space-y-4">
          <!-- Name Field -->
          <div class="max-w-full mx-auto">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" required
                   class="mt-1 block w-full px-4 py-2 border text-black border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>

          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" required
                   class="mt-1 block w-full px-4 py-2 border text-black border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>
        </div>

        <!-- Modal Actions -->
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button"
                  @click="open = false"
                  class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
            Cancel
          </button>

          <button type="submit"
                  class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Finish
          </button>
        </div>
      </form>

    </div>
  </div>

</div>
