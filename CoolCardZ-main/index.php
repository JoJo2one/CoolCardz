<!DOCTYPE html>
<html>
<head>
    <?php include 'include/head.php' ?>
</head>

<body>  
    <header>
        <?php include 'include/header.php' ?>
    </header>

    <div class="container flex-grow-1">
        <main class="d-flex flex-column justify-content-center align-items-start">
            <?php 
            $categoryHead = "Our Cardz";
            $category = null;
            if(isset($_GET["category"])){
                $categoryHead = $_GET["category"] . " Cardz";
                $category = $_GET["category"];
            }
            
            ?>

            <h1 class="text-decoration-underline"><?php echo"{$categoryHead}"; ?></h1>
            <section id="cardSection">
                
                <div class="container">
		            <div class="row">
                        <?php
                            $dbConnection = mysqli_connect("localhost", "root", "", "coolcardzdb");
                            if (!$dbConnection){
                              die("Connection failed: " . $mysqli_connect_error);
                            }

                            if(($category != "Our Cards") && ($category != null)){
                                $result = mysqli_query($dbConnection, "SELECT frontIMG, cardName, category FROM cards WHERE category = '$category'");
                                $numbRows = mysqli_num_rows($result);
                                for ($i=0; $i<$numbRows; $i++){

                                    $row = mysqli_fetch_assoc($result);
                                    $image = $row["frontIMG"];
                                    $cardName = $row["cardName"];

                                    echo <<<index
                                    <div class="col">
                                        <div class="card" style="width: 18rem;">
                                            <img src="{$image}" class="card-img-top" alt="Cool card">
                                            <div class="card-body">
                                                <form action="editCard.php" method="GET"><button type="submit" class="btn btn-primary" name ="card" value="{$cardName}">Use this card</button></form>
                                            </div>
                                        </div>
                                    <br>
                                </div>
index;
                                }
                            }
                            else{
                                $result = mysqli_query($dbConnection, "SELECT frontIMG, cardName FROM cards");
                                $numbRows = mysqli_num_rows($result);
                                for ($i=0; $i<$numbRows; $i++){
                                    $row = mysqli_fetch_assoc($result);
                                    $image = $row["frontIMG"];
                                    $cardName = $row["cardName"];

                                    echo <<<index
                                    <div class="col">
                                        <div class="card" style="width: 18rem;">
                                            <img src="{$image}" class="card-img-top" alt="Cool card">
                                            <div class="card-body">
                                                <form action="editCard.php" method="GET"><button type="submit" class="btn btn-primary" name ="card" value="{$cardName}">Use this card</button></form>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
index;
                                }
                            }                  
                            mysqli_close($dbConnection);
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <footer class="">
        <?php include 'include/footer.php' ?>
    </footer>
</body>
</html>