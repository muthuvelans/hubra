
<?php
/**
 * Filename: dashboard.blade.php
 * Description: This blade file is used to diaplay the dashboard for admin
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>

    <h2>Users List</h2>
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Create New User</a>
    <table class="table table-hover table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Additional columns if needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $userItem)
                <tr>
                    <td>{{ $userItem->id }}</td>
                    <td>{{ $userItem->name }}</td>
                    <td>{{ $userItem->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $userItem->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('users.edit', $userItem->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $userItem->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Stores List</h2>
    <a href="{{ route('stores.create') }}" class="btn btn-success mb-3">Create New Store</a>
    <table class="table table-hover table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <!-- Additional columns if needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $storeItem)
                <tr>
                    <td>{{ $storeItem->id }}</td>
                    <td>{{ $storeItem->name }}</td>
                    <td>{{ $storeItem->address }}</td>
                    <td>
                        <a href="{{ route('stores.show', $storeItem->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('stores.edit', $storeItem->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('stores.destroy', $storeItem->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
