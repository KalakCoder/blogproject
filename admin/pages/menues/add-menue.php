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
                  if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $category=$_POST['category'];
                    $ctitle=md5($_POST['ctitle']);
                    $cdesc=md5($_POST['cdesc']);
                    $price=md5($_POST['price']);

                    if($title!="" && $category!="" && $ctitle!="" && $cdesc!="" && $price!="" ){
                      $query= "INSERT INTO menues (title, category, ctitle,cdesc,price) 
                      VALUES('$title', '$category', '$ctitle', 'cdesc', 'price' )";
                      $result =mysqli_query($conn, $query);

                      if($result){

                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-menue.php\">";
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
                                        aria-describedby="nameHelp" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputcategory" class="form-label">category</label>
                                    <input type="text" class="form-control" id="exampleInputcategory"
                                        aria-describedby="emailHelp" name="category">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputctitle" class="form-label">ctitle</label>
                                    <input type="text" class="form-control" id="exampleInputctitle"
                                        name="ctitle">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputcdesc" class="form-label">cdesc</label>
                                    <input type="password" class="form-control" id="exampleInputcdesc"
                                        name="cdesc">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputprice" class="form-label">price</label>
                                    <input type="password" class="form-control" id="exampleInputcdesc"
                                        name="price">
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
