@extends('layouts.template_inheritance_layout')
@section('title','Contact Page')
@section('body1')
    <h2>this text is from contact page body1.</h2>    
@endsection

@section('body2')
    <h2>overriding of the layout section. </h2>
@endsection


@section('body3')
    @parent
    <h2>appending to the layout section. </h2>
@endsection