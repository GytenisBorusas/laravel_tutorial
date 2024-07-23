@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim provident repellendus soluta rem consequuntur
                neque, vero ad adipisci voluptatum, eius odit aperiam non esse! Maiores nihil tenetur nam vero ex.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    @endsection
