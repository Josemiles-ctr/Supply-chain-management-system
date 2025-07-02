<script>
document.addEventListener('DOMContentLoaded', function() {
    // Replace 'your-element-id' with the actual ID or selector
    var element = document.getElementById('your-element-id');
    if (element && element.childNodes.length > 0) {
        // Safe to access childNodes here
        console.log(element.childNodes);
    } else {
        console.log('Element not found or has no child nodes');
    }
});
</script>
