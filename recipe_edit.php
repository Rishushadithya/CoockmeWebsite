<?php
// read the recipe details using database
$id=3;
require_once('./config.php');


    $sql= "SELECT * FROM recipe WHERE  Recipe_ID = $id";
    $result = $con->query($sql);
if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $title = $row['Recipe_Name'];
            $description = $row['Description'];
            $ingredients = $row['Ingredients'];
            $method = $row['Method'];
            $servings = $row['Serves'];
            $cookingTime = $row['Cook_Time'];
            $preparingTime = $row['Prepare_Time'];
            $cuisine = $row['Cuisine'];
            $difficulty = $row['Difficulty'];
            // $image = $row['Image'];
        }
    }

?>


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

<?php require_once('./recipe_editHandler.php'); ?>

<div class="container">
    <h1>Edit Recipe</h1>
    <form id="recipeForm" action="./recipe_createHandler.php" method="post" enctype="multipart/form-data">
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>" required>

        <label for="image">Featured Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <?php //if ($image): ?>
            <img src="uploads/<?php //echo $image; ?>" alt="Recipe Image" width="100">
        < <?php //endif; ?>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $description; ?></textarea>

        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" required><?php echo $ingredients; ?></textarea>

        <label for="method">Method:</label>
        <textarea id="method" name="method" required><?php echo $method; ?></textarea>

        <div id="time">
            <div>
                <label for="servings">Servings:</label>
                <input type="number" id="servings" name="servings" value="<?php echo $servings; ?>" required>
            </div>
            <div>
                <label for="cookingTime">Cooking Time:</label>
                <input type="text" id="cookingTime" name="PTime" value="<?php echo $cookingTime; ?>" required>
                <span>Min</span>
            </div>
            <div>
                <label for="preparingTime">Preparing Time:</label>
                <input type="text" id="preparingTime" name="CTime" value="<?php echo $preparingTime; ?>" required>
                <span>Min</span>
            </div>
            <div>
                <label for="cuisine">Cuisine:</label>
                <input type="text" id="cuisine" name="cuisine" value="<?php echo $cuisine; ?>" required>
            </div>
        </div>

        <br>

        <div class="stars" name="difficulty">
            <span id="difficulty"> Difficulty:</span>
            <span class="star" data-value="1" <?php echo $difficulty == 1 ? 'selected' : ''; ?>> 1★ </span>
            <span class="star" data-value="2" <?php echo $difficulty == 2 ? 'selected' : ''; ?>> 2★ </span>
            <span class="star" data-value="3" <?php echo $difficulty == 3 ? 'selected' : ''; ?>> 3★ </span>
            <span class="star" data-value="4" <?php echo $difficulty == 4 ? 'selected' : ''; ?>> 4★ </span>
            <span class="star" data-value="5" <?php echo $difficulty == 5 ? 'selected' : ''; ?>> 5★ </span>
        </div>
        <input type="hidden" id="difficultyInput" name="difficulty" value="<?php echo $difficulty; ?>">
        <br>
        <button type="submit" name="submitBtn" id="submitBtn">Update </button>
    </form>
</div>

<script src="./JS/recipe_create.js"></script>
<?php require_once('footer.php'); ?>
</body>
</html>
