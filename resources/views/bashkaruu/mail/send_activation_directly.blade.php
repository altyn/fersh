@extends('bashkaruu.layouts.default')

@section('title', "Не активированные пользователи" )

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="element-wrapper">
            <h6 class="element-header">
                Email рассылка
            </h6>
            <form action="{{ route('act_direct') }}" method="post">

                @csrf
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Выбрать варианты отправки
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <button type="submit" class="btn btn-light">Отправить код активации</button>
                            <button type="submit" class="btn btn-light">Отправить письмо</button>
                        </div>
                    </div>
                </div>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($users))
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="checkbox checkbox-success">
                                        <input type="checkbox" id="userId" name="userId[{{$user->id}}]" class="styled" value="{{ $user->id }}">
                                    </div>
                                </td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->login }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </form>
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#loader').hide();

    $("#sendmails").on("submit", function(){
        $('#loader').show();
    })	
</script>
@endsection

