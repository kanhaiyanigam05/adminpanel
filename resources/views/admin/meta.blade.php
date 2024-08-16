@extends('layout.admin')
@push('title')
    <title>Meta</title>
@endpush
@push('css')
@endpush
@section('admin')
    <main id="main" class="main">
        <h2>Inner SEO</h2>
        <section class="section">
            <div class="main-content-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card">
                                <div class="card-body  mt-5">

                                    <div class="single-table">

                                        <form method="POST" action="{{ route('admin.meta.store') }}" id="seoForm">
                                            {!! csrf_field() !!}
                                            <select class="form-control" name="page_name" id="SelectPage">
                                                <option value="" disabled selected>Select Page</option>
                                                <option value="home">Home</option>
                                                <option value="about">About us</option>
                                                <option value="services">Services</option>\
                                                <option value="blogs">Blogs</option>
                                                <option value="contact">Contact Us</option>
                                            </select>
                                            <div class="mt-5" id="appendForm">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Attach an event handler to the element with ID 'SelectPage'
            $('#SelectPage').on('change', function() {

                // Get the selected value from 'SelectPage'
                let page = $(this).val();

                $.ajax({
                    type: "POST",
                    url: `{{ route('admin.meta.store') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        page: page,
                        checkMeta: true
                    }, // Send data as POST parameters
                    success: function(response) {
                        // Parse the JSON response
                        console.log(response);
                        let seoData = JSON.parse(response);
                        console.log(seoData); // Log the parsed data

                        // Clear the contents of the element with ID 'appendForm'
                        $('#appendForm').html('');

                        // Iterate through the JSON data and create form elements dynamically
                        const fields = ['meta_title', 'meta_keywords', 'meta_description'];
                        fields.forEach(field => {
                            if (seoData.hasOwnProperty(field)) {
                                $('#appendForm').append(`
                                  <div class="mb-3">
                                      <label class="form-label text-capitalize">${field.replace('_', ' ')}</label>
                                      <input type="text" class="form-control" name="${field}" value="${seoData[field]}" required>
                                  </div>
                                `);
                            }
                        });


                        // Append a 'Update SEO' button to the 'appendForm'
                        $('#appendForm').append(
                            `<button type="submit" name="saveSeo" class="btn btn-secondary text-white btn-sm me-2">Update SEO</button>`
                        );
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching Meta data:', error);
                        // Handle the error gracefully in the UI, e.g., by showing a notification
                    }
                });
            });
        });
    </script>
@endpush
