  <?php
  
  if ($_POST["crear"]!="")
{

	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$user=$_POST["user"];
	$password=$_POST["password"];
		$lapass=crypt($password,"semilla");
	$email=$_POST["email"];
	$admin=$_POST["admin"];

	$laSQL = "INSERT INTO administracion (id,  nombre, apellido, login, password, email, admin) 
	VALUES (NULL, '$nombre', '$apellido', '$user', '$lapass', '$email', '$admin')";
	$result = mysqli_query($link,$laSQL);
	echo "$laSQL
	<div class='valid_box'>
        USER AGREGADO CORRECTAMENTE
     </div>";return;

}

?>  <h1>Nuevo User</h1> 
    
           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
           <tr>
             <td width="9%"><h5>Nombre:</h5></td>
             <td width="91%"><input type="text" name="nombre"  style="width:500px" /></td>
           </tr>
           <tr>
             <td><h5>Apellido:</h5></td>
             <td><input type="text" name="apellido"  style="width:500px" id="apellido" /></td>
           </tr>
           <tr>
             <td><h5>E-mail:</h5></td>
             <td><input type="text" name="email"  style="width:500px" id="email" /></td>
           </tr>
           <tr>
             <td><h5>User:</h5></td>
             <td><input type="text" name="user"  style="width:500px" id="user" /></td>
           </tr>
           <tr>
             <td><h5>Password:</h5></td>
             <td><input type="text" name="password"  style="width:500px" id="password" /></td>
           </tr>
   <tr>
     <td><h5>Admin:</h5></td>
     <td><label for="admin"></label>
       <select name="admin" id="admin">
         <option value="si">si</option>
         <option value="no">no</option>
      </select></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input name="crear" type="hidden" id="crear" value="si" /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>

      
     <center></center>
</form>

