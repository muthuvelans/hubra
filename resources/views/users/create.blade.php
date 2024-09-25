<?php
/**
 * Filename: create.blade.php
 * Description: This blade file is used to display the create user form
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>
    
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
       
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
