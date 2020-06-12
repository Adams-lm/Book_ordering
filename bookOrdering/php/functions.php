<?php
function page_redirect($category,$url,$info){
    echo "<script>";
    echo "alert('".$info."');";
    if($category==1){
        echo "window.location=\"$url\";";
    }
    else{
        echo "window.history.back();";
    }
    echo "</script>";
    die();
}
function showAlert($str){
    echo "<script>";
    echo "alert('".$str."');";
    echo "</script>";
}
function pageLocator($path){
    echo "<script>";
    echo "window.location='".$path."';";
    echo "</script>";    
}
?>