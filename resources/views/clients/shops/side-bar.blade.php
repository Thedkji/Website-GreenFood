<h1 class="mb-4">Fresh fruits shop</h1>
<div class="row g-4">
    <div class="col-lg-12">
        <div class="row g-4">
            <div class="col-xl-3">
                <div class="input-group w-100 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="Tìm kiếm" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
            <div class="col-6"></div>
            <div class="col-xl-3">
                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                    <label for="fruits">Default Sorting:</label>
                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                        form="fruitform">
                        <option value="volvo">Nothing</option>
                        <option value="saab">Popularity</option>
                        <option value="opel">Organic</option>
                        <option value="audi">Fantastic</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4>Danh mục</h4>
                            <ul class="list-unstyled fruite-categorie">
                                @foreach ($categories as $category)
                                    <li>
                                        <!-- Hiển thị danh mục cha với icon quả táo -->
                                        <div class="d-flex justify-content-between align-items-center fruite-name">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-apple-alt me-2 text-primary"></i> <!-- Icon quả táo -->
                                                <a href="">{{ $category->name }}</a>
                                            </div>
                                            <span>(3)</span>
                                        </div>

                                        <!-- Danh mục con hiển thị ngay mà không cần thu gọn -->
                                        @if ($category->children->isNotEmpty())
                                            <ul class="list-unstyled fruite-sub-categorie">
                                                @foreach ($category->children as $child)
                                                    <li class="ms-5">
                                                        <a href="">{{ $child->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>





                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4 class="mb-2">Giá</h4>
                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                            <output id="amount" name="amount" min-velue="0" max-value="500"
                                for="rangeInput">0</output>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4>Lọc</h4>
                            <div class="mb-2">
                                <input type="radio" class="me-2" id="Categories-1" name="Categories-1"
                                    value="Beverages">
                                <label for="Categories-1"> Organic</label>
                            </div>
                            <div class="mb-2">
                                <input type="radio" class="me-2" id="Categories-2" name="Categories-1"
                                    value="Beverages">
                                <label for="Categories-2"> Fresh</label>
                            </div>
                            <div class="mb-2">
                                <input type="radio" class="me-2" id="Categories-3" name="Categories-1"
                                    value="Beverages">
                                <label for="Categories-3"> Sales</label>
                            </div>
                            <div class="mb-2">
                                <input type="radio" class="me-2" id="Categories-4" name="Categories-1"
                                    value="Beverages">
                                <label for="Categories-4"> Discount</label>
                            </div>
                            <div class="mb-2">
                                <input type="radio" class="me-2" id="Categories-5" name="Categories-1"
                                    value="Beverages">
                                <label for="Categories-5"> Expired</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="mb-3">Sản phẩm nổi bật</h4>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/featur-1.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/featur-2.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/featur-3.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#"
                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
