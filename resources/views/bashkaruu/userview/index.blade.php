@extends('bashkaruu.layouts.default')

@section('title', 'Все просмотры' )

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.0.4/css/rowGroup.dataTables.min.css">
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">Все просмотры</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table id="datatables" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <th>Пользователь</th>
                                <th>Кто посмотрел</th>
                                <th>Страница(+Email/Phone)</th>
                                <th>IP Address</th>
                                <th>Дата</th>
                            </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script>
        $(document).ready(function () {
            var collapsedGroups = {};
            var table = $('#datatables').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 25,
                "responsive": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Russian.json'
                },
                "ajax":{
                        "url": "/bashkaruu/userviewsjs",
                        "dataType": "json",
                        "type": "POST",
                        "data":{ _token: "{{csrf_token()}}"}
                    },
                "aoColumns": [
                    { "mData": "user_name" },
                    { "mData": "who_is" },
                    { "mData": "page" },
                    { "mData": "ip" },
                    { "mData": "date" }
                ],
                "rowGroup": {
                    // Group by office
                    "dataSrc": 'user_name',
                    startRender: function (rows, group) {
                        var collapsed = !!collapsedGroups[group];

                        rows.nodes().each(function (r) {
                            r.style.display = collapsed ? 'none' : '';
                        });    

                        // Add category name to the <tr>. NOTE: Hardcoded colspan
                        return $('<tr/>')
                            .append('<td colspan="8">' + group + ' (' + rows.count() + ')</td>')
                            .attr('data-name', group)
                            .toggleClass('collapsed', collapsed);
                    }
                }
            });

            table.on('click', 'tr.group-start', function () {
                var name = $(this).data('name');
                collapsedGroups[name] = !collapsedGroups[name];
                table.draw();
            });
        });
    </script>
@endsection