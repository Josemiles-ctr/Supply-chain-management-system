<x-layouts.dashboard-component-heading
    title="Manufacturer Inventory"
    :description="__('Manage your inventory of products and Raw Materials')">

  <div class="flex justify-end">
  <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl shadow">
    Place Purchase Order
  </button>

  <div x-data="{ open: false }">
  <button @click="open = true" class="bg-blue-600 text-white px-4 py-2 rounded">Open Modal</button>

  <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl">
      <h2 class="text-xl font-bold mb-2">Modal Title</h2>
      <p>Alpine + Tailwind = 🔥</p>
      <button @click="open = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Close</button>
    </div>
  </div>
</div>

</div>

</x-layouts.dashboard-component-heading>
