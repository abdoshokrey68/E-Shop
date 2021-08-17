$(document).ready(function () {
    $('.main-orders-box').click(function (e) {
        console.log('done')
        e.preventDefault;
    })

    $('#add-to-card').click(function (e) {
        e.preventDefault;
        var token = $(this).parent().children().attr('id', 'token').val();
        var size = $('#form-add-to-card').children("input[name='size']").val();
        var url = $(this).attr('src')

        alert(size)

        $.ajax({
            url: url,
            data: 'html',
            success:function (date) {
                console.log(date)
            }
        })

        $(this).attr('disabled', '')
    })

    $('#qty_input').prop('disabled', false);
    $('#plus-btn').click(function(e){
        e.preventDefault;
        $('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
    });
    $('#minus-btn').click(function(e){
        e.preventDefault;
        $('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
        if ($('#qty_input').val() == 0) {
            $('#qty_input').val(1);
        }
    });


    // Select Color Item In Items Page
    $('.color-label').click(function () {
        $(this).toggleClass('active');
    })


});

