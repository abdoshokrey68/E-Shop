@extends('store.dashboard.layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <i class="fas fa-envelope-open-text"></i>
                        @lang('site.message')
                    </h1>
                </div>
                <div class="clear"> </div>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{session::get('success')}}
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4>
                                <i class="fas fa-envelope-open-text"></i>
                                @lang('site.messages_list')</h4>
                        </div>

                        <div class="panel-body">
                                <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr class="bg-dark" style="color: #fff">
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('site.item_name')</th>
                                        <th scope="col">@lang('site.purchaser')</th>
                                        <th scope="col">@lang('site.control')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($messages as $key => $message)
                                            <tr class="">
                                                <th scope="row"> {{$key +1}} </th>
                                                <td>
                                                        {{$message->name}}
                                                </td>
                                                <td> {{$message->created_at}} </td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{$message->id}}">
                                                        <i class="fas fa-eye"></i> @lang('site.show')
                                                    </button>
                                                    <a href="{{route('dashboard.message.delete', $message->id)}}" class="btn btn-danger"> <i class="fas fa-trash"></i> @lang('site.delete') </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade animate" id="exampleModalLong{{$message->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content animate-bottom"> <!-- Here you have the juicy hahah -->
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title" id="myModalLabel"> @lang('site.name') : {{$message->name}} </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">  @lang('site.item_name') : {{$message->name}} </li>
                                                                <li class="list-group-item">  @lang('site.my_messages') : {{$message->message}} </li>
                                                                <li class="list-group-item">  @lang('site.sender_phone') : {{$message->phone}}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('site.close')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </tbody>
                                </table>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
