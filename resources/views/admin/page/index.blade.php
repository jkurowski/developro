@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-head container-fluid">
                <div class="row">
                    <div class="col-6 pl-0">
                        <h4 class="page-title row"><i class="fe-file-text"></i>Strony</h4>
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        @if (session('success'))
                            <div class="alert alert-success border-0 mb-0 w-100 text-center">
                                {{ session('success') }}
                                <script>window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){$(this).remove()})},33000);</script>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="table-overflow">
                @if (session('success'))
                    <div class="alert alert-success border-0 mb-0">
                        {{ session('success') }}
                        <script>window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){$(this).remove()})},3000);</script>
                    </div>
                @endif
                <table class="table mb-0">
                    <thead class="thead-default">
                    <tr>
                        <th>Nazwa</th>
                        <th class="text-center">Status</th>
                        <th>Ścieżka</th>
                        <th class="text-center">Data utworzenia</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="content">
                        @foreach($list as $page)
                            <tr>
                                <td>{{$page->title}}</td>
                                <td class="text-center">{!! status($page->menu) !!}</td>
                                <td>{{$page->title}}</td>
                                <td class="text-center">{{$page->created_at->format('Y-m-d H:i')}}</td>
                                <td class="option-120">
                                    <div class="btn-group">
                                        <a href="{{route('admin.page.edit', $page->id)}}" class="btn action-button mr-1" data-toggle="tooltip" data-placement="top" title="Edytuj"><i class="fe-edit"></i></a>
                                        <form method="POST" action="{{route('admin.page.destroy', $page->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn action-button confirm" data-toggle="tooltip" data-placement="top" title="Usuń" data-id="{{ $page->id }}"><i class="fe-trash-2"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @if($page->children->count() > 0)
                                @include('admin.page.children', array('pages' => $page->children))
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-group form-group-submit">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('admin.page.create')}}" class="btn btn-primary">Dodaj strone</a>
                    <a href="" class="ml-3 btn btn-primary">Dodaj link</a>
                </div>
            </div>
        </div>
    </div>
@endsection