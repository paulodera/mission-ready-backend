<?php
add_action('wp_ajax_user_comments_front_end', 'user_comments_front_end', 0);
add_action('wp_ajax_nopriv_user_comments_front_end', 'user_comments_front_end');
function user_comments_front_end()
{


    if (!check_ajax_referer('my_nonce')) {
        wp_die();
    }


    global $wpdb;
    $message = strip_tags($_POST['message']);
    $name = strip_tags($_POST['name']);
    $postid = $_POST['postid'];

    // $count = get_post_meta($postid, 'post_views_count', true);

    $data = array(
        'comment_post_ID' => $postid,
        'comment_author' => $name,
        'comment_content' => $message,
        'comment_date' => date('Y-m-d H:i:s'),
        'comment_date_gmt' => date('Y-m-d H:i:s'),
        'comment_approved' => 1,
        'user_id' => 1
    );

    $comment_id = wp_insert_comment($data);

    if ($comment_id){
        $html_block = '<section class="item-content">
            <div class="post-meta">
                <div class="postedinfo"> <span class="time-posted">
                        <time>1 second ago</time>
                    </span> </div>
                <!-- <div class="top-entry-meta">
                    <div class="divider-30"></div>
                    </div> -->
                    <div class="entryBlock">
                    <div class="author-ava">
                        <span class="author vcard"> <span class="avatar">'. getInitials($name).'</span> <a href="#">sabi</a> </span>
                    </div>
                    <div class="entry-content">
                        <h3>'.strip_tags($name).'</h3>
                        <p>'.strip_tags($message).'</p>
                    </div>
                </div>

                <!-- .entry-content -->
                <div class="entry-meta">
                    <div class="divider-30"></div>
                    <ul class="calltoactions">
                        <li>
                            <a class="likes" likes_count="0" id="'. $comment_id .'">
                                <i class="far fa-heart"></i>
                                <span class="item-views-count" id="like-count">
                                    0
                                </span>
                                Likes
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <span class="views">
                                    <i class="las la-comment-dots"></i>
                                    <span class="item-views-count setreplycomments' .$comment_id. '">0</span> comments
                                </span>
                            </a>
                        </li>
                        <li> <span class="views"><i class="fas fa-reply"></i> <span class="item-views-count">Reply</span> </span></li>
                    </ul>
                </div>
            </div>
            <div class="coment-area">
                <ul class="we-comet">
                    <li class="post-comment">
                        <div class="post-comt-box">
                            <form method="post" class="replies' .$comment_id. '" id="replies">
                                <input type="hidden" name="totalreplycomments" id="totalreplycomments" value="0">
                                ' .wp_nonce_field('my_nonce'). '
                                <input type="hidden" value="' .$comment_id. '" id="comment_id" name="comment_id">
                                <input id="name" type="text" name="text" class="form-control" placeholder="Name" required="required" data-error="Valid name is required.">
                                <textarea name="reply" id="reply" placeholder="Post your comment"></textarea>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="entry-comments">
                <div class="comments' .$comment_id. '"></div>
            </div>
        </section>';

        echo $html_block;

    } else{

        echo json_encode(array('register' => false, 'message' => __('error. please try again.')));

    }

    die();
}

add_action('wp_ajax_user_replies', 'user_replies', 0);
add_action('wp_ajax_nopriv_user_replies', 'user_replies');
function user_replies()
{
    if (!check_ajax_referer('my_nonce')) {
        wp_die();
    }

    global $wpdb;
    $comment_id = stripcslashes($_POST['comment_id']);
    $reply = strip_tags($_POST['reply']);
    $name = strip_tags($_POST['name']);

    $insert = $wpdb->insert(
        'mr_replies',
        array(
            'comment_id' => $comment_id,
            'name' => $name,
            'response' => $reply,
        ),
        array(
            '%s', '%s',
        )
    );
    if ($insert) { 

        $html_reply_block = '<div class="replyblock">
            <div class="top-entry-meta">
                <div class="author-ava">
                    <span class="author vcard"> <span class="avatar">' .getInitials($name). '</span> <a href="#">sabi</a> </span>
                </div>
            </div>
            <div class="entry-content">
                <div class="divider-30"></div>
                <h3>' .strip_tags($name). '</h3>
                <p>' .strip_tags($reply). '</p>
            </div>
        </div>';

        echo $html_reply_block;

    } else {
        die();
    }
}

add_action('wp_ajax_user_likes', 'user_likes', 0);
add_action('wp_ajax_nopriv_user_likes', 'user_likes');
function user_likes()
{

    global $wpdb;
    $likes = strip_tags($_POST['likes']);
    $userid = $_COOKIE['my_cookie'];
    $comment_id = strip_tags($_POST['comment_id']);

    $total_likes = $wpdb->get_var("SELECT COUNT(*) FROM mr_likes where comment_id='" . $comment_id . "' and user_id='" . $userid . "'");


    if ($total_likes == 0) {


        $wpdb->insert(
            'mr_likes',
            array(
                'comment_id' => $comment_id,
                'user_id' => $userid,

            ),
            array(
                '%d', '%d',
            )
        );

        echo $likes + 1;
    } else {

        $xa = $wpdb->query("DELETE from mr_likes where comment_id='" . $comment_id . "' and user_id='" . $userid . "'");

        $res = $wpdb->get_var("SELECT COUNT(*) FROM mr_likes where comment_id='" . $comment_id . "'");

        echo $likes;
    }

    die();
}

add_action('init', function () {
    if (!isset($_COOKIE['my_cookie'])) {
        setcookie('my_cookie', 'some default value', strtotime('+1 day'));
    }
});

/*
    function gk_social_buttons() {
        global $post;
        $permalink = get_permalink($post->ID);
        $title = get_the_title();
        if(!is_home() && !is_page('share') && !is_page('events')) {
            $content = '<div class="share">
                <p class="noSelect">Share <i class="fas fa-share-alt"></i></p>
                <ul class="socialshare">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u='.$permalink.'"><i class="far fa-envelope"></i> Facebook</a></li>
                    <li><a href="https://api.whatsapp.com/send?text='.$permalink.'"><i class="far fa-envelope"></i> Whatsapp</a></li>
                </ul>
                </div>';
        }
        
        return $content;
    }
    add_filter('the_content', 'gk_social_buttons');
*/

add_action('wp_ajax_user_story', 'user_story', 0);
add_action('wp_ajax_nopriv_user_story', 'user_story');
function user_story()
{
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

        } else {
            echo "failed";

        }

    }
}


function my_update_attachment($f,$pid,$t='',$c='') {
    wp_update_attachment_metadata( $pid, $f );
    if( !empty( $_FILES[$f]['name'] )) { //New upload
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
  
      $override['action'] = 'editpost';
      $file = wp_handle_upload( $_FILES[$f], $override );
  
      if ( isset( $file['error'] )) {
        return new WP_Error( 'upload_error', $file['error'] );
      }
  
      $file_type = wp_check_filetype($_FILES[$f]['name'], array(
        'jpg|jpeg' => 'image/jpeg',
        // 'gif' => 'image/gif',
        'png' => 'image/png',
        'mp4' => 'video/mp4'
      ));
      if ($file_type['type']) {
        $name_parts = pathinfo( $file['file'] );
        $name = $file['filename'];
        $type = $file['type'];
        $title = $t ? $t : $name;
        $content = $c;
  
        $attachment = array(
          'post_title' => $title,
          'post_type' => 'attachment',
          'post_content' => $content,
          'post_parent' => $pid,
          'post_mime_type' => $type,
          'guid' => $file['url'],
        );
  
        $attach_id = wp_insert_attachment( $attachment, $file['file'] /*, $pid - for post_thumbnails*/);
  
        if ( !is_wp_error( $id )) {
          $attach_meta = wp_generate_attachment_metadata( $attach_id, $file['file'] );
          wp_update_attachment_metadata( $attach_id, $attach_meta );
        }
  
        return array(
            'pid' =>$pid,
            'url' =>$file['url'],
            'file'=>$file,
            'attach_id'=>$attach_id
        );
        
      }
    }
}

add_action('wp_ajax_book_now', 'book_now', 0);
add_action('wp_ajax_nopriv_book_now', 'book_now');
function book_now()
{
    $event = stripslashes($_POST['event']);
    $name = stripslashes($_POST['name']);
    $email = stripslashes($_POST['email']);
    $new_post = wp_insert_post( array(
        'post_title' => $name. ' - '. $event,
        'post_type' => 'booking',
        'post_status' => 'private'
    ) );

    if($new_post) {
        update_field('email', $email, $new_post);
        update_field('event', $event, $new_post);
        $saved = true;

    } else {
        $saved = false;

    }

    if($saved == true)
    {
        echo 0;

    } else {
        echo 1;

    }

}

add_action('wp_ajax_user_subscribe', 'user_subscribe', 0);
add_action('wp_ajax_nopriv_user_subscribe', 'user_subscribe');
function user_subscribe()
{
    $subscriber = stripslashes($_POST['subscriber']);
    $new_post = wp_insert_post( array(
        'post_title' => $subscriber,
        'post_type' => 'subscription',
        'post_status' => 'private'
    ) );

    if($new_post) {

        echo "<h3 class='success' style='color: green'>Thank you for subscribing</h3>";

    } else {
        echo "<h3 class='success' style='color: red'>an error occured while saving</h3>";
    }
}

add_action('wp_ajax_user_post_love', 'user_post_love', 0);
add_action('wp_ajax_nopriv_user_post_love', 'user_post_love');
function user_post_love()
{
    global $wpdb;
    $likes = strip_tags($_POST['likes']);
    $userid = $_COOKIE['my_cookie'];
    $postid = strip_tags($_POST['postid']);

    $total_likes = $wpdb->get_var("SELECT COUNT(*) FROM mr_post_like where post_id='" . $postid . "' and user_id='" . $userid . "'");

    if ($total_likes == 0) {


        $wpdb->insert(
            'mr_post_like',
            array(
                'post_id' => $postid,
                'user_id' => $userid,
            ),
            array(
                '%d', '%d',
            )
        );

        echo $likes + 1;

    } else {

        $xa = $wpdb->query("DELETE from mr_post_like where post_id='" . $postid . "' and user_id='" . $userid . "'");

        $res = $wpdb->get_var("SELECT COUNT(*) FROM mr_post_like where post_id='" . $postid . "'");

        echo $res;

    }

    die();
}


function getPostFromSlug( $slug_or_id, $post_type ) {
    if( is_numeric( $slug_or_id ) ) {
        return $slug_or_id;
    }
    return get_page_by_path( $slug_or_id, OBJECT, $post_type );
}

