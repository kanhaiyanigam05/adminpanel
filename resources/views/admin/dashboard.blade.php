@extends('layout.admin')
@push('title')
    <title>Dashboard | {{ $data->site_name }}</title>
@endpush
@push('css')
    <style>
        .btn.btn-dark {
            padding: 10px 32px;
            border-radius: 32px;
            font-size: 18px;
            font-weight: 600;
        }
    </style>
@endpush
@section('admin')
    <main id="main" class="main">
        <!-- About Us  -->
        <h3 class="sec-title mt-5">Pages </h3>
        <div class="col-lg-12 three-boxes mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                {{-- @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'home')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">Home </h3>
                                        <a href="{{ route('admin.home') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif
                                @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'home')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">Services </h3>
                                        <a href="{{ route('admin.services.index') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif
                                @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'Blogs')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">Blogs </h3>
                                        <a href="{{ route('admin.blogs.index') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif
                                @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'testimonials')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">Testimonials </h3>
                                        <a href="{{ route('admin.testimonials.index') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif
                                @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'home')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">User Permission </h3>
                                        <a href="{{ route('admin.users.index') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif
                                @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'meta')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">Meta </h3>
                                        <a href="{{ route('admin.meta.index') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif
                                @if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'setting')) --}}
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="boxes-field">
                                        <h3 class="fs-2 fw-bold" style="color:#032246">Setting </h3>
                                        <a href="{{ route('admin.setting.edit') }}" type="submit" name="submitdata"
                                            class="btn btn-dark">Link</a>
                                    </div>
                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us -->
    </main>
@endsection
@push('js')
@endpush
