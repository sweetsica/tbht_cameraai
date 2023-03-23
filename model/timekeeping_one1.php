<?php
                        // include "../config/sql.php";
                        // include "../config/function.php";
                        // $x=include 'api/person/getCheckinByPlaceIdInDay.php';
                        $d=0;
                        $v=0;
                        $t=0;
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
                            $di_ve=(date('H:i:s', $max / 1000)>'17:00:00')?"e91e63":"8bc34a";
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
                        echo $dt;
                        ?>