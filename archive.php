<?php get_header(); ?>

		<div id="contents"><!-- ここから div#contentsです -->
			
			<?php if (have_posts()) : ?>
				
				<!-- archive.phpは、アーカイブ表示のときに使用されるテンプレートです。
				アーカイブ表示とは、日別、月別、年別、カテゴリ別、タグ別、投稿者別、カスタムタクソノミー別表示のページのことです。 -->
				
				<!-- このarchive.phpは、初級レベルのindex.phpがベースとなっています。主に不要な箇所を削除した構成となっています。 -->
				
				<!-- テンプレート階層について： WordPressテーマ及びテンプレートの大切な概念の１つであるテンプレート階層について、archive.phpを題材に用いてここで解説します。
				WordPressテーマには様々なテンプレートが含まれていますが、「ある種類のページを表示するとき、どのテンプレートファイルが使われるのか？」を理解するには、テンプレート階層を理解する必要があります。
				個別投稿表示、カテゴリー表示、タグ表示、検索結果表示、など、WordPresはそれぞれの状況に応じ、テンプレート階層に則って、使用しているテーマ内のテンプレートファイルを探します。
				
				例えば日付別（日別、月別、年別）表示時、WordPressはまずdate.phpテンプレートファイルを探し、適用します。もしもdate.phpがそのテーマに存在しない場合は、arechive.phpを探し、適用します。
				もしもarchive.phpも無い場合は、index.phpが適用されます。このManabiテーマ中級編では、date.phpはありません、なのでこのarchive.phpが使われます。Manabiテーマ初級編では、このarchive.phpも無かった為、index.phpが使われました。
				
				このように、ページの種類に応じて、使われるテンプレートファイルには優先順位がつけられているのです。こうすることで、より柔軟なテーマ作成が可能になっています。
				例えば、archive.phpを作っておくと、index.php内にアーカイブ表示に関するコードを記述する必要がないので、管理しやすくなります。
				さらに、日付別のアーカイブ表示や、特定のカテゴリのアーカイブ表示のデザインを大きく変更したければ、より上層のテンプレートファイルを作成しておけば、そちらの方が使われます。
				
				テンプレート階層についてより詳しく知るには、日本語版Codexも参考にしてください。http://wpdocs.sourceforge.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E9%9A%8E%E5%B1%A4 -->
				
				<h2 id="archive-title">Archive</h2>
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
							<!-- Manabi-Entryのindex.phpでは、the_contentテンプレートタグを用いていましたが、ここではthe_excerptを使っています。
							the_excerptは記事本文の抜粋を表示するテンプレートタグです。記事の最初の55単語が表示されますが、WordPress日本語版の場合、WP Multibyte Patchの機能で最初の110文字（初期設定）が表示されます。 -->
						</div>
					</div>
					<!-- 削除：一般的にはアーカイブ表示のページにてコメントを受け付ける必要性が無いので、ここではコメントテンプレート（comments.php）を読み込むテンプレートインクルードタグは削除。 -->
					
				<?php endwhile; ?>
					
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
