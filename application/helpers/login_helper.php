<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('login');
    } else {
        $role = $ci->session->userdata('role');
        $menu = $ci->uri->segment(1);
        if ($role != $menu) {
            redirect('blocked');
        }
    }
}
