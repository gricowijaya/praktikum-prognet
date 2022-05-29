 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('style/admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('style/assets/img/hanger.png')}}">
  <title>
    Admin - @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('style/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('style/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('style/assets/css/material-dashboard.css?v=3.0.1')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    @include('layouts.inc.sidebar')
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      @include('layouts.inc.adminnav')
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('content')
      <footer class="footer py-4  ">
        @include('layouts.inc.adminfooter')
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('style/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('style/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('style/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('style/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('style/assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('style/assets/js/Chart.min.js')}}"></script>
  <script src="{{asset('style/assets/js/Chart.roundedBarCharts.js')}}"></script>

  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('style/assets/js/material-dashboard.min.js?v=3.0.1')}}"></script>
  @yield('script')

  <script>
	$(document).ready(function(e){
		$(".status").click(function(e){
			var index = $(".status").index(this);
			var myStatus = '';
			console.log(index);
			switch(index){
			  case 0:
				  myStatus = 'all';
				  break;
			  case 1:
				  myStatus = 'unverified';
				  break;
			  case 2:
				  myStatus = 'waiting';
				  break;
			  case 3:
				  myStatus = 'verified';
				  break;
			  case 4:
				  myStatus = 'delivered';
				  break;
			  case 5:
				  myStatus = 'success';
				  break;
			  case 6:
				  myStatus = 'canceled';
				  break;
  
			}
  
			console.log(myStatus);
		  jQuery.ajax({
				url: "{{url('/admin/transaksi/sort')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					status: myStatus,
				},
				success: function(result){
				  $('.ganti').html(result.hasil);
				}
			});
		});
	  });
  </script>
  <script>
    window.onload = function () {
    
    var options = {
        axisX: {
            interval:1,
            labelMaxWidth: 180,           
            labelAngle: -45,
            labelFontFamily:"Calibri"
        },
        title: {
            text: "Grafik Jumlah Transaksi Perbulan {{date('Y')}}"              
        },
        data: [              
        {
            type: "column",
            dataPoints: [
                { label: "Januari",  y: parseInt($('#bulan1').val())},
                { label: "Februari", y: parseInt($('#bulan2').val())},
                { label: "Maret", y: parseInt($('#bulan3').val())},
                { label: "April", y: parseInt($('#bulan4').val())},
                { label: "Mei",  y: parseInt($('#bulan5').val())},
                { label: "Juni",  y: parseInt($('#bulan6').val())},
                { label: "Juli",  y: parseInt($('#bulan7').val())},
                { label: "Agustus", y: parseInt($('#bulan8').val())},
                { label: "September", y: parseInt($('#bulan9').val())},
                { label: "Oktober",  y: parseInt($('#bulan10').val())},
                { label: "November",  y: parseInt($('#bulan11').val())},
                { label: "Desember",  y: parseInt($('#bulan12').val())},
            ]
        }
        ]
    };
    
    $("#chartContainer").CanvasJSChart(options);
    }
</script>  

<script>
    function formatRupiah(angka, prefix){
			var number_string = angka.toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
	}

    function creteChart(tahun, ttlTahun, judul = ''){
        var options = {
                            axisX: {
                                interval:1,
                                labelMaxWidth: 180,           
                                labelAngle: -45,
                                labelFontFamily:"Times New Roman"
                            },
                            title: {
                                text: "Grafik Jumlah Transaksi "+judul+" Perbulan "+ttlTahun              
                            },
                            data: [              
                            {
                                type: "column",
                                dataPoints: [
                                    { label: "Januari",  y: tahun[1]},
                                    { label: "Februari", y: tahun[2]},
                                    { label: "Maret", y: tahun[3]},
                                    { label: "April", y: tahun[4]},
                                    { label: "Mei",  y: tahun[5]},
                                    { label: "Juni",  y: tahun[6]},
                                    { label: "Juli",  y: tahun[7]},
                                    { label: "Agustus", y: tahun[8]},
                                    { label: "September", y: tahun[9]},
                                    { label: "Oktober",  y: tahun[10]},
                                    { label: "November",  y: tahun[11]},
                                    { label: "Desember",  y: tahun[12]},
                                    
                                ]
                            }
                            ]
                        };
                        
                        $("#chartContainer").CanvasJSChart(options);
    }
      jQuery(document).ready(function(e){
          console.log($('#bulan1').val())
          jQuery('#bulan').change(function(e){
                jQuery.ajax({
                    url: "{{url('/report-bulan')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        $('#total').text(result.data['total']);
                        $('#unverified').text(result.data['unverified']);
                        $('#expired').text(result.data['expired']);
                        $('#canceled').text(result.data['canceled']);
                        $('#verified').text(result.data['verified']);
                        $('#delivered').text(result.data['delivered']);
                        $('#success').text(result.data['success']);
                        var uang = formatRupiah(result.data['harga'],'Rp ');
                        $('#harga').text(uang);
                    }
                });
          });

          jQuery('#tahun').change(function(e){
                jQuery.ajax({
                    url: "{{url('/report-tahun')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        $('#total').text(result.data_bulan['total']);
                        $('#unverified').text(result.data_bulan['unverified']);
                        $('#expired').text(result.data_bulan['expired']);
                        $('#canceled').text(result.data_bulan['canceled']);
                        $('#verified').text(result.data_bulan['verified']);
                        $('#delivered').text(result.data_bulan['delivered']);
                        $('#success').text(result.data_bulan['success']);
                        var uang = formatRupiah(result.data_bulan['harga'],'Rp ');
                        $('#harga').text(uang);

                        $('#total-tahun').text(result.data['total']);
                        $('#unverified-tahun').text(result.data['unverified']);
                        $('#expired-tahun').text(result.data['expired']);
                        $('#canceled-tahun').text(result.data['canceled']);
                        $('#verified-tahun').text(result.data['verified']);
                        $('#delivered-tahun').text(result.data['delivered']);
                        $('#success-tahun').text(result.data['success']);
                        var uang_tahun = formatRupiah(result.data['harga'],'Rp ');
                        $('#harga-tahun').text(uang_tahun);
                        
                        creteChart(result.tahun, $('#tahun').val());
                    }

                });
          });

          $(".status").click(function(e){
            var index = $(".status").index(this);
            var myStatus = '';
            switch(index){
                case 0:
                    myStatus = 'all';
                    break;
                case 1:
                    myStatus = 'unverified';
                    break;
                case 2:
                    myStatus = 'expired';
                    break;
                case 3:
                    myStatus = 'verified';
                    break;
                case 4:
                    myStatus = 'delivered';
                    break;
                case 5:
                    myStatus = 'success';
                    break;
                case 6:
                    myStatus = 'canceled';
                    break;

            }
            jQuery.ajax({
                url: "{{url('/grafik')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    status: myStatus,
                    tahun: $('#tahun').val(),
                },
                success: function(result){
                    creteChart(result.grafik, $('#tahun').val(), myStatus);
                }
            });
        });

      });
</script>

</body>

</html>