<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <title>Notes</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <?php use_helper('opNote') ?>
  <?php remove_assets() ?>
  <?php use_stylesheet('/opNotePlugin/css/bootstrap.css') ?>
  <?php //use_stylesheet('/opNotePlugin/css/bootstrap-responsive.css') ?>
  <?php use_stylesheet('/opNotePlugin/css/note.css')?>
  <?php include_stylesheets() ?>
  <?php if (opConfig::get('enable_jsonapi') && opToolkit::isSecurePage()): ?>
  <?php
    use_helper('Javascript');
    $jsonData = array(
      'apiKey' => $sf_user->getMemberApiKey(),
      'apiBase' => app_url_for('api', 'homepage'),
    );
    $json = defined('JSON_PRETTY_PRINT') ? json_encode($jsonData, JSON_PRETTY_PRINT) : json_encode($jsonData);
    echo javascript_tag('
    var openpne = '.$json.';
    ');
  ?>
  <?php endif ?>
  <?php use_javascript('/opNotePlugin/js/jquery.js') ?>
  <?php use_javascript('/opNotePlugin/js/jquery.tmpl.js') ?>
  <?php use_javascript('/opNotePlugin/js/bootstrap.js') ?>
  <?php use_javascript('/opNotePlugin/js/notebooksinit.js') ?>
  <?php use_javascript('/opNotePlugin/js/notebooks.js') ?>
  <?php use_javascript('/opNotePlugin/js/notebooksutil.js') ?>
  <?php use_javascript('/opNotePlugin/js/notebooksvalidator.js') ?>
  <?php include_javascripts() ?>
  <?php echo $op_config->get('pc_html_head') ?>
  <style type="text/css">
    body {
      padding-top: 80px;
      padding-bottom: 40px;
    }
  </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="brand"><?php echo link_to($op_config['sns_name'], '@homepage') ?></span>
      <ul class="nav pull-right">
        <li>
          <?php echo link_to('note', '/note') ?>
        </li>
        <li class="active">
          <?php echo link_to('notebooks', '/notebooks') ?>
        </li>
        <li>
          <?php echo link_to('shelves', '/shelves') ?>
        </li>
        <li>
          <?php echo link_to('ログアウト', '@member_logout') ?>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
