<script>
    document.querySelectorAll('.rating-container').forEach(container => {
        const stars = container.querySelectorAll('.star');

        stars.forEach(star => {
            // Khi di chuột vào sao
            star.addEventListener('mouseover', () => {
                const value = parseInt(star.getAttribute('data-value'));

                // Đổi màu tất cả các sao từ đầu đến sao hiện tại
                stars.forEach(s => {
                    if (parseInt(s.getAttribute('data-value')) <= value) {
                        s.classList.add('hovered');
                    } else {
                        s.classList.remove('hovered');
                    }
                });
            });

            // Khi chuột rời khỏi sao
            star.addEventListener('mouseout', () => {
                stars.forEach(s => s.classList.remove('hovered'));
            });

            // Khi nhấp vào sao
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                const ratingInput = document.getElementById('star-value-' + container.id
                    .replace('rating-stars-', ''));

                ratingInput.value = value; // Lưu giá trị vào input hidden

                // Cập nhật sao đã chọn
                stars.forEach(s => {
                    if (parseInt(s.getAttribute('data-value')) <= value) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });
            });
        });
    });
    document.querySelectorAll('.rating-container').forEach(container => {
        const stars = container.querySelectorAll('.star');
        const ratingInput = document.getElementById('star-value-' + container.id.replace('rating-stars-', ''));

        // Kiểm tra khi form được gửi
        const form = container.closest('form');
        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Kiểm tra xem sao đã được chọn chưa
            if (!ratingInput.value) {
                isValid = false;
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn sao để đánh giá!',
                });
            }

            // Kiểm tra nội dung bình luận có trống không
            const commentTextarea = form.querySelector('#comment');
            if (commentTextarea.value.trim() === '') {
                isValid = false;
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Vui lòng nhập bình luận!',
                });
            }

            // Nếu không hợp lệ, ngừng gửi form
            if (!isValid) {
                e.preventDefault();
            }
        });

        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                const value = parseInt(star.getAttribute('data-value'));

                stars.forEach(s => {
                    if (parseInt(s.getAttribute('data-value')) <= value) {
                        s.classList.add('hovered');
                    } else {
                        s.classList.remove('hovered');
                    }
                });
            });

            star.addEventListener('mouseout', () => {
                stars.forEach(s => s.classList.remove('hovered'));
            });

            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                ratingInput.value = value; // Lưu giá trị vào input hidden

                stars.forEach(s => {
                    if (parseInt(s.getAttribute('data-value')) <= value) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });
            });
        });
    });
</script>