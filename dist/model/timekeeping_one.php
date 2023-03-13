<?php
class data_day_one{
                        // include "config/sql.php";
                        // include "config/function.php";
                        public function bang(){
                            $x=include 'api/person/getCheckinByPlaceIdInDay.php';
                            $personNames = array_unique(array_column($x['data'], 'personName'));
                            foreach ($personNames as $personName) {
                                // Lọc các phần tử có personName tương ứng
                                $filteredData = array_filter($x['data'], function ($item) use ($personName) {
                                    return $item['personName'] == $personName;
                                });
                            
                                // Trích xuất các giá trị date, place, deviceID và checkinTime
                                $avatar=array_column($filteredData, 'avatar');
                                $dates = array_column($filteredData, 'date');
                                $places = array_column($filteredData, 'place');
                                $deviceIDs = array_column($filteredData, 'deviceID');
                                $checkinTimes = array_column($filteredData, 'checkinTime');
                                $personID=array_column($filteredData, 'personID');
                                $type=array_column($filteredData, 'type');
                                $vai_tro=($type==0)?"Khách Hàng":"Nhân Viên";
                                // Tìm max và min
                                $max = max($checkinTimes);
                                $min = min($checkinTimes);
                                $di_den=(date('H:i:s', $min / 1000)>'08:00:00')?"e91e63":"8bc34a";
                                $di_ve=(date('H:i:s', $max / 1000)<'17:00:00')?"e91e63":"8bc34a";
                                
                                echo'
                                <tr>
                                    <td class="pr-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input js-check-selected-row"
                                                   id="customCheck1_2">
                                            <label class="custom-control-label"
                                                   for="customCheck1_2"><span class="text-hide">Check</span></label>
                                        </div>
                                    </td>
                                    <td>
    
                                        <div class="media flex-nowrap align-items-center"
                                             style="white-space: nowrap;">
                                            <div class="avatar avatar-32pt mr-8pt">
    
                                                <span class="avatar-title rounded-circle">
                                                    <img src="'.$avatar[0].'" alt="" style="
                                                    width: 20px;
                                                    height: 20px;">
                                                </span>
    
                                            </div>
                                            </div>
                                            
                                            </td>
                                    <td>
                                    <div class="media-body">
                                        <a href="time_one_people.php?id='.$personID[0].'">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$personName.'</strong></p>
                                        </div>
                                        </a>
                                    </div></td>
                                    <td>
                                    <div class="media-body">
                                        <a href="time_one_people.php?id='.$personID[0].'">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$personID[0].'</strong></p>
                                        </div>
                                        </a>
                                    </div></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                               <span class="js-lists-values-employer-name text-70"><p style="
                                               color:#'.$di_den.';">'.date('H:i:s', $min / 1000).'</p></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                               <span class="js-lists-values-employer-name text-70"><p style="
                                               color:#'.$di_ve.';">'.date('H:i:s', $max / 1000).'</p></span>
                                        </div>
                                    </td>
                                   <td>
                                        <div class="d-flex align-items-center">
                                               <span class="js-lists-values-employer-name text-70">'.$places[0].'</span>
                                        </div>
                                    </td>
    
                                    <td>
    
                                        <a href=""
                                           class="chip chip-outline-secondary">'.$vai_tro.'</a>
    
                                    </td>';          
    
                               echo'
                                </tr>
                                ';
                        }
                        }
                        public function diem(){
                        $x=include 'api/person/getCheckinByPlaceIdInDay.php';
                        $d=0;
                        $v=0;
                        $t=0;
                        if($x==null){
                            return "hiện hôm nay không có nhân viên vào đi l";
                        }
                        $personNames = array_unique(array_column($x['data'], 'personName'));
                        foreach ($personNames as $personName) {
                            // Lọc các phần tử có personName tương ứng
                            $filteredData = array_filter($x['data'], function ($item) use ($personName) {
                                return $item['personName'] == $personName;
                            });
                        
                            // Trích xuất các giá trị date, place, deviceID và checkinTime
                            $checkinTimes = array_column($filteredData, 'checkinTime');

                            // Tìm max và min
                            $max = max($checkinTimes);
                            $min = min($checkinTimes);
                            $di_den=(date('H:i:s', $min / 1000)>'08:00:00')?"e91e63":"8bc34a";
                            $di_ve=(date('H:i:s', $max / 1000)<'17:00:00')?"e91e63":"8bc34a";
                            if($di_den=='e91e63'){
                                $d++;
                            }
                            if($di_ve=='e91e63'){
                                $v++;
                            }
                            $t++;
                        }
                        $x=include 'api/person/getTotalPersonByPlaceID.php';
                        $dt=$d*(100/$x);
                        $vt=$v*(100/$x);
                        $tt=$t*(100/$x);
                        $mang_nv=[$dt,$vt,$tt];
                        return $mang_nv;
                        }
                    
                    }
                    ?>