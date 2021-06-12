@extends('layouts.app')

@section('content')

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12 card border-dark mt-5">
                    <div class="cord-body ml-3 mb-2">
                        <h4 class="mt-4">お届け先</h4>
                        <p class="mb-2">
                            @if(Auth::check())
                                {{$sessionUser->postal_code}}
                                {{$sessionUser->prefecture}}
                                {{$sessionUser->city}}
                                {{$sessionUser->block}}
                                {{$sessionUser->building}}
                            @endif
                        </p>
                        <p style="padding-left: 160px;">
                            @if(Auth::check())
                                {{$sessionUser->name}}
                                {{$sessionUser->phone}}
                            @endif
                            様
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <table class="table mt-5 ml-3 border-dark">
                    <thead>
                        <tr class="text-center">
                            <th class="border-bottom border-dark">No</th>
                            <th class="border-bottom border-dark">商品名</th>
                            <th class="border-bottom border-dark">商品カテゴリ</th>
                            <th class="border-bottom border-dark">値段</th>
                            <th class="border-bottom border-dark">個数</th>
                            <th class="border-bottom border-dark">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($cartData as $key => $data)
                                <tr class="text-center">
                                    <th class="align-middle">{{ $key += 1 }}</th>
                                    <td class="align-middle">
                                        {{ $data['product_name'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $data['category_name'] }}
                                    </td>
                                    <td class="align-middle">
                                        ¥{{ number_format($data['price']) }} 円
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-outline-dark">
                                            {{ $data['session_quantity'] }}
                                        </button>
                                        個
                                    </td>
                                    <td class="align-middle">
                                        ¥{{ number_format($data['session_quantity'] * $data['price']) }}
                                    </td>

                                    <td class="border-0 align-middle">
                                        {!! Form::open(['route' => ['itemRemove', 'method' => 'post', $data['session_products_id']]]) !!}
                                            {{ Form::submit('削除', ['name' => 'delete_products_id', 'class' => 'btn btn-danger']) }}
                                            {{ Form::hidden('product_id', $data['session_products_id']) }}
                                            {{ Form::hidden('product_quantity', $data['session_quantity']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="text-center">
                                <th class="border-bottom-0 align-middle"></th>
                                <td class="border-bottom-0 align-middle"></td>
                                <td class="border-bottom-0 align-middle"></td>
                                <td class="border-bottom-0 align-middle"></td>
                                <td class="border-bottom-0 align-middle">合計</td>
                                @php
                                    $totalPrice = number_format(array_sum(array_column($cartData, 'itemPrice')))
                                @endphp
                                    <td class="border-bottom-0 align-middle">
                                        ¥{{ $totalPrice }}円
                                    </td>
                            </tr>


                        <tr class="text-right">
                            <th class="border-0"></th>
                            <td class="border-0">
                                <a class="btn btn-success" href="{{ route('product_search') }}" role="button">
                                    買い物を続ける
                                </a>
                            </td>
                            <td class="border-0"></td>
                            <td class="border-0"></td>
                            <td class="border-0">
                                {!! Form::open(['route' => ['orderFinalize', 'method' => 'post', $data['session_products_id']]]) !!}
                                    {{ Form::submit('注文を確定する', ['name' => 'orderFinalize', 'class' => 'btn btn-primary']) }}
                                {!! Form::close() !!}
                            </td>
                            <td class="border-0 align-middle"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

@endsection
