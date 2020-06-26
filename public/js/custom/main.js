$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    let url = '';

    $(document).on('click', '#dropdownMenu', function (e) {

        e.preventDefault();

        let id = $(this).data('id');
         url = $(this).data('url');

        $.ajax({
            url:url,
            method:'POST',
            data:{
                "id": id,
                "type": 'parent'
            },
            success: function (data) {
                if(data.length > 0) {
                    $('.dropdown-item-' + id).html('');
                    $.each(data, function (key, value) {
                        $('#dropdown-submenu-' + id).append('<a  class="dropdown-item" tabindex="-1" href="#" data-parent="'+id+'" data-id="'+value.id+'"> '+value.title+' </a> <br>');
                    });
                }
            }
        });
    });

    $(document).on('mouseover', '.dropdown-item', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        let parent = $(this).data('parent');
        $.ajax({
            url:url,
            method: 'POST',
            data: {
                "id": id,
                "parent": parent,
                "type": 'child'
            },
            success: function (data) {

                if (data) {
                    $('.dropdown-menu ul').remove();
                    $('#dropdown-submenu-' + parent).append(data);
                }
            }
        });
    })
});

