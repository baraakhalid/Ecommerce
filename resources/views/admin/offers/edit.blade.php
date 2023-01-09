@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.offers'))}}
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
                        <h3>{{__('cp.edit_offers')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/offers')}}" class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
                    <button id="submitButtonNow" class="btn btn-success ">{{__('cp.save')}}</button>
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
                    <form method="post" action="{{url('/admin/product_offers/'.$productOffer->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                          {{ csrf_field() }}
                          {{ method_field('PATCH')}}

                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>


                        <div class="row col-sm-12">
                            <div class="card-body">

                                <div class="row">
                                 
                                        <label class="form-group">Product:</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="dropdown bootstrap-select form-control dropup" >
                                                <select class="form-control selectpicker" data-size="7" name="product_id" id="product_id" required 
                                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                                    {{-- <option  value="-1">Select Category</option> --}}
                                                    @foreach($products as $product)
                                                    <option value="{{old('product_id', $product->id)}}" {{old('product_id',$productOffer->product_id) == $product->id?'selected':''}} >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="form-text text-muted">Please select product</span>
                                        </div>
                          {{--           </div> --}}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.discount')}}</label>
                                            <input type="number" class="form-control form-control-solid" name="discount"
                                                   value="{{old('discount',$productOffer->discount)}}" required step="0.01" min="0" max="100"/>
                                        </div>
                                    </div>

                                   
                                </div>



                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cp.start_date')}}:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" name="start_date" 
                                            placeholder="{{__('cp.start_date')}}" value="{{old('start_date',$productOffer->start_date)}}"  required/>
                                        <span class="form-text text-muted">{{__('cp.please_enter')}} {{__('cp.start_date')}}</span>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cp.end_date')}}:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" name="end_date" value="{{old('end_date',$productOffer->end_date)}}"
                                            placeholder="{{__('cp.end_date')}}" />
                                        <span class="form-text text-muted">{{__('cp.please_enter')}} {{__('cp.end_date')}}</span>
                                    </div>
                                </div>


                              
                 
            

                            </div>

                            
                        </div>

                        <button type="submit" id="submitFormNow" style="display:none"></button>
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
        $(document).on('click', '#submitButtonNow', function () {
            // $('#submitButton').addClass('spinner spinner-white spinner-left');
            $('#submitFormNow').click();
        });
    </script>


@endsection

@section('script')
<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

    <script>


        function readURLMultiple(input, target) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        target.append('<div class="imageBox text-center" style="width:150px;height:190px;margin:5px"><img src="' + event.target.result + '" style="width:150px;height:150px"><button class="btn btn-danger deleteImage" type="button">{{__("cp.delete")}}</button><input class="attachedValues" type="hidden" name="filename[]" value="' + event.target.result + '"></div>');
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

        $(document).on("click", ".deleteImage", function () {
            $(this).parent().remove();
        });
        $('#all_images').on('change', function (e) {
            readURLMultiple(this, $('.imageupload'));
        });
    </script>

    <script>
        $(document).on('change', '#user_id', function (e) {
            var id = $(this).find('option:selected').data('id');
            $.ajax({
                url: "{{ url(getLocal().'/admin/providers/getCategories') }}",
                type: "get",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (data) {
                    $('#category_id').empty();
                    // $('#year_id').attr("disabled", false);
                    $('#category_id').append('<option value="">' + "@lang('cp.choose')" + '</option>');
                    $.each(data.items, function (index, one) {
                        $('#category_id').append('<option value="' + one.id + '"  data-id="' + one.id + '">' + one.name + '</option>');
                    })

                }
            })
        });

    </script>
    <script>
        var index = 0;
        $('#add-option').on('click', function () {
            $rows = `
                <div class="row new-item align-items-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{__('cp.name_en')}} <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control form-control-solid attachment_item "
                                   name="extras[${index}][name_en]"
                                   value="" required/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{__('cp.name_ar')}} <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control form-control-solid attachment_item "
                                   name="extras[${index}][name_ar]"
                                   value="" required/>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{__('cp.price')}} <span
                                    class="text-danger">*</span></label>
                            <input type="number"
                                   class="form-control form-control-solid attachment_item "
                                   name="extras[${index}][price]"
                                   value=""/>
                        </div>
                    </div>


                    <div class="col-md-1" style="display: inline;">
                        <a class="btn btn-outline-danger btn-icon btn-clean tooltips delete-new-item"
                           data-container="body"
                           data-placement="top"
                           data-parent-class="new-item"
                           data-original-title="{{__("cp.delete")}}"><i class="fa fa-trash"></i></a>

                    </div>


                </div>


           `;
            $('.task-list-item').append($rows);
            ++index;
        });

        $(document).on('click', '.delete-new-item', function () {
            // $(this).parents('.row_item').fadeOut(1000, () => $(this).remove()).remove();
            $(this).parents('.new-item').fadeOut(500, function () {
                $(this).remove();
            });
        });

        $(document).one('click', '#btn-has-choices', function () {
            $('.optionsDiv').show();
            // if (index === 0) {
            //     $('#add-option').click();
            // }
        });
    </script>

@endsection
