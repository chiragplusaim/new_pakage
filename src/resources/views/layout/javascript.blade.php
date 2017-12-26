	<script>
		//=====CONSTANTS TO USE IN JS
		var ADMIN_KEYWORD = "{{ADMIN_KEYWORD()}}";
		var ADMIN_URL = "{{ADMIN_URL()}}";
		var ADMIN_REQUEST_URL = "{{ADMIN_REQUEST_URL()}}";
		var MIN_CHARACTER_LIMIT = "{{MIN_CHARACTER_LIMIT()}}";
		var MAX_CHARACTER_LIMIT = "{{MAX_CHARACTER_LIMIT()}}";
		var PROPERTY_MAX_PRICE = "{{PROPERTY_MAX_PRICE()}}";
		var PROPERTY_MIN_PRICE = "{{PROPERTY_MIN_PRICE()}}";
		//=====CONSTANTS TO USE IN JS
	</script>
	@section('main_js')
		{!! Html::script(ADMIN_JS_URL().'jquery.actual.min.js') !!}
		{!! Html::script(ADMIN_LIB_URL().'validation/jquery.validate.min.js') !!}
		{!! Html::script(ADMIN_LIB_URL().'validation/additional-methods.js') !!}
		{!! Html::script(ADMIN_LIB_URL().'tiny_mce/js/tinymce/tinymce.min.js') !!}
		{!! Html::script(ADMIN_JS_URL().'mask_input/jquery.inputmask.bundle.js') !!}
		{!! Html::script(ADMIN_LIB_URL().'intl-tel-input-master/build/js/intlTelInput.min.js') !!}
		<script>
			//JQUERY VALIDATOR METHOD
			jQuery.validator.addMethod("only_name", function(value, element) {
				return this.optional(element) || /^[a-zA-Z0-9\-\'\s]+$/i.test(value);
			}, "{{ trans('lang_data.valid_characters') }}" );
			jQuery.validator.addMethod("person_name", function(value, element) {
				return this.optional(element) || /^[a-zA-Z\'\s]+$/i.test(value);
			}, "{{ trans('lang_data.valid_characters') }}" );
			//=====PREG FOR COUNTRY STATE CITY NAME
			jQuery.validator.addMethod("location_name", function(value, element) {
				return this.optional(element) || /^[a-zA-Z\'\s\:\!\^\&\(\"\_\?\,\.\)\-\/\@\#\;]+$/i.test(value);
			}, "{{ trans('lang_data.valid_characters') }}" );
			//=====PREG FOR COUNTRY STATE CITY NAME
			jQuery.validator.addMethod("only_title", function(value, element) {
				return this.optional(element) || /^[a-zA-Z0-9\'\s\:\!\&\(\"\_\?\,\.\)\-\/\@\#\;]+$/i.test(value);
			}, "{{ trans('lang_data.valid_characters') }}" );
			jQuery.validator.addMethod("TelePhone", function(value, element) {
				return this.optional(element) || /^\(?\(?(\+\d{0,2}\)?\s?)?\(?\d{0,10}\)?[\s-]?\d{0,10}[\s-]?\d{0,10}\)?$/i.test(value);
			}, "{{ trans('lang_data.valid_numbers') }}");
			jQuery.validator.addMethod("CheckPrice", function(value, element) {
				return this.optional(element) || /^[0-9]+(\.[0-9]{1,2})?$/i.test(removeComma(value));
			}, "{{ trans('lang_data.valid_price') }}");
			jQuery.validator.addMethod("CheckDecimal", function(value, element) {
				return this.optional(element) || /^\d{0,50}(\.\d{1,2})?$/i.test(value);
			}, "{{ trans('lang_data.valid_decimal_number') }}");
			jQuery.validator.addMethod("CheckPassword", function(value, element) {
				return true;
				//return this.optional(element) || /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z\'\s\:\!\&\(\"\_\?\,\.\)\-\/\@\#\;]{8,}$/i.test(value);
			}, "{{ trans('lang_data.valid_check_pass') }}");
			//JQUERY VALIDATOR METHOD
		</script>
		{!! Html::script(ADMIN_BOOTSTRAP_URL().'js/bootstrap.min.js') !!}
		
			{!! Html::script(ADMIN_JS_URL().'jquery.debouncedresize.min.js') !!}
			{!! Html::script(ADMIN_JS_URL().'jquery.cookie.min.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'qtip2/jquery.qtip.min.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js') !!}
			{!! Html::script(ADMIN_JS_URL().'ios-orientationchange-fix.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'antiscroll/antiscroll.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'antiscroll/jquery-mousewheel.js') !!}
			{!! Html::script(ADMIN_JS_URL().'forms/jquery.ui.touch-punch.min.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'jquery-ui/jquery-ui-1.8.20.custom.min.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'datatables1.10.12/jquery.dataTables.min.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'datatables1.10.12/dataTables.responsive.min.js') !!}
			{!! Html::script(ADMIN_LIB_URL().'smoke/smoke.js') !!}
			<script>
				//Show loader on page refresh or page loader
				function ShowSelection(element)
				{
					var textComponent = element;
					var selectedText;

					if (textComponent.selectionStart !== undefined)
					{// Standards Compliant Version
					var startPos = textComponent.selectionStart;
					var endPos = textComponent.selectionEnd;
					selectedText = textComponent.value.substring(startPos, endPos);
					}
					else if (document.selection !== undefined)
					{// IE Version
					textComponent.focus();
					var sel = document.selection.createRange();
					selectedText = sel.text;
					}
					return selectedText;
				}
				//Show loader on page refresh or page loader
				function SL_WIN_UNLOAD()
				{
					window.onbeforeunload=function() {$("#HJS_loader").show(); };
				}
				//Show loader on page refresh or page loader
				function addComma(x) {
					x=x.toString();
					var lastThree = x.substring(x.length-3);
					var otherNumbers = x.substring(0,x.length-3);
					if(otherNumbers != '')
					lastThree = ',' + lastThree;
					var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
					//return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					return res;
				} 
				function removeComma(value)
				{
					var lstLetters = value;
					var lstReplace = lstLetters.replace(/\,/g,'');
					return lstReplace;
				} 
				function keydown_value(e,val,element) {
					var selected = removeComma(ShowSelection(element));
					var valueWithoutComma=removeComma(val);
					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
					// Allow: Ctrl+A
					(e.keyCode == 65 && e.ctrlKey === true) ||
					// Allow: home, end, left, right, down, up
					(e.keyCode >= 35 && e.keyCode <= 40) ||  (e.keyCode == 32) ||
					(e.shiftKey && (e.keyCode == 61))
					){
						// let it happen, don't do anything
						return;
					}
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
					// Ensure that it is a number and stop the keypress
					if(valueWithoutComma.length>=10 && selected.length==0)
					{
						e.preventDefault();
					}
				}
			</script>
		
	@show	
		
		{!! Html::script(ADMIN_JS_URL().'gebo_common.js') !!}
		<script>
			$(document).ready(function() {
				setTimeout('$("html").removeClass("js")',1000);
				//=====SET SIDEBAR ACTIVE
				$("#li-{{ADMIN_REQUEST_URL()}}").addClass('active');
				$("#li-{{ADMIN_REQUEST_URL()}}").closest(".accordion-body").addClass('in');
				//=====SET SIDEBAR ACTIVE
			});
		</script>
		{{--TEXT EDITOR TINYMCE SELECTOR--}}
		<script>
			tinymce.init({ selector:'.text_editor',
				relative_urls: false,
				convert_urls: false,
				remove_script_host : false,
				height: 250,
				valid_elements : '*[*]',
				plugins: [
					'advlist autolink lists link image charmap print preview anchor',
					'searchreplace visualblocks code fullscreen',
					'insertdatetime media table contextmenu paste code'
				  ],
				  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
				file_browser_callback: RoxyFileBrowser
			});
			function RoxyFileBrowser(field_name, url, type, win) {
				  var roxyFileman = '{{ADMIN_FILE_MANAGER_URL()}}index.html';
				  if (roxyFileman.indexOf("?") < 0) {     
					roxyFileman += "?type=" + type;   
				  }
				  else {
					roxyFileman += "&type=" + type;
				  }
				  roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
				  if(tinyMCE.activeEditor.settings.language){
					roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
				  }
				  tinyMCE.activeEditor.windowManager.open({
					 file: roxyFileman,
					 title: 'Admin',
					 width: 850, 
					 height: 650,
					 resizable: "yes",
					 plugins: "media",
					 inline: "yes",
					 close_previous: "no"  
				  }, {     window: win,     input: field_name    });
				  
				  return false; 
			}
		</script>
		{{--TEXT EDITOR TINYMCE SELECTOR--}}
		{{--DATEPICKER SELECTOR--}}
		<script>
			gebo_datepicker = {
				init: function() {
					if($('.dp1').attr("data-purpose")=="time_of_high_value")
					{
						var date_to_expire = new Date();
						date_to_expire.setDate(date_to_expire.getDate()+parseInt("Date"));
						$('.dp1').datepicker({
							maxDate: date_to_expire,
							changeYear:true,
							changeMonth:true,
							dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}",
						});
					}
					if($("#dp1").length>0)
					{
						if($('#dp1').attr("data-purpose")=="birth_date")
						{
							$('#dp1').datepicker({
								maxDate: new Date(),
								changeYear:true,
								changeMonth:true,
								yearRange: "-100:+0",
								dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}",
							});
						}
						else if($('#dp1').attr("data-purpose")=="time_of_high_value")
						{
							var date_to_expire = new Date();
							date_to_expire.setDate(date_to_expire.getDate()+parseInt("Expire"));
							$('#dp1').datepicker({
								maxDate: date_to_expire,
								changeYear:true,
								changeMonth:true,
								dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}",
							});
						}
						else if($('#dp1').attr("data-purpose")=="expiry_date")
						{
							if($('#dp1').attr("data-created"))
							{
								var date_to_expire = new Date($('#dp1').attr("data-created"));
							}
							else
							{
								var date_to_expire = new Date();
							}
							date_to_expire.setDate(date_to_expire.getDate()+parseInt("Expire Day"));
							$('#dp1').datepicker({
								minDate: new Date(),
								changeYear:true,
								changeMonth:true,
								dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}"
							});
						}
						else
						{
							$('#dp1').datepicker({changeYear:true,dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}",changeMonth:true});
						}
						$("#dp1").inputmask("99-99-9999");
					}
					if($('#dp_start').length>0 && $("#dp_end").length>0)
					{
						$('#dp_start').datepicker({
							maxDate: new Date(),
							changeYear:true,
							changeMonth:true,
							dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}",
							onClose: function (selectedDate) {
								$("#dp_end").datepicker("option", "minDate", selectedDate);
							}
						})
						$('#dp_end').datepicker({
							maxDate: new Date(),
							changeYear:true,
							changeMonth:true,
							dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}"
						});
						$("#dp_end").datepicker("option", "minDate", $('#dp_start').val());
					}
					if($('#dp_start_pra').length>0 && $("#dp_end_pra").length>0)
					{
						$('#dp_start_pra').datepicker({
							minDate: new Date('1/april/2017'),
							changeYear:true,
							changeMonth:true,
							dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}",
							onClose: function (selectedDate) {
								$("#dp_end_pra").datepicker("option", "minDate", selectedDate);
							}
						})
						$('#dp_end_pra').datepicker({
							changeYear:true,
							changeMonth:true,
							dateFormat: "{{SYSTEM_DATE_FORMAT_JS()}}"
						});
						$("#dp_end_pra").datepicker("option", "minDate", $('#dp_start_pra').val());
					}
					$("#dp_start_pra").inputmask("99-99-9999");
					$("#dp_end_pra").inputmask("99-99-9999");
				}
			};
			$(document).ready(function(){
				gebo_datepicker.init();
			})
			
		</script>
		{{--DATEPICKER SELECTOR--}}
		{{--PHONE FIELD SELECTOR--}}
		<script>
			gebo_mask_input = {
				init: function() {
					$(".mask_phone").inputmask("+9{2,3} {0,1}9{7,12}");
				}
			};
			$(document).ready(function(){
				gebo_mask_input.init();
			});
		</script>
		{{--PHONE FIELD SELECTOR--}}
		{{--PHONE CODE AND FLAG SELECTOR--}}
		<script>
		//=====COUNTRY FLAG MOBILE NO
		var mobile_flags = $(".mobile_flag").intlTelInput({
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			initialCountry:"in"
		});
		//=====COUNTRY FLAG MOBILE NO
		</script>
		{{--PHONE CODE AND FLAG SELECTOR--}}
		{{--CURRENCY FIELD SELECT--}}
		<script>
		if($(".currency_field").length>0)
		{
			$(".currency_field").keydown(function(e){
				keydown_value(e,$(this).val(),this);
			});
			$(".currency_field").keyup(function(){
				$(this).val(addComma(removeComma($(this).val())));
			})
		}
		</script>
		{{--CURRENCY FIELD SELECT--}}
		<script>
		function initialize_datatable(table_class)
		{
			//=====DECLARATION OF DATA TABLE
			if($("."+table_class).length>0)
			{
				if (navigator.userAgent.match(/(iPhone|Android|BlackBerry|iPod|iPad)/)) 
				{
					return $("."+table_class).DataTable({
						"responsive":true,
						"aaSorting": [],
						aoColumnDefs: [
							{
								bSortable: false,
								aTargets: [ 0,-1 ]
							}
						],
						"bPaginate": true,
						"bFilter": true, 
						"bDestroy":true,
						"bLengthChange": true,
						"oLanguage": {
							"sEmptyTable":     "{{ trans('lang_data.table_sorry_could_not') }} {{str_replace('_',' ',ADMIN_REQUEST_URL())}}."
						},
						"fnDrawCallback":function(){
							if ( $('.dataTables_paginate span .paginate_button').length>1) 
							{
								$('.dataTables_paginate')[0].style.display = "block";
								//$('.dataTables_length')[0].style.display = "block";
							} 
							else 
							{
								$('.dataTables_paginate')[0].style.display = "none";
								//$('.dataTables_length')[0].style.display = "none";
							}
						}					
					});
				} 
				else 
				{
					return $("."+table_class).DataTable({
						"aaSorting": [],
						aoColumnDefs: [
							{
								bSortable: false,
								aTargets: [ 0,-1 ]
							}
						],
						"bPaginate": true,
						"bFilter": true, 
						"bDestroy":true,
						"bLengthChange": true,
						"oLanguage": {
							"sEmptyTable":     "{{ trans('lang_data.table_sorry_could_not') }} {{str_replace('_',' ',ADMIN_REQUEST_URL())}}."
						},
						"fnDrawCallback":function(){
							if ( $('.dataTables_paginate span .paginate_button').length>1) 
							{
								$('.dataTables_paginate')[0].style.display = "block";
								//$('.dataTables_length')[0].style.display = "block";
							} 
							else 
							{
								$('.dataTables_paginate')[0].style.display = "none";
								//$('.dataTables_length')[0].style.display = "none";
							}
						}					
					});
				}
			}
			//=====DECLARATION OF DATA TABLE
		}
		$(document).ready(function(){
			initialize_datatable("data_table");
			//=====CHECK ALL DATA
			if($("#select_all").length>0)
			{
				$(document).on("click","#select_all",function(){
					check_uncheck_data();
				});
			}
			//=====CHECK ALL DATA
		});
		//=====CHECK ALL DATA
		function check_uncheck_data()
		{
			if($("#select_all").prop("checked"))
			{
				$(".select_all_data").prop("checked",true);
			}
			else
			{
				$(".select_all_data").prop("checked",false);
			}
		}
		//=====CHECK ALL DATA
		//=====DELETE ALL POPUP
		function delete_all(formName, url)
		{	
			var checked = $("#" + formName + " input:checked").length;
			if (checked > 0)
			{
				if (checked == 1)
				{
					if ($("#" + formName + " input:checked").attr("id") == 'select_all')
					{
						smoke.alert("{{ trans('lang_data.table_check_at_least_one') }}");
					}
					else
					{
						smoke.confirm("{{ trans('lang_data.table_do_delete_record') }}", function(e){
							if (e){
								$('#' + formName).attr('action', url);
								$('#' + formName).submit();
							}
						},{
							ok: "{{ trans('lang_data.table_smoke_yes') }}",
							cancel: "{{ trans('lang_data.table_smoke_no') }}",
							reverseButtons: true
						});	
					}
				}
				else
				{
					smoke.confirm("{{ trans('lang_data.table_do_delete_record') }}", function(e){
						if (e){
							$('#' + formName).attr('action', url);
							$('#' + formName).submit();
						}
					}, {
						ok: "{{ trans('lang_data.table_smoke_yes') }}",
						cancel: "{{ trans('lang_data.table_smoke_no') }}",
						reverseButtons: true
					});
				}
			}
			else
			{
				smoke.alert("{{ trans('lang_data.table_check_at_least_one') }}");
			}
		}
		//=====DELETE ALL POPUP
		//=====ACTIVE ALL POPUP
		function active_all(formName, url)
		{
			var checked = $("#" + formName + " input:checked").length;
			if (checked > 0)
			{
				if (checked == 1)
				{
					if ($("#" + formName + " input:checked").attr("id") == 'select_all')
					{
						smoke.alert("{{ trans('lang_data.table_check_at_least_one') }}");
					}
					else
					{
						smoke.confirm("{{ trans('lang_data.table_do_change_status') }}", function(e){
							if (e){
								$('#' + formName).attr('action', url);
								$('#' + formName).submit();
							}
						}, {
							ok: "{{ trans('lang_data.table_smoke_yes') }}",
							cancel: "{{ trans('lang_data.table_smoke_no') }}",
							reverseButtons: true
						});
					}
				}
				else
				{
					smoke.confirm("{{ trans('lang_data.table_do_change_status') }}", function(e){
						if (e){
							$('#' + formName).attr('action', url);
							$('#' + formName).submit();
						}
					}, {
						ok: "{{ trans('lang_data.table_smoke_yes') }}",
						cancel: "{{ trans('lang_data.table_smoke_no') }}",
						reverseButtons: true
					});
				}
			}
			else
			{
				smoke.alert("{{ trans('lang_data.table_check_at_least_one') }}");
			}
		}
		//=====ACTIVE ALL POPUP
		//=====IN ACTIVE ALL POPUP
		function inactive_all(formName, url)
		{
			var checked = $("#" + formName + " input:checked").length;
			if (checked > 0)
			{
				if (checked == 1)
				{
					if ($("#" + formName + " input:checked").attr("id") == 'select_all')
					{
						smoke.alert("{{ trans('lang_data.table_check_at_least_one') }}");
					}
					else
					{
						smoke.confirm("{{ trans('lang_data.table_do_change_status') }}",function(e){
							if (e){
								$('#' + formName).attr('action', url);
								$('#' + formName).submit();
							}
						}, {
							ok: "{{ trans('lang_data.table_smoke_yes') }}",
							cancel: "{{ trans('lang_data.table_smoke_no') }}",
							reverseButtons: true
						});
					}
				}
				else
				{
					smoke.confirm("{{ trans('lang_data.table_do_change_status') }}", function(e){
						if (e){
							$('#' + formName).attr('action', url);
							$('#' + formName).submit();
						}
					}, {
						ok: "{{ trans('lang_data.table_smoke_yes') }}",
						cancel: "{{ trans('lang_data.table_smoke_no') }}",
						reverseButtons: true
					});
				}
			}
			else
			{
				smoke.alert("{{ trans('lang_data.table_check_at_least_one') }}");
			}
		}
		//=====IN ACTIVE ALL POPUP
		//=====DELETE SINGLE POPUP
		function delete_single(url){
			smoke.confirm("{{ trans('lang_data.table_do_delete_record') }}", function(e){
						if (e){

							window.location = url;
						}
				}, {
				ok: "{{ trans('lang_data.table_smoke_yes') }}",
				cancel: "{{ trans('lang_data.table_smoke_no') }}",
				reverseButtons: true
			});
		}

		//=====DELETE SINGLE POPUP
		//=====STATUS CHANGE POPUP
		function status_change(url){
			smoke.confirm("{{ trans('lang_data.table_do_change_status') }}", function(e){
						if (e){
							window.location = url;
						}
				}, {
				ok: "{{ trans('lang_data.table_smoke_yes') }}",
				cancel: "{{ trans('lang_data.table_smoke_no') }}",
				reverseButtons: true
			});
		}
		//=====SEND EMAIL TO INACTIVE HANDHOLDING USER
		function send_email_to_inactive_handholding_user(url){
			smoke.confirm("{{ trans('lang_data.send_email_to_handholding_inactive_user') }}", function(e){
						if (e){

							window.location = url;
						}
				}, {
				ok: "{{ trans('lang_data.table_smoke_yes') }}",
				cancel: "{{ trans('lang_data.table_smoke_no') }}",
				reverseButtons: true
			});
		}

		//=====SEND EMAIL TO INACTIVE HANDHOLDING USER
	</script>



