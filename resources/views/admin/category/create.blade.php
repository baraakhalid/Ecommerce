@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.categories'))}}
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
                        <h3>{{__('cp.categories')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/categories')}}"
                       class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
                    <button id="submitButton" class="btn btn-success ">{{__('cp.save')}}</button>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <form method="post" action="{{url(app()->getLocale().'/admin/categories')}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}

                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>


                     
                        <div class="row">
                            @foreach($locales as $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.name_'.$locale->lang)}}</label>
                                        <input required 
                                        {{($locale->lang == 'ar') ? 'dir=rtl' :'' }} type="text" class="form-control" id="name" name="name_{{$locale->lang}}"
                                     
                                            placeholder="Enter full name" />
                                        <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.name')}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="image_div" class="form-group row">
                            <label class="col-3 col-form-label">Image:</label>
                            <div class="col-3">
                                <div class="image-input image-input-empty image-input-outline" id="image" name="image"
                                    style="background-image: url({{asset('assets/media/users/blank.png')}})">
                                    <div class="image-input-wrapper"></div>
    
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="image" />
                                    </label>
    
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
    
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submitForm" style="display:none"></button>
                    </form>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection
@section('js')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
        $('#edit_image1').on('change', function (e) {
            readURL(this, $('#editImage1'));
        });
        $(document).on('click', '#submitButton', function () {
            // $('#submitButton').addClass('spinner spinner-white spinner-left');
            $('#submitForm').click();
        });
        var image = new KTImageInput('image');

    </script>


@endsection

@section('script')


@endsection
