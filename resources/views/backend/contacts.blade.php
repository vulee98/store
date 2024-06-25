@extends('backend.master')
@section('title', 'Danh sách liên hệ')
@section('main')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liên hệ</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách liên hệ</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="margin-top:20px;">                
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th width="20%">Email</th>
                                            <th>Tên</th>
                                            <th>Nội dung liên hệ</th>
                                            <th width="10%">Trạng thái</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->com_id }}</td>
                                            <td>{{ $contact->com_email }}</td>
                                            <td>{{ $contact->com_name }}</td>
                                            <td>{{ $contact->com_content }}</td>
                                            <td>{{ $contact->is_contacted ? 'Đã liên hệ' : 'Chưa liên hệ' }}</td>
                                            <td>
                                                @if (!$contact->is_contacted)
                                                    <form action="{{ url('admin/contacts/'.$contact->com_id.'/reply') }}" method="POST">
                                                        @csrf
                                                        <textarea name="message" required class="form-control" placeholder="Nhập nội dung phản hồi"></textarea>
                                                        <button type="submit" class="btn btn-success" style="margin-top: 5px;">Gửi phản hồi</button>
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
