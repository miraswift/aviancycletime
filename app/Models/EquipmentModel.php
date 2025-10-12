<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipmentModel extends Model
{
    protected $table = 'tb_equipment';
    protected $primaryKey = 'id_equipment';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_plant', 'type_equipment', 'no_spk', 'no_batch', 'code_formula', 'name_equipment', 'status_equipment', 'line_equipment', 'date_equipment', 'time_equipment', 'deleted_at'];

    protected $useTimestamps = true;
}
