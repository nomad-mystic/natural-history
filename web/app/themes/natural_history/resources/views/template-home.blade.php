{{--
  Template Name: Home Template
  Author: Keith Murphy | nomadmystics@gmail.com
--}}

{{--This might change back to layout.app but wanted to figure out how this all works--}}
@extends('layouts.home')

@section('content')
    @while(have_posts()) @php(the_post())
    {{--@debug(@php(the_post()))--}}
    {{--@include('partials.page-header')--}}
    @include('partials.home.content-home')
    @endwhile
@endsection

{{--@php( echo '<pre>';--}}
    {{--var_dump();--}}
    {{--echo '</pre>';)--}}
{{--@debug('controller')--}}