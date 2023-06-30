<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = 'SELECT `user_sub_menu`.*, `user_menu`.`menu`
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ';
        return $this->db->query($query)->result_array();
    }

    public function getSubMenuById($sub_menu_id)
    {
        $query = 'SELECT menu FROM `user_menu` WHERE id = (
                SELECT menu_id FROM `user_sub_menu` WHERE id = ' . $sub_menu_id . '
            )';
        return $this->db->query($query)->result_array();
    }

    public function getMenuId($menu_id)
    {
        $query = 'SELECT menu FROM `user_menu` WHERE id = ' . $menu_id . '';
        return $this->db->query($query)->result_array();
    }

    public function getSubMenuId($sub_menu_id)
    {
        $query = 'SELECT menu_id FROM `user_sub_menu` WHERE id = ' . $sub_menu_id . '';
        return $this->db->query($query)->result_array();
    }
}
