<?php
/**
 * Filename: create.blade.php
 * Description: This blade file is used to display the particular user
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </table>

    <a href="{{ route('home') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
