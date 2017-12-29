		</div>
	</div>
	<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="{{ trans('lang_data.hide_sidebar') }}">{{ trans('lang_data.side_switch') }}</a>
	<div class="sidebar">
		<div class="antiScroll">
			<div class="antiscroll-inner">
				<div class="antiscroll-content">
					<div class="sidebar_inner">
						<div id="side_accordion" class="accordion">
							<div class="accordion-group">
									<div class="accordion-heading">
										<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
											<i class="icon-th"></i> Modules
										</a>
									</div>
									<div class="accordion-body collapse" id="collapseTwo">
										<div class="accordion-inner">
											<ul class="nav nav-list">
												<li id="li-{{ADMIN_YOUTUBE_VIDEO_KEYWORD()}}"><a class="ttip_r" title="{{ trans('lang_data.youtube_video') }} {{ trans('lang_data.management_keyword') }}" href="{{ url(ADMIN_KEYWORD().'/'.ADMIN_YOUTUBE_VIDEO_KEYWORD()) }}">Test</a></li>
											</ul>
										</div>
									</div>
								</div>
						</div>
						<div class="push"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

@if(env('PACKAGE_DEVELOPMENT'))
@include('crud::admin.layout.javascript')
@else
	@include('admin.layout.javascript')
@endif