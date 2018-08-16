@extends('bashkaruu.layouts.default')

@section('title', 'Заявки' )

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">Заявки</h6>

        <div class="element-box">

            @if ($message = Session::get('success'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table id="datatables" class="dataTables_wrapper table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Спец.</th>
                        <th>Дата</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->email}}</td>
                            <td>{{ $row->phone}}</td>
                            <td>{{ $row->specialization->title['ru']}}</td>
                            <td>{{ $row->created_at}}</td>
                            <td class="dataTables_actions">
                                <a class="item_edit" href="{{ route('bids.show',$row->id) }}">
                                    <i class="os-icon os-icon-mail-18"></i>
                                </a>
                                <a class="item_edit" href="{{ route('bids.destroy', $row->id) }}">
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

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>
@endsection