@extends('layout.template')
<?php

$user = [
  'name' => 'Itaú',
  'user_avatar' => 'itau.jpg',
  'credentials'=> 'Banco de investimentos',
];

$posts = [
  [
    'user' => [
      'name' => 'Itaú',
      'user_avatar' => 'itau.jpg',
      'credentials'=> 'Banco de investimentos',
    ],
    'conteudo'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
        turpis sem, dictum id bibendum eget, malesuada ut massa. Ut scel
        erisque nulla sed luctus dapibus. Nulla sit amet mi vitae purus sol
        licitudin venenatis. Praesent et sem urna. Integer vitae lectus nis
        l',
    'titulo' => 'Fundos de investimento imobiliario crescecm 120% em 2018',
    'img_url' => 'itau_banner.jpg',
    'rooms' => 'Itaú',
    'likes_total'=> 10,
    'shares_total' => 9,
    'comments_total'=> 12,
  ],
  [
    'user' => [
      'name' => 'Itaú',
      'credentials'=> 'Banco de investimentos',
      'user_avatar' => 'itau.jpg',
    ],
    'conteudo'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
        turpis sem, dictum id bibendum eget, malesuada ut massa. Ut scel
        erisque nulla sed luctus dapibus. Nulla sit amet mi vitae purus sol
        licitudin venenatis. Praesent et sem urna. Integer vitae lectus nis
        l',
    'titulo' => 'Fundos de investimento imobiliario crescecm 120% em 2018',
    'img_url' => 'itau_banner.jpg',
    'rooms' => 'Itaú',
    'likes_total'=> 10,
    'shares_total' => 9,
    'comments_total'=> 12,
  ],
  [
    'user' => [
      'name' => 'Itaú',
      'user_avatar' => 'itau.jpg',
      'credentials'=> 'Banco de investimentos',
    ],
    'conteudo'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
        turpis sem, dictum id bibendum eget, malesuada ut massa. Ut scel
        erisque nulla sed luctus dapibus. Nulla sit amet mi vitae purus sol
        licitudin venenatis. Praesent et sem urna. Integer vitae lectus nis
        l',
    'titulo' => 'Fundos de investimento imobiliario crescecm 120% em 2018',
    'img_url' => 'itau_banner.jpg',
    'rooms' => 'Itaú',
    'likes_total'=> 10,
    'shares_total' => 9,
    'comments_total'=> 12,
  ]
]

?>

@section('content')
  @include('feed.newPost')
  @foreach($posts as $post)
    @include('feed.post', ['post' => $post])
  @endforeach
@endsection
