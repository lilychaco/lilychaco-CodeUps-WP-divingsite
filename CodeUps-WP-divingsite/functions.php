<?php

function theme_enqueue_styles() {
    // Google Fontsの読み込み
    wp_enqueue_style('mytheme-google-fonts', 'https://fonts.googleapis.com/css2?family=Lato&family=Gotu&family=Noto+Sans+JP:wght@400;500;700&display=swap', [], null);

    // jQueryを読み込む（WordPressの標準jQuery）
    wp_enqueue_script('jquery');

    // Swiper JSとそのCSSの読み込み
    wp_enqueue_script('mytheme-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [], null, true);
    wp_enqueue_style('mytheme-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', [], null);

    // ローカルJavaScriptファイルの読み込み
    wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', ['jquery'], null, true);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], null, true);
		  wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom-slider.js', ['jquery'], null, true);

    // jQuery UI CSSの読み込み
    wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', [], null);

    // ローカルCSSファイルの読み込み
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/styles.css', [], $theme_version);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');




/**
* WordPress標準機能
*/
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );


/*-----------------------------------
* アーカイブタイトル書き換え
*
* @param string $title 書き換え前のタイトル.
* @return string $title 書き換え後のタイトル.
-----------------------------------*/
function my_archive_title( $title ) {
    if ( is_home() ) { /* ホームの場合 */
        $title = 'blog';
    } elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
        $title = '' . single_cat_title( '', false ) . '';
    } elseif ( is_tag() ) { /* タグアーカイブの場合 */
        $title = '' . single_tag_title( '', false ) . '';
    } elseif ( is_post_type_archive('campaign') ) { /* 投稿タイプが campaign の場合 */
        $title = 'campaign'; // タイトルを英語表記に変更
    }elseif ( is_post_type_archive('voice') ) { /* 投稿タイプが voice の場合 */
        $title = 'voice'; // タイトルを英語表記に変更
		}elseif ( is_post_type_archive() ) { /* その他の投稿タイプアーカイブの場合 */
        $title = '' . post_type_archive_title( '', false ) . '';
    } elseif ( is_tax() ) { /* タームアーカイブの場合 */
        $title = '' . single_term_title( '', false );
    } elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
        $title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
    } elseif ( is_author() ) { /* 作者アーカイブの場合 */
        $title = '' . get_the_author() . '';
    } elseif ( is_date() ) { /* 日付アーカイブの場合 */
        $title = '';
        if ( get_query_var( 'year' ) ) {
            $title .= get_query_var( 'year' ) . '年';
        }
        if ( get_query_var( 'monthnum' ) ) {
            $title .= get_query_var( 'monthnum' ) . '月';
        }
        if ( get_query_var( 'day' ) ) {
            $title .= get_query_var( 'day' ) . '日';
        }
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'my_archive_title' );



/**
* 抜粋文の文字数の変更
*
* @param int $length 変更前の文字数.
* @return int $length 変更後の文字数.
*/
function my_excerpt_length( $length ) {
return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
* 抜粋文の省略記法の変更
*
* @param string $more 変更前の省略記法.
* @return string $more 変更後の省略記法.
*/
function my_excerpt_more( $more ) {
return '...';
}
add_filter( 'excerpt_more', 'my_excerpt_more' );


// /**
// * WordPressサイトの画像に自動的に付与されるclass等のタグを削除
// **/
function image_tag_delete( $html ){
    // widthとheight属性を削除
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    // class属性を削除
    $html = preg_replace('/class=[\'"]([^\'"]+)[\'"]/i', '', $html);
    // title属性を削除
    $html = preg_replace('/title=[\'"]([^\'"]+)[\'"]/i', '', $html);
    // <a>タグを削除
    $html = preg_replace('/<a href="[^"]*">/', '', $html);
    $html = preg_replace('/<\/a>/', '', $html);
    return $html;
}
add_filter('image_send_to_editor', 'image_tag_delete', 10);
add_filter('post_thumbnail_html', 'image_tag_delete', 10);

/*-----------------------------------
// フロントビューJavaScriptスライダーを実装
-----------------------------------*/
function enqueue_swiper_assets() {
  // SwiperのCSSを読み込む
  wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null);

  // SwiperのJSを読み込む
  wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

  // カスタムスクリプトを読み込む
  wp_enqueue_script('custom-slider-js', get_template_directory_uri() . '/assets/js/custom-slider.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');


/*-----------------------------------
// pagenavi
-----------------------------------*/
function custom_pagenavi_html($html) {
    // <div>が<ul>になっている部分を正しく修正する
    $html = str_replace('<div', '<ul', $html);
    $html = str_replace('</div>', '</ul>', $html);

    // <span>タグを<li>タグに変換
    $html = str_replace('<span', '<li', $html);
    $html = str_replace('</span>', '</li>', $html);

    // <a>タグを<li>タグで囲む
    $html = preg_replace('/(<a [^>]*>.*?<\/a>)/', '<li>$1</li>', $html);

    return $html;
}
add_filter('wp_pagenavi', 'custom_pagenavi_html');




//カスタム投稿のタグをチェックボックスで入力できるようにする
// デフォルトで表示されているメタボックスを消去するー消去できていない
function my_tag_meta_box_remove() {
    remove_meta_box('tagsdiv-voice_tag', 'voice', 'side');
}
add_action('admin_init', 'my_tag_meta_box_remove');



/*-----------------------------------
// メインループで campaign を取得するためのフィルター追加
-----------------------------------*/
function include_campaign_in_main_query($query) {
    // 管理画面ではなく、メインクエリかつ特定のアーカイブページでのみ処理
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('campaign')) {
        $query->set('post_type', 'campaign'); // カスタム投稿タイプを指定
        $query->set('posts_per_page', 4);    // 1ページあたりの投稿数
    }
}
add_action('pre_get_posts', 'include_campaign_in_main_query');




/*-----------------------------------
// メインループで voice を取得するためのフィルター追加
-----------------------------------*/
function include_voice_in_main_query($query) {
// 管理画面ではなく、メインクエリかつ特定のアーカイブページでのみ処理
if (!is_admin() && $query->is_main_query() && is_post_type_archive('voice')) {
$query->set('post_type', 'voice'); // カスタム投稿タイプを指定
$query->set('posts_per_page', 6); // 1ページあたりの投稿数
}
}
add_action('pre_get_posts', 'include_voice_in_main_query');

/*-----------------------------------
//カスタムタクソノミーの投稿をメインループで表示する
-----------------------------------*/

function modify_main_query($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->is_post_type_archive('campaign') || $query->is_tax('campaign-category')) {
        $query->set('post_type', 'campaign');
        $query->set('posts_per_page', 4);
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
    }

    if ($query->is_post_type_archive('voice') || $query->is_tax('voice_category')) {
        $query->set('post_type', 'voice');
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'modify_main_query');




/*-----------------------------------
// カスタムタクソノミーをチェックボックスで表示する
-----------------------------------*/
function my_add_new_tags_metabox() {
add_meta_box('custom-tagsdiv', 'タグ', 'my_metabox_content', 'voice', 'side', 'default');
}
add_action('add_meta_boxes', 'my_add_new_tags_metabox');

function my_metabox_content($post) {
$all_tags = get_terms(array('taxonomy' => 'voice_tag', 'hide_empty' => false));
$all_tags_of_post = get_the_terms($post->ID, 'voice_tag');
$ids = array();

if ($all_tags_of_post && !is_wp_error($all_tags_of_post)) {
foreach ($all_tags_of_post as $tag) {
$ids[] = $tag->term_id;
}
}

// HTML
echo '<div id="taxonomy-voice_tag" class="categorydiv">';
	echo '<input type="hidden" name="tax_input[voice_tag][]" value="0" />';
	echo '<ul>';
		if (!is_wp_error($all_tags)) {
		foreach ($all_tags as $tag) {
		$checked = in_array($tag->term_id, $ids) ? " checked='checked'" : "";
		$id = 'voice_tag-' . esc_attr($tag->term_id); // エスケープ処理
		echo "<li id='{$id}'>";
			echo "<label><input type='checkbox' name='tax_input[voice_tag][]' id='in-$id' value='$tag->slug' {$checked} />
				$tag->name</label><br />";
			echo "</li>";
		}
		}
		echo '</ul>
</div>'; // end HTML
}


/*-----------------------------------
投稿タイプのラベルを変更
-----------------------------------*/
function change_post_labels() {
global $wp_post_types;

// 'post' は標準の投稿タイプを指します
$post_labels = $wp_post_types['post']->labels;

// ラベルを変更します
$post_labels->name = 'ブログ';
$post_labels->singular_name = 'ブログ';
$post_labels->add_new = '新しいブログを追加';
$post_labels->add_new_item = '新しいブログを追加';
$post_labels->edit_item = 'ブログを編集';
$post_labels->new_item = '新しいブログ';
$post_labels->view_item = 'ブログを表示';
$post_labels->search_items = 'ブログを検索';
$post_labels->not_found = 'ブログが見つかりません';
$post_labels->not_found_in_trash = 'ゴミ箱にブログはありません';
$post_labels->all_items = 'すべてのブログ';
$post_labels->menu_name = 'ブログ';
$post_labels->name_admin_bar = 'ブログ';
}

// アクションフックを追加して、WordPressの初期化時にラベルを変更します
add_action('init', 'change_post_labels');


/*-----------------------------------
scf オプションページ
-----------------------------------*/
/**
* @param string $page_title ページのtitle属性値
* @param string $menu_title 管理画面のメニューに表示するタイトル
* @param string $capability メニューを操作できる権限（manage_options とか）
* @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
* @param string|null $icon_url メニューに表示するアイコンの URL
* @param int $position メニューの位置
**/
if (class_exists('SCF')) {
SCF::add_options_page( '料金一覧', '料金リスト', 'manage_options', 'theme-options' );
} else {
error_log('Smart Custom Fieldsプラグインがインストールされていないため、オプションページを追加できません。');
}



/*-----------------------------------
投稿ビュー数を カスタムフィールドpost_views_countに、記録する
-----------------------------------*/
/**
* 投稿ビュー数をカウントする関数
*
* @param int $postID 投稿ID
*/
function set_post_views($postID) {
$count_key = 'post_views_count';
$count = get_field($count_key, $postID);
if($count == ''){
$count = 0;
update_field($count_key, $count, $postID);
} else {
$count++;
update_field($count_key, $count, $postID);
}
}

function track_post_views($post_id) {
if (!is_single() || is_admin()) return; // 管理画面ではカウントしない
if (empty($post_id)) {
global $post;
$post_id = $post->ID;
}
set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');





/*-----------------------------------
ContactForm7で自動挿入されるPタグ、brタグを削除
-----------------------------------*/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
return false;
}

/*-----------------------------------
// CF7送信後にリダイレクト
-----------------------------------*/
// CF7送信後にリダイレクト
add_action('wp_footer', 'redirect_cf7');
function redirect_cf7() {
// サイトのアドレスを動的に取得
$thanks_page = home_url('/diving-lily/contact/thanks/');
?>
<script type="text/javascript">
document.addEventListener('wpcf7mailsent', function(event) {
	// PHPで生成したURLを使ってリダイレクト
	window.location.href = '<?php echo esc_url($thanks_page); ?>';
}, false);
</script>
<?php
}


// CF7送信エラー時にエラーページにリダイレクト
add_action('wp_footer', 'redirect_cf7_error');
function redirect_cf7_error() {
    // サイトのベースURLからエラーページのURLを動的に生成
    $error_page = home_url('/diving-lily/contact/error/');
    ?>
<script type="text/javascript">
document.addEventListener('wpcf7invalid', function(event) {
	// PHPで生成したURLをJavaScriptで利用
	window.location.href = '<?php echo esc_url($error_page); ?>';
}, false);
</script>
<?php
}






/*-----------------------------------
Contact Form 7 ローカルストレージにデータを保存する
-----------------------------------*/
add_action('wp_footer', 'save_cf7_data_to_localstorage');
function save_cf7_data_to_localstorage() {
    ?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
	document.querySelectorAll('.wpcf7-form input, .wpcf7-form textarea').forEach(function(input) {
		input.addEventListener('input', function() {
			localStorage.setItem(input.name, input.value);
		});
	});
});
</script>
<?php
}


/*-----------------------------------
Contact Form 7 エラーページでデータを復元する
-----------------------------------*/
add_action('wp_footer', 'restore_cf7_data_from_localstorage');
function restore_cf7_data_from_localstorage() {
    ?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
	document.querySelectorAll('.wpcf7-form input, .wpcf7-form textarea').forEach(function(input) {
		if (localStorage.getItem(input.name)) {
			input.value = localStorage.getItem(input.name);
		}
	});
});
</script>
<?php
}


/*-----------------------------------
Contact Form 7 ローカルストレージに残ったデータを削除
-----------------------------------*/

add_action('wp_footer', 'custom_cf7_local_storage_handler');
function custom_cf7_local_storage_handler() {
    ?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
	// 現在のURLが問い合わせページかを判定
	const isContactPage = window.location.pathname.includes('contact'); // "contact" を問い合わせページのスラッグに置き換えてください。

	// 問い合わせ送信成功時にローカルストレージをクリア
	document.addEventListener('wpcf7mailsent', function(event) {
		localStorage.clear();
	}, false);

	// 問い合わせページ以外でローカルストレージを削除
	if (!isContactPage) {
		localStorage.clear();
	}

	// 問い合わせページでは何もしない（データ保持）
});
</script>
<?php
}


/*-----------------------------------
CPT UIで作成したカスタム投稿のタイトルを基に、セレクトボックスを動的に生成（重複排除）
-----------------------------------*/
function filter_wpcf7_form_tag_campaign_titles( $scanned_tag, $replace ) {
  if (!empty($scanned_tag)) {
    // CF7フォームタグのname属性が "custom_menu" の場合に処理
    if ($scanned_tag['name'] == 'custom_menu') {
      // カスタム投稿タイプ 'campaign' の投稿を取得
      $posts = get_posts([
        'post_type'      => 'campaign', // カスタム投稿タイプのスラッグ
        'posts_per_page' => -1,         // 全ての投稿を取得
        'post_status'    => 'publish', // 公開済みの投稿のみ取得
        'orderby'        => 'title',   // タイトル順に並べる
        'order'          => 'ASC',     // 昇順
      ]);

      // タイトルの重複を排除するために一時的な配列を使用
      $added_titles = []; // 登録済みのタイトルを記録

			// デフォルトの選択肢を最初に追加
      $scanned_tag['values'][] = ''; // 値を空にすることで未選択状態にする
      $scanned_tag['labels'][] = 'キャンペーン内容を選択'; // ラベル（表示名）

      if (!empty($posts)) {
        foreach ($posts as $post) {
          $title = $post->post_title; // 投稿タイトル
          if (!in_array($title, $added_titles)) {
            // タイトルがまだ登録されていなければ追加
            $scanned_tag['values'][] = $post->ID;   // 選択肢の値（投稿ID）
            $scanned_tag['labels'][] = $title;      // ラベル（投稿タイトル）
            $added_titles[] = $title;              // 登録済みタイトルに追加
          }
        }
      }
    }
  }
  return $scanned_tag; // 修正済みのフォームタグを返す
}

// フィルターフックに登録
add_filter('wpcf7_form_tag', 'filter_wpcf7_form_tag_campaign_titles', 11, 2);


/*-----------------------------------
投稿本文の任意の位置にプログラム的にコンテンツを挿入
-----------------------------------*/
function insert_featured_image_into_content($content) {
    // 現在の投稿にアイキャッチ画像が設定されているか確認
    if (is_singular('post') && has_post_thumbnail()) {
        // アイキャッチ画像のHTMLを生成
        $featured_image_html = get_the_post_thumbnail(null, 'large', array('class' => 'auto-inserted-featured-image'));

        // アイキャッチ画像を本文の冒頭または中間に挿入
        // 例: 本文の最初に挿入
        //$content = $featured_image_html . $content;

        // 例: 本文の中間に挿入
        $paragraphs = explode('</p>', $content);
        array_splice($paragraphs, floor(count($paragraphs) / 2), 0, $featured_image_html);
        $content = implode('</p>', $paragraphs);
    }
    return $content;
}
add_filter('the_content', 'insert_featured_image_into_content');
