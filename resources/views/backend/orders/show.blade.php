@extends('backend.master')
@section('title', 'Chi tiết đơn hàng')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết đơn hàng</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Chi tiết đơn hàng</div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Email khách hàng</th>
                                <td>{{ $order->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>{{ ucfirst($order->status) }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
