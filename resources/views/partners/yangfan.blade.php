@extends('layouts.frontend.master')
@section('title','杨帆作品')
@section('body')
    <div style="width: 100%">
        <img src="{{env('APP_DOMAIN').'/picture/yangfan/1.jpg'}}" alt="" style="width: 100%">
        <img src="{{env('APP_DOMAIN').'/picture/yangfan/2.jpg'}}" alt="" style="width: 100%">
        <img src="{{env('APP_DOMAIN').'/picture/yangfan/3.jpg'}}" alt="" style="width: 100%">
    </div>
@endsection