<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NitiMaster;
use App\Models\NitiadminLogin;

class NitiManagement extends Model
{
    use HasFactory;

    protected $table = 'temple__niti_management';

    protected $fillable = [
        'niti_id',
        'day_id',
        'order_id',
        'sebak_id',
        'date',
        'start_time',
        'pause_time',
        'running_time',
        'resume_time',
        'end_time',
        'duration',
        'start_user_id',
        'end_user_id',
        'start_time_edit_user_id',
        'end_time_edit_user_id',
        'not_done_user_id',
        'niti_not_done_reason',
        'niti_status'
    ];

    public function master()
    {
        return $this->belongsTo(NitiMaster::class, 'niti_id', 'niti_id');
    }

    public function startUser()
    {
        return $this->belongsTo(NitiadminLogin::class, 'start_user_id', 'sebak_id');
    }

    public function endUser()
    {
        return $this->belongsTo(NitiadminLogin::class, 'end_user_id', 'sebak_id');
    }

    public function notDoneUser()
    {
        return $this->belongsTo(NitiadminLogin::class, 'not_done_user_id', 'sebak_id');
    }

    // (Optional) if you also want edit user names:
    public function startTimeEditUser()
    {
        return $this->belongsTo(NitiadminLogin::class, 'start_time_edit_user_id', 'sebak_id');
    }

    public function endTimeEditUser()
    {
        return $this->belongsTo(NitiadminLogin::class, 'end_time_edit_user_id', 'sebak_id');
    }

     public function sebak()
    {
        return $this->belongsTo(NitiadminLogin::class, 'sebak_id', 'sebak_id');
    }
}
