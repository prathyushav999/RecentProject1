<!DOCTYPE html>
<html lang="en">
<style>
.padding {
	height: 30px;
	border: 1px solid;
	padding-left: 10px;
	padding-right: 10px;
}

.centertd {
	height: 30px;
	text-align: center;
}
</style>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
<title>Document</title>
<link href="template.css" rel="stylesheet" />

<title>SREA Real Estates | Contact</title>

<!-- Loading third party fonts -->
<link
	href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|"
	rel="stylesheet" type="text/css">
<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Loading main css file -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src='https://kit.fontawesome.com/a076d05399.js'
	crossorigin='anonymous'></script>
<link rel="stylesheet" href="sideMenu.css">

</head>
<body style="background-color: #000;">
	<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>


	<div id="site-content" style="background-color: #000;">
		<div class="site-header">
			<div>
				<a href="" id="branding" style="height: 58px; width: 1300px;"> <img
					style="padding-left: 20px;" src="images/logo.png" alt=""
					class="logo">
					<div class="logo-text">
						<h1 class="site-title">SREA Real Estates</h1>
						<small class="site-description"><b>Where dreams come true.</b></small>

					</div>
					<div style="padding-top: 56px;">
						<a href="#" class="btn btn-info"> <span class="fa fa-power-off"></span>
							Log out
						</a>

					</div>
				</a>

			
				<table>
					<tr>
						<td>
							<nav>
								<ul class="mcd-menu"
									style="position:relative; margin-top:-125%;">
									<!-- 			<li class="menu-item"><a href="about.html">About</a></li> -->
									<li><a onclick='treeChartWindow("chart")'> <i
											class="fa fa-street-view"></i> <strong>Orgization chart</strong>
											<small>Tree view</small>
									</a></li>
									<li><a onclick='treeChartWindow("payment")' class="active"> <i
											class="fa fa-money-bill-alt"></i> <strong>Payment</strong> <small>Payment
												Summary</small>
									</a></li>
									<li><a onclick='treeChartWindow("profile")'> <i
											class="fa fa-user-circle"></i> <strong>Profile</strong> <small>Your
												Details</small>
									</a></li>
									<li><a onclick='treeChartWindow("pv")' style="display: none;"
										id="pv"> <i class="fa fa-user-circle"></i> <strong>PV
												Calculation</strong> <small>Percentage division</small>
									</a></li>
								</ul>
							</nav>
						</td>
						<td style="width: 100%; background-color: #fff;">
							<div
								style="padding-left: 20px; padding-top: 10px; display: none;"
								id="main-content">
								<h2>All Customer Records</h2>
								<br />
    <?php
    include 'config.php';

    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if (mysqli_num_rows($result) > 0) {
        ?>
    <table cellpadding="7px" style="width: 100%;">
									<thead>
										<th class="centertd"
											style="background-color: #87ceeb; color: #fff; border: 2px solid black;">Id</th>
										<th class="centertd"
											style="background-color: #87ceeb; color: #fff; border: 2px solid black;">Name</th>
										<th class="centertd"
											style="background-color: #87ceeb; color: #fff; border: 2px solid black;">Phone</th>
										<th class="centertd"
											style="background-color: #87ceeb; color: #fff; border: 2px solid black;">Amount</th>
										<th class="centertd"
											style="background-color: #87ceeb; color: #fff; border: 2px solid black;">Action</th>
									</thead>
									<tbody>
          <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
											<td class="centertd" style="border: 1px solid;"><?php echo $row['customerid']; ?></td>
											<td class="centertd" style="border: 1px solid;"><?php echo $row['username']; ?></td>
											<td class="centertd" style="border: 1px solid;"><?php echo $row['mobileno']; ?></td>
											<td class="centertd" style="border: 1px solid;"><?php echo $row['balanceAmount']; ?></td>
											<td class="centertd" style="border: 1px solid;"><a
												href='paid.php?customerid=<?php echo $row['customerid']; ?>'>Paid</a>
											</td>
										</tr>
          <?php } ?>
        </tbody>
								</table>
  <?php
    } else {
        echo "<h2>No Record Found</h2>";
    }
    mysqli_close($conn);
    ?>
</div>

							<div
								style="padding-top: 50px; padding-left: 20px; display: none;"
								id="total">


								<div id="table12"
									style="position: relative; text-align: center;">
									<label style="color: purple; font-size: 30px;"><center>
											<b> Earned Summary</b>
										</center></label>
									<table style="width: 100%;">

										<tr>
											<td style="text-align: center;"><i style="color: #DAA520;"
												class='fas fa-money-bill-alt fa-4x'></i></td>
											<td style="text-align: center;"><i style="color: #DAA520;"
												class='fas fa-donate fa-4x'></i></td>

										</tr>
										<tr>
											<td
												style="font-size: 25px; width: 650px; text-align: center;">Earned
												PV's</td>
											<td style="font-size: 25px; text-align: center;">Earned
												Amount</td>

										</tr>

										<tr>
											<td style="font-size: 20px; color: blue; text-align: center;"
												id="earnedpv">0</td>
											<td style="font-size: 20px; color: blue; text-align: center;"
												id="earnedamount">0</td>

										</tr>
									</table>
									<label
										style="margin-top: 100px; color: purple; font-size: 30px;"><center>
											<b> Paid Summary</b>
										</center></label>
									<table style="width: 100%;">
										<tr>
											<td style="text-align: center;"><i style="color: #18A558;"
												class='fas fa-money-bill-alt fa-4x'></i></td>
											<td style="text-align: center;"><i style="color: #18A558;"
												class='fas fa-donate fa-4x'></i></td>

										</tr>
										<tr>
											<td
												style="font-size: 25px; width: 650px; text-align: center;">Paid
												PV's</td>
											<td style="font-size: 25px; text-align: center;">Paid Amount</td>

										</tr>

										<tr>
											<td style="font-size: 20px; color: blue; text-align: center;"
												id="paidpv">0</td>
											<td style="font-size: 20px; color: blue; text-align: center;"
												id="paidamount">0</td>

										</tr>
									</table>
									<label
										style="color: purple; font-size: 30px; margin-top: 100px;"><center>
											<b> Balance Summary</b>
										</center></label>
									<table style="width: 100%;">
										<tr>
											<td style="text-align: center;"><i style="color: red;"
												class='fas fa-money-bill-alt fa-4x'></i></td>
											<td style="text-align: center;"><i style="color: red;"
												class='fas fa-donate fa-4x'></i></td>

										</tr>
										<tr>
											<td
												style="font-size: 25px; width: 650px; text-align: center;">Balance
												PV's</td>
											<td style="font-size: 25px; text-align: center;">Balance
												Amount</td>

										</tr>

										<tr>
											<td style="font-size: 20px; color: blue; text-align: center;"
												id="balancepv">0</td>
											<td style="font-size: 20px; color: blue; text-align: center;"
												id="balanceamount">0</td>

										</tr>
									</table>
								</div>
							</div>
						</td>

					</tr>
				</table>
			</div>
		</div>
	</div>





</body>

<script type="text/javascript">
	var queryString = new Array();
	var customerId = "";
	let res;
	window.onload = function() {
		if (queryString.length == 0) {
			if (window.location.search.split('?').length > 1) {
				var params = window.location.search.split('?')[1].split('&');
				for (var i = 0; i < params.length; i++) {
					var key = params[i].split('=')[0];
					var value = decodeURIComponent(params[i].split('=')[1]);
					queryString[key] = value;
				}
			}
		}
		if (queryString["customerId"] != null) {
			customerId = queryString["customerId"];
			
			if (customerId == 'SREA-0') {
				document.getElementById("main-content").style.display = "block";
				document.getElementById("pv").style.display = "block";
			} else {
				document.getElementById("total").style.display = "block";
				data(customerId);

			/* const url = "http://localhost/crud/template.html?customerId="
				+ customerId;
			window.location.href = url;
			return; */
		 }
		}
	};

	

	function data(customerId) {
		
		  

		  const xhttp = new XMLHttpRequest();

		  
		  xhttp.onload = function() {
			 var res=this.responseText;
			
			
			 const resArray = res.split(",");
			
			 if(res!=""){
				   document.getElementById("earnedpv").innerHTML = resArray[0];
				    document.getElementById("earnedamount").innerHTML = resArray[1];
				    document.getElementById("paidpv").innerHTML = resArray[2];
				    document.getElementById("paidamount").innerHTML = resArray[3];
				    document.getElementById("balancepv").innerHTML = resArray[4];
				    document.getElementById("balanceamount").innerHTML = resArray[5];

			}
		  }
		  xhttp.open("GET", "retrivecustomerbyid.php?customerid="+customerId);
		  xhttp.send();
		}
	function treeChartWindow(screen) {
		if (queryString.length == 0) {
			if (window.location.search.split('?').length > 1) {
				var params = window.location.search.split('?')[1].split('&');
				for (var i = 0; i < params.length; i++) {
					var key = params[i].split('=')[0];
					var value = decodeURIComponent(params[i].split('=')[1]);
					queryString[key] = value;
				}
			}
		}
		if (queryString["customerId"] != null) {
			customerId = queryString["customerId"];
			const url = "";
			if (screen == "chart") {
				const url = "http://localhost/SREA/orgchart.html?customerId="
						+ customerId;
				window.location.href = url;
				return;
			}
			if (screen == "payment") {
				const url = "http://localhost/SREA/payment.php?customerId="
						+ customerId;
				window.location.href = url;
				return;
			}
			if (screen == "profile") {
				const url = "http://localhost/SREA/profile.html?customerId="
						+ customerId;
				window.location.href = url;
				return;
			}
			if (screen == "pv") {
				const url = "http://localhost/SREA/pvcalculation.html?customerId="
						+ customerId;
				window.location.href = url;
				return;
			}

		}
	}
</script>
</html>