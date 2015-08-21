<script>
 jQuery(document).ready( function($){
	 $( ".text_search" ).on( "change", function() {
		 cur_search = $(this).val();
		 old_value = $( ".q" ).val();
		 if(old_value){
		con_value = old_value + "," + cur_search;
		 }else{
			 con_value = cur_search;
		 }
		  $(".q").val(con_value);
		   });
          		<?php $attribute_taxonomies = wc_get_attribute_taxonomies();
        foreach ($attribute_taxonomies as $tax) {
            if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) { ?>
		   $(".<?php echo $tax->attribute_name;?>.mtree-active").removeClass('mtree-closed');
		   $(".<?php echo $tax->attribute_name;?>.mtree-active").addClass('mtree-open');
		   $(".<?php echo $tax->attribute_name;?>.filter_block").css("display", "block"); 
		   $(".<?php echo $tax->attribute_name;?>.filter_block").css("height", "250px");
		   <?php } } ?>

		   
		    $( ".delete_brand a" ).on( "click", function() {
				cur_value = $(this).attr('class');
				$('#'+cur_value).prop('checked', false);
				 $("#filter_form").submit();
				 });
	 });
 </script>
 <script>

   $(document).ready(function() {
	   $( "body" ).on( "change", ".text_search", function() {
		   $(".text_search").val('');
		   var datastring = $("#filter_form").serialize();
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajax',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$("#my_jega").html(data);

					}
 	});	
	/* $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajaxclose',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$( ".for_delete_int" ).html(data);

					}
 	});	*/
				
   });
 /* $( "body" ).on( "click", ".delete_attri a", function() {
	       curr_del_value = $(this).data("value");
		   
		   $("#"+curr_del_value).trigger( "click" );
		   
		   //$("#"+curr_del_value).val('');
		  // $(this).parent('span').remove();
		   var datastring = $("#filter_form").serialize();
		
});	
  $( "body" ).on( "click", ".delete_q a", function() {
	      $(".text_search").val('');
	      del_value = $(this).text();
		  $("."+del_value).remove();
		  old_value = $( ".q" ).val();
		  old_arr_value = old_value.split(',');
		  y = jQuery.grep(old_arr_value, function(value) {
			  return value != del_value;
			});
			real_value = y.join(',');
			$( ".q" ).val(real_value);
		   

		   var datastring = $("#filter_form").serialize();
		   
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajax',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$("#my_jega").html(data);

					}
 	});	
	
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajaxclose',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$( ".for_delete_int" ).html(data);
						//$("#my_jega").html(data);
					}
 	});	
		
});	*/
     $( "body" ).on( "click", ".side_checkbox input", function() {
		  $(".text_search").val('');
		   var datastring = $("#filter_form").serialize();
		   window.history.replaceState("object or string", "Title", '?'+datastring);
		   //alert(datastring);
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajax',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$("#my_jega").html(data);

					}
 	});	
	
		    /*$.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajaxclose',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$( ".for_delete_int" ).html(data);
					}
 	});	*/
	
							
   });
   $("#filter_form").submit(function(e){
    return false;
   });
 $( "body" ).on( "click", "#save_search_submit", function() {
		   var datastring = $("#filter_form").serialize();
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'savesearchajax',  
					formdata:datastring,
					},
					context: this,  
					success: function(data){
						$(data).insertBefore('.for_save_search_append'); 
					}
 	});
	});
	
$( "body" ).on( "click", ".list-search .only_for_view", function() {
		   var saved_id = $(this).attr("id");
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'view_savesearchajax',  
					saved_id:saved_id,
					},
					context: this,  
					success: function(data){
						$("#my_jega").html(data);
					}
 	});
	});


/*$( "body" ).on( "click", ".list-search .only_for_view", function() {
		   var saved_id = $(this).attr("id");
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'view_savesearchajax',  
					saved_id:saved_id,
					},
					context: this,  
					success: function(data){
						$("#my_jega").html(data);
					}
 	});
	});	*/
	
	$( "body" ).on( "click", ".saved_search_delete", function() {
		   var saved_id = $(this).data("id");
		   $("#"+saved_id).parent('span').parent('li').remove();
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'delete_savesearchajax',  
					saved_id:saved_id,
					},
					context: this,  
					success: function(data){
					}
 	});
	});	
			
   });
</script>
<!---------archive product script-------------->
<script>
	 $(window).load(function() {
		 $(".products").css("display", "show");
	     $(".shop_loading").css("display", "none");
       });
	 $(window).unload(function() {
		$(".products").css("display", "none");
		$(".shop_loading").css("display", "block");
	  });
   $(document).ready(function() {
	   $( "body" ).on( "click", ".addtocompare", function() {
		  product_id = $(this).data( "productid" );
		  request = $(this).data( "request" );
		  //alert(product_id);
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtocompare',  
					product_id:product_id,
					request:request
					},
					context: this,  
					success: function(data){
					if(data == 'yes'){
						$(this).html('<i class="added_comp" title="Added to compare"></i>');
						 $(this).ajaxComplete(function(){
						            func2_comp();
					           });
						}else{
						  $("#myModal3").modal('show');
							setTimeout(function(){
							   $(".close").trigger("click");
								 }, 9000);
						}

					}
 	});				
   });
  	 function func2_comp(){
	 $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'compare_header_change_value',  
					},
					success: function(data){
					$(".for_compare").html(data);
					}
 	});	
	}	
   });
</script>
<script>

   $(document).ready(function() {
   $( "body" ).on( "click", ".six", function() {

	    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'change_size',  
					action_id:'six',
					},
					context: this,  
					success: function(data){
				}
 	});				
	
	 $('.for_spcl').removeClass( "col-lg-3" );
	 $('.for_spcl').addClass( "col-lg-2" );
	 $('.layout-picker-four').removeClass( "active" );
	 $('.layout-picker').addClass( "active" );
});
  $( "body" ).on( "click", ".four", function() {
       $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'change_size',  
					action_id:'four',
					},
					context: this,  
					success: function(data){
					}
 	});	
	 $('.for_spcl').removeClass( "col-lg-2" );
	 $('.for_spcl').addClass( "col-lg-3" );
	 $('.layout-picker').removeClass( "active" );
	 $('.layout-picker-four').addClass( "active" );
});
});
</script>
<script>

   $(document).ready(function() {
	   $( "body" ).on( "click", ".addtowishlist", function() {
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		  product_id = $(this).data( "productid" );
		  request = $(this).data( "request" );
		  //alert(product_id);
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'addtowishlist',  
					product_id:product_id,
					request:request
					},
					context: this,  
					success: function(data){
					$(this).ajaxStart(function(){
					    //$(".ajax_loading").css("display", "block");
					});
					$(this).ajaxComplete(function(){
						$(this).toggleClass('addtowishlist addedtowishlist');
						$(this).html('<i class="added_wish_comp" title="Added to wishlist"></i>');
					});

					}
 	});				
   });
   
   	   $( "body" ).on( "change", ".orderby", function() {
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		  orderby = $(this).val();
		  var datastring = $("#filter_form").serialize();
		 // request = $(this).data( "request" );
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'orderbyproducts',  
					formdata:datastring,
					orderby:orderby
					},
					context: this,  
					success: function(data){
					$("#my_jega").html(data);
					$(".orderby").val(orderby);
					}
 	});				
   });
   
   
    $( "body" ).on( "click", ".woocommerce-pagination a", function(e) {
		e.preventDefault();
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		  page_no = $(this).text();
		  var datastring = $("#filter_form").serialize();
		 // request = $(this).data( "request" );
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajax',  
					formdata:datastring,
					page_no:page_no
					},
					context: this,  
					success: function(data){
					$("#my_jega").html(data);
					}
 	});				
   });
   
   
    $( "body" ).on( "click", ".for_next_prev a", function(e) {
		e.preventDefault();
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		  page_no = $(this).data("no");
		  var datastring = $("#filter_form").serialize();
		 // request = $(this).data( "request" );
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'sidebarajax',  
					formdata:datastring,
					page_no:page_no
					},
					context: this,  
					success: function(data){
					$("#my_jega").html(data);
					}
 	});				
   });
  
 $( "body" ).on( "click", ".rec_vis_clear", function() {
	 $('.side_recently_viewed').fadeOut(300, function(){ $(this).remove();});
		  // $(".side_recently_viewed").remove();
		    $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'clear_recentlyviewed',  
					},
					context: this,  
					success: function(data){
					}
 	});
	});	 
   
   });
</script>
<script>
   $(document).ready(function() {
$(".j_menu1 li").hover(function()
{
    //alert( $(this).find(".inner").show());
    $(this).find("ul").show();
});

$(".j_menu1 li").mouseleave(function()
{
    $(this).find("ul").hide();
});
   });
</script>
<script src="<?php echo get_template_directory_uri();?>/js/mtree.js"></script> 