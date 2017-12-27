@extends('crud::layout.master')
@section('content')
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Test {{($encrypted_id && $encrypted_id!="")? "Edit" : "Add" }}</h3>
		<div class="row-fluid">
			<div class="span8">
				<form class="form-horizontal" name="input_form" id="input_form" method="POST" action="{{ADMIN_URL().ADMIN_CRUD_KEYWORD().'/do_save'}}">
					<fieldset>
						{!! GENERATE_CSRF_TOKEN()!!}
						@if(isset($encrypted_id) && $encrypted_id!="")
							<input type="hidden" name="test_module_id" value="{{$encrypted_id}}" id="test_module_id">
						@endif
						<div class="control-group formSep">
							<label class="control-label">Title: <span class="f_req">*</span></label>
							<div class="controls">
								@if(Request::old('title') && Request::old('title')!="")
									<input type="text" id="title" name="title" class="input-xlarge" value="{{Request::old('title')}}" />
								@elseif(isset($edit_data->title) && $edit_data->title!="")
									<input type="text" id="title" name="title" class="input-xlarge" value="{{$edit_data->title}}" />
								@else
									<input type="text" id="title" name="title" class="input-xlarge" value="" />
								@endif
								
							</div>
						</div>
						<div class="control-group formSep ">
							<label class="control-label">Name: <span class="f_req">*</span></label>
							<div class="controls">
								@if(Request::old('name') && Request::old('name')!="")
									<input type="text" id="name" name="name" class="input-xlarge" value="{{Request::old('name')}}" />
								@elseif(isset($edit_data->name) && $edit_data->name!="")
									<input type="text" id="name" name="name" class="input-xlarge" value="{{$edit_data->name}}" />
								@else
									<input type="text" id="name" name="name" class="input-xlarge" value="" />
								@endif
								
							</div>
						</div>	
						<div class="control-group formSep ">
							<label class="control-label">Email: <span class="f_req">*</span></label>
							<div class="controls">
								@if(Request::old('email') && Request::old('email')!="")
									<input type="text" id="email" name="email" class="input-xlarge" value="{{Request::old('email')}}" />
								@elseif(isset($edit_data->email) && $edit_data->email!="")
									<input type="text" id="email" name="email" class="input-xlarge" value="{{$edit_data->email}}" />
								@else
									<input type="text" id="email" name="email" class="input-xlarge" value="" />
								@endif
								
							</div>
						</div>
						<div class="control-group formSep">
							<label class="control-label">Status: <span class="f_req">*</span></label>
							<div class="controls">
								<label class="radio inline">
									@if(Request::old('status') && Request::old('status')=="active")
										<input type="radio" value="active" name="status" checked="checked" />
									@elseif(isset($edit_data->status) && $edit_data->status=="active")
										<input type="radio" value="active" name="status" checked="checked" />
									@else
										<input type="radio" value="active" name="status" checked="checked" />
									@endif
									active
								</label>
								<label class="radio inline">
									@if(Request::old('status') && Request::old('status')=="inactive")
										<input type="radio" value="inactive" name="status" checked="checked" />
									@elseif(isset($edit_data->status) && $edit_data->status=="inactive")
										<input type="radio" value="inactive" name="status" checked="checked" />
									@else	
										<input type="radio" value="inactive" name="status" />
									@endif
									inactive
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button class="btn btn-gebo" type="submit">Save</button>
								<a class="btn" href="#">Cancel</a>
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
		if($("#test_module_id").length>0)
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