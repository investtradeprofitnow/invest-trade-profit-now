<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Otp;
use App\Models\ResetPassword;

class DeleteOtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:otp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete OTPs before 10 minutes';

    /**
     * Execute the console command.
     *
     * @return int
     */

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        \Log::info("Scheduler is working fine!");
        
        $verifyOTP = Otp::all();
        $resetOTP = ResetPassword::all();
        $now = new DateTime();

        // For Registration 
        foreach($verifyOTP as $otp){
            $created = new DateTime($otp->created_at);
            $diff = $now->diff($created);
            $minutes = $diff->h * 60 + $diff->i;
            echo $minutes;
            if($minutes>10){
                Otp::findOrFail($otp->id)->delete();
            }
        }
        \Log::info("Registration OTPs delete");

        // For Reset
        foreach($reset as $otp){
            $created = new DateTime($otp->created_at);
            $diff = $now->diff($created);
            $minutes = $diff->h * 60 + $diff->i;
            echo $minutes;
            if($minutes>10){
                ResetPassword::findOrFail($otp->id)->delete();
            }
        }
        \Log::info("Reset Password OTPs delete");        
    }
}
