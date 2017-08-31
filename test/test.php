<?php
/**
 * Created by PhpStorm.
 * User: 王二小
 * Date: 2017/8/30
 * Time: 下午5:46
 */
namespace test;


use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;

require '../vendor/autoload.php';

set_time_limit(0);

$reader = ReaderFactory::create(Type::XLSX);

$reader->open('file/test1.xlsx');

$num = 1;
foreach ($reader->getSheetIterator() as $sheet) {
    foreach ($sheet->getRowIterator() as $row) {
        write($row);
        echo "\r".$num;
        $num++;
    }
}
$reader->close();

function write($arr,$file='file/test1.sql'){
    if (!file_exists($file)){
        $content = 'insert into test (name1,name2,name3,name4,name5,name6,name7,name8,name9,name10,name11,name12,name13,
          name14,name15,name16,name17,name18,name19,name20,name21,name22,name23,name24,name25,name26,name27,name28,name29,name30,name31) VALUES ';
    }else{
        $content = ' ,';
    }
    $content .= '('.implode(',',$arr).')';
    $file = fopen($file,'a');
    fwrite($file,$content);
    fclose($file);
}



