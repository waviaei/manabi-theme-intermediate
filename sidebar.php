	<div id="sidebar" class="widget-area"><!-- ここから div#sidebar -->
	
	<!-- 初級編ではサイドバーのテンプレート構造を分かりやすく見せる為に、WordPressの機能の特徴の１つであるウィジェットを利用しませんでしたが、中級編ではウィジェット機能を用いることにします。
	初級編のsidebar.phpをベースにしており、変更箇所は、ウィジェット機能に対応するために必要な記述を数行追加しただけです。比較してみてください。 -->
	
	<!-- テーマをウィジェット機能に対応させるには、以下の2つのテンプレートファイルにそれぞれ数行のコードを追加する必要があります。どちらかではなく、両方必要です。
	１．function.php
	２．sidebar.php
	function.phpに記述するコードの詳細は、functions.phpの方を参照してください。
	sidebar.phpに記述するコードは下記を参照してください。
	ウィジェットのエリアは複数作ることができますが、基本的には、１つのウィジェットエリアにつき条件分岐のような命令文を2行追加するだけです。この中級編ではウィジェットエリアを１つ作成しています。
	エリア内にどのウィジェット（カレンダー、検索フォーム、最近の記事、等など）を表示させるかは、管理画面のウィジェット設定ページから設定できます。リストの中から表示させたいウィジェットをドラッグ＆ドロップで選択し、設定できます。
	管理画面の設定ページにリストアップされるウィジェットは、テーマではなくWordPresのコアやプラグイン等から追加したり制御したりしているので、テーマとは（一部特殊なテーマを覗き）基本的には関係ありません。
	sidebar.phpに記述するウィジェット関係のコードの役割は、大雑把に言ってしまえば２つあります。
	１つはウィジェットを表示させる場所を指定すること。そしてもう１つは「ウィジェット機能を使わない場合は以下を表示させる」条件分岐の役割です。 -->

		<ul><!-- ここから、div#sidebar直下のulが始まります。 -->
		
		<?php if (!dynamic_sidebar('widget-area-one')) : //条件分岐 -始まり- もしもウィジェット機能を使用していない場合は以下を表示。 ?>
		
		<!-- dynamic_sidebarはウィジェット機能のことを指しています。widget-area-oneは、ここで設定しているウィジェットエリアのことです。
		前述したように、ウィジェットのエリアは複数作ることができますが、複数指定した場合はこのパラメータの値でそれぞれのエリアを区別します。-->
			
			<!-- 以下の内容は初級編のsidebar.phpに記述したサイドバーの内容と同じです。
			もしもウィジェット機能を使用していない場合は、以下の内容が表示されます。 -->
			<li><h2>Pages</h2>
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
			</li>
			
			<li><h2>最近の投稿5件</h2>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=5'); ?>
			</ul>
			</li>
		
			<li><h2>カテゴリ</h2>
			<ul>
				<?php wp_list_categories('show_count=1&title_li='); ?>
			</ul>
			</li>
		
			<li><h2>タグ</h2>
			<ul>
				<?php wp_tag_cloud('smallest=8&largest=14&orderby=count&order=DESC'); ?>
			</ul>
			</li>
		
			<li><h2>月別</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			</li>
			
			<li><h2>ブログ内を検索</h2>
					<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
						<label class="hidden" for="s">検索:</label>
						<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
						<input type="submit" id="searchsubmit" value="検索する" />
					</form>
			</li>
			
			<li><h2>RSSフィード</h2>
			<ul>
					<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>" rel="alternate" type="application/rss+xml">ブログ記事のRSSフィード</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?>" rel="alternate" type="application/rss+xml">コメントのRSSフィード</a></li>
			</ul>
			</li>
			
			<li><h2>管理用</h2>
			<ul>
				<li><?php wp_loginout(); ?></li>
			</ul>
			<?php wp_meta(); ?>
			</li>
			
		
		<?php endif; //条件分岐 -終わり- もしもウィジェット機能を使用していない場合に表示されるのはここまで。 ?>
		
		<ul><!-- ここまでがdiv#sidebar直下のulです。 -->
	
	</div><!-- ここまで div#sidebar -->
