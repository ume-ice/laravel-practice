<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;

class HelloController extends Controller
{

    public function index(Request $request, Response $response) {
        // $data = [
        //     ['name' => '山田たろう', 'mail' => 'taro@yamada'],
        //     ['name' => '田中はなこ', 'mail' => 'tanaka@hanako'],
        //     ['name' => '鈴木さちこ', 'mail' => 'suzuki@sachico'],
        // ];

        // $validateor = Validator::make($request->all(), [
        //     'id' => 'required',
        //     'pass' => 'required',
        // ]);

        // if ($validateor->fails()) {
        //     $msg = 'クエリーに問題があります。';
        // } else {
        //     $msg = 'ID/PASSを受け付けました。フォームを入力してください。';
        // }

        return view('hello.index', ['msg' => 'フォームを入力してください。']);
        // return view('hello.index', ['msg' => $msg]);
        // return view('hello.index');
    }

    // public function post(Request $request) {
    public function post(HelloRequest $request) {
        // $validate_rule = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric|between:0,150',
        // ];
        // $this->validate($request, $validate_rule);

        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];
        // $messages = [
        //     'name.required' => '名前は必ず入力してください。',
        //     'mail.email' => 'メールアドレスが必要です。',
        //     'age.numeric' => '年齢は整数で記入してください',
        //     'age.min' => '年齢は0歳以上で記入してください',
        //     'age.max' => '年齢は200歳以下で記入してください',
        //     // 'age.between' => '年齢は0~150の間で入力してください',
        // ];
        // $validateor = Validator::make($request->all(), $rules, $messages);

        // $validateor->sometimes('age', 'min:0', function($input) {
        //     return is_numeric($input->age);
        // });

        // $validateor->sometimes('age', 'max:200', function($input) {
        //     return is_numeric($input->age);
        // });

        // if ($validateor->fails()) {
        //     return redirect('/hello')
        //         ->withErrors($validateor)
        //         ->withInput();
        // }

        return view('hello.index', ['msg' => '正しく入力されました！']);
    }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello/Other') . $style . $body . tag('h1', 'other') . tag('p', 'this is other page') . $end;
        return $html;
    }


    //         $html = <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16px;color:#999;}
// h1 {font-size:120px;text-align:right;color:#fafafa;margin:-50px 0px -120px 0px;}
// </style>
// </head>
// <body>
//     <h1>Hello</h1>
//     <h3>Request</h3>
//     <pre>{$request}</pre>
//     <h3>Response</h3>
//     <pre>{$response}</pre>
// </body>
// </html>
// EOF;

//         $response->setContent($html);
//         return $response;

        // global $head, $style, $body, $end;
        // $html = $head . tag('title', 'Hello/Index') . $style . $body . tag('h1', 'index') . tag('p', 'this is index page') . '<a href="/hello/other">go to other page</a>' . $end;
        // return $html;
}

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size:16px;color:#999;}
h1 {font-size:100px;text-align:right;color:#eee;margin:-40px 0px -50px 0px;}
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
    return "<$tag>" . $txt . "</$tag>";
}