<?php get_header(); ?>

		<div id="contents"><!-- ここから div#contentsです -->
			
			<?php if (have_posts()) : ?>
				
				<!-- search.phpは、検索結果表示のときに使用されるテンプレートです。 -->
				<!-- このsearch.phpは、中級編のarchive.phpがベースとなっています。 -->
				
				<h2 id="archive-title">「<?php printf('%1$s', wp_specialchars($s, 1) ); ?>」の検索結果</h2>
				<!-- archive.phpではページ名をArchiveとしていましたが、search.phpでは検索結果としています。
				更にここでは、検索された語句も表示するようにしてみました。printfはWordPressのテンプレート関数ではなく、PHPの関数です。
				詳しい説明はここでは割愛しますが、テーマの中にはこのようにPHPコードが記述され、カスタマイズが施されているものがあります。 -->
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; 古い投稿'); ?></div>
					<div class="alignright"><?php previous_posts_link('新しい投稿 &raquo;'); ?></div>
				</div>
					
				<?php while (have_posts()) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<div class="entry-head">
							<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" rel="bookmark"><?php the_title() ?></a></h2>
							<p class="entry-meta">投稿日：<?php the_time('Y-m-d'); ?> | コメント数：<?php comments_popup_link('0','1','%'); ?> | カテゴリ：<?php the_category(', '); ?> | タグ：<?php the_tags('' , ', ' , ''); ?><?php edit_post_link('| <strong>この記事を編集する</strong>'); ?></p>
						</div>
						<div class="entry-body">
							<?php the_excerpt(); ?>
							<!-- archive.phpと同様に、the_contentテンプレートタグではなく、ここではthe_excerptテンプレートタグを使っています。
							the_excerptは記事本文の抜粋を表示するテンプレートタグです。記事の最初の55単語が表示されますが、WordPress日本語版の場合、WP Multibyte Patchの機能で最初の110文字（初期設定）が表示されます。 -->
						</div>
					</div>
					
				<?php endwhile; ?>
					
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; 古い投稿'); ?></div>
					<div class="alignright"><?php previous_posts_link('新しい投稿 &raquo;'); ?></div>
				</div>
				
			<?php else : ?>
				
				<!-- この条件分岐の選択、つまり、検索結果が0件の場合、以下の内容が表示されます。 -->
				
				<h2 id="archive-title">「<?php printf('%1$s', wp_specialchars($s, 1) ); ?>」の検索結果</h2>
				<!-- このページはエラーを示すページではなく、検索結果が0件を示すページです。なので、ページのタイトルは1件以上の検索結果が返された時と同じ内容にしてあります。 -->
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<!-- 以下の内容も、エラーを示すメッセージではなく、検索結果が0件であった旨を示すメッセージに変更してあります。 -->
					<div class="entry-head">
						<h2 class="entry-title"><strong>検索結果は0件です！！</strong></h2>
					</div>
					<div class="entry-body">
						<p>検索された語句を含む記事が存在しないか、該当する記事が見つからりません。違う語句を入力して、サイドバーの検索ボックスからもう一度検索してみてください。</p>
					</div>
				</div>
			
			<?php endif; ?>
		
		</div><!-- ここまで div#contentsです -->
		
		<?php get_sidebar(); ?>
	
	<?php get_footer(); ?>
