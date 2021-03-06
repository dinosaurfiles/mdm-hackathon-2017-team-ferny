@extends('layouts.master')

@section('content')
        <section class="hero is-success is-fullheight">
        <!-- Hero head: will stick at the top -->
        <!-- <div class="hero-head"> -->
        <header class="navbar">
          <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item">
                  <span style="font-size: 30px">
                      Medi
                      <span class="icon" style="margin-left: -5px">
                          <i class="fa fa-plus"></i>
                      </span>Missions
                  </span>
                </a>
              <span class="navbar-burger burger" data-target="navbarMenuHeroC">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div id="navbarMenuHeroC" class="navbar-menu">
              <div class="navbar-end">
                <a class="navbar-item" href="/">
                  Home
                </a>
                <a class="navbar-item is-active" href="/missions">
                  Missions
                </a>
                <a class="navbar-item" href="/lgus">
                  LGUs
                </a>
                <a class="navbar-item" href="/volunteers">
                  Volunteers
                </a>
                <a class="navbar-item">
                    About
                </a>
              </div>
            </div>
          </div>
        </header>
            <br>
        <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container">
                    <div class="mission-container">
                        <h1 class="title" style="margin-bottom: 4px"><a href="/missions/{{ $mission->id }}">{{ $mission->name }} </a>
                            @if ($mission->status == 1)
                                <button class="button is-danger is-inverted">
                                    <span class="icon">
                                        <i class="fa fa-spinner"></i>
                                    </span>
                                    &nbsp Available
                                </button>
                            </h1>
                            @else
                                <button class="button is-success is-inverted">
                                    <span class="icon">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    &nbsp Success
                                </button>
                            </h1>
                            @endif
                        <h4>{{ $mission->unit }}</h4>
                        <h2 class="subtitle">{{ $mission->contact_person }} . {{ $mission->contact_no }}</h2>
                        <p class="content">{!! $mission->details !!}</p>
                        <br>
                        <h1 class="title">Map:</h1>
                        <div class="container has-text-centered">
                            <div id="controls"></div>
                            <div id="gmap" style="width:500px;height:300px;"></div>
                        </div>
                        <script type="text/javascript">
                            var Circles = [
                                {
                                    lat: {{ $mission->lat }},
                                    lon: {{ $mission->lon }},
                                    title: 'Mission #{{ $mission->id }} {{ $mission->name }}',
                                    html: '<a href="/missions/{{ $mission->id }}" style="color: #23D160">{{ $mission->name }}</a>',
                                    circle_options: {
                                        radius: 5000
                                    },
                                    stroke_options: {
                                        strokeColor: '#FF3860',
                                        fillColor: '#eeee00'
                                    },
                                    draggable: false
                                },
                            ];

                            new Maplace({
                                show_markers: false,
                                locations: Circles,
                                view_all_text: 'Medical Missions Available',
                                type: 'circle',
                                map_options: {
                                    zoom: 9
                                }
                            }).Load();
                        </script>

                        <br>
                        <h1 class="title">Donated Items:</h1>
                        <table class="table is-striped is-fullwidth">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Count/PCs/Worth</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($equipments as $equipment)
                                    <tr>
                                        <td>{{ $equipment->name }}</td>
                                        <td>{{ $equipment->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <h1 class="title">Volunteers:</h1>
                        <table class="table is-striped is-fullwidth">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($volunteers as $volunteer)
                                <tr>
                                    <td>{{ $volunteer->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h3>Actions:</h3>
                        <br>
                        <a class="button is-info is-inverted" href="/missions/{{ $mission->id }}/auth/">Edit</a>
                        <a class="button is-info is-inverted" href="/donate/{{ $mission->id }}">Donate</a>
                    </div>
                </div>
            </div>
        </section>
@endsection('content')
