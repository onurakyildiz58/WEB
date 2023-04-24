$(document).ready(function (){
    loadcard();
    loadWish();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loadcard()
    {
        $.ajax({
            method: 'GET',
            url: '/load-cart-data',
            success: function (response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                //console.log(response.count);
            }
        });
    }
    function loadWish()
    {
        $.ajax({
            method: 'GET',
            url: '/load-wishlist-data',
            success: function (response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
                //console.log(response.count);
            }
        });
    }
});
