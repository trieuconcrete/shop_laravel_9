<div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($carts)
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($carts as $key => $item)
                                    @php
                                        $total += $item['sub_total'];
                                    @endphp
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ $item['image'] }}" alt="#">
                                        </td>
                                        <td class="product-name">
                                            <h5 class="product-name"><a href="{{ route('frontend.product.detail', $item['slug']) }}">{{ $item['name'] }}</a></h5>
                                        </td>
                                        <td class="price" data-title="Price"><span>{{ money($item['price']) }}</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a wire:click="decrementQuantity({{ $key }})" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{ $item['quantity'] }}</span>
                                                <a wire:click="incrementQuantity({{ $key }})" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>{{ money($item['sub_total']) }}</span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a wire:click="removeCartItem({{ $key }})" class="text-muted">
                                                <span wire:loading.remove wire:target="removeCartItem({{ $key }})">
                                                    <i class="fi-rs-trash"></i></a>
                                                </span>
                                                <span wire:loading wire:target="removeCartItem({{ $key }})">
                                                    Removing...
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                        <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading_s1 mb-3">
                                <h4>Calculate Shipping</h4>
                            </div>
                            <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900">5%</span></p>
                            <form class="field_form shipping_calculator">
                                <div class="form-row row">
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="State / Country" name="name" type="text">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="PostCode / ZIP" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn  btn-sm"><i class="fi-rs-shuffle mr-10"></i>Update</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>Apply Coupon</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="Coupon" placeholder="Enter Your Coupon">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{ $carts ? money($total) : null }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">{{ $carts ? money($total) : null }}</span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('frontend.mypage.checkout') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
