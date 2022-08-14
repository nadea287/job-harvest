$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    search()
    function search() {
        $('#search').on('click', function () {
            console.log('here');
            $value = $('#search-input').val()
            console.log($value);
            if ($value) {
                $('.all-data').hide()
                $('.search-data').show()
            } else {
                $('.all-data').show()
                $('.search-data').hide()
            }
            $.ajax({
                url: 'search',
                method: 'GET',
                data: {search: $value},
            }).done(function (result) {
                console.log(result);
                $('#content').html(result)
            }).fail(function (error) {
                console.log(error);
            })
        })
    }
})
