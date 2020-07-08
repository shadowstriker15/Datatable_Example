@extends('layouts.app')

@section('content')

    <form class="text-center border border-light p-5" action="{{route('civs.update',$civ->id)}}" method="POST">

        <p class="h4 mb-4">Edit Civilization</p>

        <br>

        <!-- ID -->
        <div class="form-row mb-4">
            <div class="col-md-2">
                <label>ID</label>
            </div>
            <div class="col-md-1">
                <input type="text" id="nameInput" class="form-control mb-4" value="{{$civ->id}}" readonly>
            </div>
        </div>

        <!-- Name -->
        <div class="form-row mb-4">
            <div class="col-md-2">
                <label>Name</label>
            </div>
            <div class="col-md-9">
                <input type="text" id="nameInput" name="name" class="form-control mb-4" value="{{$civ->name}}" placeholder="Name">
            </div>

        </div>

        <!-- Expansion -->
        <div class="form-row mb-4">
            <div class="col-sm-2">
                <label>Expansion</label>
            </div>
            <div class="col-sm-5 custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="expansion1" name="expansion" value="Age of Kings">
                <label class="custom-control-label" for="expansion1">Age of Kings</label>
            </div>
            <div class="col-sm-5 custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="expansion2" name="expansion" value="The Conquerors">
                <label class="custom-control-label" for="expansion2">The Conquerors</label>
            </div>
        </div>

        <!-- Army Type -->
        <div class="form-row mb-4">
            <div class="col-md-2">
                <label>Army Type</label>
            </div>
            <div class="col-md-9">
                <input type="text" id="armyInput" name="army_type" class="form-control mb-4" value="{{$civ->army_type}}"placeholder="Army Type">
            </div>
        </div>

        <!-- Team Bonus -->
        <div class="form-row mb-4">
            <div class="col-md-2">
                <label>Team Bonus</label>
            </div>
            <div class="col-md-9">
                <input type="text" id="teamInput" name="team_bonus" class="form-control mb-4" value="{{$civ->team_bonus}}"placeholder="Team Bonus">
            </div>
        </div>

        <!-- Civilization Bonuses -->
        <div class="form-row mb-4">
            <div class="col-md-2">
                <label>Civilization Bonuses</label>
            </div>
            @for ($i = 0; $i < count($bonuses); $i++)
                @if ($i == 0)
                    <div class="col-md-9">
                        <input type="text" name="bonus{{$i}}" class="form-control mb-4" value="{{$bonuses[$i]->bonus_type}}"placeholder="Bonus Type">
                    </div>
                @else
                    <div class="col-md-9 offset-2">
                        <input type="text" name="bonus{{$i}}" class="form-control mb-4" value="{{$bonuses[$i]->bonus_type}}"placeholder="Bonus Type">
                    </div>
                @endif
            @endfor
        </div>

        <div class="form-row mb-4">
            <div class="col-md-6">
                <!-- Cancel Button-->
                <a href="/civs" type="button" class="btn btn-secondary btn-block btn-grey">Cancel</a>
            </div>
            <div class="col-md-6">
                <!-- Submit button -->
                <button class="btn btn-primary btn-block" type="submit">Save</button>
            </div>
        </div>

        <!-- Change form method and include token-->
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>
@endsection



@section('scripts')
<script>
    // Used to select correct radio button
    (function expansionRadios() {
        var expansion = "{{$civ->expansion}}";
        if (expansion == "Age of Kings"){
            document.getElementById("expansion1").checked = true;
        } else{
            document.getElementById("expansion2").checked = true;
        }

    }());
</script>
@endsection
