@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 m-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employers.create') }}">Create Employer</a>
                <a class="btn btn-primary" href="/queries">Back to queries</a>
            </div>
        </div>
    </div>
    <div class="row m-4">
    @if ($q == 1)
        <h5>
            Работники, скидка на спецодежду которых составляет 
            {{ $params['from'] }}% -  {{ $params['to'] }}%:
        </h5>
    @elseif ($q == 2)
        <h5>
            Вывести перечень видов спецодежды, получаемых работником 
            {{ $params['employer']->firstname }} {{ $params['employer']->lastname }}:
        </h5>
    @elseif ($q == 3)
        <h5>
            Количество видов спецодежды, которое получает каждый сотрудник:
        </h5>
    @elseif ($q == 4)
        <h5>
            Перечень сотрудников, которые получили спецодежду в 
            {{ $params['month'] }} месяце {{ $params['year'] }} года:</p>
    
    @elseif ($q == 5 && !empty($result))

        <h5>
            Количество работников, получивших спецодежду в 
            {{ $params['quarter'] }} квартале этого года: {{ $result[0]->receivings_count }}
        </h5>

    @else
        <h5>Что-то пошло не так...</h5>
    @endif
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            @if ($q == 1 && !$result->isEmpty())
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Job</th>
                <th>Workshop</th>
                <th>Sale</th>
            @elseif ($q == 2 && !$result->isEmpty())
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Ovelalls type</th>
                <th>Receiving datetime</th>
            @elseif ($q == 3 && !$result->isEmpty())
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Overall count</th>
            @elseif ($q == 4 && !$result->isEmpty())
                <th>Firstname</th>
                <th>Lastname</th>
            @elseif ($result->isEmpty())
                <h4>Запрос вернул пустой результат</h4>
            @endif
        </tr>

        @if ($q == 1)

            @foreach ($result as $employer)
            <tr>
                <td>{{ $employer->firstname }}</td>
                <td>{{ $employer->lastname }}</td>
                <td>{{ $employer->job }}</td>
                <td>{{ $employer->workshop->name }}</td>
                <td>{{ $employer->sale }} <span>%</span> </td>
                <td class="d-flex justify-content-around">
                    <a class="btn btn-info" href="{{ route('employers.show',$employer->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('employers.edit',$employer->id) }}">Edit</a>
                    <form action="{{ route('employers.destroy',$employer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        
        @elseif ($q == 2)

            @foreach ($result as $data)
            <tr>
                <td>{{ $data->firstname }}</td>
                <td>{{ $data->lastname }}</td>
                <td>{{ $data->type }}</td>
                <td>{{ $data->created_at }}</td>
            </tr>
            @endforeach

        @elseif ($q == 3)

            @foreach ($result as $data)
            <tr>
                <td>{{ $data->firstname }}</td>
                <td>{{ $data->lastname }}</td>
                <td>{{ $data->overall_count }}</td>
            </tr>
            @endforeach
        @elseif ($q == 3)

            @foreach ($result as $data)
            <tr>
                <td>{{ $data->firstname }}</td>
                <td>{{ $data->lastname }}</td>
                <td>{{ $data->overall_count }}</td>
            </tr>
            @endforeach
        
        @elseif ($q == 4)

            @foreach ($result as $data)
            <tr>
                <td>{{ $data->firstname }}</td>
                <td>{{ $data->lastname }}</td>
            </tr>
            @endforeach

        @endif

    </table>

@endsection