<?php
/**
 * Filename: index.blade.php
 * Description: This blade file is used to display the store
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Store Users List</h1>
        <a href="{{ route('stores.create') }}" class="btn btn-success">Create New Store User</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stores as $store)
                    <tr>
                        <td>{{ $store->id }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->address }}</td>
                        <td>
                            <a href="{{ route('stores.show', $store->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
