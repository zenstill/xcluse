 
<footer class="site-footer-sec post_class" <?php if(is_home()){ ?>style="position:relative;	bottom:0;	width:100%; z-index:99"<?php } ?>>

<div class="site-header" role="banner">
  <div class="wrapper">
    <div class="grid--full">
   <div class="footer_search">
        <form action="" class="search-bar footer_bar_search" method="post">
          <input type="text" value="" placeholder="Send us feedback" aria-label="Send us feedback">
          <button type="submit" class="search-bar--submit icon-fallback-text" name="feedback_submit"> <i class="fa fa-envelope"></i> </button>
        </form>
        
      </div>
       <div id="quick-cart" class="footer footer_fb_search">
        
          <span>Follow Us</span>
           <span class="cart-count"><a href="https://www.facebook.com/XcluseShop" target="_blank" > <i class="fa fa-facebook"></i></a></span>
            <span class="cart-count t"><a href="https://twitter.com/XcluseShop" target="_blank" > <i class="fa fa-twitter"></i></a></span>
             <span class="cart-count g"><a href="https://plus.google.com/+XcluseShop/" target="_blank"> <i class="fa fa-google-plus"></i></a></span>
             <span class="cart-count p"><a href="https://www.pinterest.com/XcluseShop/" target="_blank" > <i class="fa fa-pinterest"></i></a></span>
             <span class="cart-count i"><a href="https://instagram.com/XcluseShop/" target="_blank"> <i class="fa fa-instagram"></i></a></span>
              </div>
      <!--<div class="grid-item large--one-quarter text-center">
        <h1 class="footer-product"> <a href="mailto:contact@xcluse.com" target="_top">Partners & Advertisers <i class="fa fa-envelope"></i></a> </h1>
      </div>-->
      
    </div>
  </div>
  </div>
</footer>
 <script src='<?php echo get_template_directory_uri();?>/js/jquery.velocity.min.js'></script> 
<script src="<?php echo get_template_directory_uri();?>/js/mtree.js"></script> 
 
<?php wp_footer();?>
</body>
</html>
