<?php
require_once '../../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('../../secret/shopping-ae1ba-02d4e4c3deb4.json');
$database = $factory->createDatabase();

function SelectWithTwoNodes($tablename,$node1){
    $factory = (new Factory)->withServiceAccount('../../secret/shopping-ae1ba-02d4e4c3deb4.json');
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $node1)->getSnapshot()->getValue();
    return $result;
}


if(isset($_POST['Lvl'])){
echo $_GET['Lvl'];
        @$posts = SelectWithTwoNodes('subCategories',$_POST['Lvl']);
        if(count($posts) > 0) {
            $output = '<option value="">  اختر  القسم  </option>';

            foreach ($posts as $se) {
                $output .= '<option value=' . $se['name'] . '>' . $se['name_arabic'] . '</option>';
            }
        }else{
            $output = '<option value=""> لا توجد اقسام</option>';

        }
            echo $output;



}