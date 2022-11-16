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
            <section id="cardSection">
                <div class="container">
                    <div class="row">
                        <?php
                            if(isset($_GET["card"])){
                                $cardName = $_GET["card"];
                                $dbConnection = mysqli_connect("localhost", "root", "", "coolcardzdb");
                                if (!$dbConnection){
                                   die("Connection failed: " . $mysqli_connect_error);
                                }
                                $result = mysqli_query($dbConnection, "SELECT frontIMG, defaultText, cardName FROM cards WHERE cardName = '$cardName'");
                                $row = mysqli_fetch_assoc($result);
                                $defaultText = $row["defaultText"];
                                $image = $row["frontIMG"];
                
                                mysqli_close($dbConnection);
           
                                echo <<<editcard

                                <div class= "col">
                                    <h2><u>The front of the card</u></h2>
                                    <div id="printCardFront">
                                      <img id="frontIMG" src="{$image}" alt="Cool Card" />
                                    </div>
                                </div>
                                <div class= "col">
                                    <h2><u>The inside of the card</u></h2>
                                    <div id="printCardContents">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title" id="to">To</h5>
                                                <h5 class="card-title" id="toName">[to name goes here]</h5>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <h4 class="card-text" id="defaultText">{$defaultText}</h4>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <h6 class="card-text" id="fromLoveFrom">From</h6>
                                                <h6 class="card-text" id="fromName">[from name goes here]</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class= "col">
                                    <h2><u>Personalisation options</u></h2>
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">

                                        <form>

                                            <label for="toFontSize">To Font size: </label>
                                            <input type="number" id="toFontSize">
                                            <br><br>

                                            <label for="toFontStyle">To Font style: </label>
                                            <select id="toFontStyle">
                                                <option value="Times New Roman" style="font-family:'Times New Roman';">Times New Roman</option>
                                                <option value="Georgia" style="font-family:Georgia;">Georgia</option>
                                                <option value="Garamond" style="font-family:Garamond;">Garamond</option>
                                                <option value="Arial" style="font-family:Arial;">Arial</option>
                                                <option value="Verdana" style="font-family:Verdana;">Verdana</option>
                                                <option value="Helvetica" style="font-family:Helvetica;">Helvetica</option>
                                                <option value="Courier New" style="font-family:'Courier New';">Courier New</option>
                                                <option value="Lucida Console" style="font-family:'Lucida Console';">Lucida Console</option>
                                                <option value="Monaco" style="font-family:Monaco;">Monaco</option>
                                                <option value="Brush Script MT" style="font-family:'Brush Script MT';">Brush Script MT</option>
                                                <option value="Lucida Handwriting" style="font-family:'Lucida Handwriting';">Lucida Handwriting</option>
                                                <option value="Copperplate" style="font-family:Copperplate;">Copperplate</option>
                                                <option value="Papyrus" style="font-family:Papyrus;">Papyrus</option>
                                            </select>
                                            <br><br>

                                            <label for="toFontColour">To Font Colour: </label><br>
                                            <input type="color" id="toFontColour">
                                            <br>
                                            <hr>

                                            <label for="toNameInput">To Name: </label>
                                            <input type="text" id="toNameInput">
                                            <br><br>

                                            <label for="toNameFontSize">To Name Font size: </label>
                                            <input type="number" id="toNameFontSize">
                                            <br><br>

                                            <label for="toNameFontStyle">To Name Font style: </label>
                                            <select id="toNameFontStyle">
                                                <option value="Times New Roman" style="font-family:'Times New Roman';">Times New Roman</option>
                                                <option value="Georgia" style="font-family:Georgia;">Georgia</option>
                                                <option value="Garamond" style="font-family:Garamond;">Garamond</option>
                                                <option value="Arial" style="font-family:Arial;">Arial</option>
                                                <option value="Verdana" style="font-family:Verdana;">Verdana</option>
                                                <option value="Helvetica" style="font-family:Helvetica;">Helvetica</option>
                                                <option value="Courier New" style="font-family:'Courier New';">Courier New</option>
                                                <option value="Lucida Console" style="font-family:'Lucida Console';">Lucida Console</option>
                                                <option value="Monaco" style="font-family:Monaco;">Monaco</option>
                                                <option value="Brush Script MT" style="font-family:'Brush Script MT';">Brush Script MT</option>
                                                <option value="Lucida Handwriting" style="font-family:'Lucida Handwriting';">Lucida Handwriting</option>
                                                <option value="Copperplate" style="font-family:Copperplate;">Copperplate</option>
                                                <option value="Papyrus" style="font-family:Papyrus;">Papyrus</option>
                                            </select>
                                            <br><br>

                                            <label for="toNameFontColour">To Name Font Colour: </label><br>
                                            <input type="color" id="toNameFontColour">
                                            <br>
                                            <hr>

                                            <label for="defaultTextFontSize">Default text font size: </label>
                                            <input type="number" id="defaultTextFontSize">
                                            <br><br>

                                            <label for="defaultTextFontStyle">Default text font style: </label>
                                            <select id="defaultTextFontStyle">
                                                <option value="Times New Roman" style="font-family:'Times New Roman';">Times New Roman</option>
                                                <option value="Georgia" style="font-family:Georgia;">Georgia</option>
                                                <option value="Garamond" style="font-family:Garamond;">Garamond</option>
                                                <option value="Arial" style="font-family:Arial;">Arial</option>
                                                <option value="Verdana" style="font-family:Verdana;">Verdana</option>
                                                <option value="Helvetica" style="font-family:Helvetica;">Helvetica</option>
                                                <option value="Courier New" style="font-family:'Courier New';">Courier New</option>
                                                <option value="Lucida Console" style="font-family:'Lucida Console';">Lucida Console</option>
                                                <option value="Monaco" style="font-family:Monaco;">Monaco</option>
                                                <option value="Brush Script MT" style="font-family:'Brush Script MT';">Brush Script MT</option>
                                                <option value="Lucida Handwriting" style="font-family:'Lucida Handwriting';">Lucida Handwriting</option>
                                                <option value="Copperplate" style="font-family:Copperplate;">Copperplate</option>
                                                <option value="Papyrus" style="font-family:Papyrus;">Papyrus</option>
                                            </select>
                                            <br><br>

                                            <label for="defaultTextFontColour">Default Text Font Colour: </label><br>
                                            <input type="color" id="defaultTextFontColour">
                                            <br>
                                            <hr>
                                            
                                            <label for="fromNameInput">From Name: </label>
                                            <input type="text" id="fromNameInput">
                                            <br><br>

                                            <label for="fromNameFontSize">From Name Font size: </label>
                                            <input type="number" id="fromNameFontSize">
                                            <br><br>

                                            <label for="fromNameFontStyle">From Name Font style: </label>
                                            <select id="fromNameFontStyle">
                                                <option value="Times New Roman" style="font-family:'Times New Roman';">Times New Roman</option>
                                                <option value="Georgia" style="font-family:Georgia;">Georgia</option>
                                                <option value="Garamond" style="font-family:Garamond;">Garamond</option>
                                                <option value="Arial" style="font-family:Arial;">Arial</option>
                                                <option value="Verdana" style="font-family:Verdana;">Verdana</option>
                                                <option value="Helvetica" style="font-family:Helvetica;">Helvetica</option>
                                                <option value="Courier New" style="font-family:'Courier New';">Courier New</option>
                                                <option value="Lucida Console" style="font-family:'Lucida Console';">Lucida Console</option>
                                                <option value="Monaco" style="font-family:Monaco;">Monaco</option>
                                                <option value="Brush Script MT" style="font-family:'Brush Script MT';">Brush Script MT</option>
                                                <option value="Lucida Handwriting" style="font-family:'Lucida Handwriting';">Lucida Handwriting</option>
                                                <option value="Copperplate" style="font-family:Copperplate;">Copperplate</option>
                                                <option value="Papyrus" style="font-family:Papyrus;">Papyrus</option>
                                            </select>
                                            <br><br>

                                            <label for="fromNameFontColour">From Name Font Colour: </label><br>
                                            <input type="color" id="fromNameFontColour">
                                            <br>
                                            <hr>

                                            <label for="fromLoveFromOption">From/Love From: </label><br>
                                            <select id="fromLoveFromOption">
                                                <option value="From">From</option>
                                                <option value="Love From">Love From</option>
                                            </select>
                                            <br><br>

                                            <label for="fromLoveFromFontStyle">From/Love From Font style: </label>
                                            <select id="fromLoveFromFontStyle">
                                                <option value="Times New Roman" style="font-family:'Times New Roman';">Times New Roman</option>
                                                <option value="Georgia" style="font-family:Georgia;">Georgia</option>
                                                <option value="Garamond" style="font-family:Garamond;">Garamond</option>
                                                <option value="Arial" style="font-family:Arial;">Arial</option>
                                                <option value="Verdana" style="font-family:Verdana;">Verdana</option>
                                                <option value="Helvetica" style="font-family:Helvetica;">Helvetica</option>
                                                <option value="Courier New" style="font-family:'Courier New';">Courier New</option>
                                                <option value="Lucida Console" style="font-family:'Lucida Console';">Lucida Console</option>
                                                <option value="Monaco" style="font-family:Monaco;">Monaco</option>
                                                <option value="Brush Script MT" style="font-family:'Brush Script MT';">Brush Script MT</option>
                                                <option value="Lucida Handwriting" style="font-family:'Lucida Handwriting';">Lucida Handwriting</option>
                                                <option value="Copperplate" style="font-family:Copperplate;">Copperplate</option>
                                                <option value="Papyrus" style="font-family:Papyrus;">Papyrus</option>
                                            </select>
                                            <br><br>

                                            <label for="fromLoveFromFontColour">From/Love From Font Colour: </label><br>
                                            <input type="color" id="fromLoveFromFontColour">
                                            <br>
                                            <hr>

                                        </form>
                                        <button id="loadChanges" class="btn btn-primary">Load Changes</button>
                                        <br><br>
                                        <button id="printConvert" class="btn btn-secondary">Print Card/ Convert Card to PDF</button>
                                        </div>
                                    </div>
                                <div>
editcard;
                            }
                            else{

                                echo'<p>ERROR: no card has been selected!</p>';

                            }
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
    <script>
        $(document).ready(function(){

            $("#loadChanges").click(function(){

                $("#to").css("color", $("#toFontColour").val());
                $("#to").css("font-size", $("#toFontSize").val() + "px");
                $("#to").css("font-family", $("#toFontStyle").val());

                $("#toName").text($("#toNameInput").val());
                $("#toName").css("color", $("#toNameFontColour").val());
                $("#toName").css("font-size", $("#toNameFontSize").val() + "px");
                $("#toName").css("font-family", $("#toNameFontStyle").val());

                $("#defaultText").css("color", $("#defaultTextFontColour").val());
                $("#defaultText").css("font-size", $("#defaultTextFontSize").val() + "px");
                $("#defaultText").css("font-family", $("#defaultTextFontStyle").val());

                $("#fromName").text($("#fromNameInput").val());
                $("#fromName").css("color", $("#fromNameFontColour").val());
                $("#fromName").css("font-size", $("#fromNameFontSize").val() + "px");
                $("#fromName").css("font-family", $("#fromNameFontStyle").val());

                $("#fromLoveFrom").text($("#fromLoveFromOption").val());
                $("#fromLoveFrom").css("color", $("#fromLoveFromFontColour").val());
                $("#fromLoveFrom").css("font-family", $("#fromLoveFromFontStyle").val());
                
            });

            $("#printConvert").click(function() {

                var frontIMGheight = document.getElementById("frontIMG").height;
                var frontIMGwidth = document.getElementById("frontIMG").width;

                $("#frontIMG").css("width", "700px");
                $("#frontIMG").css("height", "950px");

                var cardFront = $("#printCardFront").html();
                var cardContents = $("#printCardContents").html();
                var printWindow = window.open('', '', 'height=400,width=800');
                printWindow.document.write('<html><head><title>Your Cool Card</title></head><body>');
                printWindow.document.write(cardFront);
                printWindow.document.write(cardContents);
                printWindow.document.write('</body></html>');

                $("#frontIMG").css("width", frontIMGwidth + "px");
                $("#frontIMG").css("height", frontIMGheight + "px");

                printWindow.document.close();
                printWindow.print();

            });
            
        });   
    </script>
</html>