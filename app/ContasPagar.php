<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class ContasPagar extends Authenticatable
{
    protected $table = 'contas_pagar';
    protected $primaryKey = "id_contas_pagar";
    public $timestamps = false;
}
