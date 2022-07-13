<?php

namespace App\Imports;

use Illuminate\Support\Facades\Auth;

use App\Models\Contribution;
use App\Models\Payment;
use App\Models\Saving;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContributionsImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        echo '<br />'.$row['user_code'];
        $user = User::where('unique_id', '=', $row['user_code'])->firstOrFail();
        $saving = Saving::where('user_id', '=', $user->id)->where('name', '=', $row['contribution_name'])->firstOrFail();
        $payment = Payment::create([
            'user_id' => $user->id,
            'ref_id' => 1,
            'payment_type' => 'Contribution payment', 
            'date' => $row['payment_date'],
            'amount' => $row['amount'],
            'bank_id' => $row['bank_id'],
            'admin_id' => $row['admin_id'],
            'status' => 2,
            ]);
        
        $saving->unconfirmed = $saving->unconfirmed + $row['amount'];
        echo $saving->unconfirmed;
        $saving->save();

        $contribution = Contribution::create([
            'user_id' => $user->id,
            'saving_id' => $saving->id,
            'payment_channel' => 'Bank payment', 
            'trans_type' => 1,
            'payment_date' => $row['payment_date'],
            'amount' => $row['amount'],
            'bank_id' => $row['bank_id'],
            'admin_id' => $row['admin_id'],
            'status' => 2,
            'logged_by' => 1,
            'logged_date' => date('Y-m-d H:i:s'),
            'description' => '',
            ]);
        
        $payment->ref_id = $contribution->id;
        echo $contribution->id;
        $payment->save();

        return $payment;
    }
}
