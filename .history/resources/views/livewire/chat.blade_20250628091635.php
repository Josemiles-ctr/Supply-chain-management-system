<x-filament::card>
    <x-slot name="header">
        <h2 class="text-xl font-bold">
            Chats And Messages
        </h2>
        <p class="text-sm text-gray-500">
            Manage your chats and messages
        </p>
    </x-slot>

    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-white dark:bg-gray-900">
        <!-- Sidebar -->
        <div class="w-1/4 border-r bg-gray-50 dark:bg-gray-800 flex flex-col">
            <div class="p-4 font-bold text-gray-700 dark:text-gray-200 border-b text-center text-lg">Chats</div>
            <div class="divide-y flex-1 overflow-y-auto">
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <div wire:click='selectUser({{ $user->id }})'
                            class="p-3 cursor-pointer hover:bg-primary-50 transition
                            {{ $selectedUser->id === $user->id ? 'bg-primary-100' : '' }}">
                            <div class="flex items-center justify-center text-gray-800 dark:text-gray-200">
                                <div class="flex items-center gap-3 justify-start w-full">
                                    <span class="inline-flex items-center justify-center rounded-full border-2 border-primary-300 bg-white shadow" style="aspect-ratio:1/1; width:2.25rem; min-width:2.25rem; max-width:100%;">
                                        <svg class="w-full h-full p-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <div class="text-gray-800 dark:text-gray-200">{{$user->name ?? ''}}</div>
                                        <div class="text-xs text-gray-500">{{$user->email ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex justify-center mt-2">
                                @php
                                    $roleStyles = [
                                        'customer' => 'bg-success-100 text-success-700',
                                        'manufacturer' => 'bg-danger-500 text-white',
                                        'vendor' => 'bg-warning-100 text-warning-700',
                                        'supplier' => 'bg-purple-100 text-purple-700',
                                    ];
                                @endphp
                                <span class="text-xs font-semibold px-2 py-0.5 rounded-full shadow-sm
                                    {{ $roleStyles[$user->role] ?? 'bg-primary-100 text-primary-700' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-4 text-center text-gray-500">
                        No users found. Start a conversation!
                    </div>
                @endif
            </div>
        </div>
        <!-- Chat Area -->
        <div class="w-3/4 flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b bg-gray-50 dark:bg-gray-800 flex items-center gap-4">
                <span class="inline-flex items-center justify-center rounded-full border-2 border-primary-300 bg-white shadow shrink-0" style="aspect-ratio:1/1; width:3.5rem; min-width:3.5rem; max-width:100%;">
                    <svg class="w-full h-full p-2 text-gray-400 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </span>
                <div>
                    <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{$selectedUser->name ?? 'No user'}}</div>
                    <div class="text-xs text-gray-500">{{$selectedUser->email ?? ''}}</div>
                </div>
            </div>
            <!-- Messages -->
            <div class="flex-1 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
                @if(count($messages) === 0)
                    <div class="flex items-center justify-center h-full text-gray-500 text-base font-medium">
                        No messages yet. Start the conversation!
                    </div>
                @else
                    <div class="p-4 space-y-2">
                        @foreach($messages as $message)
                            <div class="flex {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                <div class="max-w-xs px-4 py-2 rounded-2xl shadow
                                    {{ $message->sender_id === Auth::id() ? 'bg-gray-500 text-white' : 'bg-primary-600 text-white' }}">
                                    {{ $message->message }}
                                    <span class="text-gray-400 text-xs block mt-1">
                                        {{ $message->created_at->diffForHumans() }}
                                    </span>
                                    @if($message->sender_id === Auth::id())
                                        <div class="text-success-600 text-xs mt-1 flex items-center gap-1">
                                            (You)
                                            <x-filament::icon name="heroicon-o-check" class="w-3 h-3"/>
                                            <x-filament::icon name="heroicon-o-check" class="w-3 h-3 -ml-1"/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- Input -->
            <form wire:submit="submit" class="p-4 border-t bg-white dark:bg-gray-800 flex items-center gap-2">
                @csrf
                <input
                    type="text"
                    wire:model='newMessage'
                    class="flex-1 filament-forms-input border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-primary-300 text-black dark:text-white bg-white dark:bg-gray-900"
                    placeholder="Type your message..." />
                <button type="submit"
                    class="filament-button filament-button--primary text-sm px-4 py-2 rounded-full transition">
                    Send
                </button>
            </form>
        </div>
    </div>
</x-filament::card>
