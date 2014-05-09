<?php get_header(); ?>
	
		<div id="contents"><!-- ここから div#contentsです -->
			
			<?php if (have_posts()) : ?>
			
				<!-- 初級編では、アーカイブ表示と検索結果表示用のタイトルを、ここに記述していました。しかし、この中級編ではアーカイブ表示用のテンプレートとしてarchive.phpを、
				検索結果表示用のテンプレートとしてsearch.phpを、それぞれ用意してあります。そのため、中級レベルではこれらタイトルはindex.phpに記述する必要がありません。 -->
			
				<!-- 初級編では、個別記事のページ用とそれ以外のページ用のナビゲーションリンクを、条件分岐を用いてそれぞれのページにあわせたテンプレートタグを記述していました。
				中級編では個別投稿表示用のテンプレートファイルsingle.phpを用意しているので、index.php内に個別記事用のナビゲーションリンクを記述する必要がありません。
				なので、条件分岐をなくし、個別記事以外用のナビゲーションリンクのみ記述しています。 -->
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; 古い投稿'); ?></div>
					<div class="alignright"><?php previous_posts_link('新しい投稿 &raquo;'); ?></div>
				</div>
			
				<?php while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> ><!-- ここから div#post-IDです。 -->
						<div class="entry-head">
							<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" rel="bookmark"><?php the_title() ?></a></h2>
							<!-- 初級編では、下記情報をPage以外のページで表示するために、条件分岐を用いました。しかし、中級編ではPageのページ用にpage.phpテンプレートを用意しているので、Pageページ用に条件分岐を使う必要がありません。 -->
							<p class="entry-meta">投稿日：<?php the_time('Y-m-d'); ?> | コメント数：<?php comments_popup_link('0','1','%'); ?> | カテゴリ：<?php the_category(', '); ?> | タグ：<?php the_tags('' , ', ' , ''); ?><?php edit_post_link('| <strong>この記事を編集する</strong>'); ?></p>
						</div>
						<div class="entry-body">
							<?php the_content('&raquo; 続きを読む'); ?>
						</div>
					</div><!-- ここまで div#post-IDです -->
					
					<!-- 初級編では、個別投稿表示にもindex.phpテンプレートが使われていました。なので条件分岐を利用し、個別記事時にはコメントやピンバック、トラックバックのリスト及びコメントフォームを表示するようにしていました。
					しかし中級編では個別投稿表示時用にsingle.phpテンプレートを使っているので、index.phpに記述する必要はなくなりました。。 -->
					
				<?php endwhile; ?>
				
				<!-- ページ上部のものと全く同じで、個別記事以外用のナビゲーションリンクのみ記述しています。 -->
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; 古い投稿'); ?></div>
					<div class="alignright"><?php previous_posts_link('新しい投稿 &raquo;'); ?></div>
				</div>
			
			<?php else : ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<div class="entry-head">
						<h2 class="entry-title"><strong>エラーです！！</strong></h2>
					</div>
					<div class="entry-body">
						<p><strong>該当する記事が見つからないか、存在しません。もしくは、何か不具合が発生した可能性があります。</strong></p>
					</div>
				</div>
			
			<?php endif; ?>
		
		</div><!-- ここまで div#contentsです -->
		
		<?php get_sidebar(); ?>
	
	<?php get_footer(); ?>
