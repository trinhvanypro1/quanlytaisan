@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Mượn') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Danh Sách Mượn Tài Sản') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="box-header">
                            <a class="btn btn-primary" href="{{ route('admin.thuhoitaisan.thuhoitaisan.index')}}"></i>Danh Sách Mượn Tài Sản</a>
                            <a class="btn btn-primary" href="{{ route('admin.thuhoitaisan.thuhoitaisan.dsthuhoitaisan')}}"></i>Danh Sách Thu Hồi Tài Sản</a>
                            </div>
                        </div>
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tên Tài Sản</th>
                                <th>Số Lượng</th>
                                <th>Ngày Mượn</th>
                                <th>Người Bàn Giao</th>
                                <th>Bộ Phận Mượn</th>
                                <th>Nhân Viên Mượn</th>
                                <th>Tính Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($muontaisans)): ?>
                            <?php foreach ($muontaisans as $muontaisan): ?>
                            <tr>
                                
                                <?php foreach ($join_taisan as $taisan): ?>
                                    <?php if ($taisan->id == $muontaisan->taisan_id): ?>
                                        <td>{{$taisan->tentaisan}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($muontaisan->so_luong_ban_giao < 0): ?>
                                    <td>0</td>
                                <?php else: ?>
                                    <td>{{$muontaisan->so_luong_ban_giao}}</td>
                                <?php endif; ?>
                                

                                <td>{{$muontaisan->ngay_ban_giao}}</td>

                                <?php foreach ($join_user as $user): ?>
                                    <?php if ($user->id == $muontaisan->nhanvienbangiao_id): ?>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                                    
                                <?php foreach ($join_phongban as $phongban): ?>
                                    <?php if ($phongban->id == $muontaisan->phongbannhantaisan_id): ?>
                                        <td>{{$phongban->tenphongban}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($join_nhanvien as $nhanvien): ?>
                                    <?php if ($nhanvien->id == $muontaisan->nhanviennhantaisan_id): ?>
                                        <td>{{$nhanvien->tennhanvien}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <td>
                                    <a href="{{ route('admin.thuhoitaisan.thuhoitaisan.thuhoi',[$muontaisan->id]) }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                                    <i class="fa fa-random"></i> {{ trans('Thu Hồi') }}</a>        
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop

