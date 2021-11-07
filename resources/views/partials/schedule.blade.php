
<style>
    td{
        height: 128px;
        padding: 0;
    }
    .purple{
        background-color: #B2A1C7;
        padding: 35px 0px 28px 0;
    }
    .olive{
        background-color: #C2D69B;
        padding: 35px 0px 28px 0;
    }
    .blue{
        background-color: #99CCFF;
        padding: 35px 0px 28px 0;
    }
    .pink{
        background-color: #FF91B8;
        padding: 35px 0px 28px 0;
    }
</style>

<section class="schedule-area pt-85 pb-90 text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title">
                    <h2> 
                        {!! $titres[3]->titre !!} 
                    </h2>
                    <p>{{ $titres[3]->description }} </p>
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-xs-12">                             
                <div class="scehedule-table table-responsive text-center">
                    <div> @php
                        $now = \Carbon\Carbon::now();
                        $weekStartDate ="";
                        
                        if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class'  || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                            $weekStartDate = $now->startOfWeek();
                            
                        }else{
                            
                        $ajout = URL::full()[strlen(URL::full())-1] -1;
                        $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                        
                        }
                        $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                        $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                        $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                        $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                        $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                        $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                        $weekStartDate = $weekStartDate->format("Y-m-d");
                        
                        
                       
                        
                       
                        @endphp
                        <h1>Semaine du {{ $weekStartDate }}</h1>
                        {{ $schedules->links('vendor.pagination.custom') }} 
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>monday</th>
                                <th>tuesday</th>
                                <th>wednesday</th>
                                <th>thursday</th>
                                <th>friday</th>
                                <th>saturday</th>
                                <th>sunday</th>
                            </tr>
                        </thead>
                        <tbody class="pt-30">
                            
                            <tr>
                                
                                <td class="time">
                                    <p>8:00 AM</p>
                                     </td>
                                       
                            
                            <td >
                                
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class'  || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();
                                    
                                }else{
                                    
                                $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $weekStartDate->format("Y-m-d");
                                
                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                               
                                ;
                               
                                @endphp
                                
                                @if ($dateDébut == $weekStartDate && $heureDébut == '08') 
                                <div class="purple">
                                   
                                    <h4> <a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                               
                                @endif
                                @endforeach
                            </td>
                             
                            
                            <td >
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    
                                $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                @if ($dateDébut == $tuesday && $heureDébut == '08')
                                <div class="purple">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                               
                                @endif
                                @endforeach
                            </td>
                           
                           
                            <td >
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                 @if ($dateDébut == $wednesday && $heureDébut == '08')
                                 <div class="purple">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                                

                                @endif
                                @endforeach
                            </td>
                            
                            
                            <td >
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                @if ($dateDébut == $thursday && $heureDébut == '08')
                                <div class="purple">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                               
                                @endif  
                                @endforeach
                            </td>
                           
                            
                           
                            <td >
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){
                                    
                                    $weekStartDate = $now->startOfWeek();
                                   
                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                
                                @if ($dateDébut == $friday && $heureDébut == '08')
                                
                                <div class="purple">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                                
                                @endif
                                @endforeach
                            </td>
                            

                            
                            <td >
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                @if ($dateDébut == $saturday && $heureDébut == '08')
                                <div class="purple">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                                
                                @endif
                                @endforeach
                            </td>
                           
                           
                            <td >
                                @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                @if ($dateDébut == $sunday && $heureDébut == '08')
                                <div class="purple">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                </div>
                                
                                @endif
                                @endforeach
                            </td>
                          
                        
                            </tr>
                            <tr>
                                <td class="time">
                                    <p>12:00 AM</p>
                                </td>
                                
                              
                                <td >
                                    
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $weekStartDate && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-10.00Am</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                               
                               
                                <td >
                                   
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $tuesday && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-15.00Am</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach
                                </td>
                               
                                
                                <td >
                                    
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $wednesday && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-15.00Am</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                               
                               
                                <td >
                                   
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $thursday && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-15.00Am</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                
                              
                                <td >
                                    
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $friday && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-15.00Am</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                 
                                
                                <td >
                                    
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $saturday && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-15.00Am</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach
                                </td>
                               
                                
                                <td >
                                    
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("h");
                                
                                @endphp
                                    @if ($dateDébut == $sunday && $heureDébut == '12')
                                    <div class="olive">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-15.00Pm</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach
                                </td>
                                
                                 
                            </tr>
                            <tr>
                                <td class="time">
                                    <p>3:00 PM</p>
                                </td>
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){
                                    
                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $weekStartDate && $heureDébut == '15')
                                    <div class="blue">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-18.00Pm</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach
                                </td>
                                 
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $tuesday && $heureDébut == '15')
                                    <div class="blue">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00P-18.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $wednesday && $heureDébut == '15')
                                    <div class="blue">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-18.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach

                                </td>
                               
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $thursday && $heureDébut == '15')
                                    <div class="blue">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-18.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                 
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $friday && $heureDébut == '15')
                                    <div class="blue">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-18.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $saturday && $heureDébut == '15')
                                    <div class="blue">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-18.00Pm</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach
                                </td>
                                 
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $sunday && $heureDébut == '15')
                                    <div class="blue">
                                    <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-18.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="time">
                                    <p>6:00 PM</p>
                                </td>
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $weekStartDate && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach
                                </td>
                               
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $tuesday && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                    <p>{{ $item->trainer->nom }}</p>
                                    <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                
                               
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $wednesday && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                
                               
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $thursday && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                 
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $friday && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                   
                                    @endif
                                    @endforeach

                                </td>
                                 
                                
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $saturday && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                                 
                               
                                <td >
                                    @foreach ($classes as $item)
                                    @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::full() == "http://127.0.0.1:8000" || URL::full()=='http://127.0.0.1:8000/?page=1' || URL::full() =='http://127.0.0.1:8000/class' || URL::full()=="http://127.0.0.1:8000/class?page=1" ){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek($ajout);
                                }
                                $tuesday = $weekStartDate->copy()->addDay()->format("Y-m-d");
                                $wednesday = $weekStartDate->copy()->addDay(2)->format("Y-m-d");
                                $thursday = $weekStartDate->copy()->addDay(3)->format("Y-m-d");
                                $friday = $weekStartDate->copy()->addDay(4)->format("Y-m-d");
                                $saturday = $weekStartDate->copy()->addDay(5)->format("Y-m-d");
                                $sunday = $weekStartDate->copy()->addDay(6)->format("Y-m-d");
                                $weekStartDate = $now->startOfWeek()->format("Y-m-d");

                                $dateDébut = $item->heureDébut->format("Y-m-d");

                                $heureDébut = $item->heureDébut->format("H");
                                
                                @endphp
                                    @if ($dateDébut == $sunday && $heureDébut == '18')
                                    <div class="pink">
                                        <h4><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h4>
                                        <p>{{ $item->trainer->nom }}</p>
                                        <p>{{ $heureDébut }}.00Am-20.00Pm</p>
                                    </div>
                                    
                                    @endif
                                    @endforeach
                                </td>
                               
                            </tr>
                             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>