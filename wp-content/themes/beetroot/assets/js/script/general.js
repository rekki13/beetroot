/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AllPage = function () {
    /**
     * Plugin
     */
    const pluginStart = function () {

    }

    /**
     * Header
     */
    const Header = function () {

    }

    /**
     * Sidebar
     */
    const Sidebar = function () {

    }

    /**
     * Init
     */
    return {
        init: function () {
            pluginStart();
            Header();
            Sidebar();
        }
    };

}();

/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const HomePage = function () {
    /**
     * Init
     */

    const Slider = function () {

        const swiperBottom = new Swiper('.swiper-testimonials.swiper-container', {
            spaceBetween: 0,
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: true,
            navigation: {
                nextEl: '.home__slider .swiper-button-next',
                prevEl: '.home__slider .swiper-button-prev',
            },
            autoplay: {
                delay: 1000000,
            },
        });

    }
    $(document).on('click', '.buttonFiles', function (e) {
        // $('.googleDrive').append("<p>list item</p>");
        $('<input type="url" class="custom-file-input form-control" placeholder="'+$(this).attr("data-placeholder")+'">').insertAfter($(this));
        $(this).remove();
    });
    $('.form-group input').on('input',function(){
        if($(this).val() != '') {
            $(this).parent().find('label').fadeOut();
        } else {
            $(this).parent().find('label').fadeIn();
        }
    });
    $('.form-group textarea').on('input',function(){
        if($(this).val() != '') {
            $(this).parent().find('label').fadeOut();
        } else {
            $(this).parent().find('label').fadeIn();
        }
    });





    /**
     * Init
     */
    return {
        init: function () {
            Slider();
        }
    };
}();

/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();
    HomePage.init();
});


