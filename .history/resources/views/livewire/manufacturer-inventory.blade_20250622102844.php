<div x-data="{ open: false }" class="relative">

  <!-- Layout Header -->
  <x-layouts.dashboard-component-heading
    title="Manufacturer Inventory"
    :description="__('Manage your inventory of products and Raw Materials')">
  </x-layouts.dashboard-component-heading>

  <!-- Trigger Button -->
  <div class="p-6 flex justify-end">
    <button @click="open = true"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
      Open Modal
    </button>
  </div>

  <!-- Table (ALWAYS visible) -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 z-0">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-white border-separate border-spacing-0 rounded-lg overflow-hidden">
      <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3 text-left">Product name</th>
          <th scope="col" class="px-6 py-3 text-left">Color</th>
          <th scope="col" class="px-6 py-3 text-left">Category</th>
          <th scope="col" class="px-6 py-3 text-left">Price</th>
          <th scope="col" class="px-6 py-3 text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-left">
            Apple MacBook Pro 17"
          </th>
          <td class="px-6 py-4 text-left">Silver</td>
          <td class="px-6 py-4 text-left">Laptop</td>
          <td class="px-6 py-4 text-left">$2999</td>
          <td class="px-6 py-4 text-left">
            <a href="#" class="text-blue-600 hover:underline">ORD</a>
          </td>
        </tr>
        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-left">
            Microsoft Surface Pro
          </th>
          <td class="px-6 py-4 text-left">White</td>
          <td class="px-6 py-4 text-left">Laptop PC</td>
          <td class="px-6 py-4 text-left">$1999</td>
          <td class="px-6 py-4 text-left">
            <a href="#" class="text-blue-600 hover:underline">Edit</a>
          </td>
        </tr>
        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-left">
            Magic Mouse 2
          </th>
          <td class="px-6 py-4 text-left">Black</td>
          <td class="px-6 py-4 text-left">Accessories</td>
          <td class="px-6 py-4 text-left">$99</td>
          <td class="px-6 py-4 text-left">
            <a href="#" class="text-blue-600 hover:underline">Order Production</a>
          </td>
        </tr>
      </tbody>
    </table>
    
    
    
  </div>

  <!-- Modal Overlay and Box -->
  <div x-show="open"
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
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Submit Information</h2>

      <!-- Form Inside Modal -->
      <form @submit.prevent="alert('Form submitted!'); open = false;">
        <div class="space-y-4">
          <!-- Name Field -->
          <div>
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
            Save
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
