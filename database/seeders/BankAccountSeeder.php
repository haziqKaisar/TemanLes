<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            ['bank_name' => 'BCA', 'account_number' => '1234567890', 'account_holder' => 'PT Guru Les Private Indonesia'],
            ['bank_name' => 'BNI', 'account_number' => '0987654321', 'account_holder' => 'PT Guru Les Private Indonesia'],
            ['bank_name' => 'Mandiri', 'account_number' => '1122334455', 'account_holder' => 'PT Guru Les Private Indonesia'],
        ];

        foreach ($accounts as $acc) {
            BankAccount::firstOrCreate(
                ['account_number' => $acc['account_number']],
                $acc + ['is_active' => true]
            );
        }
    }
}
