@extends('backend.master')
@section('title', 'Tạo đơn hàng mới')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tạo đơn hàng mới</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Tạo đơn hàng mới</div>
                    <div class="panel-body">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">Khách hàng:</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
