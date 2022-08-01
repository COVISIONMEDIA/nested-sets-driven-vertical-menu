<?php

require_once ('../config.inc.php');

class submenuItems extends config
{

    public function __construct()
    {

        $mysqli = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);

        $mysqli->set_charset("utf8");

        $this->db = $mysqli;

    }

    public function getBreadcrump($id)
    {


        $sql = "SELECT C.*
  FROM    ".self::PREFIX."sections AS B, co_sections AS C
  WHERE   (B.Lft BETWEEN C.Lft AND C.Rgt)
  AND     (B.id = '$id')
  ORDER BY C.Lft;";

        $result = $this->db->query($sql);

        if ($this->db->error != "")
            die($this->db->error . "_selectTemplateSql");

        $breadcrump_out = array();


        while ($bcrump = $result->fetch_assoc()) {

            $breadcrump_out[$bcrump['id']] = "open_menu";

        }


        return $breadcrump_out;

    }

}


$breadcrump = new submenuItems();

$openMenus = $breadcrump->getBreadcrump($_POST['id']);


die(json_encode(array('items'=>$openMenus)));