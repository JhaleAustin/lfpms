<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foods.css">
    <link rel="stylesheet" href="../css/foods2.css">
    <title>Foods</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

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
.rating:hover small,.rating.active small {
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
  font-size: 30px;</style>
}
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


 

   <div class="container3">
        <form>
        <div id="feedback" class="feedback-container">
    <strong>How satisfied are you with our <br/> customer support service?</strong>
      <div class="ratings-container">
        <div class="rating">
          <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-17.png" alt="">
          <small>unsatisfied</small>
        </div>
        <div class="rating"><img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-3.png" alt=""/>
          <small>Neutral</small>
        </div>
        <div class="rating active"><img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-30.png" alt=""/>
          <small>Happy</small>
        </div>
      </div>

      </div>
           
            <br>
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
        $(document).ready(function() {
            $('input[name="star"]').on('change', function() {
                $('.star-label').removeClass('selected');
                $('.star-label[for=star'+$(this).val()+']').addClass('selected');
            });
        });

        
    </script>

    <script>

const ratings = document.querySelectorAll('.rating')
const ratingsContainer = document.querySelector('.ratings-container')
const sendBtn = document.querySelector('#send')
const feedback = document.querySelector('#feedback')
let selectedRating = 'Satisfied'
ratingsContainer.addEventListener('click', (e) => {
    if(e.target.parentNode.classList.contains('rating') && e.target.nextElementSibling) {
        removeActive()
        e.target.parentNode.classList.add('active')
        selectedRating = e.target.nextElementSibling.innerHTML
    } else if(
        e.target.parentNode.classList.contains('rating') &&
        e.target.previousSibling &&
        e.target.previousElementSibling.nodeName === 'IMG'
    ) {
        removeActive()
        e.target.parentNode.classList.add('active')
        selectedRating = e.target.innerHTML
    }
})
sendBtn.addEventListener('click', (e) => {
    feedback.innerHTML = `
        <i class="fas fa-heart"></i>
        <strong>Thank You!</strong>
        <br>
        <strong>Feedback: ${selectedRating}</strong>
<p>We'll use your feedback to improve our customer support</p>`
});
function removeActive() {
    for(let i = 0; i < ratings.length; i++) {
        ratings[i].classList.remove('active');
    }
 }
    </script>
<script src="../js/script.js"></script>
</body>
</html>