
<!Doctype html>

<head>

    <link rel="stylesheet" href="CSS/contact_us.css">
    <style>
        
    </style>    

</head>

<body>
    <?php require 'header.php'; ?>  
    <div class="hero">

    <h2 >Contact Us</h2>

    </div>


    <!-- contact form section -->
    <div class="form_sec">
        <div class=form_left>
            <h3>Let Connect With Us</h3>
        </div>

        <fieldset>

        <div class=form_right>
            <form action="" method="post">
            
                <input name="f_name " type="text" placeholder="First Name" size="50">
                <input name="l_name" type="text" placeholder="Last Name" size="50">
                <input name="email" type="email" placeholder="Email" size="50" required> <br>
                <textarea name="message" id="c_textare" for="message"  placeholder="Type Your Message " size="250" required></textarea> <br>
                <input for="submit_button" type="submit" value="Submit" name="submit">
                <input type="reset" value="Clear" name="reset">

            </form>
        </div>

        </fieldset>

    </div>

    <!-- social media and hotline section -->
    <div class=social_sec>
            <h3>Follow Us on Social Media </h3>

            <div class="s_icon">
                <a href="#" for="fb"> <img src="icon/fb.jpeg" alt="FaceBook"></a>
                <a href="#" for="insta"> <img src="icon/insta.jpeg" alt="Instagram"></a>
                <a href="#" for="tiktok"> <img src="icon/tiktok.jpeg" alt="TikTok"></a>
                <a href="#" for="yt"> <img src="icon/yt.png" alt="YouTube"></a>

            </div>

            <h3>Hot Line </h3>
            <h4>+94 777 123 123</h4>
            <h4>+94 777 123 123</h4>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>
