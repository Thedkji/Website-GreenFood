 <style>
     .active_variantGroup {
         border: 1px solid greenyellow !important;
         background: #f5f5f5;
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
         /* transition: background-color 0.3s; */
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
         box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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
         /* Đảm bảo chiều cao toàn phần */
         max-width: 300px;
         /* Cố định chiều rộng */
     }

     .vesitable-img img {
         height: 200px;
         object-fit: cover;
         /* Đảm bảo ảnh vừa khung */
         width: 100%;
         border-bottom: 1px solid #ddd;
     }

     .vesitable-item h4 {
         font-size: 1.25rem;
         font-weight: bold;
         height: 50px;
         /* Cố định chiều cao */
         overflow: hidden;
         /* Cắt bớt nội dung quá dài */
         text-overflow: ellipsis;
         white-space: nowrap;
     }

     .vesitable-item p {
         height: 60px;
         /* Giới hạn chiều cao phần mô tả */
         overflow: hidden;
         text-overflow: ellipsis;
         line-height: 1.5;
         /* Khoảng cách dòng cho dễ đọc */
         display: -webkit-box;
         -webkit-line-clamp: 3;
         /* Giới hạn 3 dòng */
         -webkit-box-orient: vertical;
     }




     .price-container {
         display: flex;
         align-items: center;
         gap: 8px;
         /* Khoảng cách giữa giá cũ và giá giảm */
     }

     .price-container .text-danger {
         font-size: 1.2rem;
         font-weight: bold;
         color: #81C408 !important;
         /* Màu đỏ nhã nhặn */

     }

     .price-container .text-muted {
         font-size: 1rem;
         color: #6c757d;
         /* Màu xám trung tính */
         text-decoration: line-through;
         /* Gạch ngang giá cũ */
     }


     .carousel-item img {
         width: 100%;
         height: 400px;
         /* Đặt chiều cao cố định cho ảnh */
         object-fit: cover;
         /* Đảm bảo ảnh lấp đầy vùng chứa mà không bị biến dạng */
     }

     #description {
         position: relative;
         max-width: 100%;
         padding-bottom: 60px;
         /* Tạo khoảng trống cho nút */
     }

     #description-content {
         max-height: 500px;
         overflow: hidden;
         position: relative;
         transition: max-height 0.5s ease;
     }

     #description.collapsed #description-content {
         max-height: none;
     }

     #description-overlay {
         position: absolute;
         bottom: 60px;
         /* Điều chỉnh để không che nút */
         left: 0;
         width: 100%;
         height: 50px;
         background: linear-gradient(transparent, #fff);
         display: block;
     }

     #description.collapsed #description-overlay {
         display: none;
     }

     #read-more {
         bottom: 10px;
         left: 50%;
         transform: translateX(-50%);
         z-index: 1;
     }
 </style>
