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
        $this;

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
        if ($(document).width() >= 1280) {
            $(".locations-container").owlCarousel({
                margin: 20,
                loop: true,
                items: 3,
                nav: true,
                navText: ['&lt','&gt']
            });
        } else if ($(document).width() >= 768 && $(document).width() < 1280) {
            $(".locations-container").owlCarousel({
                margin: 20,
                loop: true,
                autoWidth: true,
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

        $(".video-slider, .shop-video-container").owlCarousel({
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

    // minimized text
    if ($(document).width() < 768) {
        var minimizedElements = $('.minimize');
        var minimizeCharacterCount = 170;

        minimizedElements.each(function(){
            var t = $(this).text();
            if(t.length < minimizeCharacterCount ) return;

            $(this).html(
                t.slice(0,minimizeCharacterCount )+'<span>... </span><a href="#" class="read-more extend-content">read more</a>'+
                '<span style="display:none;">'+ t.slice(minimizeCharacterCount ,t.length)+' <a href="#" class="less extend-content">less</a></span>'
            );

        });

        $('a.read-more.extend-content', minimizedElements).click(function(event){
            event.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();
        });

        $('a.less.extend-content', minimizedElements).click(function(event){
            event.preventDefault();
            $(this).parent().hide().prev().show().prev().show();
        });
    }



    // search results count
    $('.results-count').text(Math.ceil($('.search-results').find('.search-result-single').length / 10) +
                             ' - ' +
                             Math.ceil($('.search-results').find('.search-result-single').length / 10));

    // clear search menu
    $('.clear-menu').find('span').on('click', function () {
        $(this).closest('div').prev('form').find('.search-field').val('');
        $(this).closest('.search-page-form').next('.search-results').find('.search-result-single').addClass('visible').removeClass('hidden');
        $(this).closest('.container').siblings('.search-results-mobile').find('.search-result-single').addClass('visible').removeClass('hidden');

        $('.wpgmp_search_form').find('input').val($(this).val());
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

})(jQuery);
