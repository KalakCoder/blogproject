<?php include("../../inc/toppart.php"); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("../../inc/navbar.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("../../inc/sidebar.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add aboutus </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add file</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <section class="">
                <div class="container">
                    <div class="form">
                        <h5 class="py-5">Task Management system</h5>
                    <?php
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];

                        $select_data="SELECT * FROM aboutus where id=$id";
                        $select_result=mysqli_query($conn, $select_data);
                        $data=$select_result->fetch_assoc();
                    }

                    ?>
                        <?php 
                    if(isset($_POST['submit'])){
                        $title= $_POST['title'];
                        $description= $_POST['description'];
                        $img= $_POST['video'];
                        if($title!="" && $description!=""){
                            $aboutus="UPDATE aboutus SET title='$title', description='$description', video='$ideo' where id=$id";
                            $aboutus_result=mysqli_query($conn, $aboutus);
                            if($aboutus_result){
                                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Your data are submitted
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                            echo "<meta http-equiv='refresh' content='0; URL=manage-aboutus.php'>";

                            }
                            else{
                                echo "Error";
                            }
                        }
                        else{
                            ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            All fields are required.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        }

                    }
                    ?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputUsername" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="exampleInputUsername"
                                            aria-describedby="userHelp" name="title" value="<?php echo $data['title'] ;?>">
                                    </div>

                                    <!-- Modal -->
                                    <div class="col-12">
                                        <div class="modal fade" id="modelId1" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-m" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Choose video</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">

                                                                <style>
                                                                [type=radio]:checked+video {
                                                                    outline: 2px solid #f00;
                                                                }
                                                                </style>

                                                                <?php
                                                                $select_query = "SELECT * FROM filemanager";
                                                                $select_result = mysqli_query($conn, $select_query);
                                                                $i = 0;
                                                                while ($data_select = mysqli_fetch_array($select_result)) {
                                                                    $i++;
                                                                ?>
                                                                <label>
                                                                    <input type="radio" name="video" 
                                                                        value="<?php echo $data_select['filelink']; ?> " />
                                                                    <img src="<?php echo "../../../uploads/" . $data_select['filelink']; ?>"
                                                                        alt="" height="100px;" width="100px;"
                                                                        style="margin-right:20px;">
                                                                </label>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" onclick="firstFunction()">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Bootstrap modal end -->

                                    <div class="form-group col-5 mb-0">
                                        <label class="col-form-label">video</label>
                                    </div>

                                    <div class="input-group mb-5 col-12">
                                        <input id="imagebox" type="text" class="form-control" name="img" value="<?php echo $data['img'] ;?>" disabled>
                                        <div class="input-group-append">
                                            <button type="button" class="btn-primary" data-toggle="modal"
                                                data-target="#modelId1">Choose video
                                            </button>
                                        </div>
                                    </div>
                                    <!-- model -->
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputUsername" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="exampleInputUsername"
                                            aria-describedby="userHelp" name="description" value="<?php echo $data['description'] ;?>">
                                    </div>
                                    <!-- <div class="mb-3">
                                        <label for="exampleInputUsername" class="form-label">Button 1</label>
                                        <input type="text" class="form-control" id="exampleInputUsername"
                                            aria-describedby="userHelp" name="btn1" value="<?php echo $data['btn1'] ;?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername" class="form-label">Button 2</label>
                                        <input type="text" class="form-control" id="exampleInputUsername"
                                            aria-describedby="userHelp" name="btn2" value="<?php echo $data['btn2'] ;?>">
                                    </div> -->
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
            <script>
            function firstFunction() {
                var selected_option1 = document.querySelector('input[name=img]:checked').value;
                document.getElementById('imagebox').value = selected_option1;
            }
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
</body>

</html>

<?php include("../../inc/footer.php"); ?>