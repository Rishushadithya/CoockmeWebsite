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

            <label for="servings">Servings:</label>
            <input type="number" id="servings" name="servings" required>

            <label for="cookingTime">Cooking Time:</label>
            <input type="text" id="cookingTime" name="cookingTime" required>

            <label for="cuisine">Cuisine:</label>
            <input type="text" id="cuisine" name="cuisine" required>

            <label for="difficulty">Difficulty:</label>
            <select id="difficulty" name="difficulty" required>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
    <?php require_once('footer.php'); ?>
</body>
</html>
