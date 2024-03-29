@extends ('layouts.guest')

@section('title', 'Войти')

@section('styles')
    @vite(['resources/css/signin.css'])
@endsection


@section('content')
    <div class="container">
        <div class="form-wrap d-flex align-items-center justify-content-center">
            <form method="POST" action="{{ route('login') }}" class="form p-5 shadow-lg rounded">
                @csrf

                <a class="text-decoration-none fs-4 d-block text-center mb-3 text-dark" href="{{ route('login') }}">НА
                    ГЛАВНУЮ</a>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" value="{{ old('email') ?? null }}" required>
                    <div class="text-danger mt-2">

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" reaquired>
                </div>

                <button class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
@endsection
