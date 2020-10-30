@section('title', '错误')
<div class="card">
    <div class="card-header">哎呀有错误</div>
    <div class="card-body text-center">
        <h1>{{ $msg }}</h1>
        <a class="btn btn-primary" href="{{ route('root') }}">返回首页</a>
    </div>
</div>
