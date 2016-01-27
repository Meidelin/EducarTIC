$("#registro").ready(function(){
  
    $("#pass2").bind('keypress',function(e){
        
        $a=e.keyCode;
        
        alert($a);
        
        $pass=$("#pass").val();
        
        
        if($pass === ($("#pass2").val()+String.fromCharCode($a))){
            $("#seguro").css('visibility', 'visible');
            $("#seguro").val("hola");
        }else{
            $("#seguro").val("asd");
        }
          
        }
              
    );

}); 