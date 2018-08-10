@extends('bashkaruu.layouts.default')

@section('title', 'Публикации' )

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">Публикации</h6>

	<div class="element-box">

		<div class="element-box-content clearfix">
			<div class="float-left">
	          <a class="mr-2 mb-2 btn btn-success" href="blog/create">
	            <i class="fa fa-plus"></i> Добавить публикацию</a>
	        </div>
        </div>
        
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
						<th>Опции</th>
					</tr>
				</thead>
                <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>
                            @if(isset($row->title['ru']))
                                {{ $row->title['ru']}}
                            @endif
                        </td>
                        <td class="dataTables_actions">
                            <a class="item_edit" href="{{ route('blog.show',$row->id) }}">
                                <i class="os-icon os-icon-mail-18"></i>
                            </a>
                            <a class="item_edit" href="{{ route('blog.edit',$row->id) }}">
                                <i class="os-icon os-icon-ui-49"></i>
                            </a>
                            <a class="item_edit" href="{{ route('blog.destroy', $row->id) }}">
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