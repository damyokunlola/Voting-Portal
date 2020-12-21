$($pwd,$Cpwd).on('keyup', function(){

if( $('#pwd').val()!= $('#Cpwd').val()){
    $('#message')="password and confirm password not match";
    
}

});