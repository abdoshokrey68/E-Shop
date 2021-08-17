$(document).ready(function () {
    $('#search').on('input', function () {
        // Set Header Text Value = Search Input
        console.log($(this).val())
        $('#searchvalue').html($(this).val());
        var search = $(this).val();
        var url = $(this).closest('div').attr('data-vist')
        var list = $(this).attr('list');
        $('.mylist').remove()
        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'html',
            data: {'search':search},
            success: function (data) {
                var obj = JSON.parse(data);
                for (let i=0; i < obj['data'].length; i++) {
                    $('#'+list).append('<option value"'+obj['data'][i]['id']+'" class="mylist">' + obj['data'][i]['name'] + '</option>')
                    if(i > 5) {
                        break;
                    }
                } //End For Search Data List

                $('.my-store').remove()
                if (obj['data'].length == 0) {
                    $('#all-stores').html(`<h3 class="text-danger text-center h4 mt-4"> Search Request Is Empty </h3>`)
                    // console.log('Request Value Is Empty');
                } else {
                    $('#all-stores').html(' ')
                    for (let x=0; x < obj['data'].length; x++) {
                        // console.log( '============ My Store Request : ' + obj['data'][x]['name'])
                        var image = '';
                        if (obj['data'][x]['image'] == 'null' && obj['data'][x]['image'] == '') {
                            image = 'default.jpg';
                        } else {
                            image = obj['data'][x]['image'];
                        }
                        $('#all-stores').append(`
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-store">
                            <div class="icon-box col-md-12">
                                <div class="" style="height: 200px">
                                    <a href="store/${obj['data'][x]['id']}">
                                        <img src="http://first.local/img/stores/${image}" alt="Store Image">
                                    </a>
                                </div>
                                <h4 class="mt-3"><a href="store/${obj['data'][x]['id']}"> ${obj['data'][x]['name']} </a></h4>
                            </div>
                        </div>
                        `)
                    } // End For Append the Request Store
                }
            }
        })
    })

    $('.session').delay(5000).hide(2000)

})
