<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i
        data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->

<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/tobii.min.js"></script>
<script src="./assets/js/tiny-slider.js"></script>
<script src="./assets/js/datepicker.min.js"></script>
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/parallax.js"></script>
<script src="./assets/js/feather.min.js"></script>
<script src="./assets/js/switcher.js"></script>
<script src="./assets/js/plugins.init.js"></script>
<script src="./assets/js/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    var owl_slider = $('.owl-carousel-slider').owlCarousel({
        rtl:true,
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        autoplay:true,
        autoplayTimeout:4500,
        transitionStyle: "fadeUp",
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        }
        });
    });
</script>
@yield('script')
