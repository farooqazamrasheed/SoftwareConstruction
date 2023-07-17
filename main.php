<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            padding: 0px;
        }

        .mybutton {
            padding: 10px;
            font-size: 20px;
            color: black;
            background-color:white;
            border: none;
            font-weight: bold;
            margin-left: 70px;
        }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include 'database.php';
    $sql = "SELECT * from categories";
    $result = mysqli_query($conn, $sql);


    ?>
    <div style="width:100%; height:80px;">
        </div>

    
    <div style="background-color:;padding-left:0px; padding-bottom:10px; width:100%; padding-top:px; margin-top:-40px;">
        <img src="data/logo.png" style="width:20%; height:100px; margin-top:-18px;margin-left:30px">
        <button class="mybutton" style="margin-left: 150px;">Home</button>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                ?>
               <a href="allproductsuser.php?id='<?php echo $row['categoryid'];?>'"><button class="mybutton">
                    <?php echo $row['category_name'] ?>
                </button></a>

                <?php
            }
        }
        ?>

    </div>

    <div class="row">
        <div class="col-lg-3">
            <?php
            $sql2 = "SELECT * from categories";
            $result2 = mysqli_query($conn, $sql2);

            ?>
            <div class="accordion accordion-flush" id="accordionFlushExample"
                style="margin-top:50px; width:70%; margin-left:30px;">
                <h4 style="margin-left:10px">SHOP BY</h4>
                <div class="accordion-item">


                    <a href="adduser.php" style="text-decoration:none;">
                        <div class="accordion-body m-0" style="background-color:#eeeeee; color:black;">
                            Categories
                        </div>
                    </a>
                    <div class="accordion-item">
                        <?php
                        $i = 1;
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                ?>
                                <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">
                                    <button class="accordion-button collapsed" type="button"
                                        style="background-color:white; color:black;" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false"
                                        aria-controls="flush-collapse<?php echo $i; ?>">
                                        <?php echo $row['category_name'] ?>
                                    </button>
                                </h2>
                                <?php
                                $catid = $row['categoryid'];
                                $subsql = "SELECT * from subcategories where category_id=$catid";
                                $subresult = mysqli_query($conn, $subsql);
                                if ($subresult->num_rows > 0) {
                                    while ($subrow = $subresult->fetch_assoc()) {
                                        ?>
                                        <div id="flush-collapse<?php echo $i; ?>" 
                                        class="accordion-collapse collapse" 
                                        style="color:white;" aria-labelledby="flush-heading<?php echo $i; ?>"
                                         data-bs-parent="#accordionFlushExample">
                                            <a href="categorypageuser.php?subcatid=
                                                  <?php echo $subrow['subcategoryid'] ?>&catid=<?php echo $row['categoryid'] ?>"
                                                style="text-decoration:none;">


                                                <div class="accordion-body  m-0" style="background-color:#eeeeee; color:black;">
                                                    <?php echo $subrow['subcategory_name'] ?>


                                                </div>

                                            </a>

                                        </div>

                                    <?php }
                                }
                                $i++; ?>
                            
                        <?php }
                        } ?>
</div>
                </div>
            </div>






        </div>
    
    
    <div class="col-lg-9">
    
 
    
    
    </div>


    </div>

</body>

<script>
</script>

</html>