<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-voice.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-voice-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>
<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-voice archive-voice-layout">
	<div class="archive-voice__inner inner">
		<div class="archive-voice__container fish">

			<!-- カテゴリリスト部分 -->
			<ul class="archive-voice__category-list category-list">
				<li class="category-list__item">
					<!-- ALL へのリンク -->
					<a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>"
						class="category-list__link <?php echo (is_post_type_archive('voice') || is_tax('voice_category')) ? '' : 'is-current'; ?>">
						ALL
					</a>
				</li>

				<?php
					// 'campaign-category'タクソノミーの用語を取得
					$taxonomy = 'voice_category'; // タクソノミー名を変数に格納
					$terms = get_terms(array(
							'taxonomy' => $taxonomy,
							'hide_empty' => false,
					));

					if (!empty($terms)) :
							foreach ($terms as $term) :
					?>
				<li class="category-list__item">
					<a href="<?php echo esc_url(get_term_link($term)); ?>"
						class="category-list__link <?php echo (is_tax($taxonomy, $term->slug)) ? 'is-current' : ''; ?>">
						<?php echo esc_html($term->name); ?>
					</a>
				</li>
				<?php endforeach; ?>
				<?php endif; ?>
			</ul>

			<!-- 投稿リスト部分 -->
			<?php if (have_posts()) : ?>
			<ul class="archive-voice__content voice-cards">
				<?php while (have_posts()) : the_post();        ?>

				<li class="voice-cards__item voice-card">
					<a href="#" class="voice-card__link">
						<div class="voice-card__body">
							<div class="voice-card__top">
								<div class="voice-card__meta">
									<?php
                        // グループフィールドを取得
                        $voiceUser = get_field('voice_user');
                        // グループフィールド内の「年代」フィールドを取得
                        $userAge = $voiceUser['user_age'] ?? '';
                        // グループフィールド内の「性別」フィールドを取得
                        $userGender = $voiceUser['user_gender'] ?? '';

												// 年齢と性別が両方設定されている場合にHTMLを出力
								if($userAge && $userGender):
												?>
									<div class="voice-card__tag">
										<?php if ( $userAge ): ?>
										<?php echo esc_html( $userAge ); ?>
										<?php endif; ?>
										(<?php if ( $userGender ): ?>
										<?php echo esc_html( $userGender ); ?>
										<?php endif; ?>)
									</div>
									<?php endif; ?>
									<?php
                  $terms = get_the_terms( get_the_ID(), 'voice_category' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
										?> <div class="voice-card__category">
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
								// アイキャッチ画像のHTMLを取得して変数に格納
								$thumbnail = get_the_post_thumbnail(
										get_the_ID(),
										'full',
										array('alt' => esc_attr(get_the_title() . 'の画像'))
								);
								?>
								<?php if ($thumbnail) : ?>
								<!-- アイキャッチ画像が設定されている場合 -->
								<?php echo $thumbnail; ?>
								<?php else : ?>
								<!-- アイキャッチ画像がない場合、デフォルト画像を表示 -->
								<img src="<?php echo esc_url(get_theme_file_uri('assets/images/voice01.jpg')); ?>"
									alt="<?php echo esc_attr(get_the_title() . 'の画像'); ?>" />
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
				<?php endwhile; endif; ?>
			</ul>
		</div>


		<!-- ページネーション -->
		<div class="archive-voice__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>

	</div>
</div>


<?php get_footer(); ?>