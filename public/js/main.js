var main = {
    init: function () {
        var me = main;
        jQuery(document).on('click','.add_custom_button',me.addCustomButtonOnClick);
    },
    addCustomButtonOnClick: function(e) {
        e.preventDefault();
        var row = jQuery(this).parents('.container-fluid:first').find('.row:first');
        //append row
        jQuery(row).after("<div class='row'>" + row.html() + "</div>");
    }
}

jQuery(document).ready(main.init);