@extends('bashkaruu.layouts.default')

@section('title', 'Все пользователи' )

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection


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
                                <th>Логин</th>
                                <th>Id</th>
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
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                order: [[ 0, "desc" ]],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Russian.json'
                },
                ajax:{
                        "url": "/bashkaruu/freelancersjs",
                        "dataType": "json",
                        "type": "POST",
                        "data":{ _token: "{{csrf_token()}}"}
                    },
                aoColumns: [
                    { "mData": "login" },
                    { "mData": "id" },
                    { "data": "email" },
                    { 
                        "className": "dataTables_actions text-center",
                        "mData": "activated" 
                    },
                    { 
                        "mData": function (data, type, dataToSet) {
                            return data.profile + "" + data.portfolio;
                        }
                    },
                    { 
                        "className": "dataTables_actions",
                        "mData": "options" 
                    },
                ],
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 1 },
                ]

            });
        });
    </script>
@endsection