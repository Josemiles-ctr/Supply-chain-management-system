<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Chats And Messages') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your chats and messages') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-green-200">
        <div class="w-1/4 border-r bg-gray-50 flex flex-col">
            <div class="p-4 font-bold text-gray-700 border-b text-center text-lg">Chats</div>
            <div class="divide-y flex-1 overflow-y-auto">
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
                            <div class="text-gray-800">{{$user->name}}</div>
                            <div class="text-xs text-gray-500">{{$user->email}}</div>
                        </div>
                    </div>
                    
                </div>
                <div class="w-1/2 mx-auto text-center inline-block text-xs font-semibold px-2 py-0.5 rounded-full shadow-sm
                    {{ $user->role === 'customer' ? 'bg-green-100 text-green-700' : ($user->role === 'manufacturer' ? 'bg-red-500 text-white' : 'bg-blue-100 text-blue-700') }}">
                    {{ ucfirst($user->role) }}
                </div>
                </div>
                @endforeach
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
                    <div class="text-lg font-semibold text-gray-800">{{$selectedUser->name}}</div>
                    <div class="text-xs text-gray-500">{{$selectedUser->email}}</div>
                </div>
            </div>

            <!-- Messages -->
            <div class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                @foreach($messages as $message)
                <div class="flex {{$message->sender_id===Auth::id() ? 'justify-end' : 'justify-start'}} ">
                    <div class="max-w-xs px-4 py-2 rounded-2xl shadow {{$message->sender_id===Auth::id() ? 'bg-gray-500 text-white' : 'bg-blue-600 text-white'}}">
                        {{ $message->message }}  
                        <span class="text-gray-400 text-xs">{{$message->created_at->diffForHumans()}}</span>
                        @if($message->sender_id === Auth::id())
                            <span class="text-green-500 flex items-end justify-end gap-1 mt-1 w-full">
                                <span class="ml-auto flex items-end gap-1">
                                    <span>(You)</span>
                                    <span class="flex flex-row items-end gap-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-3 h-3 ml-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-3 h-3 -ml-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                </span>
                            </span>
                        {{-- @elseif($message->receiver_id === $selectedVendor->id)
                            @php
                                $nameParts = explode(' ', $selectedVendor->name);
                                $lastName = end($nameParts);
                            @endphp
                            <span class="text-green-300">({{ $lastName }})</span> --}}
                        @endif
                    </div>
                </div>
                @endforeach
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
</div>

