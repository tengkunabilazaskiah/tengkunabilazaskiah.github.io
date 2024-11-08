<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- tautan file css admin khusus -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>About Us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
<video src="images/Farm1.mp4"width="100%" loop autoplay muted></video>     
        </div>

        <div class="content">
            <h3>Why choose us?</h3><center>
            <p>➤ Pocket-friendly options for your close and loved ones, including a wide selection of fresh flowers and plants. Express flower delivery directly to the destination address, along with quick responses and improved customer service for resolving issues in case of any problems.<br>
➤ Firstly, the company purchases products directly from producers and suppliers, providing you, the customer, with fresher products. This approach also removes wholesalers (middlemen) from the equation, significantly reducing costs. These savings are calculated and displayed in the form of competitive market prices on each product page.
</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>
    </div>
<br><br><br><br>

    <div class="flex">
        <div class="content">
            <h3>what we provide?</h3>
            <p>➤ Our vision is to provide you with the best flower selection and ensure your experience as a customer while searching for flowers is stress-free and enjoyable! <br>
               ➤ Our main aim is to ensure that you get the best quality products including fresh flowers on our portal. It is our responsibility to ensure that customers find the right flowers for their employees and deliver them on time.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <video src="images/Farm2.mp4"width="100%" loop autoplay muted></video>     
        </div>
    </div>
<br><br><br><br>

    <div class="flex">
        <div class="image">
<video src="images/Farm3.mp4"width="100%" loop autoplay muted></video>        
        </div>

        <div class="content">
            <h3>who we are?</h3>
            <p>➤ We are a provider of quality flowers and gifts focused on beauty, speed and affordability. 
                  Starting from a local shop, we are now present online with the mission of "Fresh, Fast and Fair" to ensure you can send fresh flowers easily. 
                  With the support of the local community and various organizations, we are committed to being a part of your special moments.<br>
               ➤ We are proud to support local communities as well as national non-profit and sports organizations, 
                  including Hockey Sports India, Ice Skating India, and Basketball Children's Foundation.</p>         
   <a href="#reviews" class="btn">Meet The Developers </a>
        </div>
    </div><br>
</section>

<section class="reviews" id="reviews">
    <h1 class="title">"Meet The Developers"</h1>
    <div class="box-container">
        <div class="box">
            <img src="images/sela.jpg" alt="">
            <p>Hi! My name is Dyah Ayu Nurshella Ramhan. I'm currently Studying in Universitas Mulawarman majoring Informatics. 
               I have a strong interest in data analytics, machine learning, user interface/user experience (UI/UX) design and graphic design. 
               My skills include problem solving, critical thinking, time work, time management, and a desire to explore new knowledge. 
               I am committed to delivering innovative and intuitive solutions, and I am always looking for opportunities to grow and collaborate with results-oriented teams. 
               Let's collaborate with me we can develop our skills and social connections.</p>
            <h3>Dyah Ayu Nurshella Ramhan</h3>
        </div>
																																																																
        <div class="box">
            <img src="images/nabila.jpg" alt="">
            <p>Hi, my name is Tengku Nabila Zaskiah, and I’m an Informatics student at Universitas Mulawarman. 
               My interests lie in cyber security, with a focus on safeguarding data confidentiality and integrity against cyber threats. 
               I bring skills in problem-solving, critical thinking, time management, and teamwork to my work, always eager to explore the latest practices and technology in the cyber security field. 
               I am committed to creating secure and user-friendly solutions. Let’s collaborate—together, we can expand our connections and develop our skills for even greater impact..</p>
            <h3> Tengku Nabila Zaskiah</h3>
        </div>

        <div class="box">
            <img src="images/akbar.jpg" alt="">
            <p>Hi! My name is Muhammad Annur Akbar. I am currently studying at Mulawarman University majoring in Informatics. 
               I am very interested in data analysis, and graphic design. My skills include problem solving, critical thinking, hard work, and a desire to explore new knowledge and also new things. 
               to develop self-knowledge. I am committed to providing innovative and intuitive solutions, and I am always looking for opportunities to grow and collaborate with a result-oriented team. 
               Let's collaborate with me, we can develop our skills and social connections.</p>
            <h3> Muhammad Annur Akbar </h3>
        </div>
    </div>

</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>