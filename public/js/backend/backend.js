$(document).ready(function () {
    $('#add-color').click(function (e) {
        e.preventDefault;
        $(this).before('<input type="color" name="color[]" id="color-item">').show(1000)
    })

    $('#clear-color').click(function (e) {
        e.preventDefault;
        $(this).parent().find('#color-item').last().hide(1000).remove()
    })


})
