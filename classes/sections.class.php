<?php

require_once ('config.inc.php');

class sections extends config {

    public function __construct() {

        $mysqli = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);

        $mysqli->set_charset("utf8");

        $this->db = $mysqli;

    }




    public function getTree() {

        $sql = "SELECT n.id,   n.menu_name,  COUNT(*)-1 AS level, n.lft, n.rgt, ROUND ((n.rgt - n.lft - 1) / 2) AS children 

                FROM ".self::PREFIX."sections AS n, co_sections AS p 

                WHERE (n.lft BETWEEN p.lft AND p.rgt) 

                GROUP BY n.lft ORDER BY n.lft;";


        $result = $this->db->query($sql);

        if($this->db->error != "")
            die($this->db->error);

        $tree = array();
        $i = 0;
        while ($row = $result->fetch_assoc()) {

            $tree[$i] = $row;
            $i++;

        }


        return $tree;
    }


    public function treeAsHtml($id)
    {

        $tree = $this->getTree();

        $html = "<ul id=\"cssmenu\">";

        $last_i = count($tree) - 1;


        for ($i = 0; $i < count($tree); $i++) {



            if ($tree[$i]['id'] == $_GET['id'])
                $active = "active";
            else
                $active = "";


        $html_li = "<li ";


        $html_li .= "class=\"" . $active . "";

        $html_li .= " menu_".$tree[$i]['id']." \">";

        $html_link = "<a href=\"?id=" . $tree[$i]['id'] . "\" ";
        $html_link .= " >" . $tree[$i]['menu_name'] ."</a>";

        if ($tree[$i]['level'] < $tree[$i + 1]['level']) {

            $html .= $html_li.$html_link."<ul>";



        } else if ($tree[$i]['level'] > $tree[$i + 1]['level']) {


            $diff = $tree[$i]['level'] - $tree[$i + 1]['level'];

            $html .= $html_li.$html_link;

            $html_li_end = str_repeat('</li></ul>', $diff);

            $html .= $html_li_end;


        } else {

            $html .= $html_li.$html_link . "</li>";

        }

            $active = "";

    }

        $html .= "</ul>";

        return $html;


    }


}

