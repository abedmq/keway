<!--begin::Aside-->
<div class="aside aside-left d-flex aside-fixed" id="kt_aside">
    <!--begin::Primary-->
    <div class="aside-primary d-flex flex-column align-items-center flex-row-auto">
        <!--begin::Brand-->
        <div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-5 py-lg-12">
            <!--begin::Logo-->
            <a href="index.html">
                <img alt="Logo" src="{{settings('logo')}}" class="max-h-30px"/>
            </a>
            <!--end::Logo-->
        </div>
        <!--end::Brand-->
        <!--begin::Nav Wrapper-->
        <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid py-5 scroll scroll-pull">
            <!--begin::Nav-->
            <ul class="nav flex-column" role="tablist">
                <!--begin::Item-->
                <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="لوحة التحكم">
                    <a href="#" class="nav-link btn btn-icon btn-clean btn-lg {{request()->is("/")?"active":""}}"
                       data-toggle="tab"
                       data-target="#kt_aside_tab_1" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                          fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="المجموعات">
                    <a href="{{route('whatsapp.chats')}}"
                       class="nav-link btn btn-icon btn-clean btn-lg {{request()->is("whatsapp")?"active":""}}"
                       role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->

											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                          height="16" rx="1.5"/>
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
												</g>
											</svg>

                                            <!--end::Svg Icon-->
										</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="المستخدمين">
                    <a href="{{route('users.index')}}" class="nav-link btn btn-icon btn-clean btn-lg">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                          fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                          fill="#000000" fill-rule="nonzero"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="Project Management">
                    <a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab"
                       data-target="#kt_aside_tab_4" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                          fill="#000000" opacity="0.3"/>
													<path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z"
                                                          fill="#000000"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="User Management">
                    <a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab"
                       data-target="#kt_aside_tab_5" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                          fill="#000000"/>
													<rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="خروج">
					<form action="{{route('logout')}}" method="post">
						@csrf

                    <button type="submit" class="nav-link btn btn-icon btn-clean btn-lg">
									<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Navigation\Sign-out.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"
              transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13"
              y="6" width="2" height="12" rx="1"/>
        <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
    </g>
</svg><!--end::Svg Icon--></span>
                    </button>
					</form>

				</li>
                <!--end::Item-->
            </ul>
            <!--end::Nav-->
        </div>
        <!--end::Nav Wrapper-->
        <!--begin::Footer-->
    {{--        <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-4 py-lg-10">--}}
    {{--            <!--begin::Aside Toggle-->--}}
    {{--            <span class="aside-toggle btn btn-icon btn-primary btn-hover-primary shadow-sm" id="kt_aside_toggle"--}}
    {{--                  data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"--}}
    {{--                  title="Toggle Aside">--}}
    {{--								<i class="ki ki-bold-arrow-back icon-sm"></i>--}}
    {{--							</span>--}}
    {{--            <!--end::Aside Toggle-->--}}
    {{--            <!--begin::Quick Actions-->--}}
    {{--            <a href="#" class="btn btn-icon btn-clean btn-lg mb-1" id="kt_quick_actions_toggle" data-toggle="tooltip"--}}
    {{--               data-placement="right" data-container="body" data-boundary="window" title="Quick Actions">--}}
    {{--								<span class="svg-icon svg-icon-xl">--}}
    {{--									<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->--}}
    {{--									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
    {{--                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
    {{--										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
    {{--											<rect x="0" y="0" width="24" height="24"/>--}}
    {{--											<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16"--}}
    {{--                                                  rx="1.5"/>--}}
    {{--											<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>--}}
    {{--											<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>--}}
    {{--											<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>--}}
    {{--										</g>--}}
    {{--									</svg>--}}
    {{--                                    <!--end::Svg Icon-->--}}
    {{--								</span>--}}
    {{--            </a>--}}
    {{--            <!--end::Quick Actions-->--}}
    {{--            <!--begin::Quick Panel-->--}}
    {{--            <a href="#" class="btn btn-icon btn-clean btn-lg mb-1 position-relative" id="kt_quick_panel_toggle"--}}
    {{--               data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"--}}
    {{--               title="Quick Panel">--}}
    {{--								<span class="svg-icon svg-icon-xl">--}}
    {{--									<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->--}}
    {{--									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
    {{--                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
    {{--										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
    {{--											<rect x="0" y="0" width="24" height="24"/>--}}
    {{--											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>--}}
    {{--											<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"--}}
    {{--                                                  fill="#000000" opacity="0.3"/>--}}
    {{--										</g>--}}
    {{--									</svg>--}}
    {{--                                    <!--end::Svg Icon-->--}}
    {{--								</span>--}}
    {{--                <span class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1">3</span>--}}
    {{--            </a>--}}
    {{--            <!--end::Quick Panel-->--}}
    {{--            <!--begin::User-->--}}
    {{--            <a href="#" class="btn btn-icon btn-clean btn-lg w-40px h-40px" id="kt_quick_user_toggle"--}}
    {{--               data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"--}}
    {{--               title="User Profile">--}}
    {{--								<span class="symbol symbol-30 symbol-lg-40">--}}
    {{--									<span class="svg-icon svg-icon-xl">--}}
    {{--										<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->--}}
    {{--										<svg xmlns="http://www.w3.org/2000/svg"--}}
    {{--                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
    {{--                                             viewBox="0 0 24 24" version="1.1">--}}
    {{--											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
    {{--												<polygon points="0 0 24 0 24 24 0 24"/>--}}
    {{--												<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"--}}
    {{--                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
    {{--												<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"--}}
    {{--                                                      fill="#000000" fill-rule="nonzero"/>--}}
    {{--											</g>--}}
    {{--										</svg>--}}
    {{--                                        <!--end::Svg Icon-->--}}
    {{--									</span>--}}
    {{--                                    <!--<span class="symbol-label font-size-h5 font-weight-bold">S</span>-->--}}
    {{--								</span>--}}
    {{--            </a>--}}
    {{--            <!--end::User-->--}}
    {{--        </div>--}}
    <!--end::Footer-->
    </div>
    <!--end::Primary-->
</div>
<!--end::Aside-->