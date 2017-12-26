@extends('crud::layout.master')
@section('content')
<div class="row-fluid">
	<div class="span12">
		<div class="btn-group"> 
			<button onclick="delete_all('table_form','{{url('/delete_all')}}');" class="btn ttip_b" title="{{ trans('lang_data.delete_all_button') }}">Delete All</button>
				<button onclick="active_all('table_form','{{url('/active_all')}}');" class="btn ttip_b" title="{{ trans('lang_data.active_all_button') }}">Active All</button>
				<button onclick="inactive_all('table_form','{{url('/inactive_all')}}');" class="btn ttip_b" title="{{ trans('lang_data.inactive_all_button') }}">Inactive All</button>
			<div  class="pull-right">
					<a class="btn btn-primary ttip_b" href="{{url('/add')}}" title="{{ trans('lang_data.add_keyword') }} {{ trans('lang_data.banner') }}">Add</a>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<h3 class="heading">Test Managment</h3>
	<form name="table_form" id="table_form" method="POST">
		{!! GENERATE_CSRF_TOKEN()!!}
		<table class="table table-bordered table-striped table_vam data_table">
			<thead>
				<tr>
					<th><input type="checkbox" id="select_all" name="select_all" value="1"/></th>
					<th>Name</th>
					<th>Title</th>
					<th>Email</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
						@foreach($list_data as $ld)
					<tr>
						<td><input type="checkbox" name="checkbox[]" value="{{ Crypt::encrypt($ld->test_module_id) }}" class="select_all_data" /></td>
						<td>{{ $ld->name }}</td>
						<td>{{ $ld->title }}</td>
						<td>{{ $ld->email }}</td>
						<td><a href="javascript:void(0);" onclick="return status_change('{{url('/status_change'.'/'.Crypt::encrypt($ld->test_module_id))}}')" class="ext_disabled">{{ GET_STATUS_ICON($ld->status) }}</a>
						</td>
					
						<td>
						<a href="{{url('edit/'.Crypt::encrypt($ld->test_module_id))}}"><i class="splashy-folder_modernist_edit ttip_b" title="{{ trans('lang_data.edit_keyword') }} {{ trans('lang_data.banner') }}"></i>Edit</a>
						<a href="javascript:void(0);" onclick="return delete_single('{{url('/delete_single'.'/'.Crypt::encrypt($ld->test_module_id))}}')"><i class="splashy-folder_modernist_remove ttip_b" title="{{ trans('lang_data.delete_keyword') }} {{ trans('lang_data.banner') }}"></i>Delete</a>
						</td>
					
					</tr>
				@endforeach
			</tbody>
		</table>
	</form>	
</div>
@endsection
@section("main_css")
	@parent
	{!! Html::style(ADMIN_LIB_URL().'colorbox/colorbox.css')!!}
@endsection	
@section("main_js")
	@parent
	{!! Html::script(ADMIN_LIB_URL().'colorbox/jquery.colorbox.min.js')!!}

@endsection	
