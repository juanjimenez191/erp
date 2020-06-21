<?php 
	require_once("pedido.php");
	$obj = new Pedido();
 ?>

	<form action="" method="post">
		fecha: <input type="date" name="fecha"> <br>
		IDcliente: <input type="text" name="IDcliente"> <br>
		precio: <input type="text" name="precio"> <br>
		cantidad: <input type="text" name="cantidad"> <br>
		direccion: <input type="text" name="direccion"> <br>
		IDproducto: <input type="text" name="IDproducto"> <br>

		<input type="submit" value="Agregar pedido" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>pedido eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>pedido agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fecha = $_POST["fecha"];
			$IDcliente = $_POST["IDcliente"];
			$precio = $_POST["precio"];
			$cantidad = $_POST["cantidad"];
			$direccion = $_POST["direccion"];
			$IDproducto = $_POST["IDproducto"];

			
			$obj->alta($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto);
			header("Location: ?sec=ped&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>fecha</th>
			<th>IDcliente</th>
			<th>precio</th>
			<th>cantidad</th>
			<th>direccion</th>
			<th>IDproducto</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["IDcliente"]."</td>";
				echo "<td>".$fila["precio"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
				echo "<td>".$fila["direccion"]."</td>";
				echo "<td>".$fila["IDproducto"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDpedido']; ?>" name="id">
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
			header("Location: ?sec=ped&e=1");
		}

	 ?>
</section>