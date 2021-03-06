@extends('layouts.master')

@section('content-header')
    <?php foreach ($taisans as $taisan): ?>
        <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
            <?php foreach ($taisans as $taisan): ?>
                <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                    <h1>Thu hồi tài sản - {{$taisan->tentaisan}}</h1>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.danhmuctaisan.nhaptaisan.index') }}">{{ trans('Danh Sách Thu Hồi') }}</a></li>
        
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.thuhoitaisan.thuhoitaisan.store'], 'method' => 'post']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    @include('partials.form-tab-headers')
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                            <?php $i++; ?>
                            <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                @include('thuhoitaisan::admin.thuhoitaisans.partials.thuhoi-fields', ['lang' => $locale])
                            </div>
                        @endforeach

                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('Thu Hồi') }}</button>
                            <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.thuhoitaisan.thuhoitaisan.index')}}"><i class="fa fa-times"></i> {{ trans('Thoát') }}</a>
                        </div>
                    </div>
                </div> {{-- end nav-tabs-custom --}}
            </div>
        </div>
    {!! Form::close() !!}
@stop
@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop





