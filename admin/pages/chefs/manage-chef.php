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
                            <h1 class="pb-3">Manage users </h1>
                            <a href="add-chef.php" class="btn btn-primary"> Add chef</a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manage chef</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>title</th>
                                                <th>desc</th>
                                                <th>img</th>
                                                <th>name</th>
                                                <th>post</th>
                                                <th>fb_link</th>
                                                <th>tw_link</th>
                                                <th>insta_link</th>
                                                <th>linkedin_link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $query = "SELECT * FROM chefs"; 
                                            $result = mysqli_query ($conn, $query); //Select all data from users
                                            $i=0;
                                            while($data=mysqli_fetch_array($result)){
                                              ?>

                                            <tr>
                                                <th scope="row"> <?php echo ++$i; ?></th>
                                                <td><?php echo $data['title'];?></td>
                                                <td><img src="../../../uploads/<?php echo $data['img'];?>" width="100" height="100"
                                                        alt=""></td>
                                                <td>
                                                    <a href="edit-chef.php?id=<?php echo $data['id']; ?>"
                                                        class="btn btn-sm btn-primary"> Edit</a>
                                                    <a href="../../process/delete-chef.php?id=<?php echo $data['id']; ?>"
                                                        class="btn btn-sm btn-danger"> Delete</a>


                                                </td>

                                            </tr>
                                            <?php
                                        }
                                            ?>

                                        <tfoot>
                                            <tr>
                                            <th>S.N</th>
                                                <th>title</th>
                                                <th>desc</th>
                                                <th>img</th>
                                                <th>name</th>
                                                <th>post</th>
                                                <th>fb_link</th>
                                                <th>tw_link</th>
                                                <th>insta_link</th>
                                                <th>linkedin_link</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->

</body>

</html>