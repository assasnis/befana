<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	
	<body>
		<!----- start-header---->
			<div id="home" class="header">
					<div class="top-header">
						<div class="container">
						<div class="logo">
							<a href="#"><img src="images/befanita.jpeg" title="Befana" /></a>
						</div>
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li><a href="#home" class="scroll">Home</a><span> </span></li>
								<li><a href="#about" class="scroll">About ME </a></li>
								<li><a href="#services" class="scroll">Services</a></li>
								<li><a href="#work" class="scroll">MY work</a><span> </span></li>
								<li><a href="#contact" class="scroll">contact ME</a></li>
								<div class="clearfix"> </div>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!----- //End-header---->
			<!----banner---->
			 <form id="myform" action=<?php echo base_url().'index.php/User_controller/validar';?> method="post" role="form" class="form-horizontal" >
                        
			 	<div class="panel panel-default">
  <div class="panel-body" style="">

            
				<div class="" align="center">
					<div class="form-group">
                            <label for="user" class="control-label col-xs-4">Usuario</label>
                            <div class="col-xs-5">
                                <input id="user" name="user" type="text" class="form-control" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="control-label col-xs-4">Contraseña</label>
                            <div class="col-xs-5">
                                <input id="pass" name="pass" type="password" class="form-control" value="" >
                                <span class="help-block"></span>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="codigo" class="control-label col-xs-4"></label>
                            <div class="col-xs-3">
                               <button class="btn btn-success " type="submit" ><span class="glyphicon glyphicon-log-in"></span> Acceder</button> 
                               
                            </div>                            
                        </div>    

                        </form>
				
				<!-- //banner-info ---->
					</div>
				</div>
			</div>


  
</table>
                        
                        
			
			<!---//copy-right---->
	</body>
</html>

