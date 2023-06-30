<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAllUserRole()
    {
        $query = "SELECT `user_data`.`id`, `user_data`.`nama`, `email`, `user_role`.`role`
        FROM `user_data` JOIN `user_role` ON `user_data`.`role_id` = `user_role`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function getUserRole($user_id)
    {
        $query = "SELECT `user_data`.`id`, `user_data`.`nama`, `email`, `user_role`.`id` AS `role_id`, `user_role`.`role`
        FROM `user_data` JOIN `user_role` ON `user_data`.`role_id` = `user_role`.`id` WHERE `user_data`.`id` = $user_id";

        return $this->db->query($query)->row();
    }

    public function getRoleName($role_id)
    {
        $query = "SELECT `user_role`.`role` FROM `user_role` WHERE `user_role`.`id` = $role_id";

        return $this->db->query($query)->row();
    }
}
