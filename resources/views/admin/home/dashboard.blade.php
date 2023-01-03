@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.home'))}}
@endsection
@section('css')
    <style>
        a:link {
            text-decoration: none;
        }
    </style>

@endsection
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline mr-5">
                        <h3>{{ucwords(__('cp.statistics'))}}</h3>
                    </div>
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="gutter-b example example-compact">
                    <div class="d-flex flex-column-fluid">
                        <div class="container">
                            <div class="gutter-b example example-compact">
                                <div class="card card-custom gutter-b">
        							<div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-xl-4 mb-5">
                                                    <div class="card card-custom wave wave-animate-fast">
                                                        <div class="card-body">
            												<span class="svg-icon svg-icon-2x svg-icon-info">
                                        						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M3,16 L21,16 C21,18.209139 19.209139,20 17,20 L7,20 C4.790861,20 3,18.209139 3,16 Z M3,11 L21,11 L21,12 C21,13.1045695 20.1045695,14 19,14 L5,14 C3.8954305,14 3,13.1045695 3,12 L3,11 Z" fill="#000000"/>
                                                                            <path d="M3,5 L21,5 L21,7 C21,8.1045695 20.1045695,9 19,9 L5,9 C3.8954305,9 3,8.1045695 3,7 L3,5 Z" fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg>
            												</span>
                                                            <span
                                                                class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$admins_count}}</span>
                                                            <span
                                                                class="font-weight-bold text-muted font-size-sm">{{__('cp.admins_count')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                
                                            </div>

                                    </div>
                                 </div>


                            </div>
                        </div>

                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>



        @endsection


@section('js')

@endsection

@section('script')

@endsection
