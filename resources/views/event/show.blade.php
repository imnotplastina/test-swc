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
        <div class="container-fluid">
            <div class="col-lg-3 col-6 pb-4">
                <h2>{{ $event->title }}</h2>
                <h4>{{ $event->text }}</h4>
                <h4>{{ $event->created_at->format('Y-m-d') }}</h4>
            </div>
            <div class="col-lg-3 col-6 pb-4">
                <h2>Участники</h2>
                @foreach($event->users as $event_user)
                    <h4>{{ $event_user->first_name }}</h4>
                @endforeach
            </div>

            <div class="col-lg-3 col-6 pb-4">
                @php($isContain = false)
                @foreach($event->users as $event_user)
                    @if($event_user->id == auth()->user()->id)
                        @php($isContain = true)
                    @endif
                @endforeach
                @if($isContain)
                    <form action="{{ route('event.unsubscribe', ['user_id' => auth()->user()->id, 'event_id' => $event->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Отказаться от участия</button>
                    </form>
                @else
                    <form action="{{ route('event.subscribe', ['user_id' => auth()->user()->id, 'event_id' => $event->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Принять участие</button>
                    </form>
                    @php($isContain = true)
                @endif
            </div>
        </div>
    </section>
@endsection
