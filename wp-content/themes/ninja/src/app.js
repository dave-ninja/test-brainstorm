//require('bootstrap');
jQuery(document).ready(function ($){
    var my_repeater_field_offset = 3
    $('button.more').click(function () {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: ajax_params.ajax_url,
            data: {
                action: 'my_repeater_show_more',
                post_id: ajax_params.post_id,
                offset: my_repeater_field_offset,
                nonce: ajax_params.nonce
            },
            success: function(json) {
                $('.block-wrap').append(json['content']);
                my_repeater_field_offset = json['offset'];
                if (!json['more']) {
                    $('.more').css('display', 'none');
                }
            },
            error: function(){
                alert('Unknown error')
            }
        });
    })

    $('.news-letter-form form').submit(function (e) {
        e.preventDefault()
        $('.news-letter-form .msg').text('')
        let email = $('.news-letter-form input').val()

        if(validateEmail(email)) {
            $.ajax({
                type: "POST",
                url: ajax_params.ajax_url,
                data: {
                    action: 'newsletter',
                    email,
                },
                success: function(res) {
                    if(res == 'oks') {
                        $('.news-letter-form .msg').text('Successfully').css({"color":"green"})
                    }
                },
                error: function(){
                    alert('Unknown error')
                }
            });

        } else {
            $('.news-letter-form .msg').text('Invalid Email').css({"color":"red"})
        }
    })

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // nav toggle button click event
    $(".toggle").click(function() {
        $("body > .news-letter").removeClass("show")
        $(".wrapper").css({"opacity":"0.3"})
        $(".mobile-menu").addClass("show")
    })

    $(".newsletter-popup").click(function() {
        $(".mobile-menu").removeClass("show")
        $(".wrapper").css({"opacity":"0.3"})
        $("body > .news-letter").addClass("show")
    })

    $('.close-menu').click(function(e) {
        $(".wrapper").css({"opacity":"1"})
        $(".mobile-menu").removeClass("show")
        $("body > .news-letter").removeClass("show")
    })

    function hideShow() {
        $(".show").removeClass('show')
        $(".toggle span").removeClass('change')
    }

    /*$(".menu-item-has-children a").after().click(function (e) {
        e.preventDefault()
        console.log(e.target)
    })*/
})