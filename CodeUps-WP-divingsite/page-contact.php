<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-contact.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-contact-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">contact</h2>
</section>

<?php get_template_part('common/breadcrumb') ?>

<div class="page-contact page-contact-layout">
	<div class="page-contact__inner inner">
		<div class="page-contact__warning" id="warningMessage">
			<p>
				※必須項目が入力されていません。<br class="u-mobile" />入力してください。
			</p>
		</div>
		<div class="page-contact__content form-wrapper fish">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
