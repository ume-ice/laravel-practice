@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できます。</p>

  @component('components.message')
    @slot('msg_title')
    CAUTION!
    @endslot

    @slot('msg_content')
    これがメッセージの表示です。
    @endslot
  @endcomponent

  @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。'])

  <ul>
    @each('components.item', $data, 'item')
  </ul>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
