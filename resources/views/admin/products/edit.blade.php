@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.products'))}}
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
                        <h3>{{__('cp.edit_product')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/products/'.$product->id)}}" class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
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
                    <form method="post" action="{{url(app()->getLocale().'/admin/products/'.$product->id)}}"
                        enctype="multipart/form-data"  class="form-horizontal" role="form" id="form">
                          {{ csrf_field() }}
                          {{ method_field('PATCH')}}         
                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>


                        <div class="row col-sm-12">
                            <div class="card-body">

                                <div class="row">
                                   
                                        <label class="form-group">Category:</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="dropdown bootstrap-select form-control dropup" >
                                                <select class="form-control selectpicker" data-size="7" name="category_id" id="category_id" required 
                                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                                    {{-- <option  value="-1">Select Category</option> --}}
                                                    @foreach ($categories as $category)
                                                    <option value="{{old('category_id' ,$category->id)}}" {{old('category_id',$product->category_id)==$category->id ? 'selected' : null}}>{{$category->name}}</option>

                                                    {{-- <option value="{{$category->id}}" data-id="{{$category->id}}">{{$category->name}}</option> --}}
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="form-text text-muted">Please select category</span>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.price')}}</label>
                                            <input type="number" class="form-control form-control-solid" name="price"
                                                   value="{{old('price' ,$product->price)}}" required/>
                                        </div>
                                    </div>

                                   
                                </div>


                                <div class="row">
                                    @foreach($locales as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('cp.name_'.$locale->lang)}}</label>
                                                <input type="text" class="form-control form-control-solid"
                                                       {{($locale->lang == 'ar') ? 'dir=rtl' :'' }}  name="name_{{$locale->lang}}"
                                                       value="{{old('name_'.$locale->lang,@$product->translate($locale->lang)->name)}}"
                                                     
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
                                                          rows="3" maxlength="150"
                                                          {{($locale->lang == 'ar') ? 'dir=rtl' :'' }}  name="info_{{$locale->lang}}"
                                                          required>  {{old('info_'.$locale->lang,@$product->translate($locale->lang)->info)}}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                    
                                <label class="form-group">Colors:</label>
                                @foreach ($colors as $color)

                                <div class="form-group row">
                               
                                    <div class="col-6 ">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                {{-- {{dd(old('colors'))}} --}}
                                                <input type="checkbox" id="colors"
                                                name="colors[]" value="{{$color->id}}"
                                                {{old('colors') && in_array($color->id, $product->colors() ) ? 'checked' : ''}}
                                                 {{$product->colors->contains($color->id) ? 'checked' : ''}}
                                                
                                                /> {{$color->name}}
                                                <span></span>
                                            </label>
                                            
                                           
                                           
                                        </div>
                                    </div>
                                    <label class="col-6">
                                        <div class="form-group">
                                            <div class="checkbox-inline">
                                                @foreach ($sizes as $size )

                                                <label class="checkbox">
                                                    <input type="checkbox"  id="sizes" name="sizes_for_color_{{$color->id}}[]" value="{{$size->id}}"
                                                    @if (in_array($size->id, old("sizes_for_color_{$color->id}", $product->sizesForColor($color->id)->pluck('id')->toArray())))
                                                      checked
                                                    @endif
                                                    /> {{$size->name}}
                                                    <div class="col-12" >
                                                     <input type="number" name="quantities_for_color_{{$color->id}}_size_{{$size->id}}" 
                                                     value="{{ old("quantities_for_color_{$color->id}_size_{$size->id}") }}"
                                                     class="col-12"  />
                                                    </div>
                                                    <span></span>
                                                </label>
                                               @endforeach
                                                
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @endforeach


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
                                                    @foreach($product->images as $image)
                                                        <div class="imageBox text-center"
                                                             style="width:150px;height:190px;margin:5px">
                                                            <img src="{{$image->image_url ?? ''}}"
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
