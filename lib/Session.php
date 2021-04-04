<?php
class Session {
    
    public static function init(){
        session_start();
    }
    
    public static function set($key, $val){
        $_SESSION[$key]= $val;
    }
    
    public static function get($key){
        
        if(isset( $_SESSION[$key])){
            return  $_SESSION[$key];
        }else{
            return false;
        }
    }
    
    public static function checkSession(){
        if(self::get('usrlogin')== false){
            self::destroy();
           echo "<script>window.location = 'login.php'</script>";
        }
    }

    public static function checkCmrSession(){
        if(self::get('cmrlogin')== false){
            self::destroy();
            echo "<script>window.location = 'register.php'</script>";
        }
    }
    public static function checkLogin(){
        if(self::get('usrlogin')== true){
            header("Location: index.php");
        }
    }

    public static function checkCmrLogin(){
        if(self::get('cmrlogin')== true){
            echo "<script>window.location = 'cart.php'</script>";
        }
    }
        
    public static function destroy(){
        session_destroy();
    }
    
    
}