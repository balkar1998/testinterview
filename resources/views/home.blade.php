@extends('layouts.app')

@section('content')
 <!-- Page Contain -->
 <div class="page-contain">

    <!-- Main content -->
    <div id="main-content" class="main-content">

        <!--Block 03: Product Tab-->
        <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
            <div class="container">
                <div class="biolife-title-box">
                    <span class="subtitle">All the best item for You</span>
                    <h3 class="main-title">Products</h3>
                </div>
                <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
                    <div class="tab-content">
                        <div id="tab01_1st" class="tab-contain active">
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                               @foreach ($data as $item)    
                               <li class="product-item">
                                   <div class="contain-product layout-default">
                                       <div class="product-thumb">
                                           <a href="#" class="link-to-product">
                                               <img src="{{ asset('images/'.$item->img) }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                           </a>
                                           <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                       </div>
                                       <div class="info">
                                           <h4 class="product-title"><a href="#" class="pr-name">
                                               {{ $item->name }}</a></h4>
                                           <div class="price ">
                                               <ins><span class="price-amount"><span class="currencySymbol">£</span>{{ $item->price }}</span></ins>
                                           </div>
                                           <div class="slide-down-box">
                                               <div class="buttons">
                                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <input type="hidden" value="{{ $item->name }}" name="name">
                                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                                    <input type="hidden" value="{{ $item->img }}"  name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="btn add-to-cart-btn">Add To Cart</button>
                                                </form>
                                                   {{-- <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a> --}}
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
