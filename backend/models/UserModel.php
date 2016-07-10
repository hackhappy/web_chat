<?php
/**
 * Created by PhpStorm.
 * User: hackhappy
 * Date: 7/1/2016
 * Time: 1:51 PM
 */

namespace backend\models;

require "../utils/Model.php";

use backend\utils\Model;

class UserModel extends Model
{
    public function initialize()
    {
        $this->tableName = "user";
    }

    public function __construct()
    {
        $this->initialize();
    }

    public function userRegistration($data)
    {
        $this->insertData($data);
    }
}