jQuery.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

jQuery(document).ready(function ($) {



    var title = "";
    var web_url = "";
    var description = "";
    var price = "";
    var da = "";
    var fb = "";
    var follower = "";
    var blog_id = "";
    var user_id = "";
    var blog_image = "";
    var blogs_exits_id = "";

    // $('.addedLabel').hide();


    $('.add_to_cart_form').on('submit', function (e) {
        e.preventDefault();
        //$(this).find('.addtocart').hide();
        title = $(this).find(".cart_title").val();
        web_url = $(this).find(".cart_web_url").val();
        description = $(this).find(".cart_description").val();
        price = $(this).find(".cart_price").val();
        da = $(this).find(".cart_da").val();
        fb = $(this).find(".cart_fb").val();
        follower = $(this).find(".cart_follower").val();
        blog_id = $(this).find(".cart_blog_id").val();
        user_id = $(this).find(".cart_user_id").val();
        blog_image = $(this).find(".cart_blog_image").val();

        //alert(title + "-" + web_url + "-" + description + "-" + price + "-" + da + "-" + fb + "-" + follower + "-" + blog_id + "-" + user_id);
        var url = $('.cart_web_url').val();

        $.ajax({
            type: "POST",
            url: url,
            data: {
                title: title,
                web_url: web_url,
                description: description,
                price: price,
                da: da,
                fb: fb,
                follower: follower,
                blog_id: blog_id,
                user_id: user_id,
                blog_image : blog_image
            },
            context: this,
            success: function (data) {
                console.log(data);
                $(this).find('.addtocart').hide();
                $(this).find('.addedLabel').show();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    $('.add_to_cart_form').each(function (i) {
        var blogID        = $(this).find(".cart_blog_id").val();
        var existsBlogID  = $(this).find('.cart_exists_blog_id').attr('exists_blog_id');

        console.log(blogID+"=="+existsBlogID);

        if (blogID === existsBlogID) {
            $(this).find('.addedLabel').show();
            $(this).find('.addtocart').hide();
        }else{
            $(this).find('.addedLabel').hide();
            $(this).find('.addtocart').show();
        }

    });

    // if(result['result'] !== ""){
    //     jQuery('.cart-detail').html(result['result']);
    // }else{
    //     jQuery('.cart-detail').html("0");
    // }
});

$(document).ready(function () {

    var url = jQuery('.on-load-url').val();

    jQuery.ajax({
        type: "POST",
        url: url,
        success: function (result) {
            jQuery('.cart-detail').html(result['result']);           
        },
        error: function (result) {
        }
    });

});


