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
                    if(isset($_POST['submit'])){
                        $name= $_POST['name'];

                        // find file name like ram.png
                        $filename=$_FILES['dataFile']['name'];
                        
                        // find size of file like 123142
                        $filesize=$_FILES['dataFile']['size'];

                        // fragmentation to file  ram  jpg
                        $explode= explode('.',$filename);
                        // convert file name in to lower case and [0] this is a indexing of file name

                        $fname= strtolower($explode[0]);
                        // convert extension in to lower case and [1] this is a indexing of file name
                        
                        $ext= strtolower($explode[1]);
                        // replace the space on file name ram sharma.jpg : ramsharma.jpg
                        $rep= str_replace(' ', '', $filename);
                        
                        
                        // replace the space on file name ram sharma.jpg : ramsharma.jpg
                        $finalfilename= $rep.time().'.'.$ext;
                        // echo $finalfilename;

                        // if($filesize>2000000){
                        //     if($ext=="jpg" || $ext=="png"){
                                if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'../../../uploads/'.$finalfilename)){
                                    $query= "INSERT INTO filemanager(name, filelink, type) VALUES('$name', '$finalfilename', '$ext')";
                                    $result=mysqli_query($conn, $query);

                                    if($result){
                                        echo "file is added";
                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-file.php\">";

                                    }
                                    else {
                                        echo "file is not added";
                                    }
                                }

                        //     }else{
                        //         echo "file extension is not acceptable";
                        //     }

                        // }
                        // else {
                        //     echo " file size must be less then 2MB";
                        // }

                    }
                    ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputUsername" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="userHelp" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Filelink</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dataFile">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        <a href="index.php" class="btn btn-sm btn-info">Sign In</a>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
