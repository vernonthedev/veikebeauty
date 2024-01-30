<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


@include('shop.head')

<body
    class="home page theme-mallon woocommerce-no-js home-style2 elementor-default elementor-kit-6 elementor-page elementor-page-6706">


    @include('home.header')


    {{-- display the cart items here --}}
    <div class="mallon_breadcrumbs">
        <div class="container">

            <div class="listing-title">
                <h1><span></span></h1>
            </div>
            <div class="breadcrumbs theme-clearfix">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home')}}">Home</a><span class="go-page"></span></li>
                    <li class="active"><span>Cart</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="post-9 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="entry-summary">
                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <p class="cart-empty woocommerce-info">Your cart is currently empty.</p>

                                <table>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>

                                    {{-- get the total price and total number of items in the cart--}}
                                    <?php $totalprice = 0;?>
                                    <?php $total_items = 0;?>
                                    @foreach ($carts as $cart)
                                        
                                   
                                    <tr>
                                        <td>{{$cart->product_title}}</td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>UGX {{$cart->price}}</td>
                                        <td><img src="product/{{$cart->image}}" alt="{{$cart->product_title}}" width="100px" ></td>
                                        <td><a class="button wc-backward" href="{{ route('remove-cart',$cart->id)}}" onclick="return confirm('Are Your Sure You want to remove this product?')">
                                            Remove </a></td>
                                    </tr>
                                    <?php $totalprice = $totalprice + $cart->price?>
                                    <?php $total_items = $total_items + $cart->quantity?>
                                    @endforeach
                                    
                                </table>
                                <p style="color: black; font-weight:bold 500; font-size: 20px;">Total Price: UGX {{$totalprice}}</p>
                                <p style="color: black; font-weight:bold 500; font-size: 20px;">Total No. items: {{$total_items}}</p>
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="{{route('shop')}}">
                                        Return to shop </a>
                                </p>
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="{{route('shop')}}">
                                        Checkout </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    @include('home.footer')


    @include('shop.scripts')
</body>

</html>
