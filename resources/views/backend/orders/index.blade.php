@extends('backend.master')
@section('title', 'Danh sách đơn hàng')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách đơn hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="margin-top:20px;">                
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th width="20%">Email khách hàng</th>
                                            <th>Trạng thái</th>
                                            <th width="20%">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td>
                                                <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Chỉnh sửa</a>
                                                <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                                @if ($order->status != 'delivered')
                                                    <form action="{{ route('orders.changeStatus', [$order, 'đã giao']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success">Đánh dấu đã giao</button>
                                                    </form>
                                                @endif
                                                @if ($order->status != 'shipping')
                                                    <form action="{{ route('orders.changeStatus', [$order, 'đang giao']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-info">Đánh dấu đang giao</button>
                                                    </form>
                                                @endif
                                                @if ($order->status != 'cancelled')
                                                    <form action="{{ route('orders.changeStatus', [$order, 'đả hủy']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-secondary">Hủy đơn hàng</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>                          
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
