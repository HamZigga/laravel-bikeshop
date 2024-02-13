<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    <!-- TODO: добавлять синюю рамку карточке товара (класс border-primary), если на товар можно потратить баллы -->
    <article class="card mt-5 overflow-hidden @if ($product->discount) border-primary @endif">
        <div class="img-wrap">
            <img class="w-100" src="{{ asset($product->image) }}" alt="Изображение товара">
        </div>
        <div class="p-3">
            <h3 class="fs-6 mb-3">
                {{ $product->title }}
            </h3>
            <div class="d-flex align-items-center justify-content-between">
                <p class="fw-bold fs-5 m-0">
                    {{ number_format($product->price, 0, '', ' ') }} ₽
                </p>

                @if (isset($cart_products) && $cart_products->contains('product_id', $product->id))
                    <!-- TODO: этот блок появлется после нажатия кнопки "В корзину" -->
                    <div class="d-flex align-items-center gap-3">
                        <form method="POST" class="once"
                            action="{{ route('cart.update.minus', $cart_products->where('product_id', $product->id)->first()->id) }}">
                            @csrf
                            <button class="btn btn-outline-primary">-</button>
                        </form>
                        <span>{{ $cart_products->where('product_id', $product->id)->first()->quantity }}</span>
                        <form method="POST" class="once"
                            action="{{ route('cart.update.plus', $cart_products->where('product_id', $product->id)->first()->id) }}">
                            @csrf
                            <button class="btn btn-outline-primary">+</button>
                        </form>
                    </div>
                @else
                    <form method="POST" class="once" action="{{ route('cart.addToCart') }}">
                        @csrf
                        <input type="text" hidden name="product_id" id="product_id" value="{{ $product->id }}">
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                    </form>
                @endif

            </div>
        </div>
    </article>
</div>
