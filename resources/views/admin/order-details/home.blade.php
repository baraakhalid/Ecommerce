@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.details_order'))}}
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
                        <h3>{{ucwords(__('cp.details_order'))}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->


                <div>

                    <div class="btn-group mb-2 m-md-3 mt-md-0 ml-2 ">
                        <a  class="btn btn-secondary" href="#">
                            <i class="icon-xl la la-file-pdf"></i>
                            <span>PDF</span>
                        </a>
                        <a  class="btn btn-secondary btn_export" href="#">
                            <i class="icon-xl la la-file-excel"></i>
                            <span>{{__('cp.excel')}}</span>
                        </a>

                        <button type="button" class="btn btn-secondary" href="#deleteAll" role="button"
                                data-toggle="modal">
                            <i class="flaticon-delete"></i>
                            <span>{{__('cp.delete')}}</span>
                        </button>
                    </div>
                  
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
                <div class="gutter-b example example-compact">

                    <div class="contentTabel">
                        <button type="button" class="btn btn-secondar btn--filter mr-2"><i
                                class="icon-xl la la-sliders-h"></i>{{__('cp.filter')}}</button>
                        <div class="container box-filter-collapse">
                            <div class="card">
                                <form class="form-horizontal" method="get" action="{{url(getLocal().'/admin/orders')}}">
                                    <div class="row">


                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('cp.vendor')}}</label>
                                                <select class="form-control   select2"
                                                        name="providerIds[]" multiple>
                                                    @foreach($users as $one)
                                                        <option
                                                            value="{{$one->id}}" @if(request('providerIds')){{in_array($one->id,request('providerIds'))? "selected": ""}}@endif> {{$one->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">ID</label>
                                                <input type="number"
                                                       value="{{request('id')?request('id'):''}}"
                                                       class="form-control" name="id"
                                                       placeholder="ID">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">{{__('cp.customer_name')}}</label>
                                                <input type="text"
                                                       value="{{request('customer_name')?request('customer_name'):''}}"
                                                       class="form-control" name="customer_name"
                                                       placeholder="{{__('cp.customer_name')}}">
                                            </div>
                                        </div>


                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">{{__('cp.customer_mobile')}}</label>
                                                <input type="number"
                                                       value="{{request('customer_mobile')?request('customer_mobile'):''}}"
                                                       class="form-control" name="customer_mobile"
                                                       placeholder="{{__('cp.customer_mobile')}}">
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">{{__('cp.customer_email')}}</label>
                                                <input type="text"
                                                       value="{{request('customer_email')?request('customer_email'):''}}"
                                                       class="form-control" name="customer_email"
                                                       placeholder="{{__('cp.customer_email')}}">
                                            </div>
                                        </div> --}}


                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('cp.status')}}</label>
                                                <select class="form-control form-control"
                                                        name="status">
                                                    <option
                                                        value="">
                                                        {{__('cp.all')}}
                                                    </option>
                                                    <option
                                                        value="1" {{request('status')  == '1'?'selected':''}}>
                                                        {{__('cp.confirmed')}}
                                                    </option>
                                                    <option
                                                        value="2" {{request('status')  == '2'?'selected':''}}>
                                                        {{__('cp.under_preparing')}}
                                                    </option>
                                                    <option
                                                        value="3" {{request('status')  == '3'?'selected':''}}>
                                                        {{__('cp.ready_for_pickup')}}
                                                    </option>
                                                    <option
                                                        value="4" {{request('status')  == '4'?'selected':''}}>
                                                        {{__('cp.completed')}}
                                                    </option>
                                                    <option
                                                        value="5" {{request('status')  == '5'?'selected':''}}>
                                                        {{__('cp.canceled')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('cp.payment_method')}}</label>
                                                <select class="form-control form-control"
                                                        name="payment_method">
                                                    <option
                                                        value="">
                                                        {{__('cp.all')}}
                                                    </option>
                                                    <option
                                                        value="1" {{request('payment_method')  == '1'?'selected':''}}>
                                                        {{__('cp.online')}}
                                                    </option>
                                                    <option
                                                        value="2" {{request('payment_method')  == '2'?'selected':''}}>
                                                        {{__('cp.cache_on_pickup')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div> --}}


                                        <div class="col-md-4">
                                            <button type="submit"
                                                    class="btn sbold btn-default btnSearch">{{__('cp.search')}}
                                                <i class="fa fa-search"></i>
                                            </button>

                                            <a href="{{url(app()->getLocale().'/admin/orders')}}" type="submit"
                                               class="btn sbold btn-default btnRest">{{__('cp.reset')}}
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div
                            class="card-header d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                            <div>


                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover tableWithSearch" id="tableWithSearch">
                                <thead>
                                <tr>
                                    <th class="wd-1p no-sort">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="checkAll"/>
                                                <span></span></label>
                                        </div>
                                    </th>

                                <!--{{--                                                        <th class="wd-5p"> {{ucwords(__('cp.image'))}}</th>--}}-->
                                    <th class="wd-25p">ID</th>
                                    <th class="wd-25p"> {{ucwords(__('cp.image'))}}</th>
                                    <th class="wd-25p"> {{ucwords(__('cp.name'))}}</th>
                                    <th class="wd-25p"> {{ucwords(__('cp.quantity'))}}</th>
                                    <th class="wd-25p"> {{ucwords(__('cp.total_price'))}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($detailsorders as $one)
                                    <tr class="odd gradeX" id="tr-{{$one->id}}">
                                        <td class="v-align-middle wd-5p">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{$one->id}}" class="checkboxes"
                                                           name="chkBox"/>
                                                    <span></span></label>
                                            </div>
                                        </td>

                                        <td class="v-align-middle wd-25p">#{{@$one->id}}</td>
                                        <td class="v-align-middle wd-5p"><img src="{{$one->product->main_image ?? ''}}" width="50px"
                                            height="50px"></td>

                                        <td class="v-align-middle wd-25p">{{$one->product->name}}</td>
                                        <td class="v-align-middle wd-25p">{{$one->quantity}}</td>
                                        <td class="v-align-middle wd-25p">{{$one->total}}$</td>
                                       

                                    

                                
                                    </tr>
                      


                                @empty
                                @endforelse

                                </tbody>
                            </table>
                            {{-- {{$items->appends($_GET)->links("pagination::bootstrap-4") }} --}}
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
