<?php
   include 'db.php';
   $sql="select * from demo_table order by id asc";
   $result= $conn->query($sql);
   //encabezado
   echo "<tr>";
   echo "<td>Nombre</td>";
   echo "<td>Punteo</td>";
   echo "<td>Acciones</td>";
   echo "</tr>";
   //filas
   while($row = $result->fetch_assoc()){
       echo "<tr>";
       if ($row['id'] == $_GET['id']) 
       {
           echo '<form class="form-inline m-2" action="update.php" method="POST">';
           echo '<td><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td>';
           echo '<td><input type="number" class="form-control" name="score" value="'.$row['score'].'"></td>';
           echo '<td><button type="submit" class="btn btn-primary">Guardar cambios</button></td>';
           echo '<input type="hidden" name="id" value="'.$row['id'].'">';
           echo '</from>';
       }
       else
       {
           echo "<td>" . $row['name'] . "</td>";
           echo "<td>" . $row['score'] . "</td>";
           echo '<td> <a class="btn btn-primary" href="index.php?id=' . $row['id'] . '"role=button">Actualizar</a></td>';
           echo '<td> <a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '"role=button">Eliminar</a></td>';
       }
       echo "</tr>";
   }
   $conn->close();
?>
