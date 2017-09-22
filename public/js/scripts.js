
    jQuery(document).ready(function() {

        $('.single-item').slick({
            speed: 1000,
            dots: true,
        });




        if($(window).width() > 767) {
            var maxHeight = -1;
            $(this).find("#categories .category-card").each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });
            $('#categories .category-card').height(maxHeight);
        }

            $('main').click(function(){
                 $('.navbar-collapse').removeClass('in');
            });

    });

    $(window).scroll(function () {
        if($(window).scrollTop() > 350){
            $('.meeting-slide-title').fadeOut(0);
            $('.meeting-slide i.fa').fadeIn(0);
            $('.meeting-slide').attr('style','width: 125px;right:-55px;padding: 15px 8px 8px');
        }else{
            $('.meeting-slide').attr('style','');
            $('.meeting-slide-title').fadeIn(0);
            $('.meeting-slide i.fa').fadeOut(0);
        }

        if($(window).scrollTop() > 10){
            $('.navbar-inverse .navbar-nav>li>a').addClass('menu-padding');
            $('.navbar-brand img').addClass('logo-width');
        }else{
            $('.navbar-inverse .navbar-nav>li>a').removeClass('menu-padding');
            $('.navbar-brand img').removeClass('logo-width');
        }
    });


