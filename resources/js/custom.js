$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------------------------------------------
    --------------------------------------------
    When click user on Show Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '#delete-user', function () {

        let userURL = $(this).data('url');
        let trObj = $(this);

        if (confirm("Are you sure you want to remove this user?") === true) {
            $.ajax({
                url: userURL,
                type: 'DELETE',
                dataType: 'json',
                success: function (data) {
                    alert(data.success);
                    trObj.parents("tr").remove();
                }
            });
        }

    });

});
