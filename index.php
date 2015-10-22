
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="jquery.js"></script>
		<script >
			$(function(){
				$.ajax({
					url : 'webservice_rest.php',
					type : 'GET',
					data : {data : '<?php echo base64_encode('"id":null');?>'},
					dataType : "JSON",
					success : function(data){
						for(var i = 0; i < data.length; i++){
							var obj = data[i];
							var trNova = document.createElement("tr");
							var tdId = document.createElement("td");
							tdId.innerHTML = obj.id;
							trNova.appendChild(tdId);
							var tdTask = document.createElement("td");
							tdTask.innerHTML = obj.task;
							trNova.appendChild(tdTask);
							var tdDone = document.createElement("td");
							tdDone.innerHTML = (obj.done == 1 ? "Yes" : "No");
							trNova.appendChild(tdDone);
							var tdAction = document.createElement("td");
							tdAction.setAttribute("class", "text-center");
							tdAction.innerHTML = "";
							var aEdit = document.createElement("a");
							aEdit.setAttribute("class", "btn btn-info btn-xs");
							aEdit.setAttribute("id", "edit_"+obj.id);
							aEdit.setAttribute("style", "cursor:pointer");
							var spanEdit = document.createElement("span");
							spanEdit.setAttribute("class", "glyphicon glyphicon-edit");
							aEdit.appendChild(spanEdit);
							//aEdit.appendChild("Edit");
							var aExcluir = document.createElement("a");
							aExcluir.setAttribute("class", "btn btn-danger btn-xs");
							aExcluir.setAttribute("id", "exc_"+obj.id);
							aExcluir.setAttribute("href", "");
							var spanExcluir = document.createElement("span");
							spanExcluir.setAttribute("class", "glyphicon glyphicon-remove");
							aExcluir.appendChild(spanExcluir);
							//aExcluir.appendChild("Excluir");
							tdAction.appendChild(aEdit);
							tdAction.appendChild(aExcluir);
							trNova.appendChild(tdAction);
							document.querySelector('#tbody').appendChild(trNova);

						}
						$('.btn-info').append("Edit");
						$('.btn-danger').append("Del");
						$('.btn-info').click(function(){
							var id = $(this).attr("id").replace("edit_","").trim();
							var string = '"id":'+id;
							var width = $(window).width();
							var height = $(document).height();
							$("#spoolk").css({
								"width":width+"px",
								"height":height+"px",
								"top":"0px",
								"opacity":"0.5",
								"background-color":"gray"
							});
							$("#formulario").css({
								"width":(width/2)+"px",
								"left":(width/4)+"px",
								"height":(height/1.8)+"px",
								"top":"0px",
								"background-color":"white",
								"border-radius":"15px"
							});
							$.ajax({
								url:"webservice_rest.php",
								type:"GET",
								dataType : "JSON",
								data : {data : btoa(string)},
								success:function(data){
									var obj = data[0];
									$.ajax({
										url:"cadastro_edicao.php?fl=2",
										type:"GET",
										success:function(data){
											$("#formulario").html(data);
											$("#task").val(obj.task);
											$("#id").val(obj.id);
											if(obj.done == 1){
												$("#done").prop("checked", true);
											}
										}
									});
								}
							});
						});
						$('.btn-danger').click(function(){
							var url = window.location.href;
							var id = $(this).attr("id").replace("exc_","").trim();
							var string = '"id":'+id;
							$.ajax({
								url : 'webservice_rest.php',
								type : 'DELETE',
								data : {data : btoa(string)},
								success : function(){
									window.location.href = url;
								}								
							})
						});
						
						$(".btn-primary").click(function(){
							var width = $(window).width();
							var height = $(document).height();
							$("#spoolk").css({
								"width":width+"px",
								"height":height+"px",
								"top":"0px",
								"opacity":"0.5",
								"background-color":"gray"
							});
							$("#formulario").css({
								"width":(width/2)+"px",
								"left":(width/4)+"px",
								"height":(height/1.8)+"px",
								"top":"0px",
								"background-color":"white",
								"border-radius":"15px"
							});
							$.ajax({
								url:"cadastro_edicao.php?fl=1",
								type:"GET",
								success:function(data){
									$("#formulario").html(data);
								}
							});
						});
					}
				});
					
			});
		</script>
    </head>
    <body>
		<div class="container">
			<div class="row col-md-6 col-md-offset-2 custyle">
			<table class="table table-striped custab">
				<thead>
				<a style="cursor:pointer;" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
					<tr>
						<th>ID</th>
						<th>TASK</th>
						<th>DONE</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
						<!--
						<tr>
							<td>1</td>
							<td>News</td>
							<td>News Cate</td>
							<td class="text-center">
								<a class='btn btn-info btn-xs' href="#">
									<span class="glyphicon glyphicon-edit">
									</span> Edit
								</a> 
								<a href="#" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-remove"></span> 
									Del
								</a>
							</td>
						</tr>
						-->
				</tbody>
			</table>
			</div>
		</div>
		<div id="spoolk" style="position:absolute;">
		</div>
		<div id="formulario" style="position:absolute;z-index:2;">
		</div>
    </body>
</html>