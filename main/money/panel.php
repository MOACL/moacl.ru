<div data-role="panel" data-position-fixed="true" data-display="push" data-theme="a" id="nav-panel">
    <ul data-role="listview">
        <li data-role="list-divider" style = "text-align: center">
            <?
            $auth = New Authentication;
            $userName = $auth->getUserName();
            unset($auth);
            echo $userName;
            ?>
        </li>
        <li><a href="#">Profile</a></li>
        <li id = "to_exit_btn" data-href = "../../logout.php"><a>Exit</a></li>
        <li data-theme="b"><a data-ajax = "false" href="#">Objects</a></li>
        <li data-theme="b"><a data-ajax = "false" href="#">Activities</a></li>
        <li data-theme="b"><a data-ajax = "false" href="#">Contacts</a></li>
        <li data-theme="b"><a data-ajax = "false" href="#">Love</a></li>

    </ul>
</div><!-- /panel -->