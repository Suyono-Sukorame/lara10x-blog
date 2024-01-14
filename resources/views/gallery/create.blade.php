@extends('layouts.app-front')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Upload Single/Multiple Images
                            <a href="{{ url('gallery') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ url('gallery/upload') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            class="dropzone"
                            id="myDropzone"
                        >
                            @csrf
                        </form>

                        <h5 id="message"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    {{-- <script>
        Dropzone.options.myDropzone = {
            paramName: "file",
            maxFilesize: 12, // MB
            maxFiles: 2,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: 12MB.",
            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to 2 files.",
            maxfilesexceeded: function (file) {
                this.removeFile(file);
            },
            sending: function (file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function (file, response) {
                $('#message').text(response.message);
            },
            error: function (file, response) {
                $('#message').text('Something Went Wrong! ' + response);
            },
        };
    </script> --}}

    <script type="text/javascript">

        var maxFilesizeVal = 12;
        var maxFilesVal = 10;
    
        // Note that the name "myDragAndDropUploader" is the camelized id of the form.
        Dropzone.options.myDragAndDropUploader = {
    
            paramName:"file",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: "+maxFilesizeVal+"MB.",
            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to "+maxFilesVal+" files.",
            maxfilesexceeded: function(file) {
                this.removeFile(file);
                // this.removeAllFiles(); 
            },
            sending: function (file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function (file, response) {
                $('#message').text(response.success);
                console.log(response.success);
                console.log(response);
            },
            error: function (file, response) {
                $('#message').text('Something Went Wrong! '+response);
                console.log(response);
                return false;
            }
        };
    </script>



    @endsection
