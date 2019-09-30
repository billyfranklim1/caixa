<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class FluxoCaixa extends Authenticatable
{
    protected $table = 'fluxo_caixa';
    protected $primaryKey = "id_fluxo_caixa";
    public $timestamps = false;
}
