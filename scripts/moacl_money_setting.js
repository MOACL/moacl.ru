/**
 * Created by Dmitry on 22.03.2016.
 */

$(document).ready(
    function(){
        //1.load of accounts
        combobox_load(false,"account", "Account", "getaccounts.php", 0);
        //comboboxCatItem();

        var $revenue;
        $revenue = $('input[name=radio_tt]:checked').val();

        combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue, 0);

        combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val(), 0);

         $("#to_exit_btn").click( function(){location.href = $(this).attr("data-href");});

});

$("#category").change(function(){
    combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val(), 0);
});

$('input[type="radio"]').change( function() {
    var $revenue;
    $revenue = $('input[name=radio_tt]:checked').val();

    combobox_load(false,"category","Category", "getcategories.php?revenue=" + $revenue, 0);
    combobox_load(false, "item","Item", "getitems.php?category_id=" + $("#category").val(), 0);

});
