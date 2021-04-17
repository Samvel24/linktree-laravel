@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Your links</h2>
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Visits</th>
                            <th>Last visit</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td>{{ $link->name }}</td>
                                    <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                                    <td>0</td>
                                    <td>10 Abr, 2021 - 12:16 p.m.</td>
                                    <td><a href="/dashboard/links/{{ $link->id }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/dashboard/links/new" class="btn btn-primary">Add Link</a>
                </div>
            </div>
        </div>
    </div>
@endsection