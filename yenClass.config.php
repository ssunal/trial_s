<?PHP
 /*this program alloows you to conect your database and use all functions.   */
require_once("yenClass.php");
$yen_class = new Member();
$yen_class->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'*******',
                      /*database name*/'****');


?>
