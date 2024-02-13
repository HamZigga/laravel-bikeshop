@extends ('layouts.app')

@section('title', 'Главная страница')

@section('styles')
    @vite(['resources/css/index.css'])
@endsection

@section('content')
    <div class="container">

        <div class="row">
            @foreach ($products as $product)
                @include('components.product-card')
            @endforeach
            
        {{ $products->links('components.paginator') }}
    </div>
@endsection
