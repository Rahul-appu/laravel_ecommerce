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
<div class="card card-primary mt-3">
    <!-- Card Header with Title and Tools -->
    <div class="card-header">
        <h3 class="card-title">Product Image Adding</h3>
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
                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                        </div>
                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="product_name">
                      
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
                        <input type="text" id="product_desc" name="product_desc" class="form-control" placeholder="Product Description">
                      
                        <div id="moduleError" class="text-danger mt-2"></div> <!-- Placeholder for error message -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5"> <!-- Centering using Bootstrap classes -->
                <div class="col-md-6 col-sm-8 text-center">
                    <!-- Styled File Input -->
                    <label for="fileInput" 
                           style="
                               display: inline-block; 
                               background-color: #007bff; 
                               color: #fff; 
                               padding: 10px 20px; 
                               font-size: 16px; 
                               border-radius: 5px; 
                               cursor: pointer; 
                               box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <i class="fas fa-upload"></i> Choose Files
                    </label>
                    <input type="file" id="fileInput" class="form-control mb-3" multiple 
                           style="
                               visibility: hidden; 
                               position: absolute; 
                               z-index: -1;">
                    
                    <!-- Preview Container -->
                    <div id="previewContainer" class="mb-3"></div>
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

//       $(document).ready(function() {
//         $('#modulesTable').DataTable({
//     processing: true,
//     serverSide: true,
//     ajax: '{{ url("/admin/add_menu") }}',
//     columns: [
//         { data: 'id', name: 'id' },
//         { data: 'module_id', name: 'module_id' },
//         { data: 'controller', name: 'controller' },
//         { data: 'path', name: 'path' },
//         { data: 'actions', name: 'actions', orderable: false, searchable: false }
//     ],
//     language: {
//         processing: `
//             <div style="display: flex; align-items: center; justify-content: center; height: 100%; flex-direction: column;">
//                 <i class="fa fa-spinner fa-spin" style="font-size: 40px; color: #007bff; margin-bottom: 15px;"></i>
//             </div>
//         `    }
// });
// });


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
    // if (validateForm()) {
        conform_action().then((result) => {
            if (result.isConfirmed) {
                // Create FormData object
                let formData = new FormData();

                // Append serialized form data to FormData
                const formSerialized = $('#moduleForm').serializeArray();
                formSerialized.forEach(field => {
                    formData.append(field.name, field.value);
                });

                // Append file input to FormData
                const fileInput = $('#fileInput')[0]; // Replace 'fileInput' with your input file's ID
                if (fileInput.files.length > 0) {
                    for (let i = 0; i < fileInput.files.length; i++) {
                        formData.append('files[]', fileInput.files[i]);
                    }
                }

                // AJAX request with FormData
                $.ajax({
                    url: '{{ url("/admin/product_image") }}', // Correct URL using Laravel's URL helper
                    method: 'POST',
                    data: formData,
                    processData: false, // Prevent jQuery from transforming the data
                    contentType: false, // Ensure the correct content type for file uploads
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
                                text: response.msg,
                            });
                        }
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
    // }
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


    $(document).ready(function () {
    const previewContainer = $("#previewContainer");

    // Preview selected files
    $("#fileInput").on("change", function () {
        const files = this.files;
        previewContainer.html(""); // Clear previous previews

        if (files.length === 0) {
            previewContainer.append("<p>No files selected.</p>");
            return;
        }

        // Loop through files and generate previews
        Array.from(files).forEach((file) => {
            const reader = new FileReader();

            // When the file is read, create an image or show file name
            reader.onload = function (e) {
                const fileType = file.type.split("/")[0];
                if (fileType === "image") {
                    const img = $("<img>")
                        .attr("src", e.target.result)
                        .addClass("img-thumbnail mb-2")
                        .css({
                            width: "100px",
                            height: "100px",
                            objectFit: "cover",
                            marginRight: "10px"
                        });
                    previewContainer.append(img);
                } else {
                    const fileName = $("<p>").text(file.name).addClass("text-muted");
                    previewContainer.append(fileName);
                }
            };

            reader.readAsDataURL(file); // Read file content
        });
    });
});

</script>
@endsection
