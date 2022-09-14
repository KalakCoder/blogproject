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
                            <h1>Add user</h1>
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
    
                $query1="SELECT *from gallery where id=$id";
                $result1= mysqli_query($conn, $query1); 
                // fetch a row data / single row data 
                $data=$result1->fetch_assoc();
                
                ?>

                  <?php
                  if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $desc=$_POST['desc'];
                    $img=$_POST['img'];

                    if($title!="" && $desc!="" && $img!=""){
                     $query ="UPDATE gallery SET title='$title', desc='$desc', img='$img' where id=$id";
                     $result= mysqli_query($conn, $query); // connect database and query

                      if($result){

                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-gallery.php\">";
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
                                    <label for="exampleInputName" class="form-label">title</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="nameHelp" name="name"value="<?php echo  $data['title']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">desc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email"value="<?php echo  $data['desc']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">img</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1"
                                        name="password"value="<?php echo  $data['img']; ?>">
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
