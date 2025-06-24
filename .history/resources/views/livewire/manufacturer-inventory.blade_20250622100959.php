<x-layouts.dashboard-component-heading
    title="Manufacturer Inventory"
    :description="__('Manage your inventory of products and Raw Materials')">

<!-- Alpine + Tailwind Modal with Table in Background -->
<div x-data="{ open: false }" class="relative">

  <!-- Trigger Button -->
  <div class="p-6 flex justify-end z-10 relative">
    <button @click="open = true"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
      Open Modal
    </button>
  </div>

  <!-- Table of Products -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg z-10 px-6">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">Product name</th>
          <th scope="col" class="px-6 py-3">Color</th>
          <th scope="col" class="px-6 py-3">Category</th>
          <th scope="col" class="px-6 py-3">Price</th>
          <th scope="col" class="px-6 py-3">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
            Apple MacBook Pro 17"
          </th>
          <td class="px-6 py-4">Silver</td>
          <td class="px-6 py-4">Laptop</td>
          <td class="px-6 py-4">$2999</td>
          <td class="px-6 py-4"><a href="#" class="text-blue-600 hover:underline">Edit</a></td>
        </tr>
        <!-- Add more rows here as needed -->
      </tbody>
    </table>
  </div>

  <!-- Modal Overlay and Content -->
  <div x-show="open"
       x-transition
       class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-40"
       @keydown.escape.window="open = false">

    <!-- Modal Box -->
    <div @click.away="open = false"
         class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6"
         x-transition>
      
      <!-- Modal Header -->
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Submit Information</h2>

      <!-- Form Inside Modal -->
      <form @submit.prevent="alert('Form submitted!'); open = false;">
        <div class="space-y-4">
          <!-- Name Field -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" required
                   class="mt-1 text-black block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>

          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required
                   class="mt-1 text-black block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
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

</x-layouts.dashboard-component-heading>
