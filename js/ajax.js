
function sendmail()
{
    $("#send_massage").css("display","block");
    $.ajax({
        url:"Email/swiftmailer_email.php",
        type:"POST",
        async:true,
        data: $("#form_data").serialize(),
        success: function(data){
            
            $("#send_massage").css("display","none");
            $("#result").fadeIn();
                $("#result").html(data);
                clearAll();
            setTimeout(function(){
                $("#result").fadeOut(); 
                
            },4000);
            
        }
    });
}
 function clearAll(){
   
    $("#username").val("");
    $("#email").val("");
    $("#subject").val("");
    $("#comment").val("");
}