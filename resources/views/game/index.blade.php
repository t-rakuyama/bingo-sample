@extends('../layouts.app')

@section('title', 'BingoGame')

@section('js')
@vite(['resources/js/entry.ts'])
<style>
    .game-container {
        float: left;
    }

    .card-container {
        overflow: hidden;
        min-width: 300px;

    }

    .flexbox {
        display: flex;
        flex-direction: column;
        text-align: center;
        float: left;
    }

    .flex-item {
        background: gray;
        border: 1px solid #000;
        width: 50px;
        height: 50px;
    }

    .flex-hit-item {
        background: orange;
        border: 1px solid #000;
        width: 50px;
        height: 50px;
    }

    button.btn--orange {
        color: #fff;
        background-color: #eb6100;
        border-bottom: 5px solid #b84c00;
    }

    button.btn--orange:hover {
        margin-top: 3px;
        color: #fff;
        background: #f56500;
        border-bottom: 2px solid #b84c00;
    }

    button.btn--shadow {
        -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, .3);
        box-shadow: 0 3px 5px rgba(0, 0, 0, .3);
    }
</style>
@endsection

@section('content')
<div>hitNumber {{$number}}</div>
@foreach ($data as $k => $v)
<div class="game-container">
    {{$v['name']}}
    @if ($v['isBingo'])
    <span>bingo!</span>
    @endif
    <div class="card-container">
        @foreach ($v['card'] as $column)
        <div class="flexbox">
            @foreach ($column as $cell )
            @if ($cell['isHit'])
            <div class="flex-hit-item">{{$cell['value']}}</div>
            @else
            <div class="flex-item">{{$cell['value']}}</div>
            @endif
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endforeach
<form method="POST" action='/game'>
    @csrf
    <button class="btn btn--orange btn--cubic btn--shadow">次の数字を引く</button>
</form>
@if ($isFinish)
<button class="btn btn--orange btn--cubic btn--shadow" type="button" onclick="location.href='/'">トップページへ</button>
@endif
@endsection
