jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// jQuery('ul.products li.product-list-view').each(function (i) {
//     var crid = jQuery(this).find('.current_bid_val').attr('current_bid_val');
//     var byid = jQuery(this).find('.buyitnowPrice_').val();
//     console.log(crid, byid);
//     if (crid > byid) {
//         $(this).find('.buyitnow_btn').hide();
//     }
// });



jQuery(document).ready(function(e){
    jQuery('.add_to_cart_form').on('submit', function(e){
        e.preventDefault();

        var title ="";
        var web_url ="";
        var description ="";
        var price ="";
        var da ="";
        var fb ="";
        var follower ="";
        var blog_id ="";
        var user_id ="";

        jQuery('div.hidden-fields').each(function (i) {

            title       = $(this).find("#cart_title").val();
            web_url     = $(this).find("#cart_web_url").val();
            description = $(this).find("#cart_description").val();
            price       = $(this).find("#cart_price").val();
            da          = $(this).find("#cart_da").val();
            fb          = $(this).find("#cart_fb").val();
            follower    = $(this).find("#cart_follower").val();
            blog_id     = $(this).find("#cart_blog_id").val();
            user_id     = $(this).find("#cart_user_id").val();

            //console.log(title+"-"+web_url+"-"+description+"-"+price+"-"+da+"-"+fb+"-"+follower+"-"+blog_id+"-"+user_id);
        });

        alert(title+"-"+web_url+"-"+description+"-"+price+"-"+da+"-"+fb+"-"+follower+"-"+blog_id+"-"+user_id);



        // var title = $("#cart_title").val();
        //     var web_url = $("#cart_web_url").val();
        //     var description = $("#cart_description").val();
        //     var price = $("#cart_price").val();
        //     var da = $("#cart_da").val();
        //     var fb = $("#cart_fb").val();
        //     var follower = $("#cart_follower").val();
        //     var blog_id = $("#cart_blog_id").val();
        //     var user_id = $("#cart_user_id").val();

        //   alert(title+"-"+web_url+"-"+description+"-"+price+"-"+da+"-"+fb+"-"+follower+"-"+blog_id+"-"+user_id);

        var url = jQuery('.cart_web_url').val();

        jQuery.ajax({
            type: "POST",
            url:  url,
            data: {
                title       : title,
                web_url     : web_url,
                description : description,
                price       : price,
                da          : da,
                fb          : fb,
                follower    : follower,
                blog_id     : blog_id,
                user_id     : user_id,
            },
            success: function (data) {
                console.log(data);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});


$(document).ready(function() {

    var url = jQuery('.on-load-url').val();
    jQuery.ajax({
        type: "POST",
        url:  url,
        success: function (result) {
            jQuery('.cart-detail').html(result['result']);
        },
        error: function (result) {
        }
    });
});
