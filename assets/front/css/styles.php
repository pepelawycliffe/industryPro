<?php
header("Content-type: text/css; charset: UTF-8");
if(isset($_GET['color']))
{
  $color = '#'.$_GET['color'];
}
else {
  $color = '#ff5e14';
}

?>
.mybtn1 {
  background: <?php echo $color; ?>;
  border: 1px solid <?php echo $color; ?>;}
  .mybtn1:hover {
    color: <?php echo $color; ?>;
    border: 1px solid <?php echo $color; ?>; }

.mybtn2 {
  color: <?php echo $color; ?>;
  border: 1px solid <?php echo $color; ?>; }
  .mybtn2:hover {
    background: <?php echo $color; ?>; }

    .section-heading .title span {
      color: <?php echo $color; ?>; }
.bottomtotop i {
  background: <?php echo $color; ?>; }
  .section-top .link {
    color: <?php echo $color; ?>; }
   .video-play-btn i {
    color: <?php echo $color; ?>;}
  .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .dropdown-menu {
    border-top: 3px solid <?php echo $color; ?>;}
      .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .dropdown-menu .dropdown-item:hover, .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .dropdown-menu .dropdown-item.active {
        color: <?php echo $color; ?>;}
  .mainmenu-area .navbar #main_menu .navbar-nav .nav-link.active, .mainmenu-area .navbar #main_menu .navbar-nav .nav-link:hover {
    color: <?php echo $color; ?>; }

.mainmenu-area .navbar #main_menu .mybtn1 {
  border: 1px solid <?php echo $color; ?>;
  padding: 8px 30px; }
  .mainmenu-area .navbar #main_menu .mybtn1:hover {
    background: #fff;
    border: 1px solid <?php echo $color; ?>;
    color: <?php echo $color; ?>; }
      .hero-area .hero-area-slider.owl-carousel .owl-controls .owl-nav .owl-prev:hover,
      .hero-area .hero-area-slider.owl-carousel .owl-controls .owl-nav .owl-next:hover {
        background: <?php echo $color; ?>; }
        .hero-area .hero-area-slider .intro-content .slider-content .layer-1 .title {
          color: <?php echo $color; ?>; }
    .single-feature .content .link {
      background: <?php echo $color; ?>; }
    .single-service:hover .content .title {
      color: <?php echo $color; ?>; }
    .gallery .single-project .link {
      background: <?php echo $color; ?>;}
  .gallery .owl-carousel.owl-theme .owl-controls .owl-nav div.owl-prev,
  .gallery .owl-carousel.owl-theme .owl-controls .owl-nav div.owl-next {
    background: <?php echo $color; ?>; }
        .single-team .content .social-links li a:hover {
          background: <?php echo $color; ?>;}
        .blog .owl-controls .owl-dots .owl-dot.active {
          background: <?php echo $color; ?>;}
      .single-blog .content .title:hover {
        color: <?php echo $color; ?>; }
          .single-blog .content .top-meta li a i {
            color: <?php echo $color; ?>; }
    .single-blog .content .link {
      background: <?php echo $color; ?>;
 }
    .blog .blog-box .blog-images .date {
      background: <?php echo $color; ?>;}
    .blog .blog-box .details .content blockquote {
      background: <?php echo $color; ?>; }
      .blog-details .social-link .social-links li a {
        background: <?php echo $color; ?>; }
  .serch-widget input {
    border-bottom: 1px solid <?php echo $color; ?>; }
    .serch-widget input:focus {
      border-bottom: 1px solid <?php echo $color; ?>; }
  .serch-widget .submit {
    background: <?php echo $color; ?>;
    border: 1px solid <?php echo $color; ?>;}
    .serch-widget .submit:hover {
      color: <?php echo $color; ?>; }        
        .categori .categori-list li a:hover, .categori .categori-list li a.active {
          color: <?php echo $color; ?>; }
            .recent-post-widget .post-list li .post .post-details .post-title:hover {
              color: <?php echo $color; ?>; }
  .newsletter-widget input {
    border-bottom: 1px solid <?php echo $color; ?>; }
    .newsletter-widget input:focus {
      border-bottom: 1px solid <?php echo $color; ?>; }
  .newsletter-widget .submit {
    background: <?php echo $color; ?>;
    border: 1px solid <?php echo $color; ?>; }
    .newsletter-widget .submit:hover {
      color: <?php echo $color; ?>; }
        .tags .tags-list li a:hover {
          background: <?php echo $color; ?>;
          border-color: <?php echo $color; ?>;}
            .contact-us .left-area .contact-form ul li .input-field:focus {
              border-bottom: 1px solid #ff5e14 !important; }
        .contact-us .left-area .contact-form .captcha-area li .input-field:focus {
          border-bottom: 1px solid #ff5e14 !important; }
      .contact-us .left-area .contact-form .submit-btn {
        background: <?php echo $color; ?>;}
        .contact-us .left-area .contact-form .submit-btn:hover {
          border: 1px solid <?php echo $color; ?>;
          color: <?php echo $color; ?>; }
      .contact-us .right-area .contact-info .left::after {
        background: <?php echo $color; ?>; }
        .contact-us .right-area .social-links ul li a {
          background: #f1f4fb;
          color: <?php echo $color; ?>; }
          .contact-us .right-area .social-links ul li a:hover {
            background: <?php echo $color; ?>; }
.ui-accordion .ui-accordion-header {
  background: <?php echo $color; ?>;}

  .single-team .content {
    background: <?php echo $color; ?>e6;
    }
    .testimonial .owl-controls .owl-dots .owl-dot.active{
      background: <?php echo $color; ?>;
    }
    .address-widget .about-info li p i {
      color: <?php echo $color; ?>; }
  .address-widget .about-info li:hover i {
    background: <?php echo $color; ?>;
    border-color: <?php echo $color; ?>;}

    .blog .blog-box .details .post-meta li a:hover{
      color: <?php echo $color; ?>;
    }
      .footer .fotter-social-links ul li a {
        color: <?php echo $color; ?>; }
        .footer .fotter-social-links ul li a:hover {
          background: <?php echo $color; ?>;
          border: 1px solid <?php echo $color; ?>;}
  .footer-newsletter-widget .newsletter-form-area button {
    background: <?php echo $color; ?>;}
        .footer .copy-bg .content .content p a {
          color: <?php echo $color; ?>; }
    .single-feature .content::before {
      background: <?php echo $color; ?>33;

      }
      .contact-us .left-area .contact-form ul li .input-field:focus {
    border-bottom: 1px solid <?php echo $color; ?> !important;
}

    .single-feature:hover .content::before {
      background: <?php echo $color; ?>1a;
      }
      .pricing .single-plan:hover {
        border: 1px solid <?php echo $color; ?>;
      }
      .statistic .single-statistic::before{
        background: <?php echo $color; ?>;
      }

    .hero-area .hero-area-slider.owl-carousel .owl-controls .owl-nav .owl-prev,
    .hero-area .hero-area-slider.owl-carousel .owl-controls .owl-nav .owl-next {
      color: <?php echo $color; ?>;;
}

.page-center ul.pagination li {
    background: <?php echo $color; ?>1a;
}
.page-center ul.pagination li.active {
    background: <?php echo $color; ?>;
}
    .thankyou .content .icon {
      color: <?php echo $color; ?>; }
    .order-details .order-details-box .header {
      background: <?php echo $color; ?>;}
    .order-details .order-details-box .content .patment-method {
      background: <?php echo $color; ?>; }
    .order-details .order-details-box .content .btn-checkout {
      border: 1px solid <?php echo $color; ?>;
      color: <?php echo $color; ?>; }
      .order-details .order-details-box .content .btn-checkout:hover {
        background: <?php echo $color; ?>; }
  .order-details .pricing-plan {
    background: <?php echo $color; ?>; }
  .input-field:focus {
    border-bottom: 1px solid <?php echo $color; ?> !important; }
              .single-blog .content .top-meta li span i {
            color: <?php echo $color; ?>;}
        .footer .footer-widget ul li a:hover {
          color: <?php echo $color; ?>; }
          .modal .modal-content .modal-header .close:hover {
        background: <?php echo $color; ?>; }
        .login-area .header-area .title {
          color: <?php echo $color; ?>; }
          .login-area .submit-btn {
          background: <?php echo $color; ?>;
          }
          .mainmenu-area .navbar #main_menu .navbar-nav .nav-item.mega-menu .dropdown-menu .title{
    color: <?php echo $color; ?>;
  }
