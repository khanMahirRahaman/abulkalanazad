<script>
    "use strict";

    function createInput(data) {
        $('.socmed').append('<div class="col-lg-6" id="socmed' + data.id + '"><div class="form-group"><label> URL ' + data.name + '  </label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"> <i class="' + data.icon + '"></i></span></div><input type="text" name="' + data.slug + '" class="form-control" placeholder="' + data.url + '"><div class="input-group-append" onclick="removeInput(' + data.id + ')"><span class="input-group-text" ><i class="fas fa-times"></i></span></div></div ></div><input type="hidden" name="socmed[]" value="' + data.id + '"></div >');
    }

    function removeInput(id) {
        let input = document.getElementById("socmed" + id);
        input.remove();
    }

    $("select#socialmedia").on('change', function() {
        let dataID = $('select#socialmedia').find(':selected').val() //get id;
        $.ajax({
            url: '/admin/getsocmed',
            data: {
                'id': dataID
            },
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (!document.getElementById('socmed' + data.id)) {
                    createInput(data);
                }
            }
        });
    });


    $("select#role").select2({
        theme:"bootstrap4",
        selectOnClose: false,
        minimumResultsForSearch: -1,
        ajax: {
            url: "{{ route('roles.search') }}",
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.name,
                            text: item.name
                        }
                    })
                }
            }
        }
    });

    $("select#socialmedia").select2({
        theme: "bootstrap4",
        selectOnClose: false,
        tokenSeparators: [",", " "],
        ajax: {
            url: "{{ route('socialmedia.search') }}",
            processResults: function(data) {
                return {
                    results: data.map(function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            }
        }
    });
</script>
