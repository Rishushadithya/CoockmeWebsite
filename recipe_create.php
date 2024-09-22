<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/recipe_create.css">
    
    <title>header</title>
</head>
<body>

<?php require_once('header.php'); ?>
    
<div class="container">
        <h1>Create Recipe</h1>
        <form id="recipeForm">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="image">Featured Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" required></textarea>

            <label for="method">Method:</label>
            <textarea id="method" name="method" required></textarea>
            
            <label for="servings" >Servings:</label>
            <input type="number" id="servings" name="servings" value="1" required  >

            <label for="cookingTime" >Cooking Time:</label>
            <input type="time" id="cookingTime" name="cookingTime" required >

            <label for="cuisine" >Cuisine:</label>
            <input type="text" id="cuisine" name="cuisine" required >
            
            
            <label for="difficulty">Difficulty:</label>
            <div class="stars">
                <span class="star" data-value="1"> 1&#9733;  </span>
                <span class="star" data-value="2"> 2&#9733;  </span>
                <span class="star" data-value="3"> 3&#9733;  </span>
                <span class="star" data-value="4"> 4&#9733;  </span>
                <span class="star" data-value="5"> 5&#9733;  </span>
            </div>
            

        <button type="submit">Submit</button>
    
        
           
        </form>
    </div>
    <script src="./JS/recipe_create.js"></script>
    <?php require_once('footer.php'); ?>    
</body>
</html>
