<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/chat.css">
    <style>
        .main_page {
            height: auto;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
        }

        form {
            background: inherit;
            padding: 20px;
            border-radius: 10px;
        }

        textarea {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        input[type="text"],
        input[type="email"] {
            width: 40%;
            padding: 15px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: center;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
        require_once ('../components/leftIndex.php');
        if(!isset($_SESSION['userId'])){
            header("Location: login.php");
            exit;
        }

    ?>

    <div class="main_page">
        <div class="container">
            <h2 class="confirmMessage" >Contact Us</h2>
            <form method="post" id="contactForm">
                <!-- <label for="name">Name:</label> -->
                <input type="text" id="name" name="name" placeholder="Enter Name" required>

                <!-- <label for="email">Email:</label> -->
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
                <br><br>
                <!-- <label for="message">Message:</label><br> -->
                <textarea id="message" name="message" placeholder="Write Message Here.." style="height:500px"
                    required></textarea>
                <br>
                <input type="submit" value="Submit" onclick="submitForm()">
            </form>

            <?php 
                require_once('./pgConfig.php');
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $name = $_POST['name'];
                    $mail = $_POST['email'];
                    $msg = $_POST['message'];
                    $query = "INSERT INTO contact(m_name,m_mail,m_msg) VALUES ($1,$2,$3)";
                    $result = pg_query_params($conn,$query,array($name,$mail,$msg));
                    if(!$result){
                        echo pg_last_error($conn);
                    }else{
                        echo '<h1>Message Sent Succesfully ! <br>Thank You </h1>';
                    }
                }
            ?>
            <script>
                window.onload = function () {
                document.getElementById("name").focus();
            };
            </script>


        </div>
    </div>

</body>

</html>