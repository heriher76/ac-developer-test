<?php

namespace App;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\TenantPivot;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public function users()
    {
        return $this->belongsToMany(CentralUser::class, 'tenant_users', 'tenant_id', 'subdomain_user_id', 'id', 'subdomain')->using(TenantPivot::class);
    }
}