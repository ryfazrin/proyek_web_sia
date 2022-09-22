@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<h1>Hasil Menghitung Volume Balok</h1>
<table class="table table-striped table-bordered">
  <tr>
    <td>Panjang </td>
    <td>{{$balok->panjang}}</td>
  </tr>
  <tr>
    <td>Lebar </td>
    <td>{{$balok->lebar}}</td>
  </tr>
  <tr>
    <td>Tebal </td>
    <td>{{$balok->tebal}}</td>
  </tr>
  <tr>
    <td>Volume </td>
    <td>{{$balok->volume()}}</td>
  </tr>
</table>
@stop