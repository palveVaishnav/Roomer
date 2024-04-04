<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        require_once('./pgConfig.php');
        $reply = $_POST['reply'];
        // echo $reply;
        $mid = htmlspecialchars($_GET['id']);
        $query = "UPDATE contact SET m_reply=$1 WHERE m_id=$2";
        $params = array($reply, $mid);
        $result = pg_query_params($conn, $query, $params);
        if(!$result){
            echo "error while replying";
        }else{
            echo "Updated replied";
            header("Location: dash.php");
        }
        echo $mid;
    }

?>