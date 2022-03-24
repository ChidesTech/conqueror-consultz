
<?php include("./partials/sidebar.php") ?>
                 <?php
                 
                 $sql1 = "SELECT * FROM tbl_admin ";
                   $res1 = mysqli_query($conn, $sql1);
                    $count1 = mysqli_num_rows($res1); 
                 $sql2 = "SELECT * FROM tbl_property ";
                   $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2); 
                 $sql3 = "SELECT * FROM tbl_property WHERE prop_type='land' ";
                   $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3); 
                 $sql4 = "SELECT * FROM tbl_property WHERE prop_type='building' ";
                   $res4 = mysqli_query($conn, $sql4);
                    $count4 = mysqli_num_rows($res4); 
                 $sql5 = "SELECT * FROM tbl_property WHERE type='sale' ";
                   $res5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($res5); 
                 $sql5 = "SELECT * FROM tbl_property WHERE type='rent' ";
                   $res5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($res5);                 
                    ?>  


        <main style="margin-top:-2rem">
            <div class="cards">
                <!-- ========================= -->
                <div style="background-color: #DD2F6E; border: 2px solid #DD2F6E;" class="card-single">
                    <div>
                   
                        <h1 style="color: white;"><?=$count1?></h1>
                        <span style="color: white;">Realtors</span>
                    </div>
                    <div><span style="color: white;" class="fa fa-users"></span></div>
                </div>
                <!-- ========================= -->
                <div style="background-color: navy; border: 2px solid navy;" class="card-single">
                    <div>
                        <h1><?=$count2?></h1>
                        <span>Properties</span>
                    </div>
                    <div><span class="fas fa-home"></span></div>
                </div>
                <!-- ========================= -->
                <div style="background-color: green;border: 2px solid green;" class="card-single">
                    <div>
                        <h1><?=$count3?></h1>
                        <span>Lands</span>
                    </div>
                    <div><span class="fas fa-map-marker-alt"></span></div>
                </div>
                <!-- ========================= -->
                <div style="background-color: brown;border: 2px solid brown;" class="card-single">
                    <div>
                        <h1><?=$count4?></h1>
                        <span>Buildings</span>
                    </div>
                    <div><span class="fas fa-home"></span></div>
                </div>
                <!-- ========================= -->
                <div style="background-color: red;border: 2px solid red;" class="card-single">
                    <div>
                        <h1><?=$count4?></h1>
                        <span>For Sale</span>
                    </div>
                    <div><span class="fas fa-map-marker-alt"></span></div>
                </div>
                <!-- ========================= -->
                <div style="background-color: purple;border: 2px solid purple;" class="card-single">
                    <div>
                    <h1><?=$count5?></h1>
                        <span>For Rent</span>
                    </div>
                    <div><span class="far fa-paper-plane"></span></div>
                </div>
               
            </div>
        </main>
<?php include("./partials/footer.php") ?>
  