<?php 
	use Illuminate\Support\Facades\Input;
	/**
     * This function is used for get front request url
     * @author Hirak
     * @reviewer
     */
	function FRONT_REQUEST_URL()
	{
		if(Request::segment(1) && Request::segment(1)!="")
		{
			return trim(Request::segment(1));
		}
		else
		{
			return "";
		}
	}
	/**
     * This function is used for get front request second url
     * @author Hirak
     * @reviewer
     */
	function FRONT_REQUEST_SECOND_URL()
	{
		if(Request::segment(2) && Request::segment(2)!="")
		{
			return trim(Request::segment(2));
		}
		else
		{
			return "";
		}
	}
	/**
     * This function is used for get front request third url
     * @author Hirak
     * @reviewer
     */
	function FRONT_REQUEST_THIRD_URL()
	{
		if(Request::segment(3) && Request::segment(3)!="")
		{
			return trim(Request::segment(3));
		}
		else
		{
			return "";
		}
	}
	/**
     * This function is used for get admin request url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_REQUEST_URL()
	{
		return trim(Request::segment(2));
	}
	/**
     * This function is used for get minimum char limit
     * @author Hirak
     * @reviewer
     */
	function MIN_CHARACTER_LIMIT()
	{
		return '3';
	}
	/**
     * This function is used for get maximum char limit
     * @author Hirak
     * @reviewer
     */
	function MAX_CHARACTER_LIMIT()
	{
		return '250';
	}
	/**
     * This function is used for get maximum banner limit
     * @author Hirak
     * @reviewer
     */
	function MAX_BANNER_LIMIT()
	{
		return '3';
	}
	/**
     * This function is used for generate csrf token
     * @author Hirak
     * @reviewer
     */
	function GENERATE_CSRF_TOKEN()
	{
		return "<input type='hidden' name='_token' value='".csrf_token()."'>";
	}
	/**
     * This function is used for generate token
     * @author Hirak
     * @reviewer
     */
	function GENERATE_TOKEN()
	{
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';	
		$token = '';
		for ($i = 0; $i < 6; $i++) 
		{
			$token .= $characters[rand(0, strlen($characters) - 1)];
		}
		//$token = '123456';
		$token = time().$token.time();
		return $token;
	}
	/**
     * Property expiry day start
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_EXPIRY_DAYS_START()
	{
		return '30';
	}
	/**
     * Property expiry day end
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_EXPIRY_DAYS_END()
	{
		return '45';
	}
	/**
     * This function is used for get minimum property price
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_MIN_PRICE()
	{
		return 500000;
	}
	/**
     * This function is used for get maximum property price
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_MAX_PRICE()
	{
		return 500000000;
	}
	/**
     * This function is used for get minimum property image aspect
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_IMAGE_MIN_ASPECT()
	{
		return '1.15';
	}
	/**
     * This function is used for get maximum property image aspect
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_IMAGE_MAX_ASPECT()
	{
		return '1.2';
	}
	/**
     * This function is used for check name in case of import file
     * @author Hirak
     * @reviewer
     */
	function CHECK_PREG_NAME()
	{
		return '/^[a-zA-Z0-9\s]+$/i';
	}
	/**
     * This function is used for check person 
     * @author Hirak
     * @reviewer
     */
	function CHECK_PREG_PERSON()
	{
		return '/^[a-zA-Z]+$/i';
	}
	/**
     * This function is used for check contact number 
     * @author Hirak
     * @reviewer
     */
	function CHECK_PREG_CONTACT_NUMBER()
	{
		return '/^\(?\(?(\+\d{0,2}\)?\s?)?\(?\d{0,10}\)?[\s-]?\d{0,10}[\s-]?\d{0,10}\)?$/';
	}
	/**
     * This function is used for check email 
     * @author Hirak
     * @reviewer
     */
	function CHECK_PREG_EMAIL()
	{
		return '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
	}
	/**
     * This function is used for upload file
     * @author Hirak
	 * @param $request
	 * @param $file
	 * @param $path
     * @reviewer
     */
	function upload_file($request,$file,$path)
	{
		if (Input::hasFile($file))
		{
			$filename = time()."_".$request->file($file)->getClientOriginalName();
			if(!file_exists($path))
			{
				mkdir($path,0755,true);
			}
			$request->file($file)->move(
				$path, $filename
			);
			return $filename;
		}
		else 
		{
			return '';
		}
	}
	/**
     * This function is used for check front url
     * @author Hirak
     * @reviewer
     */
	function CHECK_FRONT_URL()
	{
		if(FRONT_REQUEST_URL() != ADMIN_KEYWORD() )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/**
     * This function is used for display session message
     * @author Hirak
     * @reviewer
     */
	function SHOW_SESSION_MESSAGE()
	{
		$html = "";
		$class = "";
		if(ADMIN_REQUEST_URL()=="login" || ADMIN_REQUEST_URL()=="reset_password")
		{
			$class = "alert-login";
		}
		echo '<noscript>
			<div class="alert alert-danger '.$class.'">
				<a href="javascript:void(0)" class="close close_session_message" data-dismiss="alert" aria-label="close" title="close">x</a>
				'.trans('lang_data.helper_please_enbl_js').'
			</div>
		</noscript>';
		if(session()->has('err_msg'))
		{
			$html =		'<div class="alert alert-error '.$class.'">
							<a class="close" data-dismiss="alert">x</a>
							<strong><i class="icon-warning-sign"></i></strong> '.session()->get("err_msg").'
						</div>';
		}
		else if(session()->has('succ_msg'))	
		{
			$html =		'<div class="alert alert-success '.$class.'">
							<a class="close" data-dismiss="alert">x</a>
							<strong><i class="icon-ok-sign"></i></strong> '.session()->get("succ_msg").'
						</div>';
		}
		else if(session()->has('warn_msg'))	
		{
			$html =		'<div class="alert alert-info '.$class.'">
							<a class="close" data-dismiss="alert">x</a>
							<strong><i class="icon-info-sign"></i></strong> '.session()->get("warn_msg").'
						</div>';
		}
		return $html;
	}
	/**
     * This function is used for display session message in front
     * @author Hirak
     * @reviewer
     */
	function SHOW_SESSION_MESSAGE_FRONT($class=null)
	{
		$html = "";
		if(session()->has('err_msg'))
		{
			//<i class="fa fa-times"></i>
			$html =		'<div class="alert '.$class.' alert-danger">
							<a href="javascript:void(0)" class="close_error close_session_message" data-dismiss="alert" aria-label="close" title="close"><i aria-hidden="true" class="fa fa-times"></i></a>
							 '.session()->get("err_msg").'
						</div>';
		}
		else if(session()->has('succ_msg'))	
		{
			$html =		'<div class="alert '.$class.' alert-success">
							<a href="javascript:void(0)" class="close_success close_session_message" data-dismiss="alert" aria-label="close" title="close"><i aria-hidden="true" class="fa fa-times"></i></a>
							<i class="fa fa-check"></i> '.session()->get("succ_msg").'
						</div>';
		}
		else if(session()->has('warn_msg'))	
		{
			$html =		'<div class="alert '.$class.' alert-danger">
							<a href="javascript:void(0)" class="close_error close_session_message" data-dismiss="alert" aria-label="close" title="close"><i aria-hidden="true" class="fa fa-times"></i></a>
							<i class="fa fa-info-circle"></i> '.session()->get("warn_msg").'
						</div>';
		}
		return $html;
	}
	/**
     * This function is used for display session message for account page
     * @author Hirak
     * @reviewer
     */
	function SHOW_SESSION_MESSAGE_FRONT_ACCOUNT()
	{
		$html = "";
		echo '
		<noscript>
			<div class="overview_boxwhite02 cf account_session_msg">
				<h3><i class="fa fa-info-circle"></i> <span>'.trans('lang_data.helper_please_enbl_js').'</span></h3>
			</div>
		</noscript>';
		if(session()->has('err_msg'))
		{
			$html =		'<div class="overview_boxwhite02 cf account_session_msg">
							<div class="thank_close_btn01"><a href="javascript:void(0)" class="close_session_message"><i class="fa fa-times"></i></a></div>							
							<h3><i class="fa fa-exclamation-circle"></i> <span>'.session()->get("err_msg").'</span></h3>
						</div>';
		}
		else if(session()->has('warn_msg'))	
		{
			$html =		'<div class="overview_boxwhite02 cf account_session_msg">
							<div class="thank_close_btn01"><a href="javascript:void(0)" class="close_session_message"><i class="fa fa-times"></i></a></div>
							<h3 class="cf"><i class="fa fa-info-circle"></i> <span>'.session()->get("warn_msg").'</span></h3>
						</div>';
		}
		else if(session()->has('succ_msg'))	
		{
			$html =		'<div class="overview_boxwhite01 cf account_session_msg">
							<div class="thank_close_btn01"><a href="javascript:void(0)" class="close_session_message"><i class="fa fa-times"></i></a></div>
							<h3 class="cf"><i class="fa fa-check-circle" aria-hidden="true"></i> <span>'.session()->get("succ_msg").'</span></h3>
						</div>';
		}
		else if(session()->has('succ_msg1'))	
		{
			$html =		'<div class="overview_boxwhite01 cf account_session_msg">
							<div class="thank_close_btn01 close_msg_thnaks"><a href="javascript:void(0)" class="close_session_message"><i class="fa fa-times"></i></a></div>
							<h3 class="cf"><i class="fa fa-check-circle" aria-hidden="true"></i> <span>'.session()->get("succ_msg1").'</span></h3>
						</div>';
		}
		return $html;
	}
	/**
     * This function is used for get site information
     * @author Hirak
	 * @param $field
     * @reviewer
     */
	function SITE_INFO($field=null)
	{
		if(isset($field) && !empty($field))
		{
			return \App\AdminSetting::where('status','active')->first()->$field;
		}
		else
		{
			return \App\AdminSetting::where('status','active')->first();
		}
	}
	/**
     * This function is used for get user information
     * @author Hirak
	 * @param $field
	 * @param $profile_type For employees if passed parent_profile than get profile of parent agent if url is not in whitelisted list
	 *                      For employees if passed compulsory_parent_profile than phofile of parent agent compulsory
     * @reviewer
     */
	function USER_INFO($field=null,$profile_type='parent_profile')
	{
		if(Auth::check())
		{
			$user_obj = Auth::user();
			if(env('VIEW_CRM'))
			{
				if($profile_type=='parent_profile')
				{
					if($user_obj->rights_id==__CRM_EMPLOYEE_RIGHTS_ID())
					{
						if(!in_array(FRONT_REQUEST_URL(), __CRM_EMPLOYEE_WHITELIST_URL()))
						{
							$user_obj = \App\User::where('user_id',$user_obj->group_id)->first();
						}
					}
				}
				else if($profile_type=='compulsory_parent_profile')
				{
					if($user_obj->rights_id==__CRM_EMPLOYEE_RIGHTS_ID())
					{
						$user_obj = \App\User::where('user_id',$user_obj->group_id)->first();
					}
				}
			}
			if(isset($field) && !empty($field))
			{
				return $user_obj->$field;
			}
			else
			{
				return $user_obj;
			}	
		}
		else
		{
			return false;
		}
		
	}
	/**
     * This function is used for get user preference information
     * @author Hirak
	 * @param $field
     * @reviewer
     */
	function USER_PREFERENCE_INFO($field=null)
	{
		if(Auth::check())
		{
			if(isset($field) && !empty($field))
			{
				if(\App\UserPreferenceSetting::where('user_id',USER_INFO('user_id'))->select($field)->count()>0)
				{
					return \App\UserPreferenceSetting::where('user_id',USER_INFO('user_id'))->select($field)->first()->{$field};
				}
			}
			else
			{
				if(\App\UserPreferenceSetting::where('user_id',USER_INFO('user_id'))->count()>0)
				{
					return \App\UserPreferenceSetting::where('user_id',USER_INFO('user_id'))->first();
				}
			}	
		}
		else
		{
			return false;
		}
	}
	/**
     * This function is used for get pagination number for blog in front side
     * @author Hirak
     * @reviewer
     */
	function PAGINATION_NUMBER()
	{
		return "6";
	}
	/**
     * This function is used for upload multiple file
     * @author Hirak
	 * @param $request
	 * @param $file
	 * @param $path
	 * @param $module_name
     * @reviewer
     */
	function upload_for_multiple_file($request,$file,$path,$module_name=null)
	{
		$allowedMimeTypes = ['image/jpeg','image/png','image/jpg'];
		$type = $request->getClientMimeType();
		$extension="";
		if($type=="image/jpeg")
		{
			$extension = ".jpeg";
		}
		else if($type=="image/jpg")
		{
			$extension = ".jpg";
		}
		else if($type=="image/png")
		{
			$extension = ".png";
		}
		if(isset($module_name) && !empty($module_name))
		{
			$filename = $module_name.'_'.time().uniqid()."_property".$extension;
		}
		else
		{
			$filename = time().uniqid()."_property".$extension;
		}
		if(in_array($request->getClientMimeType(), $allowedMimeTypes) ){
			$request->move(
				$path, $filename
			);
			return $filename;
		}
		else
		{
			return "";
		}
	}
	/**
     * This function is used for upload multiple file
     * @author Hirak
	 * @param $request
	 * @param $file
	 * @param $path
	 * @param $module_name
     * @reviewer
     */
	function upload_for_multiple_docs($request,$file,$path,$module_name=null)
	{
		$i_i = 0;
		do{
			$tmp_file_name = ($i_i!=0?$i_i.'_':'').$request->getClientOriginalName();
			$i_i++;
		}while(file_exists($path.$tmp_file_name));
		$filename = $tmp_file_name;
		if (Input::hasFile($file))
		{
			$request->move(
				$path, $filename
			);
			return $filename;
		}
		else
		{
			return '';
		}
	}
	/**
     * This function is used for generate breadcrumbs
     * @author Hirak
     * @reviewer
     */
	function GENERATE_BREADCRUMB()
	{
		$segments = Request::segments();
		if(isset($segments[3]) && strlen($segments[3])>50)
		{
			unset($segments[3]);
		}elseif(isset($segments[2]) && strlen($segments[2])>50)
		{
			unset($segments[2]);
		}
		$html = 	'<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>';
        $html .=                '<li>
                                    <a href="'.ADMIN_SITE_URL().'"><i class="icon-home"></i></a>
                                </li>';
								for($i=1;$i<count($segments);$i++)
								{
									$name = ucwords(str_replace("_"," ",$segments[$i]));
									$url = ADMIN_URL();
									for($j=1;$j<=$i;$j++)
									{
										$url.=$segments[$j]."/";
									}
									$url = trim($url,"/");
									if($i==(count($segments)-1))
									{
										if($name != 'Do Report')
										{
		$html .=                		'<li>
											'.$name.'
										</li>';					
										}
									}
									else
									{
		$html .=                		'<li>
											<a href="'.$url.'">'.$name.'</a>
										</li>';
									}
								}
        $html .=            '</ul>
                        </div>
                    </nav>';
		return $html;			
	}
	/**
     * This function is used for add/update display order
     * @author Hirak
     * @reviewer
     */
	function viewDisplayOrder(		$module,														//	NAME OF THE MODULE E.G. ADD,UPDATE,DELETE
									$table,															//	NAME OF THE MODEL
									$displayOrderColumnName,										//	COLUMN NAME OF DISPLAY ORDER
									$primaryKeyName,												//	TABLE PRIMARY KEY NAME
									$primaryKeyValue=null,											//	PRIMARY KEY VALUE
									$newDisplayOrder=null,											//	NEW DISPLAY ORDER
									$oldDisplayOrder=null,											//	OLD DISPLAY ORDER
									$statusImportant=null,											//	FLAG PASSED IF INACTIVE RECORDS IGNORE(FLAG VALUE = "yes")
									$statusColumnName=null,											//	NAME OF THE COLUMN STATUS
									$parentLevels=null,												//	FLAG PASSED IF TABLE HAS MULTIPLE LEVEL DISPLAY ORDER(FLAG VALUE = "yes")
									$parentLevelsColumnName=null,									//	NAME OF THE DATABASE COLUMN NAME
									$newLevels=null,												//	NEW PARENT VALUE
									$oldLevels=null													//	OLD PARENT VALUE
								)
	{
		$query = DB::table($table);
		if(isset($statusImportant) && $statusImportant=="yes")
		{
			$query->where($statusColumnName, 'active');
		}
		if(isset($parentLevels)	&& 	$parentLevels=="yes")
		{
			$query->where($parentLevelsColumnName, $newLevels);
		}
		
		$result = $query->count();
		if($module == "add")
		{
			$total_count = $result+1;
		}
		else if($module == "edit")
		{
			if(isset($parentLevels)	&& 	$parentLevels=="yes")
			{
				if($newLevels !=$oldLevels)
				{
					$total_count = $result+1;
				}
				else
				{
					$total_count = $result;
				}
			}
			else
			{
				$total_count = $result;
			}
			echo '<input type="hidden" name="old_display_order" id="old_display_order" value="'.$oldDisplayOrder.'">';
			if($module == "edit")
			{
				if(isset($parentLevels)																	&& 	$parentLevels=="yes")
				{
					echo '<input type="hidden" name="old_parent_id" id="old_parent_id" value="'.$oldLevels.'">';
				}
			}
		}
		echo		'
							<label class="control-label">'.trans('lang_data.form_display_order').': <span class="f_req">*</span></label>
							<div class="controls">
								<select name="'.$displayOrderColumnName.'" id="'.$displayOrderColumnName.'" class="input-xlarge">';
								for($i=1;$i<=$total_count;$i++)
								{
									$selected = "";
									if(Request::old($displayOrderColumnName) && Request::old($displayOrderColumnName)==$i )
									{
										$selected = "selected";
									}
									else if(isset($oldDisplayOrder) && !empty($oldDisplayOrder) && $oldDisplayOrder==$i)
									{
										$selected = "selected";
									}
									else if($i==$total_count && (!isset($oldDisplayOrder) || empty($oldDisplayOrder)) && !Request::old($displayOrderColumnName))
									{
										$selected = "selected";
									}
									echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
								}
									
		echo					'</select> 
							</div>
						
					';
	}
	function viewDisplayOrderJquery($module,														//	NAME OF THE MODULE E.G. ADD,UPDATE,DELETE
									$table,															//	NAME OF THE DATABASE TABLE
									$displayOrderColumnName,										//	COLUMN NAME OF DISPLAY ORDER
									$primaryKeyName,												//	TABLE PRIMARY KEY NAME
									$primaryKeyValue=null,											//	PRIMARY KEY VALUE
									$newDisplayOrder=null,											//	NEW DISPLAY ORDER
									$oldDisplayOrder=null,											//	OLD DISPLAY ORDER
									$statusImportant=null,											//	FLAG PASSED IF INACTIVE RECORDS IGNORE(FLAG VALUE = "yes")
									$statusColumnName=null,											//	NAME OF THE COLUMN STATUS
									$parentLevels=null,												//	FLAG PASSED IF TABLE HAS MULTIPLE LEVEL DISPLAY ORDER(FLAG VALUE = "yes")
									$parentLevelsColumnName=null,									//	NAME OF THE DATABASE COLUMN NAME
									$newLevels=null,												//	NEW PARENT VALUE
									$oldLevels=null													//	OLD PARENT VALUE
								)
	{
			$url = ADMIN_URL().'viewAjaxDisplayOrder';
			$token = csrf_token();
			echo 	"
					<script>
						$('#".$parentLevelsColumnName."').change(function(){
							changeOrderDisplay();
						});
						$(document).ready(function(){
							changeOrderDisplay();
						})
						function changeOrderDisplay()
						{
							var newLevels= $('#".$parentLevelsColumnName."').val();
							if(newLevels != '')
							{
								$.ajax({
									url:'".$url."',
									data:{
										'module':'".$module."',
										'table':'".$table."',
										'displayOrderColumnName':'".$displayOrderColumnName."',
										'primaryKeyName':'".$primaryKeyName."',
										'primaryKeyValue':'".$primaryKeyValue."',
										'newDisplayOrder':'".$newDisplayOrder."',
										'oldDisplayOrder':'".$oldDisplayOrder."',
										'statusImportant':'".$statusImportant."',
										'statusColumnName':'".$statusColumnName."',
										'parentLevels':'".$parentLevels."',
										'parentLevelsColumnName':'".$parentLevelsColumnName."',
										'newLevels':newLevels,
										'oldLevels':'".$oldLevels."',
										'_token':'".$token."'
									},
									type:'POST',
									success:function(data)
									{
										$('.displayOrderData').show();
										$('.displayOrderData').html(data);
									}
								});
							}
							else
							{
								$('.displayOrderData').hide();
							}
							
						}
					</script>
			";
		
	}	
	function update_display_order(	$module,														//	NAME OF THE MODULE E.G. ADD,UPDATE,DELETE
									$table,															//	NAME OF THE DATABASE TABLE
									$displayOrderColumnName,										//	COLUMN NAME OF DISPLAY ORDER
									$primaryKeyName,												//	TABLE PRIMARY KEY NAME
									$primaryKeyValue=null,											//	PRIMARY KEY VALUE
									$newDisplayOrder=null,											//	NEW DISPLAY ORDER
									$oldDisplayOrder=null,											//	OLD DISPLAY ORDER
									$statusImportant=null,											//	FLAG PASSED IF INACTIVE RECORDS IGNORE(FLAG VALUE = "yes")
									$statusColumnName=null,											//	NAME OF THE COLUMN STATUS
									$parentLevels=null,												//	FLAG PASSED IF TABLE HAS MULTIPLE LEVEL DISPLAY ORDER(FLAG VALUE = "yes")
									$parentLevelsColumnName=null,									//	NAME OF THE DATABASE COLUMN NAME
									$newLevels=null,												//	NEW PARENT VALUE
									$oldLevels=null													//	OLD PARENT VALUE
								)
	{
		$query = DB::table($table);
		if(isset($statusImportant) && $statusImportant=="yes")
		{
			$query->where($statusColumnName, 'active');
		}
		if(isset($parentLevels)																		&& $parentLevels=="yes")
		{
			$query->where($parentLevelsColumnName, $newLevels);
		}
		$result = $query->get();
		if($module == "add")
		{
			foreach($result	as 	$r)
			{
				if($r->$displayOrderColumnName >=$newDisplayOrder)
				{
					$query2 = DB::table($table);
					$query2->where($primaryKeyName,$r->$primaryKeyName);
					$query2->update([$displayOrderColumnName=>$r->$displayOrderColumnName+1]);
				}
			}
		}
		if($module																					==	"edit")
		{
			if(isset($parentLevels)																	&& $parentLevels=="yes")
			{
				if($newLevels																		!=	$oldLevels)
				{
					foreach($result as $r)
					{
						if($r->$displayOrderColumnName												>=	$newDisplayOrder)
						{
							$query3 = DB::table($table);
							$query3->where($primaryKeyName,$r->$primaryKeyName);
							$query3->update([$displayOrderColumnName => $r->$displayOrderColumnName+1]);
						}
					}
					$query4 = DB::table($table);
					if(isset($statusImportant) 														&& 	$statusImportant=="yes")
					{
						$query4->where($statusColumnName, 'active');
					}
					$query4->where($parentLevelsColumnName, $oldLevels);
					$result4 = $query4->get();
					if(count($result4)															>	0)
					{
						foreach($result4 as $r)
						{
							if($r->$displayOrderColumnName											>	$oldDisplayOrder)
							{
								$query5 = DB::table($table);
								$query5->where($primaryKeyName,$r->$primaryKeyName);
								$query5->update([$displayOrderColumnName => $r->$displayOrderColumnName-1]);
							}
						}
					}
					
				}
				else
				{
					if($oldDisplayOrder																!=	$newDisplayOrder)
					{
						foreach($result as $r)
						{
							if($newDisplayOrder														>	$oldDisplayOrder)
							{
								if($r->$displayOrderColumnName<=$newDisplayOrder 					&& 	$r->$displayOrderColumnName>$oldDisplayOrder 
									&& $r->$displayOrderColumnName									!=	$oldDisplayOrder)
								{
									$query6 = DB::table($table);
									$query6->where($primaryKeyName,$r->$primaryKeyName);
									$query6->update([$displayOrderColumnName => $r->$displayOrderColumnName-1]);
								}
							}
							if($newDisplayOrder														<	$oldDisplayOrder)
							{
								if($r->$displayOrderColumnName>=$newDisplayOrder 					&& 	$r->$displayOrderColumnName<$oldDisplayOrder 
									&& $r->$displayOrderColumnName									!=	$oldDisplayOrder)
								{
									$query7 = DB::table($table);
									$query7->where($primaryKeyName,$r->$primaryKeyName);
									$query7->update([$displayOrderColumnName => $r->$displayOrderColumnName+1]);
								}
							}
						}
					}
				}
			}
			else
			{
				if($oldDisplayOrder																	!=	$newDisplayOrder)
				{
					foreach($result as $r)
					{
						if($newDisplayOrder															>	$oldDisplayOrder)
						{
							if($r->$displayOrderColumnName<=$newDisplayOrder 						&& 	$r->$displayOrderColumnName>$oldDisplayOrder 
								&& $r->$displayOrderColumnName										!=	$oldDisplayOrder)
							{
								$query8 = DB::table($table);
								$query8->where($primaryKeyName,$r->$primaryKeyName);
								$query8->update([$displayOrderColumnName => $r->$displayOrderColumnName-1]);
							}
						}
						if($newDisplayOrder															<	$oldDisplayOrder)
						{
							if($r->$displayOrderColumnName>=$newDisplayOrder 						&& 	$r->$displayOrderColumnName<$oldDisplayOrder 
								&& $r->$displayOrderColumnName										!=	$oldDisplayOrder)
							{
								$query9 = DB::table($table);
								$query9->where($primaryKeyName,$r->$primaryKeyName);
								$query9->update([$displayOrderColumnName => $r->$displayOrderColumnName+1]);
							}
						}
					}
				}			
			}
		}
	}
	function reset_display_order(	$module,														//	NAME OF THE MODULE E.G. ADD,UPDATE,DELETE
									$table,															//	NAME OF THE DATABASE TABLE
									$displayOrderColumnName,										//	COLUMN NAME OF DISPLAY ORDER
									$primaryKeyName,												//	TABLE PRIMARY KEY NAME
									$primaryKeyValue=null,											//	PRIMARY KEY VALUE
									$newDisplayOrder=null,											//	NEW DISPLAY ORDER
									$oldDisplayOrder=null,											//	OLD DISPLAY ORDER
									$statusImportant=null,											//	FLAG PASSED IF INACTIVE RECORDS IGNORE(FLAG VALUE = "yes")
									$statusColumnName=null,											//	NAME OF THE COLUMN STATUS
									$parentLevels=null,												//	FLAG PASSED IF TABLE HAS MULTIPLE LEVEL DISPLAY ORDER(FLAG VALUE = "yes")
									$parentLevelsColumnName=null,									//	NAME OF THE DATABASE COLUMN NAME
									$newLevels=null,												//	NEW PARENT VALUE
									$oldLevels=null													//	OLD PARENT VALUE
								)
	{
		$query = DB::table($table);
		if(isset($statusImportant) 																	&& 	$statusImportant=="yes")
		{
			$query->where($statusColumnName, 'active');
		}
		if(isset($parentLevels)																		&& $parentLevels=="yes")
		{
			$query->where($parentLevelsColumnName, $oldLevels);
		}
		if(isset($oldDisplayOrder) && !empty($oldDisplayOrder))
		{
			$query->where($displayOrderColumnName,'>', $oldDisplayOrder);
			$query->orderBy($displayOrderColumnName,"ASC");
			$result = $query->get();
			$total_records = $query->count();
			$i=1;
			foreach($result as $r)
			{
				$query = DB::table($table);
				$query->where($primaryKeyName,$r->$primaryKeyName);
				$query->update([$displayOrderColumnName => $r->$displayOrderColumnName-1]);
				$i++;
			}	
		}
	}
	/**
     * This function is used for get status icon
     * @author Hirak
	 * @param $status
     * @reviewer
     */
	function GET_STATUS_ICON($status)
	{
		if(strtolower($status)=="active")
		{
			echo '<span style="color:#090; font-weight:bold;">'.ucwords($status).'</span>';
		}
		else
		{
			echo '<span style="color:#ff0000; font-weight:bold;">'.ucwords($status).'</span>';
		}
	}
	/**
     * This function is used for get row count
     * @author Hirak
	 * @param $table
	 * @param $condition_array
     * @reviewer
     */
	function get_rows_count($table,$condition_array)
	{
		$query = DB::table($table);
		foreach($condition_array as $k=>$v)
		{
			$query->where($k,$v);
		}
		return $query->count();
	}
	/**
     * This function is used for get dashboard url
     * @author Hirak
	 * @param $page
     * @reviewer
     */
	function GET_DASHED_URL($page)
	{
		$url = strtolower(str_replace(",","-",str_replace(" ","-",strtolower(trim($page)))));
		return $url;
	}
	/**
     * This function is used for explode string
     * @author Hirak
	 * @param $string
	 * @param $delimeter
     * @reviewer
     */
	function EXPLODE_STRING($string,$delimeter=null)
	{
		$final_array = array();
		if(isset($delimeter) && !empty($delimeter))
		{
			$temp_array = explode($delimeter,$string);
		}
		else
		{
			$temp_array = explode(",",$string);
		}
		if(count($temp_array)>0 && is_array($temp_array))
		{
			$final_array = $temp_array;
		}
		return $final_array;
	}
	/**
     * This function is used for implode array
     * @author Hirak
	 * @param $array
	 * @param $glue
     * @reviewer
     */
	function IMPLODE_ARRAY($array,$glue=null)
	{
		$final_str = "";
		if(isset($glue) && !empty($glue))
		{
			$temp_str = implode($glue,$array);
		}
		else
		{
			$temp_str = implode(",",$array);
		}
		if($temp_str!="")
		{
			$final_str = $temp_str;
		}
		return $final_str;
	}
	/**
     * This function is used for convert string to word
     * @author Hirak
	 * @param $str
     * @reviewer
     */
	function STR_TO_WORD($str)
	{
		return ucwords(str_replace("_"," ",$str));
	}
	/**
     * This function is used for convert string to lower
     * @author Hirak
	 * @param $str
     * @reviewer
     */
	function STR_TO_LOWER($str)
	{
		return strtolower(str_replace("_"," ",$str));
	}
	/**
     * This function is used for convert string to upper
     * @author Hirak
	 * @param $str
     * @reviewer
     */
	function STR_TO_UPPER($str)
	{
		return strtoupper(str_replace("_"," ",$str));
	}
	/**
     * This function is used for check property category 
     * @author Hirak
	 * @param int $category_id
     * @reviewer
     */
	function CHECK_PROPERTY_CATEGORY_MODIFYABLE($category_id)
	{
		$return_value = true;
		if(\App\AdminCategory::where('parent_id',$category_id)->count()>0)
		{
			$category_list = \App\AdminCategory::select("category_id")->where('parent_id',$category_id)->get();
			$i=0;
			foreach($category_list as $cl)
			{
				if(\App\AdminCategory::where('parent_id',$cl->category_id)->count()>0)
				{
					${'category_list'.$i} = \App\AdminCategory::select("category_id")->where('parent_id',$cl->category_id)->get();
					foreach(${'category_list'.$i} as ${'cl'.$i})
					{
						if(\App\AdminProperty::where('category_id',${'cl'.$i}->category_id)->count()>0)
						{
							$return_value = false;
						}
					}
				}
				if(\App\AdminProperty::where('category_id',$cl->category_id)->count()>0)
				{
					$return_value = false;
				}
				$i++;
			}
		}
		if(\App\AdminProperty::where('category_id',$category_id)->count()>0)
		{
			$return_value = false;
		}
		return $return_value;
	}
	/**
     * This function is used for get default country
     * @author Hirak
     * @reviewer
     */
	function DEFAULT_COUNTRY()
	{
		return App\AdminCountries::where("name","india")->first();
	}
	/**
     * This function is used for get default state
     * @author Hirak
     * @reviewer
     */
	function DEFAULT_STATE()
	{
		return App\AdminStates::where("name","Gujarat")->where("country_id",DEFAULT_COUNTRY()->country_id)->first();
	}
	/**
     * This function is used for get default city
     * @author Hirak
     * @reviewer
     */
	function DEFAULT_CITY()
	{
		return App\AdminCities::where("name","Ahmedabad")->where("state_id",DEFAULT_STATE()->state_id)->first();
	}
	/**
     * This function is used for get hot property limit
     * @author Hirak
     * @reviewer
     */
	function HOT_PROPERTY_LIMIT()
	{
		return '8';
	}
	/**
     * This function is used for get system date format
     * @author Hirak
     * @reviewer
     */
	function SYSTEM_DATE_FORMAT_PHP()
	{
		return 'd-m-Y';
	}
	/**
     * This function is used for get system date and time format
     * @author Hirak
     * @reviewer
     */
	function SYSTEM_DATE_TIME_FORMAT_PHP()
	{
		return 'd-m-Y h:i:s';
	}
	/**
     * This function is used for get system date format in js
     * @author Hirak
     * @reviewer
     */
	function SYSTEM_DATE_FORMAT_JS()
	{
		return 'dd-mm-yy';
	}
	/**
     * This function is used for get system date and time format in js
     * @author Hirak
     * @reviewer
     */
	function SYSTEM_DATE_TIME_FORMAT_JS()
	{
		return 'dd-mm-yy hh:mm:ss';
	}
	/**
     * This function is used for get system date format in sql
     * @author Hirak
     * @reviewer
     */
	function SYSTEM_DATE_FORMAT_SQL()
	{
		return '%d-%m-%Y';
	}
	/**
     * This function is used for show system date format 
     * @author Hirak
     * @reviewer
     */
	function SYSTEM_DATE_FORMAT_SHOW()
	{
		return 'dd-mm-yyyy';
	}
	/**
     * This function is count the digit
     * @author Hirak
	 * @param $number
     * @reviewer
     */
	function count_digit($number) 
	{
		return strlen($number);
	}
	/**
     * This function is used for generate divider
     * @author Hirak
	 * @param $number_of_digits
     * @reviewer
     */
	function divider($number_of_digits) 
	{
		$tens="1";
		while(($number_of_digits-1)>0)
		{
			$tens.="0";
			$number_of_digits--;
		}
		return $tens;
	}
	/**
     * This function is used for convert price to the indian value
     * @author Hirak
	 * @param $num
	 * @param $decimal_digit
     * @reviewer
     */
	function convert_to_indian_value($num,$decimal_digit=NULL)
	{
		$ext="";//thousand,lac, crore
		$number_of_digits = count_digit($num); //this is call :)
		if($number_of_digits>3)
		{
			if($number_of_digits%2!=0)
				$divider=divider($number_of_digits-1);
			else
				$divider=divider($number_of_digits);
		}
		else
			$divider=1;
		$fraction=$num/$divider;
		$fraction= round($fraction,(isset($decimal_digit) && $decimal_digit!="")?$decimal_digit:2);
		//$fraction=number_format($fraction,(isset($decimal_digit) && $decimal_digit!="")?$decimal_digit:2);
		if($number_of_digits==4 ||$number_of_digits==5)
			$ext="k";
		if($number_of_digits==6 ||$number_of_digits==7)
			$ext="Lakh";
		if($number_of_digits==8 ||$number_of_digits==9)
			$ext="Cr";
		return $fraction." ".$ext;
	}
	/**
     * This function is used for convert price to the indian value with comma separation
     * @author Hirak
	 * @param $num
     * @reviewer
     */
	function convert_to_indian_value_comma($num)
	{
		if(strlen($num)>3)
		{
			$last_three = substr($num, -3);
			$other_numbers = substr($num, 0,strlen($num)-3);
			if($other_numbers!= '')
			$last_three = ','.$last_three;
			$res =preg_replace("/\B(?=(\d{2})+(?!\d))/",",",$other_numbers).$last_three;
			return $res;	
		}
		else
		{
			return $num;
		}
		
	}
	/**
     * This function is used for get current user type
     * @author Hirak
     * @reviewer
     */
	function GET_CURRENT_USER_TYPE($profile_type='parent_profile')
	{
		if(Auth::check())
		{
			$rights_id = USER_INFO('rights_id',$profile_type);
			if(\App\AdminRights::where("rights_id",$rights_id)->count()>0)
			{
				return \App\AdminRights::where("rights_id",$rights_id)->first()->title;
			}
			else
			{
				return "";
			}
		}
		else
		{
			return "";
		}
	}
	/**
     * This function is used for get property search limit
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_SEARCH_LIMIT()
	{
		return "10";
	}
	/**
     * This function is used for get user type keyword singular from rights
     * @author Hirak
	 * @param int $rights_id
     * @reviewer
     */
	function GET_USER_TYPE_SINGULAR($rights_id)
	{
		if(isset($rights_id) && !empty($rights_id))
		{
			if(\App\AdminRights::where("rights_id",$rights_id)->count()>0)
			{
				$title = \App\AdminRights::where("rights_id",$rights_id)->first()->title;
				if($title==ADMIN_AGENT_KEYWORD())
				{
					return ADMIN_AGENT_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_SELLER_KEYWORD())
				{
					return ADMIN_SELLER_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_BUYER_KEYWORD())
				{
					return ADMIN_BUYER_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_MANAGEMENT_KEYWORD())
				{
					return ADMIN_MANAGEMENT_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_CA_KEYWORD())
				{
					return ADMIN_CA_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_LAWYER_KEYWORD())
				{
					return ADMIN_LAWYER_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_VALUER_KEYWORD())
				{
					return ADMIN_VALUER_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_PREFERRED_AGENT_KEYWORD())
				{
					return ADMIN_PREFERRED_AGENT_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD())
				{
					return ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD())
				{
					return ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD_SINGULAR();
				}
				else if($title==ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD())
				{
					return ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD_SINGULAR();
				}
				else if(env('VIEW_CRM') && $title==__CRM_EMPLOYEE_RIGHTS_TITILE())
				{
					return __CRM_EMPLOYEE_RIGHTS_TITILE_SINGULAR();
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	/**
     * This function is used for get google map api key
     * @author Hirak
     * @reviewer
     */
	function GOOGLE_MAP_API_KEY()
	{
		return "AIzaSyCICJYpwEQvJ9fxtqQi-jj5hPgDqoc-zKI";
		//return "AIzaSyCeuyXqSw7bD0U7eiYPecDgtow4_8-TepE";
		//return "AIzaSyBrhMA3fGL-085qSTzwqsg-ePwoesLjEt0";
	}
	/**
     * This function is used for assign agent to hand hold property
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function ASSIGN_AGENT_TO_HAND_HOLD_PROPERTY($r)
	{
		$agent_id = "0";
		$agent_excluded_index = 0;
		if($r->hand_hold_property=="yes")
		{
			if(isset($r->excluded_agents) && !empty($r->excluded_agents))
			{
				$excluded_agents = unserialize($r->excluded_agents);
			}
			else
			{
				$excluded_agents = array();
			}
			if(isset($r->buyer_id) && !empty($r->buyer_id))
			{
				if(\App\AdminProperty::select('agent_id')->where('property_id',$r->property_id)->count()>0)
				{
					$property_agent_exclude = \App\AdminProperty::select('agent_id')->where('property_id',$r->property_id)->first()->agent_id;
					if(isset($property_agent_exclude) && !empty($property_agent_exclude))
					{
						$excluded_agents[] = $property_agent_exclude;
					}
				}
			}
			if(isset($r->zone) && !empty($r->zone) && isset($r->city_id) && !empty($r->city_id))
			{
				$zone_id = $r->zone;
				$city_id = $r->city_id;
				if(\App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('zone',$zone_id)
							->where('city_id',$city_id)
							->count()>0)
				{
					$agent_array = \App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('zone',$zone_id)
							->where('city_id',$city_id)
							->orderBy('email','ASC')->get();
					foreach($agent_array as $aa)	
					{
						if(in_array($aa->user_id,$excluded_agents))
						{
							$agent_excluded_index++;
							continue;
						}
						else
						{
							$agent_id = $aa->user_id;
							break;
						}
					}	
				}
				else if(\App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('city_id',$city_id)
							->count()>0)
				{
					$agent_array = \App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('city_id',$city_id)
							->orderBy('email','ASC')->get();
					foreach($agent_array as $aa)	
					{
						if(in_array($aa->user_id,$excluded_agents))
						{
							$agent_excluded_index++;
							continue;
						}
						else
						{
							$agent_id = $aa->user_id;
							break;
						}
					}	
				}
				else
				{
					$agent_array = \App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->orderBy('email','ASC')->get();
					foreach($agent_array as $aa)	
					{
						if(in_array($aa->user_id,$excluded_agents))
						{
							$agent_excluded_index++;
							continue;
						}
						else
						{
							$agent_id = $aa->user_id;
							break;
						}
					}
				}
			}
			else
			{
				$agent_array = \App\User::where('status','active')
						->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
						->orderBy('email','ASC')->get();
				foreach($agent_array as $aa)	
				{
					if(in_array($aa->user_id,$excluded_agents))
					{
						$agent_excluded_index++;
						continue;
					}
					else
					{
						$agent_id = $aa->user_id;
						break;
					}
				}
			}
			if(count($agent_array)>0 && $agent_excluded_index>=count($agent_array))
			{
				$r->excluded_agents = "";
				$r->save();
				ASSIGN_AGENT_TO_HAND_HOLD_PROPERTY($r);
			}
			else
			{
				$r->agent_id =  $agent_id;
				$r->save();
			}	
		}
		else
		{
			$r->excluded_agents = "";
			$r->agent_id =  $agent_id;
			$r->save();
		}
	}
	/**
     * This function is used for assign agent to hand hold property count
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function ASSIGN_AGENT_TO_HAND_HOLD_PROPERTY_COUNT($r)
	{
		$agent_count = "1";
		if($r->hand_hold_property=="yes")
		{
			$agent_id = "0";
			$agent_excluded_index = 0;
			if(isset($r->zone) && !empty($r->zone) && isset($r->city_id) && !empty($r->city_id))
			{
				$zone_id = $r->zone;
				$city_id = $r->city_id;
				if(\App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('zone',$zone_id)
							->where('city_id',$city_id)
							->count()>0)
				{
					$agent_count = \App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('zone',$zone_id)
							->where('city_id',$city_id)
							->orderBy('email','ASC')->count();
				}
				else if(\App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('city_id',$city_id)
							->count()>0)
				{
					$agent_count = \App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->where('city_id',$city_id)
							->orderBy('email','ASC')->count();
				}
				else
				{
					$agent_count = \App\User::where('status','active')
							->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
							->orderBy('email','ASC')->count();
				}
			}
			else
			{
				$agent_count = \App\User::where('status','active')
						->where('rights_id',\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id)
						->orderBy('email','ASC')->count();
			}
		}
		return $agent_count;
	}
	/**
     * This function is used for get property buyer information
     * @author Hirak
     * @reviewer
     */
	function GET_PROPERTY_BUYER_INFO()
	{
		$return_arr = array();
		$user_info = USER_INFO();
		$title = "";
		if(isset($user_info->mr_ms) && !empty($user_info->mr_ms))
		{
			$title = $user_info->mr_ms."&nbsp;";
		}
		else if(isset($user_info->gender) && !empty($user_info->gender))
		{
			if($user_info->gender=='male')
			{
				$title = "Mr.&nbsp;";
			}
			else if($user_info->gender=='female')
			{
				$title = "Ms.&nbsp;";
			}
		}
		if(empty($user_info->first_name))
		{
			$simple_name = GENERATE_USERNAME($user_info->email);
			$name =$simple_name;
		}
		else
		{
			$simple_name = $user_info->first_name."&nbsp;".$user_info->last_name;
			$name = $user_info->first_name;
		}
		$mobile = 'Not Available';
		if(isset($user_info->mobile) && !empty($user_info->mobile))
		{
			$mobile = $user_info->mobile;
		}
		else if(isset($user_info->phone) && !empty($user_info->phone))
		{
			$mobile = $user_info->phone;
		}
		$return_arr['name'] = $name;
		$return_arr['mobile'] = $mobile;
		$return_arr['email'] = $user_info->email;
		$return_arr['simple_name'] = $simple_name;
		return $return_arr;
	}
	/**
     * This function is used for get property owner information
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_OWNER_INFO($r)
	{
		$return_arr = array();
		$user_info = \App\User::where('user_id',$r->user_id)->first();
		/*if(isset($user_info->mr_ms) && !empty($user_info->mr_ms))
		{
			$title = $user_info->mr_ms;
			$return_arr['name'] = $title."&nbsp;".$r->b_name;
		}
		else if(isset($user_info->gender) && !empty($user_info->gender))
		{
			if($user_info->gender=='male')
			{
				$title = "Mr.";
				$return_arr['name'] = $title."&nbsp;".$r->b_name;
			}
			else if($user_info->gender=='female')
			{
				$title = "Ms.";
				$return_arr['name'] = $title."&nbsp;".$r->b_name;
			}
			else
			{
				eturn_arr['name'] = $r->b_name;
			}
		}
		else
		{*/
			$return_arr['name'] = $r->b_name;
		/*}*/
		$return_arr['mobile'] = $r->mobile;
		$return_arr['email'] = $user_info->email;
		$return_arr['simple_name'] = $r->b_name;
		$return_arr['property_url'] = FRONT_URL().$r->url;
		$return_arr['property_name'] = $r->name;
		return $return_arr;
	}
	/**
     * This function is used for get property name string for front
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_NAME_STR($r)
	{
		$property_name_str = "";
		if(!empty(GET_PROPERTY_TYPE($r)) && !empty(GET_PROPERTY_AREA($r)))
		{
			$property_name_str = GET_PROPERTY_TYPE($r)." - ".GET_PROPERTY_AREA($r)." <span>(carpet area)</span>";
		}
		return $property_name_str;
	}
	/**
     * This function is used for get city name with zone
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_CITY_WITH_ZONE_STR($r)
	{
		$city_with_zone_str="";
		if(isset($r->city_id) && !empty($r->city_id) && \App\AdminCities::where("city_id",$r->city_id)->count()>0)
		{
			$city_with_zone_str = (\App\AdminCities::where("city_id",$r->city_id)->first()->name);
			$city_with_zone_str = rtrim($city_with_zone_str);
		}
		return $city_with_zone_str;
	}
	/**
     * This function is used for get property location
     * @author Hirak
	 * @param $r
	 * @param $full_address
     * @reviewer
     */
	function GET_PROPERTY_LOCATION_STR($r,$full_address=false, $whithout_country_state=false)
	{
		$str = "";
		if($full_address)
		{
			if(isset($r->first_address) && !empty($r->first_address))
			{
				$str .= $r->first_address.", ";
			}
			if(isset($r->second_address) && !empty($r->second_address))
			{
				$str .= $r->second_address.", ";
			}
		}
		if(isset($r->area) && !empty($r->area))
		{
			$str .= $r->area.", ";
		}
		if($full_address)
		{
			if(isset($r->landmark) && !empty($r->landmark))
			{
				$str .= $r->landmark.", ";
			}
		}
		if(isset($r->city_id) && !empty($r->city_id) && \App\AdminCities::where("city_id",$r->city_id)->count()>0)
		{
			$location_direction="";
			if(isset($r->zone) && !empty($r->zone))
			{
				if(\App\AdminFacings::where("facing_id",$r->zone)->where("status","active")->count()>0)
				{
					$location_direction = " ".\App\AdminFacings::where("facing_id",$r->zone)->where("status","active")->first()->title;
				}
			}
			$location_direction = rtrim($location_direction);
			$str .= (\App\AdminCities::where("city_id",$r->city_id)->first()->name).$location_direction.", ";
		}
		if(isset($r->state_id) && !empty($r->state_id) && \App\AdminStates::where("state_id",$r->state_id)->count()>0 && !$whithout_country_state)
		{
			$str .= (\App\AdminStates::where("state_id",$r->state_id)->first()->name).", ";
		}
		if(isset($r->country_id) && !empty($r->country_id) && \App\AdminCountries::where("country_id",$r->country_id)->count()>0 && !$whithout_country_state)
		{
			$str .= (\App\AdminCountries::where("country_id",$r->country_id)->first()->name).", ";
		}
		$str = trim($str,", ");
		return $str;
	}
	/**
     * This function is used for get search property url
     * @author Hirak
	 * @param $r
	 * @param $full_address
     * @reviewer
     */
	function GET_PROPERTY_SEARCH_LOCATION_STR($r)
	{
		$str = "";
		/*if(isset($r->country_id) && !empty($r->country_id) && \App\AdminCountries::where("country_id",$r->country_id)->count()>0)
		{
			$str .= (\App\AdminCountries::where("country_id",$r->country_id)->first()->name)."/";
		}*/
		if(isset($r->city_id) && !empty($r->city_id) && \App\AdminCities::where("city_id",$r->city_id)->count()>0)
		{
			$location_direction="";
			if(isset($r->zone) && !empty($r->zone))
			{
				if(\App\AdminFacings::where("facing_id",$r->zone)->where("status","active")->count()>0)
				{
					$location_direction = " ".\App\AdminFacings::where("facing_id",$r->zone)->where("status","active")->first()->title;
				}
			}
			$location_direction = rtrim($location_direction);
			$str .= (\App\AdminCities::where("city_id",$r->city_id)->first()->name).$location_direction."/";
		}
		if(isset($r->area) && !empty($r->area))
		{
			$str .= $r->area."/";
		}
		$str = trim($str,"/");
		return $str;
	}
	/**
     * This function is used for get property area
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_AREA($r)
	{
		$area = "";
		if($r->area_in == 'square_feet' && !empty($r->square_feet_val))
		{
			$area = convert_to_indian_value_comma($r->square_feet_val)." ".SQFT_KEYWORD();
		}
		else if($r->area_in=='square_yard' && !empty($r->square_yard_val))
		{
			$area = convert_to_indian_value_comma($r->square_yard_val)." ".SQYARD_KEYWORD();
		}
		return $area;
	}
	/**
     * This function is used for get property area per unit
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_AREA_PER_UNIT($r)
	{
		$area = "";
		if($r->area_in == 'square_feet' && !empty($r->square_feet_val))
		{
			$area = convert_to_indian_value_comma(floor($r->selling_price/$r->square_feet_val))." per ".SQFT_KEYWORD();
		}
		else if($r->area_in=='square_yard' && !empty($r->square_yard_val))
		{
			$area = convert_to_indian_value_comma(floor($r->selling_price/$r->square_yard_val))." per ".SQYARD_KEYWORD();
		}
		return $area;
	}
	/**
     * This function is used for get property amenities
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_AMENITY($r)
	{
		$amenity_str = "";
		if(isset($r->amenity_id) && !empty($r->amenity_id))
		{
			$arr_value = unserialize($r->amenity_id);
			if(is_array($arr_value) && count($arr_value)>0)
			{
				foreach($arr_value as $a)
				{
					if(\App\AdminAmenity::where("amenity_id",$a)->where("status","active")->count()>0)
					{
						$amenity_str .= \App\AdminAmenity::where("amenity_id",$a)->where("status","active")->first()->title.", ";
					}
				}
			}
		}
		$amenity_str = trim($amenity_str,", ");
		return $amenity_str;
	}
	/**
     * This function is used for get property features
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_FEATURE($r)
	{
		$feature_str = "";
		if(isset($r->feature_id) && !empty($r->feature_id))
		{
			$arr_value = unserialize($r->feature_id);
			if(is_array($arr_value) && count($arr_value)>0)
			{
				foreach($arr_value as $a)
				{
					if(\App\AdminFeature::where("feature_id",$a)->where("status","active")->count()>0)
					{
						$feature_str .= \App\AdminFeature::where("feature_id",$a)->where("status","active")->first()->title.", ";
					}
				}
			}
		}
		$feature_str = trim($feature_str,", ");
		return $feature_str;
	}
	/**
     * This function is used for get property type
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_TYPE($r)
	{
		$property_type = "";
		if(isset($r->crm_property_id) && !empty($r->crm_property_id))
		{
			if(isset($r->category_id) && !empty($r->category_id))
			{
				//Get the category from the crm
				if(\App\AdminCrmCategory::where("category_id",$r->category_id)->where("status","active")->count()>0)
				{
					$property_type = \App\AdminCrmCategory::select("title")->where("category_id",$r->category_id)->where("status","active")->first()->title;
				}
			}
		}
		else
		{
			if(isset($r->category_id) && !empty($r->category_id))
			{
				if(\App\AdminCategory::where("category_id",$r->category_id)->where("status","active")->count()>0)
				{
					$property_type = \App\AdminCategory::select("title")->where("category_id",$r->category_id)->where("status","active")->first()->title;
				}
			}
		}
		return $property_type;
	}
	/**
     * This function is used for get property facing
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_FACING($r)
	{
		$facing = "";
		if(isset($r->facing_id) && !empty($r->facing_id))
		{
			if(\App\AdminFacings::where("facing_id",$r->facing_id)->where("status","active")->count()>0)
			{
				$facing = \App\AdminFacings::where("facing_id",$r->facing_id)->where("status","active")->first()->title;
			}
		}
		return $facing;
	}
	/**
     * This function is used for get property construction status
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_CONSTRUCTION_STATUS($r)
	{
		$construction_status = "";
		if($r->construction_status=="under_construct")
		{
			$construction_status = "Under Construction";
		}
		else if($r->construction_status=="complete")
		{
			$construction_status = "Ready To Move";
		}
		return $construction_status;
	}
	/**
     * This function is used for get lead require property
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_LEADS_FOR_PROPERTY($r)
	{
		$require_lead = "";
		if(\App\AdminLeads::where('start_limit','<=',$r->selling_price)->where('end_limit','>=',$r->selling_price)->count()>0)
		{
			$require_lead = \App\AdminLeads::where('start_limit','<=',$r->selling_price)->where('end_limit','>=',$r->selling_price)->first()->require_lead;
		}
		return $require_lead;
	}
	/**
     * This function is used for get property builder name
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_PROPERTY_BULDER_NAME($r)
	{
		$builder_name = "";
		if(\App\User::where("user_id",$r->created_by)->count()>0)
		{
			$builder_name = \App\User::where("user_id",$r->created_by)->first()->first_name;
		}
		return $builder_name;
	}
	/**
     * This function is used for get property id from url
     * @author Hirak
	 * @param $url
     * @reviewer
     * @updated Samir
     */
	function GET_PROPERTY_ID_FROM_URL($url)
	{
		$property_id = "";
		if(\App\AdminProperty::where("url",html_entity_decode($url))->count()>0)
		{
			$property_id = \App\AdminProperty::where("url",html_entity_decode($url))->first()->property_id;
		}
		/*if(\App\AdminProperty::where("url",$url)->count()>0)
		{
			$property_id = \App\AdminProperty::where("url",$url)->first()->property_id;
		}*/
		return $property_id;
	}
	/**
     * This function is used for get property rating from $user_id
     * @author Hirak
	 * @param int $user_id
	 * @param int $property_id
     * @reviewer
     */
	function GET_PROPERTY_RATING($user_id=null,$property_id=null)
	{
		$rating = "";
		if(isset($property_id) && !empty($property_id) && isset($user_id) && !empty($user_id))
		{
			
			if(\App\PropertyRatings::where("user_id",$user_id)
									->where("property_id",$property_id)
									->where("status",'active')->count()>0)
			{
				$rating = \App\PropertyRatings::where("user_id",$user_id)
									->where("property_id",$property_id)
									->where("status",'active')->first()->rating;
			}
		}
		else if(isset($property_id) && !empty($property_id))
		{
			if(\App\PropertyRatings::where("property_id",$property_id)
									->where("status",'active')->count()>0)
			{
				$rating = \App\PropertyRatings::select("rating")->where("property_id",$property_id)
									->where("status",'active')->get();
			}
		}
		else if(isset($user_id) && !empty($user_id))
		{
			if(\App\PropertyRatings::where("user_id",$user_id)
									->where("status",'active')->count()>0)
			{
				$rating = \App\PropertyRatings::select("rating")->where("user_id",$user_id)
									->where("status",'active')->get();
			}
		}
		return $rating;
	}
	/**
     * This function is used for get property details from $property_id
     * @author Hirak
	 * @param $value_of_where
	 * @param $field
	 * @param $where_field
     * @reviewer
     */
	function GET_PROPERTY_DETAIL($value_of_where,$field=null,$where_field="property_id")
	{
		if(\App\AdminProperty::where($where_field,$value_of_where)
								->where("status","active")
								->count()>0)
		{
			$r = \App\AdminProperty::where($where_field,$value_of_where)
								->where("status","active")
								->first();
			if(isset($field) && !empty($field) && isset($r->$field) && !empty($r->$field))
			{
				return $r->$field;
			}
			{
				return $r;
			}
		}
		else
		{
			return false;
		}
	}
	/**
     * This function is used for get sqft keyword
     * @author Hirak
     * @reviewer
     */
	function SQFT_KEYWORD()
	{
		return "Sqft";
	}
	/**
     * This function is used for get sqyard keyword
     * @author Hirak
     * @reviewer
     */
	function SQYARD_KEYWORD()
	{
		return "sqyard";
	}
	/**
     * This function is used for create user name from email for front
     * @author Hirak
	 * @param $email
     * @reviewer
     */
	function GENERATE_USERNAME($email=null)
	{
		$username = GENERATE_TOKEN();
		if(isset($email) && !empty($email))
		{
			$arr = explode('@', $email);
			if(isset($arr[0]) && !empty($arr[0]))
			{
				$username = $arr[0];
			}
		}
		return $username;
	}
	/**
     * This function is used for get user rights
     * @author Hirak
     * @reviewer
     */
	function GET_FRONT_USER_RIGHTS()
	{
		$arr = \App\AdminRights::orderBy('title','ASC')
			->where("status","active")
			->where("module","")
			->where(function($query){
				$query->where("title",ADMIN_BUYER_KEYWORD())->orWhere("title",ADMIN_SELLER_KEYWORD());
			})->get();
		return $arr;
	}
	/**
     * This function is used for map minimum zoom
     * @author Hirak
     * @reviewer
     */
	function MAP_MINIMUM_ZOOM()
	{
		return "5";
	}
	/**
     * This function is used for map maximum zoom
     * @author Hirak
     * @reviewer
     */
	function MAP_MAXIMUM_ZOOM()
	{
		return "15";
	}
	/**
     * This function is used for get search page for min to max price range 
     * @author Hirak
     * @reviewer
     */
	function GET_MIN_MAX_PRICE_RANGE()
	{
		$arr = array();
		$min_price  = PROPERTY_MIN_PRICE();
		$max_price  = 22500000;
		$temp 		= 2500000;
		$twenty_lakh= 2000000;
		$fifty_lakh = 5000000;
		$five_lakh 	= 500000;
		$j=0;
		$adder = PROPERTY_MIN_PRICE();
		for($i=PROPERTY_MIN_PRICE();$i<$max_price;)
		{
			if($j==0)
			{
				
			}
			else
			{
				$arr[$j]['ic'] = SITE_INFO('currency').convert_to_indian_value($i);
				$arr[$j]['min'] = $i;
				$arr[$j]['max'] = $i;
				if($i==PROPERTY_MIN_PRICE())
				{
					$adder = PROPERTY_MIN_PRICE()+$twenty_lakh;
				}
				else if($i+$adder>=$max_price)
				{
					$max_value = $i;
				}
				if($i != $temp)
				{
					$i = $i+$adder-PROPERTY_MIN_PRICE();
				}
				else
				{
					$i = $i+$adder;
				}
				if($i>$fifty_lakh)
				{
					$i = $i+$five_lakh;
				}
			}
			$j++;
		}
		$arr[$j]['ic'] = 'Above '.convert_to_indian_value($max_value);
		$arr[$j]['min'] = $max_value;
		$arr[$j]['max'] = PROPERTY_MAX_PRICE();

		return $arr;
	}
	/**
     * This function is used for get search page for min to max price range with parameters
     * @author Parth
     * @reviewer
     */
	function GET_MIN_MAX_PRICE_RANGE_PARAM($min=null,$max=null)
	{
		$min_price  = PROPERTY_MIN_PRICE();
		$max_price  = 22500000;
		$temp 		= 2500000;
		$twenty_lakh= 2000000;
		$fifty_lakh = 5000000;
		$five_lakh 	= 500000;
		if(isset($min) && !empty($min))
		{
			$min_price  = $min;
		}
		if(isset($max) && !empty($max))
		{
			$max_price  = $max;
		}
		
		$arr = array();
		$j=0;
		$adder = $min_price;
		for($i=$min_price;$i<=$max_price;)
		{
			if($j==0)
			{
				
			}
			else
			{
				$arr[$j]['ic'] = SITE_INFO('currency').convert_to_indian_value($i);
				$arr[$j]['min'] = $i;
				$arr[$j]['max'] = $i;
				$arr[$j]['inc'] = $j;
				if($i==$min_price)
				{
					$adder = $min_price+$twenty_lakh;
				}
				else if($i+$adder>=$max_price)
				{
					$max_value = $i;
				}
				if($i != $temp)
				{
					$i = $i+$adder-$min_price;
				}
				else
				{
					$i = $i+$adder;
				}
				if($i>$fifty_lakh)
				{
					$i = $i+$five_lakh;
				}
			}
			$j++;
		}
		/*if(isset($max_value) && !empty($max_value) && !isset($max))
		{
			$arr[$j]['ic'] = 'Above '.convert_to_indian_value($max_value);
			$arr[$j]['min'] = $max_value;
			$arr[$j]['inc'] = $j;
		}
		else
		{*/
			$arr[$j]['ic'] = "";
			$arr[$j]['min'] = "";
			$arr[$j]['inc'] = $j;
		//}
		$arr[$j]['ic'] = 'Above '.convert_to_indian_value($max_value);
		$arr[$j]['max'] = PROPERTY_MAX_PRICE();

		return $arr;
	}
	/**
     * This function is used for check admin rights to access that module
     * @author Hirak
	 * @param $module
     * @reviewer
     */
	function CHECK_ADMIN_RIGHT_TO_ACCESS($module)
	{
		$id = USER_INFO("rights_id");
		$status = USER_INFO("status");
		$rights = unserialize(\App\AdminRights::where("rights_id",$id)->first()->module);
		if (isset($rights) && is_array($rights) && in_array($module,$rights))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/**
     * This function is used for get month array
     * @author Hirak
     * @reviewer
     */
	function GET_MONTH_ARRAY()
	{
		return array('january','february','march','april','may','june','july','august','september','october','november','december');
	}
	/**
     * This function is used for get property age array
     * @author Hirak
     * @reviewer
     */
	function GET_AGE_OF_PROPERTY_ARRAY()
	{
		return array('0_To_2_Years','2_To_5_Years','5_To_10_Years','10_To_15_Years','15_To_20_Years','Above_20_Years');
	}
	/**
     * This function is used for get titles array for name 
     * @author Hirak
     * @reviewer
     */
	function GET_MR_MS_MISS()
	{
		return array('Mr.','Ms.','Mrs.');
	}
	/**
     * This function is used for get minimum lead value
     * @author Hirak
     * @reviewer
     */
	function MINIMUM_LEAD_VALUE()
	{
		return "1";
	}
	/**
     * This function is used for get maximum lead value
     * @author Hirak
     * @reviewer
     */
	function MAXIMUM_LEAD_VALUE()
	{
		return "500";
	}
	/**
     * This function is used for get keyword lac
     * @author Hirak
     * @reviewer
     */
	function LAC_KEYWORD()
	{
		return "(Lakh)";
	}
	/**
     * This function is used for get first name
     * @author Hirak
	 * @param int $user_id
     * @reviewer
     */
	function GET_FIRST_NAME($user_id)
	{
		return \App\User::where('user_id',$user_id)->first()->mr_ms;
	}
	/**
     * This function is used for count searched property
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function SEARCHED_PROPERTY_COUNT($r)
	{
		//SAMIR ADDED 25 OCT 2017
		$previous_URL = \URL::previous();
		$previouse_parse_url = parse_url($previous_URL);
		$get_previouse_parse_url = array();
		if(isset($previouse_parse_url['query']) && !empty($previouse_parse_url['query'])){
			parse_str($previouse_parse_url['query'], $get_previouse_parse_url);
		}
		
		$query = DB::table("property");
		$query->select("property.property_id",
		DB::raw("(CASE WHEN user.rights_id = '10' THEN (CASE WHEN user.status = 'active' THEN 1 ELSE 0 END) ELSE 1 END) AS is_user"));
		$query->leftJoin("user","user.user_id","=","property.user_id");
		$query->having('is_user','=','1');
		$query->where('property.status','!=','sold');
		$query->where('property.review_mail','!=','yes');
		$query->where("property.expiry_date",">=",date("Y-m-d"));
		$query->join("cities","cities.city_id","=","property.city_id");
		//$query->join("countries","countries.country_id","=","property.country_id");
		//$query->leftJoin("facings","facings.facing_id","=","property.zone");
		$query->where(function($query) use ($r, $get_previouse_parse_url){
			if($r->locality_hidden && $r->locality_hidden!="" && ( empty($get_previouse_parse_url['search_url_hidden']) || (isset($get_previouse_parse_url['search_url_hidden']) && !empty($get_previouse_parse_url['search_url_hidden']) && $get_previouse_parse_url['search_url_hidden'] == $r->search_value)) )
			{
				$query->orWhereIn("property.area",EXPLODE_STRING($r->locality_hidden,"LOCALITY_STR_JOINER"));
			}else if($r->search_value!="")
			{
				$query->orWhere(DB::raw("LOWER(property.area)"),strtolower($r->search_value));
				//$query->orWhere(DB::raw('if(property.zone=0,('.DB::raw('cities.name').'),('.DB::raw('CONCAT(cities.name, " ", facings.title)').'))'),strtolower($r->search_value));
				//$query->orWhere(DB::raw('cities.name'),strtolower($r->search_value));
			
				if (\App\AdminCities::where('status','active','name')->where(DB::raw("LOWER(name)"),strtolower($r->search_value))->where('parent_id','0')->count()>0) {
					$arr = \App\AdminCities::where('status','active','name')->where(DB::raw("LOWER(name)"),strtolower($r->search_value))->where('parent_id','0')->first();
					$query->orWhereIn("property.city_id",function($query1) use ($arr){
						$query1->select("city_id")->from(with(new \App\AdminCities)->getTable())->orWhere('parent_id', $arr['city_id'])->orWhere('city_id', $arr['city_id'])->where('status', "active");
					});
				}else{
					$arr = \App\AdminCities::where('status','active','name')->where(DB::raw("LOWER(name)"),strtolower($r->search_value))->first();
					$query->orWhereIn("property.city_id",function($query1) use ($arr){
						$query1->select("city_id")->from(with(new \App\AdminCities)->getTable())->orWhere('parent_id', $arr['city_id'])->orWhere('city_id', $arr['city_id'])->where('status', "active");
					});
				}
				
				//$query->orWhere(DB::raw('countries.name'),strtolower($r->search_value));
				$query->orWhere(DB::raw("LOWER(property.builder_name)"),strtolower($r->search_value));
			} 
		});
		$query->where(function($query){
			//$query->orWhere("property.status","active")->orWhere("property.status","sold");
			$query->where("property.status","active");
		});
		if($r->property_type_hidden && $r->property_type_hidden!="")
		{
			$query->whereIn("property.category_id",EXPLODE_STRING($r->property_type_hidden));
		}
		if($r->construction_status_hidden && $r->construction_status_hidden!="")
		{
			$query->whereIn("property.construction_status",EXPLODE_STRING($r->construction_status_hidden));
		}
		if($r->minimum_value_hidden && $r->minimum_value_hidden!="")
		{
			$query->where("property.selling_price",">=",$r->minimum_value_hidden);
		}
		if($r->maximum_value_hidden && $r->maximum_value_hidden!="")
		{
			$query->where("property.selling_price","<=",$r->maximum_value_hidden);
		}
		$result_count = count($query->get());
		return $result_count;
	}
	/**
     * This function is used for count searched property
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function SEARCHED_PROJECT_COUNT($r,$get_count=true)
	{
		//SAMIR ADDED 25 OCT 2017
		$previous_URL = \URL::previous();
		$previouse_parse_url = parse_url($previous_URL);
		$get_previouse_parse_url = array();
		if(isset($previouse_parse_url['query']) && !empty($previouse_parse_url['query'])){
			parse_str($previouse_parse_url['query'], $get_previouse_parse_url);
		}
		
		$query = DB::table("new_project_launched");
		if($get_count)
		{
			$query->select("new_project_launched.new_project_id");	
		}
		else
		{
			$query->select("new_project_launched.*");	
		}
		$query->where('new_project_launched.status','active');
		$query->join("cities","cities.city_id","=","new_project_launched.city_id");
		$query->join("developer","developer.developer_id","=","new_project_launched.builder_name");
		//$query->leftJoin("facings","facings.facing_id","=","new_project_launched.zone");
		$query->where(function($query) use ($r, $get_previouse_parse_url){
			if($r->locality_hidden && $r->locality_hidden!="")
			{
				$query->orWhereIn("new_project_launched.area",EXPLODE_STRING($r->locality_hidden,"LOCALITY_STR_JOINER"));
			}
			else if($r->search_value!="")
			{
				$query->orWhere(DB::raw("LOWER(developer.title)"),strtolower($r->search_value));
				$query->orWhere(DB::raw("LOWER(new_project_launched.area)"),strtolower($r->search_value));
				//$query->orWhere(DB::raw('if(new_project_launched.zone=0,('.DB::raw('cities.name').'),('.DB::raw('CONCAT(cities.name, " ", facings.title)').'))'),strtolower($r->search_value));
				//$query->orWhere(DB::raw('cities.name'),strtolower($r->search_value));
				if (\App\AdminCities::where('status','active','name')->where(DB::raw("LOWER(name)"),strtolower($r->search_value))->where('parent_id','0')->count()>0) {
					$arr = \App\AdminCities::where('status','active','name')->where(DB::raw("LOWER(name)"),strtolower($r->search_value))->where('parent_id','0')->first();
					$query->orWhereIn("new_project_launched.city_id",function($query1) use ($arr){
						$query1->select("city_id")->from(with(new \App\AdminCities)->getTable())->orWhere('parent_id', $arr['city_id'])->orWhere('city_id', $arr['city_id'])->where('status', "active");
					});
				}else{
					$arr = \App\AdminCities::where('status','active','name')->where(DB::raw("LOWER(name)"),strtolower($r->search_value))->first();
					$query->orWhereIn("new_project_launched.city_id",function($query1) use ($arr){
						$query1->select("city_id")->from(with(new \App\AdminCities)->getTable())->orWhere('parent_id', $arr['city_id'])->orWhere('city_id', $arr['city_id'])->where('status', "active");
					});
				}
			} 
		});
		$query->where(function($query){
			$query->orWhere("new_project_launched.status","active");
		});
		if($r->property_type_hidden && $r->property_type_hidden!="")
		{
			$query->whereIn("new_project_launched.category_id",EXPLODE_STRING($r->property_type_hidden));
		}
		if($r->minimum_value_hidden && $r->minimum_value_hidden!="")
		{
			$query->where("new_project_launched.min_price",">=",$r->minimum_value_hidden);
		}
		if($r->maximum_value_hidden && $r->maximum_value_hidden!="")
		{
			$query->where("new_project_launched.max_price","<=",$r->maximum_value_hidden);
		}
		if(isset($r->min_max_sort_hidden) && $r->min_max_sort_hidden && $r->min_max_sort_hidden!="")
		{
			if($r->min_max_sort_hidden=='asc')
			{
				$query->orderBy("new_project_launched.min_price",'ASC');
			}
			else
			{
				$query->orderBy("new_project_launched.max_price",'DESC');
			}
		}
		else
		{
			$query->orderBy("new_project_launched.created_date",'DESC');
		}
		if($r->construction_status_hidden && $r->construction_status_hidden!="")
		{
			$query->whereIn("new_project_launched.construction_status",EXPLODE_STRING($r->construction_status_hidden));
		}
		if($get_count)
		{
			return count($query->get());
		}
		else
		{
			return $query;
		}
	}
	/**
     * This function is used for get percentage of minimum property discount
     * @author Hirak
     * @reviewer
     */
	function MINIMUM_PROPERTY_DISCOUNT_PERCENTAGE()
	{
		return "10";
	}
	/**
     * This function is get user used leads total
     * @author Hirak
     * @reviewer
     */
	function USER_USED_LEADS_TOTAL()
	{
		$total = "0";
		if(\App\AdminBuyer::where('user_id',USER_INFO('user_id'))->count()>0)
		{
			$total = \App\AdminBuyer::where('user_id',USER_INFO('user_id'))->sum('no_of_leads_use');
		}
		return $total;
	}
	/**
     * This function is used for get discount value
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	function GET_DISCOUNT_VALUE($r)
	{
		$final_value="";
		if(isset($r->average_price) && !empty($r->average_price))
		{
			$discount_value = convert_to_indian_value(($r->average_price)-($r->selling_price));
			$discount	= ($r->average_price)-($r->selling_price);
			$discount_per = ($discount*100)/$r->average_price;
			$discount_per = round($discount_per,2);
			$final_value = $discount_value.' '.'('.$discount_per.'%)';
		}
		return $final_value;
	}
	/**
     * This function is used for get subscription plan title
     * @author Hirak
	 * @param $subscription_data
     * @reviewer
     */
	function GET_SUBSCRIPTION_PLAN_TITLE($subscription_data)
	{
		return $subscription_data->title." @ ".convert_to_indian_value_comma($subscription_data->amount)."/- ".trans('lang_data.for')." ".($subscription_data->no_of_months/12).(($subscription_data->no_of_months/12 <= 1)?" ".trans('lang_data.year'):" ".trans('lang_data.years'));
	}
	/**
     * This function is generate transaction id
     * @author Hirak
     * @reviewer
     */
	function GENERATE_TRANSACTION_ID()
	{
		return strtoupper(substr(date('M'),1,1).date('y').substr(date('M'),0,1).time().substr(date('a'),1,1));exit;
	}
	/**
     * This function is add image class
     * @author Hirak
	 * @param $path
     * @reviewer
     */
	function add_image_class_if_is_image($path)
	{
		$file_data = pathinfo($path);
		if(isset($file_data['extension']) && ($file_data['extension']=='jpeg' || $file_data['extension']=='jpg' || $file_data['extension']=='png'))
		{
			return "single_image_popup";
		}
	}
	/**
     * This function is used for count users right
     * @author Hirak
	 * @param int $rights_id
     * @reviewer
     */
	function GET_COUNT_FOR_USER($rights_id)
	{

		   $rights = \App\AdminRights::where('rights_id',$rights_id)->first();
		   $count = \App\User::where('status','inactive')->where('rights_id',$rights->rights_id)->count();
		   return $count;
		 
	}
	/**
     * This function is used for get track details
     * @author Hirak
	 * @param int $user_id
	 * @param $property_url
	 * @param int $count_only
     * @reviewer
     */
	function GET_TRACK_DETAILS($user_id=null,$property_url=null,$count_only=null)
	{
		$query = DB::table('user_track');
		$query->select("user_track_id","user_id","ip_address","url","from_url","created_date","updated_date","created_by","last_updated_by",DB::raw("DATE(created_date) DateOnly"),DB::raw('count(*) as total'));
		if(isset($user_id) && !empty($user_id))
		{
			$query->where('user_id',$user_id);
			$query->groupBy('DateOnly');
			$query->groupBy('url');
		}
		if(isset($property_url) && !empty($property_url))
		{
			//$query->where('url','like','/property/'.$property_url);
			$query->where('url','like',$property_url);
			$query->groupBy('url');
		}
		else
		{
			$query->where('url','like','/property/'.'%');
		}
		if(isset($count_only) && !empty($count_only))
		{
			$result = $query->count();
		}
		else
		{
			$result = $query->get();
		}
		return $result;
	}
	/**
     * This function is used for hand hold services
     * @author Hirak
     * @reviewer
     */
	function not_avail_of_hand_hold_service()
	{
		$return_value=true;
		if(\App\AdminProperty::where('user_id',USER_INFO('user_id'))->count()==0)
		{
			$return_value = false;
		}
		if(\App\AdminProperty::where('user_id',USER_INFO('user_id'))->where('hand_hold_property','yes')->count()>0)
		{
			$return_value = false;
		}
		if(\App\AdminBuyer::where('user_id',USER_INFO('user_id'))->where('hand_hold_property','yes')->count() >0)
		{
			$return_value = false;
		}
		if(\App\AdminBuyer::where('user_id',USER_INFO('user_id'))->where('hand_hold_property','yes')->count()>0)
		{
			$return_value = false;
		}
		return $return_value;
	}
	/**
     * This function is used for get features
     * @author Hirak
     * @reviewer
     */
	function get_feature()
	{
		$floor = range(1,10);
		$total_floor = array_combine(range(1,100), range(1,100));
		return [
			"Commercial Shop & Showroom"=>[
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				],
				"Floor"=>$total_floor,
				"Total Floor"=>$total_floor
			],
			"Offices"=>[
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				],
				"Floor"=>$total_floor,
				"Total Floor"=>$total_floor
			],
			"Bunglow/Tenament/Row-House"=>[
				"Bedrooms"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3",
					"4"=>"4",
					"5"=>"5",
					"6"=>"6",
					"7"=>"7"
				],
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				]
			],
			"Apartment/Flat"=>[
				"Bedrooms"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3",
					"4"=>"4",
					"5"=>"5",
					"6"=>"6",
					"7"=>"7"
				],
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Floor"=>$total_floor,
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				],
				"Total Floor"=>$total_floor,
			],
		];
	}
	/**
     * This function is used for get features
     * @author Hirak
     * @reviewer
     */
	function get_feature_new_project()
	{
		$floor = range(1,10);
		$total_floor = array_combine(range(1,100), range(1,100));
		return [
			"Commercial Shop & Showroom"=>[
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				],
				"Total Floor"=>$total_floor,
			],
			"Offices"=>[
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				],
				"Total Floor"=>$total_floor,
			],
			"Bunglow/Tenament/Row-House"=>[
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				]
			],
			"Apartment/Flat"=>[
				"Car Parking"=>[
					"1"=>"1",
					"2"=>"2",
					"3"=>"3"
				],
				"Total Floor"=>$total_floor,
				"Furnished Status"=>[
					"1"=>"Furnished",
					"2"=>"Semi Furnished",
					"3"=>"Unfurnished"
				],
			],
		];
	}
	/**
     * This function is used for payu settings
     * @author Hirak
     * @reviewer
     */
	function PAYU_SETTINGS()
	{
		// Merchant key here as provided by Payu
		//$pay['MERCHANT_KEY'] = "gtKFFx"; //Please change this value with live key for production
		$pay['MERCHANT_KEY'] = "wI066Y"; //LIVE
		$pay['hash_string'] = '';
		// Merchant Salt as provided by Payu
		//$pay['SALT'] = "eCwWELxi"; //Please change this value with live salt for production
		$pay['SALT'] = "0sMmFZdR"; //LIVE

		// End point - change to https://secure.payu.in for LIVE mode
		//$pay['PAYU_BASE_URL'] = "https://test.payu.in";
		$pay['PAYU_BASE_URL'] = "https://secure.payu.in";//LIVE
		$pay['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		return $pay;
	}
	/**
     * This function is used for get package type
     * @author Parth
     * @reviewer
     */
	function GET_PACKAGE_DATA($id=null)
	{
		$arr = array();
		if(isset($id) && !empty($id)){
			$arr = \App\PackageType::where("status","active")->where('package_type_id',$id)->first();
		}else{
			$arr = \App\PackageType::where("status","active")->get();
		}
		return $arr;
	}
	/**
     * This function is used for minimum price for residential
     * @author Parth
     * @reviewer
     */
	function MIN_RESIDEN_PRICE_MY_PREFERENCE()
	{
		return 500000;
	}
	/**
     * This function is used for minimum price for commercial
     * @author Parth
     * @reviewer
     */
	function MIN_COMMER_PRICE_MY_PREFERENCE()
	{
		return 500000;
	}
	/**
     * This function is used for get primium user value
     * @author Parth
     * @reviewer
     */
	function PRIMIUM_VALUE()
	{
		return 'Premium';
	}
	/**
     * This function is used for get car parking keyword
     * @author Parth
     * @reviewer
     */
	function KEYWORK_CAR_PARKING()
	{
		return 'Car Parking';
	}
	/**
     * This function is used for get ready to move keyword
     * @author Parth
     * @reviewer
     */
	function KEYWORD_READY_TO_MOVE()
	{
		return 'Ready To Move';
	}
	/**
     * This function is used for get bedroom keyword
     * @author Parth
     * @reviewer
     */
	function KEYWORD_BEDROOMS()
	{
		return 'Bedrooms';
	}
	/**
     * This function is used for get Furnished Status keyword
     * @author Parth
     * @reviewer
     */
	function KEYWORD_FURNISHED_STATUS()
	{
		return 'Furnished Status';
	}
	/**
     * This function is used for get ordinal suffix
     * @author Samir
     * @reviewer
     */
	function ordinal($number) {
		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
		if ((($number % 100) >= 11) && (($number%100) <= 13))
			return $number. 'th';
		else
			return $number. $ends[$number % 10];
	}
	/**
     * This function is used for get pagination number for agent list page
     * @author Parth
     * @reviewer
     */
	function AGENT_PAGINATION_NUMBER()
	{
		return '8';
	}
	/**
     * This function is used for get pagination number for review of property
     * @author Parth
     * @reviewer
     */
	function PROPERTY_REVIEW_PAGINATION_NUMBER()
	{
		return '8';
	}
	
	/**
     * This function is used for property URL
     * @author Samir
	 * @param $r
	 * @param $full_address
     * @reviewer
     */
	function GET_PROPERTY_URL($r,$encrypted_id=true)
	{
		$url_city = "";
		if($r->city_id && (\App\AdminCities::where("city_id",$r->city_id)->count()) >0)
		{
			$url_city .= (\App\AdminCities::where("city_id",$r->city_id)->first()->name);
		}
		
		$property_type = "";
		if($r->category_id)
		{
			if(\App\AdminCategory::where("category_id",$r->category_id)->where("status","active")->count()>0)
			{
				$property_type = \App\AdminCategory::select("title")->where("category_id",$r->category_id)->where("status","active")->first()->title;
			}
		}
		$property_id = "";
		if($r->property_id)
		{
			if($encrypted_id)
			{
				$property_id = "/".Crypt::decrypt($r->property_id);
			}
			else
			{
				$property_id = "/".$r->property_id;
			}
		}
		$url = GET_DASHED_URL($url_city)."-".str_replace("/", "-", GET_DASHED_URL($property_type))."/".GET_DASHED_URL($r->area).$property_id;
		return $url;
	}
	
	/**
     * This function is used for get property URL
     * @author Samir
	 * @param $r
	 * @param $property_id
     * @reviewer
     */
	function GET_PROPERTY_URL_FROM_ID($property_id)
	{
		$url = "";
		if(\App\AdminProperty::where('property_id',$property_id)->where("expiry_date",">=",date("Y-m-d"))->where('status','active')->count()>0)
		{
			$property_info = \App\AdminProperty::where('property_id',$property_id)->where("expiry_date",">=",date("Y-m-d"))->where('status','active')->first()->url;
			$url = $property_info;
		}
		return $url;
	}
	/**
     * This function is used for get credit from expected value
     * @author Parth
	 * @param $price
     * @reviewer
     */
	function GET_CREADIT_FROM_ENTERED_EXPECTED_VALUE($price=null)
	{
		if(isset($price) && !empty($price) && $price <= 5000000)
		{
			$credit = 2;
		}
		elseif(isset($price) && !empty($price) && $price > 5000000)
		{
			$credit = 5;
		}
		return $credit;
	}
	/**
     * This function is used for return rera url
     * @author Parth
     * @reviewer
     */
	function RERA_URL()
	{
		return 'http://reraera.com/demo/';
	}
	/**
     * This function is used for return agent url
     * @author Parth
	 * @param $first_name,$service_provider,$user_id
     * @reviewer
     */
	function CREATE_AGENT_USER_URL($first_name,$service_provider,$user_id)
	{
		$url = 'agents/'.str_replace(' ','-',strtolower($first_name)).'-'.str_replace(' ','-',strtolower($service_provider)).'/'.Crypt::decrypt($user_id);
		return $url;
	}
	
	
	//=========== REPORT ===============
	
	/**
     * This function is used for return report data for category
     * @author Parth
     * @reviewer
     */
	function GET_DATA_FOR_REPORT_CATEGORY()
	{
		$category = \App\AdminCategory::where("parent_id","0")->where("status","active")->get();
		return $category;
	}
	/**
     * This function is used for return report data for amenity
     * @author Parth
     * @param $type,$category_id
     * @reviewer
     */
	function GET_DATA_FOR_REPORT_AMENITY($type=null,$category_id=null)
	{
		if(isset($category_id) && !empty($category_id))
		{
			$amenity = \App\AdminAmenity::where("category_id",$category_id)->where('status','active')->get();
			return $amenity;
		}
		else
		{
			$category = \App\AdminAmenity::where('status','active')->get();
			return $category;
		}
	}
	/**
     * This function is used for return report data for country
     * @author Parth
     * @param $country_id,$state_id
     * @reviewer
     */
	function GET_DATA_FOR_REPORT_COUNTRY($country_id=null,$state_id=null)
	{
		if(isset($country_id) && !empty($country_id))
		{
			$state = \App\AdminStates::where('country_id',$country_id)->where('status','active')->get();
			return $state;
		}
		elseif(isset($state_id) && !empty($state_id))
		{
			$city = \App\AdminCities::where('state_id',$state_id)->where('status','active')->get();
			return $city;
		}
		else
		{
			$country = \App\AdminCountries::where('status','active')->get();
			return $country;
		}
	}
	/**
     * This function is used for get min to max price range for report
     * @author Parth
     * @reviewer
     */
	function GET_MIN_MAX_PRICE_RANGE_FOR_REPORT($min=null,$max=null)
	{
		$min_price  = PROPERTY_MIN_PRICE();
		$max_price  = 22500000;
		$temp 		= 2500000;
		$twenty_lakh= 2000000;
		$fifty_lakh = 5000000;
		$five_lakh 	= 500000;
		if(isset($min) && !empty($min))
		{
			$min_price  = $min;
		}
		if(isset($max) && !empty($max))
		{
			$max_price  = $max;
		}
		
		$arr = array();
		$j=0;
		$adder = $min_price;
		for($i=$min_price;$i<=$max_price;)
		{
			if($j==0)
			{
				
			}
			else
			{
				$arr[$j]['ic'] = SITE_INFO('currency').convert_to_indian_value($i);
				$arr[$j]['min'] = $i;
				$arr[$j]['max'] = $i;
				if($i==$min_price)
				{
					$adder = $min_price+$twenty_lakh;
				}
				else if($i+$adder>=$max_price)
				{
					$max_value = $i;
				}
				if($i != $temp)
				{
					$i = $i+$adder-$min_price;
				}
				else
				{
					$i = $i+$adder;
				}
				if($i>$fifty_lakh)
				{
					$i = $i+$five_lakh;
				}
			}
			$j++;
		}
		if(isset($max_value) && !empty($max_value) && !isset($max))
		{
			$arr[$j]['ic'] = 'Above '.convert_to_indian_value($max_value);
			$arr[$j]['min'] = $max_value;
		}
		else
		{
			$arr[$j]['ic'] = "";
			$arr[$j]['min'] = "";
		}
		$arr[$j]['max'] = PROPERTY_MAX_PRICE();

		return $arr;
	}
	/**
     * This function is used for get property age array for report
     * @author Parth
     * @reviewer
     */
	function GET_AGE_OF_PROPERTY_ARRAY_REPORT()
	{
		return array('0_To_2_Years','2_To_5_Years','5_To_10_Years','10_To_15_Years','15_To_20_Years','Above_20_Years');
	}
	/**
     * This function is used for get user type for report
     * @author Parth
     * @reviewer
     */
	function GET_USER_TYPE_ARRAY_REPORT()
	{
		//return array('Seller','Agent');
		$arr = array();
		$arr = \App\AdminRights::orderBy('rights_id','DESC')->where("status","active")->where("module","")->get();
		return $arr;
	}
	/**
     * This function is used for get user type for report
     * @author Parth
     * @reviewer
     */
	function GET_USER_TYPE_ARRAY_PROPERTY_REPORT()
	{
		//return array('Seller','Agent');
		$arr = array();
		$arr = \App\AdminRights::orderBy('rights_id','DESC')->where("status","active")->where("module","")->whereIn("title",array('sellers','buyers','preferred_agents'))->get();
		return $arr;
	}
	/**
     * This function is used for get construction status
     * @author Parth
     * @reviewer
     */
	function GET_CONSTRUCTION_STATUS_REPORT()
	{
		return array('under_construct','complete');
	}
	/**
     * This function is used for get message page pagination limit
     * @author Parth
     * @reviewer
     */
	function PAGINATION_LIMIT_MESSAGE_MODULE()
	{
		return 10;
	}
	/**
     * This function is used for get cms page name
     * @author Parth
     * @reviewer
     */
	function CMS_PAGE_WHAT_IS_COVERD()
	{
		return 'WHAT IS COVERED?';
	}
	/**
     * This function is used for get cms page name
     * @author Parth
     * @reviewer
     */
	function CMS_PAGE_PREFERRED_HAND_HOLDING()
	{
		return 'PREFERRED HAND HOLDING SERVICE PROVIDERS';
	}
	/**
     * This function is used for get cms page name
     * @author Parth
     * @reviewer
     */
	function CMS_PAGE_HOW_EVALUE_BRICKS_WORK()
	{
		return 'HOW EVALUE BRICKS WORK?';
	}
	/**
	 * Function for print data on screen and exit with flag
	 * @author : Parth
	 * @reviewer
	 */
    function pre($data, $isExit = false) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if (!$isExit) {
            exit;
        }

    }
	/**
	 * Function for change the hand hold user title to rights user
	 * @author : Parth
	 * @reviewer
	 */
    function GET_RIGHTS_TITLE_FROM_SECONDERY_HAND_HOLD($title)
	{
		if($title == ADMIN_AGENT_KEYWORD())
		{
			$rights_title = ADMIN_PREFERRED_AGENT_KEYWORD();
		}
		elseif($title == PROPERTY_LAWYERS_KEYWORD())
		{
			$rights_title = ADMIN_LAWYER_KEYWORD();
		}
		elseif($title == PROPERTY_VALUER_KEYWORD())
		{
			$rights_title = ADMIN_VALUER_KEYWORD();
		}
		elseif($title == FINANCIAL_CONSULTANT_KEYWORD())
		{
			$rights_title = ADMIN_CA_KEYWORD();
		}
		elseif($title == FACILITY_MANAGEMENT_SERVICE_KEYWORD())
		{
			$rights_title = ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD();
		}
		elseif($title == INTERIOR_AGENCY_KEYWORD())
		{
			$rights_title = ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD();
		}
		elseif($title == VAASTU_EXPERT_KEYWORD())
		{
			$rights_title = ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD();
		}
		return $rights_title;
	}
	/**
     * This function is used for get lattitude and longitude from address
     * @author Parth
     * @reviewer
     */
	function getLatLong($address){
		if(!empty($address)){
			//Formatted address
			$formattedAddr = str_replace(' ','+',$address);
			//Send request and receive json data by address
			$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
			$output = json_decode($geocodeFromAddr);
			if(isset($output) && !empty($output)){
				//Get latitude and longitute from json data
				$data['latitude']  = $output->results[0]->geometry->location->lat; 
				$data['longitude'] = $output->results[0]->geometry->location->lng;
				//Return latitude and longitude of the given address
				if(!empty($data)){
					return $data;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;   
		}
	}
	/**
	 * Generate suggestion array
	 * @author Hirak
	 */
	function generate_suggestion_arr($param=array())
	{
		$suggetion_arr = array();
		$suggestion_index = 0;						
		$top_area_suggestion_q = \App\AdminProperty::select(DB::raw("TRIM(area) as area"),DB::raw("COUNT(*) as top_area"),DB::raw("TRIM(cities.name) as city_name"),DB::raw("TRIM(countries.name) as country_name"))
								->join("cities","cities.city_id","=","property.city_id")
								->join("countries","countries.country_id","=","property.country_id")
								->orderBy("property.created_date",'DESC')
								->orderBy("top_area","DESC")
								->where("property.expiry_date",">=",date("Y-m-d"))
								->orderBy("area","ASC")
								->groupBy("area")
								->where('property.status','active');
		if(isset($param['city_id']) && !empty($param['city_id']))
		{
			$top_area_suggestion_q->where('property.city_id',$param['city_id']);
		}						
		$top_area_suggestion = $top_area_suggestion_q->get();
		foreach($top_area_suggestion as $t)
		{
			$suggetion_arr[$suggestion_index]['text'] = ucwords($t->area.', '.$t->city_name);
			$suggetion_arr[$suggestion_index]['label'] = ucwords($t->area);
			$suggetion_arr[$suggestion_index]['value'] = $t->city_name.'/'.$t->area;
			$suggetion_arr[$suggestion_index]['type'] = 'area';
			$suggetion_arr[$suggestion_index]['zone'] = '';
			$suggetion_arr[$suggestion_index]['city'] = '';
			$suggestion_index++;
		}
		/*$top_city_suggestion_q = \App\AdminProperty::select(DB::raw('IF(property.zone=0,('.DB::raw('cities.name').'),('.DB::raw('CONCAT(cities.name, " ", facings.title)').')) AS city_name'),
								DB::raw('cities.name AS city_simple'),
								DB::raw("COUNT(*) as top_city"),
								DB::raw("TRIM(countries.name) as country_name"),
								'facings.facing_id as facing_id',
								'cities.city_id as main_city_id'
								)
								->join("cities","cities.city_id","=","property.city_id")
								->join("countries","countries.country_id","=","property.country_id")
								->leftJoin("facings","facings.facing_id","=","property.zone")
								->orderBy("top_city","DESC")
								->where("property.expiry_date",">=",date("Y-m-d"))
								->orderBy("city_name","ASC")
								->where('property.status','active')
								->groupBy("city_name");
		if(isset($param['city_id']) && !empty($param['city_id']))
		{
			$top_city_suggestion_q->where('property.city_id',$param['city_id']);
		}	
		$top_city_suggestion = $top_city_suggestion_q->get();
		foreach($top_city_suggestion as $t)
		{
			$suggetion_arr[$suggestion_index]['text'] = ucwords($t->city_name);
			$suggetion_arr[$suggestion_index]['label'] = ucwords($t->city_name);
			$suggetion_arr[$suggestion_index]['value'] = $t->city_name;
			$suggetion_arr[$suggestion_index]['type'] = 'city';
			$suggetion_arr[$suggestion_index]['zone'] = $t->facing_id;
			$suggetion_arr[$suggestion_index]['city'] = $t->main_city_id;
			$suggestion_index++;
			$suggetion_arr[$suggestion_index]['text'] = ucwords($t->city_simple);
			$suggetion_arr[$suggestion_index]['label'] = ucwords($t->city_simple);
			$suggetion_arr[$suggestion_index]['value'] = $t->city_simple;
			$suggetion_arr[$suggestion_index]['type'] = 'city';
			$suggetion_arr[$suggestion_index]['zone'] = '';
			$suggetion_arr[$suggestion_index]['city'] = $t->main_city_id;
			$suggestion_index++;
		}*/
		$top_city_suggestion_q = \App\AdminProperty::select(DB::raw('cities.name AS city_name'),
								DB::raw('cities.name AS city_simple'),
								DB::raw("COUNT(*) as top_city"),
								DB::raw("TRIM(countries.name) as country_name"),
								'cities.city_id as main_city_id'
								)
								->join("cities","cities.city_id","=","property.city_id")
								->join("countries","countries.country_id","=","property.country_id")
								->orderBy("top_city","DESC")
								->where("property.expiry_date",">=",date("Y-m-d"))
								->orderBy("city_name","ASC")
								->where('property.status','active')
								->groupBy("city_name");
		if(isset($param['city_id']) && !empty($param['city_id']))
		{
			$top_city_suggestion_q->where('property.city_id',$param['city_id']);
		}	
		$top_city_suggestion = $top_city_suggestion_q->get();
		foreach($top_city_suggestion as $t)
		{
			$suggetion_arr[$suggestion_index]['text'] = ucwords($t->city_simple);
			$suggetion_arr[$suggestion_index]['label'] = ucwords($t->city_simple);
			$suggetion_arr[$suggestion_index]['value'] = $t->city_simple;
			$suggetion_arr[$suggestion_index]['type'] = 'city';
			$suggetion_arr[$suggestion_index]['zone'] = '';
			$suggetion_arr[$suggestion_index]['city'] = $t->main_city_id;
			$suggestion_index++;
		}
		
		//New project developer suggestion
		$developers_suggestion_q = \App\AdminNewproject::where('new_project_launched.status','active')
					->select('developer.title')
					->join('developer','developer.developer_id','=','new_project_launched.builder_name')
					->where('developer.status','active')
					->where('new_project_launched.status','active')
					->groupBy('new_project_launched.builder_name');
		if(isset($param['city_id']) && !empty($param['city_id']))
		{
			$developers_suggestion_q->where('new_project_launched.city_id',$param['city_id']);
		}	
		$developers_suggestion = $developers_suggestion_q->get();
		foreach($developers_suggestion as $b)
		{
			$suggetion_arr[$suggestion_index]['text'] = ucwords($b->title);
			$suggetion_arr[$suggestion_index]['label'] = ucwords($b->title);
			$suggetion_arr[$suggestion_index]['value'] = $b->title;
			$suggetion_arr[$suggestion_index]['type'] = 'builder';
			$suggetion_arr[$suggestion_index]['zone'] = '';
			$suggetion_arr[$suggestion_index]['city'] = '';
			$suggestion_index++;
		}	
		//New project developer suggestion

		if(!empty($suggetion_arr))
		{
			$suggetion_arr = array_map("unserialize", array_unique(array_map("serialize", $suggetion_arr)));
		}							
		return $suggetion_arr;
	}
	/**
	 * Print search property form
	 * @author Hirak
	 */
	function PRINT_SEARCH_PROPERTY_FORM($index=NULL, $city=NULL)
	{
		$action_form = SITE_URL().'/property-for-sale';
		$placeholder = trans('lang_data.input_yr_prefered_loc');
		$html =  
		'<form name="search_property" id="search_property'.$index.'" action="'.$action_form.'" method="GET">
			<div class="search_box">
				<input type="text" autocomplete="search_value" list="mylist" name="search_value" id="search_value'.$index.'" placeholder="'.$placeholder.'" >
				<input type="hidden" id="search_url_hidden'.$index.'" name="search_url_hidden" value="">
				<datalist id="mylist" style="display: none;">';
				if(isset($city) && !empty($city)){
					foreach(generate_suggestion_arr(['city_id'=>$city]) as $v_arr)
					{
						$html .= '<option value="'.trim($v_arr['value']).'" data-rel="'.trim($v_arr['label']).'">'.trim($v_arr['label']).'</option>';
					}
				}else{
					foreach(generate_suggestion_arr() as $v_arr)
					{
						$html .= '<option value="'.trim($v_arr['value']).'" data-rel="'.trim($v_arr['label']).'">'.trim($v_arr['label']).'</option>';
					}
				}
				$html .= '
				</datalist>
				<button type="submit" value="" id="submit_search">Search</button>
				<div id="search_value_error" style="display:none"><label>'.trans('lang_data.search_value_error').'</label></div>
			</div>
		</form>';
		echo $html;
	}
	function get_evalue_property_category_list($child=false)
	{
		//=====PARENT CATEGORY LISTING
		$parent_property_category = \App\AdminCategory::select("category.category_id","category.parent_id","category.title","category.display_order","category.status")->where("category.status","active")
										->where("category.parent_id",($child?'!=':''),"0")
										->orderBy("created_date",'DESC')
										->orderBy("category.title","ASC")
										->groupBy("category.category_id")
										->get();
		return 	$parent_property_category;						
		//=====PARENT CATEGORY LISTING
	}
	/**
	* Get user id list to send users
	* @author Hirak
	* @return Array of user id to send messages
	*/
	function message_to_users()
	{
		$users_list = array();
		$spp = 0;
		$your_contact_owners = \App\AdminBuyer::select('p.user_id', 'p.property_id')
								->join('property as p','p.property_id','=','buyers.property_id')
								->where("buyers.user_id",USER_INFO("user_id"))
								->where('buyers.property_id','!=','0')
								->where('p.status','active')
								->where('p.expiry_date',">=",date("Y-m-d"))
								->get();


		foreach($your_contact_owners as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$my_property_contacts = \App\AdminBuyer::select('buyers.user_id', 'buyers.property_id')
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.user_id',USER_INFO("user_id"))
				->where('property.status','active')->get();
		foreach($my_property_contacts as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}		
		$buy_leads = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.agent_accept','yes')
				->where("buyers.agent_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$buy_leads_consultant = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.consultant_accept','yes')
				->where("buyers.consultant_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads_consultant as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$buy_leads_advocate = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.advocat_accept','yes')
				->where("buyers.advocat_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads_advocate as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$buy_leads_valuer = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.valuer_accept','yes')
				->where("buyers.valuer_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads_valuer as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$buy_leads_vaastu_expert = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.vaastu_expert_accept','yes')
				->where("buyers.vaastu_expert_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads_vaastu_expert as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$buy_leads_interior_agency = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.interior_agency_accept','yes')
				->where("buyers.interior_agency_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads_interior_agency as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$buy_leads_house_maintenance_agency = \App\AdminBuyer::where("buyers.status","active")
				->select("buyers.user_id", "buyers.property_id")
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where('buyers.house_maintenance_agency_accept','yes')
				->where("buyers.house_maintenance_agency_id",USER_INFO("user_id"))
				->get();
		foreach($buy_leads_house_maintenance_agency as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$selectable_columns = [
			"buyers.property_id",
			"buyers.agent_id",
			"buyers.consultant_id",
			"buyers.advocat_id",
			"buyers.valuer_id",
			"buyers.vaastu_expert_id",
			"buyers.interior_agency_id",
			"buyers.house_maintenance_agency_id",
			"buyers.agent_accept",
			"buyers.consultant_accept",
			"buyers.advocat_accept",
			"buyers.valuer_accept",
			"buyers.vaastu_expert_accept",
			"buyers.interior_agency_accept",
			"buyers.house_maintenance_agency_accept",
		];
		$buy_secondary_user = \App\AdminBuyer::where("buyers.status","active")
				->select($selectable_columns)
				->join('property','property.property_id','=','buyers.property_id')
				->where('property.status','!=','delete')
				->where('buyers.hand_hold_property','yes')
				->where("buyers.user_id",USER_INFO("user_id"))
				->get();
		foreach($buy_secondary_user as $u)
		{
			if(!empty($u->agent_id) && $u->agent_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->agent_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->consultant_id) && $u->consultant_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->consultant_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->advocat_id) && $u->advocat_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->advocat_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->valuer_id) && $u->valuer_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->valuer_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->vaastu_expert_id) && $u->vaastu_expert_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->vaastu_expert_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->interior_agency_id) && $u->interior_agency_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->interior_agency_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->house_maintenance_agency_id) && $u->house_maintenance_agency_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->house_maintenance_agency_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
		}
		$sell_leads = \App\AdminProperty::select('user_id', 'property_id')->where("agent_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('agent_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$sell_leads_consultant = \App\AdminProperty::select('user_id', 'property_id')->where("consultant_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('consultant_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads_consultant as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$sell_leads_advocat = \App\AdminProperty::select('user_id', 'property_id')->where("advocat_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('advocat_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads_advocat as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$sell_leads_value = \App\AdminProperty::select('user_id', 'property_id')->where("valuer_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('valuer_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads_value as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$sell_leads_vaastu_expert = \App\AdminProperty::select('user_id', 'property_id')->where("vaastu_expert_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('vaastu_expert_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads_value as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$sell_leads_interior_agency = \App\AdminProperty::select('user_id', 'property_id')->where("interior_agency_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('interior_agency_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads_value as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$sell_leads_house_maintenance_agency = \App\AdminProperty::select('user_id', 'property_id')->where("house_maintenance_agency_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('house_maintenance_agency_accept','yes')->where('status','!=','delete')->get();
		foreach($sell_leads_value as $u)
		{
			$users_list[$spp]['user_id'] = $u->user_id;
			$users_list[$spp]['property_id'] = $u->property_id;
			$spp++;
		}
		$selectable_columns = [
			"property_id",
			"agent_id",
			"consultant_id",
			"advocat_id",
			"valuer_id",
			"vaastu_expert_id",
			"interior_agency_id",
			"house_maintenance_agency_id",
			"agent_accept",
			"consultant_accept",
			"advocat_accept",
			"valuer_accept",
			"vaastu_expert_accept",
			"interior_agency_accept",
			"house_maintenance_agency_accept",
		];
		$sell_secondary_user = \App\AdminProperty::select($selectable_columns)->where("user_id",USER_INFO("user_id"))->where('hand_hold_property','yes')->where('status','!=','delete')->get();
		foreach($sell_secondary_user as $u)
		{
			if(!empty($u->agent_id) && $u->agent_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->agent_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->consultant_id) && $u->consultant_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->consultant_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->advocat_id) && $u->advocat_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->advocat_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->valuer_id) && $u->valuer_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->valuer_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->vaastu_expert_id) && $u->vaastu_expert_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->vaastu_expert_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->interior_agency_id) && $u->interior_agency_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->interior_agency_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
			if(!empty($u->house_maintenance_agency_id) && $u->house_maintenance_agency_accept=='yes')
			{
				$users_list[$spp]['user_id'] = $u->house_maintenance_agency_id;
				$users_list[$spp]['property_id'] = $u->property_id;
				$spp++;
			}
		}
		
		$users_list = array_map("unserialize", array_unique(array_map("serialize", $users_list)));

		/* get the unique user's properties details */
		$user_unique_property_list = array();
		if(!empty($users_list)){
			foreach ($users_list as $key => $value) {
				$user_unique_property_list[$value['user_id']][] = $value['property_id'];
			}
		}

		return $user_unique_property_list;
	}
	/**
	 * get_handholding_user_type_arr
	 * @return array of handholding users in the system.
	 */
	function get_handholding_user_type_arr()
	{
		return[
			'agent_id'=>[
				'multiple'=>ADMIN_PREFERRED_AGENT_KEYWORD(),
				'single'=>ADMIN_PREFERRED_AGENT_KEYWORD_SINGULAR(),
				'date_field'=>'agent_add_date',
				'tab_val'=>'agents',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id,
				'cms_name'=>ADMIN_AGENT_KEYWORD(),
			],
			'consultant_id'=>[
				'multiple'=>ADMIN_CA_KEYWORD(),
				'single'=>ADMIN_CA_KEYWORD_SINGULAR(),
				'date_field'=>'consultant_add_date',
				'tab_val'=>'consultants',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_CA_KEYWORD())->first()->rights_id,
				'cms_name'=>FINANCIAL_CONSULTANT_KEYWORD(),
			],
			'advocat_id'=>[
				'multiple'=>ADMIN_LAWYER_KEYWORD(),
				'single'=>ADMIN_LAWYER_KEYWORD_SINGULAR(),
				'date_field'=>'advocat_add_date',
				'tab_val'=>'lawyers',
				//'tab_val'=>'advocates',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_LAWYER_KEYWORD())->first()->rights_id,
				'cms_name'=>PROPERTY_LAWYERS_KEYWORD(),
			],
			'valuer_id'=>[
				'multiple'=>ADMIN_VALUER_KEYWORD(),
				'single'=>ADMIN_VALUER_KEYWORD_SINGULAR(),
				'date_field'=>'valuer_add_date',
				'tab_val'=>'valuers',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_VALUER_KEYWORD())->first()->rights_id,
				'cms_name'=>PROPERTY_VALUER_KEYWORD(),
			],
			'vaastu_expert_id'=>[
				'multiple'=>ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD(),
				'single'=>ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD_SINGULAR(),
				'date_field'=>'vaastu_expert_add_date',
				'tab_val'=>'vaastu_experts',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD())->first()->rights_id,
				'cms_name'=>VAASTU_EXPERT_KEYWORD(),
			],
			'interior_agency_id'=>[
				'multiple'=>ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD(),
				'single'=>ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD_SINGULAR(),
				'date_field'=>'interior_agency_add_date',
				'tab_val'=>'interior_agencies',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD())->first()->rights_id,
				'cms_name'=>INTERIOR_AGENCY_KEYWORD(),
			],
			'house_maintenance_agency_id'=>[
				'multiple'=>ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD(),
				'single'=>ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD_SINGULAR(),
				'date_field'=>'house_maintenance_agency_add_date',
				'tab_val'=>'facility_management_services',
				'rights_id'=>\App\AdminRights::where('title',ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD())->first()->rights_id,
				'cms_name'=>FACILITY_MANAGEMENT_SERVICE_KEYWORD(),
			],
		];
	}
	/**
	 * get_property_owner_information
	 * @param  int $property_id [description]
	 * @return json owner list related to property
	 */
	function get_property_owner_information($property_id,$owner_to_show=false)
	{
		$obj = \App\AdminProperty::where('property_id',$property_id);
		$owner_info = array();
		if($obj->count()>0)
		{
			$result = $obj->first();
			if($owner_to_show)
			{
				$owner_info['first_name'] = $result->b_first_name;
				$owner_info['last_name'] = $result->b_last_name;
				$owner_info['email'] = $result->b_email;
				$owner_info['mobile'] = $result->mobile;
			}
			else
			{
				$owner_info['first_name'] = $result->o_first_name;
				$owner_info['last_name'] = $result->o_last_name;
				$owner_info['email'] = $result->o_email;
				$owner_info['mobile'] = $result->o_mobile;
			}
		}
		return json_encode($owner_info);
	}
	function get_user_details_for_email($user_id)
	{
		$user_list = array();
		$user_selectable_columns = [
			'first_name',
			'last_name',
			'email',
			'mobile',
		];
		$user_obj = \App\User::where('user_id',$user_id)->select($user_selectable_columns);
		if($user_obj->count()>0)
		{
			$user_result = $user_obj->first();
			$user_list['first_name'] = $user_result->first_name;
			$user_list['last_name'] = $user_result->last_name;
			$user_list['email'] = $user_result->email;
			$user_list['mobile'] = $user_result->mobile;
		}
		return json_encode($user_list);
	}
	/**
	 * [get_the_users_related_to_a_property]
	 * @param  int $property_id 
	 * @return json user list related to property
	 */
	function get_the_users_related_to_a_property($property_id)
	{
		$user_list = array();
		$user_index = 0;
		$obj = \App\AdminProperty::where('property_id',$property_id);
		if($obj->count()>0)
		{
			$result = $obj->first();
			//Admin
			$user_list[$user_index]['type'] = 'admin';
			$user_list[$user_index]['first_name'] = 'Admin';
			$user_list[$user_index]['last_name'] = '';
			$user_list[$user_index]['email'] = SITE_INFO('second_email');
			$user_list[$user_index]['mobile'] = '';
			$user_index++;
			//Admin
			//Owner of the property
			$user_result = json_decode(get_user_details_for_email($result->user_id),true);
			if(!empty($user_result))
			{
				$user_list[$user_index] = $user_result;
				$user_list[$user_index]['type'] = 'owner';//sp means service provider
				$user_index++;
				if($user_result['email']!=$result->o_email)
				{
					$user_list[$user_index] = json_decode(get_property_owner_information($property_id),true);
					$user_list[$user_index]['type'] = 'owner';
					$user_index++;
				}
			}
			//Owner of the property
			//Get the handholding users related to the property
			foreach(array_keys(get_handholding_user_type_arr()) as $primary_key_value)
			{
				if(isset($result->{$primary_key_value}) && !empty($result->{$primary_key_value}))
				{
					$user_result = json_decode(get_user_details_for_email($result->{$primary_key_value}),true);
					if(!empty($user_result))
					{
						$user_list[$user_index] = $user_result;
						$user_list[$user_index]['type'] = 'service_provider';
						$user_index++;
					}
				}
			}
			//Get the handholding users related to the property
			//Buyer of the properties
			$buyer_obj = \App\AdminBuyer::where('property_id',$result->property_id)->select('user_id');
			if($buyer_obj->count()>0)
			{
				$buyer_result = $buyer_obj->get();
				foreach($buyer_result as $bs)
				{
					$user_result = json_decode(get_user_details_for_email($bs->user_id),true);
					if(!empty($user_result))
					{
						$user_list[$user_index] = $user_result;
						$user_list[$user_index]['type'] = 'buyer';
						$user_index++;
					}
				}
			}
			//Buyer of the properties
		}
		return json_encode($user_list);
	}
	/**
	 * [send_an_email]
	 * @param  [array] $params
	 */
	function send_an_email($params)
	{
		Mail::send('emails.mail_template',['email_body'=>$params['message']],function($message) use ($params){
			$message->to($params['to'],$params['name'])->subject($params['subject']);
			$message->from($params['from'], SITE_INFO('name'));
		});
	}
	/**
	 * [mail_property_handhold]
	 * @param  [array] $change_data
	 * @param  [array] $old_data
	 */
	function mail_property_handhold($change_data,$old_data,$buyer=false)
	{	
		$types_of_users = get_handholding_user_type_arr();
		$user_keys_of_handholding_user = array_keys($types_of_users);
		$data 		= \App\AdminTemplate::where('title','handholding_services')->first();
		$template 	= $data->template;
		$subject 	= $data->subject;
		$from 	= $data->from_email;
		$single_prop_data = \App\AdminProperty::where('property_id',$old_data['property_id'])->select('name','property_unique_id')->first();//Property details for buyers
		$old_data['name'] = $single_prop_data->name;
		$old_data['property_unique_id'] = $single_prop_data->property_unique_id;
		$template = str_replace('###SITE_URL###', FRONT_URL(),$template);
		$added_user = $removed_user = array();
		$added_user_index = $removed_user_index = 0;
		$added_user_html = $removed_user_html = '';
		$user_type = ($buyer?trans('lang_data.buyer'):trans('lang_data.seller'));
		$user_detail =  ($buyer?(json_decode(get_user_details_for_email($old_data['user_id']),true)):(json_decode(get_property_owner_information($old_data['property_id']),true)));
		$user_name = $user_detail['first_name'].' '.$user_detail['last_name'];
		$user_mobile = $user_detail['mobile'];
		$user_email = $user_detail['email'];
		$content_html = (string)view('plugin.mail.mail_content_for_user');
		$extension_add = ($buyer?'_b':'');//Add in language keyword to get it from dynamically for buyers
		foreach($change_data as $field_name=>$value)
		{
			if(in_array($field_name, $user_keys_of_handholding_user))
			{
				if(!empty($value))
				{
					//Mail while hand hoding user add
					$suser_detail = json_decode(get_user_details_for_email($value),true);
					$statement = trans('lang_data.handholding_serivce_pv'.$extension_add,['name'=>$old_data['name'],'property_unique_id'=>$old_data['property_unique_id']]);
					$added_user[$added_user_index] = $suser_detail;
					$added_user[$added_user_index]['suser_type'] = trans('lang_data.'.$types_of_users[$field_name]['single']);
					$added_user_index++;
					//Mail while hand hoding user add
					if(!empty($suser_detail) && !empty($user_detail))
					{

						$suser_type = trans('lang_data.'.$types_of_users[$field_name]['single']);
						$suser_name = $suser_detail['first_name'].' '.$suser_detail['last_name'];
						$suser_mobile = $suser_detail['mobile'];
						$suser_email = $suser_detail['email'];
						$content = str_replace(['###SUSER_TYPE###','###SUSER_NAME###','###SUSER_MOBILE###','###SUSER_EMAIL###',], [$suser_type,$suser_name,$suser_mobile,$suser_email],$content_html);
						$added_user_html .= $content;

						$content = str_replace(['###SUSER_TYPE###','###SUSER_NAME###','###SUSER_MOBILE###','###SUSER_EMAIL###',], [$user_type,$user_name,$user_mobile,$user_email],$content_html);
						$message = str_replace(['###RECEIVER_NAME###','###STATEMENT###','###HTML_CONTENT###'], [$suser_name,$statement,$content],$template);
						send_an_email([
							'message'=>$message,
							'to'=>$suser_email,
							'name'=>$suser_name,
							'subject'=>$subject,
							'from'=>$from,
						]);
					}
				}
				if(!empty($old_data[$field_name]))
				{
					//Mail while hand hoding user remove
					$suser_detail = json_decode(get_user_details_for_email($old_data[$field_name]),true);
					$statement = trans('lang_data.handholding_serivce_pv_remove'.$extension_add,['name'=>$old_data['name'],'property_unique_id'=>$old_data['property_unique_id']]);
					$removed_user[$removed_user_index] = $suser_detail;
					$removed_user[$removed_user_index]['suser_type'] = trans('lang_data.'.$types_of_users[$field_name]['single']);
					$removed_user_index++;
					//Mail while hand hoding user remove
					if(!empty($suser_detail) && !empty($user_detail))
					{
						$suser_type = trans('lang_data.'.$types_of_users[$field_name]['single']);
						$suser_name = $suser_detail['first_name'].' '.$suser_detail['last_name'];
						$suser_mobile = $suser_detail['mobile'];
						$suser_email = $suser_detail['email'];
						$content = str_replace(['###SUSER_TYPE###','###SUSER_NAME###','###SUSER_MOBILE###','###SUSER_EMAIL###',], [$suser_type,$suser_name,$suser_mobile,$suser_email],$content_html);
						$removed_user_html .= $content;
						$content = str_replace(['###SUSER_TYPE###','###SUSER_NAME###','###SUSER_MOBILE###','###SUSER_EMAIL###',], [$user_type,$user_name,$user_mobile,$user_email],$content_html);
						$message = str_replace(['###RECEIVER_NAME###','###STATEMENT###','###HTML_CONTENT###'], [$suser_name,$statement,$content],$template);
						send_an_email([
							'message'=>$message,
							'to'=>$suser_email,
							'name'=>$suser_name,
							'subject'=>$subject,
							'from'=>$from,
						]);
					}
				}
			}
		}
		if(!empty($added_user_html))
		{
			$statement = trans('lang_data.handholding_serivce_added'.$extension_add,['name'=>$old_data['name'],'property_unique_id'=>$old_data['property_unique_id']]);
			$message = str_replace(['###RECEIVER_NAME###','###STATEMENT###','###HTML_CONTENT###'], [$user_name,$statement,$added_user_html],$template);
			send_an_email(['message'=>$message,'to'=>$user_email,'name'=>$user_name,'subject'=>$subject,'from'=>$from]);		
		}
		if(!empty($removed_user_html))
		{
			$statement = trans('lang_data.handholding_serivce_removed'.$extension_add,['name'=>$old_data['name'],'property_unique_id'=>$old_data['property_unique_id']]);
			$message = str_replace(['###RECEIVER_NAME###','###STATEMENT###','###HTML_CONTENT###'], [$user_name,$statement,$removed_user_html],$template);
			send_an_email(['message'=>$message,'to'=>$user_email,'name'=>$user_name,'subject'=>$subject,'from'=>$from]);		
		}
	}
	/**
	 * GET CHECK FREE CREDITS ADDED THEN GET
	 */
	function check_free_credits()
	{	
		$result = "";
		$obj = \App\AdminFreeLeads::where('user_id',USER_INFO('user_id'));
		if($obj->count()>0)
		{
			$obj->orderBy('free_leads_expiry_date','ASC');
			$result = $obj->get();
		}
		return $result;
	}
	/**
	 * DEDUCT FREE CREDIT
	 * @param  int $leads_used 
	 */
	function deduct_free_credits($leads_used)
	{
		$obj = \App\AdminFreeLeads::where('user_id',USER_INFO('user_id'))->where('status','active')->orderBy('display_order','ASC');
		if($obj->count()>0)
		{
			$result = $obj->get();
			$loop_break = 'No';
			foreach($result as $free_credits){
				if($loop_break=='Yes'){
					break;
				}
				$obj = \App\AdminFreeLeads::where('user_id',USER_INFO('user_id'))->where('free_lead_id',$free_credits['free_lead_id'])->first();
				if(isset($free_credits['remain_free_leads']) && !empty($free_credits['remain_free_leads'])){
					if($free_credits['remain_free_leads']>=$leads_used){
						$obj->remain_free_leads = $free_credits['remain_free_leads'] - $leads_used;
						$loop_break = 'Yes';
					}else{
						$leads_used = $leads_used - $free_credits['remain_free_leads'];
						$obj->remain_free_leads = 0;
					}
					$obj->update();
				}
			}
		}
	}
	/**
	 * GET YOUTUBE VIDEO
	 * @param  int $rights_id 
	 */
	function get_youtube_video($rights_id)
	{
		$fetch_video = array();
		if(\App\AdminYoutubeVideo::where('rights_id',$rights_id)->where('status','active')->count()>0){
			$fetch_video = \App\AdminYoutubeVideo::select('title','youtube_link')->where('rights_id',$rights_id)->where('status','active')->orderBy('display_order','ASC')->get();
			return $fetch_video;
		}
	}
	/**
	 * Get the name of the developer
	 * @param  $developer_id 
	 * @author Hirak
	 */
	function get_developer_name($developer_id)
	{
		$obj = \App\AdminDeveloper::where('developer_id',$developer_id)->select('title');
		if($obj->count())
		{
			return  $obj->first()->title;
		}
		else
		{
			return '';
		}
	}
	/**
	 * Get the details of the developers
	 * @param  int $developer_id 
	 * @author Hirak
	 */
	function get_developer_details($developer_id)
	{
		$result = array();
		$obj = \App\AdminDeveloper::where('developer_id',$developer_id)->select('title','image');
		if($obj->count()>0)
		{
			$result = $obj->first();
		}
		return $result;
	}
	/**
	 * Get the banner array of the new project
	 * @param  int $new_project_id 
	 * @author Hirak
	 */
	function get_new_project_banner($new_project_id)
	{
		$new_project_banner_arr = array();
		$project_banner = \App\AdminNewprojectbanner::where('new_project_id',$new_project_id)
		->select('image')
		->where('status','active')
		->orderBy('display_order','asc')
		->get();
		if(count($project_banner)>0)
		{
			foreach($project_banner as $a)
			{
				if(isset($a->image) && !empty($a->image) && file_exists(NEW_PROJECT_BANNER_PATH().$a->image))
				{
					$new_project_banner_arr[] = NEW_PROJECT_BANNER_URL().$a->image;
				}
			}
			if(count($new_project_banner_arr)==0)
			{
				$new_project_banner_arr[] = FRONT_IMAGE_URL().'no_image.jpg';
			}
		}
		else
		{
			$new_project_banner_arr[] = FRONT_IMAGE_URL().'no_image.jpg';
		}
		return $new_project_banner_arr;
	}
	/**
	 * Get the address string of the new project
	 * @param  array $r [description]
	 * @author Hirak
	 */
	function get_new_project_address_str($r)
	{
		$str = (isset($r->area) && !empty($r->area))?($r->area.', '):'';
		$str .= (isset($r->city_id) && !empty($r->city_id))?(GET_CITY_WITH_ZONE_STR($r).', '):'';
		$str .= (isset($r->country_id) && !empty($r->country_id))?(\App\AdminCountries::where('country_id',$r->country_id)->first()->name):'';
		return $str;
	}
	/**
	 * Get the price string of new project
	 * @param  array $r
	 * @author Hirak
	 */
	function get_new_project_price_str($r)
	{
		return SITE_INFO('currency').convert_to_indian_value($r->min_price).' - '.SITE_INFO('currency').convert_to_indian_value($r->max_price);
	}
	/**
	 * Get the bhk details of the new project
	 * @param  array $r
	 * @author Hirak
	 */
	function get_new_project_bhk_str($r)
	{
		$bedroom_type = unserialize($r->bedroom_type);
		$bedroom_size = unserialize($r->bedroom_size);
		$bedroom_str = '';
		if(isset($bedroom_type) && !empty($bedroom_type) && count($bedroom_type)>0)
		{	
			foreach($bedroom_type as $bedrooms)
			{
				$bedroom_str .= '<p>'.$bedrooms. 'BHK apartment '.((isset($bedroom_size[$bedrooms]) && !empty($bedroom_size[$bedrooms]))?$bedroom_size[$bedrooms].' sqft</br>':'').'</p>';
			}
		}
		return trim($bedroom_str);
	}
	/**
	 * Get the new project url
	 * @param  array $r
	 * @author Hirak
	 */
	function get_new_project_url($r)
	{
		return FRONT_URL().$r->url.'/'.$r->new_project_id;
	}
	function get_new_project_bedroom_count()
	{
		return range(1,7);
	}
	function check_if_user_is_hand_hold_user($profile_type='parent_profile')
	{
		$return_value = false;
		foreach(get_handholding_user_type_arr() as $a)
		{
			if($a['multiple']==GET_CURRENT_USER_TYPE($profile_type))
			{
				$return_value = true;
			}
		}
		return $return_value;
	}
	
	/**
	 * Get the users free (promotional) and paid credits
	 * @author Samir
	 * @return credit_list
	 */
	function get_uses_free_and_paid_credit($profile_type='parent_profile')
	{
		$credit_list = array();
		$credit_list['free_credit'] = $credit_list['paid_credit'] = $no_of_free_leads = 0;
		//if(USER_INFO('no_of_leads')!=0){
			if(!is_null(USER_INFO('no_of_free_leads',$profile_type))){
				$no_of_free_leads = USER_INFO('no_of_free_leads',$profile_type);
			}
			$get_free_add_credit = \App\AdminBuyer::where("user_id",USER_INFO("user_id",$profile_type))
									->where('promo_code','1')
									->sum('no_of_leads_add');
			$get_free_add_credit += $no_of_free_leads;
			
			$get_paid_add_credit = \App\AdminBuyer::where("user_id",USER_INFO("user_id",$profile_type))
									->where('promo_code','=',NULL)
									->sum('no_of_leads_add');
									
			$get_used_credits = \App\AdminBuyer::where("user_id",USER_INFO("user_id",$profile_type))
									->sum('no_of_leads_use');
			$toral_Add_credits = $get_paid_add_credit + $get_free_add_credit;
			$credit_list['free_credit'] = $get_free_add_credit;
			
			if($get_used_credits>=$get_free_add_credit){
				$credit_list['free_credit'] = 0;
			}elseif($get_used_credits<$get_free_add_credit){
				$credit_list['free_credit'] = $get_free_add_credit - $get_used_credits;
			}
			if($get_paid_add_credit!=0){
				$credit_list['paid_credit'] = $get_paid_add_credit;
				if($credit_list['free_credit']==0){
					$credit_list['paid_credit'] = $toral_Add_credits - $get_used_credits;
				}
			}else{
				$credit_list['paid_credit'] = 0;
			}
			//pre($get_free_add_credit);
			//return $str;
		//}
		return $credit_list;
	}
?>