<?php
    //Database connection
    require 'db_connection.php';

    // Fetch total counts for recipe statuses
    $all_recipes_query = "SELECT COUNT(*) AS total FROM recipe";
    $active_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Active'";
    $pending_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Pending'";
    $rejected_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Rejected'";

    $all_recipes_result = mysqli_query($con, $all_recipes_query);
    $active_recipes_result = mysqli_query($con, $active_recipes_query);
    $pending_recipes_result = mysqli_query($con, $pending_recipes_query);
    $rejected_recipes_result = mysqli_query($con, $rejected_recipes_query);

    $all_recipes = mysqli_fetch_assoc($all_recipes_result)['total'];
    $active_recipes = mysqli_fetch_assoc($active_recipes_result)['total'];
    $pending_recipes = mysqli_fetch_assoc($pending_recipes_result)['total'];
    $rejected_recipes = mysqli_fetch_assoc($rejected_recipes_result)['total'];

    // Fetch total counts for users
    $users_query = "SELECT COUNT(*) AS total FROM user";
    $creators_query = "SELECT COUNT(*) AS total FROM creator";
    $moderators_query = "SELECT COUNT(*) AS total FROM moderator";

    $users_result = mysqli_query($con, $users_query);
    $creators_result = mysqli_query($con, $creators_query);
    $moderators_result = mysqli_query($con, $moderators_query);

    $users = mysqli_fetch_assoc($users_result)['total'];
    $creators = mysqli_fetch_assoc($creators_result)['total'];
    $moderators = mysqli_fetch_assoc($moderators_result)['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Importing Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="./creator dashboard.css">

    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <?php //require_once('header.php'); ?>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Creator Dashboard</h1>
                <div class="list">
                    <h3>Recipes</h3>
                    <select onchange="filterRecipes(this.value)">
                        <option>Select</option>
                        <option value="All">All</option>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="list">
                    <h3>Accounts</h3>
                    <select onchange="filterAccounts(this.value)">
                        <option>Select</option>
                        <option value="Active">Users</option>
                        <option value="Pending">Creators</option>
                        <option value="Rejected">Moderators</option>
                    </select>
                </div>
                <div class="notifications">
                    <h3>Notifications</h3>
                    <ul>
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <h3>Settings</h3>
                    <ul id="settings">
                        <li><a href="creator profile.php">Profile</a></li>
                    </ul>
                </div>
                
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="stats">
                <div class="box" id="box1">All<br>Recipes<br><?php echo $all_recipes; ?></div>
                <div class="box" id="box2">Active Recipes<br><?php echo $active_recipes; ?></div>
                <div class="box" id="box3">Pending Recipes<br><?php echo $pending_recipes; ?></div>
                <div class="box" id="box4">Rejected Recipes<br><?php echo $rejected_recipes; ?></div>
            
                <div class="box" id="box5">Users<br><?php echo $users; ?></div>
                <div class="box" id="box6">Creators<br><?php echo $creators; ?></div>
                <div class="box" id="box7">Moderators<br><?php echo $moderators; ?></div>
            </div>

            <?php
                require 'db_connection.php';

                $filter = isset($_GET['filter']) ? $_GET['filter'] : 'All';

                if ($filter == 'All') {
                    $query = "SELECT Recipe_Name, Status, Cuisine FROM recipe";
                } else {
                    $query = "SELECT Recipe_Name, Status, Cuisine FROM recipe WHERE Status = '$filter'";
                }

                $result = mysqli_query($con, $query);

                $all_user_query = "SELECT *  FROM user";
                $all_recipes_query = "SELECT *  FROM recipe";
                $all_moderator_query = "SELECT *  FROM moderator";
               
                $all_user_result = mysqli_query($con, $all_user_query);
                $all_recipe_result = mysqli_query($con, $all_recipes_query);
                $all_moderator_result = mysqli_query($con, $all_moderator_query);

                $all_user = mysqli_fetch_assoc($all_user_result);
                $all_recipe = mysqli_fetch_assoc($all_recipe_result);
                $all_moderator = mysqli_fetch_assoc($all_moderator_result);

                
            ?>

                
            <div class="table-section">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        // Database connection
                        require 'db_connection.php';
                        

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                <td>".$row["Recipe_Name"]."</td>
                                <td>".$row["Status"]."</td>
                                <td>".$row["Cuisine"]."</td>
                                <td><a href='#'>Edit</a> | <a href='#'>Delete</a></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No results found!</td></tr>";
                        }
                    ?>

                </table>
            </div>

            <div class="table-section">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        // Database connection
                        require 'db_connection.php';
                        

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                <td>".$row["Recipe_Name"]."</td>
                                <td>".$row["Status"]."</td>
                                <td>".$row["Cuisine"]."</td>
                                <td><a href='#'>Edit</a> | <a href='#'>Delete</a></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No results found!</td></tr>";
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <script src="./JS/creator dashboard.js"></script>

    <footer>
        <?php //require_once('footer.php'); ?>
    </footer>

    <script>
        // Function to filter recipes by status
        function filterRecipes(status) {
            window.location.href = 'creator dashboard.php?filter=' + status;
        }

        // Function to filter recipes by status
        function filterRecipes(status) {
            window.location.href = 'creator dashboard.php?filter=' + status;
        }

    </script>

</body>
</html>