@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>

  <p>これは<middleware>google.com</middleware>へのリンクです。</p>
  <p>これは<middleware>yahoo.co.jp</middleware>へのリンクです。</p>


  @if (count($errors) > 0)
    <p>入力に誤りがあります。再入力してください。</p>
    <!-- <div>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div> -->
  @endif

  <form action="/hello" method="post">
    <table>
      @csrf

      @if (0)
        @error('name')
          <tr>
            <th>ERROR</th>
            <td>{{$errors->first('name')}}</td>
          </tr>
        @enderror
        <tr>
          <th>name: </th>
          <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>

        @error('mail')
          <tr>
            <th>ERROR</th>
            <td>{{$errors->first('mail')}}</td>
          </tr>
        @enderror
        <tr>
          <th>mail: </th>
          <td><input type="text" name="mail" value="{{old('mail')}}"></td>
        </tr>

        @error('age')
          <tr>
            <th>ERROR</th>
            <td>{{$errors->first('age')}}</td>
          </tr>
        @enderror
        <tr>
          <th>age: </th>
          <td><input type="text" name="age" value="{{old('age')}}"></td>
        </tr>
      @endif

      <tr>
        <th>Messeage: </th>
        <td><input type="text" name="msg" value="{{old('msg')}}"></td>
      </tr>
      <tr>
        <th>send: </th>
        <td><input type="submit" name="send"></td>
      </tr>
    </table>

  </form>

  <table>
    <tr>
      <th>name</th>
      <th>mail</th>
      <th>age</th>
    </tr>
    @foreach ($items as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
      </tr>
    @endforeach
  </table>


  <!-- <p>必要なだけ記述できます。</p> -->


  <!-- @component('components.message')
    @slot('msg_title')
    CAUTION!
    @endslot

    @slot('msg_content')
    これがメッセージの表示です。
    @endslot
  @endcomponent

  @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。'])

 -->
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
