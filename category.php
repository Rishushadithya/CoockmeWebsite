<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/category.css">
    
</head>
<body>
    <?php
        require_once ('header.php'); // Include header of the page
    ?>
    <div class="container">
        <section class="section">
            <h2>Category 1</h2>
            <div class="grid">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <article class="card">
                        <a href="recipe.php">
                            <img src="./image/recipe/7-1.jpg" alt="Collection Image">
                        </a>
                        <h3>Collection Title</h3>
                        <p>Read more..</p>
                    </article>
                <?php endfor; ?>
            </div>
        </section>


        <section class="section">
            <h2>Category 2</h2>
            <div class="grid">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <article class="card">
                        <a href="recipe.php">
                            <img src="./image/recipe/5-1.jpg" alt="Collection Image">
                        </a>
                        <h3>Collection Title</h3>
                        <p>Read more..</p>
                    </article>
                <?php endfor; ?>
            </div>
        </section>


        <section class="section">
            <h2>Category 3</h2>
            <div class="grid">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <article class="card">
                        <a href="recipe.php">
                            <img src="./image/recipe/6-1.jpg" alt="Collection Image">
                        </a>
                        <h3>Collection Title</h3>
                        <p>Read more..</p>
                    </article>
                <?php endfor; ?>
            </div>
        </section>








    </div>




    <?php
        include ('footer.php'); // Include footer of the page 
    ?>
</body>
</html>