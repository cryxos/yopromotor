<?php

// Init backend
require './init.php';

use App\Session;
use App\Model\User;

Session::init();
$idUser = Session::getValue('correo');
 
if(!$idUser){    
    header("location: ../consultar.php");
}
 
 
//Ruta del archivo adjunto
$file = __DIR__.'/uploads/'.$alldata[0]["numero"].'/'.$alldata[0]["numero"].'-PDF.pdf';
$message  =  basename($file);


$datosUsuario = User::getDatosEnSession(); 
$alldata  = User::selectall('*');
//print_r($alldata); 

include('function.php');
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>YO PROMOTOR | </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<style>
		table .red {
			background-color:#e79797;
		}
		
		table .yellow {
			background-color:#FFF;
		}
		
		table .green {
			background-color:#98e598;
		}
	</style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-without-sidebar page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			 
			
		 
		</div>
		<!-- end #header -->
		 
		<!-- begin #content -->
		<div id="content" class="content">
			 
			<!-- begin page-header -->
			<h1 class="page-header">YO PROMOTOR <small> ...</small></h1>
			<!-- end page-header -->
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb justify-content-end">
					<li class="breadcrumb-item active" aria-current="page"><?php echo '<a class="nav-link active btn btn-dark" href="../plogout.php">Cerrar sesión</a>';  ?></li>
				</ol>
			</nav>
			<!-- begin row -->
			<div class="row">
				 
				<!-- begin col-10 -->
				<div class="col-xl-12">
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						 
						<!-- end panel-heading -->
						<!-- begin panel-body -->
						<div class="panel-body">
							<table id="data-table-combine" class="table table-bordered table-td-valign-middle">
								<thead>
									<tr>
										<th width="1%"></th>  
										<th class="text-nowrap">nombres</th>
										<th class="text-nowrap">apellidos</th>
										<th class="text-nowrap">sexo</th>
										<th class="text-nowrap">tdocumento</th>
										<th class="text-nowrap">numero</th>
										<th class="text-nowrap">fecha</th>
										<th class="text-nowrap">edad</th>
										<th class="text-nowrap">departamento</th>
										<th class="text-nowrap">provincia</th>
										<th class="text-nowrap">distrito</th>
										<th class="text-nowrap">dirección</th>
										<th class="text-nowrap">celular</th>
										<th class="text-nowrap">telefono</th>
										<th class="text-nowrap">email</th>
										<th class="text-nowrap">carrera</th>
										<th class="text-nowrap">enlace</th>
										<th class="text-nowrap">E</th>           
										<th class="text-nowrap"></th> 
									</tr>
								</thead>
								<tbody>
									 
									<?php
                                    for($i=0; $i<= count($alldata)-1 ; $i++){
                                        $row = $alldata[$i];
                                        echo "<tr id='record-".$row["idpromotor"]."'  class='odd gradeX ";
                                            colorEstado($row["estado"]);                                          

										echo "' >
												<td width='1%' class='f-s-600 text-inverse'>".($i+1)."</td> 
                                                <td>".$row["nombres"]."</td>
                                                <td>".$row["apellidos"]."</td>
                                                <td>".$row["sexo"]."</td>
                                                <td>".$row["tdocumento"]."</td> 
                                                <td>".$row["numero"]."</td>  
                                                <td>".$row["fecha"]."</td>
                                                <td>".$row["edad"]."</td> 
                                                <td>".$row["departamento"]."</td>
                                                <td>".$row["provincia"]."</td>
                                                <td>".$row["distrito"]."</td>
                                                <td>".$row["direccion"]."</td>
                                                <td>".$row["celular"]."</td>
                                                <td>".$row["telefono"]."</td>
                                                <td>".$row["email"]."</td>
                                                
                                                <td>".$row["carrera"]."</td>
                                                <td>".$row["enlace"]."</td>

                                                <td id='status-cell-".$row["idpromotor"]."'>";
                                                    nombreEstado($row["estado"]); 
                                                echo "</td>
                                                
                                                <td style='width: 140px;'>  
                                                    <button type='button' class='btn btn-danger btnDescartar' id='".$row["idpromotor"]."' ><i class='fas fa-user-slash'></i></button>    
                                                    <button type='button' class='btn btn-warning btnPendiente' id='".$row["idpromotor"]."'><i class='fas fa-question'></i></button>
                                                    <button type='button' class='btn btn-success btnAprobar' id='".$row["idpromotor"]."' ><i class='fas fa-check'></i></button>    

                                                </td>
                                                
                                            </tr>";

                                    }
                                    ?>
									 
								</tbody>
							</table>
						</div>
						<!-- end panel-body -->
					</div>
				</div>
				<!-- end col-10 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		
		<!-- begin theme-panel -->
		<div class="theme-panel theme-panel-lg">
			<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
			<div class="theme-panel-content">
				<h5>App Settings</h5>
				<ul class="theme-list clearfix">
					<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="assets/css/default/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="assets/css/default/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="assets/css/default/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="assets/css/default/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="assets/css/default/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="assets/css/default/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
					<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="assets/css/default/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="assets/css/default/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="assets/css/default/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="assets/css/default/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="assets/css/default/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
				</ul>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked />
							<label class="custom-control-label" for="headerFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1" />
							<label class="custom-control-label" for="headerInverse">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked />
							<label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1" />
							<label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
					<div class="col-md-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1" />
							<label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<h5>Admin Design (5)</h5>
				 
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-md-12">
						<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
						<a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>
					</div>
				</div>
			</div>
		</div>
		<!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/theme/default.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
	<script src="assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-colreorder/js/dataTables.colreorder.min.js"></script>
	<script src="assets/plugins/datatables.net-colreorder-bs4/js/colreorder.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-keytable/js/dataTables.keytable.min.js"></script>
	<script src="assets/plugins/datatables.net-keytable-bs4/js/keytable.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js"></script>
	<script src="assets/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
	<script src="assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
	<script src="assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="assets/plugins/pdfmake/build/pdfmake.min.js"></script>
	<script src="assets/plugins/pdfmake/build/vfs_fonts.js"></script>
	<script src="assets/plugins/jszip/dist/jszip.min.js"></script>
	<script src="assets/js/demo/table-manage-combine.demo.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script src="../assets/appupdate.js"></script>

</body>
</html>
