<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
<title>Document</title>
<link href="orgchart.css" rel="stylesheet" />

<title>SREA Real Estates | Contact</title>
<style>
.centertd {
	height: 30px;
	text-align: center;
}

body {
	margin: 0;
	font-family: "Lato", sans-serif;
}

.sidebar {
	margin: 0;
	padding: 0;
	width: 200px;
	background-color: #000000;
	position: fixed;
	height: 100%;
	overflow: auto;
}

.sidebar a {
	display: block;
	color: white;
	padding: 16px;
	text-decoration: none;
}

.sidebar a.active {
	/* background-color: #04AA6D;
	color: white; */
	position: relative;
	color: #e67e22;
	border: 0;
	/*border-top: 4px solid #e67e22;
  border-bottom: 4px solid #e67e22;
  margin-top: -4px;*/
	box-shadow: 0 0 5px #DDD;
	-moz-box-shadow: 0 0 5px #DDD;
	-webkit-box-shadow: 0 0 5px #DDD;
	/* == */
	border-left: 4px solid #e67e22;
	border-right: 4px solid #e67e22;
	margin: 0 -4px;
}

.sidebar














a














:hover














:not






 






(
.active






 






)
{
background-color


:

 

#555


;
color


:

 

white


;
}
div.content {
	margin-left: 190px;
	padding: 1px 16px;
	height: 100%;
}

@media screen and (max-width: 1000px) {
	.sidebar {
		width: 100%;
		height: auto;
		position: relative;
	}
	.sidebar a {
		float: left;
	}
	div.content {
		margin-left: 0;
	}
}

@media screen and (max-width: 400px) {
	.sidebar a {
		text-align: center;
		float: none;
	}
}
</style>

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
   <script language="javascript" type="text/javascript" src="addcustomer.js"></script>


</head>
<body style="background-color: #000;">
	<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>


	<div id="site-content" style="background-color: #000;">
		<div class="site-header">
			<div>
				<table style="width: 100%;">
					<tr>
						<td style="height: 58px; width: 50%;"><a href="" id="branding"> <img
								style="padding-left: 20px;" src="images/logo.png" alt=""
								class="logo">
								<div class="logo-text">
									<h1 class="site-title">SREA Real Estates</h1>
									<small class="site-description"><b>Where dreams come true.</b></small>

								</div>
						</a></td>
						<td
							style="height: 58px; width: 50%; text-align: right; padding-right: 20px;">
							<a href="#" class="btn btn-info" onclick='logout()'> <span
								class="fa fa-power-off"></span> Log out
						</a>


						</td>
					</tr>
					<tr>
						<td>
							<div>
								<div class="sidebar">
									<a onclick='treeChartWindow("chart")'> <i
										class="fa fa-street-view" style="padding-right: 10px;"></i><strong>Orgization
											chart</strong><br /> <small>Tree view</small>
									</a> <a onclick='treeChartWindow("payment")' class="active"> <i
										class="fas fa-money-bill-alt" style="padding-right: 10px;"></i>
										<strong>Payment</strong><br /> <small>Payment Summary</small>
									</a>
									<!-- <a onclick='treeChartWindow("profile")'> <i
										class="fa fa-user-circle" style="padding-right: 10px;"></i> <strong>Profile</strong><br />
									<small>Your Details</small> 
									</a> -->
									<a onclick='treeChartWindow("pv")' style="display: none;"
										id="pv"> <i class="fa fa-calculator"
										style="padding-right: 10px;"></i> <strong>PV Calculation</strong>
										<small>Percentage division</small>
									</a>

								</div>
								<div class="content"
									style="position: fixed; overflow: scroll; padding-left: 50px; padding-right: 50px; background-color: white; width: 88%; padding-top: 10px; display: none; text-align: center;"
									id="main-content">
									<h2 style="color: #e67e22;">All Customer Records</h2>
									<br />
    <?php
    include 'config.php';
    
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    
    if (mysqli_num_rows($result) > 0) {
        ?>
    <table style="width: 100%; margin-bottom: 200px;">
										<thead>
											<th
												style="text-align: center; font-size: 18px; background-color: #04AA6D; color: #fff; border: 1px solid black; height: 40px;">Id</th>
											<th
												style="text-align: center; font-size: 18px; background-color: #04AA6D; color: #fff; border: 1px solid black; height: 40px;">Name</th>
											<th
												style="text-align: center; font-size: 18px; background-color: #04AA6D; color: #fff; border: 1px solid black; height: 40px;">Phone</th>
											<th
												style="text-align: center; font-size: 18px; background-color: #04AA6D; color: #fff; border: 1px solid black; height: 40px;">Amount</th>
											<th
												style="text-align: center; font-size: 18px; background-color: #04AA6D; color: #fff; border: 1px solid black; height: 40px;">Action</th>
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
								<div class="content"
									style="position: fixed; overflow: scroll; padding-left: 50px; padding-right: 50px; background-color: white; width: 88%; padding-top: 10px; display: none; text-align: center;"
									id="total">


									<div style="margin-bottom: 250px;">
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
												<td
													style="font-size: 20px; color: blue; text-align: center;"
													id="earnedpv">0</td>
												<td
													style="font-size: 20px; color: blue; text-align: center;"
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
												<td
													style="font-size: 20px; color: blue; text-align: center;"
													id="paidpv">0</td>
												<td
													style="font-size: 20px; color: blue; text-align: center;"
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
												<td
													style="font-size: 20px; color: blue; text-align: center;"
													id="balancepv">0</td>
												<td
													style="font-size: 20px; color: blue; text-align: center;"
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
		customerId = localStorage.getItem("customerid");
		
		if (customerId != null) {
			customerId = localStorage.getItem("customerid");
			
			if (customerId == 'SREA-0') {
				document.getElementById("main-content").style.display = "block";
				document.getElementById("pv").style.display = "block";
			} else {
				document.getElementById("total").style.display = "block";
				data(customerId);
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
		var customerId = localStorage.getItem("customerid");
		
		if (customerId!= null) {
			customerId = localStorage.getItem("customerid");

			const url = "";
			if (screen == "chart") {
				const url = "http://localhost/SREA/orgchart.html";
				window.location.href = url;
				return;
			}
			if (screen == "payment") {
				const url = "http://localhost/SREA/payment.php";

				window.location.href = url;
				return;
			}
			if (screen == "profile") {
				const url = "http://localhost/SREA/profile.html";
				window.location.href = url;
				return;
			}
			if (screen == "pv") {
				const url = "http://localhost/SREA/pvcalculation.html";
				window.location.href = url;
				return;
			}
		}
	}
	function logout() {
		console.log("logout");
		var cookies = document.cookie.split(";");
		var count = 0;
		for (var i = 0; i < cookies.length; i++) {
			var cookie = cookies[i];
			var eqPos = cookie.indexOf("=");
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			document.cookie = name
					+ "=; domain=lazacode.org; expires=Thu, 01 Jan 1970 00:00:00 GMT";
			if (count == cookies.length - 1) {
				window.location.href = '/SREA/login.html';
			}
			count++;

		}
	}
</script>
</html>