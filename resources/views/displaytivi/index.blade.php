<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tivi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/tivi/css/apptivi.css')}}">
<script type="text/javascript" src="{{asset('/tivi/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('/tivi/js/hcap2.js')}}"></script>
<script type="text/javascript" src="{{asset('/tivi/js/hcap.js')}}"></script>
<script type="text/javascript" src="{{asset('/tivi/js/i18next.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<body>
	<section class="home detail-info-display">
		<div class="info">

		</div>
		<div class="main-menu">
			<a href="#" id="menu-bottom-1" class="item-info">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/infomation-main-menu.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="{{('/tivi/img/arrow.png')}}" alt="">Hotel Infomation
					</div>
				</div>
			</a>
			<a href="dinner.html" id="menu-bottom-2">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/dinner-main-menu.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Dining & Bar
					</div>
				</div>
			</a>
			<a href="room-service.html" id="menu-bottom-3">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/room-service-main-menu.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Room Service
					</div>
				</div>
			</a>
			<a href="channel.html" id="menu-bottom-4">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/channel-main-menu.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> TV Channel
					</div>
				</div>
			</a>
			<a href="activities.html" id="menu-bottom-5">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/activity-main-menu.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Activities
					</div>
				</div>
			</a>
			<a href="bill.html" id="menu-bottom-6">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/bill-main-menu.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Bill
					</div>
				</div>
			</a>
			<a href="#" id="menu-bottom-7">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/icon-youtube.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Youtube
					</div>
				</div>
			</a>
			<a href="#" id="menu-bottom-8">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/icon-internet.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Web Browser
					</div>
				</div>
			</a>
			<a href="#" id="menu-bottom-9">
				<div class="item-main-menu">
					<div class="box-img">
						<div class="overplay"></div>
						<img src="{{('/tivi/img/icon-bluetooh.png')}}" alt="alt">
					</div>
					<div class="title">
						<img src="img/arrow.png" alt=""> Bluetooh
					</div>
				</div>
			</a>

		</div>
	</section>
	<section class="playvideo"></section>
</body>
 {{-- <script type="text/javascript">
	getcustomer();
	getbackground('home');
	idfocus = 1;
	focusnext(idfocus);
	function focusnext(idfocus) {

		if (idfocus > 6) {
			for (i = 1; i <= 3; i++) {
				$("#menu-bottom-" + i).css('display', 'none');
			}
			for (i = 7; i <= 9; i++) {
				$("#menu-bottom-" + i).css('display', 'block');
			}
		}
		if (idfocus < 4) {
			for (i = 1; i <= 3; i++) {
				$("#menu-bottom-" + i).css('display', 'block');
			}
			for (i = 7; i <= 9; i++) {
				$("#menu-bottom-" + i).css('display', 'none');
			}
		}
		$("#menu-bottom-" + idfocus).focus();
	}

	min = 1;
	max = 9;
	$(document).keydown(function (e) {
		//alert(e.which);
		//alert(idfocus);
		switch (e.which) {
			case 37:
				if (idfocus > min) {
					idfocus--;
				}
				focusnext(idfocus);
				break;
			case 38:
				if (idfocus > 3) {
					idfocus = idfocus - 3;
				}
				focusnext(idfocus);
				break;
			case 39:
				if (idfocus < max) {
					idfocus++;
				}
				focusnext(idfocus);
				break;
			case 40:
				if (idfocus < 7) {
					idfocus = idfocus + 3;
				}
				focusnext(idfocus);
				break;
			// PORTAL
			case 602:
				portal();
				break;
			// Back
			case 461:
				back();
				break;
			// Guide
			case 415:
				hcap.preloadedApplication.launchPreloadedApplication({
					"id": "144115188075859002", //Youtube
					"onSuccess": function () {
					},
					"onFailure": function (f) {
						console.log("onFailure : errorMessage = " + f.errorMessage);
					}
				});
				break;
		}
	})

	$(document).on('click', '.item-info', function (e) {
		var video = $(this).attr('data-video');
		html = "<video style='position: fixed;top: 0;z-index:10; left:0' autoplay  width='1280' height='720'>" +
			"<source src='http://172.16.1.155/sunsethotel/public/media/file/files/video/3.mp4' type='video/mp4'>" +
			"<p class='vjs-no-js'>" +
			"<a href='https://videojs.com/html5-video-support/'' target='_blank'>supports HTML5 video</a>" +
			"</p>" +
			"</video>";
		$('.home').css('display', 'none');
		$('.playvideo').css('display', 'block');
		$('.playvideo').html(html);
		setTimeout(function () { back() }, 30000);

	});
	$(document).on('click', '.detail-info', function (e) {
		var id = $(this).attr('data-id');
		getdetailinfo(id);
	});
	$(document).on('click', '#menu-bottom-8', function (e) {
		hcap.preloadedApplication.launchPreloadedApplication({
			"id": "144115188075855877", //Youtube
			"parameters": "{'target':'http://google.com.vn/'}",
			"onSuccess": function () {
			},
			"onFailure": function (f) {
				console.log("onFailure : errorMessage = " + f.errorMessage);
			}
		});
	});
	$(document).on('click', '#menu-bottom-7', function (e) {
		hcap.preloadedApplication.launchPreloadedApplication({
			"id": "144115188075859002", //Youtube

			"onSuccess": function () {
			},
			"onFailure": function (f) {
				console.log("onFailure : errorMessage = " + f.errorMessage);
			}
		});
	});
	$(document).on('click', '#menu-bottom-9', function (e) {
		hcap.preloadedApplication.launchPreloadedApplication({
			"id": "244115188075859015", //Youtube
			"onSuccess": function () {
			},
			"onFailure": function (f) {
				console.log("onFailure : errorMessage = " + f.errorMessage);
			}
		});
	});
</script>  --}}

</html>