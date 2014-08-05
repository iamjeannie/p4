@extends('_master')

@section('content')

<h1>Tell No More</h1>
<h2>User Info</h2>
<?php $messages =  $errors->all('<p style="color:red">:message</p>') ?>
<?php
foreach ($messages as $msg)
{
    echo $msg;
}
?>
<?= Form::open() ?>
<?= Form::label('email', 'Email') ?>
<?= Form::text('email', Input::old('email')) ?>
<br>
<?= Form::label('username', 'Username') ?>
<?= Form::text('username', Input::old('username')) ?>
<br>
<?= Form::label('password', 'Password') ?>
<?= Form::password('password') ?>
<?= Form::text('no_email', '', array('style' =>'display:none')) ?>
<br>
<?= Form::label('password_confirm', 'Confirm Password')?>
<?= Form::password('password_confirm') ?>
<br>
<?= Form::label('party', 'Party/Event') ?>
<?= Form::select('party', array('birthday' => 'birthday', 'babyshower' =>'babyShower', 'wedding' => 'wedding'), Input::old('party')) ?>
<br>
<?= Form::submit('Send it!') ?>
<?= Form::close() ?>

@stop
