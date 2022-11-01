
@extends('App')
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Search here..." />
                </div>
                <div class="col">
                    <button class="btn btn-success">Refresh</button>
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('customer.create') }}">add</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Contact Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </thead>
                <?php $no = 1 ?>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->contact_name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>Edit | Delate</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

