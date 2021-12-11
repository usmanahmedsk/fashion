{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            View City
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
            <a href="{{ route('city.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    <!--begin::Form-->
         <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>State<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="kt_select2_1" name="state_id">
                            @foreach ($states as $state)
                                <option @if ($state['id'] == $city->state_id) {{'selected'}} @endif value="{{$state['id']}}">{{$state['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label>Name_en<span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $city->name }}" required disabled class="form-control" placeholder="Enter Name"/>
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <div class="col-lg-4">
                    <label>Name_local</label>
                    <input type="text" name="name_local" value="{{ $city->name_local }}" disabled  class="form-control" placeholder="Enter Local Name"/>
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <a href="{{ route('city.edit',$city->id) }}"  class="btn btn-primary mr-2">Edit</a>
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
