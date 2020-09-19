<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class ReportPDF extends Controller
{
    //
    
      public function makepdf() {
        
        
        $data = [
            
            //GENERAL INFORMATION
            'COMPANYNO'=>'112-666-SAYA',
            'COMPANYNAME'=>'COMPANY SAYA Sdn Bhd',
            'CURRENTYEAR'=>2018,
            'LASTYEAR'=>2017,
            'CURRENCY'=>'RM',
            
            // PAGE 1 - CURRENT ASSETS
            'CA_trade'=>42301,
            'CA_cash'=>2,
            'CA_trade_lastyear'=>42301,
            'CA_cash_lastyear'=>2,   
            
            // PAGE 1 - EQ
            'EQ_Share'=>45003,
            'EQ_Share_lastyear'=>45003,
            'EQ_Acc_losses'=>13201,
            'EQ_Acc_losses_lastyear'=>11586,
            // PAGE 1 - CL
            'CL_Trade' => 9360,     
            'CL_Trade_lastyear' => 8110,
            'CL_Provision' => 1141,     
            'CL_Provision_lastyear' => 776,
            
            
            //PAGE 2 STATEMENT OF COMPREHENSIVE INCOME
            'Revenue' => 0,     
            'CostSale' => 0,
            //'GrossProfit' => 0,
            'AdminExpense' => 1250,
            //'LossOperation' => 0,
            'FinanceCost' => 0, 
            'LossBTax' => 0,
            'TaxEx' => 365, 
            //'LossATax' => 0, 
            'OtherCompIncome' => 0, 
            //'CompIncome' => 0, 
            
            'Revenue_lastyear' => 0,     
            'CostSale_lastyear' => 0,
            //'GrossProfit' => 0,
            'AdminExpense_lastyear' => 1000,
            //'LossOperation' => 0,
            'FinanceCost_lastyear' => 0, 
            'LossBTax_lastyear' => 0,
            'TaxEx_lastyear' => 388, 
            //'LossATax' => 0, 
            'OtherCompIncome_lastyear' => 0, 
            //'CompIncome' => 0, 
            
  
            
            //PAGE 3 STATEMENT OF CASH FLOW 
            //
            'OwingDirector' => 0, 
            'OwingDirector_lastyear' => 0,
            'IncreaseTrade' => 1250, 
            'IncreaseTrade_lastyear' => 1000,
         
            // LODGED BY INFO
            'LODGEDBY'=>'Shamsul Khizam',
            
            
        ];
        
        $pdf = PDF::loadView('reports.accreport', $data);
        return $pdf->download('accreport.pdf');
        
    }
}
