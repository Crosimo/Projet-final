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
                    <div>
                        {{ $schedules[0]->DateDébut }}
                        {{ $schedules->links() }} 
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
                                       
                            @foreach ($classes as $item)
                                @php
                                $now = \Carbon\Carbon::now();
                                $weekStartDate ="";
                                
                                if(URL::current() == "http://127.0.0.1:8000" || URL::current()=='http://127.0.0.1:8000/?page=2'){

                                    $weekStartDate = $now->startOfWeek();

                                }else{
                                    $ajout = URL::full()[strlen(URL::full())-1] -1;
                                $weekStartDate = $now->startOfWeek()->addWeek(1);
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
                            @endforeach       
                            {{-- @foreach ($week3 as $item)
                            @php
                            $d = new DateTime($item->date);
                            $d = $d->format('l');
                            
                            @endphp 
                            @if ($d == 'Monday' && $item->heureDébut == 8)
                            <td class="purple">
                                <h4>yoga for climbers</h4>
                                <p>Sathi Bhuiyan</p>
                                <p>8.00 Am-10.00Am</p>
                            </td>
                            @else
                                <td></td>
                            @endif  
                            
                            
                            @endforeach   --}}
                                
                                
                                <td></td>
                                <td></td>
                                <td class="purple">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td class="purple">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="time">
                                    <p>12:00 AM</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="olive">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td class="olive">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="time">
                                    <p>3:00 PM</p>
                                </td>
                                <td></td>
                                <td class="blue">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="blue">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td class="blue">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="time">
                                    <p>6:00 PM</p>
                                </td>
                                <td class="pink">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="pink">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                                <td class="pink">
                                    <h4>yoga for climbers</h4>
                                    <p>Sathi Bhuiyan</p>
                                    <p>8.00 Am-10.00Am</p>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>