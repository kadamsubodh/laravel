@extends('category.create')
@section('editId',$category->id)
@section('edit_catname',$category->cat_name)
@section('editMethod')
{{method_field('PUT')}}
@endsection