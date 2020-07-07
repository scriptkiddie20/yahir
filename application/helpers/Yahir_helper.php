<?php

function view($view, $data)
{

    $ci = &get_instance();

    $data['sideTitle'] = "Yahir POS";
    $data['menu']    = $ci->yahir->menu();
    $data['subMenu'] = $ci->yahir->subMenu();
    $data['karyawan'] = $ci->yahir->karyawan();

    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/sidebar', $data);
    $ci->load->view('templates/topbar', $data);
    $ci->load->view($view, $data);
    $ci->load->view('templates/footer', $data);
}


function auth_view($view, $data)
{
    $ci = &get_instance();

    $ci->load->view('templates/auth_header', $data);
    $ci->load->view($view, $data);
    $ci->load->view('templates/auth_footer', $data);
}
