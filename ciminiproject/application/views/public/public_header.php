<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Articles List</title>
<?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Articles</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
      </ul>
      <?= form_open('user/search', ['class'=>'navbar-form navbar-left', 'role'=> 'search']); ?>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
         <?= form_input( ['name'=>'search', 'class'=>'form-control', 'placeholder'=>'Search', 'value'=>set_value('search')])?>
        </div>
        <?= form_submit('submit', 'Submit', ['class'=>'btn btn-default']) ?>
      <?= form_close(); ?>
      <?= form_error('search',"<p class ='navbar-text text-danger'>", '</p>') ?>
      <ul class="nav navbar-nav navbar-right">
       	<li><a href="#">Register</a></li>
       	<li><?= anchor('login', 'Login') ?></li>
      </ul>
    </div>
  </div>
</nav>