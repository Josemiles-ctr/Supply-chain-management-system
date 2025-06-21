<x-layouts.dashboard-component-heading
    title="Chats And Messages"
    description="Manage your chats and messages"
>
    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-green-200">
        <div class="w-1/4 border-r bg-gray-50 flex flex-col">
            <div class="p-4 font-bold text-gray-700 border-b text-center text-lg">Chats</div>
            <div class="divide-y flex-1 overflow-y-auto">
            @if($users->count() > 0)
                @foreach($users as $user)
                <div wire:click='selectUser({{ $user->id }})' class="p-3 cursor-pointer hover:bg-blue-100 transition 
                    {{ $selectedUser->id === $user->id ? 'bg-blue-200' : '' }}">
                <div class="flex items-center justify-center text-gray-800 ">
                    <div class="flex items-center gap-3 justify-start w-full">
                        <span class="inline-flex items-center justify-center rounded-full border-2 border-[#84c1dd] bg-white shadow" style="aspect-ratio:1/1; width:2.25rem; min-width:2.25rem; max-width:100%;">
                           <svg class="w-full h-full p-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                           </svg>
                       </span>
                       <div>
                           <div class="text-gray-800">{{$user->name ?? ''}}</div>
                           <div class="text-xs text-gray-500">{{$user->email ?? ''}}</div>
                       </div>
                   </div>
                   
               </div>
               <div class="w-full flex justify-center">
                   @php
                   $roleStyles = [
                       'customer' => 'bg-green-100 text-green-500',
                       'manufacturer' => 'bg-red-500 text-white',
                       'vendor' => 'bg-yellow-100 text-yellow-700',
                       'supplier' => 'bg-purple-100 text-purple-700',
                   ];
               @endphp
                   <span class="text-xs font-semibold px-2 py-0.5 rounded-full shadow-sm
                       {{ $roleStyles[$user->role] ?? 'bg-blue-100 text-blue-700' }}">
                       {{ ucfirst($user->role) }}
                   </span>
               </div>
               </div>
               @endforeach
            @endif
            </div>
        </div>
        <div class="w-3/4 flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b bg-gray-50 flex items-center gap-4">
                <span class="inline-flex items-center justify-center rounded-full border-2 border-[#84c1dd] bg-white shadow shrink-0" style="aspect-ratio:1/1; width:3.5rem; min-width:3.5rem; max-width:100%;">
                        <svg class="w-full h-full p-2 text-gray-400 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                   
                </span>
                <div>
                    <div class="text-lg font-semibold text-gray-800">{{$selectedUser->name ?? ''}}</div>
                    <div class="text-xs text-gray-500">{{$selectedUser->email ?? ''}}</div>
                </div>
            </div>

            <!-- Messages -->
            <div class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                
            @if($messages->count() === 0)
                <div class="text-center text-gray-500 mt-4">
                    No messages yet. Start the conversation!
                </div>
            @endif

                
            </div>

            <!-- Input -->
            <form wire:submit="submit" class="p-4 border-t bg-white flex items-center gap-2">
            @csrf
                <input
                    type="text"
                    wire:model='newMessage'
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-300 text-black"
                    placeholder="Type your message..." />
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-full transition">
                    Send
                </button>
            </form>
        </div>
    </div>
</x-layouts.dashboard-component-heading>

