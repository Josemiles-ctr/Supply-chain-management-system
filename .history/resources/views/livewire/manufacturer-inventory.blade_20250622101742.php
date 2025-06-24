<div x-data="{ open: false }">

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

  <!-- Product Table -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-6">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <!-- ... your thead and tbody as is ... -->
    </table>
  </div>

  <!-- ✅ Modal placed at the end to escape component stacking contexts -->
  <div x-show="open"
       x-transition
       class="fixed inset-0 z-[99999] flex items-center justify-center bg-black bg-opacity-50"
       @keydown.escape.window="open = false">

    <!-- Modal Box -->
    <div @click.away="open = false"
         class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6"
         x-transition>

      <h2 class="text-xl font-semibold text-gray-800 mb-4">Submit Information</h2>

      <form @submit.prevent="alert('Form submitted!'); open = false;">
        <div class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" required
                   class="mt-1 block w-full px-4 py-2 text-black border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" required
                   class="mt-1 block w-full px-4 py-2 text-black border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
          </div>
        </div>

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
