<script>
$(function () {
    "use strict";

    // VISIBILITY
    $(document).on('change', '#visibility', function(){
        let indexVisible = document.getElementById("visibility").selectedIndex;
        let info = []
        info[0] = "{{ __('post.help_public_visibility') }}";
        info[1] = "{{ __('post.help_private_visibility') }}";
        $(".visibility-msg").html(info[indexVisible]);
    });

    // SELECT LANGUAGE
    $('#language').select2({
        theme: 'bootstrap4',
    });

    $('#language').on('select2:select', function (e) {
        let id = e.params.data.id;
        $('#language').val(id);
    });

    // SELECT CATEGORY
    $('#categories').select2({
        theme: 'bootstrap4',
        tokenSeparators: [','],
        ajax: {
            url: '{{ route('categories.search') }}',
            dataType: 'json',
            data: function (params) {
                let query = {
                    q: params.term,
                    lang: $('[name=language]').val()
                }
                return query;
            },
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            },
            cache: true
        }
    });

    // ADD CATEGORY
    $('#parent').select2({
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
            url: '{{ route('categories.search') }}',
            dataType: 'json',
            data: function (params) {
                let query = {
                    q: params.term,
                    lang: $('[name=language]').val()
                }
                return query;
            },
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            },
            cache: true
        }
    });

    $(document).on("click", "#btn-submit-add-category", function(e) {
        e.preventDefault();

        let formData = {
            name: $('#input-add-category').val(),
            parent: $('#parent').val(),
            lang: $('[name=language]').val()
        }

        $("#insert button[type=submit]").html("<div class=\"spinner-grow spinner-grow-sm\" role=\"status\"><span class=\"sr-only\">{{ __('general.loading') }}</span></div> {{ __('general.sending') }}");
        $("input").removeClass("is-invalid")
        $(".invalid-feedback").html("");

        $.ajax({
            url: "{{ route('posts.categories.store') }}",
            method: 'POST',
            data: formData,
            success: function(response) {
                notification(response);
                if (response.errors) {
                    if(response.errors.name) {
                        $("#input-add-category").addClass("is-invalid");
                        $(".msg-error-name-category").html(response.errors.name);
                    }
                }else if(response.error_exists){
                    $("#input-add-category").addClass("is-invalid");
                    $(".msg-error-name-category").html(response.error_exists);
                } else {
                    $('#input-add-category').val('');
                    $('#parent').select2('val','');
                }
            }
        });
    });

    // TEXT EDITOR
    $('textarea[name=content]').summernote({
        placeholder: '{{ __('post.placeholder_content') }}',
        height: 300,
        styleTags: [
        'p',
        { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
        ],
        prettifyHtml: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'add-text-tags', 'highlight', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'videoAttributes']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        imageAttributes: {
          	icon: '<i class="note-icon-pencil"/>',
        	figureClass: 'figureClass',
        	figcaptionClass: 'captionClass',
        	captionText: 'Caption Goes Here.',
        	manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
        },
        lang: 'en-US',
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageAttributes']],
            ],
        },
        callbacks: {
            onImageUpload: function(image) {
                let editor;
                editor = $(this);
                uploadImageContent(image[0], editor);
            },
            onMediaDelete: function(target) {
                deleteImage(target[0].src);
            }
        },
    });

    // SUMMARY
    {{--$('textarea[name=summary]').summernote({--}}
    {{--    placeholder: '{{ __('post.placeholder_summary') }}',--}}
    {{--    height: 100,--}}
    {{--    tabsize: 1,--}}
    {{--    toolbar: [--}}
    {{--        ['style', ['bold', 'italic', 'underline', 'clear']],--}}
    {{--        ['font', ['strikethrough', 'superscript', 'subscript']],--}}
    {{--    ],--}}
    {{--});--}}

    // UPLOAD IMAGE CONTENT
    function uploadImageContent(image, editor) {
        let data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "{{ route('uploadImage') }}",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function(url) {
                let image = $('<img>').attr('src', url);
                $(editor).summernote("insertNode", image[0]);
            },
            error: function(data) {}
        })
    }

    // REMOVE IMAGE
    function deleteImage(src) {
        $.ajax({
            data: {
                image: src
            },
            type: "POST",
            url: "{{ route('removeUploadImage') }}",
            cache: false,
            success: function(response) {}
        });
    }
});

</script>
