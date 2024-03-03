jQuery(document).ready(function ($) {
  var slider_auto, slider_loop, rtl, winWidth;

  if (travel_muni_data.auto == "1") {
    slider_auto = true;
  } else {
    slider_auto = false;
  }

  if (travel_muni_data.loop == "1") {
    slider_loop = true;
  } else {
    slider_loop = false;
  }

  if (travel_muni_data.rtl == "1") {
    rtl = true;
  } else {
    rtl = false;
  }

  if (travel_muni_data.one_page == "1") {
    one_page = true;
  } else {
    one_page = false;
  }

  // travel_muni_data
  //Header Search
  var navWidth = $(".main-navigation").width();
  var searchWidth = $("header.site-header .search-icon").outerWidth();
  var headerbhght = $("header.site-header .header-b").outerHeight();

  $(".site-header .header-b .search-icon").on("click", function () {
    $(".site-header .header-b .search-form").addClass("form-open");
    $(".site-header .header-b .search-icon").addClass("form-open-parent");
  });

  $(".site-header .header-b .btn-form-close").on("click", function () {
    $(".site-header .header-b .search-form").removeClass("form-open");
    $(".site-header .header-b .search-icon").removeClass("form-open-parent");
  });

  // mobile search
  $(".mobile-header .mobile-header-t .header-searh-wrap").css(
    "height",
    parseFloat($(".mobile-header .mobile-header-b").outerHeight()) + "px"
  );

  // header search
  $(".search-form-section .search-icon").on("click", function () {
    $(".search-form-section .header-searh-wrap").fadeIn();
  });

  $(".search-form-section .btn-form-close").on("click", function () {
    $(".search-form-section .header-searh-wrap").fadeOut();
  });

  //special offers
  $(".special-offer .special-offer-slid-sc").owlCarousel({
    items: 3,
    nav: true,
    dots: false,
    loop: false,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    margin: 45,
    smartSpeed: 800,
    responsive: {
      0: {
        items: 1,
      },

      768: {
        items: 2,
      },
      1024: {
        items: 3,
        margin: 12,
      },
      1420: {
        items: 3,
        margin: 28,
      },
    },
  });

  //special offers
  $(".best-seller-slid-sc").owlCarousel({
    items: 3,
    nav: true,
    dots: false,
    loop: false,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    margin: 45,
    smartSpeed: 800,
    responsive: {
      0: {
        items: 1,
      },

      768: {
        items: 2,
      },
      1024: {
        items: 3,
        margin: 12,
      },
      1420: {
        items: 3,
        margin: 28,
      },
    },
  });

  $(".insd-post-sp-offer").owlCarousel({
    items: 3,
    nav: true,
    dots: false,
    loop: false,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    margin: 20,
    smartSpeed: 800,
    responsive: {
      0: {
        items: 1,
      },

      768: {
        items: 2,
      },

      1366: {
        items: 3,
      },
    },
  });

  //Sticky widget
  if (travel_muni_data.sticky_widget == "1" && $(window).width() > 1024) {
    $("#secondary").addClass("sticky-widget");
  }

  // Sticky Header
  var mns = "sticky";
  mn = $(".sticky-header .header-b");
  hcta = $(".sticky-header .header-cta").outerHeight();
  hdr = $(".sticky-header .header-t").outerHeight();
  thm = $(".sticky-header .header-m").outerHeight();
  stickHolderHeight = $(".sticky-header .header-b").outerHeight();
  navTabHeight = $(
    ".single-trip .content-wrap-main #tabs-container .nav-tab-wrapper"
  ).outerHeight();
  if ($("header").find(".header-m").length) {
    var topTotal = parseInt(hdr) + parseInt(thm) + parseInt(hcta);
  } else {
    var topTotal = hdr;
  }

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > topTotal) {
      mn.addClass(mns);
      $(".sticky-header .sticky-holder").height(stickHolderHeight);
    } else {
      mn.removeClass(mns);
      $(".sticky-header .sticky-holder").height(0);
    }
  });

  //Added dynamic top value in sidebar nav
  $(".page-template-about .about-content-wrap .about-content-navbar").css(
    "top",
    parseFloat(stickHolderHeight) + "px"
  );

  //Added dynamic top value in checkout book-summary
  $(".sticky-header .wpte-bf-checkout .wpte-bf-book-summary").css(
    "top",
    parseFloat(stickHolderHeight) + 20 + "px"
  );
  $(".sticky-header.admin-bar .wpte-bf-checkout .wpte-bf-book-summary").css(
    "top",
    parseFloat(stickHolderHeight) + 52 + "px"
  );

  //single trip onepage scroll
  var navtopOffset = $(".nav-tab-wrapper").outerHeight() + 46;
  if ($(window).width() <= 767) {
    var navoffsetVal = navtopOffset;
  } else {
    var navoffsetVal = 46;
  }

  //mobile menu
  $('<button class="arrow-down"></button>').insertAfter(
    $(".mobile-navigation ul .menu-item-has-children > a")
  );
  $(".mobile-navigation ul .mega-menu-item").append(
    '<button class="arrow-down"></button>'
  );
  $(".mobile-navigation ul li .arrow-down").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("active");
  });
  //responsive menu toggle
  $(".mobile-header .mobile-menu-opener").on("click", function () {
    $(".mobile-menu-wrapper").animate({
      width: "toggle",
    });
  });

  $(".mobile-header .btn-menu-close").on("click", function () {
    $(".mobile-menu-wrapper").animate({
      width: "toggle",
    });
  });

  $(".overlay").on("click", function () {
    $("body").removeClass("menu-open");
  });

  // Script for back to top
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 300) {
      $("#back-top").fadeIn();
    } else {
      $("#back-top").fadeOut();
    }
  });
  $("#back-top").on("click", function () {
    $("html,body").animate({ scrollTop: 0 }, 600);
  });

  // Menu Accessibility

  $(".main-navigation ul li a")
    .on("focus", function () {
      $(this).parents("li").addClass("focus");
    })
    .on("blur", function () {
      $(this).parents("li").removeClass("focus");
    });


  $(".language-dropdown li.menu-item-has-children > a").on(
    "click",
    function (e) {
      e.preventDefault();
      $(this).parent().toggleClass("langswiton");
      $(this).siblings("ul").slideToggle();
    }
  );

  $.fn.isInViewport = function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).innerHeight();

    var viewportTop = $(window).scrollTop();
    // var viewportBottom = viewportTop + $(window).height();

    return elementTop < viewportTop && elementBottom > viewportTop;
    // return elementTop < viewportTop && elementTop < viewportBottom;
  };

  $(window).on("resize scroll", function () {
    $(".tab-content").each(function () {
      if ($(this).isInViewport()) {
        $("body").addClass("fixed-tabbar");
      } else {
        $("body").removeClass("fixed-tabbar");
      }
    });
  });

  if (winWidth > 1024) {
    var sidebarHeight =
      $(".single-trip .trip-content-area .widget-area").outerHeight() +
      $(".single-trip .trip-content-area .wpte-bf-outer").outerHeight();
    $(window).on("scroll", function () {
      if ($(this).scrollTop() > sidebarHeight) {
        $("body").addClass("sticky-bookingform");
      } else {
        $("body").removeClass("sticky-bookingform");
      }
    });
  }

  //getting values of trip search count on trip search
  var $search_count = $(".foundPosts").text();
  $("body .tmp-no-of-trips").text($search_count);
  jQuery(document).ajaxComplete(function (event, xhr, settings) {
    if (0 < jQuery(".foundPosts").length) {
      var $search_count = jQuery(".foundPosts").text();
      jQuery("body .tmp-no-of-trips").text($search_count);
    }
  });

  if (travel_muni_data.singular) {
    $(".wte-faq-header-wrapper input.checkbox").on("change", function () {
      if ($(this).is(":checked")) {
        $(this)
          .closest(".wte-faq-header-wrapper")
          .siblings(".post-data")
          .children()
          .addClass("row-active");
        $(".row-active")
          .find(".accordion-tabs-toggle .rotator")
          .addClass("open");
        $(".row-active").find(".accordion-tabs-toggle").addClass("active");
        $(".row-active").find(".faq-content").slideDown();
        $(".row-active").find(".faq-content").addClass("show");
      } else {
        $(this)
          .closest(".wte-faq-header-wrapper")
          .siblings(".post-data")
          .children()
          .removeClass("row-active");
        $(".faq-row")
          .find(".accordion-tabs-toggle .rotator")
          .removeClass("open");
        $(".faq-row").find(".accordion-tabs-toggle").removeClass("active");
        $(".faq-row").find(".faq-content").slideUp();
        $(".faq-row").find(".faq-content").removeClass("show");
      }
    });

    $(".wp-travel-engine-itinerary-header input.checkbox").on(
      "change",
      function () {
        if ($(this).is(":checked")) {
          $(this)
            .closest(".wte-itinerary-header-wrapper")
            .siblings(".post-data")
            .children()
            .addClass("row-active");
          $(".row-active")
            .find(".accordion-tabs-toggle .rotator")
            .addClass("open");
          $(".row-active").find(".accordion-tabs-toggle").addClass("active");
          $(".row-active").find(".itinerary-content").slideDown();
          $(".row-active").find(".itinerary-content").addClass("show");
        } else {
          $(this)
            .closest(".wte-itinerary-header-wrapper")
            .siblings(".post-data")
            .children()
            .removeClass("row-active");
          $(".itinerary-row")
            .find(".accordion-tabs-toggle .rotator")
            .removeClass("open");
          $(".itinerary-row")
            .find(".accordion-tabs-toggle")
            .removeClass("active");
          $(".itinerary-row").find(".itinerary-content").slideUp();
          $(".itinerary-row").find(".itinerary-content").removeClass("show");
        }
      }
    );
  }

  var bookingArea = document.querySelector('.wpte-booking-area .wpte-bf-price-wrap')
  if (bookingArea && !bookingArea.classList.contains('single')) {
    var bfPrice = bookingArea.querySelectorAll('.wpte-bf-price')
    if (bfPrice && bfPrice.length === 1) {
      bookingArea.classList.add('single')
    }
  }

  /*  Navigation Accessiblity
--------------------------------------------- */
  $(document).on('mousemove', 'body', function (e) {
    $(this).removeClass('keyboard-nav-on');
  });
  $(document).on('keydown', 'body', function (e) {
    if (e.which == 9) {
      $(this).addClass('keyboard-nav-on');
    }
  });

});


