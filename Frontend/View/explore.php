<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>

<body>
    <?php
        require_once('../components/leftIndex.php');
    ?>

    <!-- Right Hero Section -->
    <div class="main_page">

        <?php
            require_once('./homeRender.php');
            // $userId = sessionStorage.getItem('userId');
            
        ?>
        <!-- Room Cards and Details  -->

        <footer id="footerPage"></footer>
        <script>
            fetch('../components/footer.html')
                .then(res => res.text())
                .then(footer => {
                    document.getElementById('footerPage').innerHTML = footer;
                })
        </script>

    </div> <!-- Right Scrollable section -->

    <!-- JavaScript File  -->

</body>

</html>