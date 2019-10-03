@extends('admin.index')

@section('profile')
    <body class="user-profile">
    <div class="wrapper ">

        <div class="main-panel" id="main-panel">

            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                            </div>
                                        </div>

                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Company" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <!-- aziza
                             <div class="image">
                               <img src="../../../../../now-ui-dashboard-master/assets/img/bg5.jpg" alt="...">
                             </div>
                             -->
                            <div class="card-body">
                                <div class="author">
                                    <!--
                                    <a href="#">
                                      <img class="avatar border-gray" src="../../../../../now-ui-dashboard-master/assets/img/mike.jpg" alt="...">
                                      <h5 class="title">Mike Andrew</h5>
                                    </a>
                                    -->
                                    <p class="description">
                                        {{--  requete nom admin --}}
                                    </p>
                                </div>
                                <p class="description text-center">
                                    point admin
                                </p>
                            </div>
                            <hr>
                            <div class="button-container">
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-google-plus-g"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="VRENT">
                                    VRENT
                                </a>
                            </li>
                            <li>
                                <a href="#VRENT">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="VRENT">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright" id="copyright">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>,Coded by
                        <a href="VRENT" target="_blank"> VRENT </a>.

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/core/jquery.min.js"></script>
    <script src="../../../../../now-ui-dashboard-master/assets/js/core/popper.min.js"></script>
    <script src="../../../../../now-ui-dashboard-master/assets/js/core/bootstrap.min.js"></script>
    <script src="../../../../../now-ui-dashboard-master/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../../../../now-ui-dashboard-master/assets/demo/demo.js"></script>
    </body>

@endsection

