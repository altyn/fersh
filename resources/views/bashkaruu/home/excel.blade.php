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
                                <th>Зарегистрировано</th>
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

    <script src="//cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Russian.json'
                },
                ajax: "/bashkaruu/home/exceljs",
                columns: [
                    { 	"data": "id" },
					{ 	"data": "login"},
					{ 	"data": "email"},
                    {
						"data": null,
						"className": "dataTables_actions",
						"render": function ( data, type, row ) {

                            if(data.created_at == null){
                                return "-"
                            }else{
                                return data.created_at['date'].substring(0,16);

                            }                       
						}
					},
                ],
                dom: 'Bfrtip',
				buttons: [
					'excel'
				]

            });
        });
    </script>
@endsection