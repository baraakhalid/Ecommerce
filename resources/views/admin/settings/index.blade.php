@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.settings'))}}
@endsection
@section('css')


@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cp.settings')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
        </h3>
        <div class="card-toolbar">
            <a href="{{url(getLocal().'/admin/settings/create')}}"
                class="btn btn-info font-weight-bolder font-size-sm">{{__('cp.add')}}</a>
        </div>
     
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 120px">{{ucwords(__('cp.image'))}}</th>
                        {{-- <th style="min-width: 120px">{{ucwords(__('cp.language'))}}</th> --}}
                        <th style="min-width: 150px">{{ucwords(__('cp.description_about_page'))}}</th>
                        <th style="min-width: 150px">{{ucwords(__('cp.description_home_page'))}}</th>
                        <th style="min-width: 150px">{{ucwords(__('cp.description_portfolio_page'))}}</th>
                        <th style="min-width: 150px">{{ucwords(__('cp.description_contact_page'))}}</th>
                        {{-- @can([ 'Update-Basic_info']) --}}
                        <th class="pr-0 text-right" style="min-width: 160px">{{__('cp.actions')}}</th>
                        {{-- @endcan --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($settings as $setting) --}}
                    <tr>
                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                            <div class="symbol symbol-50 symbol-light mr-4">
                                <span class="symbol-label">
                                    @if($settings[0]->background_img !=null)
                                        
                                    <img src="{{$settings[0]->image}}/{{$settings[0]->background_img}}"
                                        class="h-75 align-self-end" alt="" />
                                        @else
                                        <img src="{{asset('assets/media/users/blank.png')}}"
                                        class="h-75 align-self-end" alt=""/>

                                    @endif

                                </span>
                            </div>
                            </div>
                        </td>
                
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$settings[0]->description_home}}</span>
                        </td>

                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$settings[0]->description_about}}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$settings[0]->description_portfolio}}</span> 
                        </td>
                        <td>
                           <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$settings[0]->description_contact}}</span>
                           
                        </td>

                      
                        {{-- @can([ 'Update-Basic_info']) --}}
                       
                        <td class="pr-0 text-right">
                            <a href="{{url(getLocal().'/admin/settings/'.$settings[0]->id.'/edit')}}"
                                class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path
                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                           
                        </td>
                        {{-- @endcan --}}
                    </tr>
                    {{-- @endforeach --}}
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 5-->
@endsection

@section('js')

{{-- <script src="{{asset('controlPanel/assets/js/pages/widgets.js')}}"></script> --}}

@endsection