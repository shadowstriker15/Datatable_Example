@extends('layouts.app')
@section('content')

    <!-- Back Button -->
    <div class="row">
        <div class="col-md-12 text-left">
            <a href="/" class="btn btn-light-blue">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <h2 class='mb-3 text-center'>Age of Empires 2 Civilizations</h2>
    <table id="dtBasicExample" class="table" width="100%">
        <thead>
        <tr>
            <th class="th-sm">Edit
            </th>
            <th class="th-sm">ID
            </th>
            <th class="th-sm">Name
            </th>
            <th class="th-sm">Expansion
            </th>
            <th class="th-sm">Army Type
            </th>
            <th class="th-sm">Team Bonus
            </th>
            <th class="th-sm">Civilization Bonuses
            </th>
            <th class="th-sm">Delete
            </th>
        </tr>
        </thead>
        <tbody>
            <!-- Populate Table -->
            @foreach($civs as $civ)
                <tr>
                    <!-- Edit Button -->
                    <td>
                        <a href="civs/{{$civ->id}}/edit" class="btn btn-default btn-md"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>{{$civ->id}}</td>
                    <td>{{$civ->name}}</td>
                    <td>{{$civ->expansion}}</td>
                    <td>{{$civ->army_type}}</td>
                    <td>{{$civ->team_bonus}}</td>
                    <td>
                        @foreach($bonuses as $bonus)
                            @if($bonus->civ_id == $civ->id)
                                <li>{{$bonus->bonus_type}}</li>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <!-- Delete Button -->
                        <form action="{{route('civs.destroy',$civ->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger btn-md" type="submit">
                                <i class="fa fa-trash fa-md"></i></button>
                        </form>
                    </td>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Edit
            </th>
            <th>ID
            </th>
            <th>Name
            </th>
            <th>Expansion
            </th>
            <th>Army Type
            </th>
            <th>Team Bonus
            </th>
            <th>Civilization Bonuses
            </th>
            <th>Delete
            </th>
        </tr>
        </tfoot>
    </table>
@endsection
@section('scripts')
    <!-- MDB Scripts -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables2.min.js')}}"></script>
    <!-- Datatable Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        // Material Design example
        $(document).ready(function () {
            $('#dtBasicExample').DataTable({
                "order": [[ 1, "asc" ]]
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
