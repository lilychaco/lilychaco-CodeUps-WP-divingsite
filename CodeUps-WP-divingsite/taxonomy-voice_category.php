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
				<!-- ALL のリンク -->
				<li class="category-list__item">
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
									<div class="voice-card__tag">
										<?php
                            $voice_tags = get_the_terms( get_the_ID(), 'voice_tag' );
                            if ( ! empty( $voice_tags ) && ! is_wp_error( $voice_tags ) ) {
                                foreach( $voice_tags as $tag ) {
                                    echo '<span>' . esc_html( $tag->name ) . '</span> ';
                                }
                            } else {
                                echo '<span>タグなし</span>';
                            }
                            ?>
									</div>
									<div class="voice-card__category">
										<span>
											<?php single_term_title(); // タクソノミー名を表示 ?>
										</span>
									</div>
								</div>
								<div class="voice-card__title">
									<?php the_title(); ?>
								</div>
							</div>
							<figure class="voice-card__img colorbox">
								<?php
                    // アイキャッチ画像を取得して変数に格納
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'full', array('alt' => get_the_title()));
										// アイキャッチ画像がある場合は表示し、ない場合はデフォルト画像を表示
								if ( $thumbnail ) {
                        echo $thumbnail;
                    } else {
                        // デフォルトの画像のalt属性を投稿タイトルに変更
                        echo '<img src="' . esc_url( get_theme_file_uri() . '/assets/images/voice01.jpg' ) . '" alt="' . esc_attr( get_the_title() ) . 'の画像" />';
                    }
                    ?>
							</figure>
						</div>
						<div class="voice-card__text">
							<?php the_excerpt(); // 抜粋を表示 ?>
						</div>
					</a>
				</li>
				<?php endwhile; endif; ?>
			</ul>
		</div>


		<!-- ページネーション -->
		<div class="archive-voice__nav page-nav">
			<ul class="page-nav__pager">
				<?php
				// ページナビの表示
				if (function_exists('wp_pagenavi')) {
					wp_pagenavi();
				}
				?>
			</ul>
		</div>

	</div>
</div>


<?php get_footer(); ?>
