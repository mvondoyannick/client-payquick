@extends('app')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Striped Table with Hover</h4>
                <p class="category">Here is a subtitle for this table</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Action</th>
                        <th>Code transaction</th>
                        <th>Adresse Ip</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $logs)
                    <tr>
                        <td>{{$logs->id}}</td>
                        <td>{{$logs->created_at}}</td>
                        <td>{{$logs->amount}} F CFA</td>
                        <td>{{$logs->flag}}</td>
                        <td>{{$logs->code}}</td>
                        <td>{{$logs->ip}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection