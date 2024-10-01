<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe View</title>
    <link rel="stylesheet" href="recipe details.css">
</head>
<body>
    
    <header>
    <?php require_once('header.php'); ?>
    </header>

    <main>

    <?php

    require_once "cookmeconnect.php";
    $sql = "SELECT Recipe_Name,Description,Image,Prepare_Time,Cook_Time,Cuisine,Serves,Ingredients,Method,Difficulty FROM recipe"; //where Recipe_ID
    if($r->num_rows>0)
    {
        while($row=$r->fetch_assoc()){
            $recipe_name=$row['Recipe_Name'];
            $description=$row['Description'];
            $image=$row['Image'];
            $difficulty=$row['Difficulty'];
            $prepare_time=$row['Prepare_Time'];
            $cook_time=$row['Cook_Time'];
            $cuisine=$row['Cuisine'];
            $serves=$row['Serves'];
            $ingredients=$row['Ingredients'];
            $method=$row['Method'];
           
        
            echo"<div class='recipe-title'><h1>".htmlspecialchars($recipe_name)."</h1></div>";

            echo"<div class='description'><p>".htmlspecialchars($cook_time)."</p> </div>";
             
            echo"<div class='recipe-images'><img src=".htmlspecialchars($image)." alt='Recipe Image'><br>";
                   
            echo"<div class='difficulty'></div>";
           
            echo"</div><p id ='d'>difficulty</p><div class='dif'>";
           
            $dif=htmlspecialchars($difficulty);
                for($i=0;$i<$dif;++$i)
                {
                   echo"<input type='radio' name='rating' id='r' >
                    <label for='r'>&#9733</label>";
                }
                
                
     
               
            

            echo"</div>";
                
                echo"<div class='preptime'><p>Prep Time:".htmlspecialchars($prepare_time)."</p></div>"; 
                echo"<div class='cooktime'><p>Cook Time:".htmlspecialchars($description)."</p></div>";
                echo"<div class='cuisine'><p>Cuisine:".htmlspecialchars($cuisine)."</p></div>";
                echo"<div><div class='serves'><p>Serves:".htmlspecialchars($serves)."</p><div>";

               
        
               echo"<h2>Ingredients</h2>";
           
          
               echo"<section class='ingredients'><ul>".htmlspecialchars($ingredients)."</ul></section>";
        
             
                echo"<h2>Methode</h2>";
                echo"<section class='Method'><p>".htmlspecialchars($method)."</p></section>";
           

    
        }
    }
    else 
    {
    echo "No recipes found."; 
    } 
    $cook->close();
   




    ?>
   
     </main>
    <footer>
       
    <?php require_once('footer.php'); ?>
    </footer>
</body>
</html>
