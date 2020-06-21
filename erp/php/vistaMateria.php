<?php 
	require_once("materiaprima.php");
	$obj = new Materiaprima();
 ?>
  <section id="principal">
	<div>
		<a href="?sec=gmat"><input type="button" value="Generar Gráfica"></a>
	</div>

	<form action="" method="post">
		Nombre: <input type="text" name="Nombre"> <br>
		Tipo: <input type="text" name="Tipo"> <br>
		Descripcion: <input type="text" name="Descripcion"> <br>
		Precio: <input type="text" name="Precio"> <br>
		Stock: <input type="text" name="Stock"> <br>
		Existencias: <input type="text" name="Existencias"> <br>

		<input type="submit" value="Agregar materiaprima" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>materiaprima eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>materiaprima agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$Nombre = $_POST["Nombre"];
			$Tipo = $_POST["Tipo"];
			$Descripcion = $_POST["Descripcion"];
			$Precio = $_POST["Precio"];
			$Stock = $_POST["Stock"];
			$Existencias = $_POST["Existencias"];
			
			
			$obj->alta($Nombre,$Tipo,$Descripcion,$Precio,$Stock,$Existencias);
			header("Location: ?sec=mat&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Existencias</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["Nombre"]."</td>";
				echo "<td>".$fila["Tipo"]."</td>";
				echo "<td>".$fila["Descripcion"]."</td>";
				echo "<td>".$fila["Precio"]."</td>";
				echo "<td>".$fila["Stock"]."</td>";
				echo "<td>".$fila["Existencias"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['ID']; ?>" name="id">
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
			header("Location: ?sec=mat&e=1");
		}

	 ?>
</section>