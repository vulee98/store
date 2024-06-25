@extends('backend.master')
@section('title', 'Chỉnh sửa đơn hàng')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa đơn hàng</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Chỉnh sửa đơn hàng</div>
                    <div class="panel-body">
                        <form action="{{ route('orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">Khách hàng:</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="mới" {{ $order->status == 'new' ? 'selected' : '' }}>Mới</option>
                                    <option value="đang giao" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                                    <option value="đã giao" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao</option>
                                    <option value="đả hủy" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
