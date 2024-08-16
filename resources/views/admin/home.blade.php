@extends('layout.admin')
@push('title')
    <title>Dashboard</title>
@endpush
@section('admin')
    <main id="main" class="main">
        <!-- home-banner -->
        <div class="col-lg-12 three-boxes mt-0 home-banner">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <h4 class="sec-title">Home Banner</h4>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <form action="{{ route('admin.dashboard.update', $content[0]->id) }}" method="POST"
                                    class="row g-3">
                                    {!! csrf_field() !!}
                                    @method('PUT')
                                    <div class="col-12">
                                        <label for="">Heading</label>
                                        <input name="heading" value="{{ $content[0]->heading }}" type="text"
                                            class="form-control @error('heading') is-invalid @enderror" id="">
                                        @error('heading')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Button Text</label>
                                        <input name="button_text" value="{{ $content[0]->button_text }}" type="text"
                                            class="form-control @error('button_text') is-invalid @enderror" id="">
                                        @error('button_text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Button Link</label>
                                        <input name="button_link" value="{{ $content[0]->button_link }}" type="text"
                                            class="form-control @error('button_link') is-invalid @enderror" id="">
                                        @error('button_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" name="submitdata" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Table with stripped rows -->
                            <a href="javascript:void(0)" onclick="slider({{ $content[0]->id }})" type="button"
                                class="btn btn-success custom_btn">Add
                                Slider</a>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($content[0]->others as $slider)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset($slider->image) }}" alt="banner1"
                                                        style="height:55px;width:100px;border-radius:8px;">
                                                </td>
                                                <td class="d-flex gap-2 justify-content-center align-items-center">
                                                    <a class="badge bg-warning" href="javascript:void(0)"
                                                        onclick="slider({{ $slider->content_id }}, {{ $slider->id }})">
                                                        <iconify-icon
                                                            icon="material-symbols-light:edit-square-outline-sharp"
                                                            class="edit-delete-icon">
                                                        </iconify-icon>
                                                    </a>
                                                    <a class=" badge bg-danger" href=""
                                                        onclick=" return confirm('Are you sure you want to delete this slider?');">
                                                        <iconify-icon icon="material-symbols-light:delete-outline-sharp"
                                                            class="edit-delete-icon">
                                                        </iconify-icon>
                                                    </a>
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

            </div>
        </div>
        <!-- Slider-Edit-Modal -->
        <div class="modal fade" id="slider_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="slider_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="slider_modalLabel">Slider</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 three-boxes mt-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="" method="POST" id="slider_form"
                                                ajax-url="{{ route('admin.others.store') }}" enctype="multipart/form-data"
                                                class="row g-3">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="" id="slider_id">
                                                <input type="hidden" name="content_id" value=""
                                                    id="slider_content_id">
                                                <div class="col-12 col-sm-4 ">
                                                    <label>Image</label>

                                                    <div class="about-mini-img w-100 text-center">
                                                        <img src="" id="slider_old_image" width="200px"
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
                                                        <p class="invalid-feedback"></p>
                                                    </div>
                                                    <small class="text-danger" style="font-size: 12px;">Note : Image
                                                        size should be less than 5MB | Image format:
                                                        jpg, jpeg, png, webp</small>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-primary d-inline-block w-auto">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider-Edit-Modal -->
        <!-- home-banner -->
        <!-- About Us  -->
        <h3 class="sec-title mt-5">About Us </h3>
        <div class="col-lg-12 three-boxes mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6 mb-3">
                                    <div class="boxes-field">
                                        <form action="{{ route('admin.dashboard.update', $content[1]->id) }}"
                                            method="POST" enctype="multipart/form-data" class="row">
                                            {!! csrf_field() !!}
                                            @method('PUT')
                                            <div class="col-12 col-sm-3 mb-3">
                                                <div class="form-field">
                                                    <label for=""> Number</label>
                                                    <input name="number" value="{{ $content[1]->number }}"
                                                        type="text"
                                                        class="form-control @error('number') is-invalid @enderror"
                                                        id="">
                                                    @error('number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-9 mb-3">
                                                <div class="form-field">
                                                    <label for="">Sub Heading</label>
                                                    <input name="sub_heading" value="{{ $content[1]->sub_heading }}"
                                                        type="text"
                                                        class="form-control @error('sub_heading') is-invalid @enderror"
                                                        id="">
                                                    @error('sub_heading')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-field">
                                                    <label for="">Heading</label>
                                                    <input name="heading" value="{{ $content[1]->heading }}"
                                                        type="text"
                                                        class="form-control @error('heading') is-invalid @enderror"
                                                        id="">
                                                    @error('heading')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor1"
                                                    rows="6">{{ $content[1]->description }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-sm-4 mb-3">
                                                <label>Video</label>

                                                <div class="about-mini-img w-100 text-center border rounded-4"
                                                    style="height: 150px;">
                                                    <video width="100%" height="100%" muted="" autoplay=""
                                                        loop="">
                                                        <source src="{{ asset($content[1]->second_image) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-8 mb-3">
                                                <label for="">Choose Video</label>
                                                <div class="drop-zone">
                                                    <span class="drop-zone__prompt "><span>Drop file here</span>
                                                        <div class="mx-4">OR
                                                        </div> <button type="button" class="choose-btn">Browse Files
                                                        </button>
                                                    </span>
                                                    <input type="file" name="second_image" class="drop-zone__input">
                                                    @error('second_image')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <small class="text-danger" style="font-size: 12px;">Note : Video format:
                                                    mp4 only</small>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="submitdata"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-3">
                                    <div class="boxes-field">
                                        <form action="{{ route('admin.dashboard.update', $content[2]->id) }}"
                                            method="POST" enctype="multipart/form-data" class="row">
                                            {!! csrf_field() !!}
                                            @method('PUT')
                                            <div class="col-12 col-sm-3 mb-3">
                                                <div class="form-field">
                                                    <label for=""> Number</label>
                                                    <input name="number" value="{{ $content[2]->number }}"
                                                        type="text"
                                                        class="form-control @error('number') is-invalid @enderror"
                                                        id="">
                                                    @error('number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-9 mb-3">
                                                <div class="form-field">
                                                    <label for="">Sub Heading</label>
                                                    <input name="sub_heading" value="{{ $content[2]->sub_heading }}"
                                                        type="text"
                                                        class="form-control @error('sub_heading') is-invalid @enderror"
                                                        id="">
                                                    @error('sub_heading')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor2"
                                                    rows="6">{{ $content[2]->description }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-sm-4 mb-3 ">
                                                <label>Image</label>

                                                <div class="about-mini-img w-100 text-center">
                                                    <img src="{{ asset($content[2]->image) }}" width="200px"
                                                        class="img-fluid" alt="banner">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-8 mb-3">
                                                <label for="">Choose Image</label>
                                                <div class="drop-zone">
                                                    <span class="drop-zone__prompt "><span>Drop file here</span>
                                                        <div class="mx-4">OR
                                                        </div> <button type="button" class="choose-btn">Browse Files
                                                        </button>
                                                    </span>
                                                    <input type="file" name="image" class="drop-zone__input">
                                                    @error('image')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <small class="text-danger" style="font-size: 12px;">Note : Image
                                                    size should be less than 5MB | Image format:
                                                    jpg, jpeg, png, webp</small>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-field">
                                                    <label for="">CEO</label>
                                                    <input name="heading" value="{{ $content[2]->heading }}"
                                                        type="text"
                                                        class="form-control @error('heading') is-invalid @enderror"
                                                        id="">
                                                    @error('heading')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="submitdata"
                                                    class="btn btn-primary">Update</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us -->

        </div>
    </main>
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
            for (let i = 1; i <= 13; i++) {
                createClassicEditor(`editor${i}`);
            }
        });
        $(document).ready(function() {
            $('#slider_form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let url = $(this).attr('ajax-url');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#slider_form')[0].reset();
                        $('#slider_modal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            toastr.error('Please fill all the required fields.', 'Error');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, error) {
                                var $field = $('#slider_' + field);
                                $field.addClass('is-invalid');
                                $field.next('.invalid-feedback').html(error[0]);
                            });
                        }
                    }
                });
            });
        })

        function slider(content_id, id = null) {
            if (id == null) {
                $('#slider_modal').modal('show');
                $('#slider_form')[0].reset();
                $('#slider_content_id').val(content_id);
            } else {
                $.ajax({
                    type: 'GET',
                    url: `{{ route('admin.others.edit', ':id') }}`.replace(':id', id),
                    success: function(response) {
                        $('#slider_modal').modal('show');
                        $('#slider_id').val(id);
                        $('#slider_content_id').val(content_id);
                        let image = `{{ asset('') }}` + response.image;
                        $('#slider_old_image').attr('src', image);
                    }
                })
            }
        }
    </script>
@endpush
