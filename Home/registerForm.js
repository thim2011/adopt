var myApp = {

    register : function() {

        param = $("#registration_form").serialize();
        $.post("../BLL/Users/register.php", 
            param, 
            function (data, status) {
                if (status  === "success" && data.status === "success") {
                        alert("注冊成功!");
                        window.location.href = "../Home/login.php";
                } 
                else {
                    alert("注冊異常!或者已有相同賬號");
                }
            },
            "json");
    }
};

//------------------------------------------------------------------------------
$(function() {
    $("#subBtn").click( myApp.register );
}); 