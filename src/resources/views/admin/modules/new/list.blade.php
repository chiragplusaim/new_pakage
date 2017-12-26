@extends('admin.layout.master')
@section('content')
<div class="row-fluid">
	<div class="span12">
		<div class="btn-group"> 
				<div  class="pull-right">
					<a class="btn btn-primary ttip_b" href="{{ADMIN_URL().ADMIN_BANNER_KEYWORD().'/add'}}" title="{{ trans('lang_data.add_keyword') }} {{ trans('lang_data.banner') }}">{{ trans('lang_data.add_keyword') }} </a>
				</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<h3 class="heading">{{ trans('lang_data.banners') }} {{ trans('lang_data.management_keyword') }}</h3>
	<form name="table_form" id="table_form" method="POST">
		{!! GENERATE_CSRF_TOKEN()!!}
		<table class="table table-bordered table-striped table_vam data_table">
			<thead>
				<tr>
					<th><input type="checkbox" id="select_all" name="select_all" value="1"/></th>
					<th>{{ trans('lang_data.form_title') }}</th>
					<th>{{ trans('lang_data.form_image') }}</th>
					<th>{{ trans('lang_data.form_display_order') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list_data as $ld)
					<tr>
						<td><input type="checkbox" name="checkbox[]" value="{{ Crypt::encrypt($ld->test_module_id) }}" class="select_all_data" /></td>
						<td>{{ $ld->title }}</td>
						<td>{{ $ld->name}}</td>
						<td>{{ $ld->email}}</td>
						<td>
						<a href="{{ADMIN_URL().ADMIN_BANNER_KEYWORD().'/edit/'.Crypt::encrypt($ld->test_module_id)}}"><i class="splashy-folder_modernist_edit ttip_b" title="{{ trans('lang_data.edit_keyword') }} {{ trans('lang_data.banner') }}"></i></a>
						<a href="javascript:void(0)" onclick="return delete_single('{{ADMIN_URL()}}{{ADMIN_BANNER_KEYWORD()}}/delete_single/{{ Crypt::encrypt($ld->test_module_id) }}')"><i class="splashy-folder_modernist_remove ttip_b" title="{{ trans('lang_data.delete_keyword') }} {{ trans('lang_data.banner') }}"></i></a>
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
