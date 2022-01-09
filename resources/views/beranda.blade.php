@extends('Template/master')


@section('title','Beranda')

@section('css')
<!-- css tambahan -->
@endsection

@section('content')
<!-- body content -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 align="center">Dashboard Web Deployment</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- script tambahan -->


@endsection