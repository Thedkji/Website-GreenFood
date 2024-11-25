<style>
    .active_variantGroup {
        border: 1px solid greenyellow !important;
        background: #f5f5f5;
    }

    .truncate-text-120 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 120px;
    }

    .variant-parent {
        display: block;
        font-size: 1.2rem;
        margin-top: 15px;
        color: #333;
    }

    .variant-option {
        display: inline-flex;
        align-items: center;
        margin-right: 10px;
        margin-bottom: 10px;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-decoration: none;
        color: #555;
    }

    .variant-option:hover {
        background-color: #f5f5f5;
        border-color: #ccc;
    }

    .variant-img {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 8px;
    }

    /* Container styling */
    .container {
        padding: 20px;
    }

    /* Product Card */
    .product-card {
        display: flex;
        align-items: center;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        transition: box-shadow 0.3s, transform 0.3s;
        background-color: #fff;
        margin-bottom: 20px;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    /* Product Image */
    .product-img-container {
        flex: 0 0 100px;
        overflow: hidden;
        border-radius: 12px;
        margin-right: 20px;
    }

    .product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
    }

    /* Product Info */
    .product-info {
        flex: 1;
    }

    .product-name {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .product-pricing {
        margin-bottom: 8px;
    }

    .price-regular {
        text-decoration: line-through;
        color: #999;
        margin-right: 10px;
    }

    .price-sale {
        color: #81C408;
        font-weight: bold;
        font-size: 18px;
    }

    .product-rating i {
        margin-right: 2px;
        color: #f1c40f;
    }

    .product-rating i.text-secondary {
        color: #ddd;
    }

    /* Adjustments for responsiveness */
    @media (max-width: 576px) {
        .product-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .product-img-container {
            margin-right: 0;
            margin-bottom: 15px;
        }
    }

    .vesitable-item {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        max-width: 300px;
    }

    .vesitable-img img {
        height: 200px;
        object-fit: cover;
        width: 100%;
        border-bottom: 1px solid #ddd;
    }

    .vesitable-item h4 {
        font-size: 1.25rem;
        font-weight: bold;
        height: 30px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .vesitable-item p {
        height: 60px;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 10px 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .price-container {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: auto;
    }

    .price-container .text-danger {
        font-size: 1.2rem;
        font-weight: bold;
        color: #81C408 !important;
    }

    .price-container .text-muted {
        font-size: 1rem;
        color: #6c757d;
        text-decoration: line-through;
    }

    .carousel-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    #description {
        position: relative;
        max-width: 100%;
        padding-bottom: 60px;
        max-height: 350px;
        overflow: hidden;
        transition: max-height 0.5s ease;
    }

    #description.collapsed {
        max-height: none;
    }

    #description-content {
        position: relative;
        padding-bottom: 60px;
        /* Đảm bảo không gian cho nút read-more */
    }

    #description-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50px; /* Điều chỉnh chiều cao phù hợp */
    background: linear-gradient(transparent, rgba(255, 255, 255, 1)); /* Hiệu ứng mờ dần */
    z-index: 10; /* Đảm bảo overlay nằm trên nội dung */
}


    #description.collapsed #description-overlay {
        display: none;
    }

    #read-more {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        /* Đảm bảo nút nằm trên overlay */
        background-color: rgba(255, 255, 255, 0.9);
        /* Nền trắng mờ */
        padding: 10px 20px;
        border-radius: 20px;
        text-decoration: none;
        color: #007bff;
        /* Màu chữ xanh dương */
        font-weight: 500;
        border: 1px solid #007bff;
        /* Viền xanh dương */
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    #read-more:hover {
        background-color: #007bff;
        /* Nền xanh dương khi hover */
        color: #ffffff;
        /* Màu chữ trắng khi hover */
    }

    /* Ensure all product items have equal height */
    .product-item {
        display: flex;
        flex-direction: column;
    }

    /* Set minimum height for the title to prevent height fluctuation */
    .product-title {
        min-height: 60px;
        overflow: hidden;
    }

    /* Hover effect on the image */
    .product-image img {
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-image:hover img {
        transform: scale(1.3);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Optional: Truncate description if needed */
    .product-item p {
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
