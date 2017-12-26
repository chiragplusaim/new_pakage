@extends('admin.layout.master')
@section('content')
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">{{ trans('lang_data.banner') }} {{($encrypted_id && $encrypted_id!="")? trans('lang_data.edit_keyword') : trans('lang_data.add_keyword') }}</h3>
		<div class="row-fluid">
			<div class="span8">
				<form class="form-horizontal" name="input_form" id="input_form" method="POST" action="{{ADMIN_URL().ADMIN_BANNER_KEYWORD().'/do_save'}}">
					<fieldset>
						{!! GENERATE_CSRF_TOKEN()!!}
						@if(isset($encrypted_id) && $encrypted_id!="")
							<input type="hidden" name="test_module_id" value="{{$encrypted_id}}" id="test_module_id">
						@endif
						<div class="control-group formSep {{$errors->has('title')?'f_error':''}}">
							<label class="control-label">{{ trans('lang_data.form_title') }}: <span class="f_req">*</span></label>
							<div class="controls">
								@if(Request::old('title') && Request::old('title')!="")
									<input type="text" id="title" name="title" class="input-xlarge" value="{{Request::old('title')}}" />
								@elseif(isset($edit_data->title) && $edit_data->title!="")
									<input type="text" id="title" name="title" class="input-xlarge" value="{{$edit_data->title}}" />
								@else
									<input type="text" id="title" name="title" class="input-xlarge" value="" />
								@endif
								@if($errors->has("title"))<label class="error">{{ $errors->first("title") }}</label>@endif
							</div>
						</div>
						<div class="control-group formSep {{$errors->has('name')?'f_error':''}}">
							<label class="control-label">{{ trans('lang_data.form_title') }}: <span class="f_req">*</span></label>
							<div class="controls">
								@if(Request::old('name') && Request::old('name')!="")
									<input type="text" id="name" name="name" class="input-xlarge" value="{{Request::old('name')}}" />
								@elseif(isset($edit_data->name) && $edit_data->name!="")
									<input type="text" id="name" name="name" class="input-xlarge" value="{{$edit_data->name}}" />
								@else
									<input type="text" id="name" name="name" class="input-xlarge" value="" />
								@endif
								@if($errors->has("name"))<label class="error">{{ $errors->first("name") }}</label>@endif
							</div>
						</div>	
						<div class="control-group formSep {{$errors->has('email')?'f_error':''}}">
							<label class="control-label">{{ trans('lang_data.form_title') }}: <span class="f_req">*</span></label>
							<div class="controls">
								@if(Request::old('email') && Request::old('email')!="")
									<input type="text" id="email" name="email" class="input-xlarge" value="{{Request::old('email')}}" />
								@elseif(isset($edit_data->email) && $edit_data->email!="")
									<input type="text" id="email" name="email" class="input-xlarge" value="{{$edit_data->email}}" />
								@else
									<input type="text" id="email" name="email" class="input-xlarge" value="" />
								@endif
								@if($errors->has("email"))<label class="error">{{ $errors->first("email") }}</label>@endif
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button class="btn btn-gebo" type="submit">{{ trans('lang_data.form_save') }}</button>
								<a class="btn" href="{{ADMIN_URL().ADMIN_BANNER_KEYWORD()}}">{{ trans('lang_data.form_cancel') }}</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('main_css')
	@parent
	{!! Html::style(ADMIN_CSS_URL().'image_crop/main.css') !!}
	{!! Html::style(ADMIN_CSS_URL().'image_crop/jquery.Jcrop.min.css') !!}
@endsection
@section('main_js')
	@parent
	{!! Html::script(ADMIN_JS_URL().'image_crop/jquery.Jcrop.min.js') !!}
	{!! Html::script(ADMIN_JS_URL().'image_crop/jquery.popupoverlay.js') !!}
	<script>
	if($("#input_form").length>0)
	{
		if($("#banner_id").length>0)
		{
			var test_module_id = $("#test_module_id").val();
		}
		else
		{
			var test_module_id = "";
		}
		$("#input_form").validate({
			ignore:'',
			rules:{
				'title': { required: true },
				'name': { required: true },
				'email': { required: true ,email: true },
			},
			messages:{
				'title': { required: "{{ trans('lang_data.requ_title') }}" },
				'name': { required: "{{ trans('lang_data.requ_title') }}" },
				'email': { required: "{{ trans('lang_data.requ_title') }}" },
			},
			highlight: function(element){
				$(element).closest('.control-group').addClass("f_error");
			},
			unhighlight: function(element) {
				$(element).closest('.control-group').removeClass("f_error");
			},
			errorPlacement: function(error, element) {
				$(element).closest('div').append(error);
			}
		});
	}
	</script>
@endsection