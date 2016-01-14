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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/quote.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

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
				<li><a href="<?php echo base_url(); ?>login/logout">Logout <i class="Logout"></i></a><li>
				<li><a href="#Username"><?php echo $this->session->userdata('firstname')?> <i class="Username"></i></a><li>
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
                                            <?php
                                                $loop = 0;
                                                foreach ($user_product_list as $obj) { 
                                                   // print_r($obj);exit();
                                                ?>
						<tr>
							<td><?php echo ++$loop?></td>
							<td><?php echo $loop."aq"?></td>
							<td><?php echo date('Y-m-d');?></td>
							<td><?php echo $obj->sku?></td>
							<td><?php echo $obj->manufacturer?></td>
							<td><?php echo $obj->model_number?></td>
							<td><?php echo $obj->concurrent_SIP_sessions?></td>
							<td><?php echo $obj->package_concurrent_SIP?></td>
							<td>Foundation</td>
							<td>12</td>
							<td>Remote</td>
							<td><span>$</span> 2,650</td>
							<td><span>$</span> 10,000</td>
							<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon-pdf.png" width="21" height="19" alt=""></a></td>
						</tr>
                                            <?php } ?>						
					</thead>
				</table>
            </div><!--Responsive DataTable End-->
			<div class="pagination">
				<?php echo $links?>
			</div>
			
		</div><!--Content End-->
	</div><!--Container End-->
</div><!--Main End-->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" id="quotation">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">
               Get Quotation
            </h4>
         </div>
		 
         <div class="modal-body">
            <div class="form-left">
                <p id="error_quote"></p>
				Choose Product:
				<ul>
					<li><input type="text" placeholder="Product" id="product"></li>
					<li style="text-align:center;">OR</li>
					<li>
						<select placeholder="Manufacturer" id="manufacturer">
							<?php echo $manufacturer;?>
						</select>
					</li>
					<li>
                                            <select id="model" placeholder="Model" disabled="disabled" ><option>Model</option></select>
					</li>
					<li>
						<select id="maxSIP" placeholder="Max Concurrent SIP Sessions for the Box" disabled="disabled"><option>Max Concurrent SIP Sessions</option></select>
					</li>
					<li>
						<select id="packageSIP" placeholder="Package Concurrent SIP Channels" disabled="disabled"><option>Package Concurrent SIP Channels</option></select>
					</li>
				</ul>
			</div>
			<div class="form-right">
				Choose Service Level:
				<ul>
					<li>
						<select placeholder="Service Level" id="service_level">
							<option value='0'>Service Level</option>
							<option value="1">Foundation</option>
							<option value="2">Basic</option>
							<option value="3">Customer Managed</option>
						</select>
					</li>
					<li>
						<select placeholder="Term based on the service level" id="term">
							<option value='0'>Term based on the service level</option>
							<option>12</option>
							<option>24</option>
							<option>36</option>
							<option>48</option>
							<option>60</option>
						</select>
					</li>
					<li class="flt-left bdr-top">
						<button type="button" id="get_quote" class="btn btn-primary">Get Quote</button>
						<button type="reset" class="btn btn-primary">Reset</button>
					</li>
					<li class="dyn-data">
						AT&T customer pricing Quote is
						<label>Installation type <span id="quoteType">: Remote</span></label>
						<label>Deployment Non recurring Cost <span id="quotencr">: $ 17,000</span></label>
						<label>Monthly Recurring Cost (MRC) <span id="quotemrc">: $ 460</span></label>
					</li>
				</ul>
			</div>	
			<div class="clear-both"></div>
         </div>
         
		 <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="qotation_button" type="button" class="btn btn-primary">Submit</button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>