@extends('layouts.app')

@section('title', 'Edit Paket')

@section('contents')
    <h1 class="mb-0">Edit Pakets</h1>
    <hr />
    <form action="{{ route('pakets.update', $pakets->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $pakets->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="harga_paket" class="form-control" placeholder="harga_paket" value="{{ $pakets->harga_paket }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="deskripsi" placeholder="Descripti0n" >{{ $pakets->deskripsi }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
