    <footer class="footer footer-layout">
    	<div class="footer__inner inner">
    		<div class="footer__top">
    			<div class="footer__logo">
    				<a href="<?php echo esc_url(home_url('/')); ?>">
    					<picture>
    						<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/footer-logo-pc.png"
    							media="(min-width: 768px)" />
    						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/footer-logo-sp.png" alt="フッターロゴ" />
    					</picture>
    				</a>
    			</div>
    			<div class="footer__sns">
    				<a href="https://www.facebook.com/yumin.amakusa?locale=ja_JP" target=”_blank”><img
    						src="<?php echo get_theme_file_uri(); ?>/assets/images/facebooklogo.png" alt="フッター" /></a>
    				<a href="https://www.instagram.com/yumin52/" target=”_blank”><img
    						src="<?php echo get_theme_file_uri(); ?>/assets/images/instagramlogo.png" alt="フッターロゴ" /></a>
    			</div>
    		</div>
    		<div class="footer__nav nav-menu">
    			<!-- ブロック1 -->
    			<div class="nav-menu__box nav-menu__box--01 nav-menu__box--footer">
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/campaign')); ?>">
    						<p class="starfish-icon">キャンペーン</p>
    					</a>
    					<ul>
    						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ライセンス取得</a></li>
    						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">貸切体験ダイビング</a></li>
    						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ナイトダイビング</a></li>
    					</ul>
    				</div>
    				<div class="nav-menu__item nav-menu__item--01">
    					<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
    						<p class="starfish-icon">私たちについて</p>
    					</a>
    				</div>
    			</div>

    			<!-- ブロック2 -->
    			<div class="nav-menu__box nav-menu__box--02">
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/information')); ?>">
    						<p class="starfish-icon">ダイビング情報</p>
    					</a>
    					<ul>
    						<ul>
    							<li><a href="<?php echo esc_url(home_url('/information#license-training')); ?>">ライセンス講習</a></li>
    							<li><a href="<?php echo esc_url(home_url('/information#trial-diving')); ?>">体験ダイビング</a></li>
    							<li><a href="<?php echo esc_url(home_url('/information#fun-diving')); ?>">ファンダイビング</a></li>
    						</ul>

    						<!-- <li><a href="<?php echo esc_url(home_url('/information')); ?>">ライセンス講習</a></li>
    						<li><a href="<?php echo esc_url(home_url('/information')); ?>">体験ダイビング</a></li>
    						<li><a href="<?php echo esc_url(home_url('/information')); ?>">ファンダイビング</a></li> -->
    					</ul>
    				</div>
    				<div class="nav-menu__item nav-menu__item--01">
    					<a href="<?php echo esc_url(home_url('/blog')); ?>">
    						<p class="starfish-icon">ブログ</p>
    					</a>
    				</div>
    			</div>

    			<!-- ブロック3 -->
    			<div class="nav-menu__box nav-menu__box--05">
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/voice')); ?>">
    						<p class="starfish-icon">お客様の声</p>
    					</a>
    				</div>
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/price')); ?>">
    						<p class="starfish-icon">料金一覧</p>
    					</a>
    					<ul>
    						<li><a href="<?php echo esc_url(home_url('/price')); ?>">ライセンス講習</a></li>
    						<li><a href="<?php echo esc_url(home_url('/price')); ?>">体験ダイビング</a></li>
    						<li><a href="<?php echo esc_url(home_url('/price')); ?>">ファンダイビング</a></li>
    					</ul>
    				</div>
    			</div>

    			<!-- ブロック4 -->
    			<div class="nav-menu__box nav-menu__box--06">
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/faq')); ?>">
    						<p class="starfish-icon">よくある質問</p>
    					</a>
    				</div>
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">
    						<p class="starfish-icon">
    							プライバシー<br class="u-mobile" />ポリシー
    						</p>
    					</a>
    				</div>
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">
    						<p class="starfish-icon">利用規約</p>
    					</a>
    				</div>
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/contact')); ?>">
    						<p class="starfish-icon">お問い合わせ</p>
    					</a>
    				</div>
    				<div class="nav-menu__item">
    					<a href="<?php echo esc_url(home_url('/sitemap')); ?>">
    						<p class="starfish-icon">サイトマップ</p>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="footer__copyright">
    			<span>c</span>opyright&nbsp;©&nbsp;2021&nbsp;-&nbsp;2023&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved.
    		</div>
    	</div>

    	<div class="footer__button page-top-button js-page-top-button">
    		<div class="page-top-button__img">
    			<picture>
    				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/totop-button.png" alt="上に戻るボタン" />
    			</picture>
    		</div>
    	</div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>
