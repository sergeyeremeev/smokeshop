/*global jQuery */
(function($) {
    'use strict';
    
    // all Javascript code goes here
    var searchSubmit = $('.search-submit'),
        searchField = $('.search-field'),
        testimonialsContainer = $('.testimonials-widget-testimonials'),
        testimonialSingle = testimonialsContainer.find('.testimonials-widget-testimonial'),
        testimonialsNum = testimonialSingle.length,
        i,
        $this,
        locCount = 1;
        
    // sticky header
    $(document).on('scroll', function () {
        if ($(document).width() >= 768) {
            if ($(window).scrollTop() > 180) {
                $('body').addClass("sticky-header");
            } else {
                $('body').removeClass("sticky-header");
            }
        }
    });

    // search toggle
    searchField.on('focus', function () {
        searchSubmit.addClass('toggled');
    });
     
    searchField.on('blur', function () {
        searchSubmit.removeClass('toggled');
    });
    
    // mobile search toggle
    $('.search-toggle-mobile').on('click', function (e) {
        e.preventDefault();
        $(this).next('.search-form').toggle();
    });

    // testimonials switch author and content
    $(document).ready(function () {
        $('.home-testimonials').find('.credit').each(function () {
            $(this).insertBefore($(this).prev('blockquote')); 
        });
    });
    
    // add merge attributes to testimonials
    if ($(document).width() >= 768) {
        for (i = 0; i < testimonialsNum; i += 2) {
            testimonialSingle.slice(i, i + 2).wrapAll("<div class='testimonials-wrap'></div>");
        }
    }

    // carousels
    $(document).ready(function () {
        if ($(document).width() >= 960) {
            $(".locations-container").owlCarousel({
                margin: 20,
                loop: true,
                items: 3,
                nav: true,
                navText: ['&lt','&gt']
            });
            
            $('.location-featured-products').find('.products-container').owlCarousel({
                margin: 20,
                loop: true,
                autoWidth: true,
                nav: true,
                navText: ['&lt','&gt']
            });
        } else if ($(document).width() >= 768 && $(document).width() < 960) {
            $(".locations-container").owlCarousel({
                margin: 20,
                loop: true,
                autoWidth: true,
                nav: true,
                navText: ['&lt','&gt']
            });
            
            $('.location-featured-products').find('.products-container').owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                navText: ['&lt','&gt']
            });
        } else {
            $(".locations-container").owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                navText: ['&lt','&gt']
            });
            
            $('.location-featured-products').find('.products-container').owlCarousel({
                loop: true,
                margin: 20,
                autoWidth: true,
                nav: true,
                navText: ['&lt','&gt']
            });
        }

        if ($(document).width() < 768) {
            $(".top-banner").find('.bottom-row').owlCarousel({
                margin: 0,
                stagePadding: 0,
                loop: true,
                items: 3,
                nav: true,
                navText: ['&lt','&gt']
            });
        }

        $(".testimonials-container").find('.testimonials-widget-testimonials').find('.paging').remove();
        $(".testimonials-container").find('.testimonials-widget-testimonials').owlCarousel({
            margin: 0,
            stagePadding: 0,
            loop: true,
            items: 1,
            nav: true,
            navText: ['&lt','&gt'],
            merge: true
        });

        $(".shop-video-container").owlCarousel({
            margin: 0,
            stagePadding: 0,
            loop: true,
            items: 1,
            nav: true,
            navText: ['&lt','&gt']
        });

        $(".photo-container").find('p').owlCarousel({
            margin: 0,
            stagePadding: 0,
            loop: true,
            items: 1,
            nav: true,
            navText: ['&lt','&gt']
        });
    });


    $(window).on('resize', function () {
        if ($(document).width() >= 1280) {
            if ($('.locations-container').find('.owl-stage').length !== 0) {
                $('.locations-container').data('owlCarousel').destroy();
                $('.locations-container').removeClass('owl-carousel owl-loaded owl-desktop');
                $('.locations-container').find('.owl-stage-outer').children().unwrap();
                $('.locations-container').removeData();
            }

            if ($('.top-banner').find('.bottom-row').find('.owl-stage').length !== 0) {
                $('.top-banner').find('.bottom-row').data('owlCarousel').destroy();
                $('.top-banner').find('.bottom-row').removeClass('owl-carousel owl-loaded owl-desktop');
                $('.top-banner').find('.bottom-row').find('.owl-stage-outer').children().unwrap();
                $('.top-banner').find('.bottom-row').removeData();
            }

            $(".locations-container").owlCarousel({
                margin: 20,
                stagePadding: 0,
                loop: true,
                items: 4,
                nav: true,
                navText: ['&lt','&gt']
            });
        } else if ($(document).width() >= 768 && $(document).width() < 1280) {
            if ($('.locations-container').find('.owl-stage').length !== 0) {
                $('.locations-container').data('owlCarousel').destroy();
                $('.locations-container').removeClass('owl-carousel owl-loaded owl-mobile');
                $('.locations-container').find('.owl-stage-outer').children().unwrap();
                $('.locations-container').removeData();
            }

            if ($('.top-banner').find('.bottom-row').find('.owl-stage').length !== 0) {
                $('.top-banner').find('.bottom-row').data('owlCarousel').destroy();
                $('.top-banner').find('.bottom-row').removeClass('owl-carousel owl-loaded owl-desktop');
                $('.top-banner').find('.bottom-row').find('.owl-stage-outer').children().unwrap();
                $('.top-banner').find('.bottom-row').removeData();
            }

            $(".locations-container").owlCarousel({
                margin: 20,
                stagePadding: 0,
                loop: true,
                items: 3,
                nav: true,
                navText: ['&lt','&gt']
            });
        } else {
            if ($('.locations-container').find('.owl-stage').length !== 0) {
                $('.locations-container').data('owlCarousel').destroy();
                $('.locations-container').removeClass('owl-carousel owl-loaded owl-mobile');
                $('.locations-container').find('.owl-stage-outer').children().unwrap();
                $('.locations-container').removeData();
            }

            if ($('.top-banner').find('.bottom-row').find('.owl-stage').length !== 0) {
                $('.top-banner').find('.bottom-row').data('owlCarousel').destroy();
                $('.top-banner').find('.bottom-row').removeClass('owl-carousel owl-loaded owl-desktop');
                $('.top-banner').find('.bottom-row').find('.owl-stage-outer').children().unwrap();
                $('.top-banner').find('.bottom-row').removeData();
            }

            $(".locations-container").owlCarousel({
                margin: 0,
                stagePadding: 0,
                loop: true,
                items: 1,
                nav: true,
                navText: ['&lt','&gt']
            });

            $(".top-banner").find('.bottom-row').owlCarousel({
                margin: 0,
                stagePadding: 0,
                loop: true,
                items: 3,
                nav: true,
                navText: ['&lt','&gt']
            });
        }
    });

    // menu toggle
    if ($(document).width() < 768) {
        $('.menu-toggle').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('menu-toggled');
        });
    }

    // search results count
    $(document).ready(function () {
        if ($(document).width() < 768) {
            $('.results-count').text('1 - 1');
        } 
        
        $('.search-footer').find('.controls').find('div').on('click', function (e) {
            if ($(document).width() >= 768) {
                if ($(this).hasClass('right')) {
                    if ($('.search-result-single:first-child').css('margin-top') === '0px' && $('.search-result-single').length > 3) {
                        $('.search-result-single:first-child').css('margin-top', '-741px');
                        $('.results-count').text('4 - ' + $('.search-result-single').length);
                    }
                } else {
                    if ($('.search-result-single:first-child').css('margin-top') !== '0px') {
                        $('.search-result-single:first-child').css('margin-top', '0');
                        $('.results-count').text('1 - 3');
                    }
                }
            } else {
                if ($(this).hasClass('right')) {
                    if ($('.search-result-single:last-child').position().top !== 63) {
                        $('.search-result-single:first-child').css({marginTop: '-=247px'});
                        locCount += 1;
                        $('.results-count').text(locCount + ' - ' + locCount);
                    }
                } else {
                    if ($('.search-result-single:first-child').css('margin-top') !== '0px') {
                        $('.search-result-single:first-child').css({marginTop: '+=247px'});
                        locCount -= 1;
                        $('.results-count').text(locCount + ' - ' + locCount);
                    }
                }
            }
        });
    });

    // clear search menu
    $('.clear-menu').on('click', function () {
        $this = $(this);
        $this.prev('form').find('.search-field').val('');
        $this.closest('.search-page-form').next('.search-results').find('.search-result-single').addClass('visible').removeClass('hidden');
        $this.closest('.container').siblings('.search-results-mobile').find('.search-result-single').addClass('visible').removeClass('hidden');

        $('.wpgmp_search_form').find('input').val($this.val());
        $('.wpgmp_search_form').find('input').trigger('keyup').trigger('touchend');
    });


    // toggle review form
    $('.toggle-review-form').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('toggled');
        $(this).closest('.review-top').next('#review-form').toggle();
    });

    // review form
    $('#review-form').find('.radio-inputs').on('click', 'label' ,function () {
        $(this).siblings().removeClass('selected').addClass('non-selected');
        $(this).addClass('selected').removeClass('non-selected');
        $(this).prevAll('label').addClass('selected').removeClass('non-selected');
    });

    $('#shop-search').on('submit', function (e) {
        e.preventDefault();
    });

    $('#shop-search').find('.search-field').on('keyup touchend', function () {
        var searchResults = $(this).closest('.search-page-form').next('.search-results').find('.search-result-single');
        var searchResultsMobile = $(this).closest('.container').siblings('.search-results-mobile').find('.search-result-single-mobile');
        var searchValue = $(this).val().toLowerCase();
        $.each(searchResults, function () {
            $this = $(this);
            if ($this.find('.address .text').text().toLowerCase().indexOf(searchValue) > -1) {
                $(this).addClass('visible').removeClass('hidden');
            } else {
                $(this).addClass('hidden').removeClass('visible');
            }
        });

        $.each(searchResultsMobile, function () {
            $this = $(this);
            if ($this.find('h2 span').text().toLowerCase().indexOf(searchValue) > -1 || $this.find('.address .text').text().toLowerCase().indexOf(searchValue) > -1) {
                $(this).addClass('visible').removeClass('hidden');
            } else {
                $(this).addClass('hidden').removeClass('visible');
            }
        });

        $('.wpgmp_search_form').find('input').val($(this).val());
        $('.wpgmp_search_form').find('input').trigger('keyup').trigger('touchend');
    });


    // cut mobile blog text
    if ($(document).width() < 768) {
        $('.blog').find('.entry-content').each(function () {
            $this = $(this).find('p');
            $this.text($this.text().substr(0, 100) + '...');
        });
    }
    
    // location media controls 
    $('.shop-media').find('.controls').on('click', '.left', function () {
        $('.html5gallery-car-left-1').trigger('click');
    });
    
    $('.shop-media').find('.controls').on('click', '.right', function () {
        $('.html5gallery-car-right-1').trigger('click');
    });
    
    // location brands 
    $(document).ready(function () {
        $('.brands-container').find('img').wrap('<div class="brand-single"/>');
        
        $(".brands-container").children('p').owlCarousel({
            loop: true,
            autoWidth: true,
            nav: true,
            navText: ['&lt','&gt']
        });
    });

})(jQuery);
