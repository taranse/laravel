@extends('master')
@section('title', 'Записная книжка')
@section('header1', 'Записная книжка')
@section('form')
    <div class="container">
        <h3>Добавить в записную книжку</h3>
        @if(!empty($err))
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-danger">{{$err}}</p>
                </div>
            </div>
        @endif
        <form action="{{url('phone-book')}}" method="post" role="form">

            <div class="row">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-xs-3">
                    <label for="nameForm"> Имя:</label><br>
                    <input class="form-control" id="nameForm" type="text" name="name" pattern="[Aa-Zz-Аа-Яя]{2,25}"
                           required>
                </div>
                <div class="form-group col-xs-3">
                    <label for="phoneForm"> Телефон:</label><br>
                    <input class="form-control" id="phoneForm" type="text" name="phone" pattern="[0-9]{6,12}" required>
                </div>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-default">Добавить</button>
                </div>

            </div>
        </form>
    </div>
@endsection
@section('phone-book')
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-striped">
                <thead>
                <tr class="danger">
                    <th>#</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($phoneBook as $phone)
                    <tr>
                        <td>{{$phone->id}}</td>
                        <td>
                            <div class="hidden hidden-table-name-{{$phone->id}}">
                                <input type="text" name="phone" class="input-table-name"  data-id="{{$phone->id}}"
                                       pattern="[Aa-Zz-Аа-Яя]{2,25}" value="{{$phone->name}}">
                            </div>
                            <div class="visible-table-name-{{$phone->id}}">
                                {{$phone->name}}
                            </div>
                        </td>
                        <td>
                            <div class="hidden hidden-table-phone-{{$phone->id}}">
                                <input type="text" name="phone" class="input-table-phone" data-id="{{$phone->id}}"
                                       pattern="[0-9]{6,12}" value="{{$phone->phone}}">
                            </div>
                            <div class="visible-table-phone-{{$phone->id}}">
                                {{$phone->phone}}
                            </div>
                        </td>
                        <td>
                            <form action="{{url('phone-book', $phone->id)}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-success update-button" data-id="{{$phone->id}}">Редактировать
                            </button>
                            <form action="{{url('phone-book', $phone->id)}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" class="update-name" name="name" value="{{$phone->name}}">
                                <input type="hidden" class="update-phone" name="phone" value="{{$phone->phone}}">
                                {{ method_field('PUT') }}
                                <button class="hidden btn btn-success update-button-success" data-id="{{$phone->id}}">Сохранить
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(function () {
            var inputs = ['phone', 'name'];
            $('.update-button').click(function () {
                $(this).addClass('hidden');
                var id = $(this).attr('data-id');
                $('.update-button-success[data-id=' + id + ']').removeClass('hidden');
                inputs.forEach(function (inputName) {
                    $('.hidden-table-' + inputName + '-' + id).removeClass('hidden');
                    $('.visible-table-' + inputName + '-' + id).addClass('hidden');
                })
            });
            $('.update-button-success').click(function () {
                $(this).addClass('hidden');
                var id = $(this).attr('data-id');
                $('.update-button[data-id=' + id + ']').removeClass('hidden');
                inputs.forEach(function (inputName) {
                    $('.hidden-table-' + inputName + '-' + id).addClass('hidden');
                    $('.visible-table-' + inputName + '-' + id).removeClass('hidden');
                });
            });
            inputs.forEach(function (inputName) {
                $('.input-table-' + inputName).keyup(function () {
                    var id = $(this).attr('data-id');
                    var val = $(this).val();
                    $('.update-' + inputName).val(val);
                })
            })
        })
    </script>
@endsection