@extends ('layouts.app')

@section('title', 'Корзина')

@section('styles')
    @vite(['resources/css/cart.css'])
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Корзина</h1>
        <div class="row mb-4">
            <div class="col-12 col-lg-8">
                @foreach ($cart_products as $cart_product)
                    <article class="card mt-4 overflow-hidden">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="img-wrap">
                                    <img class="w-100" src="{{ $cart_product->product->image ?? null }}"
                                        alt="Изображение товара">
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 d-flex align-items-center">
                                <div class="p-3">
                                    <h3 class="fs-6 mb-2">
                                        {{ $cart_product->product->title }}
                                    </h3>
                                    <p>Кол-во - {{ $cart_product->quantity }} шт.
                                    </p>
                                    <p class="fw-bold fs-6 m-0">
                                        цена без скидки - {{ number_format($cart_product->product->price, 0, '', ' ') }} ₽ / шт.
                                    </p>
                                    @if ($cart_product->product->discount)
                                        <p class="fw-bold fs-6 m-0">
                                            с учётом скидки <span>{{ round($cart_discountPercent, 2) * 100 }} %</span> -
                                            {{ number_format(round($cart_product->product->price * (1 - $cart_discountPercent), 2), 0, '', ' ') }} ₽ /
                                            шт.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="col-12 col-lg-4">
                <div class="card p-3 mt-4">
                    <p class="fs-4">Общая сумма заказа:</p>
                    <p class="fw-bold"> {{ number_format($cart_total, 0, '', ' ') }} ₽</p>

                    @if (isset($cart_discountTotal))
                        <p class="fs-4">Общая сумма заказа c учётом скидки <span>{{ round(1 - $cart_discountTotal / $cart_total, 2)*100 }}
                                %</span>:</p>
                        <p class="fw-bold">{{ number_format($cart_discountTotal, 0, '', ' ') }} ₽</p>
                    @endif

                    <button class="btn btn-primary">Заказать</button>
                </div>
            </div>
        </div>
    </div>
@endsection
