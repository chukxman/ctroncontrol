<?php

namespace App\Http\Controllers;

use App\Mail\AppEmail;
use App\Models\Device;
use App\Models\User;
use App\Models\Eventlog;
use Carbon\Carbon;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\JsonDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use League\Csv\Writer;
use SplTempFileObject;
use App\Http\Controllers\DevicesController;

class DeviceConnectionController extends Controller
{
    //All php
    public function CallSchedule($id, $channel)
    {
        $device = Device::Where('device_serialnumber', $id)->first()->makeHidden([
            'id',
            'device_name',
            'device_serialnumber',
            'organization_name',
            'location',
            'user_id',
            'engineer_id',
            'devicekey',
            'channel1',
            'channel2',
            'channel3',
            'channel4',
            'temperature',
            'deleted_at',
            'created_at',
            'updated_at',
            'timezone',
            'channel1controlsource',
            'channel2controlsource',
            'channel3controlsource',
            'channel4controlsource',
            'channel1state',
            'channel2state',
            'channel3state',
            'channel4state',
            'newRequestC1',
            'newRequestC2',
            'newRequestC3',
            'newRequestC4',
            'newDetailsUpdate',
            'c1counter',
            'c2counter',
            'c3counter',
            'c4counter',
            'lastchannel1state',
            'lastchannel2state',
            'lastchannel3state',
            'lastchannel4state',
            'lastchannel1schedule',
            'lastchannel2schedule',
            'lastchannel3schedule',
            'lastchannel4schedule',
            'lastseen',
            'c1Mon_On',
            'c1Mon_Off',
            'c1Tue_On',
            'c1Tue_Off',
            'c1Wed_On',
            'c1Wed_Off',
            'c1Thur_On',
            'c1Thur_Off',
            'c1Fri_On',
            'c1Fri_Off',
            'c1Sat_On',
            'c1Sat_Off',
            'c1Sun_On',
            'c1Sun_Off',
            'c2Mon_On',
            'c2Mon_Off',
            'c2Tue_On',
            'c2Tue_Off',
            'c2Wed_On',
            'c2Wed_Off',
            'c2Thur_On',
            'c2Thur_Off',
            'c2Fri_On',
            'c2Fri_Off',
            'c2Sat_On',
            'c2Sat_Off',
            'c2Sun_On',
            'c2Sun_Off',
            'c3Mon_On',
            'c3Mon_Off',
            'c3Tue_On',
            'c3Tue_Off',
            'c3Wed_On',
            'c3Wed_Off',
            'c3Thur_On',
            'c3Thur_Off',
            'c3Fri_On',
            'c3Fri_Off',
            'c3Sat_On',
            'c3Sat_Off',
            'c3Sun_On',
            'c3Sun_Off',
            'c4Mon_On',
            'c4Mon_Off',
            'c4Tue_On',
            'c4Tue_Off',
            'c4Wed_On',
            'c4Wed_Off',
            'c4Thur_On',
            'c4Thur_Off',
            'c4Fri_On',
            'c4Fri_Off',
            'c4Sat_On',
            'c4Sat_Off',
            'c4Sun_On',
            'c4Sun_Off'
        ]);

        if ($channel == 1) {
            return $device->makeVisible(
                'c1Mon_On',
                'c1Mon_Off',
                'c1Tue_On',
                'c1Tue_Off',
                'c1Wed_On',
                'c1Wed_Off',
                'c1Thur_On',
                'c1Thur_Off',
                'c1Fri_On',
                'c1Fri_Off',
                'c1Sat_On',
                'c1Sat_Off',
                'c1Sun_On',
                'c1Sun_Off',
                'newRequestC1'
            )->toJson();
        } elseif ($channel == 2) {
            return $device->makeVisible(
                'c2Mon_On',
                'c2Mon_Off',
                'c2Tue_On',
                'c2Tue_Off',
                'c2Wed_On',
                'c2Wed_Off',
                'c2Thur_On',
                'c2Thur_Off',
                'c2Fri_On',
                'c2Fri_Off',
                'c2Sat_On',
                'c2Sat_Off',
                'c2Sun_On',
                'c2Sun_Off',
                'newRequestC2'
            )->toJson();
        } elseif ($channel == 3) {
            return $device->makeVisible(
                'c3Mon_On',
                'c3Mon_Off',
                'c3Tue_On',
                'c3Tue_Off',
                'c3Wed_On',
                'c3Wed_Off',
                'c3Thur_On',
                'c3Thur_Off',
                'c3Fri_On',
                'c3Fri_Off',
                'c3Sat_On',
                'c3Sat_Off',
                'c3Sun_On',
                'c3Sun_Off',
                'newRequestC3'
            )->toJson();
        } elseif ($channel == 4) {
            return $device->makeVisible(
                'c4Mon_On',
                'c4Mon_Off',
                'c4Tue_On',
                'c4Tue_Off',
                'c4Wed_On',
                'c4Wed_Off',
                'c4Thur_On',
                'c4Thur_Off',
                'c4Fri_On',
                'c4Fri_Off',
                'c4Sat_On',
                'c4Sat_Off',
                'c4Sun_On',
                'c4Sun_Off',
                'newRequestC4'
            )->toJson();
        }
    }

    public function CallState($id, $temperature)
    {

        $device = Device::Where('device_serialnumber', $id)->first()->makeHidden([
            'id',
            'device_name',
            'device_serialnumber',
            'organization_name',
            'location',
            'user_id',
            'engineer_id',
            'devicekey',
            'channel1',
            'channel2',
            'channel3',
            'channel4',
            'temperature',
            'deleted_at',
            'created_at',
            'updated_at',
            'timezone',
            'channel1controlsource',
            'channel2controlsource',
            'channel3controlsource',
            'channel4controlsource',
            'channel1state',
            'channel2state',
            'channel3state',
            'channel4state',
            'newRequestC1',
            'newRequestC2',
            'newRequestC3',
            'newRequestC4',
            'newDetailsUpdate',
            'c1counter',
            'c2counter',
            'c3counter',
            'c4counter',
            'lastchannel1state',
            'lastchannel2state',
            'lastchannel3state',
            'lastchannel4state',
            'lastchannel1schedule',
            'lastchannel2schedule',
            'lastchannel3schedule',
            'lastchannel4schedule',
            'lastseen',
            'c1Mon_On',
            'c1Mon_Off',
            'c1Tue_On',
            'c1Tue_Off',
            'c1Wed_On',
            'c1Wed_Off',
            'c1Thur_On',
            'c1Thur_Off',
            'c1Fri_On',
            'c1Fri_Off',
            'c1Sat_On',
            'c1Sat_Off',
            'c1Sun_On',
            'c1Sun_Off',
            'c2Mon_On',
            'c2Mon_Off',
            'c2Tue_On',
            'c2Tue_Off',
            'c2Wed_On',
            'c2Wed_Off',
            'c2Thur_On',
            'c2Thur_Off',
            'c2Fri_On',
            'c2Fri_Off',
            'c2Sat_On',
            'c2Sat_Off',
            'c2Sun_On',
            'c2Sun_Off',
            'c3Mon_On',
            'c3Mon_Off',
            'c3Tue_On',
            'c3Tue_Off',
            'c3Wed_On',
            'c3Wed_Off',
            'c3Thur_On',
            'c3Thur_Off',
            'c3Fri_On',
            'c3Fri_Off',
            'c3Sat_On',
            'c3Sat_Off',
            'c3Sun_On',
            'c3Sun_Off',
            'c4Mon_On',
            'c4Mon_Off',
            'c4Tue_On',
            'c4Tue_Off',
            'c4Wed_On',
            'c4Wed_Off',
            'c4Thur_On',
            'c4Thur_Off',
            'c4Fri_On',
            'c4Fri_Off',
            'c4Sat_On',
            'c4Sat_Off',
            'c4Sun_On',
            'c4Sun_Off'
        ]);
        $activate = $device->activatedevice;
        if ($temperature === "200" && $activate !== 1) {

            $device->activatedevice = 0;
            $device->save();
            echo "deactivatedevice";
        } else {
            $device->temperature = ($temperature !== 200) ? $temperature : $device->temperature;
            $device->lastseen = Carbon::now();
            $device->save();

            if ($activate > 0) {
                $device->activatedevice = 2;
                $device->save();
                if ($device->c1counter != "00:00:00") {
                    return $device->makeVisible(
                        'channel1state',
                        'channel1controlsource',
                        'channel2state',
                        'channel2controlsource',
                        'channel3state',
                        'channel3controlsource',
                        'channel4state',
                        'channel4controlsource',
                        'newUpdateDetails',
                        'newRequestC1',
                        'newRequestC2',
                        'newRequestC3',
                        'newRequestC4',
                        'c1counter',
                        'c2counter',
                        'c3counter',
                        'c4counter'
                    )->toJson();
                } elseif ($device->c2counter != "00:00:00") {
                    return $device->makeVisible(
                        'channel1state',
                        'channel1controlsource',
                        'channel2state',
                        'channel2controlsource',
                        'channel3state',
                        'channel3controlsource',
                        'channel4state',
                        'channel4controlsource',
                        'newUpdateDetails',
                        'newRequestC1',
                        'newRequestC2',
                        'newRequestC3',
                        'newRequestC4',
                        'c1counter',
                        'c2counter',
                        'c3counter',
                        'c4counter'
                    )->toJson();
                } elseif ($device->c3counter != "00:00:00") {
                    return $device->makeVisible(
                        'channel1state',
                        'channel1controlsource',
                        'channel2state',
                        'channel2controlsource',
                        'channel3state',
                        'channel3controlsource',
                        'channel4state',
                        'channel4controlsource',
                        'newUpdateDetails',
                        'newRequestC1',
                        'newRequestC2',
                        'newRequestC3',
                        'newRequestC4',
                        'c1counter',
                        'c2counter',
                        'c3counter',
                        'c4counter'
                    )->toJson();
                } elseif ($device->c4counter != "00:00:00") {
                    return $device->makeVisible(
                        'channel1state',
                        'channel1controlsource',
                        'channel2state',
                        'channel2controlsource',
                        'channel3state',
                        'channel3controlsource',
                        'channel4state',
                        'channel4controlsource',
                        'newUpdateDetails',
                        'newRequestC1',
                        'newRequestC2',
                        'newRequestC3',
                        'newRequestC4',
                        'c1counter',
                        'c2counter',
                        'c3counter',
                        'c4counter'
                    )->toJson();
                } else {
                    return $device->makeVisible(
                        'channel1state',
                        'channel1controlsource',
                        'channel2state',
                        'channel2controlsource',
                        'channel3state',
                        'channel3controlsource',
                        'channel4state',
                        'channel4controlsource',
                        'newUpdateDetails',
                        'newRequestC1',
                        'newRequestC2',
                        'newRequestC3',
                        'newRequestC4'
                    )->toJson();
                }
            } else {
                echo "Null";
            }
        }
    }

    public function PostDeviceState($id, $channel, $channelstate, $controlsource, Eventlog $eventlog)
    {
        $device = Device::Where('device_serialnumber', $id)->first();

        if ($channel == 1) {
            $device->channel1state = $channelstate;
            $device->channel1controlsource = $controlsource;
            $device->newRequestC1 = 0;
            $device->lastseen = Carbon::now();
            $device->lastchannel1state = Carbon::now();
            $device->c1counter = '00:00:00';
            $device->activatedevice = 1;
            $device->save();
        } elseif ($channel == 2) {
            $device->channel2state = $channelstate;
            $device->channel2controlsource = $controlsource;
            $device->newRequestC2 = 0;
            $device->lastseen = Carbon::now();
            $device->lastchannel2state = Carbon::now();
            $device->c2counter = '00:00:00';
            $device->activatedevice = 1;
            $device->save();
        } elseif ($channel == 3) {
            $device->channel3state = $channelstate;
            $device->channel3controlsource = $controlsource;
            $device->newRequestC3 = 0;
            $device->lastseen = Carbon::now();
            $device->lastchannel3state = Carbon::now();
            $device->c3counter = '00:00:00';
            $device->activatedevice = 1;

            $device->save();
        } elseif ($channel == 4) {
            $device->channel4state = $channelstate;
            $device->channel4controlsource = $controlsource;
            $device->newRequestC4 = 0;
            $device->lastseen = Carbon::now();
            $device->lastchannel4state = Carbon::now();
            $device->c4counter = '00:00:00';
            $device->activatedevice = 1;

            $device->save();
        }

        //Event Log
        $eventlog->user_id = 0;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = "Device State Changed from device";

        $eventlog->save();

        echo "Post successful";
    }

    public function PostDeviceDetails($id, $organization_name, $device_name, $mac_address, $firmware_version, Eventlog $eventlog)
    {
        $device = Device::Where('device_serialnumber', $id)->first();
        if ($device->mac_address === $mac_address) {
            $user = User::Where('name', $organization_name)->first();
            $device->lastseen = Carbon::now();
            $device->organization_name = $organization_name;
            $device->device_name = $device_name;
            $device->user_id = $user->id;
            $device->firmware_version = $firmware_version;

            $device->save();
        }

        // Event Log
        $eventlog->user_id = 0;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = "Device Details updated from device";

        $eventlog->save();
        

        echo Carbon::now()->addMinutes($device->timezone);
    }

    public function ChangeDeviceDetails($id)
    {
        $device = Device::Where('device_serialnumber', $id)->first();
        $file = File::all()->last();
        $device->newUpdateDetails = 0;
        $device->save();

        return str_replace('\/', '/', json_encode(['device_name' => $device->device_name, 'devicekey' => $device->devicekey, 'poweronstate' => $device->poweronstate, 'manualoverride' => $device->manualoverride, 'OtaUrl' => 'https://ctrontimer.christekenergy.com/DownloadFirmware/' . $file->name, 'FirmwareVersion' => $file->version_number]));
    }

    public function DownloadFirmware($file_name)
    {
        $file_path = storage_path('app/public/' . $file_name);
        return response()->download($file_path);
       
    }

    public function GetSms($id)
    {
        $device = Device::Where('device_serialnumber', $id)->first();
        $sms = $device->sms;
        $device->sms = "";

        $device->save();
        return $sms;

    }

    public function ResetSms($id)
    {
        $device = Device::Where('device_serialnumber', $id)->first();
        $device->sms = null;
        return $device->sms;

    }

    public function PostDeviceUpdate($id, $tamper_mode, $actions, $reporting, $channel, $channelstate, $controlsource, Eventlog $eventlog)
    {
        $device = Device::Where('device_serialnumber', $id)->first();
        $device->tamper_mode = $tamper_mode;
        $device->lastseen = Carbon::now();
        $message = $device->sms;

        if ($id != "") {
            if ($channel == 1) {
                $device->channel1state = $channelstate;
                $device->channel1controlsource = $controlsource;

                $device->save();
            } elseif ($channel == 2) {
                $device->channel2state = $channelstate;
                $device->channel2controlsource = $controlsource;
                if($controlsource == 0 && $actions == 1)
                {
                    $message = "Device Turned Off by schedule";
                }
                elseif($controlsource == 1 && $actions == 1)
                {
                    $message = "Device Turned Off by ".$reporting ;
                }
                elseif($controlsource == 0 && $actions == 2)
                {
                    $message = "Device Turned On by Schedule" ;
                }
                elseif($controlsource == 1 && $actions == 2)
                {
                    $message = "Device Turned On by ".$reporting ;
                }
                $device->save();
            } elseif ($channel == 3) {
                $device->channel3state = $channelstate;
                $device->channel3controlsource = $controlsource;

                $device->save();
            } elseif ($channel == 4) {
                $device->channel4state = $channelstate;
                $device->channel4controlsource = $controlsource;

                $device->save();
            }

            switch ($actions) {

                case '1':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog =  "Device Turned Off";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => ($controlsource == 0 ? "Device Turned Off by Schedule" : "Device Turned Off by ". $reporting)
                    ];

                    break;

                case '2':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog =  "Device Turned On";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => ($controlsource == 0 ? "Device Turned On by Schedule" : "Device Turned On by ". $reporting)
                    ];

                    break;

                case '3':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Schedule changed";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => ($reporting == 0 ? "Schedule changed by Ctron App" : 'Schedule changed by '.$reporting)
                    ];

                    break;

                case '4':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Device tampered";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => 'Device tampared.'
                    ];

                    break;

                case '5':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Tamper cleared";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => ($reporting == 0 ? "Tamper cleared by Ctron App" : 'Tamper cleared by '.$reporting)
                    ];

                    break;

                case '6':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Tamper check changed";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => ($reporting == 0 ? "Tamper check changed by Ctron App" : 'Tamper check changed by '.$reporting)
                    ];

                    break;

                case '7':
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Report number changed";
                    if( $reporting == 0)
                    {
                        $sub_data = "Ctron App";
                    }else{
                        $sub_data = "";
                    }

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => ($reporting == 0 ? "Report number changed Ctron App" : 'Report number changed '.$reporting)
                    ];

                    break;

                case 8:
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Device Time set";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => 'Time set by '.$reporting
                    ];

                    break;

                case 9:
                    // Event Log
                    $eventlog->user_id = (string)$reporting;
                    $eventlog->device_id = $device->id;
                    $eventlog->datalog = "Device pin changed";

                    $eventlog->save();
                    $details = [
                        'title' => 'Report for ' . $device->device_name,
                        'body' => 'Device pin changed by '.$reporting
                    ];

                    break;

                    case 10:
                        // Event Log
                        $eventlog->user_id = (string)$reporting;
                        $eventlog->device_id = $device->id;
                        $eventlog->datalog = "Device Powered On";
    
                        $eventlog->save();
                        $details = [
                            'title' => 'Report for ' . $device->device_name,
                            'body' => 'Device Powered On.'
                        ];
    
                        break;
    

                default:
                    $response = ['error' => 'Invalid action'];
                    break;
            }

            $subject = "Report from Ctrontimer";
            $device->sms = Null;
            Mail::to($device->reportemail)->send(new AppEmail($details, $filePath = null, $subject));
            echo Carbon::now()->addMinutes($device->timezone);
            
        }
        return $response;

    }
}
