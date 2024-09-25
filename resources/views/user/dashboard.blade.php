<?php
/**
 * Filename: dashboard.blade.php
 * Description: This blade file is used to display the view file for the user
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>User Dashboard</h1>

    <h2>Stores List</h2>
    <table class="table table-hover table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <!-- Additional columns if needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $storeItem)
                <tr>
                    <td>{{ $storeItem->id }}</td>
                    <td>{{ $storeItem->name }}</td>
                    <td>{{ $storeItem->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
