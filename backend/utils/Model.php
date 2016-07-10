<?php
/**
 * Created by PhpStorm.
 * User: hackhappy
 * Date: 7/1/2016
 * Time: 1:32 PM
 */
namespace backend\utils;

require "../../configuration/PdoConfiguration.php";
use configuration\PdoConfiguration;

// Creating Model singleton class for  all models
class Model extends PdoConfiguration
{

    /*
     * Table  Columns
     */
    public $columns;

    /*
     * Table  name
     */
    public $tableName;

    /*
     * MySQL Script
     */
    public $sql;

    private function __construct()
    {
    }


    public function insertData($data){

        $cols = " ";
        $values = " ";

        foreach ($data as $key => $value) {
            if($cols==" " && $values==" "){
                $cols = $key;
                $values = $value;
            }else {
                $cols = $cols . "," . $key;
                $values = $values . "," . $value;
            }
        }

        $sql = "INSERT INTO fig($cols) VALUE ($values);";

        Model::getPdoInstance()->exec($sql);
    }


    public function getData($parameter = "*"){
        $columns = " ";

        if($parameter != "*"){
            foreach ($parameter as $param){
                if($columns==" "){
                    $columns = $param;
                }else {
                    $columns = $columns . "," . $param;
                }
            }

        }else{
            $columns = "*";
        }
        $sql = "SELECT ($columns) FROM $this->tableName";

        Model::getPdoInstance()->exec($sql);

    }

    public function deleteById($id){
        $sql = "DLETE FROM $this->tableName where id = $id";
    }
}