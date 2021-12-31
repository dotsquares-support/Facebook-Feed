/**
 * Facebook Feed plugin for Craft CMS
 *
 * Facebook Feed JS
 *
 * @author    dotsquares
 * @copyright Copyright (c) 2021 dotsquares
 * @link      https://dotsquares.com
 * @package   FacebookFeed
 * @since     1.0.0
 */

$(document).ready(function() {

    $("#news-slider").owlCarousel({
        loop:true,
        margin:25,
        nav:true,
        responsiveClass:true,
        items:4,
        slideBy:4,
        autoplay:true,
        autoPlay: 2500,
    //autoPlay: true, <-- if you want to set default slide time (5000)

    slideSpeed: 300,
    paginationSpeed: 500,


        responsive:{
            
              0:{
                  items:1,
                  nav:true
            },
            400:{
                items:1,
                nav:false
            },
            767:{
                items:2,
                nav:true,
                loop:false
            },
            991:{
                items:3,
                nav:true,
                loop:false
            }
            }
        });
        });