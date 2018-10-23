<?php

@extends('layout.app)

@section('content')
    @while(have_posts()) @php(the_post())
    testing this from the home page page
    @endwhile
@endsection
