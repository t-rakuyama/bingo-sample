@extends('layouts.app')

@section('title', 'PlayersEntry')

@section('js')
@vite(['resources/js/entry.ts'])
@endsection

@section('content')
<form id="entryForm" name="entryForm" method="POST">
@csrf
    <div>
        <label for='name'> 名前（空白区切り） </label>
        <input type=text id='name' name='name' />
    </div>
    <button type="button" id="submitButton">登録</button>
</form>
@endsection
