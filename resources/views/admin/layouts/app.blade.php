<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
        <!--AdminLTE Theme style -->
        <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="{{asset('backend/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('backend/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <!-- full calendar -->
        <link href="{{asset('backend/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">

        <!--Custom css-->
        <link rel="stylesheet" href="{{asset('backend/dist/css/custom.css')}}">

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

       



    </head>
    <body class="change-language" >

         @yield('admin_dashboard_content')

     

        


        <!--App Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- jQuery -->
        <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('backend/dist/js/demo.js')}}"></script>

        <!-- sweetalert -->
        <script src="{{asset('backend/plugins/sweetalert/sweetalert.min.js')}}"></script>
                
        <!-- Full Calendar -->
        <script src="{{asset('backend/plugins/fullcalendar/moment.min.js')}}"></script>
        <script src="{{asset('backend/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
       
        <!-- toastr -->
        <script src="{{asset('backend/plugins/toastr/toastr.min.js')}}')}}"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!!Toastr::message()!!}



        <!-- DataTables  & Plugins -->
        <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

 
        <!--pusher-->
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <!-- Cusrtom File Input Select Script -->
        <script>
            $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            }); 
        </script>
        

        <!-- Delete Data Scripts -->
        <script>
            $('.delete').on('click', function(){

                let form_id = $(this).data('form-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, this will be deleted permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+form_id).submit();
                        swal("File has been deleted!", {
                        icon: "success",
                        });

                    } else {
                        swal("File is safe!");
                    }
                }); 

            });

        </script>
       
       <!-- Active Inactive Scripts -->
        <script>
            $(function(){
                $("input:checkbox.input_status").change(function() {
                if(this.checked) {
                    window.location = this.value;
                }
            });
            });

            $(function(){
                $("input:checkbox.input_status").change(function() {
                if(this.checked == false) {
                    window.location = this.value;
                }
            });
            });
        </script>


                



    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 100
      });
    </script>



        



    <script>
    $('.nav-item').each(function(){ 
    if ($(this).find('active')) {
    
        $(".active",this).parents('.nav-item').addClass('menu-open');
    }
    });
    </script>




    <!-- features Active Inactive Scripts -->
    <script>
            $(function(){
                $("input:checkbox#feature_latest_service_active").change(function() {
                if(this.checked) {
                    $('#home_feature_latest_service').show('1000');
                }
            });
            });

            $(function(){
                $("input:checkbox#feature_latest_service_active").change(function() {
                if(this.checked == false) {
                    window.location = "{{url('/admin/dashboard')}}"
                }
            });
            });
        </script>


	<!-- Permission all select -->
	<script>
		$(function () {
			$("input:checkbox.all_permissions").change(function () {
				if (this.checked == true) {
					$("input:checkbox.permission-item").prop('checked', true);
				}
			});
		});

		$(function () {
			$("input:checkbox.all_permissions").change(function () {
				if (this.checked == false) {
					$("input:checkbox.permission-item").prop('checked', false);
				}
			});
		});
	</script>




        <!-- Sidebar Menu Active Script -->
        <script>
            $(function(){
                var current = location.pathname;

                $('ul.metismenu li a').each(function(){
                    if($(this).attr('href').indexOf(current) !== -1){
                        $(this).closest('li').addClass('active');
                    }
                });

                $('ul.metismenu .nav-second-level a').each(function(){
                    console.log($(this).attr('href').indexOf(current));
                    if($(this).attr('href').indexOf(current) !== -1)  {
                        $(this).parent().parent().closest('li').addClass('active');
                        $(this).closest('ul').addClass('in');
                    }
                });
            });
        </script>

        <!-- Cusrtom File Input Select Script -->
        <script>
            $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            }); 
        </script>
        

        <!-- Delete Data Scripts -->
        <script>
            $('.delete').on('click', function(){

                let form_id = $(this).data('form-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, this will be deleted permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+form_id).submit();
                        swal("File has been deleted!", {
                        icon: "success",
                        });

                    } else {
                        swal("File is safe!");
                    }
                }); 

            });

        </script>
       

        


    </body>
</html>


