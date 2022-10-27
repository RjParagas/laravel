@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Truck Details</h4>
                        <a href="{{url('truck')}}" class="btn btn sm btn-danger float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-truck/'.$key) }}" method="POST">
                        @csrf
                        @method ('PUT')

                        <div class="form-group mb-3">
                            <label>Plate Number</label>
                            <input type="text" name="plateNo" value="{{$editdata['plateNo']}}" class="form-control">
                        <div>

                        <div class="form-group mb-3">
                            <label>Model</label>
                            <input type="text" name="model" value="{{$editdata['model']}}" class="form-control">
                        <div>

                        <div class="form-group mb-3">
                            <label>Brand</label>
                            <input type="text" name="brand" value="{{$editdata['brand']}}" class="form-control">
                        <div>

                        <div class="form-group mb-3">
                            <label>Type</label>
                            <input type="text" name="type" value="{{$editdata['type']}}" class="form-control">
                        <div>



                         <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        <div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection