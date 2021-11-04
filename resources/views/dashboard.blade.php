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
            <h1 class="m-2" style="text-align: center"> Welcome {{ Auth::user()->name }} </h1>
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
        <div class="container mt-8" style="height: 40rem; border: 5px solid white;">
            <canvas  id="myChart">

            </canvas>
        </div>
        
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Users", "Classes"],
          datasets: [{
            label: 'Users/Classes',
            data: [<?php echo count($users) ?>, <?php echo count($classes) ?>],
            borderWidth: 1,
            backgroundColor: ['#5FC7AE', '#F2F1F1']
          }]
        },
        options: {
        maintainAspectRatio:false,
          scales: {
            xAxes: [],
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
      
    </script>




    
@endsection