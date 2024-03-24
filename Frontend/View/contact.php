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

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    ?>

    <div class="main_page">
        <div class="container">
            <h2>Contact Us</h2>
            <form method="post" id="contactForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your name.." required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Your email.." required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" placeholder="Write something.." style="height:200px"
                    required></textarea>

                <input type="submit" value="Submit">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                echo "<h1> Thank You for Contacting us !! Our team will connect with you soon </h1>";
            }
            ?>
            <script>
                function submitForm() {
                    document.getElementById("contactForm").reset();
                    

                }
            </script>
        </div>
    </div>

</body>

</html>