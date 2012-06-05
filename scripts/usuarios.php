 <?php

// Conexion a la base de Datos

$base = "asterisk";
$host = "localhost";
$user = "asterisk";
$password = "asterisk";
$conexion = mysql_connect($host,$user,$password);
$result = mysql_select_db($base,$conexion) or die ("Error en la Conexion a BD");

session_start();

// Si no estamos logeados

if (!$_SESSION['login'])
{
 if(isset($_POST['loginsubmit']))
 {
 $usuario = $_POST['usuario'];
 $password = $_POST['password'];

 if((!$usuario) || (!$password))
 {
 echo "Error 1<br>";
 exit();
 }
 $password = $usuario.":asterisk:".$password;
 $password = md5($password);
 $query = mysql_query("SELECT * FROM pares_sip WHERE name='$usuario' AND md5secret = '$password' AND useradmin = '1'");
 if (mysql_num_rows($query) > 0)
 {
 session_register('login');
 $_SESSION['login'] = '1';
 }
 else
 echo "Error 2<br><br>";

 echo "<a href='usuarios.php'>Home</a>";
 }
 else
 {
 echo "<form method='post' action='?'>";
 echo "Usuario: <input name='usuario' type='text'><br>";
 echo "Contrase&ntilde;a: <input name='password' type='password'><br>";
 echo "<input type='submit' name='loginsubmit'>";
 echo "</form>";
 }

}
// Si ya estamos logeados

else
{
 // Salida del Sistema
 if(isset($_REQUEST['exit']))
 {
 session_destroy();

 if(!session_is_registered('login'))
 echo "<a href='usuarios.php'>Home</a>";

 }
 // Insercion de un nuevo Registro
 elseif(isset($_POST['insertsubmit']))
 {
 $sipuser = $_POST['sipuser'];
 $sippass = $_POST['sippass'];
 $contexto = $_POST['contexto'];
 $sippass = $sipuser.":asterisk:".$sippass;
 $sippass = md5($sippass);
 $buzon = $sipuser."@default";
 $query = mysql_query("INSERT INTO pares_sip (`name`, `host`, `nat`, `type`, `context`, 
 `md5secret`, `qualify`, `disallow`, `allow`, `port`, `regseconds`, `lastms`, `username`, `defaultuser`, `mailbox`) 
 VALUES ('$sipuser', 'dynamic', 'no', 'friend', '$contexto', '$sippass', 'yes', 'all', 'alaw;gsm;ulaw',
 '0','0', '0', '', '', '$buzon')");

 echo "<a href='usuarios.php'>Home</a><br>";
 echo "<a href='usuarios.php?exit'>Exit</a>";
 }
 // Borrado de un Registro
 elseif(isset($_POST['deletesubmit']))
 {
 $sipid = $_POST['sipid'];
 $query = mysql_query("DELETE FROM pares_sip WHERE id = '$sipid'");

 echo "<a href='usuarios.php'>Home</a><br>";
 echo "<a href='usuarios.php?exit'>Exit</a>";
 }
 // Formularios de Insercion y Borrado
 else
 {
 echo "Insertar Registro:<br>"; 
 echo "<p><form method='post' action='?'>";
 echo "Usuario: <input name='sipuser' type='text'><br>";
 echo "Contrase&ntilde;a: <input name='sippass' type='password'><br>";
 echo "Tipo: <select name='contexto'>";
 echo "<option value='extensiones'>Resto</option>";
 echo "<option value='manager'>Manager</option>";
 echo "<option value='gerencia'>Gerencia</option>";
 echo "</select><br>";
 echo "<input type='submit' name='insertsubmit' value='Insertar'>";
 echo "</form></p>";

 echo "<table border='1'>";
 echo "<tr><td colspan ='2' align='center'>SIP Peers Activos</td></tr>";
 echo "<tr><td>Usuario</td><td>Borrar</td></tr>"; 

 $query = mysql_query("SELECT * FROM pares_sip WHERE type = 'friend'");
 $rows = mysql_num_rows($query);
 for ($i=0;$i<$rows;$i++)
 {
 $sippeersarray = mysql_fetch_array($query);
 $sipuser = $sippeersarray['name'];
 $sipid = $sippeersarray['id'];

 echo "<tr>";
 echo "<td>".$sipuser."</td>";
 echo "<td>";
 echo "<form method='post' action='?'>";
 echo "<input type=hidden name='sipid' value='$sipid'>";
 echo "<input type=submit name='deletesubmit' value='Borrar'>";
 echo "</form>";
 echo "</td>"; 
 echo "</tr>";

 } 
 echo "</table>"; 
 echo "<a href='usuarios.php?exit'>Exit</a>";

 }
}

?>
