<?php

if(isset($_POST))
{
    $username = stripslashes($_POST['username']);
    $useremail = stripslashes($_POST['useremail']);
    $usermessage = stripslashes($_POST['usermessage']);
    $post_category = [3]; // default stories category
    
    $args= array(
        'ID' => '',
        'post_author' => 1,
        'post_category' => $post_category,
        'post_content' => $usermessage,
        'post_title' => $username,
        'post_status' => 'Pending'
    );

    $story = wp_insert_post($args);
    update_field('email', $useremail, $story);
    
    // $att = my_update_attachment('watch_image',$watch);
    // update_field('video',$att['url'],$watch);

    if($story) {
        echo "Success";
        if ($_FILES['userthumbnail']['name']) {
            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                    echo "upload error : " . $_FILES[$file]['error'];
                    die();
                }
                $attach_id = media_handle_upload( $file, $post_id );
            }   
        }
    
        update_post_meta($post_id,'_thumbnail_id',$attach_id);
        set_post_thumbnail( $post_id, $attach_id );

    } else {
        echo "failed";

    }

}