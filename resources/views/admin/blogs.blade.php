@extends('layout.admin')
@push('title')
    <title>Blogs</title>
@endpush
@push('css')
    <style>
        .add-new-blog-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 16px;
        }
    </style>
@endpush
@section('admin')

    <!-- All blogs  -->
    @if (Route::currentRouteName() == 'admin.blogs.index')
        <main id="main" class="main right-side-dash">
            <section class="section ">
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <a href="{{ route('admin.blogs.create') }}" class=""><button type="button"
                                class="btn  btn-success custom_btn">Add New blog</button></a>
                        <a href="{{ route('admin.categories.index') }}" class=""><button type="button"
                                class="btn  btn-outline-success  custom_btn">Category</button></a>
                        <div class="card">
                            <div class="card-body mt-3">
                                <!-- Table with stripped rows -->

                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Blog Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Short Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $blog->name }}</td>
                                                <!-- <td></?php echo $row["b_name"]; ?></td> -->
                                                <td>{{ $blog->category->name }}</td>
                                                <td>{{ $blog->short_description }}</td>
                                                <td>
                                                    <img width="100px" src="{{ asset('/' . $blog->image) }}">
                                                </td>
                                                <td>
                                                    @if ($blog->status == true)
                                                        <form action="{{ route('admin.blogs.status', $blog) }}"
                                                            method="post" class="d-inline-block">
                                                            {!! csrf_field() !!}
                                                            @method('PUT')
                                                            <button class="btn btn-success" type="submit">Active</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.blogs.status', $blog) }}"
                                                            method="post" class="d-inline-block">
                                                            {!! csrf_field() !!}
                                                            @method('PUT')
                                                            <button class="btn btn-secondary"
                                                                type="submit">Deactive</button>
                                                        </form>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a class="btn btn-warning d-inline-block"
                                                        href="{{ route('admin.blogs.edit', $blog) }}"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="post"
                                                        class="d-inline-block">
                                                        {!! csrf_field() !!}
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this Blog?');">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main><!-- End #main -->
        <!-- All blogs End -->
    @endif
    <!-- Add blogs -->
    @if (Route::currentRouteName() == 'admin.blogs.create')
        <main id="main" class="main right-side-dash">

            <div class="container mt-5">
                <h3 class="sec-title">
                    Add a New Blog Form
                </h3>
                <form method="post" action="{{ route('admin.blogs.store') }}" class="add-new-blog-form"
                    enctype="multipart/form-data">

                    {!! csrf_field() !!}
                    <input type="hidden" name="type" value="create-blog">
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Blog Title</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="blogid" placeholder="Enter blog title">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Short Description</label>
                        <input type="text" name="short_description"
                            class="form-control @error('short_description') is-invalid @enderror" id="bloggid"
                            placeholder="Enter blog title">
                        @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="blogCategory" class="form-label">Blog Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                id="blogCategory" required>
                                <option value='' disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="blogDescription" class="form-label">Blog Description</label>
                        <textarea class="form-control description @error('description') is-invalid @enderror" name="description" id="editor1"
                            rows="5" placeholder="Enter blog description"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Choose Image</label>
                        <div class="drop-zone">
                            <span class="drop-zone__prompt "><span>Drop files here</span>
                                <div class="mx-4">OR
                                </div> <button type="button" class="choose-btn">Browse Files </button>
                            </span>
                            <input type="file" name="image"
                                class="drop-zone__input @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- meta  -->

                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Meta Title</label>
                        <input type="text" name="meta_title"
                            class="form-control @error('meta_title') is-invalid @enderror" id="blogid"
                            placeholder="Enter meta title">
                        @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Meta Description</label>

                        <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="2"
                            placeholder="Enter meta description"></textarea>
                        @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords"
                            class="form-control @error('meta_keywords') is-invalid @enderror" id="blogid"
                            placeholder="Enter blog keywords">
                        @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" name="addblog" class="btn btn-primary">Click Here to Add the Blog</button>
                </form>
            </div>
        </main>
    @endif
    <!-- BLOG Update-->
    @if (Route::currentRouteName() == 'admin.blogs.edit')
        <main id="main" class="main right-side-dash">

            <div class="container mt-5">
                <h1 class="text-center text-dark mb-4">Edit a blog Form</h1>

                <form method="post" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
                    @method('PUT')
                    {!! csrf_field() !!}
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label">Blog Title</label>
                        <input type="text" name="name" value="{{ $blog->name }}"
                            class="form-control @error('name') is-invalid @enderror" id="blogid"
                            placeholder="Enter blog title" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Short Description</label>
                        <input type="text" name="short_description" value="{{ $blog->short_description }}"
                            class="form-control @error('short_description') is-invalid @enderror" id="blogid"
                            placeholder="Enter short description" required>
                        @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="blogCategory" class="form-label">Blog Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                id="blogCategory" required>
                                <option value='' disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value='{{ $category->id }}' @if ($category->id == $blog->category_id)  @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="blogDescription" class="form-label">Blog Description</label>
                        <textarea class="form-control description @error('description') is-invalid @enderror" name="description"
                            id="editor2" rows="5" placeholder="Enter blog description" required>{!! $blog->description !!}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Image</label>
                            <div class="about-mini-img w-100 text-center">
                                <img src="{{ asset('/' . $blog->image) }}" alt="" width="200px"
                                    class="img-fluid">
                            </div>
                            <small class="mb-2 text-secondary"><span class="text-dark">Note :</span> Upload
                                image
                                size (1014*495)px | Only jpg
                                Format</small>
                        </div>
                        <div class="col-6">
                            <label for="">Choose Image</label>
                            <div class="drop-zone">
                                <span class="drop-zone__prompt "><span>Drop file here</span>
                                    <div class="mx-4">OR
                                    </div> <button type="button" class="choose-btn">Browse Files </button>
                                </span>
                                <input type="file" name="image"
                                    class="drop-zone__input @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $blog->meta_title }}"
                                class="form-control @error('meta_title') is-invalid @enderror" id="blogid"
                                placeholder="Enter meta title">
                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Meta Description</label>

                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                rows="2" placeholder="Enter meta description">{{ $blog->meta_description }}</textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ $blog->meta_keywords }}"
                                class="form-control @error('meta_keywords') is-invalid @enderror" id="blogid"
                                placeholder="Enter blog keywords">
                            @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div id="imagePreview" class="mb-3"></div>
                        <button type="submit" name="updateblog" class="btn btn-primary">Update</button>
                </form>
            </div>

        </main>
    @endif
    <!-- BLOG Update END-->


    <!-- Add blogs End -->

    <!-- BLOG Category -->
    @if (Route::currentRouteName() == 'admin.categories.index')
        <main id="main" class="main right-side-dash">

            <div class="pagetitle">
            </div><!-- End Page Title -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="sec-title">
                            Category
                        </h3>
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="{{ route('admin.categories.store') }}"
                                    enctype="multipart/form-data" class="row g-3">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="type" value="create-category">
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label">Add New Category</label>
                                        <input type="text" name="name" class="form-control" id="inputNanme4"
                                            required>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label">Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <br>
                                        <button type="submit" name="addblogcategory" class="btn btn-primary">Add
                                            Category</button>
                                    </div>
                                </form><!-- Vertical Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="sec-title">
                            All Category
                        </h3>
                        <div class="card">
                            <div class="card-body">
                                <!-- Table with stripped rows -->

                                <table class="table datatable">
                                    <thead>

                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">blog Category</th>
                                            <th scope="col">Description</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    @if ($category->status == '1')
                                                        <form action="{{ route('admin.categories.status', $category) }}"
                                                            method="post" class="d-inline-block">
                                                            {!! csrf_field() !!}
                                                            @method('PUT')
                                                            <button class="btn btn-success" type="submit">Active</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.categories.status', $category) }}"
                                                            method="post" class="d-inline-block">
                                                            {!! csrf_field() !!}
                                                            @method('PUT')
                                                            <button class="btn btn-secondary"
                                                                type="submit">Deactive</button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                        method="post" class="d-inline-block">
                                                        {!! csrf_field() !!}
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this Blog Category?');">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>
    @endif
    <!-- BLOG Category END-->

    <!-- ======= Footer ======= -->
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
            for (let i = 1; i <= 2; i++) {
                createClassicEditor(`editor${i}`);
            }
        });
    </script>
@endpush
