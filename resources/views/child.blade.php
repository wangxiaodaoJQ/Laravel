@extends('layouts.app')

@section('title', 'Demo')

@section('sidebar')
  @parent

  <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
  <p>This is my body content.</p>

   @alert(['type' => 'danger'])
    @slot('title')
      Forbidden
    @endslot

    You are not allowed to access this resource!
  @endalert
@endsection
