@extends('bashkaruu.layouts.default')

@section('title', 'Все пользователи' )

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">Все фрилансеры</h6>
                <div class="element-box">
                    <div class="element-box-content clearfix">
                        <div class="float-left">
                            <a class="mr-2 mb-2 btn btn-success" href="{{ route('freelancers.create') }}">
                                <i class="fa fa-plus"></i> Новый фрилансер</a>
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
                                <th>Активация</th>
                                <th>Ссылки</th>
                                <th>Опции</th>
                            </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
    $(document).ready(function () {
        $('#datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "responsive": true,
            "order": [[ 0, "desc" ]],
            "language": {
		        url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Russian.json'
		    },
            "ajax":{
                     "url": "/bashkaruu/usersjs",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "login" },
                { "data": "email" },
                { 
                    "className": "dataTables_actions text-center",
                    "data": "activated" 
                },
                { "data": "links" },
                { 
                    "className": "dataTables_actions",
                  "data": "options" 
                },
            ]	 

        });
    });
    </script>
@endsection