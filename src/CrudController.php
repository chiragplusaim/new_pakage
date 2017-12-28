<?php

namespace evalue\crud;
use Illuminate\Http\Request;
use App\Http\Requests;
use Crypt;
use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    //
    public function index()
    {	
    	$list_data=TestModule::get();
    	return view('crud::admin.modules.'.ADMIN_CRUD_KEYWORD().'.list',['list_data'=>$list_data]);
    }
    public function add($encrypted_id = Null)
    {
    	if (isset($encrypted_id) && !empty($encrypted_id)) 
    	{
    		$id= Crypt::decrypt($encrypted_id);
    		$edit_data=TestModule::where('test_module_id',$id)->first();
    	}
    	else
    	{
    		$edit_data="";
    	}
    	return view('crud::admin.modules.'.ADMIN_CRUD_KEYWORD().'.edit',['encrypted_id'=>$encrypted_id,'edit_data'=>$edit_data]);
    }
	public function do_save(Request $r)
    {	
    	$input=$r->all();
    	if (isset($input['test_module_id']) && !empty($input['test_module_id'])) 
    	{
    		$id =Crypt::decrypt($input['test_module_id']);
    		$obj=TestModule::where('test_module_id',$id)->first();
    	}
    	else
    	{
    		$obj =new TestModule();
    		
    	}
    		$obj->name=$input['name'];
    		$obj->title=$input['title'];
    		$obj->email=$input['email'];
    		$obj->status=$input['status'];
    		$obj->save();
    	return redirect(ADMIN_KEYWORD().'/'.ADMIN_CRUD_KEYWORD());
    }
    /**
     * Change the status of banner in database
     * @author Chirag
     * @param int $encrypted_id
     * @reviewer
     */
	public function status_change($encrypted_id)
	{
		$id 	= Crypt::decrypt($encrypted_id);
		$obj 	= TestModule::where("test_module_id",$id)->first();
		if($obj->status=="active")
		{
			$obj->status = "inactive";
		}
		else
		{
			$obj->status="active";
		}
		$obj->save();
		session()->flash('succ_msg', trans('crud::lang_data.sess_change_succ'));
		return redirect(ADMIN_KEYWORD().'/'.ADMIN_CRUD_KEYWORD());
	}
	/**
     * Delete the data from database of TestModule
     * @author Chiragg
     * @param int $encrypted_id
     * @reviewer
     */
	public function delete_single($encrypted_id)
	{
		$id = Crypt::decrypt($encrypted_id);
		$obj = TestModule::where("test_module_id",$id)->first();
		$obj->delete();
		session()->flash('succ_msg', trans('crud::lang_data.sess_delet_succ'));
		return redirect(ADMIN_KEYWORD().'/'.ADMIN_CRUD_KEYWORD());
	}
	/**
     * Delete all testmodule (All testmodule which is selected by user)
     * @author Chiragg
	 * @param $r
     * @reviewer
     */
	public function delete_all(Request $r)
	{
		$input =  $r->all();
		if(isset($input['checkbox']) && !empty($input['checkbox']) && count($input['checkbox'])>0)
		{
			$checkbox = $input['checkbox'];
			foreach($checkbox as $c)
			{
				$c = Crypt::decrypt($c);
				$obj = TestModule::where("test_module_id",$c)->first();
				$obj->delete();
			}
			session()->flash('succ_msg', trans('crud::lang_data.sess_delet_succ_mult'));
		}
		else
		{
			session()->flash('err_msg', trans('lang_data.sess_delet_error'));
		}
		return redirect(ADMIN_KEYWORD().'/'.ADMIN_CRUD_KEYWORD());
	}
	/**
     * Active all banner (All banner which is selected by user)
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	public function active_all(Request $r)
	{
		$input =  $r->all();
		if(isset($input['checkbox']) && !empty($input['checkbox']) && count($input['checkbox'])>0)
		{
			$checkbox = $input['checkbox'];
			foreach($checkbox as $c)
			{
				$c = Crypt::decrypt($c);
				$obj = TestModule::where("test_module_id",$c)->where("status","inactive")->first();
				if($obj)
				{
					$obj->status="active";
					$obj->save();
				}
			}
			session()->flash('succ_msg', trans('lang_data.sess_active_succ'));
		}
		else
		{
			session()->flash('succ_msg', trans('lang_data.sess_active_error'));
		}
		return redirect(ADMIN_KEYWORD().'/'.ADMIN_CRUD_KEYWORD());
	}
	/**
     * Inactive all banner (All banner which is selected by user)
     * @author Hirak
	 * @param $r
     * @reviewer
     */
	public function inactive_all(Request $r)
	{
		$input =  $r->all();
		if(isset($input['checkbox']) && !empty($input['checkbox']) && count($input['checkbox'])>0)
		{
			$checkbox = $input['checkbox'];
			foreach($checkbox as $c)
			{
				$c = Crypt::decrypt($c);
				$obj = TestModule::where("test_module_id",$c)->where("status","active")->first();
				if($obj)
				{
					$obj->status="inactive";
					$obj->save();
				}
			}
			session()->flash('succ_msg', trans('lang_data.sess_inactive_succ'));
		}
		else
		{
			session()->flash('succ_msg', trans('lang_data.sess_inactive_error'));
		}
		return redirect(ADMIN_KEYWORD().'/'.ADMIN_CRUD_KEYWORD());
	}
    
}