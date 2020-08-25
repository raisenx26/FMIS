<!DOCTYPE html>
<html>
<head>
<style>
  *
  {
    font-size: 8px;
  }

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 th {
  border: 1px solid #000;
  text-align: left;
  padding: 8px;
}
td {
  border: 1px solid #000;
  text-align: left;
  padding: 5px;
}
#header
{
  margin-left: 90px;
}
#header2
{
  text-align: center;
  padding-bottom: 30px;
}
#header2 b
{
  font-size: 10px;
}
th
{
  text-align: center;
}
#total_obli td
{
 border: none;
}
#obli td
{
 border: none;
 border
}

table {
    border-collapse: collapse ;      
}

td {
   border: 1px solid #000000;
   text-align: right;
}
#description
{
  text-align: left;
}
#note
{
  margin-top: 30px;
  width: 100%;
  height: 50px;
}
#certified
{
  width: 20%;
  float: left;
}
#regional
{
  width: 20%;
  float: right;
  margin-top: -50px;
  margin-right: 100px;
}
#noted
{
  width: 30%;
  margin-left: 230px;
}
#table2 th, #table2 td
{
  padding: 1;
  text-align: center;
  border-spacing: 0;
border-collapse: collapse;
}



</style>
</head>
<body>
<div id="header">
            <img src="{{ base_path() }}/public/img/header.jpg" width="590" />
        </div>
<div id="header2">
  <b>STATEMENT OF ALLOTMENTS, OBLIGATION AND BALANCES </b><br>
  <b>As of {{ request()->from_date }}</b>

</div>


<table width="100%">
 <tr>
  <td id="description" width="30%"><b>P/A/P Allotment Class/Object of Expenditures (1)</b></td>
  <td id="description" width="10%"><b>UACS code</b></td>
  <th id="description"><b>Authorized Appropriations</b></th>
    <th><b>Allotment Recieved (2)</b></th>
  <td id="description" colspan="2" width="25%">
    <b>Obligations Incurred</b>
    <body style="margin: 0;padding: 0">
     <table id="table2">
            <tr>
              <th width="50%">This Report</th>
              <th>To Date</th>
            </tr>
            <tr>
              <td width="50%">(3)</td>
              <td>(4)</td>
            </tr>
          </table>
    </body>
  </td>

  <td id="description" width="15%"><b>Unobligated Balance of Allotment (5)=(2)-(4)</b></td>
 </tr>

 <tr>
  <td rowspan="1" id="description">
     <b>Regional S & T Services</b>
      <br>
      <br>
     <b><u>Personal Services</u></b>
     <br>
      Salaries and Wages - Regular Pay
      <br>
  </td>
  <td rowspan="1">
      <br>
      <br>
      <br>
  50101010  01
  </td>
  <td rowspan="1">
      <br>
      <br>
      <br>
  {{ request()->aa_salaries }}
</td>
  <td rowspan="1">
      <br>
      <br>
      <br>
  {{ request()->ar_salaries }}
</td>
      <td>
      <br>
      <br>
      <br>
    {{ $amount }}</td>
      <td>
      <br>
      <br>
      <br>
    {{ $amount2 }}</td>
  <td rowspan="1">
      <br>
      <br>
      <br>
      <?php
        $amount_ar = request()->ar_salaries;
        $total_salaries = $amount_ar-$amount2;
        echo $total_salaries;
      ?>
 </td>
 </tr>
<?php
 $counter3 = request()->counter3;
 $total_aa_new3 = 0;
 $total_ar_new3 = 0;
 $total_tr_new3 = 0;
 $total_td_new3 = 0;
 $unobli3 = 0;
 $total_unobli3 = 0;
 
 echo '<tr>';
 echo '<td id="description">';
 for($f1 = 0; $f1 < $counter3;$f1++){
   echo request()->description_new3[$f1].'<br>';
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

 for($g1 = 0; $g1 < $counter3;$g1++){
   echo request()->uacs_new3[$g1].'<br><br>';
}
echo '</td>';
echo '<td>';
echo '<br>';

 for($h1 = 0; $h1 < $counter3;$h1++){ 
   echo request()->aa_new3[$h1].'<br><br>';
   $total_aa_new3 += request()->aa_new3[$h1];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';
 
 for($j1 = 0; $j1 < $counter3;$j1++){
   echo request()->ar_new3[$j1].'<br><br>';
   $total_ar_new3 += request()->ar_new3[$j1];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

 for($k1 = 0; $k1 < $counter3;$k1++){
   echo request()->tr_new3[$k1].'<br><br>';
   $total_tr_new3 += request()->tr_new3[$k1];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

 for($l1 = 0; $l1 < $counter3;$l1++){
   echo request()->td_new3[$l1].'<br><br>';
   $total_td_new3 += request()->td_new3[$l1];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

   for($m1 = 0; $m1 < $counter3;$m1++){
     $unobli3 = request()->ar_new3[$m1]-request()->td_new3[$m1];
     echo $unobli3.'<br><br>';
     $total_unobli3 += $unobli3;
   }
 echo '</td>';
 echo '</tr>';
 ?>

 <tr>
    <td id="description"><b>Total Salaries and Wages</b></td>
    <td></td>
    <td><b>@convertmoney(request()->aa_salaries)</b></td>
    <td><b>@convertmoney(request()->ar_salaries)</b></td>
    <td><b>@convertmoney($amount)</b></td>
    <td><b>@convertmoney($amount2)</b></td>
    <td><b>@convertmoney($total_salaries)</b></td>
  </tr>

  <tr>
    <td id="description">
      <b><u>Other Compensation</u></b>
      <br> 
      Personal Eco. Relief Allo. (PERA)
      <br>
      Representation Allowance (RA)
      <br>
      Transportation Allowance (TA)
      <br>
      Clothing/Uniform Allowance
      <br>
      Year-end Bonus
      <br>
      Cash Gift
      <br>
      <b>MIDYEAR BONUS</b>
      <br>
      Productivity Enhancement Incentive
      <br>
      Pag-ibig Contributions
      <br>
      PHILHEALTH Contribution
      <br>
      ECC Contribution
    </td>

    <td>
      <br>
        50102010 01
        <br>
        50102020 00
        <br>
        50102030 01
        <br>
        50102040 01
        <br>
        50102140 01
        <br>
        50102150 01
        <br>
        <br>
        50102990 12
        <br>
        50103020 01
        <br>
        50103030 01
        <br>
         50103040 01
         <br>
    </td>

    <td>
      <br>
        {{ request()->aa_pera }}
        <br>
        {{ request()->aa_ra }}
        <br>
        {{ request()->aa_ta }}
        <br>
        {{ request()->aa_clothing }}
        <br>
        {{ request()->aa_year_end }}
        <br>
        {{ request()->aa_cash }}
        <br>
        <br>
        {{ request()->aa_productivity }}
        <br>
        {{ request()->aa_pag_ibig }}
        <br>
        {{ request()->aa_philheath }}
        <br>
        {{ request()->aa_ecc }}
        <br>
    </td>

    <td>
       <br>
        {{ request()->ar_pera }}
        <br>
        {{ request()->ar_ra }}
        <br>
        {{ request()->ar_ta }}
        <br>
        {{ request()->ar_clothing }}
        <br>
        {{ request()->ar_year_end }}
        <br>
        {{ request()->ar_cash }}
        <br>
        <br>
        {{ request()->ar_productivity }}
        <br>
        {{ request()->ar_pag_ibig }}
        <br>
        {{ request()->ar_philheath }}
        <br>
        {{ request()->ar_ecc }}
        <br>

    </td>

    <td>
      <br>
        {{ $pera_amount }}
        <br>
        {{ $ra_amount }}
        <br>
        {{ $ta_amount }}
        <br>
        {{ $clothing_amount }}
        <br>
        {{ $yearend_amount }}
        <br>
        {{ $cash_amount }}
        <br>
        <br>
        {{ $productivity_amount }}
        <br>
        {{ $pagibig_amount }}
        <br>
        {{ $phil_amount }}
        <br>
        {{ $ecc_amount }}
        <br>
    </td>

    <td>
     <br>
        {{ $pera_amount2 }}
        <br>
        {{ $ra_amount2 }}
        <br>
        {{ $ta_amount2 }} 
        <br>
        {{ $clothing_amount2}}
        <br>
        {{ $yearend_amount2 }}
        <br>
        {{ $cash_amount2 }}
        <br>
        <br>
        {{ $productivity_amount2 }}
        <br>
        {{ $pagibig_amount2 }}
        <br>
        {{ $phil_amount2 }}
        <br>
        {{ $ecc_amount2 }}
        <br>
    </td>

    <td>
       <br>
       <?php
       $amount_pera = request()->ar_pera;
       $total_pera = $amount_pera-$pera_amount2;
       echo $total_pera;
     ?>
        <br>
        <?php
       $amount_ra = request()->ar_ra;
       $total_ra = $amount_ra-$ra_amount2;
       echo $total_ra;
     ?>
        <br>
        <?php
       $amount_ta = request()->ar_ta;
       $total_ta = $amount_ta-$ta_amount2;
       echo $total_ta;
     ?>
        <br>
        <?php
        $amount_clothing = request()->ar_clothing;
        $total_clothing = $amount_clothing-$clothing_amount2;
        echo $total_clothing;
      ?>
        <br>
        <?php
        $amount_yearend = request()->ar_year_end;
        $total_yearend = $amount_yearend-$yearend_amount2;
        echo $total_yearend;
      ?>
        <br>
        <?php
        $amount_cash = request()->ar_cash;
        $total_cash = $amount_cash-$cash_amount2;
        echo $total_cash;
      ?>
        <br>
        <br>
        <?php
        $amount_productivity = request()->ar_productivity;
        $total_productivity = $amount_productivity-$productivity_amount2;
        echo $total_productivity;
      ?>
        <br>
        <?php
        $amount_pagibig = request()->ar_pag_ibig;
        $total_pagibig = $amount_pagibig-$pagibig_amount2;
        echo $total_pagibig;
      ?>
        <br>
        <?php
        $amount_philhealth = request()->ar_philheath;
        $total_philhealth = $amount_philhealth-$phil_amount2;
        echo $total_philhealth;
      ?>
        <br>
        <?php
        $amount_ecc = request()->ar_ecc;
        $total_ecc = $amount_ecc-$ecc_amount2;
        echo $total_ecc;
      ?>
        <br>
    </td>
  </tr>

  <?php
 $counter4 = request()->counter4;
 $total_aa_new4 = 0;
 $total_ar_new4 = 0;
 $total_tr_new4 = 0;
 $total_td_new4 = 0;
 $unobli4 = 0;
 $total_unobli4 = 0;
 
 echo '<tr>';
 echo '<td id="description">';
 for($f2 = 0; $f2 < $counter4;$f2++){
   echo request()->description_new4[$f2].'<br>';
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

 for($g2 = 0; $g2 < $counter4;$g2++){
   echo request()->uacs_new4[$g2].'<br><br>';
}
echo '</td>';
echo '<td>';
echo '<br>';

 for($h2 = 0; $h2 < $counter4;$h2++){ 
   echo request()->aa_new4[$h2].'<br><br>';
   $total_aa_new4 += request()->aa_new4[$h2];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';
 
 for($j2 = 0; $j2 < $counter4;$j2++){
   echo request()->ar_new4[$j2].'<br><br>';
   $total_ar_new4 += request()->ar_new4[$j2];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

 for($k2 = 0; $k2 < $counter4;$k2++){
   echo request()->tr_new4[$k2].'<br><br>';
   $total_tr_new4 += request()->tr_new4[$k2];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

 for($l2 = 0; $l2 < $counter4;$l2++){
   echo request()->td_new4[$l2].'<br><br>';
   $total_td_new4 += request()->td_new4[$l2];
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';

   for($m2 = 0; $m2 < $counter4;$m2++){
     $unobli4 = request()->ar_new4[$m2]-request()->td_new4[$m2];
     echo $unobli4.'<br><br>';
     $total_unobli4 += $unobli4;
   }
 echo '</td>';
 echo '</tr>';
 ?>

  <tr>
    <td id="description"><b>Total Other Compensation</b></td>
    <td></td>
    <td><b>
      <?php 
     $total_aa_other = request()->aa_pera+request()->aa_ra+request()->aa_ta+request()->aa_clothing+request()->aa_year_end+ request()->aa_cash+request()->aa_productivity+request()->aa_pag_ibig+request()->aa_philheath+request()->aa_ecc;
     
      ?>
      @convertmoney($total_aa_other)
      <b></td>
    <td><b>
        <?php 
        $total_ar_other = request()->ar_pera+request()->ar_ra+request()->ar_ta+request()->ar_clothing+request()->ar_year_end+ request()->ar_cash+request()->ar_productivity+request()->ar_pag_ibig+request()->ar_philheath+request()->ar_ecc;
         
         ?>
         @convertmoney($total_ar_other)
      <b></td>
    <td><b><?php
    $this_total = $pera_amount+$ra_amount+$ta_amount+$clothing_amount+$yearend_amount+$cash_amount+$productivity_amount+$pagibig_amount+$phil_amount+$ecc_amount;
    
    ?>   
    @convertmoney($this_total)
    <b></td>
    <td><b>
        <?php
        $to_total = $pera_amount2+$ra_amount2+$ta_amount2+$clothing_amount2+$yearend_amount2+$cash_amount2+$productivity_amount2+$pagibig_amount2+$phil_amount2+$ecc_amount2;
        
        ?>   
        @convertmoney($to_total)
      <b></td>
    <td><b>
      <?php 
        $other_total = $total_ecc+$total_philhealth+$total_pagibig+$total_productivity+$total_cash+$total_yearend+$total_clothing+$total_ta+$total_ra+$total_pera;
     
      ?>
      @convertmoney($other_total)
      <b></td>
  </tr>
  <tr>
    <td id="description">
        <b><u>MC Benifit</u></b>
        <br> 
        Subsistence
        <br>
        Laundry Allowance
        <br>
        Hazard Allowance
        <br>
        Longevity Pay
        <br>
    </td>
    <td>
        <br>
        50102050 02
        <br>
        50102060 03
        <br>
        50102110 04
        <br>
        50102120 03
        <br>
    </td>
     <td>
        <br>
        {{ request()->aa_subsistence }}
        <br>
        {{ request()->aa_laundry}}
        <br>
        {{ request()->aa_hazard }}
        <br>
        {{ request()->aa_longevity }}
        <br>
    </td>
     <td>
        <br>
        {{ request()->ar_subsistence }}
        <br>
        {{ request()->ar_laundry }}
        <br>
        {{ request()->ar_hazard }}
        <br>
        {{ request()->ar_longevity }}
        <br>
    </td>
     <td>
        <br>
        {{ $subsistence_amount }}
        <br>
        {{ $laundry_amount }}
        <br>
        {{ $hazard_amount }}
        <br>
        {{ $long_amount }}
        <br>
    </td>
     <td>
        <br>
        {{ $subsistence_amount2 }}
        <br>
        {{ $laundry_amount2 }}
        <br>
        {{ $hazard_amount2 }}
        <br>
        {{ $long_amount2 }}
        <br>
    </td>
     <td>
        <br>
        <?php
        $amount_subsistence = request()->ar_subsistence;
        $total_subsistence = $amount_subsistence-$subsistence_amount2;
        echo $total_subsistence;
      ?>
        <br>
        <?php
        $amount_laundry = request()->ar_laundry;
        $total_laundry = $amount_laundry-$laundry_amount2;
        echo $total_laundry;
      ?>
        <br>
        <?php
        $amount_hazard = request()->ar_hazard;
        $total_hazard = $amount_hazard-$hazard_amount2;
        echo $total_hazard;
      ?>
        <br>
        <?php
        $amount_longevity = request()->ar_longevity;
        $total_longevity = $amount_longevity-$long_amount2;
        echo $total_longevity;
      ?>
        <br>
    </td>
  </tr>

  <?php
  $counter5 = request()->counter5;
  $total_aa_new5 = 0;
  $total_ar_new5 = 0;
  $total_tr_new5 = 0;
  $total_td_new5 = 0;
  $unobli5 = 0;
  $total_unobli5 = 0;
  
  echo '<tr>';
  echo '<td id="description">';
  for($f3 = 0; $f3 < $counter5;$f3++){
    echo request()->description_new5[$f3].'<br>';
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
  for($g3 = 0; $g3 < $counter5;$g3++){
    echo request()->uacs_new5[$g3].'<br><br>';
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';
 
  for($h3 = 0; $h3 < $counter5;$h3++){ 
    echo request()->aa_new5[$h3].'<br><br>';
    $total_aa_new5 += request()->aa_new5[$h3];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
  
  for($j3 = 0; $j3 < $counter5;$j3++){
    echo request()->ar_new5[$j3].'<br><br>';
    $total_ar_new5 += request()->ar_new5[$j3];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
  for($k3 = 0; $k3 < $counter5;$k3++){
    echo request()->tr_new5[$k3].'<br><br>';
    $total_tr_new5 += request()->tr_new5[$k3];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
  for($l3 = 0; $l3 < $counter5;$l3++){
    echo request()->td_new5[$l3].'<br><br>';
    $total_td_new5 += request()->td_new5[$l3];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
    for($m3 = 0; $m3 < $counter5;$m3++){
      $unobli5 = request()->ar_new5[$m3]-request()->td_new5[$m3];
      echo $unobli5.'<br><br>';
      $total_unobli5 += $unobli5;
    }
  echo '</td>';
  echo '</tr>';
  ?>

  <tr>
    <td id="description"><b>Total MC Benifits</b></td>
    <td></td>
    <td><b>
      <?php
       $total_aa_mc = request()->aa_subsistence+request()->aa_laundry+request()->aa_hazard+request()->aa_longevity;
       
      ?>
      @convertmoney($total_aa_mc)
      <b></td>
    <td><b>
        <?php
        $total_ar_mc = request()->ar_subsistence+request()->ar_laundry+request()->ar_hazard+request()->ar_longevity;
     
       ?>
       @convertmoney($total_ar_mc)
      <b></td>
    <td><b>
      <?php
      $mc_this_total = $subsistence_amount+$laundry_amount+$hazard_amount+$long_amount;
     
      ?>
      @convertmoney($mc_this_total)
      <b></td>
    <td><b>
        <?php
        $mc_to_total = $subsistence_amount2+$laundry_amount2+$hazard_amount2+$long_amount2;
        
        ?>
        @convertmoney($mc_to_total)
      <b></td>
    <td><b>
      <?php
      $total_mc = $total_longevity+$total_hazard+$total_laundry+$total_subsistence;
    
      ?>
      @convertmoney($total_mc)
      <b></td>
  </tr>
  <tr>
    <td id="description">
        <b><u>Pension and Gratuity Fund</u></b>
        <br> 
        Terminal Leave Benefits
        <br>
    </td>
    <td>
      <br>
      50104990 99
      <br>
    </td>
    <td>
      <br>
      {{ request()->aa_terminal }}
      <br>
    </td>
    <td>
      <br>
      {{ request()->ar_terminal }}
      <br>
    </td>
    <td>
      <br>
      {{ $terminal_amount }}
      <br>
    </td>
    <td>
      <br>
      {{ $terminal_amount2 }}
      <br>
    </td>
    <td>
      <br>
      <?php
        $amount_terminal = request()->ar_terminal;
        $total_terminal = $amount_terminal-$terminal_amount2;
        echo $total_terminal;
      ?>
      <br>
    </td>
  </tr>
  <tr>
    <td id="description"><b>Total PGF</b></td>
    <td></td>
    <td><b>@convertmoney(request()->aa_terminal)<b></td>
    <td><b>@convertmoney(request()->ar_terminal)<b></td>
    <td><b>@convertmoney($terminal_amount)<b></td>
    <td><b>@convertmoney($terminal_amount2)<b></td>
    <td><b><?php
    echo $total_terminal;
    ?><b></td>
  </tr>
  <tr>
    <td id="description">
        <b><u>Automatic Appropriation</u></b>
        <br> 
        RLIP
        <br>
    </td>
    <td>
      <br>
      50103010 00
      <br>
    </td>
    <td>
      <br>
      {{ request()->aa_rlip }}
      <br>
    </td>
    <td>
      <br>
      {{ request()->ar_rlip }}
      <br>
    </td>
    <td>
      <br>
      {{ $rlip_amount }}
      <br>
    </td>
    <td>
      <br>
      {{ $rlip_amount2 }}
      <br>
    </td>
    <td>
      <br>
      <?php
      $amount_rlip = request()->ar_rlip;
      $total_rlip = $amount_rlip-$rlip_amount2;
      echo $total_rlip;
    ?>
      <br>
    </td>
  </tr>
  <tr>
    <td id="description"><b>Total Automatic Appropriation</b></td>
    <td></td>
    <td><b>@convertmoney(request()->aa_rlip)<b></td>
    <td><b>@convertmoney(request()->ar_rlip)<b></td>
    <td><b>@convertmoney($rlip_amount)<b></td>
    <td><b>@convertmoney($rlip_amount2)<b></td>
    <td><b>
    @convertmoney($total_rlip)
    <b></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td id="description"><b>Total PS</b></td>
    <td></td>
    <td><b>
        <?php
        $total_aa_ps = request()->aa_rlip+request()->aa_terminal+$total_aa_mc+$total_aa_other+request()->aa_salaries;
        ?>
        @convertmoney($total_aa_ps)
      <b></td>
    <td><b>
        <?php
        $total_ar_ps = request()->ar_rlip+request()->ar_terminal+$total_ar_mc+$total_ar_other+request()->ar_salaries;
        ?>
        @convertmoney($total_ar_ps)
      <b></td>
    <td><b><?php
      $total_this_ps = $rlip_amount2+$terminal_amount2+$mc_this_total+$this_total+$amount;
     
      ?>
      @convertmoney($total_this_ps)
      <b></td>
    <td><b>
        <?php
        $total_to_ps = $rlip_amount2+$terminal_amount2+$mc_to_total+$to_total+$amount2;
        ?>
         @convertmoney($total_to_ps)
      <b></td>
    <td><b>
      <?php
      $total_ps = $total_rlip+$total_terminal+$total_mc+$other_total+$total_salaries;
      
      ?>
      @convertmoney($total_ps)
      <b></td>
  </tr>
  <tr>
    <td id="description">
        <b><u>Maintance and other Operating Exps.</u></b>
        <br> 
        Traveling Expenses - Local
        <br>
        Traveling Expenses - Foreign
        <br>
        Training Expenses
        <br>
        Office Supplies Expenses
        <br>
        Accountable Forms Expenses
        <br>
        Drugs and Medicine Expenses
        <br>
        Medical, Dental and Lab. Supplies Expe.
        <br>
        Fuel, Oil and Lubricants Expenses
        <br>
        Semi-Expendable exp.-Machinery
        <br>
        Semi-Expendable exp.-Office Equipment
        <br>
        Semi-Expendable exp.-Information and Communun.
        <br>
        Semi-Expendable exp.-Commun. Technology
        <br>
        Semi-Expendable exp.-Disaster Response and 
        <br>
        Semi-Expendable exp.-Other Machinery & Equipment
        <br>
        Other Supplies & Materials Expenses
        <br>
        Water Expenses
        <br>
        Electricity Expenses
        <br>
        Postage and Deliveries
        <br>
        Telephone Expenses - Mobile
        <br>
        Telephone Expenses - Landline
        <br>
        Inernet Expenses
        <br>
        Extraordinary Expenses
        <br>
        Miscellaneous Expenses
        <br>
        Legal services
        <br>
        Auditing Services
        <br>
        Consultancy Services
        <br>
        Other Professional Expenses
        <br>
        Janitorial Expenses
        <br>
        Security Expenses
        <br>
        Other General Services
        <br>
        Repair & Maint. - Other Land Improvements
        <br>
    </td>

    <td>
      <br>
        50201010 00
        <br>
        50201020 00
        <br>
        50202010 00
        <br>
        50203010 00
        <br>
        50203020 00
        <br>
        50203070 00
        <br>
        50203080 00
        <br>
        50203090 00
        <br>
        5020321001
        <br>
        5020321002
         <br>
        5020321003
        <br>
        5020321007
        <br>
        5020321008
        <br>
        5020321099
        <br>
        50203990 00
        <br>
        50204010 00
        <br>
        50204020 00
        <br>
        50205010 00
        <br>
        50205020 01
        <br>
        50205020 02
        <br>
        50205030 00
        <br>
        50210030 00
        <br>
        50210030 00
        <br>
        50211010 00
        <br>
        50211020 00
        <br>
        50211030 00
        <br>
        50211990 00
        <br>
        50212020 00
        <br>
        50212030 00
        <br>
        50212990 00
        <br>
        50213020 99
        <br>
    </td>
    <td>
        <br>
        {{ request()->aa_local }}
        <br>
        {{ request()->aa_foreign }}
        <br>
        {{ request()->aa_training  }}
        <br>
        {{ request()->aa_office  }}
        <br>
        {{ request()->aa_accountable }}
        <br>
        {{ request()->aa_drugs }}
        <br>
        {{ request()->aa_medical }}
        <br>
        {{ request()->aa_fuel }}
        <br>
        {{ request()->aa_semi_machinery }}
        <br>
        {{ request()->aa_semi_office }}
        <br>
        {{ request()->aa_semi_information }}
        <br>
        {{ request()->aa_semi_communication }}
        <br>
        {{ request()->aa_semi_disaster  }}
        <br>
        {{ request()->aa_semi_other  }}
        <br>
        {{ request()->aa_other_supp  }}
        <br>
        {{ request()->aa_water  }}
        <br>
        {{ request()->aa_electricity  }}
        <br>
        {{ request()->aa_postage  }}
        <br>
        {{ request()->aa_telephone_mobile  }}
        <br>
        {{ request()->aa_telephone_landline  }}
        <br>
        {{ request()->aa_internet  }}
        <br>
        {{ request()->aa_extraordinary  }}
        <br>
        {{ request()->aa_miscellaneous  }}
        <br>
        {{ request()->aa_legal }}
        <br>
        {{ request()->aa_auditing }}
        <br>
        {{ request()->aa_consultancy }}
        <br>
        {{ request()->aa_other_prof }}
        <br>
        {{ request()->aa_janitor }}
        <br>
        {{ request()->aa_security  }}
        <br>
        {{ request()->aa_other_general }}
        <br>
        {{ request()->aa_repair_other }}
        <br>
    </td>
    <td>
        <br>
        {{ request()->ar_local }}
        <br>
        {{ request()->ar_foreign }}
        <br>
        {{ request()->ar_training  }}
        <br>
        {{ request()->ar_office  }}
        <br>
        {{ request()->ar_accountable }}
        <br>
        {{ request()->ar_drugs }}
        <br>
        {{ request()->ar_medical }}
        <br>
        {{ request()->ar_fuel }}
        <br>
        {{ request()->ar_semi_machinery }}
        <br>
        {{ request()->ar_semi_office }}
        <br>
        {{ request()->ar_semi_information }}
        <br>
        {{ request()->ar_semi_communication }}
        <br>
        {{ request()->ar_semi_disaster  }}
        <br>
        {{ request()->ar_semi_other  }}
        <br>
        {{ request()->ar_other_supp  }}
        <br>
        {{ request()->ar_water  }}
        <br>
        {{ request()->ar_electricity  }}
        <br>
        {{ request()->ar_postage  }}
        <br>
        {{ request()->ar_telephone_mobile  }}
        <br>
        {{ request()->ar_telephone_landline  }}
        <br>
        {{ request()->ar_internet  }}
        <br>
        {{ request()->ar_extraordinary  }}
        <br>
        {{ request()->ar_miscellaneous  }}
        <br>
        {{ request()->ar_legal }}
        <br>
        {{ request()->ar_auditing }}
        <br>
        {{ request()->ar_consultancy }}
        <br>
        {{ request()->ar_other_prof }}
        <br>
        {{ request()->ar_janitor }}
        <br>
        {{ request()->ar_security  }}
        <br>
        {{ request()->ar_other_general }}
        <br>
        {{ request()->ar_repair_other }}
        <br>
    </td>
    <td>
        <br>
        {{ $local_amount }}
        <br>
        {{ $foreign_amount }}
        <br>
        {{ $training_amount }}
        <br>
        {{ $office_amount }}
        <br>
        {{ $accountable_amount }}
        <br>
        {{ $drugs_amount }}
        <br>
        {{ $medical_amount }}
        <br>
        {{ $fuel_amount }}
        <br>
        {{ $machine_amount }}
        <br>
        {{ $semioffice_amount }}
        <br>
        {{ $semiinfo_amount }}
        <br>
       {{ $semitechno_amount }}
        <br>
        {{ $semidisaster_amount }}
        <br>
        {{ $semiother_amount }}
        <br>
        {{ $othersupp_amount }}
        <br>
        {{ $water_amount }}
        <br>
        {{ $elect_amount }}
        <br>
        {{ $postage_amount }}
        <br>
        {{ $tele_amount }}
        <br>
        {{ $tele2_amount }}
        <br>
        {{ $internet_amount }}
        <br>
        {{ $extra_amount }}
        <br>
        {{ $misc_amount }}
        <br>
        {{ $legal_amount }}
        <br>
        {{ $aud_amount }}
        <br>
        {{ $consult_amount }}
        <br>
        {{ $prof_amount }}
        <br>
        {{ $janitor_amount }}
        <br>
        {{ $secu_amount }}
        <br>
        {{ $othergen_amount }}
        <br>
        {{ $repairother_amount }}
        <br>
    </td>
    <td>
        <br>
        {{ $local_amount2 }}
        <br>
        {{ $foreign_amount2 }}
        <br>
        {{ $training_amount2 }}
        <br>
        {{ $office_amount2 }}
        <br>
        {{ $accountable_amount2 }}
        <br>
        {{ $drugs_amount2 }}
        <br>
        {{ $medical_amount2 }}
        <br>
        {{ $fuel_amount2 }}
        <br>
        {{ $machine_amount2 }}
        <br>
        {{ $semioffice_amount2 }}
        <br>
        {{ $semiinfo_amount2 }}
        <br>
        {{ $semitechno_amount2 }}
        <br>
       {{ $semidisaster_amount2 }}
        <br>
        {{ $semiother_amount2 }}
        <br>
        {{ $othersupp_amount2 }}
        <br>
        {{ $water_amount2 }}
        <br>
        {{ $elect_amount2 }}
        <br>
        {{ $postage_amount2 }}
        <br>
        {{ $tele_amount2 }}
        <br>
        {{ $tele2_amount2 }}
        <br>
        {{ $internet_amount2 }}
        <br>
        {{ $extra_amount2 }}
        <br>
        {{ $misc_amount2 }}
        <br>
        {{ $legal_amount2 }}
        <br>
        {{ $aud_amount2 }}
        <br>
        {{ $consult_amount2 }}
        <br>
        {{ $prof_amount2 }}
        <br>
        {{ $janitor_amount2 }}
        <br>
        {{ $secu_amount2 }}
        <br>
        {{ $othergen_amount2 }}
        <br>
        {{ $repairother_amount2 }}
        <br>
    </td>
    <td>
        <br>
        <?php
         $total_local = request()->ar_local-$local_amount2;
         echo $total_local;
        ?>
        <br>
        <?php
        $total_foreign = request()->ar_foreign-$foreign_amount2;
        echo $total_foreign;
       ?>
        <br>
        <?php
        $total_training = request()->ar_training-$training_amount2;
        echo $total_training;
       ?>
        <br>
        <?php
        $total_office = request()->ar_office-$office_amount2;
        echo $total_office;
       ?>
        <br>
        <?php
        $total_accountable = request()->ar_accountable-$accountable_amount2;
        echo $total_accountable;
       ?>
        <br>
        <?php
        $total_drugs = request()->ar_drugs-$drugs_amount2 ;
        echo $total_drugs;
       ?>
        <br>
        <?php
        $total_medical = request()->ar_medical-$medical_amount2;
        echo $total_medical;
       ?>
        <br>
        <?php
        $total_fuel = request()->ar_fuel -$fuel_amount2 ;
        echo $total_fuel;
       ?>
        <br>
        <?php
        $total_machine = request()->ar_semi_machinery-$machine_amount2;
        echo $total_machine;
       ?>
        <br>
        <?php
        $total_semioffice = request()->ar_semi_office -$semioffice_amount2;
        echo $total_semioffice;
       ?>
        <br>
        <?php
        $total_semiinfo = request()->ar_semi_information-$semiinfo_amount2;
        echo $total_semiinfo;
       ?>
        <br>
        <?php
        $total_semitechno = request()->ar_semi_communication-$semitechno_amount2;
        echo $total_semitechno;
       ?>
        <br>
        <?php
        $total_semidisaster = request()->ar_semi_disaster-$semidisaster_amount2;
        echo $total_semidisaster;
       ?>
        <br>
        <?php
        $total_semiother = request()->ar_semi_other-$semiother_amount2;
        echo $total_semiother;
       ?>
        <br>
        <?php
        $total_semiothersupp = request()->ar_other_supp-$othersupp_amount2;
        echo $total_semiothersupp;
       ?>
        <br>
        <?php
        $total_water = request()->ar_water-$water_amount2;
        echo $total_water;
       ?>
        <br>
        <?php
        $total_elect = request()->ar_electricity-$elect_amount2;
        echo $total_elect;
       ?>
        <br>
        <?php
        $total_postage = request()->ar_postage-$postage_amount2;
        echo $total_postage;
       ?>
        <br>
        <?php
        $total_tele = request()->ar_telephone_mobile-$tele_amount2;
        echo $total_tele;
       ?>
        <br>
        <?php
        $total_tele2 = request()->ar_telephone_landline-$tele2_amount2 ;
        echo $total_tele2;
       ?>
        <br>
        <?php
        $total_internet = request()->ar_internet-$internet_amount2;
        echo $total_internet;
       ?>
        <br>
        <?php
        $total_extra = request()->ar_extraordinary-$extra_amount2;
        echo $total_extra;
       ?>
        <br>
        <?php
        $total_misc = request()->ar_miscellaneous-$misc_amount2;
        echo $total_misc;
       ?>
        <br>
        <?php
        $total_legal = request()->ar_legal-$legal_amount2;
        echo $total_legal;
       ?>
        <br>
        <?php
        $total_aud = request()->ar_auditing-$aud_amount2;
        echo $total_aud;
       ?>
        <br>
        <?php
        $total_consult = request()->ar_consultancy-$consult_amount2;
        echo $total_consult;
       ?>
        <br>
        <?php
        $total_otherprof = request()->ar_other_prof-$prof_amount2;
        echo $total_otherprof;
       ?>
        <br>
        <?php
        $total_janitor = request()->ar_janitor-$janitor_amount2;
        echo $total_janitor;
       ?>
        <br>
        <?php
        $total_security = request()->ar_security-$secu_amount2;
        echo $total_security;
       ?>
        <br>
        <?php
        $total_othergen = request()->ar_other_general-$othergen_amount2;
        echo $total_othergen;
       ?>
        <br>
        <?php
        $total_repairother = request()->ar_repair_other-$repairother_amount2;
        echo $total_repairother;
       ?>
       
        <br>
    </td>
  </tr>


  <tr>
      <td id="description">
          Repair & Main. - Building & Structures
          <br>
          Repair & Maint. - Machineries & Equipment
          <br>
          Repair & Maint. - Office Equipment
          <br>
          Repair & Maint. - ICT Equipment
          <br>
          Repair & Maint. - Communication Equipment
          <br>
          Repair & Maint. - Technical & Scientific
          <br>
          Repair & Maint. - Transportation Equipment
          <br>
          Repair & Maint. - Furniture & Fixtures
          <br>
          Subsidies-Others
          <br>
          <b>Local GIA</b>
          <br>
          <b>SETUP</b>
           <br>
            Taxes, Duties and Licenses
            <br>
            Fidelity Bond Premiums
            <br>
            Insurance Expenses
            <br>
            Advertising Expenses
            <br>
            Printing and Binding Services
            <br>
            Representation Expenses
            <br>
            Transportation and Delivery Expenses
            <br>
            Rent Expenses - Building
            <br>
            Rent Expenses - Motor Vehicles
            <br>
            Rent Expenses - Equipment
            <br>
            Membership Dues & Conts. to Org'ns.
            <br>
            Subscription Expenses
            <br>
            Other MOOE
            <br>
      </td>
      <td>
          50213040 01
          <br>
          50213050 00
          <br>
          50213050 02
          <br>
          50213050 03
          <br>
          50213050 07
          <br>
          50213050 14
          <br>
          50213060 01
          <br>
          50213070 00
          <br>
          50214990 00
          <br>
          50214990 00
          <br>
          50214990 00
           <br>
            50215010 01
            <br>
            50215020 00
            <br>
            50215030 00
            <br>
            50299010 00
            <br>
            50299020 00
            <br>
            50299030 00
            <br>
            50299040 00
            <br>
            50299050 01
            <br>
            50299050 03
            <br>
            50299050 04
            <br>
            50299060 00
            <br>
            50299070 00
            <br>
            50299990 99
      </td>
      <td>
        {{ request()->aa_rm_building }}
        <br>
        {{ request()->aa_rm_machineries }}
        <br>
        {{ request()->aa_rm_Office  }}
        <br>
        {{ request()->aa_rm_ict  }}
        <br>
        {{ request()->aa_rm_commercial }}
        <br>
        {{ request()->aa_rm_technical }}
        <br>
        {{ request()->aa_rm_transportation }}
        <br>
        {{ request()->aa_rm_furnitures }}
        <br>
        <br>
        {{ request()->aa_local_gia }}
        <br>
        {{ request()->aa_setup }}
        <br>
        {{ request()->aa_taxes }}
        <br>
        {{ request()->aa_fidelity  }}
        <br>
        {{ request()->aa_insurance  }}
        <br>
        {{ request()->aa_advertising  }}
        <br>
        {{ request()->aa_printing  }}
        <br>
        {{ request()->aa_representation  }}
        <br>
        {{ request()->aa_transportation  }}
        <br>
        {{ request()->aa_rent_building  }}
        <br>
        {{ request()->aa_rent_motor  }}
        <br>
        {{ request()->aa_rent_equipment  }}
        <br>
        {{ request()->aa_membership  }}
        <br>
        {{ request()->aa_sub  }}
        <br>
        {{ request()->aa_other_mooe }}
          <br>
      </td>
      <td>  
          {{ request()->ar_rm_building }}
          <br>
          {{ request()->ar_rm_machineries }}
          <br>
          {{ request()->ar_rm_Office  }}
          <br>
          {{ request()->ar_rm_ict  }}
          <br>
          {{ request()->ar_rm_commercial }}
          <br>
          {{ request()->ar_rm_technical }}
          <br>
          {{ request()->ar_rm_transportation }}
          <br>
          {{ request()->ar_rm_furnitures }}
          <br>
          <br>
          {{ request()->ar_local_gia }}
          <br>
          {{ request()->ar_setup }}
          <br>
          {{ request()->ar_taxes }}
          <br>
          {{ request()->ar_fidelity  }}
          <br>
          {{ request()->ar_insurance  }}
          <br>
          {{ request()->ar_advertising  }}
          <br>
          {{ request()->ar_printing  }}
          <br>
          {{ request()->ar_representation  }}
          <br>
          {{ request()->ar_transportation  }}
          <br>
          {{ request()->ar_rent_building  }}
          <br>
          {{ request()->ar_rent_motor  }}
          <br>
          {{ request()->ar_rent_equipment  }}
          <br>
          {{ request()->ar_membership  }}
          <br>
          {{ request()->ar_sub  }}
          <br>
          {{ request()->ar_other_mooe }}
            <br>
      </td>
      <td>  
          {{ $repairbuilding_amount }}
          <br>
          {{ $repairmachine_amount }}
          <br>
          {{ $repairoffice_amount }}
          <br>
          {{ $repairict_amount }}
          <br>
          {{ $repaircomm_amount }}
          <br>
          {{ $repairtech_amount }}
          <br>
          {{ $repairtrans_amount }}
          <br>
         {{ $repairfurniture_amount }}
          <br>
          <br>
         {{ $localgia_amount }}
          <br>
          {{ $setup_amount }}
          <br>
          {{ $taxes_amount }}
          <br>
          {{ $fidelity_amount }}
          <br>
          {{ $insurance_amount }}
          <br>
          {{ $ads_amount }}
          <br>
          {{ $print_amount }}
          <br>
         {{ $represent_amount }}
          <br>
          {{ $transpo_amount }}
          <br>
         {{ $rent_amount }}
          <br>
          {{ $rentmotor_amount }}
          <br>
          {{$rentequip_amount }}
          <br>
          {{ $membership_amount }}
          <br>
          {{ $subscript_amount }}
          <br>
          {{ $othermooe_amount }}
          <br>
      </td>
      <td>  
          {{ $repairbuilding_amount2 }}
          <br>
          {{ $repairmachine_amount2 }}
          <br>
          {{ $repairoffice_amount2 }}
          <br>
          {{ $repairict_amount2 }}
          <br>
          {{ $repaircomm_amount2 }}
          <br>
          {{ $repairtech_amount2 }}
          <br>
          {{ $repairtrans_amount2 }}
          <br>
          {{ $repairfurniture_amount2 }}
          <br>
          <br>
          {{ $localgia_amount2 }}
          <br>
          {{ $setup_amount2 }}
          <br>
          {{ $taxes_amount2 }}
          <br>
          {{ $fidelity_amount2 }}
          <br>
          {{ $insurance_amount2 }}
          <br>
          {{ $ads_amount2 }}
          <br>
          {{ $print_amount2 }}
          <br>
          {{ $represent_amount2 }}
          <br>
          {{ $transpo_amount2 }}
          <br>
          {{ $rent_amount2 }}
          <br>
          {{ $rentmotor_amount2 }}
          <br>
          {{ $rentequip_amount2 }}
          <br>
          {{ $membership_amount2 }}
          <br>
          {{ $subscript_amount2 }}
          <br>
          {{ $othermooe_amount2 }}
          <br>
      </td>
      <td>  
          <?php
          $total_rmbuilding = request()->ar_rm_building-$repairbuilding_amount2;
          echo $total_rmbuilding;
         ?>
          <br>
          <?php
          $total_rmmachine = request()->ar_rm_machineries-$repairmachine_amount2;
          echo $total_rmmachine;
         ?>
          <br>
          <?php
          $total_repairoffice = request()->ar_rm_Office-$repairoffice_amount2;
          echo $total_repairoffice;
         ?>
          <br>
          <?php
          $total_ict = request()->ar_rm_ict-$repairict_amount2;
          echo $total_ict;
         ?>
          <br>
          <?php
          $total_repaircomm = request()->ar_rm_commercial-$repaircomm_amount2;
          echo $total_repaircomm;
         ?>
          <br>
          <?php
          $total_repairtech = request()->ar_rm_technical-$repairtech_amount2;
          echo $total_repairtech;
         ?>
          <br>
          <?php
          $total_repairtrans = request()->ar_rm_transportation-$repairtrans_amount2;
          echo $total_repairtrans;
         ?>
          <br>
          <?php
          $total_repairfurniture = request()->ar_rm_furnitures-$repairfurniture_amount2;
          echo $total_repairfurniture;
         ?>
          <br>
          <br>
          <?php
          $total_localgia = request()->ar_local_gia-$localgia_amount2;
          echo $total_localgia;
         ?>
          <br>
          <?php
          $total_setup = request()->ar_setup-$setup_amount2;
          echo $total_setup;
         ?>
          <br>
          <?php
          $total_taxes = request()->ar_taxes-$taxes_amount2;
          echo $total_taxes;
         ?>
          <br>
          <?php
          $total_fedility = request()->ar_fidelity-$fidelity_amount2;
          echo $total_fedility;
         ?>
          <br>
          <?php
          $total_insurance = request()->ar_insurance-$insurance_amount2;
          echo $total_insurance;
         ?>
          <br>
          <?php
          $total_ads = request()->ar_advertising-$ads_amount2;
          echo $total_ads;
         ?>
          <br>
          <?php
          $total_printing = request()->ar_printing-$print_amount2;
          echo $total_printing;
         ?>
          <br>
          <?php
          $total_represent = request()->ar_representation-$represent_amount2;
          echo $total_represent;
         ?>
          <br>
          <?php
          $total_transpo = request()->ar_transportation-$transpo_amount2;
          echo $total_transpo;
         ?>
          <br>
          <?php
          $total_rent = request()->ar_rent_building-$rent_amount2;
          echo $total_rent;
         ?>
          <br>
          <?php
          $total_rentmotor = request()->ar_rent_motor-$rentmotor_amount2;
          echo $total_rentmotor;
         ?>
          <br>
          <?php
          $total_rentequip = request()->ar_rent_equipment-$rentequip_amount2;
          echo $total_rentequip;
         ?>
          <br>
          <?php
          $total_membership = request()->ar_membership-$membership_amount2;
          echo $total_membership;
         ?>
          <br>
          <?php
          $total_subscript = request()->ar_sub-$subscript_amount2;
          echo $total_subscript;
         ?>
          <br>
          <?php
          $total_othermooe = request()->ar_other_mooe-$othermooe_amount2;
          echo $total_othermooe;
         ?>
          <br>
      </td>
  </tr>


  <?php
  $counter6 = request()->counter6;
  $total_aa_new6 = 0;
  $total_ar_new6 = 0;
  $total_tr_new6 = 0;
  $total_td_new6 = 0;
  $unobli5 = 0;
  $total_unobli6 = 0;
  
  echo '<tr>';
  echo '<td id="description">';
  for($f4 = 0; $f4 < $counter6;$f4++){
    echo request()->description_new6[$f4].'<br>';
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
  for($g4 = 0; $g4 < $counter6;$g4++){
    echo request()->uacs_new6[$g4].'<br><br>';
 }
 echo '</td>';
 echo '<td>';
 echo '<br>';
 
  for($h4 = 0; $h4 < $counter6;$h4++){ 
    echo request()->aa_new6[$h4].'<br><br>';
    $total_aa_new6 += request()->aa_new6[$h4];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
  
  for($j4 = 0; $j4 < $counter5;$j4++){
    echo request()->ar_new5[$j4].'<br><br>';
    $total_ar_new6 += request()->ar_new6[$j4];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
  for($k4 = 0; $k4 < $counter5;$k4++){
    echo request()->tr_new5[$k4].'<br><br>';
    $total_tr_new6 += request()->tr_new5[$k4];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
  for($l4 = 0; $l4 < $counter5;$l4++){
    echo request()->td_new5[$l6].'<br><br>';
    $total_td_new6 += request()->td_new5[$l6];
  }
  echo '</td>';
  echo '<td>';
  echo '<br>';
 
    for($m4 = 0; $m4 < $counter5;$m4++){
      $unobli6 = request()->ar_new6[$m4]-request()->td_new6[$m4];
      echo $unobli6.'<br><br>';
      $total_unobli6 += $unobli6;
    }
  echo '</td>';
  echo '</tr>';
  ?>

      <tr>
          <td id="description"><b>Total MOOE</b></td>
          <td></td>
          <td><b>
            <?php
             $total_aa_mooe  = request()->aa_local+request()->aa_foreign+request()->aa_training+request()->aa_office+request()->aa_accountable+request()->aa_drugs+request()->aa_medical+
             request()->aa_fuel+ request()->aa_semi_machinery+request()->aa_semi_office+request()->aa_semi_information+request()->aa_semi_communication+request()->aa_semi_disaster+ request()->aa_semi_other+
             request()->aa_other_supp+request()->aa_water+request()->aa_electricity+request()->aa_postage+request()->aa_telephone_mobile+request()->aa_telephone_landline+request()->aa_internet+request()->aa_extraordinary+
             request()->aa_miscellaneous+request()->aa_legal+request()->aa_auditing+request()->aa_consultancy+request()->aa_other_prof+request()->aa_janitor+request()->aa_security+request()->aa_other_general+request()->aa_repair_other+
             request()->aa_rm_building+request()->aa_rm_machineries+request()->aa_rm_Office+request()->aa_rm_ict+request()->aa_rm_commercial+request()->aa_rm_technical+request()->aa_rm_transportation+request()->aa_rm_furnitures+request()->aa_local_gia+
             request()->aa_setup+request()->aa_taxes+request()->aa_fidelity+request()->aa_insurance+request()->aa_advertising+request()->aa_printing+request()->aa_representation+request()->aa_transportation+request()->aa_rent_building+
             request()->aa_rent_motor+request()->aa_rent_equipment+request()->aa_membership+request()->aa_sub+request()->aa_other_mooe; 
            
            ?>
             @convertmoney($total_aa_mooe) 
            <b></td>
          <td><b>
              <?php
              $total_ar_mooe  = request()->ar_local+request()->ar_foreign+request()->ar_training+request()->ar_office+request()->ar_accountable+request()->ar_drugs+request()->ar_medical+
              request()->ar_fuel+ request()->ar_semi_machinery+request()->ar_semi_office+request()->ar_semi_information+request()->ar_semi_communication+request()->ar_semi_disaster+ request()->ar_semi_other+
              request()->ar_other_supp+request()->ar_water+request()->ar_electricity+request()->ar_postage+request()->ar_telephone_mobile+request()->ar_telephone_landline+request()->ar_internet+request()->ar_extraordinary+
              request()->ar_miscellaneous+request()->ar_legal+request()->ar_auditing+request()->ar_consultancy+request()->ar_other_prof+request()->ar_janitor+request()->ar_security+request()->ar_other_general+request()->ar_repair_other+
              request()->ar_rm_building+request()->ar_rm_machineries+request()->ar_rm_Office+request()->ar_rm_ict+request()->ar_rm_commercial+request()->ar_rm_technical+request()->ar_rm_transportation+request()->ar_rm_furnitures+request()->ar_local_gia+
              request()->ar_setup+request()->ar_taxes+request()->ar_fidelity+request()->ar_insurance+request()->ar_advertising+request()->ar_printing+request()->ar_representation+request()->ar_transportation+request()->ar_rent_building+
              request()->ar_rent_motor+request()->ar_rent_equipment+request()->ar_membership+request()->ar_sub+request()->ar_other_mooe; 
             
             ?>
              @convertmoney($total_ar_mooe) 
            <b></td>
          <td><b>
            <?php
              $total_this_mooe = $local_amount+$foreign_amount+$training_amount+$office_amount+$accountable_amount+$drugs_amount+$medical_amount+$fuel_amount+$machine_amount+$semioffice_amount+$semiinfo_amount+$semitechno_amount+$semidisaster_amount+
              $semiother_amount+$othersupp_amount+$water_amount+$elect_amount+$postage_amount+$tele_amount+$tele2_amount+$internet_amount+$extra_amount+$misc_amount+$legal_amount+$aud_amount+$consult_amount+$prof_amount+$janitor_amount+$secu_amount+$othergen_amount+$repairother_amount+
              $repairbuilding_amount+$repairmachine_amount+$repairoffice_amount+$repairict_amount+$repaircomm_amount+$repairtech_amount+$repairtrans_amount+$repairfurniture_amount+$subsidies_amount+$local_amount+
              $setup_amount+$taxes_amount+$fidelity_amount+$insurance_amount+$ads_amount+$print_amount+$represent_amount+$transpo_amount+$rent_amount+$rentmotor_amount+$rentequip_amount+$membership_amount+$subscript_amount+$othermooe_amount;
             
            ?>
             @convertmoney($total_this_mooe) 
            <b></td>
          <td><b>
              <?php
              $total_to_mooe = $local_amount2+$foreign_amount2+$training_amount2+$office_amount2+$accountable_amount2+$drugs_amount2+$medical_amount2+$fuel_amount2+$machine_amount2+$semioffice_amount2+$semiinfo_amount2+$semitechno_amount2+$semidisaster_amount2+
              $semiother_amount2+$othersupp_amount2+$water_amount2+$elect_amount2+$postage_amount2+$tele_amount2+$tele2_amount2+$internet_amount2+$extra_amount2+$misc_amount2+$legal_amount2+$aud_amount2+$consult_amount2+$prof_amount2+$janitor_amount2+$secu_amount2+$othergen_amount2+$repairother_amount2+
              $repairbuilding_amount2+$repairmachine_amount2+$repairoffice_amount2+$repairict_amount2+$repaircomm_amount2+$repairtech_amount2+$repairtrans_amount2+$repairfurniture_amount2+$subsidies_amount2+$local_amount2+
              $setup_amount2+$taxes_amount2+$fidelity_amount2+$insurance_amount2+$ads_amount2+$print_amount2+$represent_amount2+$transpo_amount2+$rent_amount2+$rentmotor_amount2+$rentequip_amount2+$membership_amount2+$subscript_amount2+$othermooe_amount2;
             
            ?>
            @convertmoney($total_to_mooe) 
            <b></td>
          <td><b>
            <?php
            $total_mooe = $total_local+$total_foreign+$total_training+$total_office+$total_accountable+$total_drugs+$total_medical+$total_fuel+$total_machine+$total_semioffice+
            $total_semiinfo+$total_semitechno+$total_semidisaster+$total_semiother+$total_semiothersupp+$total_water+$total_elect+$total_postage+$total_tele+$total_tele2+$total_internet+
            $total_extra+$total_misc+$total_legal+$total_aud+$total_consult+$total_otherprof+$total_janitor+$total_security+$total_othergen+$total_repairother+$total_rmbuilding+$total_rmmachine+$total_repairoffice+
            $total_ict+$total_repaircomm+$total_repairtech+$total_repairtrans+$total_repairfurniture+$total_localgia+$total_setup+$total_taxes+$total_fedility+$total_insurance+$total_ads+
            $total_printing+$total_represent+$total_transpo+$total_rent+$total_rentmotor+$total_rentequip+$total_membership+$total_subscript+$total_othermooe;
            
            ?>
            @convertmoney($total_mooe) 
            <b></td>
        </tr>
        <?php
        $counter = request()->counter;
        $total_aa_new = 0;
        $total_ar_new = 0;
        $total_tr_new = 0;
        $total_td_new = 0;
        $unobli = 0;
        $total_unobli = 0;
        
        echo '<tr>';
        echo '<td id="description">';
        echo '<b><u> Current SAA from DOST-CO </u></b><br>';
        for($x = 0; $x < $counter;$x++){
          echo request()->description_new[$x].'<br>';
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
        
        for($a = 0; $a < $counter;$a++){
          echo request()->uacs_new[$a].'<br><br>';
       }
       echo '</td>';
       echo '<td>';
       echo '<br>';
      
        for($y = 0; $y < $counter;$y++){ 
          echo request()->aa_new[$y].'<br><br>';
          $total_aa_new += request()->aa_new[$y];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
       
        for($b = 0; $b < $counter;$b++){
          echo request()->ar_new[$b].'<br><br>';
          $total_ar_new += request()->ar_new[$b];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
        
        for($w = 0; $w < $counter;$w++){
          echo request()->tr_new[$w].'<br><br>';
          $total_tr_new += request()->tr_new[$w];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
        
        for($q = 0; $q < $counter;$q++){
          echo request()->td_new[$q].'<br><br>';
          $total_td_new += request()->td_new[$q];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
        
          for($e = 0; $e < $counter;$e++){
            $unobli = request()->ar_new[$e]-request()->td_new[$e];
            echo $unobli.'<br><br>';
            $total_unobli += $unobli;
          }
        echo '</td>';
        echo '</tr>';
        ?>
<tr>
  <td id="description"><b>Total SAA from DOST-CO</b></td>
  <td></td>
  <td><b>
 
     @convertmoney($total_aa_new) 
    <b></td>
  <td><b>
     
      @convertmoney($total_ar_new) 
    <b></td>
  <td><b>@convertmoney($total_tr_new)<b></td>
  <td><b>@convertmoney($total_td_new)<b></td>
  <td><b>
     @convertmoney($total_unobli) 
    <b></td>
</tr>
<tr>
    <td id="description"><b><u>Capital Outlay</u></b><br>
    ICT Equipment <br>
    ICT Software <br>
  </td>
  <td>
    <br>
    50604050 02 <br>
    50604050 12 <br>
  </td>
  <td>
      <br>
      {{ request()->aa_ict_equip }} <br>
      {{ request()->aa_ict_sotfware }}
  </td>
  <td>
      <br>
      {{ request()->ar_ict_equip }} <br>
      {{ request()->ar_ict_sotfware }}
  </td>
  <td>
      <br>
      {{ $ict_equip_amount }}<br>
      {{ $ict_software_amount }}
  </td>
  <td>
      <br>
      {{ $ict_equip_amount2 }}<br>
      {{ $ict_software_amount2 }}
  </td>
  <td>
    <br>
      <?php
      $total_ict_equip = request()->ar_ict_equip-$ict_equip_amount2;
      echo $total_ict_equip;
         ?>
      <br>
      <?php
      $total_ict_software = request()->ar_ict_sotfware-$ict_software_amount2;
      echo $total_ict_software;
     ?>
  </td>
  </tr>
  <tr>
      <td id="description"><b>Total - CO</b></td>
      <td></td>
      <td><b>
     <?php
      $total_aa_co = request()->aa_ict_equip+request()->aa_ict_sotfware;
     ?>
         @convertmoney($total_aa_co) 
        <b></td>
      <td><b>
          <?php
          $total_ar_co = request()->ar_ict_equip+request()->ar_ict_sotfware;
         ?>
          @convertmoney($total_ar_co) 
        <b></td>
      <td><b>
        <?php 
        $total_tr_co = $ict_equip_amount+$ict_software_amount;
          ?>
        @convertmoney($total_tr_co)<b></td>
      <td><b>
          <?php 
          $total_td_co = $ict_equip_amount2+$ict_software_amount2;
            ?>
        @convertmoney($total_td_co)<b></td>
      <td><b>
        <?php
        $total_co = $total_ict_equip + $total_ict_software;
        ?>
         @convertmoney($total_co) 
        <b></td>
    </tr>

<?php
        $counter2 = request()->counter2;
        $total_aa_new2 = 0;
        $total_ar_new2 = 0;
        $total_tr_new2 = 0;
        $total_td_new2 = 0;
        $unobli2 = 0;
        $total_unobli2 = 0;
        
        echo '<tr>';
        echo '<td id="description">';
        echo '<b><u> ASA Releases from DOST-CO </u></b><br>';
        for($f = 0; $f < $counter2;$f++){
          echo request()->description_new2[$f].'<br>';
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
       
        for($g = 0; $g < $counter2;$g++){
          echo request()->uacs_new2[$g].'<br><br>';
       }
       echo '</td>';
       echo '<td>';
       echo '<br>';
      
        for($h = 0; $h < $counter2;$h++){ 
          echo request()->aa_new2[$h].'<br><br>';
          $total_aa_new2 += request()->aa_new2[$h];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
        
        for($j = 0; $j < $counter2;$j++){
          echo request()->ar_new2[$j].'<br><br>';
          $total_ar_new2 += request()->ar_new2[$j];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
       
        for($k = 0; $k < $counter2;$k++){
          echo request()->tr_new2[$k].'<br><br>';
          $total_tr_new2 += request()->tr_new2[$k];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
       
        for($l = 0; $l < $counter2;$l++){
          echo request()->td_new2[$l].'<br><br>';
          $total_td_new2 += request()->td_new2[$l];
        }
        echo '</td>';
        echo '<td>';
        echo '<br>';
       
          for($m = 0; $m < $counter2;$m++){
            $unobli2 = request()->ar_new2[$m]-request()->td_new2[$m];
            echo $unobli2.'<br><br>';
            $total_unobli2 += $unobli2;
          }
        echo '</td>';
        echo '</tr>';
        ?>
<tr>
  <td id="description"><b>Total ASA Releases from DOST-CO</b></td>
  <td></td>
  <td><b>
     @convertmoney($total_aa_new2) 
    <b></td>
  <td><b>
     
      @convertmoney($total_ar_new2) 
    <b></td>
  <td><b>@convertmoney($total_tr_new2)<b></td>
  <td><b>@convertmoney($total_td_new2)<b></td>
  <td><b>
     @convertmoney($total_unobli2) 
    <b></td>
</tr>


<tr>
  <td id="description"><b>Total - Continue Appropriation</b></td>
  <td></td>
  <td><b>
    <?php
      $continue_total_aa = $total_aa_new2+$total_aa_co;
      ?>
     @convertmoney($continue_total_aa) 
    <b></td>
  <td><b>
    <?php
    $continue_total_ar = $total_ar_new2+$total_ar_co;
    ?>
      @convertmoney($continue_total_ar) 
    <b></td>
  <td><b>
    <?php
    $continue_total_tr = $total_tr_new2+$total_tr_co;
    ?>
    @convertmoney($continue_total_tr)
    <b></td>
  <td><b>
    <?php
    $continue_total_td = $total_td_new2+$total_td_co;
    ?>
    @convertmoney($continue_total_td)
    <b></td>
  <td><b>
    <?php
    $continue_total_all = $continue_total_ar-$continue_total_td;
    ?>
     @convertmoney($continue_total_all) 
    <b></td>
</tr>



<tr>
    <td id="description"><br><b>GRAND TOTAL</b><br></td>
    <td></td>
    <td><br><b>
      <?php
      $gtotal_aa = $total_aa_new + $total_aa_mooe + $total_aa_ps+$total_aa_new2+$total_aa_co;
      ?>   
     @convertmoney($gtotal_aa) 
    </b><br></td>
    <td><br><b>
        <?php
        $gtotal_ar = $total_ar_new + $total_ar_mooe + $total_ar_ps+$total_ar_new2+$total_ar_co;
        ?> 
        @convertmoney($gtotal_ar)
    </b><br></td>
    <td><br><b>
        <?php
        $gtotal_tr = $total_tr_new + $total_this_mooe + $total_this_ps+$total_tr_new2 + $total_tr_co ;
        ?>
        @convertmoney($gtotal_tr)
    </b><br></td>
    <td><br><b>
        <?php
         $gtotal_td = $total_td_new + $total_to_mooe + $total_to_ps+$total_td_new2 + $total_td_co;
        ?>
        @convertmoney($gtotal_td)
    </b><br></td>
    <td><br><b>
        <?php
        $gtotal_unobli = $total_ps + $total_mooe + $total_unobli+$total_unobli2 + $total_co;
        ?>
         @convertmoney($gtotal_unobli)
    </b><br></td>
  </tr>
        
         

<div id="note">
<div id="certified">
  Certified Correct:
  <br>
  <br>
  <br>
  <b>MARY JOY R. MARTINEZ</b>
  <br>
  AOV (Budget Officer)
</div>
<div id="noted">
       Noted By:
        <br>
        <br>
        <br>
        <b>EDUARDO P. TESORERO</b>
        <br>
        ARD-FASD
</div>


<div id="regional">
  <br>
  <br>
  <br>
  <b>ANTHONY C. SALES, Ph.D., CESO III</b><br>
  Regional Director<br>
  Date: ___________<br>
</div>



</div>
</body>
</html>


