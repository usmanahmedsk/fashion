{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            View Language
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
            <a href="{{ route('language.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    <!--begin::Form-->
         <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Short Code<span class="text-danger">*</span></label>
                    <input type="text" name="short_code" value="{{ $language->short_code }}" required disabled class="form-control" placeholder="Enter Short Code"/>
                    <span class="form-text text-muted">Please enter Short Code, Max 2 character allowed</span>
                </div>
                <div class="col-lg-4">
                    <label>Name_en<span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $language->name }}" required disabled class="form-control" placeholder="Enter Name"/>
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <!-- <div class="col-lg-4">
                    <label>Name_local</label>
                    <input type="text" name="name_local" value="{{ $language->name_local }}" disabled  class="form-control" placeholder="Enter Local Name"/>
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div> -->
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Image<span class="text-danger">*</span></label>
                    <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url(/media/users/blank.png)">
                        <div class="image-input-wrapper" style="background-image: url(/uploads/language/{{ $language->image }})"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <a href="{{ route('language.edit',$language->id) }}"  class="btn btn-primary mr-2">Edit</a>
                </div>
            </div>
        </div>

    <!--end::Form-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
    var avatar4 = new KTImageInput('kt_image_4');


</script>
@endsection
