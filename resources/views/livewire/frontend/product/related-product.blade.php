<div>
    <div class="row mt-60">
        <div class="col-12">
            <h3 class="section-title style-1 mb-30">Related products</h3>
        </div>
        <div class="col-12">
            <div class="row related-products wow fadeIn animated">
                <div class="carausel-4-columns-cover position-relative" wire:ignore>
                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                        @foreach(optional($product->category)->products as $item)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('frontend.product.detail', \Str::slug($item->name)) }}">
                                        <img class="default-img" src="{{ $item->getImage() }}" alt="">
                                        <img class="hover-img" src="{{ $item->getImage(1) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    <a wire:loading.remove wire:target="addToWishList({{ $item->id }})" wire:click="addToWishList({{ $item->id }})" aria-label="Add To Wishlist" class="action-btn small hover-up" tabindex="0">
                                        <i class="fi-rs-heart"></i>
                                    </a>
                                    <div wire:loading wire:target="addToWishList({{ $item->id }})" class="spinner-grow text-warning" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ route('frontend.product.detail', $item->slug) }}">{{ $item->name }}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>{{ money($item->selling_price) }}</span>
                                    <span class="old-price">{{ money($item->original_price) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--End product-cart-wrap-2-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
