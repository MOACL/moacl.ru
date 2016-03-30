<?//единый футер
?>

<footer data-role = "footer" data-position = "fixed">

    <?
//echo $_SERVER['PHP_SELF'];
    switch($_SERVER['PHP_SELF']){

        case '/moacl.ru/main/money/moacl_money.php':
            $navbar = <<<CODE
        <div data-role="navbar">
            <ul>
                <li><a data-theme="a" href="moacl_money_transactions.php" data-ajax = "false">Transactions</a></li>
                <!--<li><a data-theme="a" href="#">Analytics</a></li>-->
            </ul>
        </div><!-- /navbar -->
CODE;
        break;

        case '/moacl.ru/main/money/moacl_money_transactions.php':
            $navbar = <<<CODE
        <div data-role="navbar">
            <ul>
                <li><a data-theme="b" href="moacl_money.php" data-ajax = "false">New transact</a></li>
                <li><a data-theme="b" href="#">Analytics</a></li>
            </ul>
        </div><!-- /navbar -->
CODE;
            break;

        case '/moacl.ru/main/contacts/moacl_contacts.php':
            $navbar = <<<CODE
        <div data-role="navbar">
				<ul>
					<li><a data-theme="b" href="moacl_contacts_contactlist.html" data-ajax = "false">Contacts</a></li>
					<li><a data-theme="b" href="#">Detail</a></li>
				</ul>
			</div><!-- /navbar -->
CODE;
            break;
        default:
            $navbar = '';

    }
    if ($navbar != '') {
        echo $navbar;
    };
    ?>

    <h1>
        <a  href="http://moacl.ru"><?php echo 'moacl.ru (c) '; $a = getdate(); echo $a['year']; ?></a>

    </h1>
</footer>