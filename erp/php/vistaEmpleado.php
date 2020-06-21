<?php 
	require_once("empleado.php");
	$obj = new Empleado();
 ?>

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		appaterno: <input type="text" name="appaterno"> <br>
		apmaterno: <input type="text" name="apmaterno"> <br>
		correo: <input type="text" name="correo"> <br>
		rfc: <input type="text" name="rfc"> <br>
		telefono: <input type="text" name="telefono"> <br>
		sexo: <input type="tinyint" name="sexo"> <br>
		fechadeingreso: <input type="date" name="fechadeingreso"> <br>
		cargo: <input type="text" name="cargo"> <br>
        salario: <input type="text" name="salario"> <br>
        estadocivil: <input type="text " name="estadocivil"> <br>
       nss: <input type="text" name="nss"> <br>


		
		<input type="submit" value="Agregar empleado" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>empleado eliminado</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>empleado agregado</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre = $_POST["nombre"];
			$appaterno = $_POST["appaterno"];
			$apmaterno = $_POST["apmaterno"];
			$correo = $_POST["correo"];
			$rfc = $_POST["rfc"];
			$telefono = $_POST["telefono"];
			$sexo = $_POST["sexo"];
			$fechadeingreso = $_POST["fechadeingreso"];
			$cargo = $_POST["cargo"];
			$salario = $_POST["salario"];
			$estadocivil = $_POST["estadocivil"];
			$nss = $_POST["nss"];

			$obj->alta($nombre,$appaterno,$apmaterno,$correo,$rfc,$telefono,$sexo,$fechadeingreso,$cargo,$salario,$estadocivil,$nss);
			header("Location: ?sec=emp&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Appaterno</th>
			<th>Apmaterno</th>
			<th>Correo</th>
			<th>Rfc</th>
			<th>Telefono</th>
			<th>Sexo</th>
			<th>Fechedeingreso</th>
			<th>Cargo</th>
			<th>Salario</th>
			<th>Estadocivil</th>
			<th>Nss</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["appaterno"]."</td>";
				echo "<td>".$fila["apmaterno"]."</td>";
				echo "<td>".$fila["correo"]."</td>";
				echo "<td>".$fila["rfc"]."</td>";
				echo "<td>".$fila["telefono"]."</td>";
				echo "<td>".$fila["sexo"]."</td>";
				echo "<td>".$fila["fechadeingreso"]."</td>";
				echo "<td>".$fila["cargo"]."</td>";
				echo "<td>".$fila["salario"]."</td>";
				echo "<td>".$fila["estadocivil"]."</td>";
				echo "<td>".$fila["nss"]."</td>";
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDempleado']; ?>" name="id">
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
			header("Location: ?sec=emp&e=1");
		}

	 ?>
</section>