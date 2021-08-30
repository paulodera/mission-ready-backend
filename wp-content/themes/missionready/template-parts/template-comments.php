<?php
/**
 * get client IP address
 */
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

function getInitials($name)
{
  //split name using spaces
  $words = explode(" ", $name);
  $inits = '';
  //loop through array extracting initial letters
  foreach ($words as $word) {
    $inits .= strtoupper(substr($word, 0, 1));
  }
  return $inits;
}

?>

<div class="col-lg-8 col-md-12 mx-auto">
    <div class="share-form-text">
        <h3>Conversation</h3>
        <button class="btnfeedback">Click to comment</button>
        <form class="contact-form insidefeedback" id="campaign-msg-comment" method="post" action="#">
            <div class="messages"></div>
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
    <?php
    $comments = get_comments(array(
        'post_id' => $post->ID,
        'orderby' => 'comment_date',
        'order' => 'DESC'
    ));
    $i = 0;
    if ($comments):
        foreach ($comments as $comment):
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
                                    <span class="views">
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
                                <form method="post" class="replies<?php echo $comment->comment_ID; ?>" id="replies">
                                    <input type="hidden" name="totalreplycomments" id="totalreplycomments" value="<?php echo $total_replycomments; ?>">
                                    <?php wp_nonce_field('my_nonce'); ?>
                                    <input type="hidden" value="<?php echo $comment->comment_ID; ?>" id="comment_id" name="comment_id">
                                    <input id="name" type="text" name="text" class="form-control" placeholder="Name" required="required" data-error="Valid name is required.">
                                    <textarea name="reply" id="reply" placeholder="Post your comment"></textarea>
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