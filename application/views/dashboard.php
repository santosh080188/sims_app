<!DOCTYPE html>
<html>
    <head>
        <title>Smart IMS Quotation Application - Dashboard</title>
        <meta content="IE=Edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/quote.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
  <style>
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
  .ui-autocomplete{
	background:#fff;
    display: none;
    float: left;
    height: 200px;
    left: 399px;
    position: absolute;
    top: 209.65px;
    width: 273px;
    z-index: 99999;
	font-size:12px;
	color:#333;
	  
  }
  </style>
  <script>
  $(function() {      
    var availableProduct = <?php echo $sku?>;
    $( document ).ready(function() {
    $( "#product" ).autocomplete({
      source: availableProduct
    });
  });
  });
  </script>
  
  
  
    </head>

    <body>

        <div class="main">
            <header class="header">
                <figure class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="253" height="65" alt=""></figure>
                <nav class="nav-top">
                    <ul>
                        <li><a href="#Username"><?php echo $this->session->userdata('firstname'); ?> <i class="Username"></i></a><li>
        <li><a href="<?php echo base_url(); ?>index.php/login/logout">Logout <i class="Logout"></i></a><li>
        <li class="no-bdr"><a href="#myModalContent.html" data-toggle="modal" data-target="#myModal">Get Quotation <i class="Get-Quotation"></i></a><li>
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
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $loop = 0;
                                if ((!$user_product_list)) {
                                    echo "<tr><td colspan='14' style='text-align:center'> No record found</td></tr>";
                                } else {
                                    foreach ($user_product_list as $obj) {
                                        // print_r($obj);exit();
                                        ?>
                                        <tr>
                                            <td><?php echo ++$loop ?></td>
                                            <td><?php echo $obj->id ?></td>
                                            <td><?php echo date('Y-m-d'); ?></td>
                                            <td><?php echo $obj->sku ?></td>
                                            <td><?php echo $obj->manufacturer ?></td>
                                            <td><?php echo $obj->model_number ?></td>
                                            <td><?php echo $obj->concurrent_SIP_sessions ?></td>
                                            <td><?php echo $obj->package_concurrent_SIP ?></td>
                                            <td><?php echo $obj->level ?></td>
                                            <td><?php echo ucfirst($obj->term) ?></td>
                                            <td><?php echo ucfirst($obj->type) ?></td>
                                            <td><?php echo $obj->mrc ?></td>
                                            <td><?php echo $obj->nrc ?></td>
                                        </tr>
                                    <?php }
                                }
                                ?>						
                                </thead>
                        </table>
                    </div><!--Responsive DataTable End-->
                    <div class="pagination">
<?php echo $links ?>
                    </div>
                </div><!--Content End-->
            </div><!--Container End-->
        </div><!--Main End-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" id="quotation">
                    <form>
         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">
               Get Quotation
            </h4>
         </div>
		 
         <div class="modal-body">
                            <div id="error_product"></div>

            <div class="form-left">
				Choose Product:
				<ul>                                    
                                    <li><input type="text" placeholder="Product" id="product"></li>
					<li style="text-align:center;">OR</li>
					<li>
                                        <select placeholder="Manufacturer" id="manufacturer"><?php echo $manufacturer; ?>
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
                                                <button type="reset" id="get_Reset" class="btn btn-primary" value="Reset">Reset</button>
					</li>
					<li class="dyn-data">
						AT&T customer pricing Quote is
                                        <label id="item1">Installation type <span id="quoteType"></span></label>
                                        <label id="item2">Deployment Non recurring Cost <span id="quotencr"></span></label>
                                        <label id="item3">Monthly Recurring Cost (MRC) <span id="quotemrc"></span></label>
					</li>
				</ul>
			</div>	
			<div class="clear-both"></div>
         </div>
         
		 <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="qotation_button" type="button" class="btn btn-primary">Submit</button>
         </div>
                    </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    </body>
</html>