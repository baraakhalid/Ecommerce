@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.meals'))}}
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
                        <h3>{{__('cp.edit_meal')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/meals')}}"
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
                    <form method="post" action="{{url(app()->getLocale().'/admin/meals/'.$item->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>
                        <div class="row col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.vendor')}}</label>
                                            <select   class="form-control form-control-solid"
                                                      name="user_id" id="user_id" required>
                                            <option value="">@lang('cp.select') </option>
                                            @foreach($users as $one)
                                                    <option value="{{$one->id}}" data-id="{{$one->id}}" {{$item->user_id==$one->id ? 'selected':''}}> {{$one->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.category')}}</label> <span style="color: #7b7878; font-size: 13px;" >( @lang('cp.optional') )</span>
                                            <select class="form-control form-control-solid"
                                                    id="category_id"
                                                    name="category_id">
                                                <option value=""> @lang('cp.choose') </option>
                                            @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$item->category_id==$category->id ? 'selected':''}}> {{$category->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.price')}}</label>
                                            <input type="number" class="form-control form-control-solid" name="price" value="{{old('price',$item->price)}}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.price_offer')}}</label><span style="color: #7b7878; font-size: 13px;" >( @lang('cp.optional') )</span>
                                            <input type="number" class="form-control form-control-solid" name="price_offer" value="{{old('price_offer',$item->price_offer)}}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    @foreach($locales as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('cp.title_'.$locale->lang)}}</label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="title_{{$locale->lang}}"
                                                       {{($locale->lang == 'ar') ? 'dir=rtl' :'' }} value="{{old('title_'.$locale->lang,@$item->translate($locale->lang)->title)}}"
                                                       required/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    @foreach($locales as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('cp.description_'.$locale->lang)}}</label>
                                                <textarea type="text" class="form-control form-control-solid"
                                                          rows="3" maxlength="150" {{($locale->lang == 'ar') ? 'dir=rtl' :'' }}  name="description_{{$locale->lang}}" required >{{old('description_'.$locale->lang,@$item->translate($locale->lang)->description)}}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.status')}}</label>
                                        <select class="form-control form-control-solid"
                                                name="status" required>
                                            <option
                                                value="active" {{$item->status == 'active'?'selected':''}}>
                                                {{__('cp.active')}}
                                            </option>
                                            <option
                                                value="not_active" {{$item->status == 'not_active'?'selected':''}}>
                                                {{__('cp.not_active')}}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.sort_order')}}</label>
                                        <input type="number" class="form-control form-control-solid" name="sort_order" value="{{old('sort_order',$item->sort_order)}}" required />
                                    </div>
                                </div>
                            </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-6 col-form-label">{{__('cp.best_selling')}}</label>
                                            <div class="col-3">
                                    <span class="switch">
                                        <label>
                                            <input {{$item->best_selling?'checked':''}} type="checkbox" name="best_selling"/>
                                            <span></span>
                                        </label>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.image')}}</label>
                                            <div class="fileinput-new thumbnail"
                                                 onclick="document.getElementById('edit_image').click()"
                                                 style="cursor:pointer">
                                                <img src="{{$item->image}}" id="editImage" alt="">
                                            </div>
                                            <div class="btn red"
                                                 onclick="document.getElementById('edit_image').click()">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="file" class="form-control" name="image"
                                                   id="edit_image"
                                                   style="display:none">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <fieldset>
                                    <legend>{{__('cp.images')}}</legend>
                                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                        <div class="col-md-12 col-md-offset-0">
                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                            @endif
                                            <div class="imageupload" style="display:flex;flex-wrap:wrap">
                                                @foreach($item->images as $image)
                                                    <div class="imageBox text-center"
                                                         style="width:150px;height:190px;margin:5px">
                                                        <img src="{{$image->image}}"
                                                             style="width:150px;height:150px">
                                                        <button class="btn btn-danger deleteImage"
                                                                type="button">{{__("cp.remove")}}</button>
                                                        <input class="attachedValues" type="hidden" name="oldImages[]"
                                                               value="{{$image->id}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="input-group control-group increment">
                                                <div class="input-group-btn"
                                                     onclick="document.getElementById('all_images').click()">
                                                    <button class="btn btn-success" type="button"><i
                                                            class="glyphicon glyphicon-plus"></i>{{__("cp.addImages")}}
                                                    </button>
                                                </div>
                                                <input type="file" class="form-control hidden" accept="image/*"
                                                       id="all_images" multiple/>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="card-header col-md-12">
                                <h3>@lang('cp.extras')</h3>
                            </div>
                            <div class="card-body">
                                <div class="row my-3">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="button" id="btn-has-choices"
                                                class="btn btn-success">{{__('cp.add_extras')}}</button>
                                    </div>
                                </div>

                                <div class="col-md-12 optionsDiv" style="display: {{$item->extras->count() == 0 ? 'none': ''}}">
                                    <div class="task-list-item" >
                                    @forelse($item->extras as $one)
                                        <div class="row new-item align-items-center">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>{{__('cp.name_en')}} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control form-control-solid attachment_item "
                                                           name="extras[{{$loop->iteration}}][name_en]"
                                                           value="{{$one->translate('en')->name}}" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>{{__('cp.name_ar')}} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control form-control-solid attachment_item "
                                                           name="extras[{{$loop->iteration}}][name_ar]"
                                                           value="{{$one->translate('ar')->name}}" required/>
                                                </div>
                                            </div>



                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>{{__('cp.price')}} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number"
                                                           class="form-control form-control-solid attachment_item "
                                                           name="extras[{{$loop->iteration}}][price]"
                                                           value="{{$one->price}}" required/>
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
                                    @empty
{{--                                            <div class="row new-item align-items-center">--}}
{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>{{__('cp.name_en')}} <span--}}
{{--                                                                class="text-danger">*</span></label>--}}
{{--                                                        <input type="text"--}}
{{--                                                               class="form-control form-control-solid attachment_item "--}}
{{--                                                               name="extras[0][name_en]"--}}
{{--                                                               value="" required/>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>{{__('cp.name_ar')}} <span--}}
{{--                                                                class="text-danger">*</span></label>--}}
{{--                                                        <input type="text"--}}
{{--                                                               class="form-control form-control-solid attachment_item "--}}
{{--                                                               name="extras[0][name_ar]"--}}
{{--                                                               value="" required/>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}



{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>{{__('cp.price')}} <span--}}
{{--                                                                class="text-danger">*</span></label>--}}
{{--                                                        <input type="number"--}}
{{--                                                               class="form-control form-control-solid attachment_item "--}}
{{--                                                               name="extras[0][price]"--}}
{{--                                                               value="" required/>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="col-md-1" style="display: inline;">--}}
{{--                                                    <a class="btn btn-outline-danger btn-icon btn-clean tooltips delete-new-item"--}}
{{--                                                       data-container="body"--}}
{{--                                                       data-placement="top"--}}
{{--                                                       data-parent-class="new-item"--}}
{{--                                                       data-original-title="{{__("cp.delete")}}"><i class="fa fa-trash"></i></a>--}}

{{--                                                </div>--}}


{{--                                            </div>--}}
                                        @endforelse
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" id="add-option"
                                                    class="btn btn-primary">{{__('cp.add_more')}}</button>
                                        </div>
                                    </div>
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
    </script>


@endsection

@section('script')
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
        $(document).on('change','#user_id', function (e) {
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
        var index = {{@$item->extras->count()}}+1;
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
