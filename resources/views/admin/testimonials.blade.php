@extends('layout.admin')
@push('title')
    <title>
        Testimonials</title>
@endpush
@push('css')
    <style>
        .rating {
            display: inline-block;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            float: right;
            color: #888;
            cursor: pointer;
        }

        .rating label:before {
            content: "\2605";
            font-size: 48px !important;
            margin-right: 10px;
        }

        .rating input[type="radio"]:checked~label {
            color: #cb9f2d;
        }

        .rating label:hover,
        .rating label:hover~label {
            color: #cb9f2d;
        }

        .rating label:active,
        .rating label:active~label {
            color: #cb9f2d;
        }
    </style>
@endpush
@section('admin')
    <main id="main" class="main">
        @if (Route::currentRouteName() == 'admin.testimonials.create')
            <section class="section">
                <div class="row">
                    <!-- Testimonials -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="sec-title mt-5">Add Testimonials</h3>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('admin.testimonials.store') }}"
                                            enctype="multipart/form-data" class="row g-3">
                                            {!! csrf_field() !!}
                                            <div class="col-12 mb-3">
                                                <div class="boxes-field">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-1">
                                                                    <label class="mb-1">Full Name</label>
                                                                    <input name="name" value="" type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        placeholder="Full Name" id="inputName" />
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 mb-1">
                                                                    <label class="mb-1">Designation</label>
                                                                    <input name="designation" value="" type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        placeholder="Designation" id="inputName" />
                                                                    @error('designation')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12 mb-1">
                                                                    <label class="mb-1">Review</label>
                                                                    <textarea name="description" placeholder="Description" rows="3"
                                                                        class="form-control @error('name') is-invalid @enderror" id="editor2"></textarea>
                                                                    @error('description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="mb-1 fs-5">Ratings</label><br />
                                                                    <div class="rating">
                                                                        <input type="radio" id="star5"
                                                                            class="fs-2 mx-2" name="rating" value="5"
                                                                            required="" />
                                                                        <label for="star5"></label>
                                                                        <input type="radio" id="star4"
                                                                            class="fs-2 mx-2" name="rating" value="4"
                                                                            required="" />
                                                                        <label for="star4"></label>
                                                                        <input type="radio" id="star3"
                                                                            class="fs-2 mx-2" name="rating" value="3"
                                                                            required="" />
                                                                        <label for="star3"></label>
                                                                        <input type="radio" id="star2"
                                                                            class="fs-2 mx-2" name="rating" value="2"
                                                                            required="" />
                                                                        <label for="star2"></label>
                                                                        <input type="radio" id="star1"
                                                                            class="fs-2 mx-2" name="rating" value="1"
                                                                            required="" />
                                                                        <label for="star1"></label>
                                                                    </div>
                                                                    @error('rating')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-3 ">
                                                                    <label>Image</label>

                                                                    <div class="about-mini-img w-100 text-center">
                                                                        <img src="" width="200px" class="img-fluid"
                                                                            alt="banner">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label for="">Choose Image</label>
                                                                    <div class="drop-zone">
                                                                        <span class="drop-zone__prompt "><span>Drop file
                                                                                here</span>
                                                                            <div class="mx-4">OR
                                                                            </div> <button type="button"
                                                                                class="choose-btn">Browse Files
                                                                            </button>
                                                                        </span>
                                                                        <input type="file" name="image"
                                                                            class="drop-zone__input">
                                                                    </div>
                                                                    @error('image')
                                                                        <p class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </p>
                                                                    @enderror
                                                                    <small class="text-danger"
                                                                        style="font-size: 12px;">Note :
                                                                        Image
                                                                        size should be less than 5MB | Image format:
                                                                        jpg, jpeg, png, webp</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <button type="submit" name="submitdata"
                                                                class="btn btn-primary">Add
                                                                Review</button>
                                                        </div>
                                                    </div>

                                                </div>
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
        @if (Route::currentRouteName() == 'admin.testimonials.index')
            <section class="section mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card rounded-5">
                            <div class="card-body pt-2">
                                <style>
                                    .review-column {
                                        width: 25%;
                                    }
                                </style>

                                <div
                                    class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-top">
                                        <a class="btn btn-warning mb-3"
                                            href="{{ route('admin.testimonials.create') }}">Add New Testimonials</a>
                                        <div class="datatable-dropdown">
                                            <label>
                                                <select class="datatable-selector">
                                                    <option value="5">5</option>
                                                    <option value="10" selected="">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                </select>
                                                entries per page
                                            </label>
                                        </div>
                                        <div class="datatable-search">
                                            <input class="datatable-input" placeholder="Search..." type="search"
                                                title="Search within table" />
                                        </div>
                                    </div>
                                    <div class="datatable-container table-responsive">
                                        <table class="table datatable datatable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="true" style="width: 2.2556390977443606%;"><a
                                                            href="#" class="datatable-sorter">#</a></th>
                                                    <th data-sortable="true" style="width: 10.731373889268626%;"><a
                                                            href="#" class="datatable-sorter">Name</a></th>
                                                    <th data-sortable="true" style="width: 10.731373889268626%;"><a
                                                            href="#" class="datatable-sorter">Designation</a></th>
                                                    <th data-sortable="true" style="width: 55.01367053998633%;"><a
                                                            href="#" class="datatable-sorter">Review</a></th>
                                                    <th data-sortable="true" style="width: 10.399863294600136%;"><a
                                                            href="#" class="datatable-sorter">Rating</a></th>
                                                    <th data-sortable="true" style="width: 11.483253588516746%;"><a
                                                            href="#" class="datatable-sorter">Action</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($testimonials as $testimonial)
                                                    <tr data-index="0">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $testimonial->name }}</td>
                                                        <td>{{ $testimonial->designation }}</td>
                                                        <td>{!! $testimonial->description !!}</td>
                                                        <td>
                                                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-warning"
                                                                href="{{ route('admin.testimonials.edit', $testimonial->id) }}"><iconify-icon
                                                                    icon="material-symbols-light:edit-square-outline-sharp"
                                                                    class="edit-delete-icon">
                                                                </iconify-icon></a>
                                                            <form class="d-inline-block"
                                                                action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                                                method="post">
                                                                {!! csrf_field() !!}
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit"
                                                                    onclick="return confirm('Are you sure you want to delete this testimonials?');"><iconify-icon
                                                                        icon="material-symbols-light:delete-outline-sharp"
                                                                        class="edit-delete-icon">
                                                                    </iconify-icon></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datatable-bottom">
                                        <div class="datatable-info">Showing 1 to 3 of 3 entries</div>
                                        <nav class="datatable-pagination">
                                            <ul class="datatable-pagination-list"></ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (Route::currentRouteName() == 'admin.testimonials.edit')
            <section class="section">
                <div class="row">
                    <!-- Testimonials -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="sec-title mt-5">Edit Testimonial</h3>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST"
                                            action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                                            enctype="multipart/form-data" class="row g-3">
                                            {!! csrf_field() !!}
                                            @method('PUT')
                                            <div class="col-12 mb-3">
                                                <div class="boxes-field">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-1">
                                                                    <label class="mb-1">Full Name</label>
                                                                    <input name="name"
                                                                        value="{{ $testimonial->name }}" type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        placeholder="Full Name" id="inputName" />
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 mb-1">
                                                                    <label class="mb-1">Designation</label>
                                                                    <input name="designation"
                                                                        value="{{ $testimonial->designation }}"
                                                                        type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        placeholder="Designation" id="inputName" />
                                                                    @error('designation')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12 mb-1">
                                                                    <label class="mb-1">Review</label>
                                                                    <textarea name="description" placeholder="Description" rows="3"
                                                                        class="form-control @error('name') is-invalid @enderror" id="editor1">{{ $testimonial->description }}</textarea>
                                                                    @error('description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="mb-1 fs-5">Ratings</label><br />
                                                                    <div class="rating">
                                                                        <input type="radio" id="star5"
                                                                            class="fs-2 mx-2" name="rating"
                                                                            value="5" required=""
                                                                            @if ($testimonial->rating == 5) checked @endif />
                                                                        <label for="star5"></label>
                                                                        <input type="radio" id="star4"
                                                                            class="fs-2 mx-2" name="rating"
                                                                            value="4" required=""
                                                                            @if ($testimonial->rating == 4) checked @endif />
                                                                        <label for="star4"></label>
                                                                        <input type="radio" id="star3"
                                                                            class="fs-2 mx-2" name="rating"
                                                                            value="3" required=""
                                                                            @if ($testimonial->rating == 3) checked @endif />
                                                                        <label for="star3"></label>
                                                                        <input type="radio" id="star2"
                                                                            class="fs-2 mx-2" name="rating"
                                                                            value="2" required=""
                                                                            @if ($testimonial->rating == 2) checked @endif />
                                                                        <label for="star2"></label>
                                                                        <input type="radio" id="star1"
                                                                            class="fs-2 mx-2" name="rating"
                                                                            value="1" required=""
                                                                            @if ($testimonial->rating == 1) checked @endif />
                                                                        <label for="star1"></label>
                                                                    </div>
                                                                    @error('rating')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-3 ">
                                                                    <label>Image</label>

                                                                    <div class="about-mini-img w-100 text-center">
                                                                        <img src="{{ asset($testimonial->image) }}"
                                                                            width="200px" class="img-fluid"
                                                                            alt="banner">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label for="">Choose Image</label>
                                                                    <div class="drop-zone">
                                                                        <span class="drop-zone__prompt "><span>Drop file
                                                                                here</span>
                                                                            <div class="mx-4">OR
                                                                            </div> <button type="button"
                                                                                class="choose-btn">Browse Files
                                                                            </button>
                                                                        </span>
                                                                        <input type="file" name="image"
                                                                            class="drop-zone__input">
                                                                    </div>
                                                                    @error('image')
                                                                        <p class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </p>
                                                                    @enderror
                                                                    <small class="text-danger"
                                                                        style="font-size: 12px;">Note :
                                                                        Image
                                                                        size should be less than 5MB | Image format:
                                                                        jpg, jpeg, png, webp</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <button type="submit" name="submitdata"
                                                                class="btn btn-primary">Update
                                                                Review</button>
                                                        </div>
                                                    </div>

                                                </div>
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
@endsection
@push('js')
    <script>
        const ratingInputs = document.querySelectorAll('input[name="rating"]');

        ratingInputs.forEach((input) => {
            input.addEventListener("change", (event) => {
                const selectedRating = event.target.value;
                console.log("Selected rating:", selectedRating);
            });
        });
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
            for (let i = 1; i <= 2; i++) {
                createClassicEditor(`editor${i}`);
            }
        });
    </script>
@endpush
