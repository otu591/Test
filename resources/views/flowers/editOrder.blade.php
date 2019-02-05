@extends(env('THEME').'.layouts.home')

@section('content')
    <div class="container">
        <div class="alert-info">
            <h2>Редактирование заказа</h2>
        </div>

        @if(count($errors)>0)
            <div class="alert-warning">
                <ul>
                    @foreach($errors->all() as $error )
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
        @endif


        <form action="{{route('editOrder', ['id' => $id_order])}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$id_order}}">
            <div class="form-group" >
                <label >ID:{{$id_order}}</label>
            </div>
            <div class="form-group" >
                <label for="client_email">email_клиента</label>
                <input  type="email" class="form-control" id="client_email" name="client_email" value="{{ $client_email}}" />
            </div>
            <div class="form-group">
                <label for="partner">партнер</label>
                <input  type="text" class="form-control" id="partner" name="partner" value="{{ $partner_name}}"/>
            </div>
            <div class="form-group">
                <label for="products">продукты(наименования - количество)</label>
                <textarea class="form-control" id="products" name="products" rows="2" readonly>{{$str_products }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">статус заказа</label>
                <input  type="text" class="form-control" id="status" name="status" value="{{ $order_status}}"/>
            </div>
            <div class="form-group">
                <label for="sum">стоимость заказа</label>
                <input  type="text" class="form-control" id="sum" name="sum" value="{{ $sumOrder}}" readonly/>
            </div> </br></br>


            <input type="submit" class="btn btn-primary" value="send"/>
        </form>

    </div>

@endsection