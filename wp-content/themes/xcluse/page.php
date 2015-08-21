<?php get_header();?>
<div class="clean-banners"></div>
<!-- list of items first start -->

<main class="main-content" role="main">
  <div class="wrapper">
    
    <div class="grid grid-border">
  <?php   if ( have_posts() ) : 
		           while ( have_posts() ) : the_post();
						the_content();
						endwhile;
		   endif; ?>
    </div>
  </div>
</main>
<?php get_footer();?>