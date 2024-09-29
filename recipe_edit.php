<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/recipe_create.css">
    <title>Edit Recipe</title>
</head>
<body>

<?php 
    require_once('./headerRecipeCreate.php'); 
    require_once('config.php'); // Your database connection

    // Get recipe ID from URL parameter
    if (isset($_GET['id'])) {
        $recipe_id = $_GET['id'];
        $sql = "SELECT * FROM recipe WHERE id = $recipe_id";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
            $recipe = $result->fetch_assoc();
        } else {
            echo "<p>Recipe not found.</p>";
            exit;
        }
    } else {
        echo "<p>No recipe selected.</p>";
        exit;
    }
?>
    
<div class="container">
    <h1>Edit Recipe</h1>
    <form id="recipeForm" action="./recipe_editHandler.php" method="post" enctype="multipart/form-data">
        <!-- Pass the recipe ID to the handler -->
        <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($recipe['Recipe_Name']); ?>" required>

        <label for="image">Featured Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <!-- Show current image -->
        <img src="data:image/jpeg;base64,<?php echo base64_encode($recipe['Image']); ?>" alt="Current Recipe Image" style="width: 100px;">

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($recipe['Description']); ?></textarea>

        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" required><?php echo htmlspecialchars($recipe['Ingredients']); ?></textarea>

        <label for="method">Method:</label>
        <textarea id="method" name="method" required><?php echo htmlspecialchars($recipe['Method']); ?></textarea>

        <div id="time">
            <div>
                <label for="servings">Servings:</label>
                <input type="number" id="servings" name="servings" value="<?php echo htmlspecialchars($recipe['Servings']); ?>" required>
            </div>
            <div>
                <label for="cookingTime">Cooking Time:</label>
                <input type="text" id="cookingTime" name="PTime" value="<?php echo htmlspecialchars($recipe['Cooking_Time']); ?>" required>
                <span>Min</span>
            </div>
            <div>
                <label for="preparingTime">Preparing Time:</label>
                <input type="text" id="preparingTime" name="CTime" value="<?php echo htmlspecialchars($recipe['Preparing_Time']); ?>" required>
                <span>Min</span>
            </div>
            <div>
                <label for="cuisine">Cuisine:</label>
                <input type="text" id="cuisine" name="cuisine" value="<?php echo htmlspecialchars($recipe['Cuisine']); ?>" required>
            </div>
        </div>

        <br>
        
        <div class="stars" name="difficulty">
            <span id="difficulty">Difficulty:</span> 
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    $selected = ($i == $recipe['Difficulty']) ? 'style="color: gold;"' : '';
                    echo '<span class="star" data-value="' . $i . '" ' . $selected . '>' . $i . '&#9733;</span>';
                }
            ?>
        </div>
        <input type="hidden" id="difficultyInput" name="difficulty" value="<?php echo $recipe['Difficulty']; ?>">
        
        <br>
        <button type="submit" name="submitBtn" id="submitBtn">Update</button>
    </form>
</div>
<script src="./JS/recipe_create.js"></script>
<?php require_once('footer.php'); ?>    
</body>
</html>
