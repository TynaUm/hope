
$(document).ready(function(){
    $("select.charity_event").change(function(){
        var selectedprojekt = $(".charity_event option:selected").val();
        $.ajax({
            type: "POST",
            url: "process-request.php",
            data: { charity_event : selectedprojekt } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});





