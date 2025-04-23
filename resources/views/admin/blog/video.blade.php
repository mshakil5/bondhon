@extends('admin.layouts.admin')

@section('content')

<section class="content" id="newBtnSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <button type="button" class="btn btn-secondary my-3" id="newBtn">Add new</button>
            </div>
        </div>
    </div>
</section>

<section class="content mt-3" id="addThisFormContainer">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #fdf3ee">
                    <div class="card-header">
                        <h3 class="card-title" id="header-title">Add new blog</h3>
                    </div>
                    <div class="card-body">
                        <form id="createThisForm">
                            @csrf
                            <input type="hidden" class="form-control" id="codeid" name="codeid">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select class="form-control" id="blog_category_id" name="blog_category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title">
                            </div>
                            <div class="form-group">
                                <label>Upload Thumbnail (max 5MB)</label>
                                <input type="file" name="thumbnail" id="thumbnailUpload" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Upload Video (max 40MB)</label>
                                <input type="file" name="video" id="videoUpload" accept="video/*">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="addBtn" class="btn btn-secondary" value="Create">Create</button>
                        <button type="submit" id="FormCloseBtn" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content" id="contentContainer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #fdf3ee">
                    <div class="card-header">
                        <h3 class="card-title">Video Blogs</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Video</th>
                                    <th>Status</th>
                                    <th>Action</ th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $blog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>
                                        <img 
                                            src="{{ $blog->thumbnail ? asset($blog->thumbnail) : 'https://ionicframework.com/docs/img/demos/thumbnail.svg' }}" 
                                            alt="Thumbnail"
                                            style="max-width: 300px; width: 100%; height: auto; cursor: pointer;"
                                            onclick="this.outerHTML='<video src=\'{{ asset($blog->video) }}\' controls autoplay style=\'max-width: 300px; width: 100%; height: auto;\'></video>'"
                                        >
                                    </td>                                                                        
                                  
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input toggle-status" id="customSwitchStatus{{ $blog->id }}" data-id="{{ $blog->id }}" {{ $blog->status == 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitchStatus{{ $blog->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a id="EditBtn" rid="{{ $blog->id }}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                        <a id="deleteBtn" rid="{{ $blog->id }}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                        @if ($blog->comments()->count() > 0) 
                                            <a href="{{ route('blog.comments', $blog->id) }}" title="View Comments">
                                                <i class="fa fa-comments" style="color: green;font-size:16px;"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Styles -->
<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet" />
@endsection

@section('script')
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script>
  FilePond.registerPlugin(
      FilePondPluginFileValidateSize,
      FilePondPluginFileValidateType,
      FilePondPluginMediaPreview,
      FilePondPluginImagePreview
  );

  FilePond.create(document.querySelector('#videoUpload'), {
      acceptedFileTypes: ['video/*'],
      maxFileSize: '40MB',
      allowMultiple: false,
      allowReorder: false,
      allowProcess: true,
  });

  FilePond.create(document.querySelector('#thumbnailUpload'), {
      acceptedFileTypes: ['image/*'],
      maxFileSize: '5MB',
      allowMultiple: false,
      allowReorder: false,
      allowProcess: true,
  });

</script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({ height: 300 });
        $("#addThisFormContainer").hide();
        $("#newBtn").click(function() {
            clearform();
            $("#newBtn").hide(100);
            $("#addThisFormContainer").show(300);
        });
        $("#FormCloseBtn").click(function() {
            $("#addThisFormContainer").hide(200);
            $("#newBtn").show(100);
            clearform();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = "{{ URL::to('/admin/video-blogs') }}";
        var upurl = "{{ URL::to('/admin/video-blogs-update') }}";

        $("#addBtn").click(function() {
            if ($(this).val() == 'Create') {
                var requiredFields = ['#blog_category_id', '#title'];
                for (var i = 0; i < requiredFields.length; i++) {
                    if ($(requiredFields[i]).val() === '') {
                        showError('Please fill all required fields.');
                        return;
                    }
                }

                var form_data = new FormData();
                form_data.append("blog_category_id", $("#blog_category_id").val());
                form_data.append("title", $("#title").val());
                var pondFiles = FilePond.find(document.querySelector('#videoUpload')).getFiles();
                if (pondFiles.length === 0) {
                    showError('Please upload a video.');
                    return;
                }
                form_data.append('video', pondFiles[0].file);

                var thumbFiles = FilePond.find(document.querySelector('#thumbnailUpload')).getFiles();
                if (thumbFiles.length > 0) {
                    form_data.append('thumbnail', thumbFiles[0].file);
                }

                $("#addBtn").prop('disabled', true).html('Uploading...');

                $.ajax({
                    url: url,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(d) {

                      if (d.status === 422) {
                            showError(d.message);
                            return;
                        }
                        $("#addBtn").prop('disabled', false).html('Create');
                        showSuccess('Blog created successfully.');
                        reloadPage(2000);
                    },
                    error: function(xhr, status, error) {
                        $("#addBtn").prop('disabled', false).html('Create');
                        console.error(xhr.responseText);
                        showError('An error occurred. Please try again.');
                    }
                });
            }

            if ($(this).val() == 'Update') {
                var requiredFields = ['#blog_category_id', '#title'];
                for (var i = 0; i < requiredFields.length; i++) {
                    if ($(requiredFields[i]).val() === '') {
                        showError('Please fill all required fields.');
                        return;
                    }
                }

                var form_data = new FormData();
                form_data.append("blog_category_id", $("#blog_category_id").val());
                form_data.append("title", $("#title").val());
                var pondFiles = FilePond.find(document.querySelector('#videoUpload')).getFiles();
                if (pondFiles.length === 0) {
                    showError('Please upload a video.');
                    return;
                }
                form_data.append('video', pondFiles[0].file);

                var thumbFiles = FilePond.find(document.querySelector('#thumbnailUpload')).getFiles();
                
                if (thumbFiles.length > 0) {
                    form_data.append('thumbnail', thumbFiles[0].file);
                }

                form_data.append("codeid", $("#codeid").val());

                for (var pair of form_data.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                // return;
                $("#addBtn").prop('disabled', true).html('Uploading...');

                $.ajax({
                    url: upurl,
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(d) {
                        $("#addBtn").prop('disabled', false).html('Update');
                        showSuccess('Blog updated successfully.');
                        reloadPage(2000);
                    },
                    error: function(xhr, status, error) {
                        $("#addBtn").prop('disabled', false).html('Update');
                        console.error(xhr.responseText);
                        showError('An error occurred. Please try again.');
                    }
                });
            }
        });

        $("#contentContainer").on('click', '#EditBtn', function() {
            var codeid = $(this).attr('rid');
            var info_url = url + '/' + codeid + '/edit';
            $.get(info_url, {}, function(d) {
                populateForm(d.data, d.categories);
                pagetop();
            });
        });

        $("#contentContainer").on('click', '#deleteBtn', function() {
            if (!confirm('Sure?')) return;
            var codeid = $(this).attr('rid');
            var info_url = url + '/' + codeid;
            $.ajax({
                url: info_url,
                method: "GET",
                type: "DELETE",
                data: {},
                success: function(d) {
                    showSuccess('Blog deleted successfully.');
                    reloadPage(2000);
                },
                error: function(xhr, status, error) {
                    showError('An error occurred. Please try again.');
                }
            });
        });

        function populateForm(data, categories) {
            $("#blog_category_id").val(data.blog_category_id);
            $("#title").val(data.title);
            $("#codeid").val(data.id);
            $("#addBtn").val('Update');
            $("#addBtn").html('Update');
            $("#header-title").html('Update blog');
            $("#addThisFormContainer").show(300);
            $("#newBtn").hide(100);

            const videoPond = FilePond.find(document.querySelector('#videoUpload'));
            const thumbPond = FilePond.find(document.querySelector('#thumbnailUpload'));

            if (videoPond) videoPond.removeFiles();
            if (thumbPond) thumbPond.removeFiles();

            if (data.video) {
                const videoUrl = data.video;
                const videoName = videoUrl.split('/').pop();

                fetch(videoUrl)
                    .then(res => res.blob())
                    .then(blob => {
                        const videoFile = new File([blob], videoName, { type: blob.type });
                        videoPond.addFile(videoFile);
                    });
            }

            if (data.thumbnail) {
                const thumbUrl = data.thumbnail;
                const thumbName = thumbUrl.split('/').pop();

                fetch(thumbUrl)
                    .then(res => res.blob())
                    .then(blob => {
                        const thumbFile = new File([blob], thumbName, { type: blob.type });
                        thumbPond.addFile(thumbFile);
                    });
            }

        }

        function clearform() {
            $('#createThisForm')[0].reset();
            $("#addBtn").val('Create');
            $("#addBtn").html('Create');
            $("#header-title").html('Add new blog');
            FilePond.find(document.querySelector('#videoUpload')).removeFiles();
        }

        $(document).on('change', '.toggle-status', function() {
            var blogId = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '/admin/video-blogs/' + blogId + '/status',
                method: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 200) {
                        showSuccess(response.message);
                    } else {
                        showError('Failed to update status.');
                    }
                },
                error: function(xhr, status, error) {
                    showError('An error occurred. Please try again.');
                }
            });
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $("#image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#preview-image").attr("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection