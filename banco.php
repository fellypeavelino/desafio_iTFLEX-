<?php
	
	class conect extends PDO{
		public function __construct(){
			parent::__construct("mysql:host=localhost;dbname=desafio_itflex", "root", "");
		}
		
		public function insert($tarefa){
			$stmt = $this->prepare("insert into tarefas (task,done) values (?,?)");
			$stmt->bindParam(1,$tarefa->task);
			$stmt->bindParam(2,$tarefa->done);
			$stmt->execute();
		}
		
		public function select($id = null){
			$lista = array();
			if($id == null or $id == ""){
				$rs = $this->query("select * from tarefas"); 
				while($row = $rs->fetch(PDO::FETCH_OBJ)){ 
					array_push($lista,$row);
				}
				return $lista;
			}else{
				$rs = $this->query("select * from tarefas where id = ".$id); 
				while($row = $rs->fetch(PDO::FETCH_OBJ)){ 
					array_push($lista,$row);
				}
				return $lista;				
			}
		}

		public function delete($tarefa){
			$stmt = $this->prepare("DELETE FROM tarefas WHERE id = ?"); 
			$stmt->bindParam(1, $tarefa->id); 
			$stmt->execute();			
		}
		
		public function upload($tarefa){
			$stmt = $this->prepare("update tarefas set task = ?,done = ? where id =".$tarefa->id);
			$stmt->bindParam(1,$tarefa->task);
			$stmt->bindParam(2,$tarefa->done);
			$stmt->execute();
		}
	}
?>