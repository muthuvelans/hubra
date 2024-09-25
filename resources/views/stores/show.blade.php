<?php
/**
 * Filename: show.blade.php
 * Description: This blade file is used to display the partcular store details
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Store User Details</h1>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Store Users List</a>
    </div>
    
    <div class="card">
        <div class="card-header">
            Store User Information
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <td>{{ $store->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $store->name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $store->address }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $store->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $store->updated_at->format('d M Y, h:i A') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
