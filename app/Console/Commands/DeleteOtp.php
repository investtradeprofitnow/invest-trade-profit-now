<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use \DateTime;

use App\Models\Otp;
use App\Models\ResetPassword;

class DeleteOtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteOtp:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a cron job to delete all OTPs before 10 mins';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("OTP Delete Scheduler is working fine");

        $now = new DateTime();
        
        //Registration Verification OTPs
        $verifyOTP = OTP::all();
        foreach($verifyOTP as $otp){
            $diff = $now->diff($otp->created_at);
            $minutes = $diff->h * 60;
            $minutes += $diff->i;
            if($minutes>10){
                OTP::findOrFail($otp->otp_id)->delete();
            }
        }
        \Log::info("Registration Verification OTPs");

        //Forgot Password OTPs delete
        $resetOtp = ResetPassword::all();
        foreach($resetOtp as $otp){
            $diff = $now->diff($otp->created_at);
            $minutes = $diff->h * 60;
            $minutes += $diff->i;
            if($minutes>10){
                ResetPassword::findOrFail($otp->reset_password_id)->delete();
            }
        }
        \Log::info("Reset Password OTPs");
    }
}
