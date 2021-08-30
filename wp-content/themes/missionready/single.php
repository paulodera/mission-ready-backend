<?php get_header(); ?>

  <main class="maincontent">
    <section class="share-form-area">
      <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-6 col-md-12">
          <div class="back-btn"><a href="<?php echo home_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-12 mx-auto">
            <div class="videoarea">
              <h2><?php the_title(); ?></h2>
            <video controls width="100%">
              <source src="<?php echo get_field('video'); ?>">
            </video>
            <!-- <canvas></canvas> -->
            <p><?php the_content(); ?></p>
          </div>
          <div class="row">
            <!-- Like Area-->
            <div class="col-6">
                <div class='like-wrapper'>
                  <?php
                    $loveCount = $wpdb->get_var("SELECT COUNT(*) FROM mr_post_like where post_id='" . get_the_ID() . "'");
                  ?>
                  <button id="love" title="Love" data-stat="loves" class="loves heart-button"><svg viewBox="-2 0 105 92" class="LoveButtonIcon-module_root-3dw_B" data-love-level="3"><path d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71z"></path></svg><span class="screen-reader-text">Likes</span><span id="love-count"><?php echo $loveCount;?></span></button>
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
          <?php include('template-parts/template-comments.php'); ?>
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

  $('#love').click(() => {
    let loveCount = parseInt($('#love-count')[0].innerText);
        userid = '<?php echo $ip; ?>';
        postid = '<?php echo get_the_ID(); ?>';

    console.log(postid);
    
    $.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data: {
        action: "user_post_love",
        userid: userid,
        likes: loveCount,
        postid: postid
      },
      dataType: 'json',
      cache: false,
      success: function(response) {
        $('#love-count').text(response);

      },

    })
  });
</script>