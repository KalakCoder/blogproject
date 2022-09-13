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
                            <h1>Add chooseus</h1>
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
                    $description=$_POST['description'];
                    $num=$_POST['num'];
                    $subtitle=$_POST['subtitle'];
                    $subdesc=$_POST['subdesc'];
                    if($title!="" && $description!="" && $num!="" && $subtitle!="" && $subdesc!=""){
                      $query= "INSERT INTO whychooseus (title, description, num,subtitle,subdesc) 
                      VALUES('$title', '$description', '$num', '$subtitle','$subdesc')";
                      echo $query;
                      $result =mysqli_query($conn, $query);

                      if($result){

                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-chooseus.php\">";
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
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputtitlt" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="nameHelp" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">description</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="description">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Num</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        name="num">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">subtitle</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        name="subtitle">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">subdesc</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        name="subdesc">
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
