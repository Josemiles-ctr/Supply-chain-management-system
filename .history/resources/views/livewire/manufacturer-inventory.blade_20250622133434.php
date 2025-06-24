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
      Order Rawmaterials
    </button>
  </div>

  <!-- Table (ALWAYS visible) -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-6 z-0">
    
<div class="relative overflow-x-auto rounded-lg shadow-md">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="p-4">
                  <div class="flex items-center">
                      <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-all-search" class="sr-only">checkbox</label>
                  </div>
              </th>
              <th scope="col" class="px-6 py-3">
                  Name
              </th>
              <th scope="col" class="px-6 py-3">
                  Position
              </th>
              <th scope="col" class="px-6 py-3">
                  Status
              </th>
              <th scope="col" class="px-6 py-3">
                  Action
              </th>
          </tr>
      </thead>
      <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                  <div class="flex items-center">
                      <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                  </div>
              </td>
              <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                  <div class="ps-3">
                      <div class="text-base font-semibold">Neil Sims</div>
                      <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                  </div>  
              </th>
              <td class="px-6 py-4">
                  React Developer
              </td>
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                  </div>
              </td>
              <td class="px-6 py-4">
                  <!-- Modal toggle -->
                  <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
              </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                  
              </td>
              <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Jese image">
                  <div class="ps-3">
                      <div class="text-base font-semibold">Bonnie Green</div>
                      <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                  </div>
              </th>
              <td class="px-6 py-4">
                  Designer
              </td>
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                  </div>
              </td>
              <td class="px-6 py-4">
                  <!-- Modal toggle -->
                  <a href="#" type="button" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
              </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                  
              </td>
              <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Jese image">
                  <div class="ps-3">
                      <div class="text-base font-semibold">Jese Leos</div>
                      <div class="font-normal text-gray-500">jese@flowbite.com</div>
                  </div>
              </th>
              <td class="px-6 py-4">
                  Vue JS Developer
              </td>
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                  </div>
              </td>
              <td class="px-6 py-4">
                  <!-- Modal toggle -->
                  <a href="#" type="button" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
              </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                  
              </td>
              <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Jese image">
                  <div class="ps-3">
                      <div class="text-base font-semibold">Thomas Lean</div>
                      <div class="font-normal text-gray-500">thomes@flowbite.com</div>
                  </div>
              </th>
              <td class="px-6 py-4">
                  UI/UX Engineer
              </td>
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                  </div>
              </td>
              <td class="px-6 py-4">
                  <!-- Modal toggle -->
                  <a href="#" type="button" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
              </td>
          </tr>
          <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                  
              </td>
              <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Jese image">
                  <div class="ps-3">
                      <div class="text-base font-semibold">Leslie Livingston</div>
                      <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                  </div>
              </th>
              <td class="px-6 py-4">
                  SEO Specialist
              </td>
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Offline
                  </div>
              </td>
              <td class="px-6 py-4">
                  <!-- Modal toggle -->
                  <a href="#" type="button" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
              </td>
          </tr>
      </tbody>
  </table>
</div>

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
            Finish
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
