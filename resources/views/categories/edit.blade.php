{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            Edit Category
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--begin::Form-->
    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>City<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="kt_select2_1" name="parent_id">
                                <option value="{{$parent['id']}}">{{$parent['name']}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label>Name_en<span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $category->name }}" required class="form-control" placeholder="Enter Name"/>
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <div class="col-lg-4">
                    <label>Name_local<span class="text-danger">*</span></label>
                    <input type="text" name="name_local" value="{{ $category->name_local }}" class="form-control" placeholder="Enter Local Name"/>
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script type="text/javascript">

    // CSRF Token
    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( ".select2" ).select2({
        ajax: {
          url: "{{route('dataAjax')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
                '_token': '{{ csrf_token() }}',
              'search' : params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });
</script>
@endsection
