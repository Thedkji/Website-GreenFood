<script>
    function toggleSelectAll(source, selector) {
        const checkboxes = document.querySelectorAll(selector);
        checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        toggleDeleteButton(selector);

        // Thêm sự kiện change cho checkbox con
        document.querySelectorAll(selector).forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectAllCheckbox = document.getElementById('select-all');
                const checkboxes = document.querySelectorAll(selector);
                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

                selectAllCheckbox.checked = allChecked; // Cập nhật trạng thái "select all"
                toggleDeleteButton(selector); // Cập nhật nút xóa
            });
        });
    }

    function toggleDeleteButton(selector) {
        const checkboxes = document.querySelectorAll(selector);
        const deleteButton = document.getElementById('delete-button');
        deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
            'none';
    }
</script>
