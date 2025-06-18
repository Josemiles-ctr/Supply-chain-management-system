import Echo from 'laravel-echo';


window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    client: null, // 👈 THIS disables the Pusher requirement
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echo.connector.socket.on('connect', () => {
    console.log('Reverb connected!');
});
window.Echo.connector.socket.on('error', (error) => {
    console.error('Reverb connection error:', error);
});
