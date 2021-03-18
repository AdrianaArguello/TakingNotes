<?php
    session_start();
    include('connection.php');

    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM notes WHERE note=''";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-warning">Ha ocurrido un error!</div>'; exit;
    }

    //run a query to look for notes corresponding to user_id
    $sql = "SELECT * FROM notes WHERE user_id ='$user_id' ORDER BY time DESC";

    //shows notes or alert message
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $note_id = $row['id'];
                $note = $row['note'];
                $time = $row['time'];
                $time = date("F d, Y h:i:s A", $time);

                echo "<div class='card m-2 col-lg-5 note'>
                        <div class='card-body row'>
                            <div class='col-9 noteheader' id='$note_id'>
                                <div class='text'>$note</div>
                                <div class='timetext'>$time</div>
                            </div>
                            <div class='col-3 delete' style='padding: 0 !important;'>
                                <button class='btn btn-danger' style='width:100%; align-self: center;'><i class='fas fa-trash-alt'></i></button>
                            </div>
                            <div class='noteheader' id='$note_id'></div>
                        </div>
                    </div>";
            }
        }else{
            echo '<div class="alert alert-warning">Todavía no has creado ninguna nota!</div>'; exit;
        }
        
    }else{
        echo '<div class="alert alert-warning">Ha ocurrido un error!</div>'; exit;
    }
?>