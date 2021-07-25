@extends('layouts.layout')

@section('content')

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12 card border-dark mt-5">
                    <div class="cord-body ml-3 mb-2">
                        <h4 class="mt-4">お届け先</h4>
                        <p class="mb-2">
                            @if(Auth::check())
                                {{$user->postal_code}}
                                {{$user->prefecture}}
                                {{$user->city}}
                                {{$user->block}}
                                {{$user->building}}
                            @endif
                        </p>
                        <p style="padding-left: 160px;">
                            @if(Auth::check())
                                {{$user->name}}
                                {{$user->phone}}
                            @endif
                            様
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="font-size:24px;">
                カートに商品がありません
            </div>
        </div>

    </main>

@endsection
