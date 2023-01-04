@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.options'))}}
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
                        <h3>{{__('cp.edit_option')}} ( {{@$meal->user->name}} / {{$meal->title}} / {{$item->name}})</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/meals/'.$meal->id.'/options')}}"
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
                    <form method="post" action="{{url(app()->getLocale().'/admin/meals/'.$item->id.'/updateOption')}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}

                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>


                        <div class="row col-sm-12">
                            <div class="card-body">

                                <div class="row">
                                    @foreach($locales as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('cp.name_'.$locale->lang)}}</label>
                                                <input type="text" class="form-control form-control-solid"
                                                       {{($locale->lang == 'ar') ? 'dir=rtl' :'' }}  name="name_{{$locale->lang}}"
                                                       value="{{old('name_'.$locale->lang,@$item->translate($locale->lang)->name)}}" required/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.options_type')}}</label>
                                            <select class="form-control form-control-solid"
                                                    name="options_type" required>
                                                <option
                                                    value="0" {{old('options_type',$item->options_type) == '0' ?'selected' : ''}}>
                                                    {{__('cp.optional')}}
                                                </option>
                                                <option
                                                    value="1" {{old('options_type',$item->options_type) == '1' ?'selected' : ''}}>
                                                    {{__('cp.mandatory')}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.selection_type')}}</label>
                                            <select class="form-control form-control-solid"
                                                    name="selection_type" id="selection_type" required>
                                                <option
                                                    value="0" data-type="0" {{old('selection_type',$item->selection_type) == '0' ?'selected' : ''}}>
                                                    {{__('cp.single')}}
                                                </option>
                                                <option
                                                    value="1" data-type="1" {{$item->selection_type == '1' ?'selected' : ''}}>
                                                    {{__('cp.multiple')}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6" id="minimum_value" style="display: {{$item->selection_type==1?'':'none'}}">
                                        <div class="form-group" >
                                            <label>{{__('cp.minimum_value')}}</label>
                                            <input type="number"
                                                   class="form-control form-control-solid attachment_item "
                                                   name="minimum_value"
                                                   value="{{old('minimum_value',$item->minimum_value)}}" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="maximum_value"  style="display: {{$item->selection_type==1?'':'none'}}">
                                        <div class="form-group">
                                            <label>{{__('cp.maximum_value')}}</label>
                                            <input type="number"
                                                   class="form-control form-control-solid attachment_item "
                                                   name="maximum_value"
                                                   value="{{old('maximum_value',$item->maximum_value)}}" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.option_values')}}</label>
                                            <select class="form-control form-control-solid select2"
                                                    name="option_values[]" multiple required>
                                                @foreach($option_values as $one)
                                                    <option value="{{$one->id}}" {{in_array($one->id,old('option_values',$item->option_values->pluck('option_value_id')->toArray())) ? "selected":"" }}> {{$one->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.sort_order')}}</label>
                                            <input type="number"
                                                   class="form-control form-control-solid attachment_item "
                                                   name="sort_order"
                                                   value="{{old('sort_order',$item->sort_order)}}" required/>
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
        $(document).on('change','#selection_type', function (e) {
            var type = $(this).find('option:selected').data('type');

            if (type === 1){
                $("#minimum_value").show(200).find('input').attr("required", true);
                $("#maximum_value").show(200).find('input').attr("required", true);
            }else {
                $("#minimum_value").hide(200).find('input').attr("required", false);
                $("#maximum_value").hide(200).find('input').attr("required", false);
            }
        });
    </script>

@endsection

@section('script')

@endsection
