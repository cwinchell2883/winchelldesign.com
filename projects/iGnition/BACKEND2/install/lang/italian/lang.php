<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/



$lang['translator'] = "<p>- Translated by Antonio P.</p>"; // <-- Put this in here  "<p>- Translated by Antonio P.</p>"   replace Andrew Fenn with your name

$lang['title'] = 'Pro Clan Manager - Installer 0.4.1';

$lang['complete'] = '<p>Tu sitio esta listo para usarse. Por favor:</p><p>- Elimina la carpeta &quot;install&quot; de tu servidor.</p><p>- CHMOD your &quot;configure.php&quot; file to read only. (555)</p>';
$lang['pcmhome'] = 'ir al sitio web de mi clan';


$lang['part4_empty'] = 'Se requiere rellenar los campos de nombre de usuario y contraseña';
$lang['part4_not_match'] = 'Su contraseña no concuerda.';
$lang['part4_alpha_num'] = 'Solo puede usar caracteres alfanumericos en su contraseña';
$lang['part4_reminder'] = 'Por Favor Recuerde su nombre de usuario y contraseña, los requerirá cada que quiera entrar al sitio web.';
$lang['part4'] = 'Para terminar la instalación de Pro Clan Manager, debe crear un nombre de usuario y contraseña. El nombre de usuario sera el mismo que estaras usando para el nuevo sitio web.';
$lang['part4_username'] = 'Nombre de Usuario';
$lang['part4_password'] = 'Contraseña';
$lang['part4_password2'] = 'Contraseña de nuevo';
$lang['part4_email'] = 'Email';


$lang['part3dbfail'] = 'Se falló un intento para seleccionar la base de datos.';
$lang['part4_connect_fail'] = 'No se pudo establecer una conexion a la base de datos. Revise su direccion SQL y/o su nombre de usuario y contraseña.';
$lang['part4_error'] = 'El error devuelto fué: ';
$lang['part4_continue'] = 'Continúe al paso 4';
$lang['part3_written'] = 'Los datos de tu MySQL fueron escritos para configurar la base de datos. Ahora revisa que funcione e instala las tablas de MySQL que Pro Clan Manager necesita para funcionar.';
$lang['part3_not_written'] = 'Hubo un problema con el archivo configure.php. CCopia y pega de la caja de texto de abajo &quot;configure.php&quot; archivo. Este archivo esta localizado en la carpeta &quot;includes&quot';
$lang['part3_continue'] = 'Seguir al paso 3';

$lang['part2'] = 'Tus datos MySQL deben estar disponibles desde tu servidor web.. Si no los conoces, intenta revisarlos desde ahí..';
$lang['part2_address'] = 'Mi Direccion SQL';
$lang['part2_database'] = 'Mi Base de datos MySQL';
$lang['part2_username'] = 'Mi nombre de usuario de MySQL';
$lang['part2_password'] = 'Contraseña de MySQL';
$lang['part2_prefix'] = 'Prefijo';
$lang['part2_goback'] = 'Por favor regrese e intente de Nuevo.';

$lang['part2_refresh'] = 'Refrescar la página';
$lang['part2_contiue'] = 'Continuar al paso 2';

$lang['part1'] = 'El instalador debe revisar si tiene permitido instalar archivos en el servidor. Si no es posible, deberás cambiar ajustes o permisos en ciertas carpetas o archivos.para poder preceder con la instalación.';
$lang['part1_image_writable'] = 'The &quot;images&quot; Es una Carpeta escribible.';
$lang['part1_image_not_writable'] = 'Por favor CHMOD el &quot;images&quot; directorio y tambien los archivos de 666 si falla, intente en 777.';

$lang['part1_files_writable'] = 'The &quot;files&quot; Es una carpeta Escribible.';
$lang['part1_files_not_writable'] = 'La carpeta"files" no es una carpeta escribible. Por Favor CHMOD eldirectorio a 666 si falla, intente en 777.';

$lang['part1_config_writable'] = 'The &quot;configure.php&quot; Es un archivo modificable.';
$lang['part1_config_not_writable'] = 'The &quot;configure.php&quot; No es un archivo modificable. &quot;configure.php&quot; ya existe en &quot;includes&quot; s. Porfavor aplique CHMOD a 666, si falla intente en 777.';
$lang['part1_config_not_there'] = 'El archivo &quot;configure.php&quot; no pudo ser localizado. debe esta en &quot;includes&quot; si no, revise en otra parte. ';

$lang['part1_compiled_writable'] = 'La &quot;compiled&quot; (carpeta) es modificable.';
$lang['part1_compiled_not_writable'] = 'la &quot;compiled&quot; (carpeta) no es modificable. The &quot;compiled&quot; El archivo existe en el drectorio &quot;includes/libs&quot; Por Favor aplique CHMOD a 666, si falla a 777.';

$lang['part0_title'] = 'Bienvenido';
$lang['part0'] = '<p>Gracias por descargar Pro Clan manager, esta página te guiara durante el proceso de instalacion. Si quedas atascado, clickea donde las marcas de interrogación para ibtener informacion mas detallada.</p><p>Recuerda por favor leer detenidamente las instrucciones para no cometer algun error.</p><p>Si te atoras puedes visitar el sitio web <a href="http://www.proclanmanager.com">www.proclanmanager.com</a></p><p>Buena suerte, espero que difrutes tu nuevo sitio web..</p><br /><p>- Andrew Fenn</p>';


$lang['filelocked'] = 'La carpeta de instalación ha sido bloqueada, para desbloquearla borre la carpeta.';

$lang['install'] = 'Instalar';
$lang['upgrade_done'] = '<p>The upgrade was successful. Please now delete the &quot;install&quot; directory.</p>';
$lang['upgrade'] = 'Upgrade from';
$lang['continue'] = 'Continuar';

/* Below is the data that will go into the site */

$lang['install_email_1_subject'] = 'Bienvenido a Nuestro Sitio';
$lang['install_email_1_text'] = 'Para entrar, usa los datos mostrados aqui debajo!\r\n\r\nUsername: [username]\r\nPassword: [password]'; // [username] and [password] <-- Leave these words alone.
$lang['install_email_2_subject'] = 'Tu nueva contraseña';
$lang['install_email_2_text'] = 'Tu nueva contraseña esta aqui abajo.\r\n\r\nPassword: [password]'; // [password] <-- leave this word alone


$lang['install_menu_1'] = 'Ajustes';
$lang['install_menu_2'] = 'Contraseña';
$lang['install_menu_3'] = 'panel de Control';
$lang['install_menu_4'] = 'Cerrar Sesion';
$lang['install_menu_5'] = 'Noticias';
$lang['install_menu_6'] = 'Archivos';
$lang['install_menu_7'] = 'Plantilla';
$lang['install_menu_8'] = 'Encuenstas';
$lang['install_menu_9'] = 'Descargas';
$lang['install_menu_10'] = 'Capturas';
$lang['install_menu_11'] = 'Eventos';

$lang['install_module1'] = 'Administracion del Sitio';
$lang['install_module2'] = 'Area para Miembros';
$lang['install_module3'] = 'Noticias';
$lang['install_module4'] = 'Encuestas';
$lang['install_module5'] = 'Ranking';
$lang['install_module6'] = 'Descargas';
$lang['install_module7'] = 'Capturas';
$lang['install_module8'] = 'Mantenimiento de Cuenta';
$lang['install_module9'] = 'Eventos';
$lang['install_module10'] = 'Chat';

$lang['install_rank1'] = 'Admin';
$lang['install_rank2'] = 'Miembro';

$lang['desc_mysql_address'] = '<p>Tu Dirección MySQL es la direccion de la base de datos.</p><p>Si no sabes cual es tu direccion MySQL, intenta localhost. Si no funciona contacta a tu proveedor.</p>';
$lang['desc_mysql_database']= '<p>EL nombre de la base de datos es donde almacenaras la informacion.</p><p>Si no conoces el nombre de la base de datos, intenta usar tu nombre de usuario.</p><p>Si no resulta, contacta a tu proveedor para pedir la informacion necesaria</p>'; 
$lang['desc_mysql_username']= '<p>Tu nombre de usuario de MySQL es necesario para obtener acceso a la base de datos.</p><p> Si no conoces un nombre de usuario de MySQL &lsquo;t pregunta a tu proovedor.</p>';
$lang['desc_mysql_password']= '<p>La contraseña es para accesar a la base de datos.</p><p>If Si no tienes una contraseña MySQL, intenta con tu contraseña de webhost. Si no trabaja Contacta a tu proveedor.</p>';
$lang['desc_mysql_prefix']  = '<p>Si estas instalando una sola vez Pro Clan manager, puedes hacerlo sin muchoo rollo! &ldquo;pcm_news&rdquo;.</p><p>SI instalaras para multiples usuarios, deberas nombrear una diferente a las demás, para no tener problemas.</p>';
$lang['desc_user_name'] = '<p>Es el nombre de usuario mostrado en tu sitio.</p><p>Es tambien el que deberás usar en el sitio..</p>';
$lang['desc_user_pass'] = '<p>Esta es la contraseña que debes usar.</p>';
$lang['desc_user_email'] = '<p>Este correo electronico ha sido registrado bajo tu nombre de usuario.</p><p>Puedes dejar esta caja vacía.</p>';  
?>
