<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\ZoneCustomer;
use App\Models\Customer;
use App\Models\ZoneService;
use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = new Zone();
        $cs = $zones->getList();
        return view('admin.zone.index', compact('cs'));
    }
    // public function readzone( $id ,Request $request){
    //     $data = Zone::where(array( 'parent_id' => $id))->get(); // Phòng
    //     $zone = Zone::find($request->id); // khu vực
    //     $zonecustomers = DB::table('zone')->join('zone_customer','zone_customer.id_zone','=','zone.id')->join('customer','customer.id','=','zone_customer.id_customer')->get();
    //     // $zonecustomer = ZoneCustomer::join('customer','customer.id','=','zone_customer.id_customer')
    //     // ->select('customer.name as name_customer','zone_customer.id_zone as id_zone','zone_customer.check_in as check_in','zone_customer.check_out as check_out')
    //     // ->get();
    //     dd($zonecustomers);
    // }
    function readzone($id, Request $request)
    {
        $data = Zone::where('parent_id', '=', $request->id)->get();
        $zone = Zone::find($request->id);
        $zonecustomer = ZoneCustomer::join('customer', 'customer.id', '=', 'zone_customer.id_customer')
            ->select('customer.name as name_customer', 'zone_customer.id_zone as id_zone', 'zone_customer.check_in as check_in', 'zone_customer.check_out as check_out')
            ->get();
        // $datas = ZoneService::groupBy('id_zone')->where('status', '=', 0)->get();
        $datas = DB::table('zone_service')
           ->select('id_zone')
           ->where('status', '=', 0)
           ->groupBy('id_zone')
           ->get();

        $serviceroom = array();
        foreach ($datas as $d) {
            $count = ZoneService::where('id_zone', '=', $d->id_zone)->where('status', '=', '0')->count();
            $zoneservice[$d->id_zone] = $count;
        }
        $arrzonecustomer = [];
        foreach ($zonecustomer as $zc) {
            $arrzonecustomer[$zc->id_zone]['name'] = $zc->name_customer;
            $arrzonecustomer[$zc->id_zone]['check_in'] = $zc->check_in;
            $arrzonecustomer[$zc->id_zone]['check_out'] = $zc->check_out;
        }
        $html = '<div class="col-sm-12"> <h4> ' . $zone->name . ' </h4></div>';
        foreach ($data as $d) {
            if (isset($arrzonecustomer[$d->id])) {
                if (isset($zoneservice[$d->id])) {
                    $service = $zoneservice[$d->id];
                } else {
                    $service = 0;
                }
                $html .= '<div class="col-sm-3">
                      <section class="panel">
                          <div class="weather-bg">
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-5">
                                         <i class="bi bi-house"></i>
                                         ' . $d->name . '
                                      </div>
                                      <div class="col-7 info">
                                      <p><i class="icon-user"></i> :' . $arrzonecustomer[$d->id]['name'] . '</p>
                                      <p><i class="icon-signin"></i> :' . $arrzonecustomer[$d->id]['check_in'] . ' </p>
                                      <p><i class="icon-signout"></i> :' . $arrzonecustomer[$d->id]['check_out'] . '   </p>
                                      </div>
                                  </div>
                              </div>
                              <div class="pannel-footer">
                                 <div class="row">
                                     <div class="col-4">
                                     <a href="javasricpt:;" class="checkrequest" data-id="' . $d->id . '" data-toggle="modal" data-target="#myModal">  Request </a> (' . $service . ') 
                                     </div>
                                     <div class="col-4">
                                     <a href="javasricpt:;" class="checkbill" data-id="' . $d->id . '" data-toggle="modal" data-target="#myModal"> Bill </a>
                                     </div>
                                     <div class="col-4">
                                     <a href="javasricpt:;" class="checkout" data-id="' . $d->id . '">  Check Out </a> 
                                     </div>
                                 </div>
                              </div>
                          </div>
                      </section>
                  </div>
                  ';
            } else {
                $html .= ' <div class="col-sm-3">
                        <section class="panel">
                            <div class="weather-bg">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-5">
                                          <i class="icon-home"></i>
                                           ' . $d->name . '
                                        </div>
                                       <div class="col-xs-7 info">
                                        <br><br>
                                            <a style="color:white;font-weight:bold" class="getroom" data-name=' . $d->name . ' href="#">Check Room</a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <footer style="padding: 15px" class="weather-category">
                                <ul>
                                    
                                </ul>
                            </footer>
                        </section>
                      </div>';
            }
        }
        echo json_encode($html);
    }
}
