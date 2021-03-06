@extends('Front.master')
@section('title')
    Product | Product Details
@endsection
@section('body')
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2 data-aos="fade-up" data-aos-delay="200">Product Details</h2>
                <ul data-aos="fade-up" data-aos-delay="400">
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
            <img src="{{ asset('/') }}assets/images/banner/breadcrumb-1.png" alt="">
        </div>
        <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('/') }}assets/images/banner/breadcrumb-2.png" alt="">
        </div>
    </div>
    <div class="product-details-area pb-100 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                        <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="easyzoom-style">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{ asset($product->image) }}">
                                                <img src="{{ asset($product->image) }}" alt="">
                                            </a>
                                        </div>
                                        <a class="easyzoom-pop-up img-popup" href="{{ asset($product->image) }}">
                                            <i class="pe-7s-search"></i>
                                        </a>
                                    </div>
                                </div>
                                @foreach($subimages as $subimage )
                                <div class="swiper-slide">
                                    <div class="easyzoom-style">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{ asset($subimage->image) }}">
                                                <img src="{{ asset($subimage->image) }}" alt="">
                                            </a>
                                        </div>
                                        <a class="easyzoom-pop-up img-popup" href="{{ asset($subimage->image) }}">
                                            <i class="pe-7s-search"></i>
                                        </a>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="product-details-small-img-wrap">
                            <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-details-small-img">
                                            <img src="{{ asset($product->image) }}" alt="Product Thumnail">
                                        </div>
                                    </div>
                                    @foreach($subimages as $subimage )
                                    <div class="swiper-slide">
                                        <div class="product-details-small-img">
                                            <img src="{{ asset($subimage->image) }}" alt="Product Thumnail">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-prev-2 pd-nav-style-2"> <i class="ti-angle-left"></i></div>
                            <div class="pd-next-2 pd-nav-style-2"> <i class="ti-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                        <h2>{{ $product->name }}</h2>
                        <div class="product-details-price">
                            <span class="old-price">{{ $product->regular_price }}</span>
                            <span class="new-price">{{ $product->selling_price }}</span>
                        </div>
                        <div class="product-details-review">
                            <div class="product-rating">
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                            </div>
                            <span>( 1 Customer Review )</span>
                        </div>
                        <div class="product-details-action-wrap">
                            <div class="product-quality">
                                <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                            </div>
                            <div class="single-product-cart btn-hover">
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="single-product-wishlist">
                                <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="single-product-compare">
                                <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                            </div>
                        </div>
                        <div class="product-details-meta">
                            <ul>
                                <li><span class="title">SKU:</span> Ch-256xl</li>
                                <li><span class="title">Category:</span>
                                    <ul>
                                        <li><a href="#">{{ $product->category->name }}</a>,</li>
                                        <li><a href="#">Home</a></li>
                                    </ul>
                                </li>
                                <li><span class="title">Tags:</span>
                                    <ul class="tag">
                                        <li><a href="#">Furniture</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="social-icon-style-4">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description-review-area pb-85">
        <div class="container">
            <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                <a class="active" data-bs-toggle="tab" href="#des-details1"> Description </a>
                <a data-bs-toggle="tab" href="#des-details2" class=""> Information </a>
                <a data-bs-toggle="tab" href="#des-details3" class=""> Reviews </a>
            </div>
            <div class="tab-content">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-content text-center">
                        <p data-aos="fade-up" data-aos-delay="200"> {!! $product->long_description !!}</p>
                        <p data-aos="fade-up" data-aos-delay="200"> {!! $product->short_description !!}</p>
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="specification-wrap table-responsive">
                        <table>
                            <tbody>
                            <tr>
                                <td class="width1">Brands</td>
                                <td>Airi, Brand, Draven, Skudmart, Yena</td>
                            </tr>
                            <tr>
                                <td class="width1">Color</td>
                                <td>Blue, Gray, Pink</td>
                            </tr>
                            <tr>
                                <td class="width1">Size</td>
                                <td>L, M, S, XL, XXL</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="review-wrapper">
                        <h3>1 review for Sleeve Button Cowl Neck</h3>
                        <div class="single-review">
                            <div class="review-img">
                                <img src="{{ asset('/') }}assets/images/product-details/review-1.png" alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-rating">
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                    <a href="#"><i class="ti-star"></i></a>
                                </div>
                                <h5><span>HasTech</span> - April 29, 2020</h5>
                                <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>
                            </div>
                        </div>
                    </div>
                    <div class="ratting-form-wrapper">
                        <h3>Add a Review</h3>
                        <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                        <div class="your-rating-wrap">
                            <span>Your rating</span>
                            <div class="your-rating">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                        </div>
                        <div class="ratting-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="rating-form-style mb-15">
                                            <label>Name <span>*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="rating-form-style mb-15">
                                            <label>Email <span>*</span></label>
                                            <input type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rating-form-style mb-15">
                                            <label>Your review <span>*</span></label>
                                            <textarea name="Your Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="save-email-option">
                                            <p><input type="checkbox"> <label>Save my name, email, and website in this browser for the next time I comment.</label></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-submit">
                                            <input type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-product-area pb-95">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Related Products</h2>
            </div>
            <div class="related-product-active swiper-container">
                <div class="swiper-wrapper">
                    @foreach($relatedproducts as $relatedproduct)
                    <div class="swiper-slide">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a href="{{ route('product-details',['id'=>$relatedproduct->id]) }}">
                                    <img src="{{ asset($relatedproduct->image) }}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>-10%</span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1 showmodal" data-id="{{ $relatedproduct->id }}" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product-details',['id'=>$relatedproduct->id]) }}">{{ $relatedproduct->name }}</a></h3>
                                <div class="product-price">
                                    <span class="old-price">{{ $relatedproduct->regular_price }} </span>
                                    <span class="new-price">{{ $relatedproduct->selling_price }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('front-js')
    <script>
        $(document). on('click','.showmodal', function(){
            var productId = $(this).data('id');
            var baseUrl ={!! json_encode(url('/')) !!};
            $.ajax({
                url:"{{ url('/get-product-info-for-modal') }}",
                dataType:"JSON",
                method:"GET",
                data:{id:productId},
                success: function (data) {

                    $('#modalImage').attr('src',baseUrl+'/'+data.image);
                    $('#modalName').text(data.name);
                    $('#modalRegularPrice').html( 'BDT:'+data.regular_price);
                    $('#modalSealingPrice').text('BDT:'+data.selling_price);
                    $('#modalShortDescription').text(data.short_description);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        });
    </script>
@endsection
