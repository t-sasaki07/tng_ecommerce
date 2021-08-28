@extends('layouts.layout')

@section('content')

    <main>
        <div class="container">
            <div class="row" style="font-size:24px;">
                <h1>購入が完了しました</h1>
                    <h1>ご購入ありがとうございます！</h1>
                    <p class="h1">注文番号:{{ $order->order_number }}</p>
            </div>
        </div>

    </main>

@endsection