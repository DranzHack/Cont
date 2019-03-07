<?php
	class BD
	{
		private $Servidor;
		private $Usuario;
		private $Password;
		private $Bd;
		private $link;
		private $elements = array();

		function __construct()
		{
			include_once __DIR__.'/../conf/dbConf.php';
			$this->Servidor = $srv;
			$this->Usuario = $usr;
			$this->Password = $psswd;
			$this->Bd = $db;
			$this->connect();
		}

		function __destruct()
		{
			$this->link->close();
		}

		private function connect()
		{
			$this->link = new mysqli($this->Servidor,$this->Usuario,$this->Password,$this->Bd);

			if($this->link->connect_errno)
			{
				echo 'Error! '.$this->link->connect_errno;
			}
			else
			{
				$this->link->query("set names 'utf8'");
			}
		}

		public function validarcaracteres($mivariable)
		{
			$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
			$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
			$caracter = htmlentities(str_replace($caracteres_malos, $caracteres_buenos, $mivariable));
			return $caracter;
		}

		

		private function conectar()
		{
			$this->link = @mysqli_connect($this->Servidor,$this->Usuario,$this->Password);

			if(!$this->link)
			{
				die('No se Pudo Conectar: ' . mysqli_error());
			}
			else
			{
				mysqli_select_db($this->link,$this->Bd);
				mysqli_query($this->link,"set names 'utf8'");
			}
		}

		//Metodo para obtener una fila de datos mediante la sentencia de SQL
		public function obtener_fila($data)
		{
			return mysqli_fetch_array($data);
		}

		// --------------------------------------------------------------------------------------
		// Ejecutar Consultas
		// --------------------------------------------------------------------------------------

		/*Ejecuta una consulta regresa resultado*/
/*
	Función Original
		private function ExecuteQuery($query)
		{
			$resultado = mysqli_query($this->link,$query);
			__destruct();
			if($resultado)
				return $resultado;
			else
				return false;
		}
*/

		function ExecutePrepQuery($query, $data)
		{
			$final = null;
			$type = "";
			$values = array();
			foreach($data as $k){
				$type.=$k[0];
				array_push($values,$k[1]);
			}
			$q = $this->link->prepare($query);
			$q->bind_param($type,...$values);
			$q->execute();
			$R = $q->get_result();
			if($R->num_rows)
			{	
				$final = $R;
			}
			elseif($this->link->insert_id){
				$final = $this->link->insert_id;
			}
			else{
				
				$final = false;
			}
			$q->close();
			//$this->link->close();
			return $final;
			//$this->__destruct();
		}

		/*Ejecuta una conlta que no regresa resultados*/

		private function ExecuteNonQuery($query)
		{
			if ((mysqli_query($this->link,$query)) == true)
			{
				return true;
			}
			else{
				return false;
			}
		}

		/*Executa una consulta regresando el ultimo registro*/
		private function ExecuteNonQuery_idlast($query)
		{
			if ((mysqli_query($this->link,$query)) == true)
			{
				return mysqli_insert_id($this->link);
			}
			else{
				return false;
			}
		}

		private function cerrar_Query($query)
		{
			if ((mysqli_query($this->link,$query)) == true)
			{
				return mysqli_stmt_close($this->link);
			}
			else
			{
				return false;
			}
		}


		public function insertUsername($Usuario,$hash,$TipoU){
			
			return $this->ExecutePrepQuery(
				"INSERT INTO
					Usuarios 
					(
						Usuario,
						Contra,
						tipo_usuario
					)
					VALUES
					(
						?,?,?
					)
				",
				array(
					array("s",$Usuario),
					array("s",$hash),
					array("s",$TipoU)
				)
			);
		}


		public function insertAccount(){
			return $this->ExecutePrepQuery(
				"INSERT INTO
					Cuenta_Personas 
					(
						NombrePersona,
						Direccion,
						CodigoPostal,
						Telefono,
						RFC
					)
					VALUES
					(
						'".$_POST['nombre']."',
						'".$_POST['RFC']."',
						'".$_POST['direccion']."',
						'".$_POST['CP']."',
						'".$_POST['tel']."'
					)
				",
				array(
				)
			);
		}

		public function insertClient($id){
			return $this->ExecutePrepQuery(
				"INSERT INTO
					Clientes 
					(
						Persona_client,
						TipoEmpresa,
						Zona,
						Clasificacion
					)
					VALUES
					(
						?,?,?,?
					)
				",
				array(
					array("i",$id),
					array("s",$_POST['tipoE']),
					array("s",$_POST['zona']),
					array("s",$_POST['clasificacion'])
				)
			);
		}


		public function insertProov($id){
			return $this->ExecutePrepQuery(
				"INSERT INTO
					Proovedores 
					(
						Persona_Proovedor,
						Producto
					)
					VALUES
					(
						?,?
					)
				",
				array(
					array("i",$id),
					array("s",$_POST['producto'])
				)
			);
		}

		public function listAccounts($t,$i){
			$query='';
			if($t){
				$query = 'SELECT * FROM Cuenta_Personas CP, Clientes C where CP.IdCuneta_Persona = C.Persona_client LIMIT '.$i.', 15';
			}
			else{
				$query = 'SELECT * FROM Cuenta_Personas CP, Proovedores P where CP.IdCuneta_Persona = P.Persona_Proovedor LIMIT '.$i.', 15';
			}
			return $this->ExecutePrepQuery(
				$query,
				array()
			);
		}

		public function pagesAccount($t){
			$query='';
			if($t){
				$query = 'SELECT count(*) FROM Cuenta_Personas CP, Clientes C where CP.IdCuneta_Persona = C.Persona_client';
			}
			else{
				$query = 'SELECT count(*) FROM Cuenta_Personas CP, Proovedores P where CP.IdCuneta_Persona = P.Persona_Proovedor';
			}
			return $this->ExecutePrepQuery(
				$query,
				array()
			);
		}

		public function showtableusers()
		{
			$query='SELECT * FROM Usuarios';
			return $this->ExecutePrepQuery(
				$query,
				array()
			);
			
		}

		public function showperUser($Clave)
		{
			$query='SELECT * FROM Usuarios where Id_Usuario='.$Clave;
			return $this->ExecutePrepQuery(
				$query,
				array()
			);
			
		}

		public function Confirm_User($Username)
		{
			$query='SELECT * FROM Usuarios WHERE Usuario=?';
			return $this->ExecutePrepQuery(
				$query, 
				array(
					array("s",$Username)
				)
			);
		}

/*
		public function Confirmar_Usuarios($Usuario,$Password)
		{
			$query = "SELECT Id_Usuario,Usuario,Contra,tipo_usuario FROM Usuarios
					  WHERE(Usuario = '$Usuario') AND Contra = '$Password'";

			if($Data = $this->ExecuteQuery($query))
			{
				$Datos = array();
				$Filas = 0;
				while($Resultado = $this->obtener_fila($Data))
				{
					$Datos[$Filas][0] = $Resultado['Id_Usuario'];
					$Datos[$Filas][1] = $Resultado['Usuario'];
					$Datos[$Filas][2] = $Resultado['Contra'];
					$Datos[$Filas][3] = $Resultado['tipo_usuario'];
				}
				return $Datos;
			}
			else
				return false;
		}
		*/

		public function UpdateUsers($Username,$Contra,$TipoUser,$User)
		{
			return $this->ExecutePrepQuery(
				"UPDATE Usuarios SET Usuario=?,Contra=?,tipo_usuario=? where Id_Usuario=?
				",
				array(
					array("s",$Username),
					array("s",$Contra),
					array("s",$TipoUser),
					array("i",$User)
				)
			);
		}

		public function DeleteUsers($User)
		{
			return $this->ExecutePrepQuery(
				"DELETE FROM Usuarios where Id_Usuario=?",
				array(
					array("i",$User)
				)
			);
		}

		public function selectClient(){
			return $this->ExecutePrepQuery(
				'SELECT * FROM Cuenta_Personas CP, Clientes C where CP.IdCuneta_Persona = C.Persona_client',
				array()
			);
		}


		public function selectProov(){
			return $this->ExecutePrepQuery(
				'SELECT * FROM Cuenta_Personas CP, Proovedores P where CP.IdCuneta_Persona = P.Persona_Proovedor',
				array()
			);
		}

		public function pago(){
			return $this->ExecutePrepQuery(
				"INSERT INTO
					Pago 
					(
						Nombre,
						Provedor_empresa,
						Cliente,
						SubTotal,
						Porcentaje,
						Transferencia_Cheque,
						Banco
					)
					VALUES
					(
						?,
						?,
						?,
						?,
						?,
						?,
						?
					)
				",
				array(
					array("s",$_POST['nombre']),
					array("i",$_POST['proovedor']),
					array("i",$_POST['cliente']),
					array("d",$_POST['subtotal']),
					array("d",$_POST['comision']),
					array("d",$_POST['transferencia']),
					array("s",$_POST['banco'])
				)
			);
		}

		public function getAccount($t,$i){
			$query='';
			if($t){
				$query = 'SELECT * FROM Cuenta_Personas CP, Clientes C where CP.IdCuneta_Persona = C.Persona_client and IdCuneta_Persona = ?';
			}
			else{
				$query = 'SELECT * FROM Cuenta_Personas CP, Proovedores P where CP.IdCuneta_Persona = P.Persona_Proovedor and IdCuneta_Persona = ?';
			}
			return $this->ExecutePrepQuery(
				$query,
				array(
					array("i",$i)
				)
			);
		}

}

?>