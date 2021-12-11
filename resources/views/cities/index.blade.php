{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Cities
                    <div class="text-muted pt-2 font-size-sm">All Cities Datatable</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ route('city.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i>New Record</a>
                <!--end::Button-->
            </div>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
            <div id="alert" class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
                <!-- <div class="alert-icon"><i class="flaticon-warning"></i></div> -->
                <div class="alert-text">{{ $message }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif
            <table class="table table-bordered table-hover main_datatable" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name_en</th>
                    <th>Name_local</th>
                    <th>State Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script type="text/javascript">
        $(function () {
            var table = $('.main_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('city.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'name_local', name: 'name_local'},
                    {data: 'state_name', name: 'state_name'},
                    {
                        "data": "id",
                        render:function(data, type, row)
                        {
                            var show_url = "{{ URL::to('/city') }}/"+data;
                            var edit_url = "{{ URL::to('/city/edit') }}/"+data;
                            return '<a href="'+show_url+'" class="btn btn-sm btn-clean btn-icon" title="View details"><i class="la la-eye"></i></a><a href="'+edit_url+'" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a><a href="javascript:void(0)" data-id="'+data+'" class="delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                        }
                    }
                    //{data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        $('body').on('click', '.delete', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {

                    // ajax
                    $.ajax({
                        type:"POST",
                        url: "{{ url('city/delete') }}",
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function(res){
                            $('.main_datatable').DataTable().ajax.reload();
                        }
                    });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });
    </script>
    @if ($message = Session::get('success'))
    <script>
        $('#alert').show();
            setTimeout(function() {
                $('#alert').hide();
        }, 5000);
    </script>
    @endif
@endsection
