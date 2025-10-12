<?php

namespace App\Controllers;

use App\Models\PlantModel;
use App\Models\EquipmentModel;

class Equipment extends BaseController
{
    protected $plantModel;
    protected $equipmentModel;

    public function __construct()
    {
        $this->plantModel = new PlantModel();
        $this->equipmentModel = new EquipmentModel();
    }

    public function create()
    {
        $vars = $this->request->getVar();

        $code_plant = $vars['code_plant'];
        $type_equipment = $vars['type_equipment'];
        $no_spk = $vars['no_spk'];
        $no_batch = $vars['no_batch'];
        $code_formula = $vars['code_formula'];
        $name_equipment = $vars['name_equipment'];
        $status_equipment = $vars['status_equipment'];
        $line_equipment = $vars['line_equipment'];
        // $target = $vars['target'];
        // $actual = $vars['actual'];
        $date_equipment = $vars['date_equipment'];
        $time_equipment = $vars['time_equipment'];

        $plant = $this->plantModel->where('code_plant', $code_plant)->first();

        if ($plant == null) {
            $result = [
                'code' => 400,
                'status' => 'failed',
                'msg' => "Failed, plant not found",
            ];

            return $this->response->setStatusCode(400)->setJSON($result);
        } else {
            $checkEquipment = $this->equipmentModel->where('no_batch', $no_batch)->where('name_equipment', $name_equipment)->where('status_equipment', $status_equipment)->where('line_equipment', $line_equipment)->first();

            if ($checkEquipment) {
                $result = [
                    'code' => 400,
                    'status' => 'failed',
                    'msg' => "Equipment already exist",
                ];

                return $this->response->setStatusCode(400)->setJSON($result);
            } else {
                $equipmentData = [
                    'id_plant' => $plant['id_plant'],
                    'type_equipment' => $type_equipment,
                    'no_spk' => $no_spk,
                    'no_batch' => $no_batch,
                    'code_formula' => $code_formula,
                    'name_equipment' => $name_equipment,
                    'status_equipment' => $status_equipment,
                    'line_equipment' => $line_equipment,
                    'date_equipment' => date('Y-m-d', strtotime($date_equipment)),
                    'time_equipment' => date('H:i:s', strtotime($time_equipment)),
                ];

                $save = $this->equipmentModel->save($equipmentData);

                if (!$save) {
                    $result = [
                        'code' => 400,
                        'status' => 'failed',
                        'msg' => "Equipment not saved",
                        'detail' => $this->equipmentModel->errors(),
                    ];

                    return $this->response->setStatusCode(400)->setJSON($result);
                } else {
                    $result = [
                        'code' => 200,
                        'status' => 'ok',
                        'msg' => "Equipment saved succesfully",
                    ];

                    return $this->response->setStatusCode(200)->setJSON($result);
                }
            }
        }
    }
}
