<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Chats And Messages') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your chats and messages') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-white">
        <div class="w-1/4 border-r bg-gray-50">
            <div class="p-4 font-bold text-gray-700 border-b text-center text-lg">Present Users</div>
            <div class="divide-y">
                @foreach($vendors as $vendor)
                <div wire:click='selectVendor({{ $vendor->id }})' class="p-3 cursor-pointer hover:bg-blue-100 transition 
                    {{ $selectedVendor->id === $vendor->id ? 'bg-blue-200' : '' }}">
                <div class="flex items-center justify-center text-gray-800 ">
                    <svg style="width:16px; height:16px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                      </svg>
                </div>
                    <div class="text-gray-800"> 
                       {{$vendor->name}}</div>
                    <div class="text-xs text-gray-500">{{$vendor->email}}</div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-3/4 flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b bg-gray-50">
                <div class="text-lg font-semibold text-gray-800">{{$selectedVendor->name}}</div>
                <div class="text-xs text-gray-500">{{$selectedVendor->email}}</div>
            </div>

            <!-- Messages -->
            <div class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                @foreach($messages as $message)
                <div class="flex {{$message->sender_id===Auth::id() ? 'justify-end' : 'justify-start'}} ">
                    <div class="max-w-xs px-4 py-2 rounded-2xl shadow {{$message->sender_id===Auth::id() ? 'bg-gray-500 text-white' : 'bg-blue-600 text-white'}}">
                        {{ $message->message }}
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

