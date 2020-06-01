<?php 
	require_once("usuario.php");
	$obj = new Usuario();
 ?>
<section id="principal">

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Password: <input type="password" name="password"> <br>
		Tipo:
		<select name="tipo">
			<option value="1">Administrador</option>
			<option value="2">Usuario</option>
		</select> <br>
		<input type="submit" value="Agregar Usuario" name="alta">
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre = $_POST["nombre"];
			$password = $_POST["password"];
			$tipo = $_POST["tipo"];
			
			$obj->alta($nombre,$tipo,$password);
			echo "<h2>Usuario agregado</h2>";
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Password</th>
			<th>Tipo</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>*************</td>";
				if($fila["tipo"]==1){
					echo "<td>Administrador</td>";
				}else{
					echo "<td>Usuario</td>";
				}
				echo "</tr>";
			}
		 ?>
	</table>

</section>