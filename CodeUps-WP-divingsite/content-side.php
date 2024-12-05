			<aside>
				<div class="blog__side side">
					<section class="side-popular">
						<h2 class="side-popular__heading side-heading">人気記事</h2>
						<ul class="side-popular__cards">
							<?php
							// 人気記事を取得するためのクエリを設定します。
							$popular_posts = new WP_Query(array(
									'posts_per_page' => 3, // 表示する投稿数
									'meta_key' => 'post_views_count', // カスタムフィールドのキー（人気度を示す）
									'orderby' => 'meta_value_num', // カスタムフィールドの値で並べ替え
									'order' => 'DESC', // 降順で並べ替え
									'post_type' => 'post' // 投稿タイプ
							));
							// クエリが成功し、投稿がある場合
							if ($popular_posts->have_posts()) :
									while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>

							<li class="side-popular__card popular-card">
								<!-- 投稿のURLを取得し、カード全体をリンクとして包む -->
								<a href="<?php echo esc_url(get_permalink()); ?>" class="popular-card__link">
									<div class="popular-card__img">
										<?php
								// サムネイルのURLを変数に格納（`get_the_post_thumbnail_url()` を使用）
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'thumbnail') : get_theme_file_uri('/assets/images/default.jpg');
								?>
										<img src="<?php echo esc_url($thumbnail); ?>"
											alt="<?php echo esc_attr(has_post_thumbnail() ? get_the_title() : 'No Image'); ?>" />

									</div>
									<div class="popular-card__body">
										<time datetime="<?php echo get_the_date('Y-m-d'); ?>"
											class="popular-card__date"><?php echo get_the_date('Y.m.d'); ?></time>
										<p class="popular-card__title"><?php the_title(); ?></p>
									</div>
								</a>
							</li>
							<?php endwhile; else : ?>
							<p>人気記事が見つかりませんでした。</p>
							<?php endif;
							wp_reset_postdata(); // グローバルな $post オブジェクトをリセットします。
							?>
						</ul>
					</section>

					<section class="side-voice">
						<h2 class="side-voice__heading side-heading">口コミ</h2>
						<?php
							// 最新の口コミを取得
							$latest_voice_args = array(
								'post_type' => 'voice', // カスタム投稿タイプが 'voice' であることを指定
								'posts_per_page' => 1,  // 1件のみ取得
								'orderby' => 'date',    // 日付順で取得
								'order' => 'DESC'       // 降順で取得
							);

							$latest_voice_query = new WP_Query($latest_voice_args);

							if ($latest_voice_query->have_posts()) :
								while ($latest_voice_query->have_posts()) : $latest_voice_query->the_post();
									?>

						<div class="side-voice__content">
							<div class="side-voice__img">
								<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
									alt="<?php echo esc_attr(get_the_title()); ?>" />
							</div>
							<p class="side-voice__caption"><?php echo esc_html(get_post_meta(get_the_ID(), 'caption', true)); ?></p>
							<div class="side-voice__title">
								<?php the_title(); ?>
							</div>
							<div class="side-voice__button">
								<a href="<?php echo esc_url(home_url('/voice')); ?>" class="button"> View more</a>
							</div>
						</div>
						<?php
        	endwhile; wp_reset_postdata(); endif; ?>
					</section>

					<section class="side-campaign">
						<h2 class="side-campaign__heading side-heading">キャンペーン</h2>
						<ul class="side-campaign__items">
							<?php
							// 最新のキャンペーン情報を取得
							$latest_campaign_args = array(
								'post_type' => 'campaign', // カスタム投稿タイプが 'campaign' であることを指定
								'posts_per_page' => 2,  // 3件のみ取
								'orderby' => 'date',    // 日付順で取得
								'order' => 'DESC'       // 降順で取得
							);

							$latest_campaign_query = new WP_Query($latest_campaign_args);
							if ($latest_campaign_query->have_posts()) :
								while ($latest_campaign_query->have_posts()) : $latest_campaign_query->the_post();

								// カスタムフィールドの値を取得
								$price_old = get_field('campaign-price_old');
								$price_new = get_field('campaign-price_new');
								$period = get_field('campaign-period');
								?>
							<li class="side-campaign__item">
								<figure class="side-campaign__img">
									<?php
											// サムネイルのURLを変数に格納
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_theme_file_uri('/assets/images/campaign1.jpg');
								// altテキストを設定
								$alt_text = has_post_thumbnail() ? get_the_title() : 'キャンペーンの画像';
								?>
									<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
								</figure>
								<div class="side-campaign__body">
									<div class="side-campaign__top">
										<div class="side-campaign__title"><?php the_title(); ?>
										</div>
									</div>
									<div class="side-campaign__text">
										<p class="side-campaign__price-info">
											全部コミコミ(お一人様)
										</p>
										<div class="side-campaign__price">
											<p class="side-campaign__price-before"><?php echo esc_html($price_old); ?></p>
											<p class="side-campaign__price-after"><?php echo esc_html($price_new); ?></p>
										</div>
									</div>
								</div>
							</li>
							<?php endwhile; endif; wp_reset_postdata(); ?>
						</ul>
						<div class="side-campaign__button">
							<a href="<?php echo esc_url(home_url('/campaign')); ?>" class="button">View&nbsp;more</a>
						</div>
					</section>

					<section class="side-archive">
						<h2 class="side-archive__heading side-heading">アーカイブ</h2>
						<div class="side-archive__contents">
							<?php
						global $wpdb;
						// 年ごとに投稿データを取得
						$results = $wpdb->get_results("
								SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count
								FROM {$wpdb->posts}
								WHERE post_type = 'post' AND post_status = 'publish'
								GROUP BY year, month
								ORDER BY year DESC, month DESC
						");

							$years = [];
							foreach ($results as $result) {
									$years[$result->year][] = [
											'month' => $result->month,
											'post_count' => $result->post_count,
											'url' => get_month_link($result->year, $result->month),
									];
							}

							// HTML生成
							foreach ($years as $year => $months) {
									echo '<div class="side-archive__year" data-year="' . esc_html($year) . '">';
									// 動的に年を表示
									echo '<div class="side-archive__year-toggle js-year-toggle">';
									echo esc_html($year);
									echo '</div>';
									echo '<div class="side-archive__month-list">';
									foreach ($months as $month) {
											echo '<div class="side-archive__month">';
											echo '<a href="' . esc_url($month['url']) . '" class="side-archive__link">' . esc_html($month['month']) . '月</a>';
											echo '</div>';
									}
									echo '</div></div>';
							}
							?>
						</div>
					</section>

				</div>
			</aside>
