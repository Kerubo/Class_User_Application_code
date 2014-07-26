@extends('layout.master')
@section('connect')
<div class="page-header">
<div class="pull-right">
<div class="btn-group">
<!--back to list of all users-->
<a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
<!-- link to edit profile-->
<a href="{{ route('users.edit', array($user->id))}}" class="btn btn-default">Eedit Profile</a>

</div>
</div>
<h2>Show Profile</h2>
</div>

<!--user Details goes here-->
<p>{{$user->names}}</p>
<p>{{$user->dob}}</p>
<p>{{$user->gender}}</p>
<p>{{$user->marital status}}</p>
<p>{{$user->country}}</p>
<p>{{$user->photo}}</p>
<p>{{$user->phone}}</p>

@stop