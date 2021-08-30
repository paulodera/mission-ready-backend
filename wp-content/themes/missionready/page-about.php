<?php get_header(); ?>

<?php $headline = get_field('headline'); ?>

<?php
/**
 * get client IP address
 */
$ip;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

?>

<!--============ Banner Area Start ============-->
<section class="inside-banner d-flex align-items-center" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/share-story-banner.jpg');">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-6 col-md-12">
        <div class="back-btn"><a href="<?php echo get_site_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
      </div>
    </div>
  </div>
</section>
<!--============ Banner Area End ============-->

<main class="maincontent">
  <section class="share-form-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-12 mx-auto">
          <div class="share-top-text">
            <h4><?php echo $headline['title']; ?></h4>
            <h3><?php echo $headline['tagline']; ?></h3>
            <div class="textshare">
              <?php the_content(); ?>
            </div>
          </div>
          <div class="row">
            <!-- Like Area-->
            <div class="col-6">
              <div class='like-wrapper'>
                <button title="Love" data-stat="loves" class="loves heart-button"><svg viewBox="-2 0 105 92" class="LoveButtonIcon-module_root-3dw_B" data-love-level="3">
                    <path d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71z"></path>
                  </svg><span class="screen-reader-text">Likes</span><span>2</span></button>
              </div>
            </div>
            <!-- Share Area-->
            <div class="col-6">
              <div class="share">
                <p class="noSelect">Share <i class="fas fa-share-alt"></i></p>
                <ul class="socialshare">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>"><i class="far fa-envelope"></i> Facebook</a></li>
                    <li><a href="https://api.whatsapp.com/send?text=<?php echo the_permalink(); ?>"><i class="far fa-envelope"></i> Whatsapp</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-md-12 mx-auto">
          <div class="share-form-text">
            <h3>Conversation</h3>
            <button class="btnfeedback" id="btnfeedback">Click to comment</button>
            <form class="contact-form insidefeedback" id="campaign-msg-comment" method="post" action="#">
              <div class="messages"></div>
              <input type="hidden" name="totalcomments" id="totalcomments" value="<?php echo get_comments_number(); ?>"/>
              <input type="hidden" id="postID" name="postid" value="<?php echo get_the_ID(); ?>"/>
              <?php wp_nonce_field('my_nonce'); ?>
              <div class="controls">
                <div class="row gx-4">
                  <!-- /column -->
                  <div class="col-12">
                    <div class="form-label-group">
                      <input type="text" id="name" name="name" class="form-control" placeholder="Your good name" required="required" data-error="Your name is required." />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <!-- <div class="col-md-12">
                        <div class="form-label-group fileupload">
                            <label for="file" class="form-label">File Upload</label>
                            <input class="form-control" type="file" id="file">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div> -->

                  <!-- /column -->
                  <div class="col-12">
                    <div class="form-label-group">
                      <textarea id="comment-msg" name="comment-msg" class="form-control" placeholder="Your message" rows="5" required="required" data-error="Message is required."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <!-- /column -->
                  <div class="col-12 text-left">
                    <button type="submit" class="btn main-btn btn-send mb-3" id="submit">Submit</button>
                    <!-- <input type="submit" id="submit" class="btn main-btn btn-send mb-3" value="Submit"> -->
                    <div id="success" style="color: green;"></div>
                  </div>
                  <!-- /column -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.controls -->
            </form>
            <!-- /form -->
          </div>
          <div class="maincomments"></div>
          <?php
          $comments = get_comments(array(
            'post_id' => $post->ID,
            'orderby' => 'comment_date',
            'order' => 'DESC'
          ));
          $i = 0;
          if ($comments) :
            foreach ($comments as $comment) :
              $results = $wpdb->get_results("SELECT COUNT(*) as t_records FROM mr_likes where comment_id='" . $comment->comment_ID . "'", OBJECT);
              $total_records = $results[0]->t_records;
              $replies = $wpdb->get_results("SELECT * FROM mr_replies where comment_id='" . $comment->comment_ID . "'", OBJECT);
              $replycomments = $wpdb->get_results("SELECT COUNT(*) as t_records FROM mr_replies where comment_id='" . $comment->comment_ID . "'", OBJECT);
              $total_replycomments = $replycomments[0]->t_records;

          ?>
              <section class="item-content">
                <div class="post-meta">
                  <div class="postedinfo"> <span class="time-posted">
                      <time><?php echo human_time_diff(strtotime($comment->comment_date), current_time('timestamp', 1)); ?> ago</time>
                    </span> </div>
                  <!-- <div class="top-entry-meta">
                    <div class="divider-30"></div>
                    </div> -->
                  <div class="entryBlock">
                    <div class="author-ava">
                      <span class="author vcard"> <span class="avatar"><?php echo getInitials($comment->comment_author); ?></span> <a href="#">sabi</a> </span>
                    </div>
                    <div class="entry-content">
                      <h3><?php echo _e($comment->comment_author); ?></h3>
                      <p><?php echo _e($comment->comment_content); ?></p>
                    </div>
                  </div>

                  <!-- .entry-content -->
                  <div class="entry-meta">
                    <div class="divider-30"></div>
                    <ul class="calltoactions">
                      <li>
                        <a class="likes" likes_count="<?php echo $total_records ?>" id="<?php echo $comment->comment_ID; ?>">
                          <i class="far fa-heart"></i>
                          <span class="item-views-count" id="like-count">
                            <?php echo $total_records; ?>
                          </span>
                          Likes
                        </a>
                      </li>

                      <li>
                        <a href="javascript:void(0)">
                          <span class="views" id="views-toggle">
                            <i class="las la-comment-dots"></i>
                            <span class="item-views-count setreplycomments<?php echo $comment->comment_ID; ?>"><?php echo $total_replycomments; ?></span> comments
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
                        <form class="replies<?php echo $comment->comment_ID; ?>" id="replies">
                          <input type="hidden" name="totalreplycomments" id="totalreplycomments" value="<?php echo $total_replycomments; ?>">
                          <?php wp_nonce_field('my_nonce'); ?>
                          <input type="hidden" value="<?php echo $comment->comment_ID; ?>" id="response_id" name="response_id">
                          <input id="responder_name" name="responder_name" type="text" name="text" class="form-control" placeholder="Name" required="required" data-error="Valid name is required.">
                          <textarea name="responder_comment" id="responder_comment" placeholder="Post your comment"></textarea>
                          <button type="submit">Submit</button>
                        </form>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="entry-comments">
                  <div class="comments<?php echo $comment->comment_ID; ?>"></div>
                  <?php foreach ($replies as $reply) : ?>
                    <div class="replyblock">
                      <div class="top-entry-meta">
                        <div class="author-ava">
                          <span class="author vcard"> <span class="avatar"><?php echo getInitials($reply->name); ?></span> <a href="#">sabi</a> </span>
                        </div>
                      </div>
                      <div class="entry-content">
                        <div class="divider-30"></div>
                        <h3><?php echo _e($reply->name); ?></h3>
                        <p><?php echo _e($reply->response); ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </section>
              <!-- .item-content -->
            <?php endforeach; ?>
          <?php else : ?>
            <!-- TODO: Friendly message UI when no comments are found -->
          <?php endif ?>

        </div>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>

<script>
  /**
   * comments system handler script
   */
  $('#campaign-msg-comment').submit((e) => {
    /**
     * submit main comment
     */
    e.preventDefault();

    let name = $('#name').val();
    let postID = $('#postID').val();
    let totalComments = $('#totalComments').val();
    let message = $('#comment-msg').val();
    let _wpnonce = $('#_wpnonce').val();
  
    // add comments by 1
    totalComments++;

    $.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data: {
        action: "user_comments_front_end",
        message: message,
        postid: postID,
        name: name,
        _wpnonce: _wpnonce
      },
      dataType: 'html', // data return type is html
      cache: false,
      beforeSubmit: () => {
        $("#submit").attr('disabled', 'disabled');
      },
      success: (res) => {
        $("#submit").val("Submit");
        $("#submit").attr('disabled', false);
        $('#success').html('Comment Added Successfully!');
        $('#name').val('');
        $('#comment-msg').val('');
        $('#btnfeedback').trigger('click');
        $('.maincomments').append(res);
      }
    })
  });

  $('form#replies').submit((e) => {
    e.preventDefault();
    let comment_id = e.target.children[3].value; // comment id
    let name = e.target.children[4].value; // commenter name
    let reply = e.target.children[5].value; // content
    let _wpnonce = e.target.children[1].value; // nonce value
    let totalreplycomments = e.target.children[0].value; // total number of replies

    console.log();
    totalreplycomments++; // add number of replies
    $.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data: {
        action: "user_replies",
        comment_id: comment_id,
        reply: reply,
        name: name,
        _wpnonce: _wpnonce
      },
      dataType: 'html',
      cache: false,
      beforeSubmit: () => {
        $("#reply").attr('disabled', 'disabled');

      },
      success: (res) => {
        $("#responder-name").val('');
        $("#reply").attr('disabled', false);
        $("#responder-comment").val('');
        $('.setreplycomments' + comment_id).html(totalreplycomments);
        $('.comments' + comment_id).append(res);
        $('#views-toggle').trigger('click');
      },


    });

    return false;

  });

  $('.likes').click((e) => {
    e.preventDefault();

    let comment_id = e.currentTarget.attributes[2].value;
    likes = e.currentTarget.attributes[1].value;
    userid = '<?php echo $ip; ?>';

    $.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data: {
        action: "user_likes",
        likes: likes,
        userid: userid,
        comment_id: comment_id,
      },
      dataType: 'json',
      cache: false,
      success: function(response) {
        $('#like-count').html(response);
      },

    });

  });
</script>