<?php get_header(); ?>

<section class="fv">
	<div class="fv__slider-wrap">
		<div class="fv__slider swiper js-fv-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<figure class="fv__slider-img">
						<picture>
							<source srcset="<?php the_field('fv_image_1_pc'); ?>" media="(min-width: 768px)" />
							<img src="<?php the_field('fv_image_1_sp'); ?>" alt="ファーストビュー画像1" />
						</picture>
					</figure>
				</div>
				<div class="swiper-slide">
					<figure class="fv__slider-img">
						<picture>
							<source srcset="<?php the_field('fv_image_2_pc'); ?>" media="(min-width: 768px)" />
							<img src="<?php the_field('fv_image_2_sp'); ?>" alt="ファーストビュー画像2" />
						</picture>
					</figure>
				</div>
				<div class="swiper-slide">
					<figure class="fv__slider-img">
						<picture>
							<source srcset="<?php the_field('fv_image_3_pc'); ?>" media="(min-width: 768px)" />
							<img src="<?php the_field('fv_image_3_sp'); ?>" alt="ファーストビュー画像3" />
						</picture>
					</figure>
				</div>
				<div class="swiper-slide">
					<figure class="fv__slider-img">
						<picture>
							<source srcset="<?php the_field('fv_image_4_pc'); ?>" media="(min-width: 768px)" />
							<img src="<?php the_field('fv_image_4_sp'); ?>" alt="ファーストビュー画像4" />
						</picture>
					</figure>
				</div>
			</div>
		</div>
	</div>

	<div class="fv__copy">
		<h2 class="fv__main-title">diving</h2>
		<p class="fv__sub-title">into&nbsp;the&nbsp;ocean</p>
	</div>
</section>

<section class="top-campaign top-campaign-layout" id="campaign">
	<?php
				// カスタム投稿「campaign」を取得するためのWP_Query
				$args = [
		    'post_type' => 'campaign', // カスタム投稿タイプ「campaign」を指定
  		  'posts_per_page' => -1, // 全ての投稿を取得（必要に応じて数を変更）
				];

				$campaign_query = new WP_Query($args);
				if ($campaign_query->have_posts()) :
				?>

	<div class="top-campaign__inner inner">
		<div class="top-campaign__heading section-heading">
			<h3 class="section-heading__title">campaign</h3>
			<h2 class="section-heading__subtitle">キャンペーン</h2>
		</div>

		<!-- 前後の矢印 -->
		<div class="swiper-button custom-swiper-button-prev"></div>
		<div class="swiper-button custom-swiper-button-next"></div>

		<div class="top-campaign__cards-wrapper swiper js-campaign-swiper">
			<ul class="top-campaign__cards campaign-cards swiper-wrapper">
				<?php while ($campaign_query->have_posts()) : $campaign_query->the_post();
				// カスタムフィールドの値を取得
					$price_old = get_field('campaign-price_old');
					$price_new = get_field('campaign-price_new');
					$period = get_field('campaign-period');

				?>
				<li class="campaign-cards__item campaign-card swiper-slide">
					<figure class="campaign-card__img">
						<?php if (has_post_thumbnail()) : ?>
						<!-- 投稿にサムネイルが設定されている場合 -->
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" />
						<?php else : ?>
						<!-- 画像がない場合はデフォルト画像を表示 -->
						<img src="<?php echo esc_url(get_theme_file_uri('assets/images/campaign1.jpg')); ?>" alt="デフォルト画像" />
						<?php endif; ?>
					</figure>
					<div class="campaign-card__body">
						<div class="campaign-card__top">
							<?php
												$terms = get_the_terms(get_the_ID(), 'campaign-category');
												if (!empty($terms) && !is_wp_error($terms)) :
												?>
							<div class="campaign-card__category">
								<?php foreach ($terms as $term) : ?>
								<span><?php echo esc_html($term->name); ?></span>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
							<div class="campaign-card__title"><?php the_title(); ?></div>
						</div>
						<div class="campaign-card__text">
							<p class="campaign-card__price-info">
								全部コミコミ(お一人様)
							</p>
							<div class="campaign-card__price-text">
								<?php if (!empty($price_old)) : ?>
								<p class="campaign-card__price-old">
									<?php echo esc_html($price_old); ?>
								</p>
								<?php endif; ?>
								<p class="campaign-card__price-new">
									<?php echo esc_html($price_new); ?>
								</p>
							</div>
						</div>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="top-campaign__button">
			<a href="<?php echo esc_url(home_url('/campaign')); ?>" class="button">View&nbsp;more</a>
		</div>
	</div>

	<?php endif  ?>
	<?php wp_reset_postdata(); // クエリのリセット  ?>
</section>

<section class="top-aboutus inner top-aboutus-layout" id="aboutus">
	<div class="top-aboutus__heading section-heading">
		<h3 class="section-heading__title">about&nbsp;us</h3>
		<h2 class="section-heading__subtitle">私たちについて</h2>
	</div>
	<div class="top-aboutus__container">
		<div class="top-aboutus__sp-image u-mobile">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus-image.jpg" alt="私たちについての画像" />
		</div>
		<div class="top-aboutus__pc-image u-desktop">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus-ocean2.jpg" alt="私たちについての画像" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus-ocean1.jpg" alt="私たちについての画像" />
		</div>
		<div class="top-aboutus__main-wrapper">
			<div class="top-aboutus__main">
				<div class="top-aboutus__title">
					<span>d</span>ive&nbsp;into<br />
					the&nbsp;<span>o</span>cean
				</div>
				<div class="top-aboutus__body">
					<div class="top-aboutus__text">
						ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
						ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
					</div>
					<div class="top-aboutus__button">
						<a href="<?php echo esc_url(home_url('/aboutus')); ?>" class="button"> View more </a>
					</div>
				</div>
			</div>
		</div>
		<figure class="top-aboutus__sango-image u-desktop">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/accent01.png" alt="サンゴのイラスト" />
		</figure>

	</div>
</section>

<section class="top-information top-information-layout" id="information">
	<div class="top-information__inner inner">
		<div class="top-information__heading section-heading">
			<h3 class="section-heading__title">information</h3>
			<h2 class="section-heading__subtitle">ダイビング情報</h2>
		</div>
		<div class="top-information__main">
			<figure class="top-information__image colorbox">
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/ocean3.jpg" alt="黄色い魚の写真" />
			</figure>
			<div class="top-information__body">
				<div class="top-information__top">
					<div class="top-information__title">ライセンス講習</div>
					<div class="top-information__text">
						当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
						正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
					</div>
				</div>
				<div class="top-information__button">
					<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="top-blog top-blog-layout" id="blog">
	<?php
			// カスタムクエリの設定
			$args = array(
				'post_type' => 'post', // 投稿タイプを指定
				'posts_per_page' => 3, // 表示する投稿数を指定
				'orderby' => 'date', // 日付でソート
				'order' => 'DESC' // 降順
			);
			$query = new WP_Query($args);
				if ($query->have_posts()) :
		?>

	<div class="top-blog__inner inner">
		<figure class="top-blog__fish-image u-desktop">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/accent02.png" alt="魚のイラスト" />
		</figure>
		<div class="top-blog__heading section-heading">
			<h3 class="section-heading__title section-heading__title--top-blog">
				Blog
			</h3>
			<h2 class="section-heading__subtitle section-heading__subtitle--top-blog">
				ブログ
			</h2>
		</div>
		<ul class="top-blog__cards blog-cards">
			<?php
			while ($query->have_posts()) : $query->the_post();
			?>
			<li class="blog-cards__item blog-card">
				<a href="<?php the_permalink(); ?>" class="blog-card__link">
					<figure class="blog-card__img">
						<?php if (has_post_thumbnail()) : ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" />
						<?php else : ?>
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/no-image.jpg" alt="No image available">
						<?php endif; ?>
					</figure>
					<div class="blog-card__body">
						<div class="blog-card__top">
							<!-- 投稿日時の表示 -->
							<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="blog-card__date">
								<?php echo esc_html(get_the_date('Y.m/d')); ?>
							</time>
							<div class="blog-card__title"><?php the_title(); ?></div>
						</div>
						<div class="blog-card__text">
							<?php
            // 本文を取得し、HTMLタグを除去、86文字に制限して表示
            $content = strip_tags( get_the_content() ); // HTMLタグを除去
            $trimmed_content = mb_strlen( $content, 'UTF-8' ) > 86
                ? mb_substr( $content, 0, 86, 'UTF-8' ) . ''
                : $content; // 86文字に切り詰め、省略記号を追加
            echo esc_html( $trimmed_content ); // エスケープして表示
            ?>
						</div>
					</div>
				</a>
			</li>
			<?php endwhile;?>
		</ul>

		<div class="top-blog__button">
			<a href="<?php echo esc_url(home_url('/blog')); ?>" class="button">View more</a>
		</div>
	</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); // クエリのリセット  ?>
</section>


<section class="top-voice top-voice-layout" id="voice">
	<?php
	 // サブループ: voiceカスタム投稿タイプを取得
            $voice_query = new WP_Query(array(
                'post_type' => 'voice', // カスタム投稿タイプ
                'posts_per_page' => 2, // 表示件数
            ));
						if ($voice_query->have_posts()) :
	?>
	<div class="top-voice__inner inner">
		<figure class="top-voice__fish-image u-desktop">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/accent03.png" alt="魚のイラスト" />
		</figure>
		<div class="top-voice__heading section-heading">
			<h3 class="section-heading__title"><span>V</span>oice</h3>
			<h2 class="section-heading__subtitle">お客様の声</h2>
		</div>
		<ul class="top-voice__cards voice-cards">
			<?php
        while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
			<li class="voice-cards__item voice-card">
				<a href="#" class="voice-card__link">
					<div class="voice-card__body">
						<div class="voice-card__top">
							<div class="voice-card__meta">

								<?php
                  $voice_tags = get_the_terms( get_the_ID(), 'voice_tag' );
                  if ( ! empty( $voice_tags ) && ! is_wp_error( $voice_tags ) ) :?>
								<div class="voice-card__tag">
									<?php  foreach( $voice_tags as $tag ): ?>
									<span> <?php  echo esc_html( $tag->name ) ?></span>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>

								<?php
                  $terms = get_the_terms( get_the_ID(), 'voice_category' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
										?>
								<div class="voice-card__category">
									<?php foreach ($terms as $term) : ?>
									<span><?php echo esc_html($term->name); ?></span>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
							<div class="voice-card__title">
								<?php the_title(); ?>
							</div>
						</div>
						<figure class="voice-card__img colorbox">
							<?php
								// アイキャッチ画像を取得して変数に格納
								$thumbnail = get_the_post_thumbnail(get_the_ID(), 'full', array('alt' => get_the_title()));
								?>

							<?php if ( $thumbnail ) : ?>
							<?= $thumbnail ?>
							<?php else : ?>
							<img src="<?= esc_url( get_theme_file_uri() . '/assets/images/voice01.jpg' ) ?>"
								alt="<?= esc_attr( get_the_title() ) ?>の画像" />
							<?php endif; ?>
						</figure>
					</div>
					<div class="voice-card__text">
						<?php
            // 本文を取得し、HTMLタグを除去、171文字に制限して表示
            $content = strip_tags( get_the_content() ); // HTMLタグを除去
            $trimmed_content = mb_strlen( $content, 'UTF-8' ) > 171
                ? mb_substr( $content, 0, 171, 'UTF-8' ) . ''
                : $content; // 171文字に切り詰め、省略記号を追加
            echo esc_html( $trimmed_content ); // エスケープして表示
            ?>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="top-voice__button">
			<a href="<?php echo esc_url(home_url('/voice')); ?>" class="button"> View more</a>
		</div>
		<figure class="top-voice__seahorse-image u-desktop">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/accent04.png" alt="タツノオトシゴのイラスト" />
		</figure>
	</div>
	<?php endif  ?>
	<?php wp_reset_postdata(); // クエリのリセット  ?>
</section>

<section class="top-price top-price-layout" id="price">
	<?php
							// 固定ページIDを指定（ここでは29）
							$page_id = 29;
							// Smart Custom Fieldsのデータを取得
							$license_pricelist = SCF::get('license_pricelist', $page_id);
							// Smart Custom Fieldsのデータを取得
							$experience_pricelist = SCF::get('experience_pricelist', $page_id);
								// Smart Custom Fieldsのデータを取得
							$fundiving_pricelist = SCF::get('fundiving_pricelist', $page_id);
								// Smart Custom Fieldsのデータを取得
							$specialdiving_pricelist = SCF::get('specialdiving_pricelist', $page_id);

			if (!empty($license_pricelist) || !empty($experience_pricelist) || !empty($fundiving_pricelist) || !empty($specialdiving_pricelist)): ?>
	<div class="inner">
		<div class="top-price__inner">
			<div class="top-price__heading section-heading">
				<h3 class="section-heading__title">Price</h3>
				<h2 class="section-heading__subtitle">料金一覧</h2>
			</div>

			<div class="top-price__main">
				<figure class="top-price__image colorbox">
					<picture>
						<source media="(min-width: 768px)"
							srcset="<?php echo get_theme_file_uri(); ?>/assets/images/price-pc.jpg" />
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/price-sp.jpg" alt="魚の写真" />
					</picture>
				</figure>
				<div class="top-price__lists price-lists">
					<?php  // グループ外の単一フィールド「license_title」を取得
					$license_title = SCF::get('license_title', $page_id);
					if (!empty($license_pricelist)) :?>

					<div class="price-lists__item price-lists__item--first price-list">
						<div class="price-list__title"><?= esc_html($license_title ?: 'ダイビング'); ?></div>
						<ul class="price-list__items">
							<?php foreach ($license_pricelist as $license) : ?>
							<li class="price-list__item">
								<p class="price-list__name"><?php echo esc_html($license['license_kinds']); ?></p>
								<p class="price-list__number"><?php echo esc_html($license['license_price']); ?></p>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>

					<?php  // グループ外の単一フィールド「experience_title」を取得
					$experience_title = SCF::get('experience_title', $page_id);
					if (!empty($experience_pricelist)) :?>
					<div class="price-lists__item price-list">
						<div class="price-list__title"><?= esc_html($experience_title ?: 'ダイビング'); ?>
						</div>
						<ul class="price-list__items">
							<?php foreach ($experience_pricelist as $experience) : ?>
							<li class="price-list__item">
								<!-- 体験種類を表示 -->
								<p class="price-list__name"><?php echo esc_html($experience['experience_name']); ?></p>
								<!-- 体験料金を表示 -->
								<p class="price-list__number"><?php echo esc_html($experience['experience_price']); ?></p>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>

					<?php  // グループ外の単一フィールド「fundiving_title」を取得
					$fundiving_title = SCF::get('fundiving_title', $page_id);
					if (!empty($fundiving_pricelist)) :?>

					<div class="price-lists__item price-list">
						<div class="price-list__title"><?= esc_html($fundiving_title ?: 'ダイビング'); ?></div>

						<ul class="price-list__items">
							<?php foreach ($fundiving_pricelist as $fundiving) : ?>
							<li class="price-list__item">
								<p class="price-list__name"><?php echo esc_html($fundiving['fundiving_name']); ?></p>
								<p class="price-list__number"><?php echo esc_html($fundiving['fundiving_price']); ?></p>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>

					<?php
					 // グループ外の単一フィールド「specialdiving_title」を取得
					$specialdiving_title = SCF::get('specialdiving_title', $page_id);

					if (!empty($specialdiving_pricelist)) : ?>

					<div class="price-lists__item price-list">
						<div class="price-list__title"><?= esc_html($specialdiving_title ?: 'ダイビング'); ?></div>
						<ul class="price-list__items">
							<?php foreach ($specialdiving_pricelist as $special) : ?>
							<li class="price-list__item">
								<p class="price-list__name"><?php echo esc_html($special['specialdiving_name']); ?></p>
								<p class="price-list__number"><?php echo esc_html($special['specialdiving_price']); ?></p>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

			<div class="top-price__button">
				<a href="<?php echo esc_url(home_url('/price')); ?>" class="button"> View more</a>
			</div>
			<figure class="top-price__fish-image u-desktop">
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/top-price-fish.png" alt="魚のイラスト" />
			</figure>
		</div>
	</div>
</section>


<?php get_footer(); ?>
