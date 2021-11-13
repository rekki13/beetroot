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
                delay: 3000,
            },
        });

    }
    $(document).on('click', '.buttonFiles', function (e) {
        // $('.googleDrive').append("<p>list item</p>");
        $('<input type="url" class="custom-file-input form-control" placeholder="' + $(this).attr("data-placeholder") + '">').insertAfter($(this));
        $(this).remove();
    });
    $('.form-group input').on('input', function () {
        if ($(this).val() != '') {
            $(this).parent().find('label').fadeOut();
        } else {
            $(this).parent().find('label').fadeIn();
        }
    });
    $('.form-group textarea').on('input', function () {
        if ($(this).val() != '') {
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
const Vacancies = function () {
    /**
     * Init
     */

    const View = function () {

    }

    const FilterLang = function () {

        jQuery(document).ready(function ($) {
            (function ($) {
                $doc = $(document);

                $doc.ready(function () {

                    /**
                     * Retrieve posts
                     */
                    function get_posts($params) {

                        $container = $('#container-async');
                        $content = $container.find('.content');
                        $status = $container.find('.status');
                        $pager = $container.find('.infscr-pager a');

                        $status.text('Loading posts ...');

                        /**
                         * Reset Pager for infinite scroll
                         */
                        if ($params.page === 1 && $pager.length) {
                            $pager.removeAttr('disabled').text('Load More');
                        }

                        if ($pager.length) {
                            $method = 'infscr';
                        } else {
                            $method = 'pager';
                        }

                        /**
                         * Do AJAX
                         */
                        $.ajax({
                            url: bobz.ajax_url,
                            data: {
                                action: 'do_filter_posts_mt',
                                nonce: bobz.nonce,
                                params: $params,
                                pager: $method
                            },
                            type: 'post',
                            dataType: 'json',
                            success: function (data, textStatus, XMLHttpRequest) {

                                if (data.status === 200) {

                                    if (data.method === 'pager' || $params.page === 1) {
                                        $content.html(data.content);
                                    }
                                    /**
                                     * Append content for infinite scroll
                                     */
                                    else {
                                        $content.append(data.content);

                                        if (data.next !== 0) {
                                            $pager.attr('href', '#page-' + data.next);
                                        }
                                    }
                                } else if (data.status === 201) {

                                    if (data.method === 'pager') {
                                        $content.html(data.message);
                                    } else {
                                        $pager.attr('disabled', 'disabled').text('You reached the end');
                                    }
                                } else {
                                    $status.html(data.message);
                                }

                                /*console.log(data);
                                console.log(textStatus);
                                console.log(XMLHttpRequest);*/
                            },
                            error: function (MLHttpRequest, textStatus, errorThrown) {

                                $status.html(textStatus);

                                /*console.log(MLHttpRequest);
                                console.log(textStatus);
                                console.log(errorThrown);*/
                            },
                            complete: function (data, textStatus) {

                                msg = textStatus;

                                if (textStatus === 'success') {
                                    msg = data.responseJSON.message;
                                }

                                $status.html(msg);

                                /*console.log(data);
                                console.log(textStatus);*/
                            }
                        });
                    }

                    /**
                     * Bind get_posts to tag cloud and navigation
                     */
                    $('.sc-ajax-filter-multi').on('click', 'a[data-filter], .pagination a', function (event) {
                        if (event.preventDefault) {
                            event.preventDefault();
                        }

                        $this = $(this);
                        /**
                         * Set filter active
                         */
                        if ($this.data('filter')) {
                            $page = 1;

                            /**
                             * If all terms, then deactivate all other
                             */
                            if ($this.data('term') === 'all-terms') {
                                $this.closest('ul').find('.active').removeClass('active');
                            } else {
                                $('a[data-term="all-terms"]').parent('li').removeClass('active');
                            }

                            // Toggle current active
                            $this.parent('li').toggleClass('active');

                            /**
                             * Get All Active Terms
                             */
                            $active = {};
                            $terms = $this.closest('ul').find('.active');

                            if ($terms.length) {
                                $.each($terms, function (index, term) {

                                    $a = $(term).find('a');
                                    $tax = $a.data('filter');
                                    $slug = $a.data('term');

                                    if ($tax in $active) {
                                        $active[$tax].push($slug);
                                    } else {
                                        $active[$tax] = [];
                                        $active[$tax].push($slug);
                                    }
                                });
                            }


                        } else {
                            /**
                             * Pagination
                             */
                            $page = parseInt($this.attr('href').replace(/\D/g, ''));
                            $this = $('.nav-filter .active a');
                        }


                        $params = {
                            'page': $page,
                            'terms': $active,
                            'qty': $this.closest('#container-async').data('paged'),
                        };

                        // Run query
                        get_posts($params);
                    });

                    /**
                     * Show all posts on page load
                     */
                    $('a[data-term="all-terms"]').trigger('click');

                });

            })(jQuery);
        });

    }

    const FilterInput = function () {
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $(".vacancy").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    }
    const ChangeGridList = function () {
        // $("#vacancies__view-grid").on("click", function () { // When btn is pressed.
        //     // var postGridList = $(this).attr("value");
        //     var postGridList = $(this).val();
        //     $postGridList = $(this).val();
        //     var text = $(this).val();
        //     console.log($postGridList);
        //     // console.logxt);
        //
        //     $.ajax({
        //         type: "POST",
        //         url: "rekki",
        //         cache: false,
        //         success: function (html) {
        //             $("#jegyek").html(html);
        //         }
        //     });
        // });


    }
    /**
     * Init
     */
    return {
        init: function () {
            View();
            FilterLang();
            FilterInput();
            ChangeGridList();
        }
    };
}();
/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();
    HomePage.init();
    Vacancies.init();
});


