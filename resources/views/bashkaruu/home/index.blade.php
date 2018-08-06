@extends('bashkaruu.layouts.default')

@section('title', 'Главная страница' )

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">Главная страница</h6>
                <div class="element-box">
                    <div class="element-box-content clearfix">
                        <div class="float-left">
                            <a class="mr-2 mb-2 btn btn-success" href="{{ route('home.edit') }}">
                                <i class="fa fa-plus"></i>Редактировать</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table id="datatables" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <th>Id</th>
                                <th>Логин</th>
                                <th>Email</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id}}</th>
                                    <th>{{ $user->login}}</th>
                                    <th>{{ $user->email}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection