<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!------Header + Navigation bar------->
    <header>
        <!-- Top header -->
        <div id='top_header'>
            <div class="container">
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-inr"></i>ABC Cooperation</a></li>
                    <!-- user login system goes here!!!!--->
                    <!-- create MYSQL for users -->
                    <!-- loop goes here -->
                    
                </ul>



            </div>



        </div>
        <!-- Top header ends -->

            <!---- navigation bar ----->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <!-- LOGO HERE -->
                 <a class="navbar-brand" href="#" style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif"> Darwin ABC </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- please remember to insert the link when click into HOME --->
                            <a class="nav-link active" aria-current="page" href="#">Home</a></li>

                            <!-- drop down menu here -->
                            <?php
                            $statement = $db->prepare('SELECT * FROM ABCtop_categories WHERE show_on_menu =1');
                            $statement -> execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row){
                                ?>
                                <li><a href="product-category.php?id=<?php echo $row['ABCtop_id']; ?>&type=top-category"><?php echo $row['ABCtop_name']; ?></a>
                                    <ul>
                                        <?php
									    $statement1 = $db->prepare("SELECT * FROM ABCmid_categories WHERE ABCtop_id=?");
									    $statement1->execute(array($row['ABCtop_id']));
									    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
									    foreach ($result1 as $row1) {
                                         ?>
                                         <li><a href="product-category.php?id=<?php echo $row1['ABCmid_id']; ?>&type=mid-category"><?php echo $row1['ABCmid_name']; ?></a>
                                            <ul>
                                                <?php
                                                $statement2 = $db->prepare("SELECT * FROM ABCend_categories WHERE ABCmid_id=?");
                                                $statement2->execute(array($row1['ABCmid_id']));
                                                $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result2 as $row2) {
                                                    ?>
                                                    <li><a href="product-category.php?id=<?php echo $row2['ABCend_id']; ?>&type=end-category"><?php echo $row2['ABCend_name']; ?></a></li>
                                                    <?php
                                                } ?>



                                            </ul>
                                         </li>
                                         <?php
                                        } ?>
                                    </ul>
                                </li>
                                <?php


                            }
                            ?>






    </header>
    <!----- Top header ends------>


    









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    
</body>
</html>
