@extends('layout.template')
<?php

//TODO: Solve this
$user = Auth::user();
?>

@section('content')
    @include('edit.user')
@endsection