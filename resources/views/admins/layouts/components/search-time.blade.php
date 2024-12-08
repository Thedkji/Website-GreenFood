<script>
    let debounceTimeout;

    function debounceSearch() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            document.getElementById("search-form").submit();
        }, 600);
    }
</script>
