<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe View</title>
    <link rel="stylesheet" href="CSS/recipe_details.css">
</head>
<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>

    <main>
    <?php
        require_once "config.php";

        // Check if the 'id' parameter is set in the URL
        if (isset($_GET['id'])) {
            $recipe_id = intval($_GET['id']);
            $_SESSION['recipe_id']=$recipe_id; // Get the Recipe_ID from the URL and convert to an integer

            // Fetch the recipe details based on Recipe_ID
            $sql = "SELECT * FROM recipe WHERE Recipe_ID = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $recipe_id); // Bind the Recipe_ID to the query
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the recipe exists
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $recipe_name = $row['Recipe_Name'];
                    $description = $row['Description'];
                    $image = $row['Image'];
                    $difficulty = $row['Difficulty'];
                    $prepare_time = $row['Prepare_Time'];
                    $cook_time = $row['Cook_Time'];
                    $cuisine = $row['Cuisine'];
                    $serves = $row['Serves'];
                    $ingredients = $row['Ingredients'];
                    $method = $row['Method'];
                }
    ?>

    <div class="container">
        <form id="recipeForm" action="" method="post">
            <h1><?php echo htmlspecialchars($recipe_name); ?></h1>

            <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="Recipe Image">

            <h2><?php echo htmlspecialchars($description); ?></h2>

            <label class="ingredients">Ingredients:</label>
            <h3><?php echo htmlspecialchars($ingredients); ?></h3>

            <label class="method">Method:</label>
            <h3><?php echo htmlspecialchars($method); ?></h3>

            <div id="time">
                <div>
                    <label class="Servings">Servings:</label>
                    <?php echo htmlspecialchars($serves); ?>
                </div>
                <div>
                    <label class="Cooking_Time">Cooking Time:</label>
                    <?php echo htmlspecialchars($prepare_time); ?>
                    <span>Min</span>
                </div>
                <div>
                    <label class="Preparing_Time">Preparing Time:</label>
                    <?php echo htmlspecialchars($cook_time); ?>
                    <span>Min</span>
                </div>
                <div>
                    <label class="Cuisine">Cuisine:</label>
                    <?php echo htmlspecialchars($cuisine); ?>
                </div>
            </div>
            <br>
            <div class="stars" name="difficulty">
                <span id="difficulty">Difficulty:</span>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $selected = ($i == $difficulty) ? 'style="color: gold;"' : '';
                        echo '<span class="star" data-value="' . $i . '" ' . $selected . '>' . $i . '&#9733;</span>';
                    }
                ?>
            </div>

            <input type="hidden" id="difficultyInput" name="difficulty" value="<?php echo $difficulty; ?>">

            <br>
            <?php
                if (isset($_POST['add'])) {
                    // Assuming you have the user's ID stored in session

                    // Check if the recipe is already in the user's favorites
                    $check_sql = "SELECT * FROM favorite WHERE User_ID = ? AND Recipe_ID = ? ";
                    $stmt = $con->prepare($check_sql);
                    $stmt->bind_param("ii", $sid, $recipe_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();

                    
                    $is_favorite = ($result->num_rows > 0);
                    $_SESSION['is_favorite'] = $is_favorite;

                    if ($result->num_rows > 0) {
                        // If already in favorites, remove it
                        $remove_sql = "DELETE FROM favorite WHERE User_ID = ? AND Recipe_ID = ? ";
                        $stmt = $con->prepare($remove_sql);
                        $stmt->bind_param("ii", $sid, $recipe_id);
                        $stmt->execute();
                        $message = "Recipe removed from favorites.";
                    } else {
                        // Otherwise, add it to favorites
                        $insert_sql = "INSERT INTO favorite (User_ID, Recipe_ID) VALUES (?, ?)";
                        $stmt = $con->prepare($insert_sql);
                        $stmt->bind_param("ii",  $sid, $recipe_id);
                        $stmt->execute();
                        $message = "Recipe added to favorites.";

                    }

                    // Display the message
                    echo "<script>alert('$message');</script>";
                   
                }

            ?> 
            
            <button type="submit" name="add" id="add">
                <?php
                 $is_favorite = $_SESSION['is_favorite'];
                 echo ($is_favorite ? "Add from Favorites" : "Remove to Favorites"); ?>
            </button>
            <button type="submit" name="download" id="download">Download</button>
        </form>
    </div>
    <?php
            } else {
                echo "<p>No recipe found.</p>";
            }

            // Close the database connection
            $stmt->close();
            $con->close();
        } else {
            echo "<p>Invalid recipe ID.</p>";
        }
    ?>
    </main>

    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>
</html>
