<!DOCTYPE html>
<html>
<head>
<title>Smart IMS Quotation Application - Dashboard</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />
</head>

<body>

<div class="main">
	<header class="header">
		<figure class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="253" height="65" alt=""></figure>
		<nav class="nav-top">
			<ul>
				<li class="no-bdr"><a href="#myModalContent.html" data-toggle="modal" data-target="#myModal">Get Quotation <i class="Get-Quotation"></i></a><li>
				<li><a href="index.html">Logout <i class="Logout"></i></a><li>
				<li><a href="#Username">Username <i class="Username"></i></a><li>
			</ul>
		</nav>
	</header>
	
	<div class="container">
		<h1>Dashboard - <span>Quotation</span></h1>
		<div class="content">
			<div class="table-responsive">
				<table width="100%">
					<thead>
						<tr>
							<th>S. No</th>
							<th>Quote #</th>
							<th>Quote Dt</th>
							<th>Product</th>
							<th>Manufacturer</th>
							<th>Model</th>
							<th>Sessions</th>
							<th>Channels</th>
							<th>Service Level</th>
							<th>Term(Mo)</th>
							<th>Ins Type</th>
							<th>MRC</th>
							<th>NRC</th>
							<th>PDF</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>1</td>
							<td>100000065</td>
							<td>12/17/2015</td>
							<td>GE-QFlex-15</td>
							<td>Genband</td>
							<td>QFlex</td>
							<td>2,000</td>
							<td>15</td>
							<td>Foundation</td>
							<td>12</td>
							<td>Remote</td>
							<td><span>$</span> 2,650</td>
							<td><span>$</span> 10,000</td>
							<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon-pdf.png" width="21" height="19" alt=""></a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>100000053</td>
							<td>12/16/2015</td>
							<td>OR-VME-25</td>
							<td>Oracle</td>
							<td>VME</td>
							<td>1,000</td>
							<td>25</td>
							<td>Basic</td>
							<td>24</td>
							<td>Remote</td>
							<td><span>$</span> 2,570</td>
							<td><span>$</span> 10,000</td>
							<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon-pdf.png" width="21" height="19" alt=""></a></td>
						</tr>
						<tr>
							<td>3</td>
							<td>100000041</td>
							<td>12/15/2015</td>
							<td>SO-SBCSWE-500</td>
							<td>Sonus</td>
							<td>SWE</td>
							<td>20,250</td>
							<td>500</td>
							<td>Equipment and Install</td>
							<td>36</td>
							<td>Onsite</td>
							<td><span>$</span> 2,570</td>
							<td><span>$</span> 17,000</td>
							<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon-pdf.png" width="21" height="19" alt=""></a></td>
						</tr>
						<tr>
							<td>4</td>
							<td>100000026</td>
							<td>12/15/2015</td>
							<td>OR-VME-25HA</td>
							<td>Oracle</td>
							<td>VME</td>
							<td>1,000</td>
							<td>25</td>
							<td>Basic</td>
							<td>48</td>
							<td>Remote</td>
							<td><span>$</span> 630</td>
							<td><span>$</span> 5,500</td>
							<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon-pdf.png" width="21" height="19" alt=""></a></td>
						</tr>
						<tr>
							<td>5</td>
							<td>100000007</td>
							<td>12/14/2015</td>
							<td>OR-AP6300-30,000</td>
							<td>Oracle</td>
							<td>AP 6300</td>
							<td>80,000</td>
							<td>50000</td>
							<td>Foundation</td>
							<td>60</td>
							<td>Onsite</td>
							<td><span>$</span> 45,970</td>
							<td><span>$</span> 20,000</td>
							<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon-pdf.png" width="21" height="19" alt=""></a></td>
						</tr>
					</thead>
				</table>
            </div><!--Responsive DataTable End-->
			<div class="pagination">
				<ul>
					<li><a href="#" class="active">1</a><li>
					<li><a href="#" class="">2</a><li>
					<li><a href="#" class="">3</a><li>
					<li><a href="#" class="">4</a><li>
					<li><a href="#" class="">5</a><li>
				</ul>
			</div>
			
		</div><!--Content End-->
	</div><!--Container End-->
</div><!--Main End-->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">
               Get Quotation
            </h4>
         </div>
		 
         <div class="modal-body">
            <div class="form-left">
				Choose Product:
				<ul>
					<li><input type="text" placeholder="Product"></li>
					<li style="text-align:center;">OR</li>
					<li>
						<select placeholder="Manufacturer">
							<option selected>Manufacturer</option>
							<option>Genband</option>
							<option>Oracle</option>
							<option>Sonus</option>
						</select>
					</li>
					<li>
						<select placeholder="Model" disabled="disabled">
							<option selected>Model</option>
							<option>QFlex</option>
							<option>VME</option>
							<option>SWE</option>
							<option>AP 6300</option>
						</select>
					</li>
					<li>
						<select placeholder="Max Concurrent SIP Sessions for the Box" disabled="disabled">
							<option selected>Max Concurrent SIP Sessions for the Box</option>
							<option>QFlex</option>
							<option>VME</option>
							<option>SWE</option>
							<option>AP 6300</option>
						</select>
					</li>
					<li>
						<select placeholder="Package Concurrent SIP Channels" disabled="disabled">
							<option selected>Package Concurrent SIP Channels</option>
							<option>QFlex</option>
							<option>VME</option>
							<option>SWE</option>
							<option>AP 6300</option>
						</select>
					</li>
				</ul>
			</div>
			<div class="form-right">
				Choose Service Level:
				<ul>
					<li>
						<select placeholder="Service Level">
							<option selected>Service Level</option>
							<option>Foundation</option>
							<option>Basic</option>
							<option>Customer Managed</option>
						</select>
					</li>
					<li>
						<select placeholder="Term based on the service level">
							<option selected>Term based on the service level</option>
							<option>12</option>
							<option>24</option>
							<option>36</option>
							<option>48</option>
							<option>60</option>
						</select>
					</li>
					<li class="flt-left bdr-top">
						<button type="button" class="btn btn-primary">Get Quote</button>
						<button type="button" class="btn btn-primary">Reset</button>
					</li>
					<li class="dyn-data">
						AT&T customer pricing Quote is
						<label>Installation type <span>: Remote</span></label>
						<label>Deployment Non recurring Cost <span>: $ 17,000</span></label>
						<label>Monthly Recurring Cost (MRC) <span>: $ 460</span></label>
					</li>
				</ul>
			</div>	
			<div class="clear-both"></div>
         </div>
         
		 <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>