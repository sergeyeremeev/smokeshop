(function($) {
    // all Javascript code goes here

    // searcg toggle
    $('.header-main').on('click', '.search-toggle', function (e) {
        e.preventDefault();
        $this = $(this);
        $this.toggleClass('toggled');
        if ($(document).width() >= 960) {
            $this.closest('label').find('input').toggleClass('toggled');
        } else {
            $('.input-wrapper').toggleClass('toggled');
        }
    });


    // carousels
    $(document).ready(function () {
        if ($(document).width() >= 1280) {
            $(".locations-container").owlCarousel({
                margin: 20,
                stagePadding: 0,
                loop: true,
                items: 4,
                nav: true
            });
        } else if ($(document).width() >= 768 && $(document).width() < 1280) {
            $(".locations-container").owlCarousel({
                margin: 20,
                loop: true,
                items: 3,
                center: true,
                nav: true
            });
        } else {
            $(".locations-container").owlCarousel({
                margin: 0,
                stagePadding: 0,
                loop: true,
                items: 1,
                nav: true
            });
        }

        if ($(document).width() < 768) {
            $(".top-banner").find('.bottom-row').owlCarousel({
                margin: 0,
                stagePadding: 0,
                loop: true,
                items: 3,
                nav: true
            });
        }

        $(".testimonials-container").find('.testimonials-widget-testimonials').find('.paging').remove();
        $(".testimonials-container").find('.testimonials-widget-testimonials').owlCarousel({
            margin: 0,
            stagePadding: 0,
            loop: true,
            items: 1,
            nav: true
        });

        $(".video-slider, .shop-video-container").owlCarousel({
            margin: 0,
            stagePadding: 0,
            loop: true,
            items: 1,
            nav: true
        });

        $(".photo-container").find('p').owlCarousel({
            margin: 0,
            stagePadding: 0,
            loop: true,
            items: 1,
            nav: true
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
                nav: true
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
                nav: true
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
                nav: true
            });

            $(".top-banner").find('.bottom-row').owlCarousel({
                margin: 0,
                stagePadding: 0,
                loop: true,
                items: 3,
                nav: true
            });
        }
    });

    // menu toggle
    if ($(document).width() < 960) {
        $('.menu-toggle').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('toggled');
            $('.menu-main-menu-container').toggleClass('toggled');
        });
    }

    // testimonials cutoff
    if ($(document).width() < 768) {
        $('.testimonials-container').find('blockquote').each(function () {
            $(this).html(
                $(this).text().slice(0, 170)+'<span>... </span><a href="#" class="read-more-testimonial extend-content">read more</a>'+
                '<span style="display:none;">'+ $(this).text().slice(170 ,$(this).text().length)+' <a href="#" class="less-testimonial extend-content">less</a></span>'
            );
        });

        $('a.read-more-testimonial.extend-content').click(function(event){
            event.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();
        });

        $('a.less-testimonial.extend-content').click(function(event){
            event.preventDefault();
            $(this).parent().hide().prev().show().prev().show();
        });

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


    // add propper arrows

})(jQuery);
