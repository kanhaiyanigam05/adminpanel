@extends('layout.admin')
@push('title')
    <title>Services</title>
@endpush
@section('admin')
    <!--Our Services -->
    <main id="main" class="main">
        @if (Route::currentRouteName() == 'admin.services.create')
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.services.index') }}" type="button" class="btn btn-outline-success">Go
                            Back</a>
                    </div>
                    <!-- home-banner -->
                    <h3 class="sec-title mt-5"> Add Service </h3>
                    <div class="col-lg-12 three-boxes mt-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.services.store') }}" method="POST"
                                            enctype="multipart/form-data" class="row g-3">
                                            {!! csrf_field() !!}
                                            <div class="col-6">
                                                <label for="">Name</label>
                                                <input name="name" value="" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="">Sub Heading</label>
                                                <input name="sub_heading" value="" type="text"
                                                    class="form-control @error('sub_heading') is-invalid @enderror"
                                                    id="">
                                                @error('sub_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Short Description</label>
                                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2"></textarea>
                                                @error('short_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor1"
                                                    rows="2"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-sm-4 ">
                                                <label>Image</label>

                                                <div class="about-mini-img w-100 text-center">
                                                    <img src="" width="200px" class="img-fluid" alt="banner">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <label for="">Choose Image</label>
                                                <div class="drop-zone">
                                                    <span class="drop-zone__prompt "><span>Drop file here</span>
                                                        <div class="mx-4">OR
                                                        </div> <button type="button" class="choose-btn">Browse Files
                                                        </button>
                                                    </span>
                                                    <input type="file" name="image" class="drop-zone__input">
                                                </div>
                                                <small class="text-danger" style="font-size: 12px;">Note : Image
                                                    size should be less than 5MB | Image format:
                                                    jpg, jpeg, png, webp</small>
                                            </div>
                                            <div class="col-12 col-sm-4 ">
                                                <label>Inner Image</label>

                                                <div class="about-mini-img w-100 text-center">
                                                    <img src="" width="200px" class="img-fluid" alt="banner">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <label for="">Choose Inner Image</label>
                                                <div class="drop-zone">
                                                    <span class="drop-zone__prompt "><span>Drop file here</span>
                                                        <div class="mx-4">OR
                                                        </div> <button type="button" class="choose-btn">Browse Files
                                                        </button>
                                                    </span>
                                                    <input type="file" name="inner_image" class="drop-zone__input">
                                                </div>
                                                <small class="text-danger" style="font-size: 12px;">Note : Image
                                                    size should be less than 5MB | Image format:
                                                    jpg, jpeg, png, webp</small>
                                            </div>
                                            <div class="col-12 col-sm-4 ">
                                                <label>Banner Image</label>

                                                <div class="about-mini-img w-100 text-center">
                                                    <img src="" width="200px" class="img-fluid" alt="banner">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <label for="">Choose Banner Image</label>
                                                <div class="drop-zone">
                                                    <span class="drop-zone__prompt "><span>Drop file here</span>
                                                        <div class="mx-4">OR
                                                        </div> <button type="button" class="choose-btn">Browse Files
                                                        </button>
                                                    </span>
                                                    <input type="file" name="banner_image" class="drop-zone__input">
                                                </div>
                                                <small class="text-danger" style="font-size: 12px;">Note : Image
                                                    size should be less than 5MB | Image format:
                                                    jpg, jpeg, png, webp</small>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="">Meta Title</label>
                                                    <input name="meta_title" value="" type="text"
                                                        class="form-control @error('meta_title') is-invalid @enderror"
                                                        id="">
                                                    @error('meta_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Meta Keywords</label>
                                                    <input name="meta_keywords" value="" type="text"
                                                        class="form-control @error('meta_keywords') is-invalid @enderror"
                                                        id="">
                                                    @error('meta_keywords')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description" rows="5" type="text"
                                                    class="form-control @error('meta_description') is-invalid @enderror" id=""></textarea>
                                                @error('meta_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="submitdata" class="btn btn-primary">Add
                                                    Service</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (Route::currentRouteName() == 'admin.services.index')
            <section class="section ">
                <div class="row mt-3">
                    <!-- all services -->
                    <div class="col-lg-12 mt-4">
                        <h4 class="sec-title">All Services</h4>

                        <div class="card">
                            <div class="card-body">
                                <!-- Table with stripped rows -->
                                <a href="{{ route('admin.services.create') }}"><button type="button"
                                        class="btn btn-success custom_btn">Add
                                        Services</button></a>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>

                                            <tr>
                                                <th scope="col">S.No</th>
                                                <th scope="col">Service Name</th>
                                                <th style="width: 50.17567567567568%;" scope="col">Short Description
                                                </th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td>{{ $service->name }}</td>
                                                    <td>
                                                        <div style="width: 500px;">{{ $service->short_description }}</div>
                                                    </td>
                                                    <td><img src="{{ asset($service->image) }}" alt=""
                                                            style="height:55px;border-radius:8px;">
                                                    </td>
                                                    <td class="d-flex gap-2 justify-content-center align-items-center">
                                                        <a class="badge bg-warning"
                                                            href="{{ route('admin.services.edit', $service->id) }}">
                                                            <iconify-icon
                                                                icon="material-symbols-light:edit-square-outline-sharp"
                                                                class="edit-delete-icon">
                                                            </iconify-icon>
                                                        </a>
                                                        <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                            method="post" class="d-inline-block">
                                                            {!! csrf_field() !!}
                                                            @method('DELETE')
                                                            <button class=" badge bg-danger" href=""
                                                                onclick=" return confirm('Are you sure you want to delete this Service?');">
                                                                <iconify-icon
                                                                    icon="material-symbols-light:delete-outline-sharp"
                                                                    class="edit-delete-icon">
                                                                </iconify-icon>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                    <!-- all services -->
                </div>
            </section>
        @endif
        @if (Route::currentRouteName() == 'admin.services.edit')
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.services.index') }}" type="button" class="btn btn-outline-success">Go
                            Back</a>
                    </div>
                    <!-- home-banner -->
                    <h3 class="sec-title mt-5"> Edit Service </h3>
                    <div class="col-lg-12 three-boxes mt-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.services.update', $service->id) }}" method="POST"
                                            enctype="multipart/form-data" class="row g-3">
                                            {!! csrf_field() !!}
                                            @method('PUT')
                                            <div class="col-6">
                                                <label for="">Name</label>
                                                <input name="name" value="{{ $service->name }}" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="">Sub Heading</label>
                                                <input name="sub_heading" value="{{ $service->sub_heading }}"
                                                    type="text"
                                                    class="form-control @error('sub_heading') is-invalid @enderror"
                                                    id="">
                                                @error('sub_heading')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Short Description</label>
                                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror"
                                                    rows="2">{{ $service->short_description }}</textarea>
                                                @error('short_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor3"
                                                    rows="2">{{ $service->description }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-sm-4 ">
                                                <label>Image</label>

                                                <div class="about-mini-img w-100 text-center">
                                                    <img src="{{ asset($service->image) }}" width="200px"
                                                        class="img-fluid" alt="banner">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <label for="">Choose Image</label>
                                                <div class="drop-zone">
                                                    <span class="drop-zone__prompt "><span>Drop file here</span>
                                                        <div class="mx-4">OR
                                                        </div> <button type="button" class="choose-btn">Browse Files
                                                        </button>
                                                    </span>
                                                    <input type="file" name="image" class="drop-zone__input">
                                                </div>
                                                @error('image')
                                                    <p class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </p>
                                                @enderror
                                                <small class="text-danger" style="font-size: 12px;">Note : Image
                                                    size should be less than 5MB | Image format:
                                                    jpg, jpeg, png, webp</small>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="">Meta Title</label>
                                                    <input name="meta_title" value="{{ $service->meta_title }}"
                                                        type="text"
                                                        class="form-control @error('meta_title') is-invalid @enderror"
                                                        id="">
                                                    @error('meta_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Meta Keywords</label>
                                                    <input name="meta_keywords" value="{{ $service->meta_keywords }}"
                                                        type="text"
                                                        class="form-control @error('meta_keywords') is-invalid @enderror"
                                                        id="">
                                                    @error('meta_keywords')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description" rows="5" type="text"
                                                    class="form-control @error('meta_description') is-invalid @enderror" id="">{{ $service->meta_description }}</textarea>
                                                @error('meta_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="submitdata" class="btn btn-primary">Add
                                                    Service</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>
    <!--Our Services -->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            //text-editor
            const createClassicEditor = id => {
                ClassicEditor
                    .create(document.getElementById(id))
                    .catch(error => {
                        // console.error(error);
                    });
            };

            //loop for editor
            for (let i = 1; i <= 3; i++) {
                createClassicEditor(`editor${i}`);
            }
        });
    </script>
@endpush
