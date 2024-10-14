<?php

declare(strict_types=1);


use App\Entities\Contract;
use App\Framework\DB;
use PHPUnit\Framework\TestCase;

class ContractTests extends TestCase
{

    public function setUp(): void
    {
      ///  DB::reset();
    }

    public function tearDown(): void
    {

    }

    public function testContract(): void
    {
        $contract = Contract::get(1);
        trace($contract);
        $contract->setVar('id', null);
        //$contract->setId(null);
        $contract->save();
        $this->assertInstanceOf(Contract::class, $contract);

    }

    public function test_update_Contract(): void
    {
        $contract = Contract::get(2);
        trace($contract);
        $contract->setCode('CDSM1000-050-1002222');
        $contract->save();
        $contract = Contract::get(2);
        trace($contract);

        $this->assertInstanceOf(Contract::class, $contract);

    }




}