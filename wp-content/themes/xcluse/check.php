<?php
/*

  Template Name: Check Template

*/
$post_id = 125;
// @param int $post_id - The id of the post that you are setting the attributes for
// @param array[] $attributes - This needs to be an array containing ALL your attributes so it can insert them in one go
function wcproduct_set_attributes($post_id, $attributes) {
    $i = 0;
    // Loop through the attributes array
    foreach ($attributes as $name => $value) {
        $product_attributes[$i] = array (
            'name' => htmlspecialchars( stripslashes( $name ) ), // set attribute name
            'value' => $value, // set attribute value
            'position' => 1,
            'is_visible' => 1,
            'is_variation' => 1,
            'is_taxonomy' => 0
        );

        $i++;
    }

    // Now update the post with its new attributes
    update_post_meta($post_id, '_product_attributes', $product_attributes);
}

// Example on using this function
// The attribute parameter that you pass along must contain all attributes for your product in one go
// so that the wcproduct_set_attributes function can insert them into the correct meta field.
$my_product_attributes = array('size' => 100, 'color' => 200);

// After inserting post
wcproduct_set_attributes($post_id, $my_product_attributes);

// Woohay done!
?>