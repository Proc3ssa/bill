<?php 
include 'engine/display.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon">
    <title>Water Bill</title>

    <script>
        function results(){
            var data = document.getElementById('data');
            var input = document.getElementById('input');

            data.style.display = "grid";
            input.style.display = "none";

        }

        function input(){
            var data = document.getElementById('data');
            var input = document.getElementById('input');

            input.style.display = "grid";
            data.style.display = "none";

        }
    </script>

    
</head>

<body>

    <div class="main" id="input">
        <h2>WATER BILL</h2>
        <form action="engine/index.php" method="post">
       
            <fieldset>
                <legend>Inputs</legend>

                <label for="month">Select month</label>
                <select name="month" id="" required>
                    <option value="" class="0">--select--</option>
                    <option value="january" class="0">january</option>
                    <option value="february" class="0">february</option>
                    <option value="march" class="0">march</option>
                    <option value="april" class="0">april</option>
                    <option value="may" class="0">may</option>
                    <option value="june" class="0">june</option>
                    <option value="july" class="0">july</option>
                    <option value="august" class="0">august</option>
                    <option value="september" class="0">september</option>
                    <option value="october" class="0">october</option>
                    <option value="november" class="0">november</option>
                    <option value="december" class="0">december</option>
                </select>

        <label for="amount" id="amount">Amount </label>
        <input type="number"  name="amount" id="" required><a> /GHc</a><br>
        <br>
        <label for="no-of-apartments">No. of apartments</label>
        <input type="number" name="numOfAp" id="numOfApts" required onchange="typed()">

                <article>
                    <table border id="mytable">
                        <tr>
                            <th>Apartment</th>
                            <th>No. of tenants</th>
                        </tr>

                    </table>
                    <br>


                </article>
                <button type="submit">Done</button>
                 <button onclick="results()">Data</button>
            </fieldset>
        </form>


        <div class="graph">

        </div>
    </div>

    <!-- have set display to none; you can change -->
     
    <div class="results" style="display:none;" id="data">
        <button onclick="input()"> << input</button>
        <h2>Results</h2>

        <div class="res">
            <h4> Month:

                <select name="month" id="" required>

                    <option value="january" class="0">JANUARY</option>
                    <option value="february" class="0">FEBRUARY</option>
                    <option value="march" class="0">MARCH</option>
                    <option value="april" class="0">APRIL</option>
                    <option value="may" class="0">MAY</option>
                    <option value="june" class="0">JUNE</option>
                    <option value="july" class="0">JULY</option>
                    <option value="august" class="0">AUGUST</option>
                    <option value="september" class="0">SEPTEMBER</option>
                    <option value="october" class="0">OCTOBER</option>
                    <option value="november" class="0">NOVEMBER</option>
                    <option value="december" class="0">DECEMBER</option>
                </select>
                </select>
                Amount:<a style="color:orange;margin:0 10px 0">GHc<?php echo $fetch['amount']?></a> Amount Per Person:<a
                    style="color:aqua">GHc<?php echo $perPerson ?></a>
            </h4>



        </div>


       

        <?php 
        $billSelect = "SELECT *FROM bills where mont = 'may'";
        $billquery = mysqli_query($connection, $billSelect);


        while($billFetch = mysqli_fetch_assoc($billquery)){
           $aptsSelect = "SELECT *FROM apts where id = ".$billFetch['aptsId']."";
           $aptsquery = mysqli_query($connection,$aptsSelect);

           while($aptsfetch = mysqli_fetch_assoc($aptsquery)){

            $tntsselect = 'SELECT numOfTents from apts where aptname = "'.$aptsfetch["aptname"].'" and id ="'.$aptsfetch["id"].'"';

            //echo $tntsselect;

            $tntsquery = mysqli_query($connection,$tntsselect);
            $tntsresult = mysqli_fetch_assoc($tntsquery);

                echo '<div class="apartment">
                
                <h3>'.$aptsfetch["aptname"].'</h3>

                <div class="data">
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Number of tenants</h4>
                    <h1 style="color:red; text-align:center;margin-top:-4px">'.$tntsresult["numOfTents"].'</h1>
                </div>
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Total amount</h4>
                    <h1 style="color:green; text-align:center;margin-top:-4px">GHc'.$perPerson*$tntsresult["numOfTents"].'</h1>
                </div>
                <div class="datas" style="background-color:white"></div>
            </div>
        </div>
                
                ';



           }

        }


       
          
            
            ?>

           
        <!-- <div class="apartment">
            <h3>Apartment 2</h3>

            <div class="data">
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Number of tenants</h4>
                    <h1 style="color:red; text-align:center;margin-top:-4px">4</h1>
                </div>
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Total amount</h4>
                    <h1 style="color:green; text-align:center;margin-top:-4px">GHc53</h1>
                </div>
                <div class="datas" style="background-color:white"></div>
            </div>
        </div>
        <div class="apartment">
            <h3>Apartment 3</h3>

            <div class="data">
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Number of tenants</h4>
                    <h1 style="color:red; text-align:center;margin-top:-4px">0</h1>
                </div>
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Total amount</h4>
                    <h1 style="color:green; text-align:center;margin-top:-4px">GHc0</h1>
                </div>
                <div class="datas" style="background-color:white"></div>
            </div>
        </div>
        <div class="apartment">
            <h3>Apartment 4</h3>

            <div class="data">
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Number of tenants</h4>
                    <h1 style="color:red; text-align:center;margin-top:-4px">6</h1>
                </div>
                <div class="datas">
                    <h4 style="text-align: center; color:blue">Total amount</h4>
                    <h1 style="color:green; text-align:center;margin-top:-4px">GHc101</h1>
                </div>
                <div class="datas" style="background-color:white"></div>
            </div>
        </div> -->

        <p>copyright&copy; processor 2023</p>

    </div>
</body>
<script src="./main.js"></script>
</html>