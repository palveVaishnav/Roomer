<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <style>
        .title {
            font-size: 2em;
        }

        .parentCard {
            display: grid;
            grid-template-columns: repeat(3, auto);
        }

        .cards {
            border: 2px solid black;
            border-radius: 10px;
            margin: 1em;
            padding: 10px;
            font-size: 1.5em;
            transition: all 0.3s ease-in-out;
        }

        .cards:hover {
            transform: translateY(-5px);
            box-shadow: 4px 4px 20px 2px orangered;
            background-color: #333;
            color: #fff;
        }


        .card-title {
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 0.5em;
        }

        .card-description {
            margin-bottom: 0.5em;
        }

        .card-bullets {
            margin-left: 1.5em;
        }
    </style>
</head>

<body>
    <?php
    require_once ('../components/leftIndex.php');
    ?>
    <div class="main_page">
        <div class="title">Our Future Plans : </div>
        <div class="parentCard">
            <div class="cards">
                <div class="card-title">Goal: Helping Relocating Users</div>
                <div class="card-description">Assist students/employees relocating to new cities by providing
                    information about nearby amenities and facilities.
                </div>
                <ul class="card-bullets">
                    <li>->> Locate mess, libraries, canteens, classes, grocery shops, etc.</li>
                    <li>->> Better understanding of the area before relocating</li>
                    <li>->> Implement a personalized recommendation system based on user preferences</li>
                </ul>
            </div>
            <div class="cards">
                <div class="card-title">Location-based Information Platform</div>
                <div class="card-description">Provide a platform for users to locate nearby amenities like libraries,
                    messes, clubs, and more. Businesses can also advertise their products.</div>
                <ul class="card-bullets">
                    <li>->> Ensure transparency and fairness in advertising practices</li>
                    <li>->> Integrate user reviews and ratings for listed amenities</li>
                </ul>
            </div>
            <div class="cards">
                <div class="card-title">Enhanced Chat Functionality</div>
                <div class="card-description">Chat functionality enhanced with AI integration to boost productivity and
                    resourcefulness.</div>
                <ul class="card-bullets">
                    <li>->> Specify the AI capabilities and how they will benefit users</li>
                    <li>->> Offer AI-driven suggestions and assistance based on user queries</li>
                </ul>
            </div>
            <div class="cards">
                <div class="card-title">Interactive Maps Integration</div>
                <div class="card-description">Incorporate interactive maps to allow users to visualize the locations of
                    hostels and PG accommodations and their proximity to key landmarks or points of interest.</div>
                <ul class="card-bullets">
                    <li>->> Highlight the ease of navigation and exploration</li>
                    <li>->> Implement geofencing alerts for special offers or events</li>
                </ul>
            </div>
            <div class="cards">
                <div class="card-title">Local Experiences and Recommendations</div>
                <div class="card-description">Provide recommendations for local experiences, attractions, restaurants,
                    and
                    transportation options near each hostel or PG accommodation to enhance the user's overall stay
                    experience.</div>
                <ul class="card-bullets">
                    <li>->> Offer curated lists of experiences based on user preferences</li>
                    <li>->> Integrate user-generated content to showcase authentic experiences</li>
                </ul>
            </div>
        </div>

        <footer id="footerPage"></footer>
        <script>
            fetch('../components/footer.html')
                .then(res => res.text())
                .then(footer => {
                    document.getElementById('footerPage').innerHTML = footer;
                })
        </script>
    </div>
</body>

</html>