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
  
  
    <!-- Overlay: blocks interaction and adds blur/dim -->
    <div 
      class="absolute inset-0 bg-black/30 z-40"
      aria-hidden="true"
    ></div>
  
    <!-- Modal Content -->
    <div 
      class="relative z-50 bg-white dark:bg-gray-900 w-full max-w-lg rounded-xl shadow-lg p-6"
      @click.away="open = false"
      @keydown.escape.window="open = false"
    >
      <!-- Modal Header -->
      <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Order Raw Material</h2>
  
      <!-- Modal Form -->
      <form @submit.prevent="submitForm()">
        @csrf
        <div class="space-y-4">
          <!-- Name -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input 
              type="text" 
              id="name" 
              name="name" 
              x-model="formData.name"
              required
              class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
          </div>
  
          <!-- Quantity -->
          <div>
            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
            <input 
              type="number" 
              id="quantity" 
              name="quantity" 
              x-model="formData.quantity"
              required 
              min="1"
              class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
          </div>
  
          <!-- Message -->
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
            <textarea 
              id="message" 
              name="message"
              rows="4"
              x-model="formData.message"
              class="resize-none mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white bg-white dark:bg-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
              placeholder="Enter your message..."
            ></textarea>
          </div>
        </div>
  
        <!-- Buttons -->
        <div class="mt-6 flex justify-end space-x-3">
          <button 
            type="button"
            @click="open = false"
            class="px-4 py-2 bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition cursor-pointer"
          >
            Cancel
          </button>
          <button 
            type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition cursor-pointer"
          >
            Finish
          </button>
        </div>
      </form>
    </div>
  </div>
  
  
  </div>
  