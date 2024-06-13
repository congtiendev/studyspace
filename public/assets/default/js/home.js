$(document).ready(function() {
    $(".search-slick").slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        autoplaySpeed: 2000,
        prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='bx bx-chevron-left'></i></button>",
        nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='bx bx-chevron-right'></i></button>",
        dots: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    arrows: false,
                    dots: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    arrows: false,
                    dots: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                    infinite: false,
                    dots: false,
                }
            }
        ]
    });
});

$(document).ready(function() {
    $(".image-slider-banner").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2500,
        prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='bx bx-chevron-left'></i></button>",
        nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='bx bx-chevron-right'></i></button>",
        dots: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 3,
                    infinite: true,
                    arrows: false,
                    dots: false,
                    autoplay: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 2,
                    arrows: false,
                    dots: false,
                    infinite: true,
                    autoplay: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    infinite: true,
                    dots: false,
                    autoplay: true,
                }
            }
        ]
    });
});

