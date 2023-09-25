@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="class=breadcrumb-item active">{{ auth()->user()->first_name }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
{{--        <div class="container-fluid">--}}
{{--            <div class="col-lg-3 col-6 pb-4">--}}
{{--                @foreach($events as $event)--}}
{{--                    <h2>{{ $event->title }}</h2>--}}
{{--                    <h4>{{ $event->text }}</h4>--}}
{{--                    <h4>{{ $event->created_at->format('Y-m-d') }}</h4>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @foreach($event->users() as $event_user)--}}
{{--                    <h4>{{ $event_user }}</h4>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-success">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>53<sup style="font-size: 20px">%</sup></h3>--}}

{{--                        <p>Продукты</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-stats-bars"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-warning">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>44</h3>--}}

{{--                        <p>Пользователи</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-person-add"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-danger">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>65</h3>--}}

{{--                        <p>Отзывы</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-pie-graph"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}

{{--        </div>--}}
    </section>
@endsection
