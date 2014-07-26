@extends('layout.master')

@section('content')
<div class="page-header">
<div class="pull-right">
<!-- create profile button -->
<a href="{{route('users.create')}}" class="btn btn-default">create profile</a>
</div>
<h2>Users</h2>
</div>
<!--Table  with listing of users-->
<table class="table">
	<thead>
		<tr>
			<th>Names</th>
			<th>Phones</th>
			<th>Gender</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
                        
</table>
@stop
