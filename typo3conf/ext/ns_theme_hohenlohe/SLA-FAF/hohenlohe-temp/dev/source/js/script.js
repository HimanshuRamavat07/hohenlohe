
var $body = $('body');
$(document).ready(function () {
    if ($('body').hasClass('menu--close')) { } else { $('body').addClass('menu--close') }

    // Video Play
    // $('.play-button').on('click', function () {
    //     $(this).parent().addClass('video-played');
    // });
    
    var poppy = JSON.parse(sessionStorage.getItem('newsPopup'));
    if(!poppy){
        if ($('.lightbox-overlay').length) {
            setTimeout(() => {
                $('.lightbox-overlay').removeClass('hide-lightbox');
            }, 25000);
        }
        
        if ($('.close-icon').length) {
            $('.close-icon').on('click', function () {
                $(this).parents('.lightbox-overlay').addClass('hide-lightbox');
                setTimeout(() => {
                    $(this).parents('.lightbox-overlay').remove();
                }, 1000);
            });        
        }

        sessionStorage.setItem('newsPopup',true);
    } else {
        $('.lightbox-overlay').remove();
    }

    $(document).on("touchstart click", function (e) {
        container = $(".cta-lightbox-section");
        contactInfo = $(".cta-lightbox-section, .close-icon");
        if (
            !container.is(e.target) && // if the target of the click isn't the container...
            container.has(e.target).length === 0 &&
            !contactInfo.is(e.target) &&
            contactInfo.has(e.target).length === 0
        ) {
            $('.lightbox-overlay').addClass('hide-lightbox');
            setTimeout(() => {
                $('.lightbox-overlay').remove();
            }, 1000);
        }
    });

    if ($('.play-button').length) {
        $('.play-button').each(function () {
            var oldUrl = $(this).siblings('.video-area').attr("data-videourl"); // Get current url
            var newUrl = oldUrl.replace(
                "autoplay=0",
                "autoplay=1&enablejsapi=1"
            ); // Create new url
            $(this).siblings('.video-area').attr("data-videourl", newUrl); // Set herf value
            console.log(oldUrl, 'old URL');
            console.log(newUrl);
        });
        $('.play-button').on('click', function (ev) {
            setTimeout(() => {
                var currentUrl = $(this).siblings('.video-area').attr("data-videourl"); // Get current url
                $(this).parent().addClass('video-played');
                $(this).siblings('.video-area').html("<iframe allowfullscreen='1' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' width='640' height='360' src='" + currentUrl + "'></iframe>");
                // $(this).siblings('.video-area').find("iframe").attr('data-src', currentUrl);
                // $(this).siblings('.video-area').find("iframe").attr('src', currentUrl);
                ev.preventDefault();
            }, 200);
        });
    }

    //Mobile Menu
    $('.menu-trigger').on('click', function () {
        $('body').toggleClass('menu--open');
        $('body').toggleClass('menu--close');
        nav_height();
        if (!$('body').hasClass('menu--open')) {
            $('body').removeClass('body-effect');
            $('.header-main').removeClass('sub-menu--open');
            $('.navigation').removeClass('second-level--open');
            $('.navigation > nav > ul > li').removeClass('clicked md-hidden');
            $('body').removeClass('desktop-sub-menu');
            $('.header-main').removeClass('search-block--open');
        }
        if ($('.sub-menu ul li a').hasClass('active-nav')) {
            $('.navigation').addClass('second-level--open');
            $('.header-main').addClass('sub-menu--open');
            $('body').addClass('desktop-sub-menu body-effect');
            $('.active-nav').parents('.has-sub').addClass('clicked');
        }
    });
    $('.navigation > nav > ul > li.has-sub > a').click(function () {
        $(this).parent().siblings('li').removeClass('clicked');
        $(this).parent().siblings('li').toggleClass('md-hidden');
        $(this).parent().toggleClass('clicked');
        $(this).parents('body').toggleClass('body-effect');
        $(this).parents('.header-main').addClass('sub-menu--open');
        $(this).parents('.navigation').addClass('second-level--open');
        $(this).parent().find('.third-level--open').removeClass('third-level--open');
        if (win_width() > 767) {
            if ($('li.has-sub').hasClass('clicked')) {
                $('body').addClass('desktop-sub-menu');
            }
            else {
                $('body').removeClass('desktop-sub-menu');
            }
        }
    });
    $(".second-level-menu > ul > li.has-sub > a").click(function () {
        $(this).parents('.navigation').addClass('third-level--open');
        $(this).parent().siblings('li').removeClass('clicked');
        $(this).parent().toggleClass('clicked');
    });
    $('.first-level-link.back-link').click(function () {
        $(this).parents('.header-main').removeClass('sub-menu--open');
        $(this).parents('.navigation').removeClass('second-level--open third-level--open');
        $(this).parents().find('li').removeClass('clicked md-hidden');
    });
    $('.second-level-link.back-link').click(function () {
        $(this).parents('.header-main').removeClass('sub-menu--open');
        $(this).parents('.navigation').removeClass('third-level--open');
        $(this).parent().siblings('li').removeClass('clicked');
        $(this).parents().find('.second-level-menu > ul > li').removeClass('clicked');
    });

    // Search Form
    $('.search-link').click(function () {
        $(this).parents('.header-main').addClass('search-block--open');
        $('body').addClass('menu--open');
        $('body').removeClass('menu--close');
        nav_height();
    });
    $('.search-back-link').click(function () {
        $(this).parents('.header-main').removeClass('search-block--open');
    });

    // custom drop down
    $('.custom-dropdown-wrap .selected-val').on('click', function () {
        $(this).parent().find('.custom-dropdown').slideToggle('fast').toggleClass('active');
        $(this).parent().toggleClass('open');
    });
    $('.custom-dropdown a').on('click', function (event) {
        var anchor_value = $(this).text();
        $(this).parent().parent().slideUp().removeClass('active');
        $(this).parents('.custom-dropdown-wrap').removeClass('open').find('.selected-val').text(anchor_value);
    });

    // Go to top
    $(".goto-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });

    $(document).on("scroll", function () {
        var pixels = $(document).scrollTop();
        var pageHeight = $(document).height() - $(window).height();
        var progress = 100 * pixels / pageHeight;

        $("div.nav-progress").css("width", progress + "%");
    })

    // Hero Slider (hero-visual-mit-buttons)
    // if($('.hero-visual-mit-buttons, .hero-visual-mit-content').length) {
    //     $('body').addClass('hero-slider-exist');
    // }

    // Landing Slider (hero-visual-mit-buttons)
    $('.hero-visual-mit-buttons .button-slide').css('height', win_height());
    var mitButtons = $('.hero-visual-mit-buttons .landing-slider-init');

    if (mitButtons.length) {
        if (mitButtons.find('.button-slide').length > 1) {
            mitButtons.owlCarousel({
                items: 1,
                nav: false,
                dots: true,
                autoHeight: true,
                loop: true,
                autoplay: true,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                touchDrag: true,
                mouseDrag: false,
                navText: '',
                onInitialize: function () {
                    if (mitButtons.find('.slide').length === 1) {
                        this.settings.loop = false;
                        this.settings.nav = false;
                    }
                }
            });
        } else {
            mitButtons.show();
        }
    }

    // Landing Slider (hero-visual-mit-content)
    $('.hero-visual-mit-content .content-slide').css('height', win_height());
    var mitContent = $('.hero-visual-mit-content .landing-slider-init');

    if (mitContent.length) {
        if (mitContent.find('.content-slide').length > 1) {
            mitContent.owlCarousel({
                items: 1,
                nav: false,
                dots: true,
                autoHeight: true,
                loop: true,
                autoplay: true,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                touchDrag: true,
                mouseDrag: false,
                navText: '',
                onInitialize: function () {
                    if (mitContent.find('.slide').length === 1) {
                        this.settings.loop = false;
                        this.settings.nav = false;
                    }
                }
            });
        } else {
            mitContent.show();
        }
    }

    // Bild Slider
    var bildSlider = $('.bild-slider-init');

    if (bildSlider.length) {
        bildSlider.each(function () {
            if ($(this).find('.bild-slide').length > 1) {
                $(this).owlCarousel({
                    items: 1,
                    nav: true,
                    dots: false,
                    autoHeight: true,
                    loop: true,
                    autoplay: false,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    touchDrag: true,
                    mouseDrag: false,
                    navText: '',
                    onInitialized: function (e) {
                        if (!e.namespace) { return; }
                        var carousel = e.relatedTarget;
                        $(".slider-counter").text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
                    },
                    onInitialize: function (e) {
                        if ($(this).find('.bild-slide').length === 1) {
                            this.settings.loop = false;
                            this.settings.nav = false;
                        }
                    }
                });

                $(this).on('changed.owl.carousel', function (e) {
                    if (!e.namespace) { return; }
                    var carousel = e.relatedTarget;
                    $(this).siblings(".slider-counter").text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
                });
            } else {
                $(this).show();
            }
        });
    }

    // Member Slider
    var memberSlider = $('.member-slider-init');

    if (memberSlider.length) {
        memberSlider.each(function () {
            if ($(this).find('.member-slide').length > 1) {
                $(this).owlCarousel({
                    items: 1,
                    nav: true,
                    dots: false,
                    autoHeight: false,
                    loop: false,
                    autoplay: false,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    touchDrag: true,
                    mouseDrag: false,
                    navText: '',
                    onInitialized: function (e) {
                        if (!e.namespace) { return; }
                        var carousel = e.relatedTarget;
                        $(".slider-counter").text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
                    },
                    onInitialize: function (e) {
                        if ($(this).find('.member-slide').length === 1) {
                            this.settings.loop = false;
                            this.settings.nav = false;
                        }
                    }
                });

                $(this).on('changed.owl.carousel', function (e) {
                    if (!e.namespace) { return; }
                    var carousel = e.relatedTarget;
                    $(this).siblings(".slider-counter").text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
                });
            } else {
                $(this).show();
            }
        });
    }

    memberSlider.on('translated.owl.carousel', function (event) {
        var total = $(this).find('.owl-stage .owl-item.active').length;

        $(this).find('.owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');

        $(this).find('.owl-stage .owl-item.active').each(function (index) {
            if (index === 0) {
                // this is the first one
                $(this).addClass('firstActiveItem');
                setTimeout(function () {
                    $('.firstActiveItem .member-slide').addClass('member-slide-update');
                }, 100);
            }
        });
    });

    // Member Thumb Slider
    var memberThumbSlider = $('.member-thumb-slider-init');

    if (memberThumbSlider.length) {
        if (memberThumbSlider.find('.member-thumb-slide').length > 1) {
            memberThumbSlider.owlCarousel({
                dots: false,
                autoHeight: true,
                nav: true,
                items: 3,
                loop: false,
                autoplay: false,
                touchDrag: true,
                mouseDrag: false,
                navText: '',
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        margin: 0,
                    },

                    576: {
                        items: 2,
                        nav: true,
                        margin: 25,
                    },

                    992: {
                        items: 3,
                        margin: 25,
                    },

                    1280: {
                        margin: 50,
                    }
                },
                onChanged: function (e) {
                    if (!e.namespace) { return; }
                    var carousel = e.relatedTarget;
                    $('.member-thumb-slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
                },
                onInitialize: function (e) {
                    if (memberThumbSlider.find('.member-thumb-slide').length === 1) {
                        this.settings.loop = false;
                        this.settings.nav = false;
                    }
                }
            });
        } else {
            memberThumbSlider.show();
            $('.member-thumb-slide').addClass("single-member-thumb-slide");
        }
    }

    // Theme Slider
    var themeSlider = $('.theme-slider-init');

    if (themeSlider.length) {
        if (themeSlider.find('.theme-slide').length > 1) {
            themeSlider.owlCarousel({
                dots: false,
                autoHeight: true,
                nav: true,
                items: 3,
                loop: false,
                autoplay: false,
                touchDrag: true,
                mouseDrag: false,
                navText: '',
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        margin: 0,
                    },

                    576: {
                        items: 2,
                        nav: true,
                        margin: 25,
                    },
                    1280: {
                        margin: 50,
                    }
                },
                onChanged: function (e) {
                    if (!e.namespace) { return; }
                    var carousel = e.relatedTarget;
                    $('.theme-slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
                },
                onInitialize: function (e) {
                    if (themeSlider.find('.theme-slide').length === 1) {
                        this.settings.loop = false;
                        this.settings.nav = false;
                    }
                }
            });
        } else {
            themeSlider.show();
            $('.theme-slide').addClass("single-theme-slide");
        }
    }

    themeSlider.on('translated.owl.carousel', function (event) {
        var total = $(this).find('.owl-stage .owl-item.active').length;

        $(this).find('.owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');

        $(this).find('.owl-stage .owl-item.active').each(function (index) {
            if (index === 0) {
                if (win_width() < 767) {
                    // this is the first one
                    $(this).addClass('firstActiveItem');
                    setTimeout(function () {
                        $('.firstActiveItem .theme-slider-tile').addClass('theme-slider-tile-update');
                    }, 200);
                }
            }
            if (index === total - 1 && total > 1) {
                // this is the last one
                $(this).addClass('lastActiveItem');
                setTimeout(function () {
                    $('.lastActiveItem .theme-slider-tile').addClass('theme-slider-tile-change');
                }, 200);
            }
        });
    });
    // Theme Slider
    var logSlider = $('.logo-slider');

    if (logSlider.length) {
        if (logSlider.find('.logo-slide').length > 1) {
            logSlider.owlCarousel({
                nav: false,
                loop: true,
                margin: 20,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplaySpeed: 6000,
                slideSpeed: 7000,
                slideTransition: 'linear',
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4,
                        margin: 30,
                    },
                    992: {
                        items: 5,
                        margin: 44,
                    }
                }
            });
        } else {
            logSlider.show();
            $('.logo-slide').addClass("single-logo-slide");
        }
    }

    // Scroll Magic Functionality
    const controller = new ScrollMagic.Controller();

    if (win_width() > 1280) {
        // Digit Animation from Left
        var revealElements = $([".icon-sammlung", ".teaser-elemente-thumb", ".blog-kategorien-thumb"]);
        for (var i = 0; i < revealElements.length; i++) {
            new ScrollMagic.Scene({
                triggerElement: revealElements[i],
                offset: 5,
                triggerHook: 0.9,
            })
                .setClassToggle(revealElements[i], "visible")
                .addTo(controller);
        }

        // Animation from Right
        var revealElements = $([".blog-teaser-thumb", ".testimonial", ".testimonial-video", ".video"]);
        for (var i = 0; i < revealElements.length; i++) {
            new ScrollMagic.Scene({
                triggerElement: revealElements[i],
                offset: 5,
                triggerHook: 0.9,
            })
                .setClassToggle(revealElements[i], "visible")
                .addTo(controller);
        }
    }

    const tl = new TimelineMax();

    // Scroll Magic Functionality (mit-content)
    if (win_width() > 1500) {
        var tweenContent4 = TweenMax.to('.slider-shape', 1, { top: '-152px' });
    } else {
        var tweenContent4 = TweenMax.to('.slider-shape', 1, { top: '-12px' });
    }
    var tweenContent1 = TweenMax.to(".slider-content-text", 0.5, { opacity: "1" });
    var tweenContent2 = TweenMax.to(".slider-overlay", 1, { backgroundColor: 'rgba(16, 16, 16, 0.7)' });
    var tweenContent3 = TweenMax.to(".slider-title", 1, { transform: "translateY(0)", });
    var tweenContent5 = TweenMax.to('.slider-title img', 1, { opacity: '0' });

    if (win_width() > 320) {
        tl
            .add(tweenContent5)
            .add(tweenContent4)
            .add(tweenContent2)
            .add(tweenContent3)
            .add(tweenContent1)
        const scene = new ScrollMagic.Scene({
            triggerHook: 0.25,
            duration: 500,
            offset: 0,
        }).setTween(tl).setPin(".hero-visual-mit-content").setClassToggle(".slider-overlay", "slider-overlay--active").addTo(controller);
        $(window).resize(function () {
            controller.updateScene(scene, true);
        });

    } else {
        tl
            .add(tweenContent5)
            .add(tweenContent4)
            .add(tweenContent2)
            .add(tweenContent3)
            .add(tweenContent1)
        const scene = new ScrollMagic.Scene({
            triggerHook: 0,
            duration: 300,
            offset: 0,
        })
            .setPin(".hero-visual-mit-content")
            .setClassToggle(".slider-overlay", "slider-overlay--active")
            .setTween(tl)
            .addTo(controller);
        $(window).resize(function () {
            controller.updateScene(scene, true);
        });
    }

    // Tooltip popover
    $('[data-toggle="popover"]').popover({
        html: true,
        trigger: 'click'
    });

    // On Click next theme-slider
    $(".theme-slider-init .owl-nav .owl-next").on("click", function (e) {
        $('.theme-slider-tile').removeClass('theme-slider-tile-hover');
        $('.theme-slider-tile').addClass('theme-slider-tile-hover');
    });

    // Member-modal
    $('.member-modal').on('shown.bs.modal', function () {
        setTimeout(function () {
            $('.member-slide').addClass('member-slide-hover');
        }, 500);
    });
    $('.member-modal').on('hidden.bs.modal', function (e) {
        $('.member-slide').removeClass('member-slide-hover');
    });
});

$(window).resize(function () {
    $('.hero-visual-mit-content').css('width', win_width());
    $('.hero-visual-mit-buttons').css('width', win_width());
    $('.landing-slider-init .landing-slide').css('height', win_height());
    $('.hero-visual-mit-content .content-slide').css('height', win_height());
    $('.hero-visual-mit-buttons .button-slide').css('height', win_height());
    nav_height();
});

$(window).on('load', function () {
    setTimeout(remove_loader, 700);
    // Functionality (mit-buttons)
    setTimeout(function () {
        $('.hero-visual-mit-buttons .landing-slide-tablet').css('background-position', '0 0');
        $('.hero-visual-mit-buttons .landing-slide-mobile').css('background-position', '0 0');
        $('.hero-visual-mit-buttons .landing-slide').css('background-position', '0 0');
        $('.landing-slider-content h1').css('transform', 'translateY(0)');
        $('.slider-action-link').css('opacity', '1');
    }, 2000);
});

var stickyOffset = $('header').height();
var previousScroll = 0;

$(window).scroll(function () {
    // Theme Sldier Animation
    if ($('.theme-slide').length) {
        var hT = $('.theme-slide').offset().top,
            hH = $('.theme-slide').outerHeight(),
            wH = $(window).height(),
            wS = $(this).scrollTop();
        if (wS > (hT + hH - wH)) {
            theme_slider();
        }
    }

    // Teaser Element Animation
    if ($('.teaser-elemente-thumb').length) {
        var tE = $('.teaser-elemente').offset().top,
            hT = $('.teaser-elemente').outerHeight() - 250,
            wH = $(window).height(),
            wS = $(this).scrollTop();

        if ($(window).width() < 768) {
            hT = $('.teaser-elemente').outerHeight() - 500;
        } else {
            hT = $('.teaser-elemente').outerHeight() - 250;
        }


        if (wS > (tE + hT - wH)) {
            teaser_element();
        }
    }

    var scroll = $(window).scrollTop();

    /* for go to top arrow */
    var currentScroll = $(this).scrollTop();
    if (currentScroll > previousScroll) {
        if (scroll >= stickyOffset + 100) {
            $('.goto-top').addClass('visible');
        }
    } else {
        $('.goto-top').removeClass('visible');
    }
});

$(document).on("touchstart click", function (e) {
    container = $('.custom-dropdown-wrap');
    contactInfo = $('.menu-trigger-wrapper');
    if (!container.is(e.target) && container.has(e.target).length === 0 && !contactInfo.is(e.target) && contactInfo.has(e.target).length === 0) {
        $('.custom-dropdown-wrap .custom-dropdown').slideUp();
        $('.custom-dropdown-wrap').removeClass('open');
    }
});

function nav_height() {
    $('.navigation').css('height', win_height() - header_height());
    if ($('.menu--open').length) {
        var navBottomHeight = $('.navigation .nav-bottom').outerHeight();
        $('.navigation nav').css('height', win_height() - (header_height() + navBottomHeight));
        $('.frequent-search-result').css('height', win_height() - (header_height() + navBottomHeight));
    }
}
function win_height() {
    return $(window).outerHeight();
}
function win_width() {
    return $(window).width();
}
function header_height() {
    return $('header.page').outerHeight();
}
function remove_loader() {
    $('.preloader').hide();
}

function theme_slider() {
    $('.theme-slider-tile').each(function (i) {
        var $li = $(this);
        setTimeout(function () {
            $li.addClass('theme-slider-tile-hover');
        }, i * 900);
    });
}

function teaser_element() {
    $('.teaser-elemente-tile').each(function (i) {
        var $li = $(this);
        setTimeout(function () {
            $li.addClass('teaser-elemente-tile-hover');
        }, i * 900);
    });
}
