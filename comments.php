<?php // この冒頭の部分は、コメントテンプレートが正しく機能する為に必要な記述です。絶対に削除しないでください
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
			<div class="nocomments">
				<p>この記事は保護されています。コメントを観覧するにはパスワードを入力してください。</p>
			</div>
	<?php
		return;
	}
?>

<!-- ここより下を自由に変更することができます。 -->
		
		<!-- comments.phpは初級編とまったく同じです。 -->
		
		<?php if ( have_comments() ) : ?>
			
			<h3>現在のコメント数は<?php comments_number('0','1つ','%つ'); ?>です</h3>
			<p>この記事への<a href="<?php echo get_post_comments_feed_link(); ?>" title="この記事へのコメントのRSSフィード" rel="alternate" type="application/rss+xml">コメントのRSSフィード</a></p>
			
			<div class="navigation">
				<div class="alignleft"><?php previous_comments_link(); ?></div>
				<div class="alignright"><?php next_comments_link(); ?></div>
			</div>
			
			<ol class="commentlist">
				<?php wp_list_comments();?>
			</ol>
			
			<div class="navigation">
				<div class="alignleft"><?php previous_comments_link(); ?></div>
				<div class="alignright"><?php next_comments_link(); ?></div>
			</div>
			
		<?php else : ?>
			
			<?php if ( comments_open() ) : ?>
				<h3>現在コメントはまだありません</h3>
			<?php else : ?>
				<h3>現在のコメント数は<?php comments_number('0','1つ','%つ'); ?>です</h3>
				<p class="nocomments">この記事へのコメントの投稿の受付は終了しました。</p>
			<?php endif; ?>
		
		<?php endif; ?>
		
		
		<?php if ( comments_open() ) : ?>
			<div id="respond"><!-- ここからdiv#respond -->
				<h3><?php comment_form_title('コメントを投稿する','%s さんに対してコメントを投稿する'); ?></h3>
				<div id="cancel-comment-reply"> 
					<small><?php cancel_comment_reply_link() ?></small>
				</div> 
				
				<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p><?php printf(('コメントを投稿するには<a href="%s">ログイン</a>する必要があります。'), wp_login_url( get_permalink() )); ?></p>
				<?php else : ?>
				
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<?php if ( is_user_logged_in() ) : ?>
					<p><?php printf(('ユーザー名「<a href="%1$s">%2$s</a>」でログインしています。'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php echo"このアカウントからログアウトする。"; ?>"><?php echo "ログアウト &raquo;"; ?></a></p>
					<?php else : ?>
					
					<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="50" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>名前<?php if ($req) echo "（必須）"; ?></small></label></p>
					<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="50" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>メール<?php if ($req) echo "（必須）"; ?></small></label></p>
					<p><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="50" tabindex="3" />
<label for="url"><small>ウェブサイトのURL</small></label></p>
					
					<?php endif; ?>
				
				<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
				
				<p><input name="submit" type="submit" id="submit" tabindex="5" value="コメントを投稿する" /><?php comment_id_fields(); ?></p>
				
				<?php do_action('comment_form', $post->ID); ?>
				
				</form>
				
				<?php endif; ?>
			</div><!-- ここまでdiv#respond -->
		
		<?php endif; ?>
