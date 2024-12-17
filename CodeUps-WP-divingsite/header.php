<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="robots" content="noindex" />
	<!-- meta情報 -->
	<title>CodeUps</title>
	<meta name="description" content="CodeUpsのWordPress化課題サイトです" />
	<meta name="keywords" content="CodeUps, WordPress化, lilychaco" />
	<meta name="copyright" content="Copyright © 2024 CodeUps Diving Site. All rights reserved.">
	<!-- ogp -->
	<meta property="og:title" content="CodeUps Diving Site - 潜る楽しさを発見しよう！" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://ninikokoji.com/diving-lily/" />
	<meta property="og:image"
		content="https://ninikokoji.com/diving-lily/wp-content/uploads/2024/11/iriomote1200x630.jpeg" />
	<meta property="og:site_name" content="CodeUps Diving Site" />
	<meta property="og:description" content="CodeUpsのWordPress化課題サイトで、ダイビングの魅力を学び、挑戦しませんか？" />
	<meta property="og:locale" content="ja_JP" />
	<!-- アイコン -->
	<link rel="icon" href="https://ninikokoji.com/diving-lily/wp-content/uploads/2024/11/iriomote512.png">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="header__inner">
			<?php if (is_front_page()) : ?>
			<h1 class="header__logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<picture>
						<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/CodeUps-logo-pc.png"
							media="(min-width: 768px)" />
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/CodeUps-logo-sp.png" alt="ヘッダーロゴ" />
					</picture>
				</a>
			</h1>
			<?php else : ?>
			<div class="header__logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<picture>
						<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/CodeUps-logo-pc.png"
							media="(min-width: 768px)" />
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/CodeUps-logo-sp.png" alt="ヘッダーロゴ" />
					</picture>
				</a>
			</div>
			<?php endif; ?>


			<nav class="header__nav header-menu">
				<ul class="header-menu__items">
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/campaign')); ?>">
							<p class="header-menu__text-english">campaign</p>
							<p class="header-menu__text-japanese">キャンペーン</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
							<p class="header-menu__text-english">about&nbsp;us</p>
							<p class="header-menu__text-japanese">私たちについて</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/information')); ?>">
							<p class="header-menu__text-english">information</p>
							<p class="header-menu__text-japanese">ダイビング情報</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/blog')); ?>">
							<p class="header-menu__text-english">blog</p>
							<p class="header-menu__text-japanese">ブログ</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/voice')); ?>">
							<p class="header-menu__text-english">voice</p>
							<p class="header-menu__text-japanese">お客様の声</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/price')); ?>">
							<p class="header-menu__text-english">price</p>
							<p class="header-menu__text-japanese">料金一覧</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/faq')); ?>">
							<p class="header-menu__text-english">FAQ</p>
							<p class="header-menu__text-japanese">よくある質問</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/contact')); ?>">
							<p class="header-menu__text-english">contact</p>
							<p class="header-menu__text-japanese">お問合せ</p>
						</a>
					</li>
				</ul>
			</nav>
			<div id="js-hamburger" class="header__hamButton hamburger">
				<span class="hamburger__line"></span>
			</div>
		</div>
	</header>
	<div class="drawer drawer-layout" id="js-global-menu" aria-hidden="true">
		<ul class="drawer-menu inner">
			<!-- ブロック1 -->
			<li class="drawer-menu__box drqwer-menu__box--01">
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/campaign')); ?>">
						<p class="starfish-icon">キャンペーン</p>
					</a>
					<ul>
						<li>
							<a href="<?php echo esc_url(home_url('/campaign')); ?>">ライセンス取得</a>
						</li>
						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">貸切体験ダイビング</a></li>
						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ナイトダイビング</a></li>
					</ul>
				</div>
				<div class="drawer-menu__item drawer-menu__item--01">
					<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
						<p class="starfish-icon">私たちについて</p>
					</a>
				</div>
			</li>

			<!-- ブロック2 -->
			<li class="drawer-menu__box drawer-menu__box--02">
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/information')); ?>">
						<p class="starfish-icon">ダイビング情報</p>
					</a>
					<ul>
						<li><a href="<?php echo esc_url(home_url('/information?tab=license-training')); ?>">ライセンス講習</a></li>
						<li><a href="<?php echo esc_url(home_url('/information?tab=trial-diving')); ?>">体験ダイビング</a></li>
						<li><a href="<?php echo esc_url(home_url('/information?tab=fun-diving')); ?>">ファンダイビング</a></li>
					</ul>

				</div>
				<div class="drawer-menu__item drawer-menu__item--01">
					<a href="<?php echo esc_url(home_url('/blog')); ?>">
						<p class="starfish-icon">ブログ</p>
					</a>
				</div>
			</li>

			<!-- ブロック3 -->
			<li class="drawer-menu__box drawer-menu__box--03">
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/voice')); ?>">
						<p class="starfish-icon">お客様の声</p>
					</a>
				</div>
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/price')); ?>">
						<p class="starfish-icon">料金一覧</p>
					</a>
					<ul>
						<li><a href="<?php echo esc_url(home_url('/price')); ?>">ライセンス講習</a></li>
						<li><a href="<?php echo esc_url(home_url('/price')); ?>">体験ダイビング</a></li>
						<li><a href="<?php echo esc_url(home_url('/price')); ?>">ファンダイビング</a></li>
					</ul>
				</div>
			</li>

			<!-- ブロック4 -->
			<li class="drawer-menu__box drawer-menu__box--04">
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/faq')); ?>">
						<p class="starfish-icon">よくある質問</p>
					</a>
				</div>
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">
						<p class="starfish-icon">
							プライバシー<br class="u-mobile" />ポリシー
						</p>
					</a>
				</div>
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">
						<p class="starfish-icon">利用規約</p>
					</a>
				</div>
				<div class="drawer-menu__item">
					<a href="<?php echo esc_url(home_url('/contact')); ?>">
						<p class="starfish-icon">お問い合わせ</p>
					</a>
				</div>
			</li>
		</ul>
	</div>
