<?php get_header(); ?>

<div class="page-404">
	<div class="page-404__inner inner">
		<div class="breadcrumb-wrapper">
			<div class="page-404__breadcrumb breadcrumb">
				<a href="<?php echo esc_url(home_url('/')); ?>">TOP</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="#">404</a>
			</div>
		</div>
		<div class="page-404__content">
			<figure class="page-404__whale-image">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/background-whale.png" alt="くじらのイラスト" />
			</figure>
			<p class="pave-404__title">404</p>
			<p class="page-404__text">申し訳ありません。<br>
				お探しのページが見つかりません。</p>
			<div class="page-404__button">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="button-02">page TOP</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
