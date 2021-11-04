@extends('backoffice.indexBO')

@section('contentBO')
<style>
    .col4{
        border: 5px solid white;
        height: 15rem;
        width: 25%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .spani{
        font-size: 8rem;
        color: #5FC7AE;
    }
    
</style>

    <div class="home-section">
        <div class="container">
            <div class="row flex justify-around mt-2">
                <div class="col4">
                    <span class="spani">{{ count($users) }}</span>Users
                </div>
                <div class="col4">
                    <span class="spani">{{ count($classes) }}</span>Classes
                </div>
                <div class="col4">
                    <span class="spani">1146</span>Visiteurs
                </div>
            </div>
        </div>
        <canvas id="graph1">

        </canvas>
    </div>









    
@endsection