<html>
    <head>
        <?php session_start();
        $role=$_SESSION['role'];
        
        if($role=='admin'){
            header("Location: userList.php");
        }
        if($role==null)
            header("Location: Login.php");
        
        ?>
        <title>IndexTicket</title>
        <link href="../Content/Index.css" rel="stylesheet" />
        <link href="../Content/StyleSheet2.css" rel="stylesheet" />
        <link href="../Content/bootstrap.css" rel="stylesheet" />
        <script defer src="javascripts/script.js?v=2" ></script>
        <meta charset="utf-8">
    </head>
    <body style="background-color:rgb(251,251,251)">
       
        
        <div class="page-container">
            <div>
                <nav class="navbar navbar-expand-lg navbar-light fixed" style="background-color:white; padding-left:0px">
                    <div class="container">
                        <a href="../Home/indexticket.php">
                            <img src="../Images/logokorail.png" style="height:28px" />
                        </a>

                        <div class="collapse navbar-collapse" id="links" style="margin-left:100px">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/indexticket.php">Book Tickets</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/bookHistory.php">My Bookings</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/UserProfile.php">Profile</a>
                                </li>
                            </ul>
                        </div>
                        
                            <ul class="navbar-nav ml-auto">
                                <?php
                                    if($_SESSION['Email'] != null){
                                        echo"<li class='nav-item'><a class='nav-link' href='../Home/logout.php' style='margin-left:6px; margin-right:6px; font-size:14px'>Log out</a></li>";
                                    }
                                    else{
                                        echo"<li class='nav-item'><a class='nav-link' href='../Home/Login.php' style='margin-left:6px; margin-right:6px; font-size:14px'>Log out</a></li>";
                                    }
                                ?>
                            </ul>                        
                    </div>
                </nav>
                
                
                <form id="form" method="post" action="displayticket.php">
                    <div class="flex-container">
                    <div style="width:220px; height:386px; position:relative; background-image:linear-gradient(rgb(248,248,248) 97%,rgb(239,239,239) 3%)">
                        <h4 style="text-align: center; color:rgb(50,50,50); margin:auto; margin-top:25px; margin-bottom:0px; font-weight:bolder; font-size:20px">Buy your tickets</h4>
                        <h5 style="text-align: center; color:rgb(50,50,50); margin:auto; margin-top:0px; margin-bottom:56px; font-weight:lighter">Anytime, anywhere</h5>
                        <img src="../Images/lineup.png" class="image" />
                    </div>

                    <!--img bottom of div, position:absolute; bottom:0-->
                    
                     

                    <div style="width: 394px; padding:25px 25px 0px 25px">

                        
                        <div style="width: 162px">
                            &nbsp;&nbsp;&nbsp;&nbsp;Origin<br />
                            <select id="sta" name="startpoint" class="dropdownlist">
                                <option selected="selected" value=-1>Choose one</option>
                                    <?php
                                        $products = array(
                                                        0=> "Seoul", 
                                                        1=> "Yongsan", 
                                                        2=> "Yeongdeungpo", 
                                                        3=> "Gwangmyeong",
                                                        4=> "Suwon" ,
                                                        5=> "Pyeongtaek" ,
                                                        6=> "CheonanAsan" ,
                                                        7=> "Cheonan" ,
                                                        8=> "Jochiwon" ,
                                                        9=> "Daejeon" ,
                                                        10=> "Seodaejeon" ,
                                                        11=> "Gimcheon" ,
                                                        12=> "Gumi" ,
                                                        13=> "Gimcheon Gumi" ,
                                                        14=> "Daegu" ,
                                                        15=> "Dongdaegu" ,
                                                        16=> "Pohang" ,
                                                        17=> "Miryang" ,
                                                        18=> "Gupo" ,
                                                        19=> "Busan" ,
                                                        20=> "Singyeongju" ,
                                                        21=> "Taehwagang" ,
                                                        22=> "Ulsan" ,
                                                        23=> "Osong" ,
                                                        24=> "Masan" ,
                                                        25=> "ChangwonJungang" ,
                                                        26=> "Gyeongsan" ,
                                                        27=> "Nonsan" ,
                                                        28=> "Iksan" ,
                                                        29=> "Jeongeup" ,
                                                        30=> "Gwangju-Songjeong" ,
                                                        31=> "Mokpo" ,
                                                        32=> "Jeonju",
                                                        33=> "Suncheon" ,
                                                        34=> "Yeosu-Expo" ,
                                                        35=> "Daecheon" ,
                                                        36=> "Cheongnyangni" ,
                                                        37=> "Jecheon" ,
                                                        38=> "Donghae" ,
                                                        39=> "Gangneung" ,
                                                        40=> "Haengsin" ,
                                                        41=> "Chuncheon" ,
                                                        42=> "Namchuncheon" ,
                                                        43=> "Bujeon" ,
                                                        44=> "Sintanjin" ,
                                                        45=> "Yeongdeong" ,
                                                        46=> "Waegwan" ,
                                                        47=> "Wonju" ,
                                                        48=> "Jeongdongjin" ,
                                                        49=> "Hongseong",
                                                        50=> "Andong" ,
                                                        51=> "Angang" ,
                                                        52=> "Anin" ,
                                                        53=> "Anyang" ,
                                                        54=> "Baengyang-ri" ,
                                                        55=> "Baegyangsa",
                                                        56=> "Baengmahoji"
                                                          );
                    
                                        foreach($products as $key => $value){
                                            ?>
                                                <option value="<?php echo (string)$key; ?>">
                                                    <?php
                                                        echo $value;
                                                    ?>
                                                </option>
                                            <?php
                                        }
                                    ?>
                            </select> 
                        </div>

                        <div style="width: 162px">
                            &nbsp;&nbsp;&nbsp;Destination<br />
                            <select id="des" name="endpoint" class="dropdownlist">
                                <option selected="selected" value="-1">Choose one</option>
                                    <?php
                                        $products = array(
                                                        0=> "Seoul", 
                                                        1=> "Yongsan", 
                                                        2=> "Yeongdeungpo", 
                                                        3=> "Gwangmyeong",
                                                        4=> "Suwon" ,
                                                        5=> "Pyeongtaek" ,
                                                        6=> "CheonanAsan" ,
                                                        7=> "Cheonan" ,
                                                        8=> "Jochiwon" ,
                                                        9=> "Daejeon" ,
                                                        10=> "Seodaejeon" ,
                                                        11=> "Gimcheon" ,
                                                        12=> "Gumi" ,
                                                        13=> "Gimcheon Gumi" ,
                                                        14=> "Daegu" ,
                                                        15=> "Dongdaegu" ,
                                                        16=> "Pohang" ,
                                                        17=> "Miryang" ,
                                                        18=> "Gupo" ,
                                                        19=> "Busan" ,
                                                        20=> "Singyeongju" ,
                                                        21=> "Taehwagang" ,
                                                        22=> "Ulsan" ,
                                                        23=> "Osong" ,
                                                        24=> "Masan" ,
                                                        25=> "ChangwonJungang" ,
                                                        26=> "Gyeongsan" ,
                                                        27=> "Nonsan" ,
                                                        28=> "Iksan" ,
                                                        29=> "Jeongeup" ,
                                                        30=> "Gwangju-Songjeong" ,
                                                        31=> "Mokpo" ,
                                                        32=> "Jeonju",
                                                        33=> "Suncheon" ,
                                                        34=> "Yeosu-Expo" ,
                                                        35=> "Daecheon" ,
                                                        36=> "Cheongnyangni" ,
                                                        37=> "Jecheon" ,
                                                        38=> "Donghae" ,
                                                        39=> "Gangneung" ,
                                                        40=> "Haengsin" ,
                                                        41=> "Chuncheon" ,
                                                        42=> "Namchuncheon" ,
                                                        43=> "Bujeon" ,
                                                        44=> "Sintanjin" ,
                                                        45=> "Yeongdeong" ,
                                                        46=> "Waegwan" ,
                                                        47=> "Wonju" ,
                                                        48=> "Jeongdongjin" ,
                                                        49=> "Hongseong",
                                                        50=> "Andong" ,
                                                        51=> "Angang" ,
                                                        52=> "Anin" ,
                                                        53=> "Anyang" ,
                                                        54=> "Baengyang-ri" ,
                                                        55=> "Baegyangsa",
                                                        56=> "Baengmahoji"
                                                          );
                    
                                        foreach($products as $key => $value){
                                            ?>
                                                <option value="<?php echo (string)$key; ?>">
                                                    <?php
                                                        echo $value;
                                                    ?>
                                                </option>
                                            <?php
                                        }
                                    ?>
                            </select> 
                        </div>

                        <div style="width: 120px">
                            &nbsp;&nbsp;&nbsp;Category<br />
                            <select class="dropdownlist" name="category" id="category" style="width: 120px">
                            <option selected="selected" value="Regular">Regular</option>
                            <option  value="Students">Students</option>
                            <option  value="Senior citizens">Senior Citizens</option>
                            <option  value="Disabled">Disabled</option>
                        </select>
                        </div>

                        <div style="width: 120px">
                            &nbsp;&nbsp;&nbsp;Trip<br />
                            <select class="dropdownlist" name="trip" id="trip" style="width: 120px">
                            <option selected="selected" value="One Way">One Way</option>
                            <option  value="Return">Return</option>
                            </select>
                        </div>

                        <div style="width: 74px; margin-bottom:0px">
                            &nbsp;&nbsp;&nbsp;Quantity<br />
                            <input class="textbox" type="number" name="qty" id="qty" style = "width:74px; margin-bottom: 0px; height:32px" min="1" max="12" step="1" required><br />
                            <p style="text-align:center; margin:0px; font-size:10px; color:rgb(170,170,170)">Max: 12</p>
                        </div>

                        <div class="line" style="width: 340px; height:1px; margin: 8px 0 10px 0"></div>

                        <div style="width: 334px">
                            &nbsp;&nbsp;&nbsp;Full Name<br />
                            <?php
                                if($_SESSION['Name'] != null){
                                    $namo=$_SESSION['Name'];
                                    echo"<input class='textbox' type='text' value='$namo' name='name' id='name' style = 'width:334px; height: 32px; background-color: rgb(252,252,252); cursor: context-menu' readonly>";
                                }
                                else{
                                    echo"<input class='textbox' type='text' name='name' id='name' style = 'width:334px; height: 32px>";
                                }
                            
                            ?>
                        </div>

                        <div style="width: 130px">
                            &nbsp;&nbsp;&nbsp;IC/Passport No<br />
                            <?php
                            if($_SESSION['icpass'] != null){
                                $icpass=$_SESSION['icpass'];
                                echo"<input class='textbox' type='text' value='$icpass' name='ic' id='ic' style = 'width:130px; height: 32px; background-color: rgb(252,252,252); cursor: context-menu' readonly>";
                            }
                            else{
                                echo"<input class='textbox' type='text' name='ic' id='ic' style = 'width:130px; height: 32px>";
                            }
                            
                            ?>
                        </div>

                        <div style="width:194px">
                            &nbsp;&nbsp;&nbsp;Email<br />
                            <?php
                                if($_SESSION['Email'] != null){
                                    $usermail = $_SESSION['Email'];
                                    echo"<input class='textbox' type='text' value='$usermail' name='email' id='email' style = 'width:194px; height: 32px; background-color: rgb(252,252,252); cursor: context-menu' readonly>"; 
                                }
                                else{
                                    echo"<input class='textbox' type='text' name='email' id='email' style = 'width:194px; height: 32px>"; 
                                }
                                
                            ?>
                            
                        </div>

                        <div id="error" style="width:207px; float:left; margin-right:0px; color:#dc3545; padding:14px 0 0 10px">
                            
                        </div>

                        <div style="width:127px; margin-top:8px; margin-bottom:33px; margin-left:0px">
                            <div style="float:right">
                                <input type="submit" value="Purchase" class="button" />
                            </div>
                        </div>
                    </div>
                </div>    
                </form>
            </div>            
        </div>
        
        <script>
            $( document ).ready(function() {
                $('input').change(function() {
                  var n = $('input').val();
                  if (n < 1)
                    $('input').val(1);
                  if (n > 12)
                    $('input').val(12);
                });
            });
        </script>
    </body>
</html>

