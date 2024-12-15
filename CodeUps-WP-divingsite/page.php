<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-sitemap.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-sitemap-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<!-- タイトルの出力 -->
	<h2 class="mv__title">
		<?php
        if (is_page('privacy-policy')) {
            echo 'Privacy&nbsp;Policy';
        } elseif (is_page('terms-of-service')) {
            echo 'Terms&nbsp;of&nbsp;Service';
        } else {
            the_title(); // 他のページの場合はページタイトルを出力
        }
        ?>
	</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>


<div class="content-wrapper">
	<div class="inner">
		<?php if (is_page('privacypolicy')) : ?>
		<!-- プライバシーポリシーのコンテンツ -->
		<h3 class="page-privacy__title fish">プライバシーポリシー</h3>
		<div class="page-privacy__box">
			<?php the_content(); ?>
		</div>
		<?php elseif (is_page('terms-of-service')) : ?>
		<!-- 利用規約のコンテンツ -->
		<h3 class="page-service__title fish">利用規約</h3>
		<div class="page-service__box">
			<?php the_content(); ?>
		</div>
		<?php else : ?>
		<!-- 他のページの場合、一般的なテンプレート内容を表示 -->
		<h3 class="page-default__title"><?php the_title(); ?></h3>
		<div class="page-content">
			<?php the_content(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>


<?php get_footer(); ?>
