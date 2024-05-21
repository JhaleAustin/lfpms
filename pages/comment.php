<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2)) {
    // Database connection
    include "../includes/dbcon.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foods</title>
        <link rel="stylesheet" href="../css/foods.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }

            .h-custom {
                height: calc(100% - 73px);
            }

            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }

            .form1 textarea {
                width: calc(100% - 22px);
                height: 100px;
                resize: none;
                border: 1px solid #999;
                border-radius: 4px;
                padding: 10px;
            }

            .blue-background {
                background-color: blue;
            }

            .green-background {
                background-color: green;
            }

            .container3 {
                margin-top: 350px;
            }

            .feedback-container {
                background-color: #fff;
                border-radius: 4px;
                font-size: 90%;
                text-align: center;
            }

            .ratings-container {
                display: flex;
                margin: 20px 0;
            }

            .rating {
                flex: 1;
                cursor: pointer;
                padding: 20px;
            }

            .rating:hover, .rating.active {
                border-radius: 4px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .rating img {
                width: 20px;
            }

            .rating small {
                color: #555;
                display: inline-block;
                margin: 10px 0 0;
            }

            .rating:hover small, .rating.active small {
                color: #111;
            }

            .btn {
                background-color: #302d2b;
                color: #fff;
                border: 0;
                border-radius: 4px;
                padding: 12px 30px;
                cursor: pointer;
            }

            .btn:focus {
                outline: 0;
            }

            .btn:active {
                transform: scale(0.98);
            }

            .fa-heart {
                color: red;
                font-size: 30px;
            }

            .scrollable-form {
                max-height: 400px;
                overflow-y: auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #f8f9fa;
            }    .scrollable-form {
                max-height: 400px;
                overflow-y: auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #f8f9fa;
            }

            .comment-widgets {
                max-height: 400px; /* Set a max-height to enable scrolling */
                overflow-y: auto;  /* Enable vertical scrolling */
            }
        </style>
    </head>
    <body>
        <div class="hero">
            <nav>
                <img src="../img/foodtrack.png" class="Foodtrack">
                <ul>
                    <li><a href="home/">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="marketplace.php">Products</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <img src="../img/profile.png" class="user" id="userIcon">
                <div class="sub-menu-warp" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <a href="about.php"><img src="../img/profile.png">
                                <h2><?php echo $_SESSION['fullname']; ?></h2>
                            </a>
                        </div>
                        <hr>
                        <a href="../Dashboard.php" class="sub-menu-link">Dashboard</a>
                        <a href="../assessment.php" class="sub-menu-link">Assessment</a>
     <hr>
                        <a href="logout.php" class="sub-menu-link">
                            <img src="../img/profile.png">
                            <p>Log out</p>
                        </a>
                    </div>
                </div>
            </nav>
            <section class="vh-100">
                <div class="container-fluid h-custom">
                    <div class="row2 d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-9 col-lg-6 col-xl-5">
                            <img src="https://cdn.britannica.com/45/5645-050-B9EC0205/head-treasure-flower-disk-flowers-inflorescence-ray.jpg"
                                class="img-fluid" alt="Sample image">
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                            <div data-mdb-input-init class="form-outline mb-3">
                                <form class="form1" action="insert_comment.php" method="post" enctype="multipart/form-data">
                                    <div id="feedback" class="feedback-container">
                                        <strong>How satisfied are you with our <br/> customer support service?</strong>
                                        <div class="ratings-container">
                                            <div class="rating" data-rating="Unsatisfied">
                                                <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-17.png" alt="">
                                                <small>Unsatisfied</small>
                                            </div>
                                            <div class="rating" data-rating="Neutral">
                                                <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-3.png" alt="">
                                                <small>Neutral</small>
                                            </div>
                                            <div class="rating active" data-rating="Happy">
                                                <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-30.png" alt="">
                                                <small>Happy</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $_GET['id']; ?>"> 
                                    <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id']; ?>"> 
                                    <input type="hidden" name="rating" id="rating" value="Happy"> <!-- Set default value -->
                                    <textarea name="comment" placeholder="Enter your comment"></textarea>
                                    <br>
                                    <br>
                                    <button type="submit"  class="btn btn-primary btn-lg"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Send Feedback</button>
                                </form>
                            </div>
                            <div class="scrollable-form" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Recent Comments</h4>
                                                <h6 class="card-subtitle">Latest Comments section by users</h6>
                                            </div>
                                            <div class="comment-widgets m-b-20">
                                                      <?php
                                                $select_products = $conn->prepare("
                                                SELECT feedback.*, users.fullname
                                                FROM feedback, users
                                                WHERE feedback.userid = users.userid
                                                AND feedback.product_id = ?
                                                ORDER BY feedback.datesubmitted;
                                                
                                                ");
                                                $select_products->bind_param("i", $_GET['id']);
                                                $select_products->execute();

                                                if ($select_products->execute()) {
                                                    $result = $select_products->get_result();
                                                    if ($result->num_rows > 0) {
                                                        while ($fetch_products = $result->fetch_assoc()) {
                                                            ?>
                                                            <div class="d-flex flex-row comment-row">
                                                                <div class="comment-text w-100">
                                                                    <h5><?= $fetch_products['fullname']; ?></h5>
                                                                    <div class="comment-footer">
                                                                        <span class="date"><?= $fetch_products['datesubmitted']; ?></span>
                                                                        <div class="ratings-container">
                                                                            <?php
                                                                            if ($fetch_products['rating'] == "Happy") {
                                                                                ?>
                                                                                <div class="rating active" data-rating="Happy">
                                                                                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-30.png" alt="">
                                                                                    <small>Happy</small>
                                                                                </div>
                                                                                <?php
                                                                            } elseif ($fetch_products['rating'] == "Neutral") {
                                                                                ?>
                                                                                <div class="rating active" data-rating="Neutral">
                                                                                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-3.png" alt="">
                                                                                    <small>Neutral</small>
                                                                                </div>
                                                                                <?php
                                                                            } elseif ($fetch_products['rating'] == "Unsatisfied") {
                                                                                ?>
                                                                                <div class="rating active" data-rating="Unsatisfied">
                                                                                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-17.png" alt="">
                                                                                    <small>Unsatisfied</small>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <p class="m-b-5 m-t-10"><?= $fetch_products['comment']; ?></p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo '<p class="empty">No Comment yet!</p>';
                                                    }
                                                } else {
                                                    $errorInfo = $select_products->error;
                                                    echo 'Error: ' . $errorInfo;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script src="../js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="star"]').on('change', function() {
                $('.star-label').removeClass('selected');
                $('.star-label[for=star' + $(this).val() + ']').addClass('selected');
            });
        });

        const ratings = document.querySelectorAll('.rating');
        const ratingsContainer = document.querySelector('.ratings-container');
        const sendBtn = document.querySelector('.btn');
        const feedback = document.querySelector('#feedback');
        let selectedRating = 'Happy'; // Default value

        ratingsContainer.addEventListener('click', (e) => {
            if (e.target.parentNode.classList.contains('rating')) {
                removeActive();
                e.target.parentNode.classList.add('active');
                selectedRating = e.target.nextElementSibling.innerHTML;
                document.getElementById('rating').value = selectedRating; // Update the hidden input value
            }
        });

        sendBtn.addEventListener('click', (e) => {
            feedback.innerHTML = `
                <i class="fas fa-heart"></i>
                <strong>Thank You!</strong>
                <br>
                <strong>Feedback: ${selectedRating}</strong>
                <p>We'll use your feedback to improve our customer support</p>`;
        });

        function removeActive() {
            for (let i = 0; i < ratings.length; i++) {
                ratings[i].classList.remove('active');
            }
        }
    </script>
    </html>
    <?php
} else {
    session_destroy();
    header("Location: home/");
    exit;
}
?>
