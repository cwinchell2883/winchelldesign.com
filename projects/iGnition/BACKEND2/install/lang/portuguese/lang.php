<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/


$lang['translator'] = "<p>- Translated by Pedro Filipe Silva</p>"; // <-- Put this in here  "<p>- Translated by Andrew Fenn</p>"   replace Andrew Fenn with your name

$lang['title'] = 'Pro Clan Manager - Instalador 0.4.1';

$lang['complete'] = '<p>O seu website estÃ¡ pronto a ser usado. Por favor:</p><p>- Apague a pasta &quot;install&quot; do seu servidor.</p><p>- Mude as permissÃµes do ficheiro &quot;configure.php&quot; para apenas leitura. (555)</p>';
$lang['pcmhome'] = 'Aceder ao website do clan';


$lang['part4_empty'] = 'O campo do username e password sÃ£o obrigatÃ³rios. Por favor preencha-os.';
$lang['part4_not_match'] = 'As passwords nÃ£o coincidem.';
$lang['part4_alpha_num'] = 'O username e password apenas podem conter letras e nÃºmeros';
$lang['part4_reminder'] = 'Por favor memorize o seu username e password porque irÃ¡ precisar deles para fazer login no website.';
$lang['part4'] = 'Para finalizar a instalaÃ§Ã£o do Pro Clan Manager vocÃª deve criar a conta do administrador. O username serÃ¡ o mesmo que vocÃª irÃ¡ utilizar para fazer login no website.';
$lang['part4_username'] = 'Username';
$lang['part4_password'] = 'Password';
$lang['part4_password2'] = 'Password novamente';
$lang['part4_email'] = 'Email';


$lang['part3dbfail'] = 'Houve um erro ao tentar seleccionar a base de dados. Por favor insira novamente as informaÃ§Ãµes da base de dados';
$lang['part4_connect_fail'] = 'Houve um erro na conecÃ§Ã£o Ã  base de dados. Por favor insira novamente as informaÃ§Ãµes da base de dados';
$lang['part4_error'] = 'O erro Ã© o seguinte: ';
$lang['part4_continue'] = 'Continuar para o passo 4';

$lang['part3_written'] = 'As configuraÃ§Ãµes MySQL foram gravadas no ficheiro configure.php. Agora vamos testar a conecÃ§Ã£o e criar as tabelas onde o Pro Clan Manager irÃ¡ funcionar.';
$lang['part3_not_written'] = 'Houve um problema ao tentar escrever no ficheiro configure.php. FaÃ§a uma copia do texto abaixo e cole no ficheiro &quot;configure.php&quot;. O ficheiro estÃ¡ situado na pasta &quot;includes&quot;.';
$lang['part3_continue'] = 'Continuar para o passo 3';

$lang['part2'] = 'As configuraÃ§Ãµes MySQL devem estar disponÃ­veis a partir do seu serviÃ§o de alojamento. Se vocÃª nÃ£o tem as configuraÃ§Ãµes contacte o administrador do seu alojamento.';
$lang['part2_address'] = 'Servidor MySQL';
$lang['part2_database'] = 'Base de Dados MySQL';
$lang['part2_username'] = 'Utilizador MySQL';
$lang['part2_password'] = 'Password MySQL';
$lang['part2_prefix'] = 'Prefixo das Tabelas';
$lang['part2_goback'] = 'Por favor tente novamente.';

$lang['part2_refresh'] = 'Actualizar a pÃ¡gina';
$lang['part2_contiue'] = 'Continuar para o passo 2';

$lang['part1'] = 'O instalador tem de verificar se Ã© possÃ­vel escrever nos ficheiros do seu servidor. Se nÃ£o conseguir vocÃª terÃ¡ de mudar as permissÃµes em alguns ficheiros e pastas para a instalaÃ§Ã£o puder continuar.';
$lang['part1_image_writable'] = 'A pasta &quot;images&quot; tem permissÃµes de escrita.';
$lang['part1_image_not_writable'] = 'Por favor, modifique as permissÃµes da pasta &quot;images&quot; e das subpastas dentro dela para 666. Se falhar tente 777.';

$lang['part1_files_writable'] = 'A pasta &quot;files&quot; tem permissÃµes de escrita.';
$lang['part1_files_not_writable'] = 'A pasta "files" nÃ£o tem permissÃµes de escrita. Por favor, modifique as permissÃµes para 666. Se falhar tente 777.';

$lang['part1_config_writable'] = 'O pasta &quot;configure.php&quot; tem permissÃµes de escrita.';
$lang['part1_config_not_writable'] = 'O ficheiro &quot;configure.php&quot; nÃ£o tem permissÃµes de escrita. O ficheiro &quot;configure.php&quot; estÃ¡ na pasta &quot;includes&quot;. Por favor, modifique as permissÃµes para 666. Se falhar tente 777.';
$lang['part1_config_not_there'] = 'O ficheiro &quot;configure.php&quot; nÃ£o foi encontrado. Deveria estar na pasta &quot;includes&quot;. ';

$lang['part1_compiled_writable'] = 'A pasta &quot;compiled&quot; tem permissÃµes de escrita.';
$lang['part1_compiled_not_writable'] = 'A pasta &quot;compiled&quot; nÃ£o tem permissÃµes de escrita. A pasta &quot;compiled&quot; estÃ¡ na pasta &quot;includes/libs&quot;. Por favor, modifique as permissÃµes para 666. Se falhar tente 777.';

$lang['part0_title'] = 'Bem Vindo';
$lang['part0'] = '<p>Obrigado por ter feito o download do Pro Clan Manager. Esta pÃ¡gina irÃ¡ levÃ¡-lo atÃ© ao processo de instalaÃ§Ã£o do website. Se durante alguma altura vocÃª tiver dÃºvidas passe com o cursor do rato por cima da imagem do ponto de interrogaÃ§Ã£o e irÃ¡ ter uma melhor explicaÃ§Ã£o sobre as opÃ§Ãµes na pÃ¡gina e o que significam.</p><p>Por favor, lembre-se de ler estas instruÃ§Ãµes atentamente para evitar erros.</p><p>Se houver algum problema vocÃª pode visitar o nosso website em <a href="http://www.proclanmanager.com">www.proclanmanager.com</a></p><p>Boa sorte e espero que goste do seu novo website.</p><br /><p>- Andrew Fenn</p>';


$lang['filelocked'] = 'O directÃ³rio "install" foi trancado. Para destrancar o instalador apague o ficheiro folder.lock, que estÃ¡ localizado no directÃ³rio install.';

$lang['install'] = 'Instalar';
$lang['upgrade_done'] = '<p>O A actualiza��o foi efectuada com sucesso. Por favor, apague a pasta &quot;install&quot;.</p>';
$lang['upgrade'] = 'Actualizar de';
$lang['continue'] = 'Continuar';

/* Below is the data that will go into the site */

$lang['install_email_1_subject'] = 'Bem Vindo ao nosso website!';
$lang['install_email_1_text'] = 'Para fazer login utilize as informaÃ§Ãµes mostradas abaixo!\r\n\r\nUsername: [username]\r\nPassword: [password]'; // [username] and [password] <-- Leave these words alone.
$lang['install_email_2_subject'] = 'A sua nova password';
$lang['install_email_2_text'] = 'A sua nova password estÃ¡ mostrada abaixo.\r\n\r\nPassword: [password]'; // [password] <-- leave this word alone


$lang['install_menu_1'] = 'DefiniÃ§Ãµes Utilizador';
$lang['install_menu_2'] = 'Password Utilizador';
$lang['install_menu_3'] = 'Painel de Controlo';
$lang['install_menu_4'] = 'Logout';
$lang['install_menu_5'] = 'NotÃ­cias';
$lang['install_menu_6'] = 'Arquivo';
$lang['install_menu_7'] = 'Membros do Clan';
$lang['install_menu_8'] = 'VotaÃ§Ãµes';
$lang['install_menu_9'] = 'Downloads';
$lang['install_menu_10'] = 'Screenshots';
$lang['install_menu_11'] = 'Eventos';

$lang['install_module1'] = 'Site Admin';
$lang['install_module2'] = 'Ã�rea de Membros';
$lang['install_module3'] = 'NotÃ­cias';
$lang['install_module4'] = 'VotaÃ§Ãµes';
$lang['install_module5'] = 'GraduaÃ§Ãµes dos Membros';
$lang['install_module6'] = 'Downloads';
$lang['install_module7'] = 'Screenshots';
$lang['install_module8'] = 'GerÃªnciamento dos Membros';
$lang['install_module9'] = 'Eventos';
$lang['install_module10'] = 'Site Chat';

$lang['install_rank1'] = 'Administrador';
$lang['install_rank2'] = 'Membro';

/* Below is the language for describing what all the textboxes mean */

$lang['desc_mysql_address'] = '<p>O endereÃ§o MySQL Ã© a localizaÃ§Ã£o da base de dados.</p><p>Se vocÃª nÃ£o sabe qual Ã© o seu endereÃ§o MySQL experimente localhost. Se nÃ£o funcionar contacte o administrador do seu alojamento.</p>';
$lang['desc_mysql_database']= '<p>Aqui vocÃª deverÃ¡ inserir o nome da base de dados em que o website irÃ¡ guardar as tabelas.</p><p> Se vocÃª nÃ£o souber o nome da base de dados tente com o seu username do servidor. Se nÃ£o conseguir contacte o administrador do seu alojamento e peÃ§a-lhe as informaÃ§Ãµes necessÃ¡rias para funcionar com MySQL.</p>';
$lang['desc_mysql_username']= '<p>Aqui vocÃª deverÃ¡ inserir o username usado para aceder Ã  base de dados MySQL.</p><p> Se vocÃª nÃ£o souber o username tente com o seu username do servidor. Se nÃ£o conseguir contacte o administrador do seu alojamento e peÃ§a-lhe as informaÃ§Ãµes necessÃ¡rias para funcionar com MySQL.</p>';
$lang['desc_mysql_password']= '<p>Aqui vocÃª deverÃ¡ inserir a password usada para aceder Ã  base de dados MySQL.</p><p> Se vocÃª nÃ£o souber a password tente com a sua password do servidor. Se nÃ£o conseguir contacte o administrador do seu alojamento e peÃ§a-lhe as informaÃ§Ãµes necessÃ¡rias para funcionar com MySQL.</p>';
$lang['desc_mysql_prefix']  = '<p>O prefixo das tabelas Ã© a primeira parte a aparecer no nome de uma tabela. Por exemplo: &ldquo;pcm_news&rdquo;.</p><p>Se vocÃª estiver a usar apenas uma cÃ³pia do Pro Clan Manager entÃ£o esta parte nÃ£o tem qualquer utilidade.</p><p>Se vocÃª estiver a usar vÃ¡rias cÃ³pias do Pro Clan Manager para vÃ¡rios clans diferentes entÃ£o vocÃª deve utilizar um prefixo que faÃ§a sentido para puder distinguir as tabelas dos diferentes clans.</p><p>AtenÃ§Ã£o: nunca instale mais de uma cÃ³pia do Pro Clan Manager com o mesmo prefixo. Isto irÃ¡ apagar todas as tabelas da primeira cÃ³pia..</p>';

$lang['desc_user_name'] = '<p>Este Ã© o username que irÃ¡ ser mostrado no seu website. Este serÃ¡ o username do administrador.</p>';
$lang['desc_user_pass'] = '<p>Esta Ã© a password que servirÃ¡ para fazer login como administrador no Pro Clan Manager.</p>';
$lang['desc_user_email'] = '<p>Este Ã© o email que serÃ¡ usado no seu website. SerÃ¡ o email do administrador.</p>'

?>
