<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $pageTitle??$this->config->item('app_name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is a micro finance management.">

    <meta name="msapplication-tap-highlight" content="no">
    <meta name="base-url" content="<?= base_url(); ?>">
    <link rel="shortcut icon" href="<?= $this->setting->get('org_logo',base_url('assets/images/logo.png'))??base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <link href="<?= base_url("assets/css/main.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/app.css"); ?>" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

