<?php 


/*ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 * CSSとJavaScriptの読み込み   1rel="preconnect"    2crossorigin
 *ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー*/
function my_script_init() {
    // wp_enqueue_style('preconnect-googleapis', 'https://fonts.googleapis.com', array(), false, 'all');
    // wp_enqueue_style('preconnect-gstatic', 'https://fonts.gstatic.com', array('preconnect-googleapis'), false, 'all');
    // wp_enqueue_style('preconnect-googleapis', 'https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&family=Kiwi+Maru:wght@400;500&display=swap', array('preconnect-gstatic'), false, 'all');
    
    
    wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1', 'all');
    wp_enqueue_style('mycss', esc_url(get_theme_file_uri('./css/style.css')), array(),false, 'all');


    // wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=', array(), '3.6.0', true);
    wp_enqueue_script('slick-js','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_script('myjs',esc_url(get_theme_file_uri('./js/script.js')), array('jquery'), false, true);
  }
  add_action('wp_enqueue_scripts', 'my_script_init');

/* --------------------------------------------
 * アイキャッチ画像を有効化する
 * -------------------------------------------- */
/**ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 * テーマのセットアップ     テーマが外観で認識される  
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
 **/
function setup_post_thumnails(){//②
	add_theme_support('post-thumbnails', ['post',]); //③テーマに機能を追加していく	第一引数にアイキャッチ画像を有効化する記述 機能を限定的に追加したい場合は第二引数に特定の投稿タイプに配列でnameを入れる はいれつでカスタム投稿タイプのみ記述するとデフォルトの投稿タイプは表示しない
	add_theme_support('post-thumbnails', ['animals']); //③テーマに機能を追加していく	第一引数にアイキャッチ画像を有効化する記述 機能を限定的に追加したい場合は第二引数に特定の投稿タイプに配列でnameを入れる はいれつでカスタム投稿タイプのみ記述するとデフォルトの投稿タイプは表示しない
	add_theme_support('post-thumbnails', ['page']); //③テーマに機能を追加していく	第一引数にアイキャッチ画像を有効化する記述 機能を限定的に追加したい場合は第二引数に特定の投稿タイプに配列でnameを入れる はいれつでカスタム投稿タイプのみ記述するとデフォルトの投稿タイプは表示しない
	add_image_size('animals', 1000, 280, true);//第一引数 読み込みページ  /  第二引数 横幅  /  第三引数 縦幅  /  第四引数 trueトリミング falseリサイズ
	add_image_size('about', 1000, 280, true);//第一引数 読み込みページ  /  第二引数 横幅  /  第三引数 縦幅  /  第四引数 trueトリミング falseリサイズ
}
add_action('after_setup_theme', 'setup_post_thumnails');//①after_setup_themeはfunctions.phpを読み込んだ後にすぐトリガー実行

/* ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 * 管理画面のdefaultの投稿タイプの名前を変更する
 * ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー*/

function Change_menulabel() {
global $menu;
global $submenu;
$name = 'ご案内';
$menu[5][0] = $name;
$submenu['edit.php'][5][0] = $name.'一覧';
$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
global $wp_post_types;
$name = 'ブログ';
$labels = &$wp_post_types['post']->labels;
$labels->name = $name;
$labels->singular_name = $name;
$labels->add_new = _x('追加', $name);
$labels->add_new_item = $name.'の新規追加';
$labels->edit_item = $name.'の編集';
$labels->new_item = '新規'.$name;
$labels->view_item = $name.'を表示';
$labels->search_items = $name.'を検索';
$labels->not_found = $name.'が見つかりませんでした';
$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );



/* ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 * the_excerpt()の抜粋する文字数を変更
 * ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー*/

// 「WP Multibyte Patch」インストール後
function new_excerpt_mblength($length){
    return 50; //抜粋する文字数を50文字に設定
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');
// 抜粋文の末尾にある文字列を変更する
function new_excerpt_more($more) {
    return ' → 続きを読む';
  }
  add_filter('excerpt_more', 'new_excerpt_more');
  
  


/* ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 * 投稿一覧を表示設定最新の投稿で６件に設定していてTOPページのお知らせは３件にしたい場合  またはsearchページの場合
 * ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー*/

// topページのみ３件にしたい場合メインクエリの制御を行う

function change_set_post($query)
{/*②change_set_postの関数を定義していく   pre_get_postsをつかうばあい$queryを使える $query メインクエリについてのオブジェクト*/
    if (is_admin() || !$query->is_main_query()) {/* ③管理画面 ||→or !→メインクエリじゃない場合  */
        return;
    }
    if ($query->is_front_page() || is_search()) {/* ④もしフロントページでリクエストしている場合 */
        $query->set('posts_per_page','3');/*⑤オブジェクトを phpのsetメソッドで posts_per_page投稿数を3に設定*/
    }
}
add_action('pre_get_posts', 'change_set_post');/*① pre_get_postsというフック（メインクエリを作動させる前のフック） change_set_postという関数を追加する*/

/* --------------------------------------------
 * 検索フォームのHTML5仕様
 * -------------------------------------------- */
function setup_html5_form(){
	add_theme_support('html5', ['search-form']);
}
add_action('after_setup_theme', 'setup_html5_form');





/* ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 * アクセス数を取得とアクセスカウンターをadd_actionする
 * ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー*/

/**
* カスタムフィールドを使ってアクセス数を取得する（特定記事のアクセス数確認用）
*
* @param integer $id 投稿id.
* @return void
*/
//アクセス数を取得
function get_post_views( $id = 0 ){
  global $post;
  //引数が渡されなければ投稿IDを見るように設定
  if ( 0 === $id ) {
  $id = $post->ID;
  }
  $count_key = 'view_counter';
  $count = get_post_meta($id, $count_key, true);
  
  if($count === ''){
  delete_post_meta($id, $count_key);
  add_post_meta($id, $count_key, '0');
  }
  return $count;
  }
  
  /**
  * アクセスカウンター
  *
  * @return void
  */
  function set_post_views() {
  global $post;
  $count = 0;
  $count_key = 'view_counter';
  
  if($post){
  $id = $post->ID;
  $count = get_post_meta($id, $count_key, true);
  }
  
  if($count === ''){
  delete_post_meta($id, $count_key);
  add_post_meta($id, $count_key, '1');
  }elseif( $count > 0 ){
  if(!is_user_logged_in()){ //管理者（自分）の閲覧を除外
  $count++;
  update_post_meta($id, $count_key, $count);
  }
  }
  //$countが0のままの場合（404や該当記事の検索結果が0件の場合）は何もしない。
  }
  add_action( 'template_redirect', 'set_post_views', 10 );


