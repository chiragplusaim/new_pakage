<?php
	/**
     * This function is used for get local server name
     * @author Hirak
     * @reviewer
     */
	function LOCAL_SERVER_NAME()
	{
		$server_name = "localhost";
		if(IS_LOCAL_SERVER)
		{
			$server_name = Request::server('SERVER_NAME');
		}
		return $server_name;
	}
	/**
     * This function is used for get static site url
     * @author Hirak
     * @reviewer
     */
	function STATIC_SITE_URL()
	{
		if( ! \Request::secure())
		{
			return "http://djchhmjez3xcj.cloudfront.net/phase3/public/";
		}
		else
		{
			return "https://djchhmjez3xcj.cloudfront.net/phase3/public/";
		}
	}
	/**
     * This function is used for get static site path
     * @author Hirak
     * @reviewer
     */
	function STATIC_SITE_PATH()
	{
		return "/var/www/html/phase3/public/";
	}
	/**
     * This function is used for get admin panel path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_KEYWORD()
	{
		return "distress-admin";
	}
	/**
     * This function is used for get site url
     * @author Hirak
     * @reviewer
     */
	function SITE_URL()
	{
		return url('/');
	}
	/**
     * This function is used for get front site url
     * @author Hirak
     * @reviewer
     */
	function FRONT_SITE_URL()
	{
		return url('/');
	}
	/**
     * This function is used for get front url
     * @author Hirak
     * @reviewer
     */
	function FRONT_URL()
	{
		return url("/")."/";
	}
	/**
     * This function is used for get front image url
     * @author Hirak
     * @reviewer
     */
	function FRONT_IMAGE_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('public/front/images')."/";
		}
		else
		{
			return STATIC_SITE_URL().'front/images'."/";
		}
	}
	/**
     * This function is used for get front css url
     * @author Hirak
     * @reviewer
     */
	function FRONT_CSS_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('public/front/css')."/";
		}
		else
		{
			return STATIC_SITE_URL().'front/css'."/";
		}
	}
	/**
     * This function is used for get front font url
     * @author Hirak
     * @reviewer
     */
	function FRONT_FONT_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('public/front/fonts')."/";
		}
		else
		{
			//return STATIC_SITE_URL().'front/fonts'."/";
			return url('public/front/fonts')."/";
		}
	}
	/**
     * This function is used for get front js url
     * @author Hirak
     * @reviewer
     */
	function FRONT_JS_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('public/front/js')."/";
		}
		else
		{
			return STATIC_SITE_URL().'front/js'."/";
		}
	}
	/**
     * This function is used for get front lib url
     * @author Hirak
     * @reviewer
     */
	function FRONT_LIB_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('public/front/lib')."/";
		}
		else
		{
			return STATIC_SITE_URL().'front/lib'."/";
		}
	}
	/**
     * This function is used for get front site path
     * @author Hirak
     * @reviewer
     */
	function FRONT_SITE_PATH()
	{
		return base_path()."/";
	}
	/**
     * This function is used for get front image path
     * @author Hirak
     * @reviewer
     */
	function FRONT_IMAGE_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('front/images')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'front/images/';
		}
	}
	/**
     * This function is used for get front css path
     * @author Hirak
     * @reviewer
     */
	function FRONT_CSS_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('front/css')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'front/css/';
		}
	}
	/**
     * This function is used for get front js path
     * @author Hirak
     * @reviewer
     */
	function FRONT_JS_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('front/js')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'front/js/';
		}
	}
	/**
     * This function is used for get admin site url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SITE_URL()
	{
		return url(ADMIN_KEYWORD().'/');
	}
	/**
     * This function is used for get admin url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_URL()
	{
		return url(ADMIN_KEYWORD().'/')."/";
	}
	/**
     * This function is used for get admin image url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_IMAGE_URL()
	{
		return url('admin/images')."/";
	}
	/**
     * This function is used for get admin image url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_IMG_URL()
	{
		return url('admin/img')."/";
	}
	/**
     * This function is used for get admin css url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CSS_URL()
	{
		return url('admin/css')."/";
	}
	/**
     * This function is used for get admin js url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_JS_URL()
	{
		return url('admin/js')."/";
	}
	/**
     * This function is used for get admin bootstrap url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BOOTSTRAP_URL()
	{
		return url('admin/bootstrap')."/";
	}
	/**
     * This function is used for get admin lib url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_LIB_URL()
	{
		return url('admin/lib')."/";
	}
	/**
     * This function is used for get admin file manager url
     * @author Hirak
     * @reviewer
     */
	function ADMIN_FILE_MANAGER_URL()
	{
		return url('admin/file-manager')."/";
	}
	/**
     * This function is used for get admin image path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_IMAGE_PATH()
	{
		return public_path('admin/images')."/";
	}
	/**
     * This function is used for get admin image path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_IMG_PATH()
	{
		return public_path('admin/img')."/";
	}
	/**
     * This function is used for get admin css path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CSS_PATH()
	{
		return public_path('admin/css')."/";
	}
	/**
     * This function is used for get admin js path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_JS_PATH()
	{
		return public_path('admin/js')."/";
	}
	/**
     * This function is used for get admin bootstrap path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BOOTSTRAP_PATH()
	{
		return public_path('admin/bootstrap')."/";
	}
	/**
     * This function is used for get admin lib path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_LIB_PATH()
	{
		return public_path('admin/lib')."/";
	}
	/**
     * This function is used for get admin modules path
     * @author Hirak
     * @reviewer
     */
	function ADMIN_MODULES_PATH()
	{
		return base_path('resources/views/admin/modules')."/";
	}
	/**
     * This function is used for get chat upload url
     * @author Hirak
     * @reviewer
     */
	function CHAT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/chat')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/chat'."/";
		}
	}
	/**
     * This function is used for get user upload url
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/user/profile_image')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/user/profile_image'."/";
		}
	}
	/**
     * This function is used for get agent import upload url
     * @author Parth
     * @reviewer
     */
	function AGENT_IMPORT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/agent_import')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/agent_import/';
		}
	}
	/**
     * This function is used for get user upload pancard url
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_PANCARD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/user/pancard')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/user/pancard'."/";
		}
	}
	/**
     * This function is used for get user upload esta url
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_REG_ESTA_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/user/esta')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/user/esta'."/";
		}
	}
	/**
     * This function is used for get new project upload url
     * @author Parth
     * @reviewer
     */
	function NEW_PROJECT_LANCHED_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/new_project')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/new_project'."/";
		}
	}
	/**
     * This function is used for get new project banner upload url
     * @author Parth
     * @reviewer
     */
	function NEW_PROJECT_BANNER_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/new_project_banner')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/new_project_banner'."/";
		}
	}
	/**
     * This function is used for get user upload service tax url
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_SERVICE_TAX_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/user/service_tax')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/user/service_tax'."/";
		}
	}
	/**
     * This function is used for get cms upload url
     * @author Hirak
     * @reviewer
     */
	function CMS_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/cms')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/cms'."/";
		}
	}
	/**
     * This function is used for get cms content upload url
     * @author Hirak
     * @reviewer
     */
	function CMS_CONTENT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/cms_content')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/cms_content'."/";
		}
	}
	/**
     * This function is used for get banner upload url
     * @author Hirak
     * @reviewer
     */
	function BANNER_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/banner')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/banner'."/";
		}
	}
	/**
     * This function is used for get developer upload url
     * @author Hirak
     * @reviewer
     */
	function DEVELOPER_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/developer')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/developer'."/";
		}
	}
	/**
     * This function is used for get blog upload url
     * @author Hirak
     * @reviewer
     */
	function BLOG_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/blog')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/blog'."/";
		}
	}
	/**
     * This function is used for get setting banner upload url
     * @author Hirak
     * @reviewer
     */
	function SETTING_BANNER_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/setting/banner')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/setting/banner'."/";
		}
	}
	/**
     * This function is used for get setting favicon upload url
     * @author Hirak
     * @reviewer
     */
	function SETTING_FAVICON_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/setting/favicon')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/setting/favicon'."/";
		}
	}
	/**
     * This function is used for get setting logo upload url
     * @author Hirak
     * @reviewer
     */
	function SETTING_LOGO_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/setting/logo')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/setting/logo'."/";
		}
	}
	/**
     * This function is used for get social medial upload url
     * @author Hirak
     * @reviewer
     */
	function SOCIAL_MEDIA_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/social')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/social'."/";
		}
	}
	/**
     * This function is used for get client upload url
     * @author Hirak
     * @reviewer
     */
	function CLIENT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/client')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/client'."/";
		}
	}
	/**
     * This function is used for get client uploaded logo url
     * @author Hirak
     * @reviewer
     */
	function CLIENT_UPLOAD_LOGO_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/client/logo')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/client/logo'."/";
		}
	}
	/**
     * This function is used for get product upload url
     * @author Hirak
     * @reviewer
     */
	function PRODUCT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/product')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/product'."/";
		}
	}
	/**
     * This function is used for get property image upload url
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_IMAGE_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/property/image')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/property/image'."/";
		}
	}
	/**
     * This function is used for get cache image upload path
     * @author Hirak
     * @reviewer
     */
	function CACHE_IMAGE_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/cache')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/cache/';
		}
	}
	/**
     * This function is used for get property brochure upload url
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_BROCHURE_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/property/brochure')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/property/brochure'."/";
		}
	}
	/**
     * This function is used for get property floor upload url
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_FLOOR_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/property/floor')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/property/floor'."/";
		}
	}
	/**
     * This function is used for get document image upload url
     * @author Hirak
     * @reviewer
     */
	function DOCUMENT_IMAGE_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/document/image')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/document/image'."/";
		}
	}
	/**
     * This function is used for get document file upload url
     * @author Hirak
     * @reviewer
     */
	function DOCUMENT_FILE_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/document/file')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/document/file'."/";
		}
	}
	/**
     * This function is used for get advertisment upload url
     * @author Hirak
     * @reviewer
     */
	function ADVERTISEMENT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/advertisement')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/advertisement'."/";
		}
	}
	/**
     * This function is used for get sample upload url
     * @author Hirak
     * @reviewer
     */
	function SAMPLES_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/samples')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/samples'."/";
		}
	}
	
	/**
     * This function is used for get property document upload url
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_DOCUMENT_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/property/property_documents')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/property/property_documents/';
		}
	}
	
	
	/**
     * This function is used for get message upload url
     * @author Hirak
     * @reviewer
     */
	function MESSAGES_UPLOAD_URL()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return url('admin/uploads/messages')."/";
		}
		else
		{
			return STATIC_SITE_URL().'admin/uploads/messages/';
		}
	}
	
	
	/**
     * This function is used for get chat upload path
     * @author Hirak
     * @reviewer
     */
	function CHAT_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/chat')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/chat/';
		}
	}
	/**
     * This function is used for get user upload path
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/user/profile_image')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/user/profile_image/';
		}
	}
	/**
     * This function is used for get agent import upload path
     * @author Parth
     * @reviewer
     */
	function AGENT_IMPORT_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/agent_import')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/agent_import/';
		}
	}
	/**
     * This function is used for get user upload pancard path
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_PANCARD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/user/pancard')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/user/pancard/';
		}
	}
	/**
     * This function is used for get message upload path
     * @author Parth
     * @reviewer
     */
	function MESSAGES_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/messages')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/messages/';
		}
	}
	/**
     * This function is used for get user upload reg esta path
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_REG_ESTA_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/user/esta')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/user/esta/';
		}
	}
	/**
     * This function is used for get new project upload path
     * @author Parth
     * @reviewer
     */
	function NEW_PROJECT_LANCHED_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/new_project')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/new_project'."/";
		}
	}
	/**
     * This function is used for get new project banner upload path
     * @author Parth
     * @reviewer
     */
	function NEW_PROJECT_BANNER_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/new_project_banner')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/new_project_banner'."/";
		}
	}
	/**
     * This function is used for get user upload service tax path
     * @author Hirak
     * @reviewer
     */
	function USER_UPLOAD_SERVICE_TAX_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/user/service_tex')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/user/service_tex/';
		}
	}
	/**
     * This function is used for get cms upload path
     * @author Hirak
     * @reviewer
     */
	function CMS_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/cms')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/cms/';
		}
	}
	/**
     * This function is used for get cms content upload path
     * @author Hirak
     * @reviewer
     */
	function CMS_CONTENT_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/cms_content')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/cms_content/';
		}
	}
	/**
     * This function is used for get banner upload path
     * @author Hirak
     * @reviewer
     */
	function BANNER_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/banner')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/banner/';
		}
	}
	/**
     * This function is used for get banner upload path
     * @author Hirak
     * @reviewer
     */
	function DEVELOPER_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/developer')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/developer/';
		}
	}
	/**
     * This function is used for get blog upload path
     * @author Hirak
     * @reviewer
     */
	function BLOG_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/blog')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/blog/';
		}
	}
	/**
     * This function is used for get setting banner upload path
     * @author Hirak
     * @reviewer
     */
	function SETTING_BANNER_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/setting/banner')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/setting/banner/';
		}
	}
	/**
     * This function is used for get setting favicon upload path
     * @author Hirak
     * @reviewer
     */
	function SETTING_FAVICON_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/setting/favicon')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/setting/favicon/';
		}
	}
	/**
     * This function is used for get setting logo upload path
     * @author Hirak
     * @reviewer
     */
	function SETTING_LOGO_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/setting/logo')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/setting/logo/';
		}
	}
	/**
     * This function is used for get social media path
     * @author Hirak
     * @reviewer
     */
	function SOCIAL_MEDIA_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/social')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/social/';
		}
	}
	/**
     * This function is used for get client upload path
     * @author Hirak
     * @reviewer
     */
	function CLIENT_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/client')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/client/';
		}
	}
	/**
     * This function is used for get client upload logo path
     * @author Hirak
     * @reviewer
     */
	function CLIENT_UPLOAD_LOGO_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/client/logo')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/client/logo/';
		}
	}
	/**
     * This function is used for get property image upload path
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_IMAGE_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/property/image')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/property/image/';
		}
	}
	/**
     * This function is used for get cache image upload path
     * @author Hirak
     * @reviewer
     */
	function CACHE_IMAGE_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/cache')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/cache/';
		}
	}
	/**
     * This function is used for get property brochure upload path
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_BROCHURE_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/property/brochure')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/property/brochure/';
		}
	}
	/**
     * This function is used for get floor brochure upload path
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_FLOOR_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/property/floor')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/property/floor/';
		}
	}
	/**
     * This function is used for get document image upload path
     * @author Hirak
     * @reviewer
     */
	function DOCUMENT_IMAGE_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/document/image')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/document/image/';
		}
	}
	/**
     * This function is used for get document file upload path
     * @author Hirak
     * @reviewer
     */
	function DOCUMENT_FILE_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/document/file')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/document/file/';
		}
	}
	/**
     * This function is used for get advertisment upload path
     * @author Hirak
     * @reviewer
     */
	function ADVERTISEMENT_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/advertisement')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/advertisement/';
		}
	}
	/**
     * This function is used for get samples upload path
     * @author Hirak
     * @reviewer
     */
	function SAMPLES_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/samples')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/samples/';
		}
	}
	
	/**
     * This function is used for get property document upload path
     * @author Hirak
     * @reviewer
     */
	function PROPERTY_DOCUMENT_UPLOAD_PATH()
	{
		if(Request::server('SERVER_NAME')==LOCAL_SERVER_NAME())
		{
			return public_path('admin/uploads/property/property_documents')."/";
		}
		else
		{
			return STATIC_SITE_PATH().'admin/uploads/property/property_documents/';
		}
	}
	
	/**
     * This function is used for get admin advertisment keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_ADVERTISEMENT_KEYWORD()
	{
		return "advertisements";
	}
	/**
     * This function is used for get admin agent keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_AGENT_KEYWORD()
	{
		return "agents";
	}
	/**
     * This function is used for get admin financial consultants keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CA_KEYWORD()
	{
		return "preferred_financial_consultants";
	}
	/**
     * This function is used for get admin lawyer keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_LAWYER_KEYWORD()
	{
		return "preferred_property_lawyers";
	}
	/**
     * This function is used for get admin valuers keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_VALUER_KEYWORD()
	{
		return "preferred_property_valuers";
	}
	/**
     * This function is used for get admin preferred agent keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_AGENT_KEYWORD()
	{
		return "preferred_agents";
	}
	/**
     * This function is used for get admin preferred vaastu expert keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD()
	{
		return "preferred_vaastu_experts";
	}
	/**
     * This function is used for get admin preferred interior agency keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD()
	{
		return "preferred_interior_agencies";
	}
	/**
     * This function is used for get admin preferred maintenance agency keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD()
	{
		return "preferred_facility_management_services";
	}
	/**
     * This function is used for get admin banner keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BANNER_KEYWORD()
	{
		return "banners";
	}
	/**
     * This function is used for get admin developer keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_DEVELOPER_KEYWORD()
	{
		return "developers";
	}
	/**
     * This function is used for get admin blog keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BLOG_KEYWORD()
	{
		return "blogs";
	}
	/**
     * This function is used for get admin area keyword
     * @author PARTH
     * @reviewer
     */
	function ADMIN_AREA_KEYWORD()
	{
		return "area";
	}
	/**
     * This function is used for get admin blog category keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BLOG_CATEGORY_KEYWORD()
	{
		return "blog_categories";
	}
	/**
     * This function is used for get admin blog comment keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BLOG_COMMENT_KEYWORD()
	{
		return "blog_comments";
	}
	/**
     * This function is used for get admin buyer keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BUYER_KEYWORD()
	{
		return "buyers";
	}
	/**
     * This function is used for get admin city keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CITY_KEYWORD()
	{
		return "cities";
	}
	/**
     * This function is used for get admin cms keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CMS_KEYWORD()
	{
		return "CMS";
	}
	/**
     * This function is used for get admin cms content keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CMS_CONTENT_KEYWORD()
	{
		return "CMS_contents";
	}
	/**
     * This function is used for get admin contact us keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CONTACT_US_KEYWORD()
	{
		return "contact_us";
	}
	/**
     * This function is used for get admin country keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_COUNTRY_KEYWORD()
	{
		return "countries";
	}
	/**
     * This function is used for get admin currency keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CURRENCY_KEYWORD()
	{
		return "currencies";
	}
	/**
     * This function is used for get admin document keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_DOCUMENT_KEYWORD()
	{
		return "documents";
	}
	/**
     * This function is used for get admin email subscriber keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_EMAIL_SUBSCRIBER_KEYWORD()
	{
		return "email_subscribers";
	}
	/**
     * This function is used for get admin email template keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_EMAIL_TEMPLATE_KEYWORD()
	{
		return "email_templates";
	}
	/**
     * This function is used for get admin keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_MANAGEMENT_KEYWORD()
	{
		return "admins";
	}
	/**
     * This function is used for get admin module keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_MODULE_KEYWORD()
	{
		return "modules";
	}
	/**
     * This function is used for get admin pachage keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_PACKAGE_KEYWORD()
	{
		return "package";
	}
	/**
     * This function is used for get admin promotion keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROMOTION_KEYWORD()
	{
		return "promotions";
	}
	/**
     * This function is used for get admin property keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_KEYWORD()
	{
		return "properties";
	}
	/**
     * This function is used for get admin property amenity keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_AMENITY_KEYWORD()
	{
		return "property_amenities";
	}
	/**
     * This function is used for get admin property category keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_CATEGORY_KEYWORD()
	{
		return "property_categories";
	}
	/**
     * This function is used for get admin property category keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CRM_CATEGORY_KEYWORD()
	{
		return "crm_categories";
	}
	/**
     * This function is used for get admin property feature keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_FEATURE_KEYWORD()
	{
		return "property_features";
	}
	/**
     * This function is used for get admin property portfolio keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_PROPERTY_PORTFOLIO_KEYWORD()
	{
		return "property_portfolio";
	}
	/**
     * This function is used for get admin reports keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_REPORTS_KEYWORD()
	{
		return "user_reports";
	}
	/**
     * This function is used for get admin property portfolio reports
     * @author Samir
     * @reviewer
     */
	function ADMIN_PROPERTY_REPORTS_KEYWORD()
	{
		return "property_reports";
	}
	/**
     * This function is used for get agent reports keyword
     * @author Samir
     * @reviewer
     */
	function ADMIN_PROPERTY_FOR_SELL_AGENT_KEYWORD()
	{
		return "properties_for_sell_by_agent";
	}
	/**
     * This function is used for get agent reports keyword
     * @author Samir
     * @reviewer
     */
	function ADMIN_ASSIGNED_HANDHOLDING_SERVICES_KEYWORD()
	{
		return "assigned_handholding_services";
	}
	/**
     * This function is used for get agent credit report reports keyword
     * @author Samir
     * @reviewer
     */
	function ADMIN_CREDIT_REPORT_KEYWORD()
	{
		return "credit_report";
	}
	/**
     * This function is used for get admin seller fees keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SELLER_FEES_KEYWORD()
	{
		return "seller_fees";
	}
	/**
     * This function is used for get admin property leads keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_LEADS_KEYWORD()
	{
		return "property_credits";
	}
	/**
     * This function is used for get admin rights keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_RIGHTS_KEYWORD()
	{
		return "rights";
	}
	/**
     * This function is used for get admin new project keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_NEW_PROJECT_KEYWORD()
	{
		return "new_project";
	}
	/**
     * This function is used for get admin new project keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_NEW_PROJECT_BANNER_KEYWORD()
	{
		return "new_project_banner";
	}
	/**
     * This function is used for get admin seller keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SELLER_KEYWORD()
	{
		return "sellers";
	}
	/**
     * This function is used for get admin settings keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SETTING_KEYWORD()
	{
		return "setting";
	}
	/**
     * This function is used for get admin social media keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SOCIAL_MEDIA_KEYWORD()
	{
		return "social_media";
	}
	/**
     * This function is used for get admin state keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_STATE_KEYWORD()
	{
		return "states";
	}
	/**
     * This function is used for get admin testimonial keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_TESTIMONIAL_KEYWORD()
	{
		return "testimonials";
	}
	/**
     * This function is used for get admin preference keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_PREFERENCE_KEYWORD()
	{
		return "preference";
	}
	/**
     * This function is used for get admin order keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_ORDER_KEYWORD()
	{
		return "orders";
	}
	/**
     * This function is used for get admin singular keyword advertisment
     * @author Hirak
     * @reviewer
     */
	function ADMIN_ADVERTISEMENT_KEYWORD_SINGULAR()
	{
		return "advertisement";
	}
	/**
     * This function is used for get admin singular keyword agent
     * @author Hirak
     * @reviewer
     */
	function ADMIN_AGENT_KEYWORD_SINGULAR()
	{
		return "agent";
	}
	/**
     * This function is used for get admin singular keyword financial consultant
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CA_KEYWORD_SINGULAR()
	{
		return "preferred_financial_consultant";
	}
	/**
     * This function is used for get admin singular keyword lawyer
     * @author Hirak
     * @reviewer
     */
	function ADMIN_LAWYER_KEYWORD_SINGULAR()
	{
		return "preferred_property_lawyer";
	}
	/**
     * This function is used for get admin singular keyword valuer
     * @author Hirak
     * @reviewer
     */
	function ADMIN_VALUER_KEYWORD_SINGULAR()
	{
		return "preferred_property_valuer";
	}
	/**
     * This function is used for get admin singular keyword preferred agent
     * @author Hirak
     * @reviewer
     */
	/**
     * This function is used for get admin pachage keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_PACKAGE_KEYWORD_SINGULAR()
	{
		return "package";
	}
	function ADMIN_PREFERRED_AGENT_KEYWORD_SINGULAR()
	{
		return "preferred_agent";
	}
	/**
     * This function is used for get admin preferred vaastu expert keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD_SINGULAR()
	{
		return "preferred_vaastu_expert";
	}
	/**
     * This function is used for get admin preferred interior agency keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD_SINGULAR()
	{
		return "preferred_interior_agency";
	}
	/**
     * This function is used for get admin preferred maintenance agency keyword
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD_SINGULAR()
	{
		return "preferred_facility_management_service";
	}
	/**
     * This function is used for get admin singular keyword banner
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BANNER_KEYWORD_SINGULAR()
	{
		return "banner";
	}
	/**
     * This function is used for get admin singular keyword developer
     * @author Hirak
     * @reviewer
     */
	function ADMIN_DEVELOPER_KEYWORD_SINGULAR()
	{
		return "developer";
	}
	/**
     * This function is used for get admin singular keyword blog
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BLOG_KEYWORD_SINGULAR()
	{
		return "blog";
	}
	/**
     * This function is used for get admin singular keyword blog category
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BLOG_CATEGORY_KEYWORD_SINGULAR()
	{
		return "blog_category";
	}
	/**
     * This function is used for get admin singular keyword blog comment
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BLOG_COMMENT_KEYWORD_SINGULAR()
	{
		return "blog_comment";
	}
	/**
     * This function is used for get admin singular keyword buyer
     * @author Hirak
     * @reviewer
     */
	function ADMIN_BUYER_KEYWORD_SINGULAR()
	{
		return "buyer";
	}
	/**
     * This function is used for get admin singular keyword city
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CITY_KEYWORD_SINGULAR()
	{
		return "city";
	}
	/**
     * This function is used for get admin property portfolio keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_PROPERTY_PORTFOLIO_KEYWORD_SINGULAR()
	{
		return "property_portfolio";
	}
	/**
     * This function is used for get admin singular keyword reports
     * @author Parth
     * @reviewer
     */
	function ADMIN_REPORTS_KEYWORD_SINGULAR()
	{
		return "report";
	}
	/**
     * This function is used for get admin singular keyword area
     * @author PARTH
     * @reviewer
     */
	function ADMIN_AREA_KEYWORD_SINGULAR()
	{
		return "area";
	}
	/**
     * This function is used for get admin singular keyword cms
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CMS_KEYWORD_SINGULAR()
	{
		return "CMS";
	}
	/**
     * This function is used for get admin singular keyword cms content
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CMS_CONTENT_KEYWORD_SINGULAR()
	{
		return "CMS_content";
	}
	/**
     * This function is used for get admin singular keyword contact us
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CONTACT_US_KEYWORD_SINGULAR()
	{
		return "contact_us";
	}
	/**
     * This function is used for get admin singular keyword country
     * @author Hirak
     * @reviewer
     */
	function ADMIN_COUNTRY_KEYWORD_SINGULAR()
	{
		return "country";
	}
	/**
     * This function is used for get admin singular keyword currency
     * @author Hirak
     * @reviewer
     */
	function ADMIN_CURRENCY_KEYWORD_SINGULAR()
	{
		return "currency";
	}
	/**
     * This function is used for get admin singular keyword document
     * @author Hirak
     * @reviewer
     */
	function ADMIN_DOCUMENT_KEYWORD_SINGULAR()
	{
		return "document";
	}
	/**
     * This function is used for get admin singular keyword email subscriber
     * @author Hirak
     * @reviewer
     */
	function ADMIN_EMAIL_SUBSCRIBER_KEYWORD_SINGULAR()
	{
		return "email_subscriber";
	}
	/**
     * This function is used for get admin singular keyword email template
     * @author Hirak
     * @reviewer
     */
	function ADMIN_EMAIL_TEMPLATE_KEYWORD_SINGULAR()
	{
		return "email_template";
	}
	/**
     * This function is used for get singular keyword admin 
     * @author Hirak
     * @reviewer
     */
	function ADMIN_MANAGEMENT_KEYWORD_SINGULAR()
	{
		return "admin";
	}
	/**
     * This function is used for get admin singular keyword module
     * @author Hirak
     * @reviewer
     */
	function ADMIN_MODULE_KEYWORD_SINGULAR()
	{
		return "module";
	}
	/**
     * This function is used for get admin singular keyword promotion
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROMOTION_KEYWORD_SINGULAR()
	{
		return "promotion";
	}
	/**
     * This function is used for get admin singular keyword property
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_KEYWORD_SINGULAR()
	{
		return "property";
	}
	/**
     * This function is used for get admin singular keyword property amenity
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_AMENITY_KEYWORD_SINGULAR()
	{
		return "property_amenity";
	}
	/**
     * This function is used for get admin singular keyword property category
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_CATEGORY_KEYWORD_SINGULAR()
	{
		return "property_category";
	}
	/**
     * This function is used for get admin singular keyword property feature
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_FEATURE_KEYWORD_SINGULAR()
	{
		return "property_feature";
	}
	/**
     * This function is used for get admin singular keyword seller fee
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SELLER_FEES_KEYWORD_SINGULAR()
	{
		return "seller_fee";
	}
	/**
     * This function is used for get admin singular keyword property credits
     * @author Hirak
     * @reviewer
     */
	function ADMIN_PROPERTY_LEADS_KEYWORD_SINGULAR()
	{
		return "property_credit";
	}
	/**
     * This function is used for get admin singular keyword rights
     * @author Hirak
     * @reviewer
     */
	function ADMIN_RIGHTS_KEYWORD_SINGULAR()
	{
		return "rights";
	}
	/**
     * This function is used for get admin new project keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_NEW_PROJECT_KEYWORD_SINGULAR()
	{
		return "new_project";
	}
	/**
     * This function is used for get admin new project keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_NEW_PROJECT_BANNER_KEYWORD_SINGULAR()
	{
		return "new_project_banner";
	}
	/**
     * This function is used for get admin singular keyword seller
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SELLER_KEYWORD_SINGULAR()
	{
		return "seller";
	}
	/**
     * This function is used for get admin singular keyword settings
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SETTING_KEYWORD_SINGULAR()
	{
		return "setting";
	}
	/**
     * This function is used for get admin singular keyword social media
     * @author Hirak
     * @reviewer
     */
	function ADMIN_SOCIAL_MEDIA_KEYWORD_SINGULAR()
	{
		return "social_media";
	}
	/**
     * This function is used for get admin singular keyword state
     * @author Hirak
     * @reviewer
     */
	function ADMIN_STATE_KEYWORD_SINGULAR()
	{
		return "state";
	}
	/**
     * This function is used for get admin singular keyword testimonial
     * @author Hirak
     * @reviewer
     */
	function ADMIN_TESTIMONIAL_KEYWORD_SINGULAR()
	{
		return "testimonial";
	}
	/**
     * This function is used for get admin singular preference keyword
     * @author Parth
     * @reviewer
     */
	function ADMIN_PREFERENCE_KEYWORD_SINGULAR()
	{
		return "preference";
	}
	/**
     * This function is used for get admin singular keyword order
     * @author Hirak
     * @reviewer
     */
	function ADMIN_ORDER_KEYWORD_SINGULAR()
	{
		return "order";
	}
	/**
     * This function is used for get front keyword about distress brick
     * @author Hirak
     * @reviewer
     */
	function FRONT_ABOUT_DISTRESS_BRICKS()
	{
		return 'about-distress-bricks';
	}
	/**
     * This function is used for get front keyword e-value brick
     * @author Hirak
     * @reviewer
     */
	function FRONT_EVALUE_BRICKS()
	{
		return 'about-evalue-bricks';
	}
	/**
     * This function is used for get front keyword awards
     * @author Hirak
     * @reviewer
     */
	function FRONT_AWARDS()
	{
		return 'awards';
	}
	/**
     * This function is used for get front keyword buyer
     * @author Hirak
     * @reviewer
     */
	function FRONT_BUY_PROPERTY()
	{
		return 'buyers';
	}
	/**
     * This function is used for get front keyword careers
     * @author Hirak
     * @reviewer
     */
	function FRONT_CAREERS()
	{
		return 'careers';
	}
	/**
     * This function is used for get front keyword contact us
     * @author Hirak
     * @reviewer
     */
	function FRONT_CONTACT_US_KEYWORD()
	{
		return 'contact-us';
	}
	/**
     * This function is used for get front keyword cookie
     * @author Hirak
     * @reviewer
     */
	function FRONT_COOKIE_KEYWORD()
	{
		return 'cookie';
	}
	/**
     * This function is used for get front keyword corporate social responsibility
     * @author Hirak
     * @reviewer
     */
	function FRONT_CSR()
	{
		return 'corporate-social-responsibility';
	}
	/**
     * This function is used for get front keyword disress brick facebook
     * @author Hirak
     * @reviewer
     */
	function FRONT_DISTRESS_FACEBOOK()
	{
		return 'distress-bricks-facebook';
	}
	/**
     * This function is used for get front keyword disress brick minis
     * @author Hirak
     * @reviewer
     */
	function FRONT_DISTRESS_MINIS()
	{
		return 'distress-bricks-minis';
	}
	/**
     * This function is used for get front keyword download app
     * @author Hirak
     * @reviewer
     */
	function FRONT_DOWNLOAD_OUR_APP()
	{
		return 'download-our-app';
	}
	/**
     * This function is used for get front keyword history of disress brick
     * @author Hirak
     * @reviewer
     */
	function FRONT_HISTORY_OF_DISTRESS()
	{
		return 'history-of-distress-bricks';
	}
	/**
     * This function is used for get front keyword investor relations
     * @author Hirak
     * @reviewer
     */
	function FRONT_INVESTOR_RELATIONS()
	{
		return 'investor-relations';
	}
	/**
     * This function is used for get front keyword image and logo
     * @author Hirak
     * @reviewer
     */
	function FRONT_IMAGES_AND_LOGOS()
	{
		return 'images-and-logos';
	}
	/**
     * This function is used for get front keyword news
     * @author Hirak
     * @reviewer
     */
	function FRONT_NEWS()
	{
		return 'news';
	}
	/**
     * This function is used for get front keyword newsletter
     * @author Hirak
     * @reviewer
     */
	function FRONT_NEWSLETTER()
	{
		return 'newsletter';
	}
	/**
     * This function is used for get front keyword press office
     * @author Hirak
     * @reviewer
     */
	function FRONT_PRESS_OFFICE()
	{
		return 'press-office';
	}
	/**
     * This function is used for get front keyword privacy policy
     * @author Hirak
     * @reviewer
     */
	function FRONT_PRIVACY_POLICY_KEYWORD()
	{
		return 'privacy-policy';
	}
	/**
     * This function is used for get front keyword seller
     * @author Hirak
     * @reviewer
     */
	function FRONT_SELL_PROPERTY()
	{
		return 'sellers';
	}
	/**
     * This function is used for get front keyword social media
     * @author Hirak
     * @reviewer
     */
	function FRONT_SOCIAL_MEDIA()
	{
		return 'social-media';
	}
	/**
     * This function is used for get front keyword terms and conditions
     * @author Hirak
     * @reviewer
     */
	function FRONT_TERMS_AND_CONDITIONS_KEYWORD()
	{
		return 'terms-&-conditions';
	}
	/**
     * This function is used for get front keyword testimonial
     * @author Hirak
     * @reviewer
     */
	function FRONT_TESTIMONIALS()
	{
		return 'testimonials';
	}
	/**
     * This function is used for get front keyword website overview
     * @author Hirak
     * @reviewer
     */
	function FRONT_WEBSITE_OVERVIEW()
	{
		return 'website-overview';
	}
	/**
     * This function is used for get front keyword ca
     * @author Hirak
     * @reviewer
     */
	function FRONT_CA()
	{
		return 'ca';
	}
	/**
     * This function is used for get front keyword hand holding service
     * @author Hirak
     * @reviewer
     */
	function FRONT_HAND_HOLDING()
	{
		return 'hand-holding-services';
	}
	/**
     * This function is used for get front keyword refund and cancellation
     * @author Hirak
     * @reviewer
     */
	function FRONT_REFUND_AND_CANCELLATION()
	{
		return 'refund-and-cancellation';	
	}
	/**
     * This function is used for get front keyword pricing
     * @author Hirak
     * @reviewer
     */
	function FRONT_PRICING()
	{
		return 'pricing';	
	}
	/**
     * This function is used for get front keyword sitemap
     * @author Samir
     * @reviewer
     */
	function FRONT_SITE_MAP()
	{
		return 'sitemap';
	}
	/**
     * This function is used for get front keyword home
     * @author Hirak
     * @reviewer
     */
	function FRONT_HOME()
	{
		return 'home';
	}
	/**
     * This function is used for get payment complete keyword
     * @author Hirak
     * @reviewer
     */
	function PAYMENT_COMPLETE_KEYWORD()
	{
		return 'complete';
	}
	/**
     * This function is used for get payment pending keyword
     * @author Hirak
     * @reviewer
     */
	function PAYMENT_PENDING_KEYWORD()
	{
		return 'pending';
	}
	/**
     * This function is used for get founder keyword
     * @author Hirak
     * @reviewer
     */
	function FOUNDER_KEYWORD()
	{
		return 'founders';
	}
	/**
     * This function is used for get preferred advocates keyword
     * @author Parth
     * @reviewer
     */
	function PROPERTY_LAWYERS_KEYWORD()
	{
		return 'property-lawyers';
	}
	/**
     * This function is used for get preferred financial consultants keyword
     * @author Parth
     * @reviewer
     */
	function PREFERRED_FINANCIAL_CON_KEYWORD()
	{
		return 'preferred-financial-consultants';
	}
	/**
     * This function is used for get preferred financial consultants keyword
     * @author Parth
     * @reviewer
     */
	function FINANCIAL_CONSULTANT_KEYWORD()
	{
		return 'financial-consultants';
	}
	/**
     * This function is used for get preferred valuers keyword
     * @author Parth
     * @reviewer
     */
	function PROPERTY_VALUER_KEYWORD()
	{
		return 'property-valuers';
	}
	/**
     * This function is used for get preferred facility management service
     * @author Hirak
     * @reviewer
     */
	function FACILITY_MANAGEMENT_SERVICE_KEYWORD()
	{
		return 'facility-management-services';
	}
	/**
     * This function is used for get preferred interior agency
     * @author Parth
     * @reviewer
     */
	function INTERIOR_AGENCY_KEYWORD()
	{
		return 'interior-agencies';
	}
	/**
     * This function is used for get preferred vaastu expert
     * @author Parth
     * @reviewer
     */
	function VAASTU_EXPERT_KEYWORD()
	{
		return 'vaastu-experts';
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_FINANCIAL_CONSULTANTS_ID()
	{
		return \App\AdminRights::where('title',ADMIN_CA_KEYWORD())->first()->rights_id;
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_PROPERTY_LAWYERS_ID()
	{
		return \App\AdminRights::where('title',ADMIN_LAWYER_KEYWORD())->first()->rights_id;
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_PROPERTY_VALUERS_ID()
	{
		return \App\AdminRights::where('title',ADMIN_VALUER_KEYWORD())->first()->rights_id;
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_AGENTS_ID()
	{
		return \App\AdminRights::where('title',ADMIN_PREFERRED_AGENT_KEYWORD())->first()->rights_id;
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_VAASTU_EXPERTS_ID()
	{
		return \App\AdminRights::where('title',ADMIN_PREFERRED_VAASTU_EXPERT_KEYWORD())->first()->rights_id;
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_INTERIOR_AGENCIES_ID()
	{
		return \App\AdminRights::where('title',ADMIN_PREFERRED_INTERIOR_AGENCY_KEYWORD())->first()->rights_id;
	}
	/**
     * Get the rights id for the preffered agent
     * @author HIRAK
     * @reviewer
     */
	function PREFERRED_FACILITY_MANAGEMENT_SERVICES_ID()
	{
		return \App\AdminRights::where('title',ADMIN_PREFERRED_FACILITY_MANAGEMENT_SERVICE_KEYWORD())->first()->rights_id;
	}
	/**
     * This function are used for get the admin youtube video keyword
     * @author CHIRAGG
     * @reviewer
     */
	function ADMIN_YOUTUBE_VIDEO_KEYWORD()
	{
		return "youtube_video";
	}
?>
