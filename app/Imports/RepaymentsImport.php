<?php

namespace App\Imports;

use Illuminate\Support\Facades\Auth;

use App\Models\Loan;
use App\Models\Payment;
use App\Models\Repayment;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RepaymentsImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        echo '<br />'.$row['user_code'];
        $user = User::where('unique_id', '=', $row['user_code'])->firstOrFail();
        $loan = Loan::where('user_id', '=', $user->id)->where('name', '=', $row['loan_name'])->firstOrFail();
        
        $repayment = Repayment::create([
            'user_id' => $user->id,
            'loan_id' => $loan->id,
            'payment_channel' => 'Bank Deposit', 
            //'trans_type' => 1,
            'payment_date' => $row['payment_date'],
            'amount' => $row['amount'],
            'bank_id' => $row['bank_id'],
            'admin_id' => $row['admin_id'],
            'status' => 2,
            'logged_by' => 1,
            'logged_date' => date('Y-m-d H:i:s'),
            'description' => 'Bulk Upload by Administrator',
            ]);
        
        $payment = Payment::create([
            'user_id' => $user->id,
            'ref_id' => $repayment->id,
            'payment_type' => 'Loan repayment', 
            'date' => $row['payment_date'],
            'amount' => $row['amount'],
            'bank_id' => $row['bank_id'],
            'admin_id' => $row['admin_id'],
            'status' => 2,
            ]);
        
        return $payment;
    }
}
