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
    
                $query1="SELECT *from reserve where id=$id";
                $result1= mysqli_query($conn, $query1); 
                // fetch a row data / single row data 
                $data=$result1->fetch_assoc();
                
                ?>

                  <?php
                  if(isset($_POST['submit'])){
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $date=$_POST['date'];
                    $time=$_POST['time'];
                    $people=$_POST['people'];
                    $message=$_POST['message'];

                    if($name!="" && $email!="" && $phone!="" && $date!="" && $time!="" && $people!="" && $message!=""){
                     $query ="UPDATE reserve SET name='$name', email='$email', phone='$phone'='$data'='$time'='people' ='message' where id=$id";
                     $result= mysqli_query($conn, $query); // connect database and query

                      if($result){

                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-reserve.php\">";
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
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="nameHelp" name="name"value="<?php echo  $data['name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email"value="<?php echo  $data['email']; ?>">
                                        
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputdate" class="form-label">date</label>
                                    <input type="date" class="form-control" id="exampleInputdate1"
                                        name="date"value="<?php echo  $data['date']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">phone</label>
                                    <input type="phone" class="form-control" id="exampleInputphone1"
                                        name="phone"value="<?php echo  $data['phone']; ?>">
                                </div>
                             
                                <div class="mb-3">
                                    <label for="exampleInputtime" class="form-label">time</label>
                                    <input type="time" class="form-control" id="exampleInputtime"
                                        name="time"value="<?php echo  $data['time']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtime" class="form-label">people</label>
                                    <input type="people" class="form-control" id="exampleInputpeople"
                                        name="people"value="<?php echo  $data['people']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtime" class="form-label">message</label>
                                    <input type="message" class="form-control" id="exampleInputmessage"
                                        name="message"value="<?php echo  $data['message']; ?>">
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
