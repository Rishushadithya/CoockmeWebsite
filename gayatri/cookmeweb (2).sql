CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `email`, `password`) VALUES
(1, 'Nishan Abeysekara', 'nishan@gmail.com', 'nish');


CREATE TABLE `contact_us` (
  `Message_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `contact_us` (`Message_ID`, `User_ID`, `Email`, `Message`) VALUES
(1, 6, 'piter@gmail.com', 'Am in love with ur Recipies. Wish u Good Luck'),
(2, 7, 'jane.doe@example.com', 'Your recipes are amazing! Keep up the great work.'),
(3, 8, 'john.smith@example.com', 'I tried your lasagna recipe and it was fantastic!'),
(4, 9, 'alice.wonderland@example.com', 'The French toast recipe is a hit in my family. Thank you!'),
(5, 10, 'bob.builder@example.com', 'Great website! I love the variety of recipes you offer.');



CREATE TABLE `creator` (
  `Creator_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Bio` varchar(1000) DEFAULT NULL,
  `Current_Work` varchar(100) DEFAULT NULL,
  `Years_of_Experience` int(11) DEFAULT NULL,
  `Profile_Image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`Creator_ID`, `User_ID`, `Title`, `Bio`, `Current_Work`, `Years_of_Experience`, `Profile_Image`) VALUES
(3, 1, 'Chef', 'I am a passionate chef with a deep love for creating flavorful and innovative dishes. With years of experience in the kitchen, I specialize in crafting meals that balance creativity and tradition. My culinary journey has taken me through various cuisines, allowing me to refine my skills and bring unique flavors to the table. I thrive on using fresh, quality ingredients to deliver memorable dining experiences, and I’m dedicated to continually learning and evolving in the world of cooking.', 'Chef', 5, NULL);
INSERT INTO `creator` (`Creator_ID`, `User_ID`, `Title`, `Bio`, `Current_Work`, `Years_of_Experience`, `Profile_Image`) VALUES
(4, 2, 'Baker', 'I am a dedicated baker with a passion for crafting delicious breads, pastries, and desserts. With a strong focus on precision and creativity, I specialize in transforming simple ingredients into beautifully baked goods that delight the senses. My experience spans from traditional recipes to innovative techniques, always ensuring quality and flavor. I take pride in using fresh, high-quality ingredients to create baked treats that bring joy and comfort to every occasion.', 'Baker', 41, NULL);
INSERT INTO `creator` (`Creator_ID`, `User_ID`, `Title`, `Bio`, `Current_Work`, `Years_of_Experience`, `Profile_Image`) VALUES
(5, 3, 'Culinary Expert', 'I am a culinary expert with extensive experience in the art of cooking and food preparation. My expertise spans a variety of cuisines and techniques, allowing me to craft exceptional dishes that delight the senses. With a strong foundation in flavor development, ingredient selection, and presentation, I’m passionate about creating memorable dining experiences. Dedicated to continuous learning, I stay at the forefront of culinary trends and innovations to elevate my craft and inspire others.', 'Culinary Expert', 6, NULL);
INSERT INTO `creator` (`Creator_ID`, `User_ID`, `Title`, `Bio`, `Current_Work`, `Years_of_Experience`, `Profile_Image`) VALUES
(6, 4, 'chef', 'I am a skilled pastry chef with a passion for creating exquisite desserts and pastries. My expertise lies in blending traditional techniques with modern flavors to produce visually stunning and delicious treats. With years of experience in high-end patisseries, I excel in crafting everything from delicate pastries to elaborate cakes. My dedication to quality and creativity ensures that each creation is a work of art that delights the palate.', 'Pastry Chef', 10, NULL);
INSERT INTO `creator` (`Creator_ID`, `User_ID`, `Title`, `Bio`, `Current_Work`, `Years_of_Experience`, `Profile_Image`) VALUES
(7, 5, 'Chef', 'As a sous chef, I bring a wealth of experience and a passion for culinary excellence to the kitchen. My role involves supporting the head chef in menu planning, ingredient selection, and kitchen management. With a keen eye for detail and a commitment to quality, I ensure that every dish meets the highest standards. My background in various cuisines allows me to contribute creatively to the culinary team, always striving to enhance the dining experience for our guests.', 'Sous Chef', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `Favorite_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Recipe_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`Favorite_ID`, `User_ID`, `Recipe_ID`) VALUES
(1, 4, 26),
(2, 3, 28),
(3, 5, 30),
(4, 6, 23),
(1, 5, 27);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `Moderator_ID` int(11) NOT NULL,
  `Moderator_Name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`Moderator_ID`, `Moderator_Name`, `email`, `password`) VALUES
(1, 'Amal Perera', 'amal123@gamail.com', 'amal'),
(2, 'Daham Dasanayake', 'daham@gmail.com', 'daham');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `Recipe_ID` int(11) NOT NULL,
  `Creator_ID` int(11) DEFAULT NULL,
  `Recipe_Name` varchar(100) NOT NULL,
  `Image` mediumblob DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Ingredients` varchar(1000) DEFAULT NULL,
  `Method` varchar(1000) DEFAULT NULL,
  `Serves` int(11) DEFAULT NULL,
  `Prepare_Time` int(11) DEFAULT NULL,
  `Cook_Time` int(11) DEFAULT NULL,
  `Cuisine` varchar(50) DEFAULT NULL,
  `Difficulty` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`Recipe_ID`, `Creator_ID`, `Recipe_Name`, `Image`, `Description`, `Ingredients`, `Method`, `Serves`, `Prepare_Time`, `Cook_Time`, `Cuisine`, `Difficulty`, `Status`) VALUES
(19, 3, 'Instant Pot Spaghetti & Meatballs', 'image 1', '\"Instant Pot Spaghetti & Meatballs offers a quick, hearty meal with tender pasta, flavorful meatballs, and rich tomato sauce.\"', '1 egg\r\n½ cup bread crumbs\r\n2 tablespoons milk\r\n2 tablespoons chopped parsley\r\n1 ½ teaspoons Italian seasoning\r\n½ teaspoon garlic powder\r\n½ teaspoon salt\r\n½ teaspoon black pepper\r\n1 pound 85% lean ground beef\r\n1 tablespoon olive oil\r\n1 pound spaghetti broken in half\r\n1 (24-ounce) jar marinara sauce\r\n3 cups water\r\nFreshly grated Parmesan cheese for serving\r\nFresh Basil for serving', 'Step 1: Beat the egg in a large bowl. Add the breadcrumbs, milk, parsley, Italian seasoning, garlic powder, salt, and pepper, and stir to combine.\r\nStep 2: Add the ground beef and mix again to combine. Form into meatballs.\r\nStep 3: Once hot, add the olive oil to the Instant Pot, add the meatballs, and cook until browned all over.\r\nStep 4: Add the broken spaghetti directly on top of the meatballs.\r\nStep 5: Add the marinara and water on top of the meatballs; do not stir.\r\nStep 6: Cook on high pressure and release the pressure manually. Stir the pasta and sauce so everything is well combined.\r\n', 6, 5, 40, 'Italian', '4', 'Active');
INSERT INTO `recipe` (`Recipe_ID`, `Creator_ID`, `Recipe_Name`, `Image`, `Description`, `Ingredients`, `Method`, `Serves`, `Prepare_Time`, `Cook_Time`, `Cuisine`, `Difficulty`, `Status`) VALUES
(20, 4, 'Vegetable Lasagna','image 2' , '\"Vegetable Lasagna is a flavorful, layered dish with fresh vegetables, rich tomato sauce, creamy cheese, and tender pasta sheets.\"', 'Lasagna sheets\r\nOlive oil\r\nOnion\r\nBell pepper\r\nSliced Baby Bella mushrooms\r\nFrozen spinach\r\nGarlic\r\nRicotta cheese\r\nEgg\r\nItalian seasoning\r\nMarinara sauce\r\nMozzarella cheese\r\nParmesan cheese', 'Step 1: Add the ricotta, egg, Italian seasoning, black pepper, and a pinch of salt to a medium bowl.\r\nStep 2: Mix the ricotta mixture until smooth.\r\nStep 3: Add olive oil to a large pot. Add onion, green pepper, and mushrooms and cook until the vegetables have softened and the mushrooms have released all of their moisture.\r\nStep 4: Add the spinach, garlic, and remaining salt.\r\nStep 5: Add a very thin layer of marinara sauce to the bottom of a baking dish.\r\nStep 6: Add a layer of noodles.\r\nStep 7: Add a layer of the vegetable mixture.\r\nStep 8: Dollop the ricotta mixture on top of the veggies, smoothing it into a somewhat even layer.\r\nStep 9: Add a thin layer of marinara on top of the ricotta mixture, then top with mozzarella.\r\nStep 10: Add another layer of noodles. Repeat this layering process two more times so you have a total of three layers. Add the remaining marinara sauce on top of the final layer of noodles, followed by the remaining mozzarella and all of the grated parmesan chees', 12, 20, 65, 'Italian', '2', 'Pending');
INSERT INTO `recipe` (`Recipe_ID`, `Creator_ID`, `Recipe_Name`, `Image`, `Description`, `Ingredients`, `Method`, `Serves`, `Prepare_Time`, `Cook_Time`, `Cuisine`, `Difficulty`, `Status`) VALUES
(21, 5, 'Taco Pasta Salad', 'image 3', '\"Taco Pasta Salad combines zesty taco flavors with pasta, fresh vegetables, beans, cheese, and a tangy dressing for a vibrant dish.\"', 'Lime\r\ngarlic\r\ntaco seasoning\r\nhoney\r\noil\r\nNoodles\r\nBlack beans\r\nBell pepper\r\nTomatoes\r\nCorn\r\nRed onion\r\nCilantro\r\nAvocado', 'Step 1: In a large serving bowl whisk the lime zest and juice, garlic, taco seasoning, honey, salt, and pepper together until combined.\r\nStep 2: Slowly drizzle in the oil, whisking vigorously until emulsified.\r\nStep 3: Add the cooked pasta to a large serving bowl. Toss with the dressing.\r\nStep 4: Add the black beans, bell pepper, cherry tomatoes, corn, red onion, and cilantro to the pasta.\r\nStep 5: Toss until evenly mixed.\r\nStep 6: Chill and add the cubed avocado right before serving.\r\n\r\n', 12, 15, 20, 'Italian', '2', 'Active');
INSERT INTO `recipe` (`Recipe_ID`, `Creator_ID`, `Recipe_Name`, `Image`, `Description`, `Ingredients`, `Method`, `Serves`, `Prepare_Time`, `Cook_Time`, `Cuisine`, `Difficulty`, `Status`) VALUES
(22, 4, 'Pistachio Pasta', 'image 4', '\"Pistachio Pasta features a creamy, nutty sauce made from blended pistachios, tossed with pasta for a rich, flavorful meal.\"', 'Chickapea Pasta\r\nPistachios\r\nFresh Basil Leaves\r\nGreen Onions\r\nGarlic Cloves\r\nLemon Juice\r\nSalt and Black Pepper\r\nExtra-Virgin Olive Oil\r\nMilk of Choice', 'Step 1: Add the pistachios to the blender and chop until finely ground. Remove a couple of tablespoons of the ground pistachios. Set aside.\r\nStep 2: Add the basil, green onions, garlic, lemon juice, salt, pepper, and olive oil continue blending to form a pesto.\r\nStep 3: Add the milk on top of the pesto.\r\nStep 4: Mix until the sauce is completely smooth and creamy. Set aside.\r\nStep 5: After the pasta has cooked, add it back to the pot along with pistachio sauce.\r\nStep 6: Stir frequently until the pasta is warmed through and well combined with the sauce.\r\n', 4, 15, 10, 'Italian', '5', 'Active');
INSERT INTO `recipe` (`Recipe_ID`, `Creator_ID`, `Recipe_Name`, `Image`, `Description`, `Ingredients`, `Method`, `Serves`, `Prepare_Time`, `Cook_Time`, `Cuisine`, `Difficulty`, `Status`) VALUES
(23, 3, 'Fettuccine Alfredo', 'image 5', '\"Fettuccine Alfredo is a classic Italian dish with tender pasta coated in a creamy, buttery sauce, flavored with Parmesan cheese.\"', 'Fettuccine pasta\r\nButter\r\nMilk\r\nGarlic powder\r\nPecorino Romano and Parmesan cheeses', 'Step 1: In a large saucepan, melt the butter.\r\nStep 2: Slowly add the milk, then season it with salt, pepper, and garlic powder.\r\nStep 3: Stir to warm the milk.\r\nStep 4: Transfer the reserved cooked pasta on top of the butter and milk mixture. Add the reserved pasta water and stir until the sauce clings to the pasta.\r\nStep 5: Add the grated cheeses.\r\nStep 6: Stir until the sauce has thickened.\r\n', 8, 5, 20, 'Italian', '4', 'Pending');
INSERT INTO `recipe` (`Recipe_ID`, `Creator_ID`, `Recipe_Name`, `Image`, `Description`, `Ingredients`, `Method`, `Serves`, `Prepare_Time`, `Cook_Time`, `Cuisine`, `Difficulty`, `Status`) VALUES
(24, 4, 'Ham, Cranberry And Camembert French Toasts','image 6' , '\"Ham, Cranberry, and Camembert French Toasts combine savory ham, tart cranberries, and creamy Camembert on golden, crispy French toast slices.\"', '4 eggs, at room temperature\r\n¾ cup milk\r\n25g (1/3 cup) finely grated parmesan cheese\r\nSalt and pepper\r\n8 slices sourdough bread\r\n¼ cup (80g) cranberry jelly\r\n4 slices (60g each) leftover Christmas ham\r\n150g leftover camembert, sliced\r\n2 tablespoons seeded mustard\r\nButter, for greasing\r\nExtra seeded mustard, to serve\r\nCornichons, to serve', 'Step 1 - Preheat oven to 120°C fan forced. Whisk eggs, milk, parmesan, salt and pepper together in a shallow dish.\r\nStep 2 - Spread one side of half the bread slices with cranberry jelly and top with ham and camembert. Spread remaining bread with mustard and sandwich together.\r\nStep 3 - Grease a large non-stick frying pan with butter and melt over medium heat. Dip 2 sandwiches into the egg mixture for about 15 seconds each side.\r\nStep 4 - Add to pan and cook for 2-3 minutes each side or until golden brown. Transfer to an oven tray in the oven to keep warm. Repeat with remaining butter, egg mixture and sandwiches.\r\nStep 5 - Slice French toast in half and serve with extra mustard and cornichons.', 4, 10, 15, 'French', '4', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Contact_Number` varchar(15) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `First_Name`, `Last_Name`, `email`, `Country`, `Contact_Number`, `password`) VALUES
(1, 'Rishush', 'Adithya', 'rishush@gmail.com', 'Sri Lanka', '071 2456781', 'rishu'),
(2, 'Imalka', 'Deshan', 'imalka@gmail.com', 'Japan', '071 2354876', 'imal'),
(3, 'Guwan', 'Dehigasthanna', 'guwan@gmail.com', 'USA', '077 5634985', 'guwa'),
(4, 'Chathuranga', 'Weerakkody', 'chathuranga@gmail.com', 'India', '078 9876453', 'chathu'),
(5, 'Sithum', 'Bandara', 'sithum@gmail.com', 'UK', '076 3452671', 'sithu'),
(6, 'piter', 'Pan', 'piter@gmail.com', 'New Zealand', '078 5643274', 'piter'),
(7, 'gayathri', 'rajapaksha', 'gayathri@gmail.com', 'Sri Lanka', '0987654', 'gaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Message_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`Creator_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`Favorite_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Recipe_ID` (`Recipe_ID`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`Moderator_ID`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`Recipe_ID`),
  ADD KEY `Creator_ID` (`Creator_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `Creator_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `Favorite_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `Moderator_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `Recipe_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `creator`
--
ALTER TABLE `creator`
  ADD CONSTRAINT `creator_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`Recipe_ID`) REFERENCES `recipe` (`Recipe_ID`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`Creator_ID`) REFERENCES `creator` (`Creator_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
