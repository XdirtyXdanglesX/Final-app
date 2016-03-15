var server = "http://192.168.0.39/fakebook/www/";

function registerResponse(resp){
    $('#loadUser').html(resp);
    
}
function register() {
    var data={
        username: $("#username").val(),
        password: $("#password").val()
    }
    
    $.post( server+'register.php', data,registerResponse);
    
    
}

function signIn() {
    var data={
        username: $("#username").val(),
        password: $("#password").val()
        
    }
    try{
        $.get(server+'signIn.php',function(res){
            console.log(res);
        });
    }catch(ex){
        console.log(ex);
    }
    
    $.post( server+'signIn.php', data,loginResponse);
  
}

function loginResponse(resp){
    console.log(resp)
    if (resp=='cats') {
        $.mobile.navigate("#feed");
    }
}

function signUp(resp){
    $.mobile.navigate("#signUp");
    }

function back(resp){
    $.mobile.navigate("#signIn");
    }

