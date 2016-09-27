<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>




 <!--Стиль: красная кнопка -->
 <style>
   .StyleColorRed {
    background: #d40a0a; /* Красный цвет фона */ 
    color: white; /* Белые буквы */ 
    font-size: 20pt; /* Размер шрифта в пунктах */
   }
  </style>



 <script>
   function isMyFunction() {
    
    /* Определяем время и адрес клиента */
    var DateTimeClient = new Date();
    var jsVarIPClient = "<?php echo $_SERVER['REMOTE_ADDR'] ?>";

    /* Определяем время и адрес сервера */
    var DateTimeServer = "<?php echo date("H:i:s") ?>";
    var jsVarIPServer = "<?php 
                          $eth = "eth0"; //используемый сетевой интерфейс сервера
                          $ips = "ip a s $eth | grep \"inet\" | cut -d \"/\" -f 1 | cut -c 10-"; //формируем команду для запроса
                          Ob_start();
                          passthru ($ips);
                          $ip = ob_get_contents(); //тут сервер вернул нам строчку в которой содержаться его ip адреса.                     
                          ob_end_clean();
                          $iip = explode("\n", $ip); //получаем массив данных из переменной $ip
                          echo $iip[0]; //отображение IP сервера, массив данных берется из переменной $ip, порядок номеров IP адресов от нуля и выше(по умолчанию 0 в переменной $iip[0]).
                          ?>"; 

    /* alert(d.toLocaleTimeString()); */


    /* Выводим время и адрес клиента */
    document.getElementById("MyTimeClient").innerHTML=DateTimeClient.toLocaleTimeString();
    document.getElementById("MyAdressClient").innerHTML=jsVarIPClient;


    /* Выводим время и адрес сервера */
    document.getElementById("MyTimeServer").innerHTML=DateTimeServer;
    document.getElementById("MyAdressServer").innerHTML=jsVarIPServer;

    /* Запретим пользователю нажимать на эту кнопку и покрасим ее в зеленый цвет */
    document.getElementById("mybutton").innerHTML="Кнопка уже нажата";
    document.getElementById("mybutton").style.backgroundColor = "green";
    document.getElementById("mybutton").disabled = 'true';   
   }
  </script>




<!--Кроссбраузерное создание объекта запроса -->
<script Language="JavaScript">

 function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}


<!--Асинхронный вызов -->
function AJAXButton() {

var CurrentDateTime = new Date();
var CurrentTime = "Время на клиенте: " + CurrentDateTime.getHours()+':'+ CurrentDateTime.getMinutes() + ':' + CurrentDateTime.getSeconds()+ '  ';
var xmlhttp = getXmlHttp()

xmlhttp.open('GET', '/wp-content/themes/twentytwelve/testajax.php', true);
xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4) {
     if(xmlhttp.status == 200) {
       alert(CurrentTime + xmlhttp.responseText); 
         }
  }
};
xmlhttp.send(null);
}

</script>






<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>




<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">