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

                        <table id="datatables" class="dataTables_wrapper table-sm" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Birthday</th>
                                <th width="180px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($freelancers as $freelancer)
                                <tr>
                                    <td>{{ $freelancer->id }}</td>
                                    <td>{{ $freelancer->first_name }}</td>
                                    <td>{{ $freelancer->last_name }}</td>
                                    <td>{{ $freelancer->birthday }}</td>
                                    <td class="dataTables_actions">
                                        <a class="item_edit" href="{{ route('freelancers.show',$freelancer->id) }}">
                                            <i class="os-icon os-icon-mail-18"></i>
                                        </a>
                                        <a class="item_edit" href="{{ route('freelancers.edit',$freelancer->id) }}">
                                            <i class="os-icon os-icon-ui-49"></i>
                                        </a>
                                        <a class="item_edit" href="{{ route('freelancers.delete', $freelancer->id) }}">
                                            <i class="os-icon os-icon-cancel-circle item_remove_icon"></i>
                                        </a>
                                    </td>
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
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>
@endsection