<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<?php if (is_post_type_archive('campaign')) : ?>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign-sp.jpg" alt="ファーストビュー画像" />
			<?php elseif (is_post_type_archive('voice')) : ?>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-voice.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-voice-sp.jpg" alt="ファーストビュー画像" />
			<?php else : ?>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-default.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-default-sp.jpg" alt="ファーストビュー画像" />
			<?php endif; ?>
		</picture>
	</figure>
	<h2 class="mv__title">
		<?php if (is_post_type_archive('campaign')) : ?>
		Campaign
		<?php elseif (is_post_type_archive('voice')) : ?>
		Voice
		<?php else : ?>
		<?php post_type_archive_title(); ?>
		<?php endif; ?>
	</h2>
</section>
<?php get_template_part('common/breadcrumb'); ?>

<?php if (is_post_type_archive('campaign')) : ?>
<?php get_template_part('content', 'campaign'); ?>v
<?php elseif (is_post_type_archive('voice')) : ?>
<?php get_template_part('content', 'voice'); ?>
<?php else : ?>
<!-- 他のアーカイブページのための汎用テンプレート -->
<?php endif; ?>



<div class="contact-wrapper">
	<?php get_template_part('common/contact'); ?>
</div>
<?php get_footer(); ?>
