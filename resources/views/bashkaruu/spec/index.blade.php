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
						<th>Пользователей</th>
						<th>Башкаруу</th>
					</tr>
				</thead>
                <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>
                            @if(isset($row->title['ky']))
                                {{ $row->title['ky']}}
                            @endif
                        </td>
                        <td>
                            @if(isset($row->title['ru']))
                                {{ $row->title['ru']}}
                            @endif
                        </td>
                        <td class="dataTables_actions">
                            @if(isset($row->title['en']))
                                {{ $row->title['en']}}
                            @endif
                        </td>
                        <td>
                            @if(isset($specs[$row->id]))
                                <a href='{{ route('spec.show',$row->id) }}' class=' btn btn-outline-primary btn-sm'>Список
                                    <strong>{{ $specs[$row->id] }}</strong>
                                </a>
                            @else
                                Неизвестно
                            @endif
                        </td>
                        <td class="dataTables_actions">
                            <a class="item_edit" href="{{ route('spec.show',$row->id) }}">
                                <i class="os-icon os-icon-mail-18"></i>
                            </a>
                            <a class="item_edit" href="{{ route('spec.edit',$row->id) }}">
                                <i class="os-icon os-icon-ui-49"></i>
                            </a>
                            <a class="item_edit" href="{{ route('spec.delete', $row->id) }}">
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