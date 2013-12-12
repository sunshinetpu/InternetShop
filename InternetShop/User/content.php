<?php

$page = (isset($_GET['page']) && $_GET['page'] != NULL) ? $_GET['page'] : "";

switch ($page)
{   case 'cart':
        require 'cart.php';
        break;
    case 'createOrder':
        require 'CreateOrder.php';
        break;
    case 'admin':
        require 'admin.php';
        break;
    case 'listOrder':
        require 'listOrder.php';
        break;
    case 'listProduct':
        require 'listProduct.php';
        break;
	case 'delivery':
		require 'delivery.php';
		break;
	case 'aboutUs':
		require 'aboutUs.php';
		break;
	case 'gallery':
		require 'gallery.php';
		break;
    default:
        require 'pizzas.php';
        break;
}
?>
