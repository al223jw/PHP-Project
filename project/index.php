<?php

session_start();

//INCLUDE THE FILES NEEDED...
require_once('controller/Mastercontroller.php');
require_once('controller/loginController.php');
require_once('controller/Registercontroller.php');
require_once('controller/Bookcontroller.php');

require_once('model/loginModel.php');
require_once('model/RegisterModel.php');
require_once('model/User.php');
require_once('model/UserDAL.php');
require_once('model/BookModel.php');
require_once('model/Book.php');
require_once('model/BookDAL.php');

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('view/SchemeView.php');
require_once('view/BookView.php');
require_once('view/NotificationView.php');




//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$uDAL = new UserDAL();
$bDAL = new BookDAL();

//CREATE OBJECTS OF THE VIEWS
$lm = new LoginModel($uDAL);
$rm = new RegisterModel($uDAL);
$bm = new BookModel($bDAL);

$v = new LoginView($lm);
$rv = new RegisterView();
$dtv = new DateTimeView();
$lv = new LayoutView();
$sv = new SchemeView($lv);
$bv = new BookView($sv);
$nv = new NotificationView();

$loginController = new LoginController($v, $lm);
$registerController = new RegisterController($rv, $rm);
$bookController = new BookController($sv, $bv, $bm, $nv);

$masterController = new MasterController($loginController, $registerController, $bookController);
$masterController->init();

$lv->render($lm->getLoginStatus(), $v, $dtv, $rv, $sv, $bv, $nv);



