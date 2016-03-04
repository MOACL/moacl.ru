<?php
//запрет на прямое обращение к файлу
if ( basename($_SERVER['SCRIPT_FILENAME']) == 'main_access.php' )
    die (require_once 'access_denied.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>MOACL</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
    <link href="plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/moacl_style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="themes/moacl_2.min.css" />
    <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
</head>

<body>
<section id="title_unreg" data-role = "page" data-position = "fixed" >
    <?require_once 'header.php'?>

        <div id = "main" class="content moacl-common" data-role = "content" data-position = "fixed">
            <button id ="to_fin_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-clock ui-btn-icon-top" data-href = "main/money/moacl_money.php" >Money</button>
            <button disabled ="" id ="to_obj_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-eye ui-btn-icon-top" data-href = "main/objects/moacl_objects.php" >Objects</button>
            <button disabled ="" id ="to_act_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-action ui-btn-icon-top" data-href = "main/activities/moacl_activities.php" >Activities</button>
            <button disabled id ="to_contacts_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-bullets ui-btn-icon-top" data-href = "contacts.php" >Contacts</button>
            <button disabled id ="to_love_btn" class ="ui-btn ui-btn-b ui-shadow ui-corner-all ui-icon-heart ui-btn-icon-top" data-href = "love.php" >Love</button>
        </div>

    <?require_once 'footer.php'?>
    <div data-role="popup" id="UserMenu" data-theme="a" style="min-width:10em; line-height: 0;">
        <ul data-role="listview" data-inset="true" >
            <li data-role="list-divider" style = "text-align: center;"><? echo $auth->getUserName()?></li>
            <li><a href="#">Profile</a></li>
            <li id = "to_exit_btn" data-href = "logout.php"><a>Exit</a></li>

        </ul>
    </div>
</section>
</body>

<script>
    $(document).ready(function(){
        $("#to_contacts_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_love_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_fin_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_obj_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_act_btn").click( function(){location.href = $(this).attr("data-href");});
        $("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});
    });
</script>