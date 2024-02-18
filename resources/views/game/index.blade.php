@extends('../layouts.app')

@section('title', 'BingoGame')

@section('js')
@vite(['resources/js/entry.ts'])
<style>
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
</style>
@endsection

@section('content')
hitNumber {{$number}}
@foreach ($data as $k => $v)
<p>{{$v['name']}}</p>
@if ($v['isBingo'])
<p>bingo!</p>
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
@endforeach
<form method="POST" action='/game'>
    @csrf
    <button>次の数字を引く</button>
</form>
@if ($isFinish)
<button type="button" onclick="location.href='/'">トップページへ</button>
@endif
@endsection
