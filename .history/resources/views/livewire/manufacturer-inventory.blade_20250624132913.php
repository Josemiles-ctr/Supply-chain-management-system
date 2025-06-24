<div class="relative">

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
    
    <h2 class="text-xl font-semibold mb-2 ">Raw Materials Inventory</h2>
<div class="relative overflow-x-auto rounded-lg shadow-md">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Name
              </th>
              <th scope="col" class="px-6 py-3">
                Category
            </th>
              <th scope="col" class="px-6 py-3">
                 Unit Price 
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
      <tbody>
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
                  class="bg-green-600 text-white px-4 py-2 cursor-pointer rounded hover:bg-green-700 transition">
                Re Order Now
                </button>


              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
 
@if ($showModal)
<div class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/40">
<<<<<<< HEAD
    <div class="bg-white dark:bg-gray-900 w-full max-w-lg rounded-xl shadow-lg p-4 relative max-h-[90vh] overflow-y-auto">

        <h2 class="text-xl font-semibold text-gra-800 dark:text-green-500 mb-2">
=======
    <div class="bg-white dark:bg-gray-900 w-full max-w-lg rounded-xl shadow-lg p-6 relative">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
>>>>>>> 80f50138c3907542b7a8fbe9eb7a7395947246f1
            Re Order {{ $rawmaterial_name }} Now
        </h2>

        <form wire:submit.prevent="placeOrder">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
<<<<<<< HEAD
                    <input name="name" type="text" wire:model.defer='rawmaterial_name' value="{{$rawmaterial_name}}" readonly
                           class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                  text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label wire:model.defer='rawmaterial_category' name="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <input type="text" value="{{ $rawmaterial_category }}" readonly
                           class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                  text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>
                 <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Qunatyity at $ {{$rawmaterial_price}} per {{$unit_of_measure}}</label>
                    <input type="number"
                            wire:model.live="rawmaterial_quantity"
                            wire:change="calculateTotal"
                            min="1"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                    text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                     </div>


                       <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Price</label>
                         <input type="text" readonly
                            value="$ {{ number_format($total ?? 0, 2) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                    text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                           </div>
                    
                           
                       
                           <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Delivery Option
                            </label>
                        
                            <div class="flex items-center gap-6 px-4 py-2 border border-gray-300 dark:border-gray-600 
                                        bg-white dark:bg-gray-800 rounded-lg">
                                
                                <label class="inline-flex items-center text-sm text-gray-800 dark:text-gray-100">
                                    <input type="radio" 
                                           wire:model.live="delivery_option" 
                                           name="delivery_option"
                                           value="pickup"
                                           class="form-radio text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600">
                                    <span class="ml-2">Pickup</span>
                                </label>
                        
                                <label class="inline-flex items-center text-sm text-gray-800 dark:text-gray-100">
                                    <input type="radio" 
                                           wire:model.live="delivery_option" 
                                           name="delivery_option"
                                           value="delivery"
                                           class="form-radio text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600">
                                    <span class="ml-2">Delivery</span>
                                </label>
                            </div>
                        
                            <div class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                Selected: <strong>{{ ucfirst($delivery_option ?? 'delivery') }}</strong>
                            </div>
                        </div>
              
                 

=======
                    <input type="text" value="{{ $rawmaterial_name }}" readonly
                           class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                  text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                    <input type="number" wire:model.defer="rawmaterial_quantity" min="1"
                           class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                  text-black dark:text-white bg-white dark:bg-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>

>>>>>>> 80f50138c3907542b7a8fbe9eb7a7395947246f1
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                    <textarea wire:model.defer="rawmaterial_message" rows="4"
                              class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                     text-gray-800 dark:text-white bg-white dark:bg-gray-800 resize-none rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm"
<<<<<<< HEAD
                              placeholder="Leave a note..."></textarea>
                </div>
            </div>
7395947246f1

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" wire:click="closeModal"
                        class="px-4 py-2 bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Finish
                </button>
            </div>
        </form>
    </div>
    @endif
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('order-placed', (event) => {
                alert(event.message); // Now properly accessing the message
            });
            
            Livewire.on('order-failed', (event) => {
                alert(event.message);
            });
        });
    </script>
</div>
