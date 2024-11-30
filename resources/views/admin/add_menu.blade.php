@extends('auth.layouts')

@section('content')
<style>
    .is-invalid {
        border-color: #dc3545; /* Red border for error */
    }

    .text-danger {
        color: #dc3545; /* Red color for error messages */
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card card-primary">
    <!-- Card Header with Title and Tools -->
    <div class="card-header">
        <h3 class="card-title">Add Menu</h3>
    </div>
    <div class="card-body">
        <!-- Form Start -->
        <form id="moduleForm" name="moduleForm">
            @csrf
            <div class="row justify-content-center"> <!-- Centering using Bootstrap classes -->
                <div class="col-md-6 col-sm-8"> <!-- Responsive width on different screen sizes -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <!-- Using <span> for the icon -->
                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                        </div>
                        <select name="module" id="module" class="form-control">
                            <option value="">select</option>
                         
                           @foreach ($modules_detals as $details)
                           <option value="{{$details->module_id}}">{{$details->module_name}}</option>
                               
                           @endforeach
                        </select>
                        <div id="moduleError" class="text-danger mt-2"></div> <!-- Placeholder for error message -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center"> <!-- Centering using Bootstrap classes -->
                <div class="col-md-6 col-sm-8"> <!-- Responsive width on different screen sizes -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <!-- Using <span> for the icon -->
                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                        </div>
                        <input type="text" id="controller_id" name="controller_id" class="form-control" placeholder="Controller Name">
                        <div id="moduleError" class="text-danger mt-2"></div> <!-- Placeholder for error message -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center"> <!-- Centering using Bootstrap classes -->
                <div class="col-md-6 col-sm-8"> <!-- Responsive width on different screen sizes -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <!-- Using <span> for the icon -->
                            <span class="input-group-text"><i class="fa fa-home"></i></span>
                        </div>
                        <input type="text" id="path" name="path" class="form-control" placeholder="path">
                        <div id="moduleError" class="text-danger mt-2"></div> <!-- Placeholder for error message -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center"> <!-- Centering the button -->
                <div class="col-md-6 col-sm-8 text-center">
                    <button type="button" id="saveButton" class="btn btn-outline-success" style="width: auto; max-width: 200px;" onclick="create_function()">Save</button>
                </div>
            </div>
        </form>
        <div class="container mt-5">
            <table id="modulesTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Module</th>
                        <th>controller</th>
                        <th>Path</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- DataTable will populate this section -->
                </tbody>
            </table>
        </div>
        <!-- Form End -->
    </div>
</div>

<script>
      window.APP_URL = '{{ config('app.url') }}';

      $(document).ready(function() {
        $('#modulesTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ url("/admin/add_menu") }}',
    columns: [
        { data: 'id', name: 'id' },
        { data: 'module_id', name: 'module_id' },
        { data: 'controller', name: 'controller' },
        { data: 'path', name: 'path' },
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        processing: `
            <div style="display: flex; align-items: center; justify-content: center; height: 100%; flex-direction: column;">
                <i class="fa fa-spinner fa-spin" style="font-size: 40px; color: #007bff; margin-bottom: 15px;"></i>
            </div>
        `    }
});
});


      function conform_action() {
    return Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to save this module?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'No, cancel!'
    });
}
function create_function() {
    if (validateForm()) {
        conform_action().then((result) => {
            if (result.isConfirmed) {
                // Proceed with AJAX request if confirmed
                $.ajax({
                    url: '{{ url("/admin/add_menu") }}', // Correct URL using Laravel's URL helper
                    method: 'POST',
                    data: $('#moduleForm').serialize(), // Explicitly serialize the form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                    },
                    success: function(response) {
                        if (response.err == 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.msg,
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text:  response.msg,
                            });
                        }
                        $('#module').val(''); // Clear the input field
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred. Please try again.',
                        });
                    }
                });
            }
        });
    }
}


function validateForm() {
        var moduleName = $('#module').val().trim();
        // Validation rule: Module Name is required
        if (moduleName === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                text: 'Please enter the mandatory details.',
            });
            return false; // Prevent form submission if validation fails
        }

        return true; // Proceed with form submission if validation passes
    }
</script>
@endsection
