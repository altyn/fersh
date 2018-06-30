@extends('bashkaruu.layouts.default')

@section('title', 'Специализации' )

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">Специализации</h6>

	<div class="element-box">

		<div class="element-box-content clearfix">
			<div class="float-left">
	          <a class="mr-2 mb-2 btn btn-success" href="spec/create">
	            <i class="fa fa-plus"></i> Добавить cпециализаци</a>
	        </div>
		</div>

		<div class="table-responsive">
			<table id="datatables" class="dataTables_wrapper table-sm" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Кыргызча</th>
						<th>Русский</th>
						<th>English</th>
						<th>Башкаруу</th>
					</tr>
				</thead>
                <tbody>

                </tbody>
			</table>
		</div>
	</div>
</div>

@endsection

@section('scripts')
{{--<script>--}}
	{{--$(document).ready(function() {--}}
	    {{--var table = $('#datatables').DataTable( {--}}
	        {{--ajax: "{{ route('specsjs') }}",--}}
	        {{--columns: [--}}
	        	{{--{ 	"data": "id" },--}}
	            {{--{ 	"data": "title"},--}}
	            {{--{ 	"data": "title"},--}}
	            {{--{ 	"data": "title"},--}}
	            {{--{--}}
			      	{{--"data": null,--}}
			      	{{--"className": "dataTables_actions",--}}
			      	{{--"render": function ( data, type, row ) {--}}
			      		{{--return '<a href="{{Request::url()}}/'+data.id+'/edit" class="item_edit"><i class="os-icon os-icon-ui-49 item_edit_icon"></i></a>';--}}
				    {{--}--}}
			    {{--}--}}
	        {{--]--}}
	    {{--});--}}

	 	{{--$('#datatables tbody').on( 'click', 'tr', function () {--}}

			{{--if ( $(this).hasClass('selected') ) {--}}
	            {{--$(this).removeClass('selected');--}}
	        {{--}--}}
	        {{--else {--}}
	            {{--table.$('tr.selected').removeClass('selected');--}}
	            {{--$(this).addClass('selected');--}}
	        {{--}--}}
 			{{--var data = table.row('.selected').data();--}}
	        {{--window.location.href = "spec/"+ data.id;--}}
    	{{--});--}}
    {{--});--}}

{{--</script>--}}
@endsection