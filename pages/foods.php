<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foods.css">
    <link rel="stylesheet" href="../css/foods2.css">
    <title>Foods</title>
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
                     <a href="about.php"> <img src="../img/profile.png">
                    <h2><?php echo $_SESSION['fullname']; ?></h2>
                </a></div>
                <hr>
                <a href="logout.php" class="sub-menu-link">
                    <img src="../img/profile.png">
                    <p>Log out</p>
                </a>
            </div>
        </div>
    </nav>

    <!-- Container with cards -->
    <div class="container">
        <form>
            <p>Please rate our service out of 5</p>
            <div class="star-rating">
                <input name="star" id="star1" value="1" type="radio">
                <input name="star" id="star2" value="2" type="radio">
                <input name="star" id="star3" value="3" type="radio">
                <input name="star" id="star4" value="4" type="radio">
                <input name="star" id="star5" value="5" type="radio">
                <label class="star-label fal fa-star" for="star5"></label>
                <label class="star-label fal fa-star" for="star4"></label>
                <label class="star-label fal fa-star" for="star3"></label>
                <label class="star-label fal fa-star" for="star2"></label>
                <label class="star-label fal fa-star" for="star1"></label>
            </div>
            <br>
            <p>Please leave a comment below</p>
            <textarea name="comment">Easy to work with. Whilst the response did help, I found that it took too long for said response.</textarea>
            <br>
            <br>
            <button>Send Feedback</button>
        </form>
    </div>
    <br/><br/><br/> 
    <div class="container2">
     
    <div class="container2 d-flex justify-content-center mt-100 mb-100">
  <div class="row">
      <div class="col-md-12">

        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Comments</h4>
                                <h6 class="card-subtitle">Latest Comments section by users</h6> </div>

                            <div class="comment-widgets m-b-20">

                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><span class="round"><img src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5>Samso Nagaro</h5>
                                        <div class="comment-footer">
                                            <span class="date">April 14, 2019</span>
                                                     <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-heart"></i></a>
                                                </span>
                                        </div>
                                        <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
                                    </div>
                                </div>

                                <div class="d-flex flex-row comment-row ">
                                    <div class="p-2"><span class="round"><img src="https://i.imgur.com/tT8rjKC.jpg" alt="user" width="50"></span></div>
                                    <div class="comment-text active w-100">
                                        <h5>Jonty Andrews</h5>
                                        <div class="comment-footer">
                                            <span class="date">March 13, 2020</span>
                                                     <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-rotate-right text-success"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></a>
                                                </span>
                                        </div>
                                        <p class="m-b-5 m-t-10">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
                                    </div>
                                </div>

                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><span class="round"><img src="https://i.imgur.com/cAdLHeY.jpg" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5>Sarah Tim</h5>
                                        <div class="comment-footer">
                                            <span class="date">Jan 20, 2020</span>
                                                    <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-heart"></i></a>
                                                </span>
                                        </div>
                                        <p class="m-b-5 m-t-10">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure</p>
                                    </div>
                                </div>

                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><span class="round"><img src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5>Samso Nagaro</h5>
                                        <div class="comment-footer">
                                            <span class="date">March 20, 2020</span>
                                                     <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a>
                                                    <a href="#" data-abc="true"><i class="fa fa-heart"></i></a>
                                                </span>
                                        </div>
                                        <p class="m-b-5 m-t-10">It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

      </div>
  </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('input[name="star"]').on('change',function(){
        $('.star-label').removeClass('selected');
        $('.star-label[for=star'+$(this).val()+']').addClass('selected');
    });
</script>
<script src="../js/script.js"></script>
</body>
</html>
