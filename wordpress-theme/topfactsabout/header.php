<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="header container">
            <a href="<?php echo home_url();?>" class="header__title">ten or more facts</a>
            <a href="index.php?random=1" class="header__random-button">Random Fact</a>
            <div class="header__socials">
                <a href="#" class="header__social header__social--vk">VK</a>
                <a href="#" class="header__social header__social--fb">FB</a>
                <a href="#" class="header__social header__social--ig">IG</a>
            </div>
        </div>
        <hr class="header__hr">
        <nav>
            <ul class="header__categories">
            <?php wp_nav_menu(array(
				'theme_location'=>'header-menu'
			) );?>
            </ul>
        </nav>
    </header>