<?php get_header(); ?>

		<div id="contents">
		
			<?php if (have_posts()) : ?>
				
				<!-- single.phpは、個別投稿表示のときに使用されるテンプレートです。single.phpがテーマ内に存在しない場合、index.phpが使用されます。 -->
				<!-- このsingle.phpは、初級レベルのindex.phpがベースとなっています。新たに加筆した箇所は一切ありません。不要な箇所を削除したのみです。 -->
				
				<!-- 削除：「Archive」と「検索結果」のページでは、single.phpは使用されないので、これらのタイトルに関する部分は削除。 -->
				
				<div class="navigation">
					<!-- 削除：single.phpは個別投稿表示にしか使用されないので、個別投稿表示以外の場合のナビゲーションリンク及び条件分岐は削除。 -->
					<div class="alignleft"><?php previous_post_link('&laquo; %link'); ?></div>
					<div class="alignright"><?php next_post_link('%link &raquo;'); ?></div>
				</div>
			
				<?php while (have_posts()) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<div class="entry-head">
							<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" rel="bookmark"><?php the_title() ?></a></h2>
							<!-- 削除：single.phpはpageの表示には使用されないので、pageであるか否かの条件分岐は削除。 -->
							<p class="entry-meta">投稿日：<?php the_time('Y-m-d'); ?> | コメント数：<?php comments_popup_link('0','1','%'); ?> | カテゴリ：<?php the_category(', '); ?> | タグ：<?php the_tags('' , ', ' , ''); ?><?php edit_post_link('| <strong>この記事を編集する</strong>'); ?></p>
						</div>
						<div class="entry-body">
							<?php the_content('&raquo; 続きを読む'); ?>
						</div>
					</div>
					
					<!-- 削除：single.phpは個別記事の表示でのみ使用されるので、条件分岐は不要。 -->
					<?php comments_template(); ?>
					
				<?php endwhile; ?>
				
				<div class="navigation">
					<!-- 削除：single.phpは個別投稿表示にしか使用されないので、個別投稿表示以外の場合のナビゲーションリンク及び条件分岐は削除。 -->
					<div class="alignleft"><?php previous_post_link('&laquo; %link'); ?></div>
					<div class="alignright"><?php next_post_link('%link &raquo;'); ?></div>
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
		
		</div>
		
		<?php get_sidebar(); ?>
	
	<?php get_footer(); ?>
