@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="sign">
            <div class="row">
                <div class="col-md-4">
                    <div class="sign-right">
                        <div class="sign-right-top">
                            <h3>Восстановление пароля</h3>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                        <form class="needs-validation" action="/password/email" method="post" novalidate>
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2 mb-2" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Почта" required>
                                <div class="invalid-feedback">
                                    Введите почту
                                </div>
                            </div>
                            <button class="btn btn-sign" type="submit">Запросить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection