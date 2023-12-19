<?php include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Modulo de administración de página web">
    <meta name="author" content="Leonardo Lizarazo Lozada">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Módulo de administración web</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script>
function clicked(e)
{
    if(!confirm('¿Está seguro? Esta acción no se puede deshacer'))e.preventDefault();
}
</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="assets/img/basic/logo.png" alt="">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?php echo $_SESSION["s_imagen"]; ?>" alt="<?php echo $_SESSION["s_nombre"]; ?>">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $_SESSION["s_nombre"]; ?></h6>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="index.html" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-person text-blue"></i>Perfil
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Cambiar contraseña</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include("menu.php"); ?>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->

        </div>
    </div>
</div>
<div class="page has-sidebar-left">
    <header class="my-3">
		<?php if ($_GET["resultado"] == 'exito') { ?>
				<div class="toast"
                     data-title="Actualización exitosa"
                     data-message="La información se ha modificado correctamente"
                     data-type="success">
                </div>
		<?php } elseif ($_GET["resultado"] == 'fallo') { ?>
				<div class="toast"
                     data-title="La actualización falló"
                     data-message="Hubo un error y la información no se ha podido modificar"
                     data-type="error">
                </div>
		<?php } else { echo "";} ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="s-24">
                        <i class="icon-pages"></i>
                        Bienvenido <?php echo $_SESSION["s_nombre"]; ?>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <p>Aquí podrá consultar los resultados de las encuestas</p>
    </div>
	<div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
				<?php if($_GET['encuesta'] == 'encuesta_suit'){ ?>
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body b-b">
							<table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Fecha</th>
										<th>Trámite</th>
										<th>Información clara</th>
										<th>Acceso fácil</th>
										<th>Satisfacción</th>
										<th>Comentarios</th>
                                    </tr>
										<?php $ssql = "Select * from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']."";
								$result = $conn->query($ssql); $total_encuestas = mysqli_num_rows($result); $porcentaje_encuestas = $total_encuestas/100;
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["dia"]; echo "-"; echo $row["mes"]; echo "-"; echo $row["ano"]; ?></td>
										<td><?php echo $row["tramite"]; ?></td>
										<td><?php echo $row["info_clara"]; ?></td>
										<td><?php echo $row["acceso_facil"]; ?></td>
										<td><?php echo $row["satisfaccion"]; ?></td>
										<td><?php echo $row["mejorar"]; ?></td>
                                    </tr>
                                    <?php }} else { echo ""; } ?>
                                    </tbody>
                                </table>
                        </div>
						
					</div>
					
					<div class="card">
                        
                        <div class="card-body b-b">
							<h3><strong>¿La información para realizar el trámite (pasos a seguir, requisitos, etc) o para solicitar el servicio fue clara y completa?</strong></h3>
							<h4><strong><?php $ssqlicsi = "Select info_clara from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND info_clara = 'SI' ";
								$resulticsi = $conn->query($ssqlicsi);
								$total_ic_si = mysqli_num_rows($resulticsi); $porcentaje_ic_si = round($total_ic_si/$total_encuestas*100); echo "SI: "; echo $total_ic_si; echo " - "; echo $porcentaje_ic_si; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlicno = "Select info_clara from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND info_clara = 'NO' ";
								$resulticno = $conn->query($ssqlicno);
								$total_ic_no = mysqli_num_rows($resulticno); $porcentaje_ic_no = round($total_ic_no/$total_encuestas*100); echo "NO: "; echo $total_ic_no; echo " - "; echo $porcentaje_ic_no; echo "%" ?></strong></h4>
							<hr>
							<h3><strong>¿El acceso para realizar el trámite o solicitar el servicio fue fácil y adecuado?</strong></h3>
							<h4><strong><?php $ssqlacsi = "Select acceso_facil from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND acceso_facil = 'SI' ";
								$resultacsi = $conn->query($ssqlacsi);
								$total_ac_si = mysqli_num_rows($resultacsi); $porcentaje_ac_si = round($total_ac_si/$total_encuestas*100); echo "SI: "; echo $total_ac_si; echo " - "; echo $porcentaje_ac_si; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlacno = "Select acceso_facil from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND acceso_facil = 'NO' ";
								$resultacno = $conn->query($ssqlacno);
								$total_ac_no = mysqli_num_rows($resultacno); $porcentaje_ac_no = round($total_ac_no/$total_encuestas*100); echo "NO: "; echo $total_ac_no; echo " - "; echo $porcentaje_ac_no; echo "%" ?></strong></h4>
							<hr>
							<h3><strong>Califique su grado de satisfacción respecto al trámites o servicios prestados en general</strong></h3>
							<h4><strong><?php $ssqlex = "Select satisfaccion from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND satisfaccion = 'Excelente' ";
								$resultex = $conn->query($ssqlex);
								$total_ex = mysqli_num_rows($resultex); $porcentaje_ex = round($total_ex/$total_encuestas*100); echo "Excelente: "; echo $total_ex; echo " - "; echo $porcentaje_ex; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlmb = "Select satisfaccion from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND satisfaccion = 'Muy buena' ";
								$resultmb = $conn->query($ssqlmb);
								$total_mb = mysqli_num_rows($resultmb); $porcentaje_mb = round($total_mb/$total_encuestas*100); echo "Muy buena: "; echo $total_mb; echo " - "; echo $porcentaje_mb; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlbu = "Select satisfaccion from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND satisfaccion = 'Buena' ";
								$resultbu = $conn->query($ssqlbu);
								$total_bu = mysqli_num_rows($resultbu); $porcentaje_bu = round($total_bu/$total_encuestas*100); echo "Buena: "; echo $total_bu; echo " - "; echo $porcentaje_bu; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlre = "Select satisfaccion from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND satisfaccion = 'Regular' ";
								$resultre = $conn->query($ssqlre);
								$total_re = mysqli_num_rows($resultre); $porcentaje_re = round($total_re/$total_encuestas*100); echo "Regular: "; echo $total_re; echo " - "; echo $porcentaje_re; echo "%" ?></strong></h4>
                        </div>
						
					</div>
                </div>
				<?php } elseif($_GET['encuesta'] == 'encuesta_transp') { ?>
				<div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body b-b">
							<table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Fecha</th>
										<th>Visita web</th>
										<th>Encontró información</th>
										<th>Facilidad de acceso</th>
                                    </tr>
										<?php $ssql = "Select * from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']."";
								$result = $conn->query($ssql); $total_encuestas = mysqli_num_rows($result); $porcentaje_encuestas = $total_encuestas/100;
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["dia"]; echo "-"; echo $row["mes"]; echo "-"; echo $row["ano"]; ?></td>
										<td><?php echo $row["visita"]; ?></td>
										<td><?php echo $row["encontro"]; ?></td>
										<td><?php echo $row["facilidad"]; ?></td>
                                    </tr>
                                    <?php }} else { echo ""; } ?>
                                    </tbody>
                                </table>
                        </div>
						
					</div>
					
					<div class="card">
                        
                        <div class="card-body b-b">
							<h3><strong>¿Con qué regularidad visita el sitio web de la E.S.E. Hospital Universitario San Rafael de Tunja?</strong></h3>
							<h4><strong><?php $ssqldi = "Select visita from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND visita = 'diariamente' ";
								$resultdi = $conn->query($ssqldi);
								$total_di = mysqli_num_rows($resultdi); $porcentaje_di = round($total_di/$total_encuestas*100); echo "Diariamente: "; echo $total_di; echo " - "; echo $porcentaje_di; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlse = "Select visita from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND visita = 'semanalmente' ";
								$resultse = $conn->query($ssqlse);
								$total_se = mysqli_num_rows($resultse); $porcentaje_se = round($total_se/$total_encuestas*100); echo "Semanalmente: "; echo $total_se; echo " - "; echo $porcentaje_se; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlme = "Select visita from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND visita = 'mensualmente' ";
								$resultme = $conn->query($ssqlme);
								$total_me = mysqli_num_rows($resultme); $porcentaje_me = round($total_me/$total_encuestas*100); echo "Mensualmente: "; echo $total_me; echo " - "; echo $porcentaje_me; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqloc = "Select visita from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND visita = 'ocasionalmente' ";
								$resultoc = $conn->query($ssqloc);
								$total_oc = mysqli_num_rows($resultoc); $porcentaje_oc = round($total_oc/$total_encuestas*100); echo "Ocasionalmente: "; echo $total_oc; echo " - "; echo $porcentaje_oc; echo "%" ?></strong></h4>
							<h3><strong>¿Encontró la información que estaba buscando?</strong></h3>
							<h4><strong><?php $ssqlicsi = "Select encontro from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND encontro = 'SI' ";
								$resulticsi = $conn->query($ssqlicsi);
								$total_ic_si = mysqli_num_rows($resulticsi); $porcentaje_ic_si = round($total_ic_si/$total_encuestas*100); echo "Si, toda: "; echo $total_ic_si; echo " - "; echo $porcentaje_ic_si; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlicpa = "Select encontro from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND encontro = 'PARTE' ";
								$resulticpa = $conn->query($ssqlicpa);
								$total_ic_pa = mysqli_num_rows($resulticpa); $porcentaje_ic_pa = round($total_ic_pa/$total_encuestas*100); echo "Solo una parte: "; echo $total_ic_pa; echo " - "; echo $porcentaje_ic_pa; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlicno = "Select encontro from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND encontro = 'NO' ";
								$resulticno = $conn->query($ssqlicno);
								$total_ic_no = mysqli_num_rows($resulticno); $porcentaje_ic_no = round($total_ic_no/$total_encuestas*100); echo "No encontré la información: "; echo $total_ic_no; echo " - "; echo $porcentaje_ic_no; echo "%" ?></strong></h4>
							<hr>
							<h3><strong>Califique la facilidad de acceso a la información que buscaba</strong></h3>
							<h4><strong><?php $ssqlex = "Select facilidad from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND facilidad = 'Excelente' ";
								$resultex = $conn->query($ssqlex);
								$total_ex = mysqli_num_rows($resultex); $porcentaje_ex = round($total_ex/$total_encuestas*100); echo "Excelente: "; echo $total_ex; echo " - "; echo $porcentaje_ex; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlbu = "Select facilidad from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND facilidad = 'Buena' ";
								$resultbu = $conn->query($ssqlbu);
								$total_bu = mysqli_num_rows($resultbu); $porcentaje_bu = round($total_bu/$total_encuestas*100); echo "Buena: "; echo $total_bu; echo " - "; echo $porcentaje_bu; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlre = "Select facilidad from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND facilidad = 'Regular' ";
								$resultre = $conn->query($ssqlre);
								$total_re = mysqli_num_rows($resultre); $porcentaje_re = round($total_re/$total_encuestas*100); echo "Regular: "; echo $total_re; echo " - "; echo $porcentaje_re; echo "%" ?></strong></h4>
							<h4><strong><?php $ssqlmb = "Select facilidad from ".$_GET['encuesta']." WHERE ano = ".$_GET['ano']." AND mes = ".$_GET['mes']." AND facilidad = 'Mala' ";
								$resultmb = $conn->query($ssqlmb);
								$total_mb = mysqli_num_rows($resultmb); $porcentaje_mb = round($total_mb/$total_encuestas*100); echo "Mala: "; echo $total_mb; echo " - "; echo $porcentaje_mb; echo "%" ?></strong></h4>
							<hr>
                        </div>
						
					</div>
                </div>
				<?php } ?>
            </div>
        </div>
    </div>
	
    </div>
</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
</body>
</html>