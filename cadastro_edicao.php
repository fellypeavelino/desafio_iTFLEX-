<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="jquery.js"></script>
		<script>
			$(function(){
				$('#close').click(function(){
					$("#spoolk").css({
						"width":"0px",
						"left":"0px",
						"height":"0px"
					});
					$("#formulario").css({
						"width":"0px",
						"left":"0px",
						"height":"0px"
					});
					$("#formulario").html("");
				});	
				$('#btn-login').click(function(){
					var url = window.location.href;
					var string = '"task":"'+$('#task').val()+'","done":'+($('#done').is(":checked") != "true" ? false : true);
					//console.log(btoa(string));
					$.ajax({
						url : 'webservice_rest.php',
						type : 'POST',
						data : {data : btoa(string)},
						success : function(){
							window.location.href = url;
						}
					});
				});
				$('#btn-edit').click(function(){
					
				});
			});
		</script>
		<style>
			#login {
				padding-top: 50px
			}
			#login .form-wrap {
				width: 30%;
				margin-left: 80px ;
			}
			#login h1 {
				color: #1fa67b;
				font-size: 18px;
				text-align: center;
				font-weight: bold;
				padding-bottom: 20px;
			}
			#login .form-group {
				margin-bottom: 25px;
			}
			#login .checkbox {
				margin-bottom: 20px;
				position: relative;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				-o-user-select: none;
				user-select: none;
			}
			#login .checkbox.show:before {
				content: '\e013';
				color: #1fa67b;
				font-size: 17px;
				margin: 1px 0 0 3px;
				position: absolute;
				pointer-events: none;
				font-family: 'Glyphicons Halflings';
			}
			#login .checkbox .character-checkbox {
				width: 25px;
				height: 25px;
				cursor: pointer;
				border-radius: 3px;
				border: 1px solid #ccc;
				vertical-align: middle;
				display: inline-block;
			}
			#login .checkbox .label {
				color: #6d6d6d;
				font-size: 13px;
				font-weight: normal;
			}
			#login .btn.btn-custom {
				font-size: 14px;
				margin-bottom: 20px;
			}
			#login .forget {
				font-size: 13px;
				text-align: center;
				display: block;
			}

			/*    --------------------------------------------------
				:: Inputs & Buttons
				-------------------------------------------------- */
			.form-control {
				color: #212121;
			}
			/*delete d9534f */
			.btn-custom {
				color: #fff;
				background-color: <?= ($_GET['fl'] == 1 ? "#2e6da4" : "#5bc0de")?>;
			}
			.btn-custom:hover,
			.btn-custom:focus {
				color: #fff;
			}

			/*    --------------------------------------------------
				:: Footer
				-------------------------------------------------- */
			#footer {
				color: #6d6d6d;
				font-size: 12px;
				text-align: center;
			}
			#footer p {
				margin-bottom: 0;
			}
			#footer a {
				color: inherit;
			}
		</style>
	</head>
	<body>
		<section id="login">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-wrap">
						<label id="close" style="color:red;margin-left:270px;cursor:pointer;" >
							X
						</label>
						<h1></h1>
							<form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">
								<div class="form-group">
									<label for="task" class="sr-only">TASK</label>
									<input type="text" name="task" id="task" class="form-control" placeholder="TASK">
								</div>
								<div class="checkbox form-group">
									<input class="character-checkbox" type="checkbox" name="done" id="done" value="true" />
									<span class="label">DONE</span>
								</div>
								<input type="hidden" name="id" id="id" value="" />
								<?php if($_GET['fl'] == 1){?>
								<input type="button" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Save">
								<?php }else{?>
								<input type="button" id="btn-edit" class="btn btn-custom btn-lg btn-block" value="Edit">
								<?php }?>
							</form>
							<hr>
						</div>
					</div> <!-- /.col-xs-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</section>
    </body>
</html>