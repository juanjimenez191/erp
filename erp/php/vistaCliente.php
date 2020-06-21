<?php 
	require_once("cliente.php");
	$obj = new Cliente();
 ?>

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		direccion: <input type="text" name="direccion"> <br>
		telefono: <input type="text" name="telefono"> <br>
		correo: <input type="text" name="correo"> <br>
		apematerno: <input type="text" name="apematerno"> <br>
		apepaterno: <input type="text" name="apepaterno"> <br>
		sexo: <input type="tinyint" name="sexo"> <br>
		fenacimiento: <input type="date" name="fenacimiento"> <br>




		
		<input type="submit" value="Agregar cliente" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>cliente eliminado</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>cliente agregado</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre = $_POST["nombre"];
			$descripcion = $_POST["direccion"];
			$preciov = $_POST["telefono"];
			$precioc = $_POST["correo"];
			$cantidad = $_POST["apematerno"];
			$cantmin = $_POST["apepaterno"];
			$cantmax = $_POST["sexo"];
			$categoria = $_POST["fenacimiento"];
			
			$obj->alta($nombre,$direccion,$telefono,$correo,$apematerno,$apepaterno,$sexo,$fenacimiento);
			header("Location: ?sec=cli&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th>Apematerno</th>
			<th>Apepaterno</th>
			<th>sexo</th>
			<th>Fenacimiento</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["direccion"]."</td>";
				echo "<td>".$fila["telefono"]."</td>";
				echo "<td>".$fila["correo"]."</td>";
				echo "<td>".$fila["apematerno"]."</td>";
				echo "<td>".$fila["apepaterno"]."</td>";
				echo "<td>".$fila["sexo"]."</td>";
				echo "<td>".$fila["fenacimiento"]."</td>";
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDcliente']; ?>" name="id">
					<input type="submit" value="Eliminar" name="eliminar">
				</form>
				</td>
				<?php
				echo "</tr>";
			}
		 ?>
	</table>
	<?php 
		if(isset($_POST["eliminar"])){
			$id = $_POST["id"];
			$obj->eliminar($id);
			header("Location: ?sec=cli&e=1");
		}

	 ?>
</section>