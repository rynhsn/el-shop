<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= $site['description']; ?>">
    <meta name="keywords" content="<?= $site['keywords']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $site['site_name'] . ' | ' . ucfirst($this->uri->segment(1)); ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/' . $site['icon']); ?>">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>