<?php

define("WPL_RUN",1);
//ob_start();

// load bootstrap
require_once('boot.php');

// Start Slim.
$app = new Slim(array(
	'view' => new TwigView
));



// Auth Check.
$authCheck = function() use ($app) {
	$authRequest 	= isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
	$authUser 		= $authRequest && $_SERVER['PHP_AUTH_USER'] === USERNAME;
	$authPass 		= $authRequest && $_SERVER['PHP_AUTH_PW'] === PASSWORD;

	if (! $authUser || ! $authPass) {
		$app->response()->header('WWW-Authenticate: Basic realm="My Blog Administration"', '');
		$app->response()->header('HTTP/1.1 401 Unauthorized', '');
		$app->response()->body('<h1>Please enter valid administration credentials</h1>');
		$app->response()->send();
		exit;
	}
};



// Homepage.

$app->get('/', function() use ($app) {
	$ayas = R::getAll('SELECT * FROM quran WHERE `riwaya` = :rw AND `sura` = :id',array(':rw'=>1,':id'=>57));
//var_dump($q);
//exit;

	//$ayas = (json_encode($ayas));

	$app->render('ayas.json', array('ayas' => $ayas));		
});


    metaQuran::init();
//--------------------------------------------------------------------------------------------
// Ayas
$app->get('/(:key)/aya/(:id)/to/(:nbr)', function($key,$id,$nbr) use ($app) {
	$ayas = ForkanData::getAya(array('id'=>$id,'nbr'=>$nbr,'rw'=>1));

	$app->render('ayas.json', array('ayas' => $ayas));		
});

// Single Aya
$app->get('/(:key)/aya/(:id)', function($key,$id) use ($app) {
	$ayas = ForkanData::getAya(array('id'=>$id,'nbr'=>1,'rw'=>1));

	$app->render('ayas.json', array('ayas' => $ayas));		
});




//--------------------------------------------------------------------------------------------
// Suras .
$app->get('/(:key)/sura', function() use ($app) {
	$suras = ForkanData::getSura();
//var_dump($suras);
	$app->render('suras.json', array('suras' => $suras));	
});


//--------------------------------------------------------------------------------------------
// Page .
$app->get('/(:key)/page', function() use ($app) {
	$pages = ForkanData::getPage();
//var_dump($suras);
	$app->render('pages.json', array('pages' => $pages));	
});


// Admin Home.
$app->get('/admin', $authCheck, function() use ($app) {
	$articles = Model::factory('Forkan')
					->order_by_desc('timestamp')
					->find_many();
					
	return $app->render('admin_home.html', array('articles' => $articles));
});

// Admin Add.
$app->get('/admin/add', $authCheck, function() use ($app) {
	return $app->render('admin_input.html', array('action_name' => 'Add', 'action_url' => '/admin/add'));
});	

// Admin Add - POST.
$app->post('/admin/add', $authCheck, function() use ($app) {
	$article 			= Model::factory('Article')->create();
	$article->title 	= $app->request()->post('title');
	$article->author 	= $app->request()->post('author');
	$article->summary 	= $app->request()->post('summary');
	$article->content 	= $app->request()->post('content');
	$article->timestamp = date('Y-m-d H:i:s');
	$article->save();
	
	$app->redirect('/admin');
});

// Admin Edit.
$app->get('/admin/edit/(:id)', $authCheck, function($id) use ($app) {
	$article = Model::factory('Article')->find_one($id);
	if (! $article instanceof Article) {
		$app->notFound();
	}	
	
	return $app->render('admin_input.html', array(
		'action_name' 	=> 	'Edit', 
		'action_url' 	=> 	'/admin/edit/' . $id,
		'article'		=> 	$article
	));
});

// Admin Edit - POST.
$app->post('/admin/edit/(:id)', $authCheck, function($id) use ($app) {
	$article = Model::factory('Article')->find_one($id);
	if (! $article instanceof Article) {
		$app->notFound();
	}
	
	$article->title 	= $app->request()->post('title');
	$article->author 	= $app->request()->post('author');
	$article->summary 	= $app->request()->post('summary');
	$article->content 	= $app->request()->post('content');
	$article->timestamp = date('Y-m-d H:i:s');
	$article->save();
	
	$app->redirect('/admin');
});

// Admin Delete.
$app->get('/admin/delete/(:id)', $authCheck, function($id) use ($app) {
	$article = Model::factory('Article')->find_one($id);
	if ($article instanceof Article) {
		$article->delete();
	}
	
	$app->redirect('/admin');
});


function getConnection() {
	$dbhost="127.0.0.1";
	$dbuser="root";
	$dbpass="1723";
	$dbname="skybook";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
};

// Slim Run.
$app->run();