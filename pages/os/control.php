<!DOCTYPE html>
<html>
 <head>
  <META http-equiv="Content-Type" content="text/html; charset=ASCII">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/ico.png">
  <title>
    Company
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/4f61b4c913.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
  <title>SuperSignature PHP Trial</title>
  <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
  <script type="text/javascript" src="common/ss.js"></script>
 </head>
 <body>
  <form method="post" action="super-signature.php">
    <div id='ctlSignature_Container' style='width:700px;height:300px'>
	<canvas ID='ctlSignature' width='700' height='300'></canvas>
    </div>
    <div style="margin-top:5px;position:absolute">
    <input type="hidden" value="<?php echo "iuuuuuuuu" . '.png' ?>" id="ctlSignature_file" name="ctlSignature_file" />
    <input type="submit" value="Finalizar!" class="btn bg-gradient-success w-100 my-4 mb-2" />
    </div>
   <script type="text/javascript">
    	var signObjects = new Array('ctlSignature');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "815",TransparentSign:"true",SignHeight: "320",IeModalFix: false,PenColor: "#000000",BorderStyle: "Dashed",BorderWidth: "2px",BackColor: "#FFFFFF", BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pen.cur", SuccessMessage: "Assinado com sucesso!", SignzIndex:0, Visible: "true", forceMouseEvent: true, Enabled: "true"});		
	
	$(document).ready(function() 
	{
	  objctlSignature.Init();
	});

   </script>
 </body>
</html>