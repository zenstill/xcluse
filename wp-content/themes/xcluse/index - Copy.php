<?php get_header();?>
<div class="j_full_page">
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active"> <img src="<?php echo get_template_directory_uri();?>/images/slider3.jpg" class="wrapper1">
    <div class="slider_banner_con">
        <h3 class="header-slider-content">Give Your <br />Home A Spring <br />Refreshment</h3>
        <p>Short description — CTA link to New Arrivals / Sales / Price Drops</p>
        <span><a href="<?php echo HOME;?>product-category/small-appliances/">Shop Now</a></span>
      </div>
     </div>
        <div class="item"> <img src="<?php echo get_template_directory_uri();?>/images/slider3.jpg" class="wrapper1">
        <!--<div class="slider_banner_con">
        <h3 class="header-slider-content">Give Your <br />Home A Spring <br />Refreshment</h3>
        <p>Short description — CTA link to New Arrivals / Sales / Price Drops</p>
        <span><a href="">Shop Now</a></span>
      </div>--> </div>
            <div class="item"> <img src="<?php echo get_template_directory_uri();?>/images/slider3.jpg" class="wrapper1">
            <!--<div class="slider_banner_con">
        <h3 class="header-slider-content">Give Your <br />Home A Spring <br />Refreshment</h3>
        <p>Short description — CTA link to New Arrivals / Sales / Price Drops</p>
        <span><a href="">Shop Now</a></span>
      </div>--> </div>
  </div>
  
  <!-- Left and right controls --> 
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>  
  <div class="clean-banners"></div>
   <!-- list of items first start -->  
  
  
 <script type="text/javascript">
	 var winWidth = $(window).outerWidth();
    var winHeight = $(window).outerHeight();
// set initial div height / width
    $('.wrapper1').css({
      width: winWidth,
      height: winHeight
    });
// make sure div stays full width/height on resize
    $(window).resize(function () {
      var winWidth = $(window).outerWidth();
      var winHeight = $(window).outerHeight();

      $('.wrapper1').animate({
        'width': winWidth,
        'height': winHeight
      }, 0);
    });

</script>
</div>
  <?php get_footer();?>