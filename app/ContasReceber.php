<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class ContasReceber extends Authenticatable
{
    protected $table = 'contas_receber';
    protected $primaryKey = "id_contas_receber";
    public $timestamps = false;
}
