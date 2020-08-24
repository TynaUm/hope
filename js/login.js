$(function () {

    $("#chkBox").click(function() {
 
        var type=$("#passwort").attr("type");
        //var x = document.getElementById("passwort");
        //if (x.type === "password") {
        if (type==="password"){
            $("#passwort").attr("type","text");
            //x.type = "text";
        } else {
            $("#passwort").attr("type","password");
            //x.type = "password";
        }
    });

});

/*
function myFunction() {
    var x = document.getElementById("passwort");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }  
}
*/


