<?
if(is_file('manager/includes/config.inc.php'))
{
	require_once('manager/includes/config.inc.php');
}else
{
	die('Не удалось найти файл config.inc.php');
}

if(is_file('manager/includes/protect.inc.php'))
{
	require_once('manager/includes/protect.inc.php');
}else
{
	die('Не удалось найти файл protect.inc.php');
}
define('MODX_API_MODE', true);
require_once('manager/includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->db->connect();
$modx->getSettings();

// вывели Заголовок сайта
$table = $modx->getFullTableName("active_users");
$rows_affected = $modx->db->delete($table);
if ($rows_affected) {
	echo "Админка разблокирована";
}else{
	echo "Не удалось разблокировать админку";
}
echo "<br><a href='/'>На сайт</a>";
?>