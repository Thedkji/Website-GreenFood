   <style>
       .rating-container {
           display: flex;
           justify-content: center;
           align-items: center;
           gap: 5px;
           font-size: 2rem;
           cursor: pointer;
       }

       .star {
           color: gray;
           transition: color 0.2s;
       }

       .star.hovered,
       .star.selected {
           color: gold;
       }
   </style>

   <h4 class="mb-5">Lịch sử đơn hàng</h4>

   <div class="myaccount-table table-responsive text-center">
       <table class="table table-bordered">
           <thead class="thead-light">
               <tr>
                   <th>Tên</th>
                   <th>Địa chỉ</th>
                   <th>Số điện thoại</th>
                   <th>Tổng tiền</th>
                   <th>Chi tiết</th>
                   <th>Trạng thái</th>
               </tr>
           </thead>

           <tbody>
               @foreach ($oders as $order)
                   <tr>
                       <td>{{ $order->user->name }}</td>
                       <td>{{ $order->address }}</td>
                       <td>{{ $order->phone }}</td>
                       <td style="color: #81C408; font-weight:bold;">{{ number_format($order->total, 0, ',', '.') }} VND
                       </td>
                       <td><a href="{{ route('client.orders.details', ['id' => $order->id]) }}">Xem</a></td>
                       <td>
                           @switch($order->status)
                               @case(3)
                                   <span class="badge bg-success" style="padding: 10px;">Giao hàng thành công</span>
                               @break

                               @case(4)
                                   <span class="badge bg-info" style="padding: 10px;">Giao hàng không thành công</span>
                               @break

                               @case(5)
                                   <span class="badge bg-danger" style="padding: 10px;">Hủy đơn</span>
                               @break

                               @case(6)
                                   <!-- Nút mở modal -->
                                   <button class="btn btn-primary btn-sm p-2" data-bs-toggle="modal"
                                       data-bs-target="#rateModal-{{ $order->id }}" style="font-size: 12px;">
                                       Đánh giá
                                   </button>

                                   <!-- Modal -->
                                   <div class="modal fade" id="rateModal-{{ $order->id }}" tabindex="-1"
                                       aria-labelledby="rateModalLabel-{{ $order->id }}" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="rateModalLabel-{{ $order->id }}">Đánh giá đơn
                                                       hàng</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   <!-- Form đánh giá -->
                                                   <form action="{{ route('client.rate.order') }}" method="POST"
                                                       enctype="multipart/form-data">
                                                       @csrf
                                                       <div class="form-group">
                                                           <label for="rating-stars-{{ $order->id }}">Đánh giá:</label>
                                                           <div class="rating-container" id="rating-stars-{{ $order->id }}">
                                                               <span data-value="1" class="star">&#9733;</span>
                                                               <span data-value="2" class="star">&#9733;</span>
                                                               <span data-value="3" class="star">&#9733;</span>
                                                               <span data-value="4" class="star">&#9733;</span>
                                                               <span data-value="5" class="star">&#9733;</span>
                                                           </div>
                                                           <input type="hidden" name="star"
                                                               id="star-value-{{ $order->id }}" required>
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="comment">Bình luận:</label>
                                                           <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="image">Hình ảnh (tuỳ chọn):</label>
                                                           <input type="file" name="image" id="image"
                                                               class="form-control">
                                                       </div>
                                                       
                                                       <input type="hidden" name="order_id"
                                                           value="{{ $order->id }}">

                                                       <div class="modal-footer mt-3">
                                                           <button type="button" class="btn btn-secondary"
                                                               data-bs-dismiss="modal">Hủy</button>
                                                           <button type="submit" class="btn btn-success">Gửi đánh giá</button>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               @break
                           @endswitch
                       </td>

                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
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
   </script>
