<?php defined('IN_CMS') or die('No direct access allowed.');

/**
	ADMIN Theme functions - happy templating!
*/

/**
	Posts
*/
function has_posts() {
	if(($posts = IoC::resolve('posts')) === false) {
		$params['sortby'] = 'id';
		$params['sortmode'] = 'desc';
		
		$posts = Posts::list_all($params);
		IoC::instance('posts', $posts, true);
	}
	
	return $posts->length() > 0;
}

function posts($params = array()) {
	if(has_posts() === false) {
		return false;
	}
	
	$posts = IoC::resolve('posts');

	if($result = $posts->valid()) {	
		// register single post
		IoC::instance('post', $posts->current(), true);
		
		// move to next
		$posts->next();
	}

	return $result;
}

function post_id() {
	if($itm = IoC::resolve('post')) {
		return $itm->id;
	}
	
	return '';
}

function post_title() {
	if($itm = IoC::resolve('post')) {
		return $itm->title;
	}
	
	return '';
}

function post_slug() {
	if($itm = IoC::resolve('post')) {
		return $itm->slug;
	}
	
	return '';
}

function post_url() {
	if($itm = IoC::resolve('post')) {
		$page = IoC::resolve('postspage');
		return '/' . $page->slug . '/' . $itm->slug;
	}
	
	return '';
}

function post_description() {
	if($itm = IoC::resolve('post')) {
		return $itm->description;
	}
	
	return '';
}

function post_html() {
	if($itm = IoC::resolve('post')) {
		return $itm->html;
	}
	
	return '';
}

function post_css() {
	if($itm = IoC::resolve('post')) {
		return $itm->css;
	}
	
	return '';
}

function post_js() {
	if($itm = IoC::resolve('post')) {
		return $itm->js;
	}
	
	return '';
}

function post_date() {
	if($itm = IoC::resolve('post')) {
		return date(Config::get('metadata.date_format'), $itm->created);
	}
	
	return '';
}

function post_time() {
	if($itm = IoC::resolve('post')) {
		return $itm->created;
	}
	
	return '';
}

function post_author() {
	if($itm = IoC::resolve('post')) {
		return $itm->author;
	}
	
	return '';
}

function post_status() {
	if($itm = IoC::resolve('post')) {
		return $itm->status;
	}

	return '';
}

/**
	Users
*/
function users($params = array()) {
	if(($users = IoC::resolve('users')) === false) {
		$users = Users::list_all($params);
		IoC::instance('users', $users, true);
	}

	if($result = $users->valid()) {	
		// register single post
		IoC::instance('user', $users->current(), true);
		
		// move to next
		$users->next();
	}

	return $result;
}

function user_id() {
	if($itm = IoC::resolve('user')) {
		return $itm->id;
	}
	
	return '';
}

function user_name() {
	if($itm = IoC::resolve('user')) {
		return $itm->username;
	}
	
	return '';
}

function user_real_name() {
	if($itm = IoC::resolve('user')) {
		return $itm->real_name;
	}
	
	return '';
}

function user_bio() {
	if($itm = IoC::resolve('user')) {
		return $itm->bio;
	}
	
	return '';
}

function user_status() {
	if($itm = IoC::resolve('user')) {
		return $itm->status;
	}
	
	return '';
}

function user_role() {
	if($itm = IoC::resolve('user')) {
		return $itm->role;
	}
	
	return '';
}

/**
	Logged in user
*/
function user_authed() {
	return Users::authed() !== false;
}

function user_authed_id() {
	if(user_authed()) {
		return Users::authed()->id;
	}
	
	return '';
}

function user_authed_realname() {
	if(user_authed()) {
		return Users::authed()->real_name;
	}
	
	return '';
}

/**
	Article
*/
function article_id() {
	if($itm = IoC::resolve('article')) {
		return $itm->id;
	}
	
	return '';
}

function article_title() {
	if($itm = IoC::resolve('article')) {
		return $itm->title;
	}
	
	return '';
}

function article_slug() {
	if($itm = IoC::resolve('article')) {
		return $itm->slug;
	}
	
	return '';
}

function article_description() {
	if($itm = IoC::resolve('article')) {
		return $itm->description;
	}
	
	return '';
}

function article_html() {
	if($itm = IoC::resolve('article')) {
		return $itm->html;
	}
	
	return '';
}

function article_css() {
	if($itm = IoC::resolve('article')) {
		return $itm->css;
	}
	
	return '';
}

function article_js() {
	if($itm = IoC::resolve('article')) {
		return $itm->js;
	}
	
	return '';
}

function article_created() {
	if($itm = IoC::resolve('article')) {
		return $itm->created;
	}
	
	return '';
}

function article_author() {
	if($itm = IoC::resolve('article')) {
		return $itm->author;
	}
	
	return '';
}

function article_status() {
	if($itm = IoC::resolve('article')) {
		return $itm->status;
	}
	
	return '';
}

/**
	Pages
*/
function has_pages() {
	if(($pages = IoC::resolve('pages')) === false) {
		$pages = Pages::list_all();
		IoC::instance('pages', $pages, true);
	}
	
	return $pages->length() > 0;
}

function pages($params = array()) {
	if(has_pages() === false) {
		return false;
	}
	
	$pages = IoC::resolve('pages');

	if($result = $pages->valid()) {	
		// register single post
		IoC::instance('page', $pages->current(), true);
		
		// move to next
		$pages->next();
	}

	return $result;
}

function page_id() {
	if($itm = IoC::resolve('page')) {
		return $itm->id;
	}
	
	return '';
}

function page_slug() {
	if($itm = IoC::resolve('page')) {
		return $itm->slug;
	}
	
	return '';
}

function page_name() {
	if($itm = IoC::resolve('page')) {
		return $itm->name;
	}
	
	return '';
}

function page_title() {
	if($itm = IoC::resolve('page')) {
		return $itm->title;
	}
	
	return '';
}

function page_content() {
	if($itm = IoC::resolve('page')) {
		return $itm->content;
	}
	
	return '';
}

function page_status() {
	if($itm = IoC::resolve('page')) {
		return $itm->status;
	}
	
	return '';
}

/**
	notifications
*/
function notifications() {
	return Notifications::read();
}

/**
	Main menu
*/
function admin_menu() {
	$pages = array(
		'Posts' => 'admin/posts', 
		'Pages' => 'admin/pages',
		'Users' => 'admin/users',
		'Metadata' => 'admin/metadata'
	);
	
	return $pages;
}

/**
	Meta data
*/
function site_name() {
	return Config::get('metadata.sitename');
}
function site_description() {
	return Config::get('metadata.description');
}
function twitter_account() {
	return Config::get('metadata.twitter');
}
function current_theme() {
	return Config::get('metadata.theme');
}

function replace($what) {
    return str_replace(PATH . 'themes/', '', $what);
}


/**
	Url helpers
*/
function theme_url($file = '') {
	return Config::get('application.base_url') . 'system/admin/theme/' . ltrim($file, '/');
}

function current_url() {
	return Url::current();
}

function menu_url() {
    return Request::uri();
}

function base_url($url = '') {
    return Url::make($url);
}

/**
	Pagination
*/
function pagination() {
	// @todo: generate pagaination for posts, pages and users
	return '';
}

/**
	String helpers
*/
function pluralise($amount, $str, $alt = '') {
    return $amount === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function truncate($str, $limit = 10, $elipse = ' [...]') {
	$words = preg_split('/\s+/', $str);

	if(count($words) <= $limit) {
		return $str;
	}

	return implode(' ', array_slice($words, 0, $limit)) . $elipse;
}
	
/**
    Error checking
*/
function latest_version() {
	// returns plain text string with version number or 0 on failure.
	return floatval(Curl::get('http://anchorcms.com/version'));
}

function error_check() {
	// only run the check once per session
	if(($check = Session::get('check', 'not_checked')) !== 'not_checked') {
		return $check;
	}

    $errors = array();

    //  Check the uploads folder is writable.
    if(!is_writable(PATH . 'uploads')) {
        $errors[] = 'The <code>uploads</code> folder is not writable.';
    }
    
    //  Check for older versions
    if(ANCHOR_VERSION < latest_version()) {
        $errors[] = 'Your version of Anchor is out of date. Please <a href="http://anchorcms.com">download the latest version</a>.';
    }
    
    //  And I can't think of anything else.
    if(1 !== 1) {
        $errors[] = 'PHP can&rsquo;t do math properly. The sky is falling. Get inside, quick!';
    }
    
    // outcome
    $result = (count($errors) ? $errors : false);
    
    // save to session
    Session::set('check', $result);
    
    // do something useful with it
    return $result;
}
