<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $config["web_name"] }}</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset("theme/layui/css/layui.css") }}" media="all">
    <link rel="stylesheet" href="{{ asset("theme/style/admin.css") }}" media="all">
    <style>
        .layui-laypage .layui-laypage-curr .layui-laypage-em {
            background-color: #1E9FFF !important;
        }
    </style>
    @yield("css")
</head>