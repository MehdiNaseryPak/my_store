@extends('admin.layouts.master')
@section('title','لیست عکس های پروژه')
@section('content')

    <livewire:admin.project.project-gallery-list :projectId="$project->id">

@endsection
