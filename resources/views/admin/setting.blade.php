@extends('layout.admin')
@push('title')
    <title>Setting</title>
@endpush
@push('css')
@endpush
@section('admin')
    <style>
        .about-mini-img.small {
            padding: 10px !important;
            border-radius: 10px !important;
            overflow: hidden !important;
            background-color: lightgray;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <!-- --------------------Next Section -------------------------------------->
                <h3 class="sec-title mt-5">
                    Logo / Favicon
                </h3>
                <div class="col-lg-12 three-boxes mt-0 p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.setting.update') }}" method="POST"
                                        enctype="multipart/form-data" class="row g-3 common-form">
                                        <div class="col-12 mb-3">
                                            <h4 class="fw-bold">Site Setting</h4>
                                            {!! csrf_field() !!}
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $setting->id }}">
                                            <div class="boxes-field">
                                                <label for="">Site Name</label>
                                                <input name="site_name" value="{{ $setting->site_name }}" type="text"
                                                    class="form-control @error('site_name') is-invalid @enderror"
                                                    placeholder="Gilbane" id="">
                                                @error('site_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="row g-3 pt-3">
                                                    <div class="col-6">

                                                        <label for="">Primary
                                                            Color</label>
                                                        <input name="primary" value="{{ $setting->primary }}" type="color"
                                                            class="form-control @error('primary') is-invalid @enderror"
                                                            placeholder="Gilbane" id="">
                                                        @error('primary')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">

                                                        <label for="">Secondary Color</label>
                                                        <input name="secondary" value="{{ $setting->secondary }}"
                                                            type="color"
                                                            class="form-control @error('secondary') is-invalid @enderror"
                                                            placeholder="Gilbane" id="">
                                                        @error('secondary')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <h4 class="fw-bold">Logo Light</h4>
                                            <div class="boxes-field">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="about-mini-img small w-100 text-center">
                                                            <img src="{{ asset('/' . $setting->logo_light) }}"
                                                                width="200px" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="drop-zone">
                                                            <span class="drop-zone__prompt wrap-prompt"><span>Drop file
                                                                    here</span>
                                                                <div class="mx-4">OR</div> <button type="button"
                                                                    class="choose-btn">Browse Files</button>
                                                            </span>
                                                            <input type="file" name="logo_light"
                                                                class="drop-zone__input @error('logo_light') is-invalid @enderror">
                                                            @error('logo_light')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <h4 class="fw-bold">Logo Dark</h4>
                                            <div class="boxes-field">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="about-mini-img small w-100 text-center">
                                                            <img src="{{ asset('/' . $setting->logo_dark) }}"
                                                                width="200px" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="drop-zone">
                                                            <span class="drop-zone__prompt wrap-prompt"><span>Drop file
                                                                    here</span>
                                                                <div class="mx-4">OR</div> <button type="button"
                                                                    class="choose-btn">Browse Files</button>
                                                            </span>
                                                            <input type="file" name="logo_dark"
                                                                class="drop-zone__input @error('logo_dark') is-invalid @enderror">
                                                            @error('logo_dark')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <h4 class="fw-bold">Favicon</h4>
                                            <div class="boxes-field">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="about-mini-img small w-100 text-center">
                                                            <img src="{{ asset('/' . $setting->favicon) }}" width="200px"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="drop-zone">
                                                            <span class="drop-zone__prompt wrap-prompt"><span>Drop file
                                                                    here</span>
                                                                <div class="mx-4">OR</div> <button type="button"
                                                                    class="choose-btn">Browse Files</button>
                                                            </span>
                                                            <input type="file" name="favicon"
                                                                class="drop-zone__input @error('favicon') is-invalid @enderror">
                                                            @error('favicon')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-3 col-12">
                                            <button type="submit" name="submitfav"
                                                class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- --------------------Next Section -------------------------------------->
                <h3 class="sec-title mt-5">
                    Contact Details
                </h3>
                <div class="col-lg-12 three-boxes mt-0 p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.setting.update') }}" method="POST"
                                        enctype="multipart/form-data" class="row g-3 common-form">
                                        {!! csrf_field() !!}
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $setting->id }}">
                                        <div class="col-4">
                                            <label for="">Phone Number 1</label>
                                            <input name="phone1" value="{{ $setting->phone1 }}" type="text"
                                                class="form-control @error('phone1') is-invalid @enderror"
                                                placeholder="+1 234 456 7890" id="">
                                            @error('phone1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Phone Number 2</label>
                                            <input name="phone2" value="{{ $setting->phone2 }}" type="text"
                                                class="form-control @error('phone2') is-invalid @enderror"
                                                placeholder="+1 234 456 7890" id="">
                                            @error('phone2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Email Address</label>
                                            <input name="email" value="{{ $setting->email }}" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="info@example.com" id="">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Address</label>
                                            <input name="address" value="{{ $setting->address }}" type="text"
                                                class="form-control @error('site_name') is-invalid @enderror"
                                                id="">
                                            @error('site_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <nlabel for="">Youtube</nlabel>
                                            <input name="youtube" value="{{ $setting->youtube }}" type="text"
                                                class="form-control @error('youtube') is-invalid @enderror"
                                                placeholder="Youtube URL" id="">
                                            @error('youtube')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Facebook</label>
                                            <input name="facebook" value="{{ $setting->facebook }}" type="text"
                                                class="form-control @error('facebook') is-invalid @enderror"
                                                placeholder="Facebook URL" id="">
                                            @error('facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Instagram</label>
                                            <input name="instagram" value="{{ $setting->instagram }}" type="text"
                                                class="form-control @error('instagram') is-invalid @enderror"
                                                placeholder="Instagram URL" id="">
                                            @error('instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Linkedin</label>
                                            <input name="linkedin" value="{{ $setting->linkedin }}" type="text"
                                                class="form-control @error('linkedin') is-invalid @enderror"
                                                placeholder="Linkedin URL" id="">
                                            @error('linkedin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="">Twitter</label>
                                            <input name="twitter" value="{{ $setting->twitter }}" type="text"
                                                class="form-control @error('twitter') is-invalid @enderror"
                                                placeholder="Twitter URL" id="">
                                            @error('twitter')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" name="savecontact"
                                                class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- --------------------Next Section -------------------------------------->
                <h3 class="sec-title mt-5">
                    Scripts
                </h3>
                <div class="col-lg-12 three-boxes mt-0 p-0">
                    <div class="card">
                        <div class="row w-100">
                            <div class="col-12 mb-3">
                                <form action="{{ route('admin.setting.update') }}" method="POST"
                                    enctype="multipart/form-data" class="row g-3 common-form">
                                    {!! csrf_field() !!}
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $setting->id }}">
                                    <div class="boxes-field">
                                        <div class="row">
                                            <div class="col-lg-6 mb-1">
                                                <div class="form-field mt-1">
                                                    <label for="">Head Script</label>
                                                    <textarea rows="3" name="header_script" class="form-control">{{ $setting->header_script }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-1">
                                                <div class="form-field mt-1">
                                                    <label for="">Footer Script</label>
                                                    <textarea rows="3" name="footer_script" class="form-control">{{ $setting->footer_script }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-1">
                                                <div class="form-field mt-1">
                                                    <label for="">Body Script</label>
                                                    <textarea rows="3" name="body_script" class="form-control">{{ $setting->body_script }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="submitscripts"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </section>
    </main>
@endsection
@push('js')
    <script>
        document.querySelectorAll('.common-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                // Disable all forms
                document.querySelectorAll('.common-form').forEach(f => {
                    if (f !== form) {
                        f.querySelector('button[type="submit"]').disabled = true;
                    }
                });
            });
        });
    </script>
@endpush
