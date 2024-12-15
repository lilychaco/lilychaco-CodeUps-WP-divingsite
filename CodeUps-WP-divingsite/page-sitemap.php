<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-sitemap.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-sitemap-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">site MAP</h2>
</section>

<?php get_template_part('common/breadcrumb') ?>

<div class="page-sitemap page-sitemap-layout">
	<div class="page-sitemap__inner inner">
		<div class="fish u-mobile"></div>

		<div class="page-sitemap__nav nav-menu">
			<!--ブロック1 -->
			<div class="nav-menu__box nav-menu__box--01">
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/campaign')); ?>">
						<p class="starfish-icon02">キャンペーン</p>
					</a>
					<ul>
						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ライセンス取得</a></li>
						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">貸切体験ダイビング</a></li>
						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ナイトダイビング</a></li>
					</ul>
				</div>
				<div class="nav-menu__item nav-menu__item--01">
					<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
						<p class="starfish-icon02">私たちについて</p>
					</a>
				</div>
			</div>

			<!-- ブロック2 -->
			<div class="nav-menu__box nav-menu__box--02">
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/information')); ?>">
						<p class="starfish-icon02">ダイビング情報</p>
					</a>
					<ul>
						<li><a href="<?php echo esc_url(home_url('/information?tab=license-training')); ?>">ライセンス講習</a></li>
						<li><a href="<?php echo esc_url(home_url('/information?tab=trial-diving')); ?>">体験ダイビング</a></li>
						<li><a href="<?php echo esc_url(home_url('/information?tab=fun-diving')); ?>">ファンダイビング</a></li>
					</ul>
				</div>
				<div class="nav-menu__item nav-menu__item--01">
					<a href="<?php echo esc_url(home_url('/blog')); ?>">
						<p class="starfish-icon02">ブログ</p>
					</a>
				</div>
			</div>

			<!-- ブロック3 -->
			<div class="nav-menu__box nav-menu__box--05">
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/voice')); ?>">
						<p class="starfish-icon02">お客様の声</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/price')); ?>">
						<p class="starfish-icon02">料金一覧</p>
					</a>
					<ul>
						<li>
							<a href="<?php echo esc_url(home_url('/price')); ?>">ライセンス講習</a>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/price')); ?>">体験ダイビング</a>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/price')); ?>">ファンダイビング</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- ブロック4 -->
			<div class="nav-menu__box nav-menu__box--06">
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/faq')); ?>">
						<p class="starfish-icon02">よくある質問</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">
						<p class="starfish-icon02">
							プライバシー<br class="u-mobile" />ポリシー
						</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">
						<p class="starfish-icon02">利用規約</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/contact')); ?>">
						<p class="starfish-icon02">お問い合わせ</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
