<?php 
if(!class_exists('WP_List_Table')){
		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	}
add_action('admin_menu', 'xcluse_admin_menu');

function xcluse_admin_menu() {

	add_menu_page("Banner settings", "Banner Settings", 'manage_options', 'banner', "banner_settings",'','29.8');
	add_submenu_page('banner', "Home Slider", 'Home Slider', 'manage_options', 'banner', "banner_settings");
	add_submenu_page('banner', "Category image", 'Category image', 'manage_options', 'category', "category_settings");
}
function category_settings()
{
	global $wpdb;
	
	if(isset($_GET['delete']))
	{
		$del_id = $_GET['delete'];
		$wpdb->delete( 'homecat_banner', array( 'id' => $del_id) );
		
	}
	if($_POST['banner_submit']!="")
	{	
	if(isset($_FILES['home_banner']) && $_FILES['home_banner']['name']!="")
			{
					$home_banner = rand(11111111,99999999).'_'.$_FILES['home_banner']['name'];
					$tmp_name = $_FILES['home_banner']['tmp_name'];
									
					$upload_dir = wp_upload_dir();
									
					$upload_path = $upload_dir ['basedir'];
									
					move_uploaded_file($tmp_name,$upload_path. "/homecat_banner/" . $home_banner);
					
			}
			else
			{
			$home_banner = $_POST['old_home_banner'];
			}
			
	if(isset($_POST['banner_id']))
		{
		  $wpdb->update( 'homecat_banner', array('image' => $home_banner,'url' => $_POST['cat_url'],'title' => $_POST['title'],'condition' => $_POST['condition']), array( 'id' => $_POST['banner_id'] ));
							
			$message = 'Data Updated';
		}
		else
		{
			$wpdb->insert( 'homecat_banner', array('image' => $home_banner,'url' => $_POST['cat_url'],'title' => $_POST['title'],'condition' => $_POST['condition']));
			$message = 'Data Added';
		}
		
		}

	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir ['baseurl'];
	
			$catTable = new catbanner_table();
			//Fetch, prepare, sort, and filter our data...
			$catTable->prepare_items();
			

		
		?>
   <div id="poststuff" class="wrap">
    <?php if(isset($_GET['banner_id']) || array_key_exists('add_new',$_GET)){?><h2 id='page_title'>Add New Banner <a href="admin.php?page=category">Back to list</a></h2><?php } else {?>
    <h2 id='page_title'>Banner List<a href="admin.php?page=category&add_new">Add new</a></h2>
		<?php }?>
    <?php if(isset($message)){?>
    <div id="message" class="updated"><p><?php echo $message;?></p></div>
    <?php }?>
        <div class="postbox">
            <div class="inside group">
            <?php
                if(isset($_GET['banner_id']) || array_key_exists('add_new',$_GET)){
					$qu = $wpdb->get_results("select * from homecat_banner where id =".$_GET['banner_id']);
					$res = $qu[0];
					?>
                <form action="admin.php?page=category" name="myform" method="post" enctype="multipart/form-data">
                  <table class="form-table">
                  <?php //$menu = wp_get_nav_menu_object ('mainmenu');
 
    //$menu_items = wp_get_nav_menu_items($menu->term_id);?>

        <!--<tr>
                        <th><label>Category:</label></th>
                        <td><select name="cat_id">
                        <option value="">Select Category</option>
                       <?php foreach($menu_items as $menu_item){
		    if($menu_item->menu_item_parent ==0){
             	$object_title = $menu_item->title;
	            $object_id = $menu_item->object_id;
			   if($res->cat_id == $object_id)$sel = 'selected="selected"';?>
                        <option value="<?php echo $object_id;?>" <?php echo $sel;?>><?php echo $object_title;?></option>
                        <?php  unset($sel); }}?>
                        </select></td>
                    </tr>-->
                     <tr>
                        <th><label>Title :</label></th>
                        <td><input type="text" class="validate" name="title" value="<?php echo stripslashes($res->title); ?>" size="62"></td>
                    </tr>
                     <tr>
                        <th><label>Offer Text :</label></th>
                        <td><input type="text" class="validate" name="condition" value="<?php echo stripslashes($res->condition); ?>" size="62"></td>
                    </tr>
                    <tr>
                        <th><label>Banner:</label></th>
                        <td><img width="100" height="100" src="<?php _e($upload_path.'/homecat_banner/'.$res->image);?>" />&nbsp;&nbsp;
						<input type="file" name="home_banner"></td>
                    </tr>
					<input type="hidden" name="old_home_banner" value="<?php echo $res->image; ?>">

                   <!-- <tr>
                        <th><label>Description :</label></th>
                        <td><textarea class="validate" rows="4" cols="60" name="description"><?php echo stripslashes($res->description); ?></textarea></td>
                    </tr>-->
                     <tr>
                        <th><label>Link :</label></th>
                        <td><input type="text" class="validate" name="cat_url" value="<?php echo stripslashes($res->url); ?>" size="62"></td>
                    </tr>
                  </table>
                  <p class="submit">
                	<?php if($_GET['banner_id']!=""){?><input type="hidden" name="banner_id" value="<?php echo $_GET['banner_id']; ?>"><?php }?>
                    <input name="banner_submit" class="button-primary seeker_btn" value="<?php _e('Save Changes'); ?>" type="submit" />
                </p>
                </form>
                <?php }
				
			 
				else{ ?>
                 <script type="text/javascript">
					function setid(id,frm,task)
					{
					document.getElementById('publishid').value=id;
					document.getElementById('task').value=task;
					document.getElementById(frm).submit();
					}
				</script>
                <form id="posts-filter" name="posts-filter" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
                <input type="hidden" name="task" id="task" />
                <input type="hidden" name="publishid" id="publishid" />
                    <!-- Now we can render the completed list table -->
                    <?php $catTable->display();?>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
<?php }

function banner_settings()
{
	global $wpdb;
	
	if(isset($_GET['delete']))
	{
		$del_id = $_GET['delete'];
		$wpdb->delete( 'banner', array( 'id' => $del_id) );
		
	}
	if($_POST['banner_submit']!="")
	{	
	if(isset($_FILES['home_banner']) && $_FILES['home_banner']['name']!="")
			{
					$home_banner = rand(11111111,99999999).'_'.$_FILES['home_banner']['name'];
					$tmp_name = $_FILES['home_banner']['tmp_name'];
									
					$upload_dir = wp_upload_dir();
									
					$upload_path = $upload_dir ['basedir'];
									
					move_uploaded_file($tmp_name,$upload_path. "/home_banner/" . $home_banner);
					
			}
			else
			{
			$home_banner = $_POST['old_home_banner'];
			}
			
	if(isset($_POST['banner_id']))
		{
		  $wpdb->update( 'banner', array('image' => $home_banner,'title' => $_POST['title'],'link' => $_POST['link'],'description' => $_POST['description']), array( 'id' => $_POST['banner_id'] ));
							
			$message = 'Data Updated';
		}
		else
		{
			$wpdb->insert( 'banner', array('image' => $home_banner,'title' => $_POST['title'],'link' => $_POST['link'],'description' => $_POST['description']));
			$message = 'Data Added';
		}
		
		}

	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir ['baseurl'];
	
			$bannerTable = new homebanner_table();
			//Fetch, prepare, sort, and filter our data...
			$bannerTable->prepare_items();
			

		
		?>
   <div id="poststuff" class="wrap">
    <?php if(isset($_GET['banner_id']) || array_key_exists('add_new',$_GET)){?><h2 id='page_title'>Add New Banner <a href="admin.php?page=banner">Back to list</a></h2><?php } else {?>
    <h2 id='page_title'>Banner List<a href="admin.php?page=banner&add_new">Add new</a></h2>
		<?php }?>
    <?php if(isset($message)){?>
    <div id="message" class="updated"><p><?php echo $message;?></p></div>
    <?php }?>
        <div class="postbox">
            <div class="inside group">
            <?php
                if(isset($_GET['banner_id']) || array_key_exists('add_new',$_GET)){
					$qu = $wpdb->get_results("select * from banner where id =".$_GET['banner_id']);
					$res = $qu[0];
					?>
                <form action="admin.php?page=banner" name="myform" method="post" enctype="multipart/form-data">
                  <table class="form-table">
                    <tr>
                        <th><label>Banner:</label></th>
                        <td><img width="100" height="100" src="<?php _e($upload_path.'/home_banner/'.$res->image);?>" />&nbsp;&nbsp;
						<input type="file" name="home_banner"></td>
                    </tr>
					<input type="hidden" name="old_home_banner" value="<?php echo $res->image; ?>">
                    <tr>
                        <th><label>Title :</label></th>
                        <td><input type="text" class="validate" name="title" value="<?php echo stripslashes($res->title); ?>" size="62"></td>
                    </tr>
                    <tr>
                        <th><label>Shop Link :</label></th>
                        <td><input type="text" class="validate" name="link" value="<?php echo stripslashes($res->link); ?>" size="62"></td>
                    </tr>
                    <tr>
                        <th><label>Description :</label></th>
                        <td><textarea class="validate" rows="4" cols="60" name="description"><?php echo stripslashes($res->description); ?></textarea></td>
                    </tr>
                <!--    <tr>
                        <th><label>Description (fr) :</label></th>
                        <td><textarea class="validate" rows="4" cols="60" name="fdescription"><?php echo stripslashes($res->fdescription); ?></textarea></td>
                    </tr>
                     <tr>
                        <th><label>Link :</label></th>
                        <td><input type="text" class="validate" name="link" value="<?php echo stripslashes($res->link); ?>" size="62"></td>
                    </tr>
                     <tr>
                        <th><label>Priority :</label></th>
                        <td><input type="text" class="validate" name="priority" value="<?php echo stripslashes($res->priority); ?>" size="62"></td>
                    </tr>-->
                   
                  </table>
                  <p class="submit">
                	<?php if($_GET['banner_id']!=""){?><input type="hidden" name="banner_id" value="<?php echo $_GET['banner_id']; ?>"><?php }?>
                    <input name="banner_submit" class="button-primary seeker_btn" value="<?php _e('Save Changes'); ?>" type="submit" />
                </p>
                </form>
                <?php }
				
			 
				else{ ?>
                 <script type="text/javascript">
					function setid(id,frm,task)
					{
					document.getElementById('publishid').value=id;
					document.getElementById('task').value=task;
					document.getElementById(frm).submit();
					}
				</script>
                <form id="posts-filter" name="posts-filter" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
                <input type="hidden" name="task" id="task" />
                <input type="hidden" name="publishid" id="publishid" />
                    <!-- Now we can render the completed list table -->
                    <?php $bannerTable->display();?>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
<?php }

//-----------------------------------------
class homebanner_table extends WP_List_Table {
	
    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'movie',     //singular name of the listed records
            'plural'    => 'movies',    //plural name of the listed records
            'ajax'      => false       //does this table support ajax?
        ) );
        
    }
	
	function column_default($item, $column_name){
		switch($column_name){
			case 'title1':
                return $item['title'];
			case 'description':
                return $item[$column_name];
			default:
                return print_r($item,true); //Show the whole array for troubleshooting purposes
        }
    }
    
	
		
    function column_title($item){
        
        		$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir ['baseurl'];
		//Build row actions
        $actions = array(
            'edit'      => sprintf('<a href="?page=%s&banner_id=%s">Edit Banner</a>',$_REQUEST['page'],$item['id']),
            'delete'    => sprintf('<a href="?page=%s&delete=%s">Delete</a>',$_REQUEST['page'],$item['id']),
        );
        
        //Return the title contents
		$a = '<img width="100" height="100" src='.$upload_path.'/home_banner/'.$item['image'].' />';
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',
            ucfirst($a),$item['id'],$this->row_actions($actions));
			//return "fgdgfdg";
			//return $item['image'];
			
			//return $this->row_actions($actions);
    }
    
    function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['id']                //The value of the checkbox should be the record's id
        );
    }
    
    
    function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'title'    => 'Image',
			'title1'    => 'Title',
			'description'    => 'Description(en)',
        );
        return $columns;
    }
    
    function get_sortable_columns() {
        $sortable_columns = array(
			'title'     => array('user_login',false),    //true means it's already sorted
            'user_email'  => array('user_email',false),
			'user_registered' => array('user_registered',false)
        );
        return $sortable_columns;
    }
    
    function get_bulk_actions() {
        $actions = array(
            'delete'    => 'Delete',
        );
        return $actions;
    }
    
    function process_bulk_action() {
        
        global $wpdb;
		
		if( 'delete'===$this->current_action()) 
		{
		$del_val = $_REQUEST['movie'];
			foreach($del_val as $val) 
			{
						$wpdb->delete( 'banner', array( 'id' => $val) );
			
			}
			
		}
		       
    }
    
    function prepare_items() {
        global $wpdb; 
        $per_page = 30;
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
        
        $this->process_bulk_action();
        
		function objectToArray($d) 
		{
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}
		else {
			return $d;
		}
		}
		
		$data1 = $wpdb->get_results("select * from banner");
		$data2=objectToArray($data1);
		if($data2=="") $data2 = array();
		$data = array();
		foreach($data2 as $k=>$d)
		{
			$data[] = $d;
		}
		
        function usort_reorder($a,$b){
            $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'ID'; //If no sort, default to title
            $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'desc'; //If no order, default to asc
            $result = strcmp($a[$orderby], $b[$orderby]); //Determine sort order
            return ($order==='asc') ? $result : -$result; //Send final sort direction to usort
        }
        if(!empty($_REQUEST['orderby']))
		usort($data, 'usort_reorder');
        
        
        $current_page = $this->get_pagenum();
        
        
        $total_items = count($data);
        
        
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }
    

}
//-----------------------------------------
class catbanner_table extends WP_List_Table {
	
    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'movie',     //singular name of the listed records
            'plural'    => 'movies',    //plural name of the listed records
            'ajax'      => false       //does this table support ajax?
        ) );
        
    }
	
	function column_default($item, $column_name){
		switch($column_name){
			case 'title1':
                return $item['title'];
			case 'condition':
                return $item[$column_name];
			default:
                return print_r($item,true); //Show the whole array for troubleshooting purposes
        }
    }
    
  function get_cat($cat_id){
			$cat = get_term( $cat_id, 'product_cat' );
			echo $cat->name;
        }
		
    function column_title($item){
        
        		$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir ['baseurl'];
		//Build row actions
        $actions = array(
            'edit'      => sprintf('<a href="?page=%s&banner_id=%s">Edit Banner</a>',$_REQUEST['page'],$item['id']),
            'delete'    => sprintf('<a href="?page=%s&delete=%s">Delete</a>',$_REQUEST['page'],$item['id']),
        );
        
        //Return the title contents
		$a = '<img width="100" height="100" src='.$upload_path.'/homecat_banner/'.$item['image'].' />';
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',
            ucfirst($a),$item['id'],$this->row_actions($actions));
			//return "fgdgfdg";
			//return $item['image'];
			
			//return $this->row_actions($actions);
    }
    
    function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['id']                //The value of the checkbox should be the record's id
        );
    }
    
    
    function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'title'    => 'Image',
			'title1'    => 'Title',
			'condition'    => 'Offer',
        );
        return $columns;
    }
    
    function get_sortable_columns() {
        $sortable_columns = array(
			'title'     => array('user_login',false),    //true means it's already sorted
            'user_email'  => array('user_email',false),
			'user_registered' => array('user_registered',false)
        );
        return $sortable_columns;
    }
    
    function get_bulk_actions() {
        $actions = array(
            'delete'    => 'Delete',
        );
        return $actions;
    }
    
    function process_bulk_action() {
        
        global $wpdb;
		
		if( 'delete'===$this->current_action()) 
		{
		$del_val = $_REQUEST['movie'];
			foreach($del_val as $val) 
			{
						$wpdb->delete( 'banner', array( 'id' => $val) );
			
			}
			
		}
		       
    }
    
    function prepare_items() {
        global $wpdb; 
        $per_page = 30;
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
        
        $this->process_bulk_action();
        
		function objectToArray($d) 
		{
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}
		else {
			return $d;
		}
		}
		
		$data1 = $wpdb->get_results("select * from homecat_banner");
		$data2=objectToArray($data1);
		if($data2=="") $data2 = array();
		$data = array();
		foreach($data2 as $k=>$d)
		{
			$data[] = $d;
		}
		
        function usort_reorder($a,$b){
            $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'ID'; //If no sort, default to title
            $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'desc'; //If no order, default to asc
            $result = strcmp($a[$orderby], $b[$orderby]); //Determine sort order
            return ($order==='asc') ? $result : -$result; //Send final sort direction to usort
        }
        if(!empty($_REQUEST['orderby']))
		usort($data, 'usort_reorder');
        
        
        $current_page = $this->get_pagenum();
        
        
        $total_items = count($data);
        
        
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }
    

}

