var myApp = {
    Login: function(){
        $serialize = $('#login_form').serialize();
        $.post( "../BLL/Users/loginCheck.php", function( data ) {
            console.log($serialize);
        });
    },
    onVisitor : function() {
        // 直接導航到user/index.php
        console.log("onVisitor");
        location.href = "../user/index.php";
    }
    
};

//------------------------------------------------------------------------------
$(function() {
    $("#loginBtn").click( myApp.Login );
    $("#visitBtn").click( myApp.onVisitor );
});