<?php
/**
 * Filename: create.blade.php
 * Description: This blade file is used to display the edit store form
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Store User</h1>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Store Users List</a>
    </div>
    
    <form action="{{ route('stores.update', $store->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $store->name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" name="address" value="{{ $store->address }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
