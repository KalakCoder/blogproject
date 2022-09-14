<?php include ("../../inc/toppart.php") ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include ("../../inc/navbar.php") ?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include ("../../inc/sidebar.php") ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add menues</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Advanced Form</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                <?php 
                if(isset($_GET['id']))
                $id =$_GET['id'];
    
                $query1="SELECT *from users where id=$id";
                $result1= mysqli_query($conn, $query1); 
                // fetch a row data / single row data 
                $data=$result1->fetch_assoc();
                
                ?>

                  <?php
                  if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $category=$_POST['category'];
                    $ctitle=$_POST['ctitle'];
                    $cdesc=$_POST['cdesc'];
                    $price=$_POST['price'];

                    if($title!="" && $category!="" &&  $ctitle!=&& $cdesc!="" && $price!=""){
                     $query ="UPDATE menues SET title='$title', category='$category', ctitle='$ctitle' ,cdesc='$cdesc',price='$price' where id=$id";
                     $result= mysqli_query($conn, $query); // connect database and query

                      if($result){

                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-meune.php\">";
                    }
                      else {
                        echo "data is not submittd";
                        
                      }
                    }
                    else{
                      echo "all fields are required";
                    }
                  }
                  ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputtitle" class="form-label">title</label>
                                    <input type="text" class="form-control" id="exampleInputtitle"
                                        aria-describedby="nameHelp" name="title"value="<?php echo  $data['title']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputcategory" class="form-label">category</label>
                                    <input type="category" class="form-control" id="exampleInputcategory"
                                        aria-describedby="emailHelp" name="category"value="<?php echo  $data['category']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputctitle" class="form-label">ctitle</label>
                                    <input type="password" class="form-control" id="exampleInputctitle"
                                        name="ctitle"value="<?php echo  $data['ctitle']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputcdesc" class="form-label">cdesc</label>
                                    <input type="cdesc" class="form-control" id="exampleInputcdesc"
                                        name="cdesc"value="<?php echo  $data['cdesc']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputprice" class="form-label">price</label>
                                    <input type="price" class="form-control" id="exampleInputprice"
                                        name="price"value="<?php echo  $data['price']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
