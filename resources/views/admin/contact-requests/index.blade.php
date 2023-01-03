@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.messages'))}}
@endsection
@section('css')


@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Contact messages</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage Contact messages</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 100px">Sender</th>
                        <th style="min-width: 300px">Email</th>
                        <th style="min-width: 300px">Message</th>
                        <th style="min-width: 100px">Send Date</th>
                        <th class="wd-15p"> {{ucwords(__('cp.action'))}}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$message->name}}</span>
                                <span class="text-muted font-weight-bold d-block font-size-sm">
                                    </span>
                            </div>
                        </td>
                        <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$message->email}}</span>
                       
                            </div>
                        </td>
                        <td>
                            <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$message->message}}</span>
                        </td>
                        <td>
                            <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$message->created_at}}</span>
                        </td>

                        <td class="v-align-middle wd-15p optionAddHours">
                            <a href="#"  onclick="confirmDelete('{{$message->id}}', this)" role="button" title="{{__('cp.delete')}}" data-toggle="modal" class="btn btn-sm btn-clean btn-icon"><i class="la la-trash"></i></a>



                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 5-->
@endsection

@section('js')
<script src="{{asset('js/axios.js')}}"></script>
<script src="{{asset('assets/js/pages/features/miscellaneous/toastr.js')}}"></script>
<script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   function confirmDelete(id, reference) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            performDelete(id, reference);
        }
        });
    }

    function performDelete(id, reference) {
        axios.delete('/admin/messages/'+id)
        .then(function (response) {
            console.log(response);
            reference.closest('tr').remove();
            showMessage(response.data);
        })
        .catch(function (error) {
            console.log(error.response);
            showMessage(error.response.data);
        });
    }

    function showMessage(data) {
        Swal.fire(
            data.title,
            data.text,
            data.icon
        );
    }
</script>
@endsection