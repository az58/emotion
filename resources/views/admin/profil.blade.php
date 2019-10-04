
@extends('admin.index')

@section('profile')
    <body class="user-profile">
        <div class="wrapper ">
        <div id="main-panel">
            <div class="content mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                        <div class="row">
                                            <div class="col-md-6 pl-4 pr-4 pt-2 pb-2">
                                                <div class="form-group">
                                                    <label class="ml-2">First Name</label>
                                                    <input type="text" class="form-control"  value="<?php  echo \Illuminate\Support\Facades\Auth::user()->firstname?>" name="firstname">
                                                    <input type="hidden"   value="<?php  echo \Illuminate\Support\Facades\Auth::user()->id ?>" name="id_admin">

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-4 pr-4 pt-2 pb-2">
                                                <div class="form-group">
                                                    <label class="ml-2">Last Name</label>
                                                    <input type="text" class="form-control"  value=" <?php  echo \Illuminate\Support\Facades\Auth::user()->lastname?>" name="lastname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pl-4 pr-4 pt-2 pb-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="ml-2">Email address</label>
                                                    <input type="email" class="form-control" value="<?php  echo \Illuminate\Support\Facades\Auth::user()->email?> " name="email">

                                                </div>
                                            </div>
                                        </div>
                                </form>
                                <!-- div button -->
                                <button class="btn btn-secondary edit ml-2" >Edit</button>

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
                                <!-- <p class="description text-center">
                                    point admin
                                </p> -->
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

        </div>
    </body>
@endsection

    <!-- Remember to include jQuery :visage_légèrement_souriant: -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script>

        $(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.edit').click(function() {

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax/edit',
                    data: {
                        firstname: $('input[name="firstname"]').val(),
                        id_user: $('input[name="id_admin"]').val(),
                        lastname: $('input[name="lastname"]').val(),
                        email: $('input[name="email"]').val(),
                        role: 1,
                        
                    },
                    dataType: "json"
                })
                    .done(function (response) {
                        console.log(response);
                    })
                    .fail(function (data, status) {

                    });
            });
        });

    </script>


    <!--   Core JS Files   -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/core/jquery.min.js"></script>
    <script src="../../../../../now-ui-dashboard-master/assets/js/core/popper.min.js"></script>
    <script src="../../../../../now-ui-dashboard-master/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->

    <!-- Chart JS -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../../../now-ui-dashboard-master/assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../../../../now-ui-dashboard-master/assets/demo/demo.js"></script>




