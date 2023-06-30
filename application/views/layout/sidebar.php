<div class="main-sidebar sidebar-style-2" style="border-right: 2px solid black !important;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Nama Aplikasi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">NA</a>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider neu-brutalism-divider">

        <ul class="sidebar-menu">
            <?php
            // use role_id based on database
            $email = $this->session->userdata('email');
            $role_id_data = $this->db->query("SELECT `user_data`.`role_id` FROM `user_data` WHERE `user_data`.`email` = '$email'")->row_array();
            $role_id = $role_id_data['role_id'];

            // use role_id based on session
            // $role_id = $this->session->userdata('role_id');


            $queryMenu = "SELECT `user_menu`.`id`, `menu`
            FROM `user_menu`
            JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $role_id
            ORDER BY `user_access_menu`.`menu_id` ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php
            foreach ($menu as $m) :
            ?>
                <li class="menu-header">
                    <?= $m['menu']; ?>
                </li>

                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT * FROM
                `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                WHERE `user_sub_menu`.`menu_id` = $menuId";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php
                foreach ($subMenu as $sm) :
                ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span>
                        </a>
                        </li>
                    <?php endforeach; ?>
                    <hr class="sidebar-divider neu-brutalism-divider">
                <?php endforeach; ?>
        </ul>
    </aside>
</div>