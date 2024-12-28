<?php get_header(); ?>

<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">
		<?php echo get_the_archive_title(); ?>
	</h2>
</section>
<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-campaign archive-campaign-layout">
	<div class="archive-campaign__inner inner">
		<!-- カテゴリリスト部分 -->
		<ul class="archive-campaign__category-list category-list fish">
			<li class="category-list__item">
				<!-- ALLカテゴリへのリンク（archive-campaign.phpに戻る） -->
				<a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>"
					class="category-list__link <?php echo (!isset($_GET['term']) || $_GET['term'] == 'all') ? 'is-current' : ''; ?>">
					ALL
				</a>
			</li>
			<?php
					// 'campaign-category'タクソノミーの用語を取得
					$terms = get_terms(array(
							'taxonomy' => 'campaign-category',
							'hide_empty' => false,
					));
					?>
			<?php if (!empty($terms)) : ?>
			<?php foreach ($terms as $term) : ?>
			<li class="category-list__item">
				<!-- タクソノミーのリンクを作成 -->
				<a href="<?php echo esc_url(get_term_link($term)); ?>"
					class="category-list__link <?php echo (isset($_GET['term']) && $_GET['term'] == $term->slug) ? 'is-current' : ''; ?>">
					<?php echo esc_html($term->name); ?>
				</a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<!-- 投稿リスト部分 -->
		<ul class="archive-campaign__content archive-campaign-cards">

			<?php
			// ループはそのまま利用可能
			if (have_posts()) : while (have_posts()) : the_post();
				// グループフィールド「campaign-price」の値を取得
        $priceInfo = get_field('campaign-price');

        // サブフィールド「campaign-price_old」と「campaign-price_new」を取得
        $price_old = $priceInfo['campaign-price_old'] ?? ''; // 値がない場合は空文字を設定
        $price_new = $priceInfo['campaign-price_new'] ?? ''; // 値がない場合は空文字を設定

			// `campaign-price_new` が空でない場合にのみカードを表示
			if (!empty($price_new)) :
			?>

			<li class=" archive-campaign-cards__item archive-campaign-card">
				<figure class="archive-campaign-card__img">
					<?php
							// アイキャッチ画像を取得し、変数に格納
							$thumbnail = get_the_post_thumbnail(
									get_the_ID(),
									'full',
									array('alt' => esc_attr(get_the_title() . 'の画像'))
							);
							?>
					<?php if ($thumbnail) : ?>
					<!-- サムネイル画像がある場合 -->
					<?php echo $thumbnail; ?>
					<?php else : ?>
					<!-- サムネイル画像がない場合、デフォルト画像を表示 -->
					<img src="<?php echo esc_url(get_theme_file_uri('assets/images/campaign1.jpg')); ?>" alt="デフォルト画像" />
					<?php endif; ?>
				</figure>



				<div class="archive-campaign-card__body">
					<div class="archive-campaign-card__top">
						<?php
									$terms = get_the_terms(get_the_ID(), 'campaign-category');
									if (!empty($terms) && !is_wp_error($terms)) :
									?>
						<div class="archive-campaign-card__category">
							<?php foreach ($terms as $term) : ?>
							<span><?php echo esc_html($term->name); ?></span>
							<?php endforeach; ?>
						</div>
						<?php
						endif;
						?>
						<div class="archive-campaign-card__title"><?php the_title(); ?></div>
					</div>
					<div class="archive-campaign-card__text">
						<p class="archive-campaign-card__price-info">
							全部コミコミ(お一人様)
						</p>
						<div class="archive-campaign-card__price-text">
							<?php if (!empty($price_old)) : ?>
							<p class="archive-campaign-card__price-old">
								&yen;<?php echo esc_html(number_format($price_old)); ?>
							</p>
							<?php endif; ?>
							<?php if (!empty($price_new)) : ?>
							<p class="archive-campaign-card__price-new">
								&yen;<?php echo esc_html(number_format($price_new)); ?>
							</p>
							<?php endif; ?>
						</div>
					</div>
					<div class="archive-campaign-card__subbody">
						<div class="archive-campaign-card__subtext">
							<?php
									// 本文を取得し、HTMLタグを除去、86文字に制限して表示
									$content = strip_tags( get_the_content() ); // HTMLタグを除去
									$trimmed_content = mb_strlen( $content, 'UTF-8' ) > 164
									? mb_substr( $content, 0, 164, 'UTF-8' ) . ''
									: $content; // 86文字に切り詰め、省略記号を追加
									echo esc_html( $trimmed_content ); // エスケープして表示
									?>
						</div>
						<div class="archive-campaign-card__meta">
							<?php
							// グループフィールドを取得
							$campaignPeriod = get_field('campaign_period');
							 // グループフィールド内の「開始日」フィールドを取得
							$startDate = $campaignPeriod['start_date']?? '';
							 // グループフィールド内の「終了日」フィールドを取得
							$endDate = $campaignPeriod['end_date']?? '';

							  //開始日と終了日から年を取得
                          $startYear = date('Y', strtotime($startDate));
                          $endYear = date('Y', strtotime($endDate));
							?>
							<div class="archive-campaign-card__date">
								<?php if ( $startDate ): ?>
								<time datetime="<?php echo esc_html( $startDate ); ?>">
									<?php echo esc_html( date('Y/n/j', strtotime($startDate)) ); ?>
								</time>
								<?php endif;?>
								<?php if ( $endDate ): ?>
								- <time datetime="<?php echo esc_html( $endDate ); ?>">
									<!-- 同じ年なら年を非表示に -->
									<?php if ( $startYear === $endYear ) {
                            echo esc_html( date('n/j', strtotime($endDate)) );
                          } else {
                            echo esc_html( date('Y.n/j', strtotime($endDate)) );
                          } ?>
								</time>
								<?php endif;?>



							</div>
							<div class="archive-campaign-card__microcopy">
								ご予約・お問い合わせはコチラ
							</div>
							<div class="archive-campaign-card__button">
								<a href="<?php echo esc_url(home_url('/contact')); ?>" class="button">Contact us</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php endif;  ?>
			<?php  endwhile; endif; ?>
		</ul>
		<div class="archive-campaign__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>
	</div>

</div>
</div>

<?php get_footer(); ?>