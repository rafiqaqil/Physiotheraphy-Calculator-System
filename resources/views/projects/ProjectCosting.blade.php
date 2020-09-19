<html>
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
<table style='font-size:7pt' width="100%">
	<colgroup width="68" span="16"></colgroup>
	<colgroup width="96"></colgroup>
	<colgroup width="98"></colgroup>
	<tbody><tr>
                <td colspan="18" valign="middle" height="20" align="center"> <u><strong>{{$project->COMPANY_INCHARGE}} PROJECT SUMMARY </u></strong></td>
		</tr>
	<tr>
		<td valign="bottom" height="20" align="left"> <br> </td>
		<td colspan="2" valign="middle" align="left"> CUSTOMER </td>
		<td colspan="6" valign="middle" align="left"> :&nbsp;&nbsp;&nbsp;&nbsp;{{$project->CUSTOMER_NAME}} </td>
		
		<td valign="bottom" align="left"> <br> </td>
		<td valign="bottom" align="left"> <br> </td>
	
		
		<td colspan="2" valign="middle" align="left"> PROJECT NO </td>
		<td colspan="6" valign="middle" align="left"> :&nbsp;&nbsp;&nbsp;&nbsp;{{$project->PROJECT_NO}} </td>
		</tr>
	<tr>
		<td valign="bottom" height="20" align="left"> <br> </td>
		<td colspan="2" valign="middle" align="left"> PERSON IN CHARGE </td>
		<td colspan="6" valign="middle" align="left"> :&nbsp;&nbsp;&nbsp;&nbsp;{{$project->PERSON_INCHARGE}} </td>
		
		<td valign="bottom" align="left"> <br> </td>
		<td valign="bottom" align="left"> <br> </td>
		
		<td colspan="2" valign="middle" align="left"> DATE </td>
		<td colspan="6" valign="middle" align="left"> :&nbsp;&nbsp;&nbsp;&nbsp;{{$project->CUSTOMER_NAME}} </td>
		</tr>
	<tr>
		<td valign="bottom" height="20" align="left"> <br> </td>
		<td colspan="2" valign="middle" align="left"> CONTACT NUMBER </td>
		<td colspan="6" valign="middle" align="left"> :&nbsp;&nbsp;&nbsp;&nbsp;{{$project->PERSON_INCHARGE_CONTACT}} </td>
		
		<td valign="bottom" align="left"> <br> </td>
		<td valign="bottom" align="left"> <br> </td>
		
		
		<td colspan="2" valign="middle" align="left"> LO NUMBER </td>
		<td colspan="6" valign="middle" align="left"> :&nbsp;&nbsp;&nbsp;&nbsp;{{$project->LO_NUMBER}} </td>
		</tr>
                
                
        </table>
                <table   style='font-size:7pt' cellspacing="0" border="1" width="100%" id="ProjectDataTable">
	<tr>
		<td   width="1%" rowspan="2" valign="middle" height="40" align="center"> Bil </td>
		<td colspan="2" valign="middle" align="center"> PROJECT </td>
		<td  width="2%"  rowspan="2" valign="middle" align="center"> QTY </td>
		<td colspan="3" valign="middle" align="center"> LO AMOUNT </td>
		<td colspan="2" valign="middle" align="center"> GROSS COST </td>
		<td colspan="4" valign="middle" align="center"> CHARGERS </td>
		<td colspan="3" valign="middle" align="center"> GST </td>
		<td rowspan="2" valign="middle" align="center"> TOTAL COST </td>
		<td rowspan="2" valign="middle" align="center"> NET PROFIT (RM) </td>
	</tr>
	<tr>
		<td width="20%" valign="middle" align="center"> DESCRIPTION </td>
		<td width="10%"valign="middle" align="center"> SUPPLIER </td>
		<td valign="middle" align="center"> UNIT </td>
		<td valign="middle" align="center"> TOTAL </td>
		<td valign="middle" align="center"> GST </td>
		<td valign="middle" align="center"> UNIT </td>
		<td valign="middle" align="center"> TOTAL </td>
		<td width="4%" valign="middle" align="center"> COMM </td>
                <td width="4%" valign="middle" align="center"> TRAINNING </td>
		<td width="4%" valign="middle" align="center"> DELIVERY </td>
		<td  width="4%" valign="middle" align="center"> INT </td>
		<td  width="3%"valign="middle" align="center"> IN </td>
		<td  width="3%" valign="middle" align="center"> OUT </td>
		<td  width="3%" valign="middle" align="center"> RO </td>
		</tr>
	
       @foreach($items as $data)
	<tr>
		<td valign="top" sdval="1" sdnum="1033;" valign="top" height="20" align="center"> {{$loop->iteration }} <br><br> </td>
		<td valign="top" align="left"> {{$data->ITEM_NAME }}<br>{{$data->DESCRIPTION }}<br><br></td>
		<td valign="top" align="left"> {{$data->SUPLIER }}</td>
		<td valign="top" align="center"> {{number_format(($data->QTY), 0, '.', ',') }}<br>UNIT</td>
		<td valign="top" align="right"> {{$data->PRICE_PER_UNIT_MYR }}</td>
		<td valign="top" align="right"> {{$data->TOTAL_PRICE_MYR }}</td>
		<td valign="top" align="right"> {{number_format(($data->TOTAL_PRICE_MYR*0.06), 2, '.', ',') }}</td>
		<td valign="top" align="right"> {{$data->COST_PER_UNIT_MYR }}</td>
		<td valign="top" align="right"> {{$data->TOTAL_COST_MYR }}</td>
		<td valign="top" align="right"> {{$data->CHARGER_COMMISION }}</td>
		<td valign="top" align="right"> {{$data->CHARGER_TRAINING }}</td>
		<td valign="top" align="right"> {{$data->CHARGER_DELIVERY }}</td>
		<td valign="top" align="right"> {{$data->CHARGER_OTHER }}</td>
		<td valign="top" align="right"> {{number_format(($data->TOTAL_COST_MYR*0.06), 2, '.', ',') }}</td>
		<td valign="top" align="right"> {{number_format(($data->TOTAL_PRICE_MYR*0.06  - $data->TOTAL_COST_MYR*0.06), 2, '.', ',') }}</td>
		<td valign="top" align="right"> 0.00</td>
                <td valign="top" align="right" style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;"> </td>
                 <td valign="top" align="right"  style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;"> </td>
		
	</tr>
        @endforeach
     
        
        <tfoot>
            <tr>
                <td valign="center" align="center" colspan="4" rowspan="2">TOTAL </td>
                 <td valign="top" align="right"  >TOTAL </td>
                 <td valign="top" align="right"  id='LO_GRAND_TOTAL' >TOTAL </td>
                 <td valign="top" align="right"  id='LO_GST_GRAND_TOTAL' >TOTAL </td>
                   <td valign="top" align="right"  >TOTAL </td>
                 <td valign="top" align="right"  id='GROSS_COST_GRAND_TOTAL' >TOTAL </td>
                 
                 
                   <td valign="top" align="right"  id='CHARGER_COMM_GRAND_TOTAL' >TOTAL </td>
                   <td valign="top" align="right"  id='CHARGER_TRAIN_GRAND_TOTAL' >TOTAL </td>
                   <td valign="top" align="right"  id='CHARGER_DEL_GRAND_TOTAL' >TOTAL </td>
                   <td valign="top" align="right"  id='CHARGER_INT_GRAND_TOTAL' >TOTAL </td>
                 
                   
                   
        <td valign="top" align="right"  id='GST_IN_GRAND_TOTAL' >TOTAL </td>
                   <td valign="top" align="right"  id='GST_OUT_GRAND_TOTAL' >TOTAL </td>
                   <td valign="top" align="right"  id='GST_RO_GRAND_TOTAL' >TOTAL </td>
                      <td valign="top" align="right" id='TOTAL_COST_FINAL' >TOTAL </td>
                   <td valign="top" align="right"  id='NET_PROFIT_FINAL'>TOTAL </td>
            </tr>
            
            
            <tr>
               
                <td valign="top" align="center" colspan="3" id='LO_ALL'>TOTAL </td>
                <td valign="top" align="center" colspan="2"id='GROSS_ALL'  >TOTAL </td>
                <td valign="top" align="center" colspan="4" id='CHARGERS_ALL' >TOTAL </td>
                <td valign="top" align="center" colspan="3" > </td>
                   <td valign="top" align="center"  > </td>
                      <td valign="top" align="center"  > </td>
                </tr>
        </tfoot>
        
</tbody></table>
 <br>
 
 <br>


<table  style='font-size:6pt'cellspacing="0" border="0"  width='100%'  style='font-size:7pt'>
	<colgroup width="64" span="18"></colgroup>
	<tbody><tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" height="20" align="center">  MARGIN </td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  % </td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" valign="middle" align="center">  RM </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="6" valign="middle" align="center">  CUSTOMER </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" valign="middle" align="center">  SUPPLIER </td>
		<td valign="bottom" align="left">  <br> </td>
		<td colspan="3" valign="bottom" align="left">  PREPARED BY: </td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan="2" rowspan="5" valign="middle" height="101" align="center">  NET MARGIN </td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" rowspan="5" valign="middle" align="center" id="NET_MARGIN">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" rowspan="5" valign="middle" align="center" id='NET_MARGIN_AMOUNT'>  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="4" valign="middle" align="center">  LEADTIME </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  5 WEEKS </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  LEADTIME </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  1 WEEKS </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="4" valign="middle" align="center">  DELIVERY </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  DATE </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  DELIVERY </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  DATE </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="4" valign="middle" align="center">  LO/ACCEPTANCE LETTER </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center"> 	{{$project->DEADLINE_LO_ACCEPTANCE}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  PROJECT SUMMARY </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  {{$project->DEADLINE_PROJECT_SUMMARY}}</td>
		<td valign="bottom" align="left">  <br> </td>
		<td colspan="4" valign="bottom" align="left">  ________________________________ </td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="4" valign="middle" align="center">  LO RECEIVED </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center"> {{$project->DEADLINE_LO_RECIEVED}} </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  PO/DOWNPAYMENT </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center"> {{$project->DEADLINE_DOWNPAYMENT}} </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  NAME </td>
		<td valign="bottom" align="left">  : </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="4" valign="middle" align="center">  LO DUE </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center"> {{$project->DEADLINE_LO_DUE}} </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  COMMITMENT </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" valign="middle" align="center">  	{{$project->DEADLINE_COMMITMENT}}</td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  POSITION </td>
		<td valign="bottom" align="left">  : </td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" valign="middle" height="20" align="center">  FINANCIAL </td>
		<td width="10%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" rowspan="2" valign="middle" align="center"><b><font size="3" face="Times New Roman" color="#000000"  >STATUS </b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="7" valign="middle" align="center">  REMARK </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  DATE </td>
		<td valign="bottom" align="left">  : </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle"  width="1%" height="20" align="center">  BIL </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  Source </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  % </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  Amount(RM) </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  METHOD </td>
		<td style="font-size:10px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="7" rowspan="8" valign="top" align="left">
                    
                    
                    1.{{$project->REMARKS_1}}
                    <br>
                    
                    2.{{$project->REMARKS_2}}
                    <br>
                    
                    3.{{$project->REMARKS_3}}
                    <br>
                
                
                
                </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" height="20" align="center"> 1 </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  CASH </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center"> {{$project->FINANCIAL_OWN}} </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" rowspan="7" valign="middle" align="center"><font size="3" face="Times New Roman" color="#000000">{{$project->PROJECT_STATUS}} </td>
		<td valign="bottom" align="left">  <br> </td>
		<td colspan="3" valign="bottom" align="left">  APPROVED BY: </td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="middle" height="20" align="center"> 2 </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  FACILITY </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  {{$project->FINANCIAL_FACILITY_RATE}} </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center"> {{$project->FINANCIAL_FACILITY}} </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center"> Interest RM {{$project->FINANCIAL_FACILITY*(0+$project->FINANCIAL_FACILITY_RATE/100)}} </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" height="20" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" height="20" align="left">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td colspan="4" valign="bottom" align="left">  ________________________________ </td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" height="20" align="left">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td valign="bottom" align="left" width="3%">  <br> </td>
		<td valign="bottom" align="left" width="1%">  NAME: </td>
		<td valign="bottom" align="left">   </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" height="20" align="left">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  POSITION: </td>
		<td valign="bottom" align="left">  </td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" height="20" align="left">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" valign="bottom" align="center">  <br> </td>
		<td valign="bottom" align="left">  <br> </td>
		<td valign="bottom" align="left">  DATE:</td>
		<td valign="bottom" align="left">   </td>
	</tr>
</tbody></table>


<script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script>
  <script>
setTimeout(function(){
  var element = document.getElementById("WHOLE_DOCUMENT");
  JsBarcode(element, "Hi!");
},2000) //2000 = 2 seconds
            var table = document.getElementById("ProjectDataTable")
            var sumVal = 0;
            var lo_total = 0;
            var gross_total = 0;
            var charge_total = 0;
                var gst_total = 0;
            console.log(table.rows.length);
            
            //CALCULATE COLUMN 5 - LO TOTAL
            for(var i = 2; i < table.rows.length-2; i++)
            {   
                console.log(table.rows[i].cells[5].innerHTML);
                sumVal = sumVal + parseFloat(table.rows[i].cells[5].innerHTML);
            }
            document.getElementById("LO_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
              //CALCULATE COLUMN 5 - LO TOTAL
              lo_total = lo_total + sumVal;
             sumVal = 0;
            for(var i = 2; i < table.rows.length-2; i++)
            {   
                console.log(table.rows[i].cells[6].innerHTML);
                sumVal = sumVal + parseFloat(table.rows[i].cells[6].innerHTML);
            }
            document.getElementById("LO_GST_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
          lo_total = lo_total + sumVal;
                  //CALCULATE COLUMN 7 - GROSS_COST_GRAND_TOTAL
             sumVal = 0;
            for(var i = 2; i < table.rows.length-2; i++)
            {   
               
                sumVal = sumVal + parseFloat(table.rows[i].cells[8].innerHTML);
            }
            document.getElementById("GROSS_COST_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
          
         gross_total = gross_total + sumVal;
          
            //CALCULATE COLUMN 9 - CHARGER_COMM_GRAND_TOTAL
            sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[9].innerHTML); }
            document.getElementById("CHARGER_COMM_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
             //CALCULATE COLUMN 9 - CHARGER_TRAIN_GRAND_TOTAL
     charge_total = charge_total + sumVal;        
    sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[10].innerHTML); }
            document.getElementById("CHARGER_TRAIN_GRAND_TOTAL").innerHTML = + sumVal.toFixed(2);
             //CALCULATE COLUMN 9 - CHARGER_DEL_GRAND_TOTAL
    charge_total = charge_total + sumVal;        
    sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[11].innerHTML); }
            document.getElementById("CHARGER_DEL_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
             //CALCULATE COLUMN 9 - CHARGER_INT_GRAND_TOTAL
    charge_total = charge_total + sumVal;        
    sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[12].innerHTML); }
            document.getElementById("CHARGER_INT_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
            
            
            
             //CALCULATE COLUMN 9 - CHARGER_INT_GRAND_TOTAL
    charge_total = charge_total + sumVal;        
    sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[13].innerHTML); }
            document.getElementById("GST_IN_GRAND_TOTAL").innerHTML = Number(sumVal).toFixed(2);
          gst_total = gst_total + sumVal;   
           //CALCULATE COLUMN 9 - CHARGER_INT_GRAND_TOTAL
            sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[14].innerHTML); }
            document.getElementById("GST_OUT_GRAND_TOTAL").innerHTML = Number(sumVal).toFixed(2);
          gst_total = gst_total + sumVal;
           //CALCULATE COLUMN 9 - CHARGER_INT_GRAND_TOTAL
            sumVal = 0; 
            for(var i = 2; i < table.rows.length-2; i++)
            {    sumVal = sumVal + parseFloat(table.rows[i].cells[15].innerHTML); }
            document.getElementById("GST_RO_GRAND_TOTAL").innerHTML =  sumVal.toFixed(2);
          gst_total = gst_total + sumVal;
            
            document.getElementById("LO_ALL").innerHTML = (lo_total).toFixed(2);
            document.getElementById("GROSS_ALL").innerHTML = gross_total.toFixed(2);
            document.getElementById("CHARGERS_ALL").innerHTML =  charge_total.toFixed(2);
          
              document.getElementById("TOTAL_COST_FINAL").innerHTML = (gross_total+charge_total+gst_total).toFixed(2);
            document.getElementById("NET_PROFIT_FINAL").innerHTML =  (lo_total-(gross_total+charge_total+gst_total)).toFixed(2);
            
            
      document.getElementById("NET_MARGIN").innerHTML =  (lo_total/(gross_total+charge_total+gst_total)).toFixed(2);
       document.getElementById("NET_MARGIN_AMOUNT").innerHTML =   (lo_total-(gross_total+charge_total+gst_total)).toFixed(2);
        
           
        </script>
        </html>