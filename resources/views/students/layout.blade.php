
<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/responsive.css')}}" rel="stylesheet">

    <script type="text/javascript">
	
	function formatDate(date){
			var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;

			return [year, month, day].join('-');

	}

	function getAge(dateString){
		var birthdate = new Date().getTime();
			if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
			// variable is undefined or null value
				birthdate = new Date().getTime();
			}
			birthdate = new Date(dateString).getTime();
			var now = new Date().getTime();
			// now find the difference between now and the birthdate
			var n = (now - birthdate)/1000;
			if (n < 604800){ // less than a week
				var day_n = Math.floor(n/86400);
			if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
				// variable is undefined or null
				return '';
			}else{
				return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
			}
			} else if (n < 2629743){ // less than a month
				var week_n = Math.floor(n/604800);

			if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
				return '';
			}else{
				return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
			}
			} else if (n < 31562417){ // less than 24 months
				var month_n = Math.floor(n/2629743);
			if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
				return '';
			}else{
				return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
			}
			}else{
				var year_n = Math.floor(n/31556926);
			if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
				return year_n = '';
			}else{
				return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
			}
		}
	}

	function getAgeVal(pid){
		var birthdate = formatDate(document.getElementById("txtbirthdate").value);
		var count = document.getElementById("txtbirthdate").value.length;
		if (count=='10'){
			var age = getAge(birthdate);
			var str = age;
			var res = str.substring(0, 1);
		if (res =='-' || res =='0'){
			document.getElementById("txtbirthdate").value = "";
			document.getElementById("txtage1").value = "";
			document.getElementById("txtage").value = "";
			$('#txtbirthdate').focus();
			return false;
		}else{
			document.getElementById("txtage1").value = age;
			document.getElementById("txtage").value = age;
		}
		}else{
			document.getElementById("txtage1").value = "";
			document.getElementById("txtage").value = "";
			return false;
		}
	}

</script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#region').on('change', function () {
                var regionId = this.value;
                $('#province').html('');
                $.ajax({
                    url: '{{ route('getProvinces') }}?region_id='+regionId,
                    type: 'get',
                    success: function (res) {
                        $('#province').html('<option value="">Select Province</option>');
                        $.each(res, function (key, value) {
                            $('#province').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#province').on('change', function () {
                var provinceId = this.value;
                $('#city').html('');
                $.ajax({
                    url: '{{ route('getCities') }}?province_id='+provinceId,
                    type: 'get',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res, function (key, value) {
                            $('#city').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
</script>
<script type="text/javascript">
    function Selected(ele){
        if(ele.selectedIndex>0){
            document.getElementById("regs").value=ele.selectedIndex;
        }
    }
    function Selected1(ele1){
        if(ele1.selectedIndex>0){
            document.getElementById("provs").value=ele1.selectedIndex;
        }
    }
    function Selected2(ele2){
        if(ele2.selectedIndex>0){
            document.getElementById("citys").value=ele2.selectedIndex;
        }
    }
</script>
<style>
    tr:nth-child(odd) {
        background-color: lightblue;
        color: black;
    }
</style>    
</head>
<body>
<header id="header"><!--header-->
    <div class="header_top" style="background-color: darkblue; color: white;"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-left">
                        <ul class="nav navbar-nav">
                            <li ><a href="#"><i class="fab fa-facebook" style="color: white"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter-square" style="color: white"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" style="color: white"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus" style="color: white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
     <div class="col-sm-12">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img style="width: 620px; height: 120px; margin-left: 33%; margin-top: 2px;" src="{{asset('frontEnd/images/home/l.png')}}" alt="" /></a>
                    </div>
                    
                </div>
	
</header><!--/header-->
<div  style="margin-top: 20px; margin-left: 60px; margin-right: 60px;">
    @yield('content')
</div>
<footer id="footer"><!--Footer-->
    <div class="footer-top">
       
    </div>

    <div class="footer-bottom" style="background-color: darkblue; color: white">
        <div class="container">
            <div class="row" style="">
                <p style="text-align: center; color: white;">All rights reserved for OJT.</p>
                
            </div>
        </div>
    </div>
</footer><!--/Footer-->
</body>
</html> 