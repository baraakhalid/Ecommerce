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

                        <form action="/products" method="POST">
                            @csrf
                        
                            <label for="colors">Colors:</label>
                            <br>
                            @foreach ($colors as $color)
                                <input type="checkbox" name="colors[]" value="{{ $color->id }}"> {{ $color->name }}
                                <br>
                                @foreach ($sizes as $size)
                                    <input type="checkbox" name="sizes[{{ $color->id }}][]" value="{{ $size->id }}"> {{ $size->name }}
                                    <input type="number" name="quantities[{{ $color->id }}][{{ $size->id }}]" value="0" min="0">
                                    <br>
                                @endforeach
                            @endforeach
                        
                        


                 
            

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
