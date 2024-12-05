<?php get_header(); ?>
<?php get_template_part('common/breadcrumb') ?>

<div class="page-404">
	<div class="page-404__content">
		<figure class="page-404__whale-image">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/background-whale.png" alt="くじらのイラスト" />
		</figure>
		<p class="pave-404__title">404</p>
		<p class="page-404__text">
			申し訳ありません。<br />
			お探しのページが見つかりません。
		</p>
		<div class="page-404__button">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="button-02">page TOP</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>
