@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 m-2">
            <div class="pull-left">
                <h2>Queries</h2>
            </div>
            <ul class="list">
                
                <li class="nav-item mt-4">
                    <form action="/queries/1" method="get">
                        Найти работников, скидка на спецодежду которых составляет 
                        <input name="from" value="" placeholder="0" min="0" max="100" style="width:55px" type="number"> 
                        - 
                        <input name="to" value="" placeholder="100" min="0" max="100" style="width:55px" type="number"> %
                        <button type="submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg></button>
                    </form>
                </li>

                <li class="nav-item mt-4">
                    <form action="/queries/2" method="get">
                        Вывести перечень видов спецодежды, получаемых работником 
                        <select name="employer_id">
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->id }}">{{ $employer->firstname }} {{ $employer->lastname }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg></button>
                    </form>
                </li>

                <li class="nav-item mt-4">
                    <form action="/queries/3" method="get">
                        Определить, какое количество видов спецодежды получает каждый сотрудник 
                        <button type="submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg></button>
                    </form>
                </li>

                <li class="nav-item mt-4">
                    <form action="/queries/4" method="get">
                        Вывести перечень сотрудников, которые получили спецодежду в 
                        <select name="month" id="">
                            @foreach ($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        месяце
                        <select name="year" id="">
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        года
                        <button type="submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg></button>
                    </form>
                </li>
                <li class="nav-item mt-4">
                    <form action="/queries/5" method="get">
                        Подсчитать, сколько работников получили спецодежду в 
                        <select name="quarter" id="">
                            @foreach ($quarters as $quarter)
                                <option value="{{ $quarter }}">{{ $quarter }}</option>
                            @endforeach
                        </select>
                        квартале 
                        <button type="submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg></button>
                        <input type="hidden" name="q" value="5">
                    </form>
                </li>
            </ul>
        </div>
    </div>

@endsection