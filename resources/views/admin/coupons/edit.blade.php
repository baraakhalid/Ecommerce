@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.coupons'))}}
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
                        <h3>{{__('cp.add_coupon')}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/product_coupons')}}" class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
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
                    <form method="post" action="{{url(app()->getLocale().'/admin/product_coupons/'.$productCoupon->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                          {{ csrf_field() }}
                          {{ method_field('PATCH')}}

                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>


                        <div class="row col-sm-12">
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group">
                                 
                                        <label class="form-group">type:</label>
                                    </div>

                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="dropdown bootstrap-select form-control dropup" >
                                                <select class="form-control selectpicker" data-size="7" name="type" id="type" required 
                                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                                    <option value="{{old('type','percentage')}}" {{old('type',$productCoupon->type)=='percentage' ? 'selected' : null}}>Percentage</option>
                                                    <option value="{{old('type', 'fixed')}}" {{old('type',$productCoupon->type)=='fixed' ? 'selected' : null}}>Fixed</option>
                                                </select>
                                            </div>
                                            <span class="form-text text-muted">Please select Type</span>
                                        </div>
                                        
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cp.start_date')}}:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" name="start_date" 
                                            placeholder="{{__('cp.start_date')}}" value="{{old('start_date',$productCoupon->start_date)}}" required/>
                                        <span class="form-text text-muted">{{__('cp.please_enter')}} {{__('cp.start_date')}}</span>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <label class="col-3 col-form-label">{{__('cp.expire_date')}}:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" name="expire_date" 
                                            placeholder="{{__('cp.expire_date')}}" value="{{old('expire_date',$productCoupon->expire_date)}}" />
                                        <span class="form-text text-muted">{{__('cp.please_enter')}} {{__('cp.expire_date')}}</span>
                                    </div>
                                </div>
                               
                                {{-- </div> --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.code')}}</label>
                                            <input type="text" class="form-control form-control-solid" name="code"
                                                   value="{{old('code' ,$productCoupon->code)}}" required />
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.value')}}</label>
                                            <input type="number" class="form-control form-control-solid" name="value"
                                                   value="{{old('value' ,$productCoupon->value)}}" required step="0.01" min="0" max="100"/>
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.uses_times')}}</label>
                                            <input type="number" class="form-control form-control-solid" name="uses_times"
                                                   value="{{old('uses_times',$productCoupon->uses_times ?? 0)}}" required />
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.greater_than')}}</label>
                                            <input type="number" class="form-control form-control-solid" name="greater_than"
                                                   value="{{old('greater_than' ,$productCoupon->greater_than)}}" required />
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.description')}}</label>
                                            <textarea class="form-control form-control-solid" name="description" id="description" rows="3"
                                                    required>
                                                   {{old('description',$productCoupon->description)}}
                                            </textarea>
                                        </div>
                                    </div>

                                   
                                </div>



                            


                                <div class="form-group row">
                                    <label class="col-3 col-form-label">{{__('cp.status')}}</label>
                                    <div class="col-3">
                                        <span class="switch switch-outline switch-icon switch-success">
                                            <label>
                                               {{-- {{ dd(old( 'freelance_active',$info->freelance_active ) == 'Available');}} --}}
                                                {{-- <input type="checkbox"  checked="checked"  id="freelance_active"> --}}
                                                {{-- <option value="fixed" {{old('type')=='fixed' ? 'selected' : null}}>Fixed</option> --}}

                                                <input type="checkbox" @if(old( 'status' ,$productCoupon->status ) == true) checked="checked" @endif   id="status" name="status">
                                                <span></span>
                                            </label>
                                        </span>
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



  
    <script>
        var index = 0;
   

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
