<?php
namespace common\components\helpers;
use Yii;
class ArrayHelper1
{
   
public static function code($mixed_data)
{

print '<code style=" display: block; 
padding: 0.5em 1em; border: 1px solid #bebab0;">';
print_r($mixed_data);
print '</code>';
} 
}