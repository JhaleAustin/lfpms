<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 || isset($_SESSION['id']) && $_SESSION['usertype'] == 2){

// Database connection
include "../includes/dbcon.php";

?>

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
   <form action="insert_comment.php" method="post" enctype="multipart/form-data">
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
    <input type="hidden" name="rating" id="rating" value=""> #111<textarea name="comment" placeholder="Enter your comment"></textarea>
    <br>
    <br>
    <button type="submit">Send Feedback</button>
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
 
                             <?php

                            
$select_products = $conn->prepare("
SELECT feedback.*, users.fullname
FROM feedback
INNER JOIN users ON feedback.userid = users.userid
WHERE feedback.userid = ? and product_id = ?
ORDER BY feedback.datesubmitted
");
$select_products->bind_param("ii", $_SESSION['id'], $_GET['id']);
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
                           
                                             
                             <?php
if($fetch_products['rating']=="Happy"){

    ?>

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
    <?php
    
}else if($fetch_products['rating']=="Neutral"){

    ?>

    <div class="ratings-container">
                <div class="rating" data-rating="Unsatisfied">
                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-17.png" alt="">
                    <small>Unsatisfied</small>
                </div>
                <div class="rating active" data-rating="Neutral">
                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-3.png" alt="">
                    <small>Neutral</small>
                </div>
                <div class="rating" data-rating="Happy">
                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-30.png" alt="">
                    <small>Happy</small>
                </div>
            </div>
        <?php
}else if($fetch_products['rating']=="Unsatisfied"){
    ?>

    <div class="ratings-container">
                <div class="rating active" data-rating="Unsatisfied">
                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-17.png" alt="">
                    <small>Unsatisfied</small>
                </div>
                <div class="rating" data-rating="Neutral">
                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-3.png" alt="">
                    <small>Neutral</small>
                </div>
                <div class="rating" data-rating="Happy">
                    <img src="https://img.icons8.com/external-neu-royyan-wijaya/64/000000/external-emoji-neumojis-smiley-neu-royyan-wijaya-30.png" alt="">
                    <small>Happy</small>
                </div>
            </div>
        <?php
}
?>



       
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
    // Error occurred
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
 
</body>
</html>


<script src="../js/script.js"></script>
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
    const ratings = document.querySelectorAll('.rating');
    const ratingsContainer = document.querySelector('.ratings-container');
    const sendBtn = document.querySelector('#send');
    const feedback = document.querySelector('#feedback');
    let selectedRating = 'Happy'; // Default value

    ratingsContainer.addEventListener('click', (e) => {
        if (e.target.parentNode.classList.contains('rating')) {
            removeActive();
            e.target.parentNode.classList.add('active');
            selectedRating = e.target.nextElementSibling.innerHTML;
            // Update the hidden input value
            document.getElementById('rating').value = selectedRating;
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

 
<?php
    }
    else{
        session_destroy();
        header("Location: home/");
    }
?>
