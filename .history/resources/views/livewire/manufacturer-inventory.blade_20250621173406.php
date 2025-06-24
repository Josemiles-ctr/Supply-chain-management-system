<x-layouts.dashboard-component-heading
    title="Manufacturer Inventory"
    :description="__('Manage your inventory of products and Raw Materials')">

  <div class="flex justify-end">
  <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow">
    Place Purchase Order
  </button>
</div>

<!-- Alpine + Tailwind Modal with Form -->
<div x-data="{ open: false }" class="p-6">
    <!-- Trigger Button -->
    <div class="flex justify-end">
      <button @click="open = true"
              class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
        Open Modal
      </button>
    </div>
  
    <!-- Modal -->
    <div x-show="open"
         x-transition
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
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
                     class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
            </div>
  
            <!-- Email Field -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" id="email" name="email" required
                     class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
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
