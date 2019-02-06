/**
 * customizer.js
 *
 *
 *  Instantly live-update customizer settings in the preview for improved user experience.
 */

/* global get_post_aj */

function bfastmag_html_entity_decode(string, quote_style) {
    'use strict';
    var hash_map = {},
        symbol = '',
        tmp_str = '',
        entity = '';
    tmp_str = string.toString();

    if (false === (hash_map = bfastmag_get_html_translation_table('HTML_ENTITIES', quote_style))) {
        return false;
    }

    delete(hash_map['&']);
    hash_map['&'] = '&amp;';

    for (symbol in hash_map) {
        entity = hash_map[symbol];
        tmp_str = tmp_str.split(entity)
            .join(symbol);
    }
    tmp_str = tmp_str.split('&#039;')
        .join('\'');

    return tmp_str;
}

function bfastmag_get_html_translation_table(table, quote_style) {
    'use strict';
    var entities = {},
        hash_map = {},
        decimal;
    var constMappingTable = {},
        constMappingQuoteStyle = {};
    var useTable = {},
        useQuoteStyle = {};

    // Translate arguments
    constMappingTable[0] = 'HTML_SPECIALCHARS';
    constMappingTable[1] = 'HTML_ENTITIES';
    constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
    constMappingQuoteStyle[2] = 'ENT_COMPAT';
    constMappingQuoteStyle[3] = 'ENT_QUOTES';

    useTable = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
    useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() :
        'ENT_COMPAT';

    if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
        throw new Error('Table: ' + useTable + ' not supported');
        // return false;
    }

    entities['38'] = '&amp;';
    if (useTable === 'HTML_ENTITIES') {
        entities['160'] = '&nbsp;';
        entities['161'] = '&iexcl;';
        entities['162'] = '&cent;';
        entities['163'] = '&pound;';
        entities['164'] = '&curren;';
        entities['165'] = '&yen;';
        entities['166'] = '&brvbar;';
        entities['167'] = '&sect;';
        entities['168'] = '&uml;';
        entities['169'] = '&copy;';
        entities['170'] = '&ordf;';
        entities['171'] = '&laquo;';
        entities['172'] = '&not;';
        entities['173'] = '&shy;';
        entities['174'] = '&reg;';
        entities['175'] = '&macr;';
        entities['176'] = '&deg;';
        entities['177'] = '&plusmn;';
        entities['178'] = '&sup2;';
        entities['179'] = '&sup3;';
        entities['180'] = '&acute;';
        entities['181'] = '&micro;';
        entities['182'] = '&para;';
        entities['183'] = '&middot;';
        entities['184'] = '&cedil;';
        entities['185'] = '&sup1;';
        entities['186'] = '&ordm;';
        entities['187'] = '&raquo;';
        entities['188'] = '&frac14;';
        entities['189'] = '&frac12;';
        entities['190'] = '&frac34;';
        entities['191'] = '&iquest;';
        entities['192'] = '&Agrave;';
        entities['193'] = '&Aacute;';
        entities['194'] = '&Acirc;';
        entities['195'] = '&Atilde;';
        entities['196'] = '&Auml;';
        entities['197'] = '&Aring;';
        entities['198'] = '&AElig;';
        entities['199'] = '&Ccedil;';
        entities['200'] = '&Egrave;';
        entities['201'] = '&Eacute;';
        entities['202'] = '&Ecirc;';
        entities['203'] = '&Euml;';
        entities['204'] = '&Igrave;';
        entities['205'] = '&Iacute;';
        entities['206'] = '&Icirc;';
        entities['207'] = '&Iuml;';
        entities['208'] = '&ETH;';
        entities['209'] = '&Ntilde;';
        entities['210'] = '&Ograve;';
        entities['211'] = '&Oacute;';
        entities['212'] = '&Ocirc;';
        entities['213'] = '&Otilde;';
        entities['214'] = '&Ouml;';
        entities['215'] = '&times;';
        entities['216'] = '&Oslash;';
        entities['217'] = '&Ugrave;';
        entities['218'] = '&Uacute;';
        entities['219'] = '&Ucirc;';
        entities['220'] = '&Uuml;';
        entities['221'] = '&Yacute;';
        entities['222'] = '&THORN;';
        entities['223'] = '&szlig;';
        entities['224'] = '&agrave;';
        entities['225'] = '&aacute;';
        entities['226'] = '&acirc;';
        entities['227'] = '&atilde;';
        entities['228'] = '&auml;';
        entities['229'] = '&aring;';
        entities['230'] = '&aelig;';
        entities['231'] = '&ccedil;';
        entities['232'] = '&egrave;';
        entities['233'] = '&eacute;';
        entities['234'] = '&ecirc;';
        entities['235'] = '&euml;';
        entities['236'] = '&igrave;';
        entities['237'] = '&iacute;';
        entities['238'] = '&icirc;';
        entities['239'] = '&iuml;';
        entities['240'] = '&eth;';
        entities['241'] = '&ntilde;';
        entities['242'] = '&ograve;';
        entities['243'] = '&oacute;';
        entities['244'] = '&ocirc;';
        entities['245'] = '&otilde;';
        entities['246'] = '&ouml;';
        entities['247'] = '&divide;';
        entities['248'] = '&oslash;';
        entities['249'] = '&ugrave;';
        entities['250'] = '&uacute;';
        entities['251'] = '&ucirc;';
        entities['252'] = '&uuml;';
        entities['253'] = '&yacute;';
        entities['254'] = '&thorn;';
        entities['255'] = '&yuml;';
    }

    if (useQuoteStyle !== 'ENT_NOQUOTES') {
        entities['34'] = '&quot;';
    }
    if (useQuoteStyle === 'ENT_QUOTES') {
        entities['39'] = '&#39;';
    }
    entities['60'] = '&lt;';
    entities['47'] = '&#x2F;';
    entities['62'] = '&gt;';

    // ascii decimals to real symbols
    for (decimal in entities) {
        if (entities.hasOwnProperty(decimal)) {
            hash_map[String.fromCharCode(decimal)] = entities[decimal];
        }
    }

    return hash_map;
}


function bfastmag_strip_tags(input, allowed) {
    'use strict';
    allowed = (((allowed || '') + '')
        .toLowerCase()
        .match(/<[a-z][a-z0-9]*>/g) || [])
        .join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
        commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
    return input.replace(commentsAndPhpTags, '')
        .replace(tags, function ($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
}


(function ($) {
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    // Titles color
    wp.customize('bfastmag_title_color', function (value) {
        value.bind(function (to) {
            $('.title-border span,	.page-header h1').css({'color': to});
        });
    });

    // Sidebar text color.
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            $('.bfastmag-content-right, .bfastmag-content-right a, .post .entry-content, .post .entry-content p, .post .entry-cats, .post .entry-cats a, .post .entry-comments,.post .entry-separator, .post .entry-footer a, .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content').css({'color': to});
        });
    });

    // Top slider title color
    wp.customize('bfastmag_top_slider_post_title_color', function (value) {
        value.bind(function (to) {
            $('.bfastmag-featured-slider .entry-title a').css({'color': to});
        });
    });

    // Top slider text color
    wp.customize('bfastmag_top_slider_post_text_color', function (value) {
        value.bind(function (to) {
            $('.bfastmag-featured-slider .tp-post-item-meta .tp-post-item-date, .bfastmag-featured-slider .tp-post-item-meta > a, .bfastmag-featured-slider .tp-post-item-meta .entry-separator').css({'color': to});
        });
    });

    // Post title color
    wp.customize('bfastmag_blocks_post_title_color', function (value) {
        value.bind(function (to) {
            $('.bfastmag-content-left .entry-title a').css({'color': to});
        });
    });

    // Post text color
    wp.customize('bfastmag_blocks_post_text_color', function (value) {
        value.bind(function (to) {
            $('.bfastmag-content-left .entry-meta .entry-separator, .bfastmag-content-left .entry-meta a, .bfastmag-content-left .bfastmag-fp-s3 .tp-post-item p, .bfastmag-content-left .bfastmag-related-posts .entry-content p, .bfastmag-content-left .bfastmag-related-posts .entry-cats .entry-label, .bfastmag-content-left .bfastmag-related-posts .entry-cats a, .bfastmag-content-left .bfastmag-related-posts > a, .bfastmag-content-left .bfastmag-related-posts .entry-footer > a').css({'color': to});
        });
    });

    // Repeater
    wp.customize('bfastmag_social_links', function (value) {
        value.bind(function (to) {
            var obj = JSON.parse(to);
            var result = '';
            obj.forEach(function (item) {

                result += '<a href="' + item.link + '" class="social-link"><i class="fa ' + item.icon_value + '"></i></a>';

            });

            $('.social-links').html(result);

        });
    });
    // Logo
    wp.customize('custom_logo', function (value) {
        value.bind(function (to) {
            if (to !== '') {
                $('.custom-logo-link').removeClass('bfastmag_customizer_only');
                $('.head-logo-container').addClass('bfastmag_customizer_only');
            }
            else {
                $('.custom-logo-link').addClass('bfastmag_customizer_only');
                $('.head-logo-container').removeClass('bfastmag_customizer_only');
            }
        });
    });

    wp.customize('bfastmag_banner', function (value) {
        value.bind(function (to) {
            var obj = JSON.parse(to);
            if (obj.position !== '') {
                $('.bfastmag-a-d-v').attr('style', 'text-align:' + obj.position);
            }
            if (obj.choice === 'code') {
                if (obj.code !== '') {
                    $('.bfastmag-a-d-v').html(bfastmag_html_entity_decode(obj.code));
                }
            } else {
                if (obj.image_url !== '') {
                    if (obj.link !== '') {
                        $('.bfastmag-a-d-v').html('<a href="' + obj.link + '"><img src="' + obj.image_url + '" alt="Banner link"></a>');
                    } else {
                        $('.bfastmag-a-d-v').html('<img src="' + obj.image_url + '" alt="Banner link">');
                    }
                }
            }

        });
    });

    // Featured Big Category
    wp.customize('bfastmag_featured_big_category', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_featured_big_cat',
                    category: to,
                    tp_no_of_posts: 4
                },
                beforeSend: function () {
                    jQuery('.featured-wrap').replaceWith('<div class="featured-wrap" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.featured-wrap').replaceWith(result);
                    jQuery('.featured-wrap').addClass('animated');
   
                }
            });
        });
    });

    // Featured Slider Category
    wp.customize('bfastmag_featured_slider_category', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_topslider_category',
                    category: to,
                    tp_no_of_posts: wp.customize._value.bfastmag_featured_slider_max_posts()
                },
                beforeSend: function () {
                    jQuery('.owl-carousel.bfastmag-top-carousel').replaceWith('<div class="owl-carousel bfastmag-top-carousel" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.owl-carousel.bfastmag-top-carousel').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-top-carousel').owlCarousel({
                        loop: true,
                        margin: 0,
                        responsiveClass: true,
                        nav: false,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 10000,
                        lazyLoad: true,
                        animateIn: true,
                        responsive: {
                            0: {items: 1},
                            600: {items: 2},
                            992: {items: 3}
                        }
                    });
                }
            });
        });
    });

    // Featured Slider No of posts
    wp.customize('bfastmag_featured_slider_max_posts', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_topslider_category',
                    category: wp.customize._value.bfastmag_featured_slider_category(),
                    tp_no_of_posts: to
                },
                beforeSend: function () {
                    jQuery('.owl-carousel.bfastmag-top-carousel').replaceWith('<div class="owl-carousel bfastmag-top-carousel" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.owl-carousel.bfastmag-top-carousel').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-top-carousel').owlCarousel({
                        loop: true,
                        margin: 0,
                        responsiveClass: true,
                        nav: false,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 10000,
                        lazyLoad: true,
                        animateIn: true,
                        responsive: {
                            0: {items: 1},
                            600: {items: 2},
                            992: {items: 3}
                        }
                    });
                }
            });
        });
    });

    // Section1 title
    wp.customize('bfastmag_featured_slider_title', function (value) {
        value.bind(function (to) {
            if (to !== '') {
                $('.bfastmag-featured-slider .title-border').removeClass('bfastmag_customizer_only');
                $('.bfastmag-featured-slider .title-border span').text(to);
                $('.bfastmag-featured-slider .title-border span').append('<span class="line"></span>');
            } else {
                $('.bfastmag-featured-slider .title-border').addClass('bfastmag_customizer_only');
            }
        });
    });  

    // Section1 title
    wp.customize('bfastmag_block1_title', function (value) {
        value.bind(function (to) {
            if (to !== '') {
                $('.bfastmag-block1 .title-border').removeClass('bfastmag_customizer_only');
                $('.bfastmag-block1 .title-border span').text(to);
                $('.bfastmag-block1  .title-border span').append('<span class="line"></span>');
            } else {
                $('.bfastmag-block1 .title-border').addClass('bfastmag_customizer_only');
            }
        });
    });

    // Section1 Category
    wp.customize('bfastmag_block1_category', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block1_category',
                    category: to,
                    tp_no_of_posts: wp.customize._value.bfastmag_block1_max_posts(),
                    posts_per_page: wp.customize._value.bfastmag_block1_posts_per_page()

                },
                beforeSend: function () {
                    jQuery('.bfastmag-block1').find('.bfastmag-fp-s3').replaceWith('<div class="bfastmag-fp-s3" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block1').find('.bfastmag-fp-s3').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s3-posts').owlCarousel({
                        loop: false,
                        margin: 0,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 15000,
                        items: 1,
                        lazyLoad: true,
                    });
                }
            });
        });
    });

    // Section 1 number of posts
    wp.customize('bfastmag_block1_max_posts', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block1_category',
                    tp_no_of_posts: to,
                    posts_per_page: wp.customize._value.bfastmag_block1_posts_per_page(),
                    category: wp.customize._value.bfastmag_block1_category()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block1').find('.bfastmag-fp-s3').replaceWith('<div class="bfastmag-fp-s3" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block1').find('.bfastmag-fp-s3').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s3-posts').owlCarousel({
                        loop: false,
                        margin: 0,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 15000,
                        items: 1,
                        lazyLoad: true,
                    });
                }
            });
        });
    });

    // Section 1 posts per page
    wp.customize('bfastmag_block1_posts_per_page', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block1_category',
                    posts_per_page: to,
                    category: wp.customize._value.bfastmag_block1_category(),
                    tp_no_of_posts: wp.customize._value.bfastmag_block1_max_posts()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block1').find('.bfastmag-fp-s3').replaceWith('<div class="bfastmag-fp-s3" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block1').find('.bfastmag-fp-s3').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s3-posts').owlCarousel({
                        loop: false,
                        margin: 0,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 15000,
                        items: 1,
                        lazyLoad: true,
                    });
                }
            });
        });
    });
    // Section 2  Title
    wp.customize('bfastmag_block2_title', function (value) {
        value.bind(function (to) {
            if (to !== '') {
                $('.bfastmag-block2 .title-border').removeClass('bfastmag_customizer_only');
                $('.bfastmag-block2 .title-border span').text(to);
                $('.bfastmag-block2  .title-border span').append('<span class="line"></span>');

            } else {
                $('.bfastmag-block2 .title-border').addClass('bfastmag_customizer_only');
            }
        });
    });


    // Section2 Category
    wp.customize('bfastmag_block2_category', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block2_category',
                    category: to,
                    tp_no_of_posts: wp.customize._value.bfastmag_block2_max_posts(),
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block2').find('.bfastmag-fp-s1').replaceWith('<div class="bfastmag-fp-s1" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block2').find('.bfastmag-fp-s1').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s1-posts').owlCarousel({
                        loop: true,
                        margin: 30,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 12000,
                        lazyLoad: true,
                        animateIn: true,
                        responsive: {
                            0: {items: 1},
                            600: {items: 2},
                            992: {items: 3}
                        }
                    });
                }
            });
        });
    });

    // Section 2 No of posts
    wp.customize('bfastmag_block2_max_posts', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block2_category',
                    tp_no_of_posts: to,
                    category: wp.customize._value.bfastmag_block2_category()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block2').find('.bfastmag-fp-s1').replaceWith('<div class="bfastmag-fp-s1" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block2').find('.bfastmag-fp-s1').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s1-posts').owlCarousel({
                        loop: true,
                        margin: 30,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 12000,
                        lazyLoad: true,
                        animateIn: true,
                        responsive: {
                            0: {items: 1},
                            600: {items: 2},
                            992: {items: 3}
                        }
                    });
                }
            });
        });
    });

    // Section3 Title
    wp.customize('bfastmag_block3_title', function (value) {
        value.bind(function (to) {
            if (to !== '') {
                $('.bfastmag-block3 .title-border').removeClass('bfastmag_customizer_only');
                $('.bfastmag-block3 .title-border span').text(to);
                $('.bfastmag-block3  .title-border span').append('<span class="line"></span>');
            } else {
                $('.bfastmag-block3 .title-border').addClass('bfastmag_customizer_only');
            }
        });
    });

    // Section3 Category
    wp.customize('bfastmag_block3_category', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block3_category',
                    category: to,
                    tp_no_of_posts: wp.customize._value.bfastmag_block3_max_posts()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block3').find('.bfastmag-fp-s2').replaceWith('<div class="bfastmag-fp-s2" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block3').find('.bfastmag-fp-s2').replaceWith(result);
                }
            });
        });
    });

    // Section 3 No of posts
    wp.customize('bfastmag_block3_max_posts', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block3_category',
                    tp_no_of_posts: to,
                    category: wp.customize._value.bfastmag_block3_category()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block3').find('.bfastmag-fp-s2').replaceWith('<div class="bfastmag-fp-s2" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block3').find('.bfastmag-fp-s2').replaceWith(result);
                }
            });
        });
    });

    // Section4 Title
    wp.customize('bfastmag_block4_title', function (value) {
        value.bind(function (to) {
            if (to !== '') {
                $('.bfastmag-block4 .title-border').removeClass('bfastmag_customizer_only');
                $('.bfastmag-block4 .title-border span').text(to);
                $('.bfastmag-block4  .title-border span').append('<span class="line"></span>');
            } else {
                $('.bfastmag-block4 .title-border').addClass('bfastmag_customizer_only');
            }
        });
    });


    // Section4 Category
    wp.customize('bfastmag_block4_category', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block4_category',
                    category: to,
                    tp_no_of_posts: wp.customize._value.bfastmag_block4_max_posts()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block4').find('.bfastmag-fp-s1').replaceWith('<div class="bfastmag-fp-s1" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block4').find('.bfastmag-fp-s1').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s1-posts').owlCarousel({
                        loop: true,
                        margin: 30,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 12000,
                        lazyLoad: true,
                        animateIn: true,
                        responsive: {
                            0: {items: 1},
                            600: {items: 2},
                            992: {items: 3}
                        }
                    });
                }
            });
        });
    });

    // Section 4 N0 of posts
    wp.customize('bfastmag_block4_max_posts', function (value) {
        value.bind(function (to) {
            jQuery.ajax({
                url: get_post_aj.ajaxurl,
                type: 'post',
                data: {
                    action: 'get_post_aj_act',
                    section: 'bfastmag_block4_category',
                    tp_no_of_posts: to,
                    category: wp.customize._value.bfastmag_block4_category()
                },
                beforeSend: function () {
                    jQuery('.bfastmag-block4').find('.bfastmag-fp-s1').replaceWith('<div class="bfastmag-fp-s1" id="loader">Loading New Posts...</div>');
                },
                success: function (result) {
                    jQuery('.bfastmag-block4').find('.bfastmag-fp-s1').replaceWith(result);
                    jQuery('.owl-carousel.bfastmag-fp-s1-posts').owlCarousel({
                        loop: true,
                        margin: 30,
                        responsiveClass: true,
                        nav: true,
                        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 12000,
                        lazyLoad: true,
                        animateIn: true,
                        responsive: {
                            0: {items: 1},
                            600: {items: 2},
                            992: {items: 3}
                        }
                    });
                }
            });
        });
    });


 
 

    wp.customize('bfastmag_disable_single_hide_author', function (value) {
        value.bind(function (to) {
            if (true !== to) {
                $('.about-author ').removeClass('bfastmag_hide');
            } else {
                $('.about-author ').addClass('bfastmag_hide');
            }
        });
    });

    wp.customize('bfastmag_single_post_hide_related_posts', function (value) {
        value.bind(function (to) {
            if (true !== to) {
                $('.bfastmag-related-posts ').removeClass('bfastmag_hide');
                $('.bfastmag-related-posts-title ').removeClass('bfastmag_hide');
            } else {
                $('.bfastmag-related-posts ').addClass('bfastmag_hide');
                $('.bfastmag-related-posts-title ').addClass('bfastmag_hide');
            }
        });
    });

    wp.customize('bfastmag_disable_singlePost_featured_img', function (value) {
        value.bind(function (to) {
            if (true !== to) {
                $('.post .tp-post-thumbnail').removeClass('bfastmag_customizer_only');
            } else {
                $('.post .tp-post-thumbnail').addClass('bfastmag_customizer_only');
            }
        });
    });


    wp.customize('bfastmag_footer_logo', function (value) {
        value.bind(function (to) {
            $('.bfastmag-footer-logo img').attr('src', to);
        });
    });

    wp.customize('bfastmag_footer_link', function (value) {
        value.bind(function (to) {
            $('.bfastmag-footer-logo').attr('href', to);
        });
    });

    wp.customize('bfastmag_footer_text', function (value) {
        value.bind(function (to) {
            var escaped_content = bfastmag_strip_tags(to, '<p><br><em><strong><ul><li><a><button><address><abbr>');
            $('.bfastmag-footer-content').html(escaped_content);
        });
    });

    wp.customize('bfastmag_footer_socials_title', function (value) {
        value.bind(function (to) {
            $('.social-links-label').text(to);
        });
    });

    wp.customize('bfastmag_footer_social_icons', function (value) {
        value.bind(function (to) {
            var obj = JSON.parse(to);
            var result = '';
            obj.forEach(function (item) {

                result += '<a href="' + item.link + '" class="footer-social-link"><i class="fa ' + item.icon_value + '"></i></a>';

            });
            $('.footer-social-links').html(result);
        });
    });

})(jQuery);
