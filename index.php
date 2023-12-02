<?php
include("./confing.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function aj() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chat").innerHTML = this.responseText;
                }
            };
        req.open("GET", "chat.php", true);
        req.send();
        }
        setInterval(function () { aj()}, 1000)
    </script>
    <title>Chatkom │ شات.كوم</title>
</head>

<body onload="aj();" class="bg-black text-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-dark-subtle">
        <div class="container">
            <a class="navbar-brand fs-2 fw-bolder" href="#">Chatkom │ شات.كوم</a>
            <a href="" class="text-decoration-none fw-bold fs-5 text-light">About us </a>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="main-div d-flex justify-content-center mt-5 border border-1 border-primary rounded-3 row flex-column p-3">
                <div class="chat-box bg-body-secondary rounded-2 text-black">
                    <div id="chat"></div>

                </div>
                <form action="index.php" method="POST" class="row align-items-center justify-content-center">
                    <div class="form-group row align-items-center justify-content-center">
                        <input type="text" name="Name" class="form-control mt-3" placeholder="your Name">
                        <textarea type="text" name="Msg" class="form-control mt-3" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" name="submit" value="Send" class="btn btn-primary mt-4 w-25">Send</button>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $Name = $_POST["Name"];
                    $Msg = $_POST["Msg"];
                    $insert = "INSERT INTO chat (Name, Msg) VALUES ('$Name','$Msg')";
                    $insert_run = mysqli_query($conn, $insert);
                    if($insert_run){
                        echo '<embed loop="false" hidden="true" src="send-sound.mp3" autoplay="true"';
                    }
                    header('location: index.php');
                };
                ?>
            </div>
        </div>
    </main>
</body>

</html>