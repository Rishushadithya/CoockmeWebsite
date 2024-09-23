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
    <div class="container1">
        <section class="section1" id="c1">
            <h2>Italian Recipes</h2>
            <div class="grid1">     
                <?php  
                    $sql = "SELECT SUM(RecipeID) AS 'total1',Cuisin FROM recipe WHERE Cuisin = 'Italian'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $total12 = $row['total1']; 
                        }
                        while($total12>0){
                            $sql = "SELECT * FROM recipe WHERE Cuisin = 'Italian'";
                            $result = $con->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<article class="card">';
                                    echo '<a href="recipe.php">';
                                    echo "<img src='data:image/jpeg;base64,".base64_encode($row['RImage'])."' alt='Recipe Image'>";
                                    echo "<h3>" . $row["Title"] . "</h3>";
                                    echo "<p>" . $row["Description"] . "</p>";
                                    echo '</article>';
                                } 
                            $total12--;
                        } 
                ?>
                   
            </div>
        </section> 


        <section class="section1" id="c2">
            <h2>French Recipes</h2>
            <div class="grid1">
            <?php 
                
                    $sql = "SELECT SUM(RecipeID) AS 'total1',Cuisin FROM recipe WHERE Cuisin = 'French'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $total12 = $row['total1'];
                        }

                        while($total12>0){

                            $sql = "SELECT * FROM recipe WHERE Cuisin = 'French' AND RecipeID = $total12";
                            $result = $con->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<article class="card">';
                                    echo '<a href="recipe.php">';
                                    echo "<img src='data:image/jpeg;base64,".base64_encode($row['RImage'])."' alt='Recipe Image'>";
                                    echo "<h3>" . $row["Title"] . "</h3>";
                                    echo "<p>" . $row["Description"] . "</p>";
                                    echo '</article>';
                                        } 
                            $total12--;
                        }    
                ?>
            </div>
        </section>


        <section class="section1" id="c3">
            <h2>Chinese Recipes</h2>
            <div class="grid1">
            <?php  
                    $sql = "SELECT SUM(RecipeID) AS 'total1',Cuisin FROM recipe WHERE Cuisin = 'Chinese'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $total12 = $row['total1'];
                        }

                        while($total12>0){

                            $sql = "SELECT * FROM recipe WHERE Cuisin = 'Chinese' AND RecipeID = $total12 ";
                            $result = $con->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<article class="card">';
                                    echo '<a href="recipe.php">';
                                    echo "<img src='data:image/jpeg;base64,".base64_encode($row['RImage'])."' alt='Recipe Image'>";
                                    echo "<h3>" . $row["Title"] . "</h3>";
                                    echo "<p>" . $row["Description"] . "</p>";
                                    echo '</article>';
                                        } 
                            $total12--;
                        }    
                ?>
            </div>
        </section>


        <section class="section" id="c4">
            <h2>Japanese Recipes</h2>
            <div class="grid">
            <?php  
                    $sql = "SELECT SUM(RecipeID) AS 'total1',Cuisin FROM recipe WHERE Cuisin = 'Japanese'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $total12 = $row['total1'];
                        }

                        while($total12>0){

                            $sql = "SELECT * FROM recipe WHERE Cuisin = 'Japanese' AND RecipeID = $total12 ";
                            $result = $con->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<article class="card">';
                                    echo '<a href="recipe.php">';
                                    echo "<img src='data:image/jpeg;base64,".base64_encode($row['RImage'])."' alt='Recipe Image'>";
                                    echo "<h3>" . $row["Title"] . "</h3>";
                                    echo "<p>" . $row["Description"] . "</p>";
                                    echo '</article>';
                                        } 
                            $total12--;
                        }    
                ?>
            </div>
        </section>
    </div>




    <?php
        include ('footer.php'); // Include footer of the page 
    ?>
</body>
</html>