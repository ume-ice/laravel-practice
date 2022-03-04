<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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

        // if ($request->hasCookie('msg')) {
        //     $msg = 'Coolie: ' . $request->cookie('msg');
        // } else {
        //     $msg = '※クッキーはありません。';
        // }

        // if (isset($request->id)) {
        //     $param = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }

        // $items = DB::select('select * from people');
        $items = DB::table('people')
            ->orderBy('age', 'asc')
            ->get();

        // return view('hello.index', ['msg' => 'フォームを入力してください。']);
        return view('hello.index', ['items' => $items]);
        // return view('hello.index');
    }

    // public function post(Request $request) {
    public function post(Request $request) {

        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);

        // $validate_rule = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric|between:0,150',
        // ];

        // $validate_rule = [
        //     'msg' => 'required',
        // ];
        // $this->validate($request, $validate_rule);

        // $msg = $request->msg;

        // $response = response()->view('hello.index', [
        //     'msg' => '「' . $msg . '」をクッキーに保存しました。'
        // ]);
        // $response->cookie('msg', $msg, 1);
        // return $response;

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

        // return view('hello.index', ['msg' => '正しく入力されました！']);
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function show(Request $request) {
        $id = $request->id;
        $name = $request->name;
        $min = $request->min;
        $max = $request->max;
        $page = $request->page;
        // $items = DB::table('people')->where('id', '<=', $id)->get();

        $items = DB::table('people')
            // ->where('name', 'like', '%' . $name . '%')
            // ->where('mail', 'like', '%' . $name . '%')
            // ->whereRaw('age >= ? and age <= ?', [$min, $max])
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }

    public function edit(Request $request) {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);

        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);

        DB::table('people')
            ->where('id', $request->id)
            ->update($param);

        return redirect('/hello');
    }

    public function del(Request $request) {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);

        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request) {
        // $param = [
        //     'id' => $request->id,
        // ];

        // DB::delete('delete from people where id = :id', $param);

        DB::table('people')
            ->where('id', $request->id)
            ->delete();

        return redirect('/hello');
    }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello/Other') . $style . $body . tag('h1', 'other') . tag('p', 'this is other page') . $end;
        return $html;
    }

    public function rest() {
        return view('hello.rest');
    }

    public function ses_get(Request $request) {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request) {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
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