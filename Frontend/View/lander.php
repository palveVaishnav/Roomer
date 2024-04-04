<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image-slider for property page</title>
    <style>
        * {
            box-sizing: border-box
        }

        .landerSection {
            width: 90%;
            display: flex;
            position: relative;
            gap: 10px;
            justify-content: center;
            /* align-items: center; */
        }

        /* Slideshow container */
        .slideshow-container {
            width:80%;
            object-fit: cover;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
            height: 60vh;
            /* width: 100%; */
            position: relative;
            overflow: hidden;
            border: 2px solid #333;
            border-radius: 2em;
            box-shadow: 5px 7px 11px 3px #33333378;
        }

        .mySlides img {
            /* width: max-content; */
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            /* top: 50%; */
            width: 8%;
            height: 40vh;
            margin-top: 10vh;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.3s ease-in-out;
            border: 2px solid #333;
            border-radius: 3px;
            background-color: #33333378;
            display: grid;
            place-items: center;
        }


        .prev{
            border-radius: 5em 0 0 5em;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 0 5em 5em 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }
    </style>
</head>

<body>
    <div class="landerSection">
        <div> <a class="prev" onclick="plusSlides(-1)">&#10094; Prev</a> </div>

        <div class="slideshow-container">

            <?php
                require_once('propRender.php');
            ?>
            <?php
            foreach ($p_image_array as $image) {
                echo '
                        <!-- Slideshow container -->
                        <div class="mySlides fade">
                            <img src=".' . $image . '" style="width:100%">
                        </div>';

            }
            ?>

        </div>


        <!-- Next and previous buttons -->
        <div> <a class="next" onclick="plusSlides(1)">Next &#10095;</a> </div>
    </div>
    <br>

    <!-- The dots/circles -->
    <!-- ignore for now  -->

    <script>
        let slideIndex = 0;
        plusSlides(0);
        function showSlides(n) {
            let slides = document.getElementsByClassName("mySlides");
            if (n >= slides.length) { slideIndex = 0; }
            if (n < 0) { slideIndex = slides.length - 1; }
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

    </script>
</body>

</html>