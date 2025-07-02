<script>
/* Responsive container */
@media (max-width: 1024px) {
    .chat-main-container {
        flex-direction: column !important;
        height: 80vh !important;
        min-height: 400px !important;
        max-height: 90vh !important;
    }
    .chat-sidebar {
        width: 100% !important;
        min-width: 0 !important;
        border-right: none !important;
        border-bottom: 1px solid #e5e7eb !important;
        min-height: 120px !important;
        max-height: 200px !important;
        flex-direction: row !important;
        overflow-x: auto !important;
        overflow-y: hidden !important;
    }
    .chat-messages-container {
        flex: 1 1 0% !important;
        min-width: 0 !important;
        min-height: 0 !important;
    }
}
@media (max-width: 640px) {
    .chat-main-container {
        height: 100vh !important;
        min-height: 0 !important;
    }
    .chat-sidebar {
        max-height: 120px !important;
        font-size: 0.8rem !important;
    }
    .chat-messages-container {
        padding: 0.5rem !important;
    }
}
</style>
