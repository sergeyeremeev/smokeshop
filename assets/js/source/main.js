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
        selectedOption,
        galleryNum;
        
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
    
    // change first location button
    $('.location-single:first-of-type, .search-result-single:first-of-type').find('.learn-more').text('Coming Soon').addClass('disabled');
    $('.location-single:first-of-type, .search-result-single:first-of-type').find('.learn-more').on('click', function (e) {
        e.preventDefault();
    });
    
    // subscribe form, select the correct list
    $('#ninja_forms_field_16').change(function () {
        selectedOption = $('#ninja_forms_field_16').find('option:selected').text();
        $('#ninja_forms_field_15 option').attr('selected', false);
        
        if (selectedOption === 'Choose the shop') {
            $('#ninja_forms_field_15').find('option:contains("clients")').attr('selected', true);
        } else {
            $('#ninja_forms_field_15').find('option:contains(' + selectedOption + ')').attr('selected', true);
        }
    });

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
        $('.menu-main-menu-container').on('click', 'a', function(e) {
            e.preventDefault();
            $('body').removeClass('menu-toggled');
            window.location.href = $(this).attr('href');
        });
        
        $(document).on('click', function(e) {
            if ($('body').hasClass('menu-toggled') && !$('#site-navigation').is(e.target) &&  $('#site-navigation').has(e.target).length === 0) {
                $('body').removeClass('menu-toggled');
            }
        });
        
        $('.menu-toggle').on('click', function(e) {
            e.preventDefault();
            if ($('body').hasClass('menu-toggled')) {
                $('body').removeClass('menu-toggled');
            } else {
                $('body').addClass('menu-toggled');
            }
        });
    }

    // search results display
    $(document).ready(function () {        
        $('.search-footer').find('.controls').find('div').on('click', function (e) {
            if ($(document).width() >= 768) {
                if ($(this).hasClass('right')) {
                    if ($('.search-result-single:first-child').css('margin-top') === '0px' && $('.search-result-single').length > 3) {
                        $('.search-result-single:first-child').css('margin-top', '-741px');
                    }
                } else {
                    if ($('.search-result-single:first-child').css('margin-top') !== '0px') {
                        $('.search-result-single:first-child').css('margin-top', '0');
                    }
                }
            } else {
                if ($(this).hasClass('right')) {
                    if ($('.search-result-single:last-child').position().top !== 63) {
                        $('.search-result-single:first-child').css({marginTop: '-=247px'});
                    }
                } else {
                    if ($('.search-result-single:first-child').css('margin-top') !== '0px') {
                        $('.search-result-single:first-child').css({marginTop: '+=247px'});
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

    // review form
    $('#review-form').find('.radio-inputs').on('click', 'label' ,function () {
        $(this).siblings().removeClass('selected').addClass('non-selected');
        $(this).addClass('selected').removeClass('non-selected');
        $(this).prevAll('label').addClass('selected').removeClass('non-selected');
    });

    $('#shop-search').on('submit', function (e) {
        e.preventDefault();
    });

    $(document).ready(function () {
        if ($('.search-result-single').length >= 1) {
            $('.results-count').text('1 - ' + $('.search-result-single').length);
        } else {
            $('.results-count').text('0 - 0');
        }
    });

    $('#shop-search').find('.search-field').on('keyup touchend', function () {
        var searchResults = $(this).closest('.search-page-form').next('.search-results').find('.search-result-single');
        var searchValue = $(this).val().toLowerCase();
        $.each(searchResults, function () {
            $this = $(this);
            if ($this.find('.address .text').text().toLowerCase().indexOf(searchValue) > -1 || 
                $this.find('h2 span').text().toLowerCase().indexOf(searchValue) > -1) {
                $(this).addClass('visible').removeClass('hidden');
            } else {
                $(this).addClass('hidden').removeClass('visible');
            }
        });
        
        $('.search-result-single:first-child').css('margin-top', '0');
        
        if ($('.search-result-single.visible').length >= 1) {
            $('.results-count').text('1 - ' + $('.search-result-single.visible').length);
        } else {
            $('.results-count').text('0 - 0');
        }

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
        galleryNum = $(this).closest('.controls').next('.wonderplugingallery-container').attr('id').slice(-1);
        console.log(galleryNum);
        $('.html5gallery-car-left-' + galleryNum).trigger('click');
    });
    
    $('.shop-media').find('.controls').on('click', '.right', function () {
        galleryNum = $(this).closest('.controls').next('.wonderplugingallery-container').attr('id').slice(-1);
        $('.html5gallery-car-right-' + galleryNum).trigger('click');
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
