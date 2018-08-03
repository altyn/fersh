@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="sign-success">
                <h3>Подтвердите регистрацию</h3>
                <form method="post" action="/resend/activation">
                    @csrf
                    @if(isset($to_email))
                        <input type="hidden" name="email" value="{{ $to_email }}">
                    @endif
                    <h5>По адресу @if($to_email)<span>{{ $to_email }}</span>@endif вам выслано письмо со ссылкой: перейдите по ней, чтобы подтвердить свою почту и завершить регистрацию.</h5>
                    <h5>Если вы не видите письма по входящих, проверьте папку со спамом, а также другие папки, в которые письмо может попасть. Или <button type="submit">отправьте письмо повторно</button>.</h5>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection