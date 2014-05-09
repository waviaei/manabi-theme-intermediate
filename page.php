<?php get_header(); ?>

		<div id="contents">
			
			<?php if (have_posts()) : ?>
				
				<!-- page.phpは、Page表示のときに使用されるテンプレートです。 -->
				<!-- このarchive.phpは、初級編 のindex.phpがベースとなっています。主に不要な箇所を削除した構成となっています。 -->
				
				<!-- 削除：「Archive」と「検索結果」のページでは、page.phpは使用されないので、これらのタイトルに関する部分は削除。 -->
				<!-- 削除：Pageは、時系列の関連性が（通常）は存在しません。そのため、個別記事表示時の「新しい記事」「古い記事」等のナビゲーションは必要ありません。なので、これらに関する部分を削除。 -->
				
				<?php while (have_posts()) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<div class="entry-head">
							<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" rel="bookmark"><?php the_title() ?></a></h2>?>
							<!-- 削除：Pageではコメント数やカテゴリ等に関する表示は（一般的に）必要ないため、p.entry-metaは削除。 -->
						</div>
						<div class="entry-body">
							<?php the_content('&raquo; 続きを読む'); ?>
						</div>
					</div>
					<!-- 削除：一般的にはPageにてコメントを受け付ける必要性が無いので、ここではコメントテンプレート（comments.php）を読み込むテンプレートインクルードタグは削除。 -->
					
				<?php endwhile; ?>
					
					<!-- 削除：Pageは、時系列の関連性が（通常）は存在しません。そのため、個別記事表示時の「新しい記事」「古い記事」等のナビゲーションは必要ありません。なので、これらに関する部分を削除。 -->
					
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
