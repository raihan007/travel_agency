<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{page_title}</title>
    <meta name="description" content="Developed By Talukder, Md. Raihan">
    <meta name="keywords" content="Bootstrap 3,Kendo UI,JQuery,Responsive">

    <!--HTML5-->
    <script type="text/javascript" src="<?= base_url('Public/Contents/JS/modernizr-2.6.2.js') ?>"></script>
    <!--/HTML5-->
    <!--JQuery 1.11.2-->
    <script type="text/javascript" src="<?= base_url('Public/Contents/JS/jquery/1.11.2/jquery.min.js') ?>"></script>
    <!--/JQuery 1.11.2-->
    <!--Bootstrap Paper Theme-->
    <script type="text/javascript" src="<?= base_url('Public/Contents/CSS/bootstrap/paper/bootstrap.min.js') ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('Public/Contents/CSS/bootstrap/paper/bootstap.paper.min.css')?>">
    <!--/Bootstrap Paper Theme-->
    <!--Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('Public/Contents/font-awesome/4.7.0/css/font-awesome.css')?>">
    <!--/Font Awesome-->
    <style>
        body{
          background-color: #e5e5e5;
        }
        html{
          position: relative;
          min-height: 100%;
        }
        /* Add a gray background color and some padding to the footer */
        footer {
          position: absolute;
          bottom: 0;
          width: 100%;
          background: #a5a5a5;
          padding: 25px;
        }
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="80">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/travel_agency/">Dream Traveler</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li><a id="Home" href="/travel_agency">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="http://localhost/travel_agency/TourPackages">Packages</a></li>
        <li><a href="http://localhost/travel_agency/About">About</a></li>
        <li><a href="http://localhost/travel_agency/Contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/travel_agency/Register">Join Us</a></li>
        <li><a href="http://localhost/travel_agency/Login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>