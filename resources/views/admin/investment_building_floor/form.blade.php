@extends('admin.layout')
@section('content')
    @if(Route::is('admin.developro.investment.building.floor.edit'))
        <form method="POST" action="{{route('admin.developro.investment.building.floor.update', [$investment, $building, $entry])}}" enctype="multipart/form-data" class="mappa">
            {{method_field('PUT')}}
            @else
                <form method="POST" action="{{route('admin.developro.investment.building.floor.store', [$investment, $building])}}" enctype="multipart/form-data" class="mappa">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card">
                            <div class="card-head container">
                                <div class="row">
                                    <div class="col-12 pl-0">
                                        <h4 class="page-title row"><i class="fe-home"></i><a href="{{route('admin.developro.index')}}">Inwestycje</a><span class="d-inline-flex ml-2 mr-2">/</span>{{$investment->name}}<span class="d-inline-flex ml-2 mr-2">/</span>{{ $cardTitle }}</h4>
                                    </div>
                                </div>
                            </div>
                            @include('form-elements.back-route-button')
                            <div class="card-body">
                                <div class="mappa-tool">
                                    <div class="mappa-workspace">
                                        <div id="overflow" style="overflow:auto;width:100%;">
                                            <canvas class="mappa-canvas"></canvas>
                                        </div>
                                        <div class="mappa-toolbars">
                                            <ul class="mappa-drawers list-unstyled mb-0">
                                                <li><input type="radio" name="tool" value="polygon" id="new" class="addPoint input_hidden"/><label for="new" data-toggle="tooltip" data-placement="top" class="actionBtn tip addPoint" title="Służy do dodawanie nowego elementu"><i class="fe-edit-2"></i> Dodaj punkt</label></li>
                                            </ul>
                                            <ul class="mappa-points list-unstyled mb-0">
                                                <li><input checked="checked" type="radio" name="tool" id="move" value="arrow" class="movePoint input_hidden"/><label for="move" class="actionBtn tip movePoint" data-toggle="tooltip" data-placement="top" title="Służy do przesuwania punktów"><i class="fe-move"></i> Przesuń / Zaznacz</label></li>
                                                <li><input type="radio" name="tool" value="delete" id="delete" class="deletePoint input_hidden"/><label for="delete" class="actionBtn tip deletePoint" data-toggle="tooltip" data-placement="top" title="Służy do usuwana punków"><i class="fe-trash-2"></i> Usuń punkt</label></li>
                                            </ul>
                                            <ul class="mappa-list list-unstyled mb-0"></ul>
                                            <ul class="mappa-points list-unstyled mb-0">
                                                <li><a href="#" id="toggleparam" class="actionBtn tip toggleParam" data-toggle="tooltip" data-placement="top" title="Służy do pokazywania/ukrywania parametrów"><i class="fe-repeat"></i> Pokaż / ukryj parametry</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @include('form-elements.errors')
                                    <div class="col-12">
                                        <div class="toggleRow">
                                            @include('form-elements.mappa', ['label' => 'Współrzędne punktów', 'name' => 'cords', 'value' => $entry->cords, 'rows' => 10, 'class' => 'mappa-html'])
                                            @include('form-elements.mappa', ['label' => 'Współrzędne punktów HTML', 'name' => 'html', 'value' => $entry->html, 'rows' => 10, 'class' => 'mappa-area'])
                                        </div>

                                        @include('form-elements.select', ['label' => 'Typ piętra', 'name' => 'typ', 'selected' => $entry->type, 'options' => ['1' => 'Piętro mieszkalne', '2' => 'Piętro usługowe', '3' => 'Parking naziemny', '4' => 'Parking podziemny']])

                                        @include('form-elements.input-text', ['label' => 'Nazwa piętra', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                        @include('form-elements.input-text', ['label' => 'Nagłówek strony', 'sublabel'=> 'Meta tag - title', 'name' => 'meta_title', 'value' => $entry->meta_title])
                                        @include('form-elements.input-text', ['label' => 'Opis strony', 'sublabel'=> 'Meta tag - description', 'name' => 'meta_description', 'value' => $entry->meta_description])
                                        @include('form-elements.input-text', ['label' => 'Numer piętra', 'name' => 'number', 'value' => $entry->number])
                                        @include('form-elements.input-text', ['label' => 'Zakres powierzchni w wyszukiwarce xx-xx', 'sublabel' => '(zakresy oddzielone przecinkiem)', 'name' => 'area_range', 'value' => $entry->area_range])
                                        @include('form-elements.input-text', ['label' => 'Zakres pokoi w wyszukiwarce', 'sublabel' => '(liczby oddzielone przecinkiem)', 'name' => 'rooms_range', 'value' => $entry->rooms_range])
                                        @include('form-elements.input-text', ['label' => 'Zakres cen w wyszukiwarce xx-xx', 'sublabel' => '(zakresy oddzielone przecinkiem)', 'name' => 'price_range', 'value' => $entry->price_range])
                                        @include('form-elements.input-file', ['label' => 'Rzut pietra', 'sublabel' => '(wymiary: '.$planwidth.'px / '.$planheight.'px)', 'name' => 'file'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz piętro'])
                    </div>
                </form>
                @endsection
                @push('scripts')
                    <script src="/js/plan/underscore.js" charset="utf-8"></script>
                    <script src="/js/plan/mappa-backbone.js" charset="utf-8"></script>
                    <script type="text/javascript">
                        const map = {
                            "name":"imagemap",
                            "areas":[{!! $entry->cords !!}]
                        };
                        $(document).ready(function() {
                            const mapview = new MapView({el: '.mappa'}, map);
                            @if($building->file)
                            mapview.loadImage('/investment/building/{{$building->file}}');
                            @endif
                        });
                    </script>
        @endpush
