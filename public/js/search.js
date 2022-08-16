$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    search()

    function search() {
        $('#search').on('click', function () {
            $value = $('#search-input').val()
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
            }).done((result) => {

                let data = result.map((item) => {
                    let row =
                        `<tr>
                    <td><a href="/jobs/${item.id}">${item.title}</a></td>
                    <td>${item.company}</td>
                    <td>${item.location}</td>
                    </tr>`
                    return row
                })
                $('#content').html(data)
            }).fail(function (error) {
                console.log(error);
            })
        })
    }
})
