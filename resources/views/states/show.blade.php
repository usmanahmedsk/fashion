{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            View State
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
            <a href="{{ route('state.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    <!--begin::Form-->
         <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Country<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="kt_select2_1" name="country_id">
                                <option value="{{$country['id']}}">{{$country['name']}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label>Name_en<span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $state->name }}" required disabled class="form-control" placeholder="Enter Name"/>
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <div class="col-lg-4">
                    <label>Name_local</label>
                    <input type="text" name="name_local" value="{{ $state->name_local }}" disabled  class="form-control" placeholder="Enter Local Name"/>
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Short Code<span class="text-danger">*</span></label>
                    <input type="text" name="short_tag" value="{{ $state->short_tag }}" disabled class="form-control" placeholder="Enter Short code"/>
                    <span class="form-text text-muted">Please enter Local Name, Max 2 character allowed</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <a href="{{ route('state.edit',$state->id) }}"  class="btn btn-primary mr-2">Edit</a>
                </div>
            </div>
        </div>

    <!--end::Form-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>

</script>
@endsection
