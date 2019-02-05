
<div class="container">
    <h1>Таблица  заказов</h1>

    {{ $vars->links() }}
    <div class="table-responsive-xl">
        <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>партнер</th>
            <th>стоимость_заказа</th>
            <th>состав_заказа</th>
            <th>статус_заказа</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($vars as $var)

            <tr>
                <th scope="row"><a href="{{route('editOrder', ['id' => $var->id])}}">{{ $var->id }}</a></th>

                <td>{{$var->partner->name}}</td>

                <td>{{ \App\Http\Controllers\ordersController::getSumma($var)}}</td>

                <td>
                    <ul>
                         @foreach ($var->products as $product)
                             <li>{{ $product->name }}</li>
                         @endforeach
                    </ul>
                </td>

{{--{{dd($var_status[$var->status])}}--}}
                <td>{{$var_status[$var->status]}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    </div>
</div>
