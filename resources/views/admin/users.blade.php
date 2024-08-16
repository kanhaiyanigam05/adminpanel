@extends('layout.admin')
@push('title')
    <title>Users</title>
@endpush
@section('admin')
    <!-- End Sidebar-->
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create User Permissions</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">User Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="inputText"
                                                    name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="inputText"
                                                    name="email" value="{{ old('email') }}" required>
                                                <p class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="inputPassword" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="confirmPassword" name="password_confirmation" required>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row mb-3">
                                            <div class="col-sm-10 offset-sm-2">
                                                <h5>Permissions</h5>
                                                <div class="form-check">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="permissions_{{ $permission->id }}" name="permissions[]"
                                                                value="{{ $permission->id }}">
                                                            <label class="form-check-label me-3"
                                                                for="permissions_{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Create User</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                            </form>
                            <!-- End Horizontal Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- users -->
        <section class="section ">
            <div class="row mt-3">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body mt-3">


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>

                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit Permissions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <!-- <td></?php echo $row["b_name"]; ?></td> -->
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->status == true)
                                                    <form action="{{ route('admin.users.status', $user->id) }}"
                                                        method="post" class="d-inline-block">
                                                        {!! csrf_field() !!}
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="badge bg-success text-light">Active</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.users.status', $user->id) }}"
                                                        method="post" class="d-inline-block">
                                                        {!! csrf_field() !!}
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="badge bg-secondary text-light">Deactive</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="badge bg-warning text-dark"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#verticalycentered-{{ $user->id }}">
                                                    Edit Permission
                                                </button>
                                                <div class="modal fade" id="verticalycentered-{{ $user->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Permissions</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('admin.users.update', $user->id) }}"
                                                                    method="POST">
                                                                    {!! csrf_field() !!}
                                                                    @method('PUT')

                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-10">
                                                                            <div class="form-check">
                                                                                @foreach ($permissions as $permission)
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            id="permission{{ $user->id }}_{{ $loop->iteration }}"
                                                                                            name="permission[]"
                                                                                            value="{{ $permission->id }}"
                                                                                            @if ($user->permissions->contains($permission->id)) checked @endif>
                                                                                        <label
                                                                                            class="form-check-label me-3"
                                                                                            for="permission{{ $user->id }}_{{ $loop->iteration }}">
                                                                                            {{ $permission->name }}
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <button type="submit" name="updatesubmit"
                                                                                    class="btn btn-primary">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
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
    <!-- ======= Footer ======= -->
@endsection
