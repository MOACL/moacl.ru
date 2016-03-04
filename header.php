<? //единый хэдер
?>
<header data-role = "header">
        <h1>MOACL</h1>
     <?
        //echo $_SERVER['PHP_SELF'];
        switch($_SERVER['PHP_SELF']){

        case '/moacl.ru/registration.php':
        $navbar = <<<CODE
        	<a href="javascript:history.back()" data-icon="back" data-iconpos="notext">Back</a>
				<script type="text/javascript" src="scripts/registration.js"></script>
CODE;
        break;

        case '/moacl.ru/main.php':
        $navbar = <<<CODE
        	<a href="#UserMenu" data-rel="popup" data-transition="pop" data-icon="user" data-iconpos="notext">User</a>
CODE;
        break;
        case '/moacl.ru/access_denied.php':
        $navbar = <<<CODE
        	<a href="javascript:history.back()" data-icon="back" data-iconpos="notext">Back</a>
CODE;
        break;
        case '/moacl.ru/about.php':
         $navbar = <<<CODE
        	<a href="javascript:history.back()" data-icon="back" data-iconpos="notext">Back</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_transaction.php':
         $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_items.php':
                        $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_categories.php':
                        $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_accounts_new.php':
                        $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_accounts_current.php':
                        $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_accounts.php':
                        $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money.php':
                        $navbar = <<<CODE
        	<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
            <a href="moacl_money_setting.php" data-ajax = "false" data-icon="gear" data-iconpos="notext right">Menu</a>
CODE;
        break;
        case '/moacl.ru/main/money/moacl_money_setting.php':
                        $navbar = <<<CODE
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="moacl_money.php" data-ajax = "false" data-icon="gear" data-iconpos="notext right">Setting</a>
CODE;
        break;


        default:
        $navbar = '';

        }
        if ($navbar != '') {
        echo $navbar;
        };
        ?>

</header>

