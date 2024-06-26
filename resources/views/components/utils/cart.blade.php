<!-- Start Cart Dropdown -->
<div class="rbt-cart-side-menu">
    <div class="inner-wrapper">
        @if(isset(auth()->user()->cart))
            <div class="inner-top">
                <div class="content">
                    <div class="title">
                        <h4 class="title mb--0">Your shopping cart</h4>
                    </div>
                    <div class="rbt-btn-close" id="btn_sideNavClose">
                        <button class="minicart-close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-minicart-wrapper">

                    {{-- Cart Items iterating --}}
                    @foreach(auth()->user()->cart->items as $item )
                        <li class="minicart-item">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="{{ asset($item->product->media[0]->image) }}" alt="Product Images">
                                </a>
                            </div>

                            <div class="product-content">
                                <h6 class="title"><a
                                        href="{{ route("product.detail",$item->product->slug) }}">{{ $item->product->title }}</a>
                                </h6>

                                <span class="quantity">{{$item->quantity}} * <span
                                        class="price">${{$item->product->discount_price}}</span></span>
                            </div>
                            <div class="close-btn">
                                <button class="rbt-round-btn"><i class="feather-x"></i></button>
                            </div>

                        </li>
                    @endforeach


                </ul>
            </nav>

            <div class="rbt-minicart-footer">
                <hr class="mb--0">
                <div class="rbt-cart-subttotal">
                    <p class="subtotal"><strong>Subtotal:</strong></p>
                    @php
                        $totalItems = auth()->user()->cart->items;
                        $totalprice = 0;
                        foreach ($totalItems as $item){
                            $totalprice += $item->product->discount_price * $item->quantity  ;
                        }

                        echo '<p class="price">'.$totalprice .'</p>';

                    @endphp
                </div>
                <hr class="mb--0">
                <div class="rbt-minicart-bottom mt--20">
                    <div class="view-cart-btn">
                        <a class="rbt-btn btn-border icon-hover w-100 text-center" href="#">
                            <span class="btn-text">View Cart</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="checkout-btn mt--20">
                        <a class="rbt-btn btn-gradient icon-hover w-100 text-center" href="#">
                            <span class="btn-text">Checkout</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div>Nothing Found</div>
        @endif
    </div>
</div>
<!-- End Cart Dropdown -->
<a class="close_side_menu" href="javascript:void(0);"></a>
