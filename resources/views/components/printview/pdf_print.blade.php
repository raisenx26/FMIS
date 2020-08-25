<!DOCTYPE html>
<html>

<head>

        <style>
                * {
                    font-size: 11px;
        
                }
        
                #content {
                    margin-top: 20px;
                    margin-left: 20px;
                    margin-right: 20px;
                }
        
                #header {
                    border: 1px solid #000;
                    width: 100%;
                    height: 120px;
        
                }
        
                #header img {
                    margin-left: 47px;
                    margin-top: 30px;
                }
        
                #header2 {
                    width: 100%;
                    height: 70px;
        
                }
        
                #obli {
        
                    float: left;
                    border-right: 1px solid #000;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                    padding: 30px 18px 30px 20px;
                    text-align: center;
                    width: 68%;
        
                }
        
                #numdate {
                    float: right;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                    width: 26%;
                }
                /* #numdate p {
               font-size: 8.8px;
        
                }*/
        
                #num,
                #date,
                #fundcluster {
                    padding-left: 8px;
                    padding-top: -5px;
                    padding-bottom: -5.7px;
        
        
                }
        
                #header3 {
                    width: 100%;
                    border-top: 1px solid #000;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    height: 80px;
                    border-top-style: none;
                    margin-top: 4.5px;
        
        
        
                }
        
                #header3left {
                    height: 80px;
                    width: 82%;
                    float: right;
                   
                }
        
                #header3right {
                    height: 80px;
                    width: 20%;
        
                    border-right: solid 1px #000;
                   
                    border-right: solid 1px #000;
                    float: left;
                    /* border-left: solid 1px #000;
                   border-bottom: solid 1px #000;*/
                   
        
                    position: relative;
                }
        
                #payeelabel,
                #payeeoffice,
                #payeeaddress,
                #payeeoffice2,
                #payeeaddress2 {
                    text-align: center;
                    height: 15px;
        
                }
        
                #payeelabel,
                #payeeoffice,
                #payeelabel2,
                #payeeoffice2 {
                    border-bottom: solid 1px #000;
                }
        
                #payeelabel2,
                #payeeoffice2,
                #payeeaddress2 {
                    height: 15px;
                    text-align: left;
                    padding-left: 20px;
                }
        
                #description1 {
                    width: 100%;
                    height: 210px;
                    margin-top: -1px;
                }
        
                #description2 {
                    width: 100%;
                    height: 170px;
                    margin-top: 50px;
                }
        
                #description3 {
                    width: 100%;
                    height: 190px;
        
                }
        
                #table1 {
                    text-align: center;
                    border-collapse: collapse;
                    margin-left: -.5px;
                }
        
                /*  table, th, td {
                  border: 1px solid #000;
                 /* border-collapse: collapse;*/
                }
        
                */ th {
                    height: 30px;
                }
        
                #td1 {
                    height: 190px;
                    
                }
        
                #amount_table {
                    text-align: right;
                    padding-right: 10px;
                }
        
                #description1_total {
                    width: 100%;
                    height: 34px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    margin-top: -11px;
                }
        
                #total_1 {
                    padding-top: 8px;
                    padding-left: 60%;
                    width: 8%;
                    float: left;
                }
        
                #divcertified {
                    width: 100%;
                    height: 80px;
                }
        
                #divcertified2 {
                    width: 100%;
                    height: 80px;
                }
        
                #certified1,
                #certified2 {
                    width: 50%;
                    height: 80px;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                    border-right: 1px solid #000;
                }
        
                #certified1 {
                    float: left;
                    border-left: 1px solid #000;
                }
        
                #certified2 {
                    float: right;
        
                }
        
                #aa, #ab {
                   
                    padding-left: 7px;
                    width: 15%;
                    height: 20px;
                    margin-top: -1px;
                    border-bottom: 1px solid #000;
                    border-right: 1px solid #000;
        
                }
                #ab
                {
                     margin-left: 2px;
                }
        
                #b {
                    padding-left: 60px;
                    padding-top: -5px;
                    text-align: justify;
                }
        
                #descbottom1,
                #descbottom2 {
        
                    height: 100px;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                    border-right: 1px solid #000;
                    margin-top: 80px;
                }
        
                #descbottom2 {
                    float: left;
                    border-left: 1px solid #000;
                    background-color: violet;
                    width: 48%;
                    padding-left: 10px;
        
                }
        
                #descbottom1 {
                    float: right;
                    background-color: pink;
                    width: 100%;
                    border-left: 1px solid #000;
                }
        
                #signaturediv1,
                #signaturediv2 {
                    height: 100px;
        
                    border-bottom: 1px solid #000;
                    border-right: 1px solid #000;
                }
        
                #signaturediv1 {
                    float: left;
                    width: 49.6%;
                }
        
                #signaturediv2 {
                    float: right;
                    width: 50%;
                    border-left: 1px solid #000;
                    margin-right: -3px;
                    margin-top: 1px;
                    margin-left: 601.5px;
                    margin-top: -0.1px;
        
                }
        
                #signature1 {
                    padding-left: 5px;
                    padding-top: 5px;
                    height: 26px;
                    padding-right: 10px;
        
                }
        
                #pos1,
                #date1 {
                    padding: 3px 10px 3px 5px;
                    border-top: 1px solid #000;
                }
        
                #name1 {
                    padding: 3px 10px 10px 5px;
                    border-top: 1px solid #000;
                }
        
                #signature1,
                #pos1,
                #date1,
                #name1 {
                    width: 20%;
                    border-right: 1px solid #000;
                }
        
        
                #signature2 {
                    padding-left: 5px;
                    padding-top: 5px;
                    height: 26px;
                    padding-right: 10px;
        
        
                }
        
                #pos2,
                #date2 {
                    padding: 3px 10px 3px 5px;
                    border-top: 1px solid #000;
                }
        
                #name2 {
                    padding: 3px 10px 5px 5px;
                    margin-bottom: 4.7px;
                    border-top: 1px solid #000;
                }
        
                #pos2,
                #name2 {
        
                    text-align: center;
        
                }
        
                #leftsignature2 {
                    margin-top: -50px;
                    width: 75%;
                    height: 40px;
                    float: right;
                    padding-top: -78px;
        
                }
        
                #daqte {
                    margin-bottom: 5px;
                }
        
                #spacediv1 {
                    width: 100%;
                    background-color: yellow;
                    height: 30px;
                }
        
                #spacediv {
                    width: 100%;
        
                    height: 20px;
                    border-right: 1px solid #000;
                    border-left: 1px solid #000;
                }
        
                #title3 {
                    width: 100%;
                    height: 20px;
                }
        
                #c {
                    width: 7%;
                    float: left;
                    padding-left: 5px;
                    border: 1px solid #000;
                }
        
                #statusobli {
                    width: 92%;
                    float: right;
                    text-align: center;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                    border-right: 1px solid #000;
                }
        
                #tables {
                    width: 100%;
                    height: 170px;
        
                }
        
                #table101 {
                    float: left;
                    width: 45%;
                    height: 170px;
        
                }
        
                #table102 {
                    float: right;
                    width: 55%;
                    height: 170px;
                    margin
                }
        
                #ref {
                    width: 100%;
                    text-align: center;
                    border: 1px solid #000;
                }
        
                #table101table {
                    width: 100%;
                    text-align: center;
                    border-collapse: collapse;
                }
        
                #table102table {
                    width: 60%;
                    text-align: center;
                   
        
                }
        
                #table1,
                #th1,
                #td1,
                #table101table,
        
                #id101,
                #id102,
                #id103 {
                    border: .5px solid #000;
                }
        
                /*        #id1051, #id1052
                {
                  border-right: 1px solid #000;
                }
                 #id1051, #id1052, #id1053
                {
                  border-bottom: 1px solid #000;
                }*/
        
                #table102table,
                #id1051,
                #id1052,
                #id1053 {
                    border: .25px solid #000;
                    /*border-right: 1px solid #000;*/
                  /*  margin-left: -1px;*/
                    border-spacing: 0px;
                    border-collapse: separate;
        
                }
        
                #last_table {
                    width: 40%;
                    height: 170px;
        
                    float: right;
                    margin-top: -165px;
        
                }
        
                #last_balance {
                    text-align: center;
                    border: 1px solid #000;
                }
        
                #th_last,
                #th_last2 {
                    border: .55px solid #000;
                    /*border-right: 1px solid #000;*/
                    margin-left: -1px;
                    border-spacing: 0px;
                    border-collapse: separate;
                    font-size: 8px;
                    padding-top: -6.5px;
                    padding-bottom: -6.5px;
        
                }
                 #total_amount
                {
                  
                   float: right;
                  
                  padding-right: 8px;
                }
        
                #th_last {
                    width: 70px;
        
                }
        
                #th_last2 {
                    width: 75px;
                }
                 #th_last2 th
        {
             font-size: 6px;
        }

                #border_line
                {  
                    
                  margin:0.5;
                  line-height:1.0;
                  border-bottom:1px solid #000;
                 
                }
    </style>
</head>

<body>
    <!-- <font size="5px" face="Arial" > -->
    <div id="content">
        <div id="header">
            <img src="{{ base_path() }}/public/img/header.jpg" width="590" />
        </div>
        <div id="header2">
            <div id="obli">
                <b>OBLIGATION REQUEST AND STATUS<b>
            </div>
            <div id="numdate">
                <div id="num">
                    <p><b>No:
                            {{ str_replace("/", "-", request()->reg_ors) . request()->reg_date . request()->reg_ors2 }}
                        </b></p>
                </div>
                <div id="date">
                    <p><b>Date: {{ $dataid->reg_date }} </b></p>
                </div>
                <div id="fundcluster">
                    <p><b>Fund Cluster: {{ $dataid->reg_fundcluster }} </b></p>
                </div>
            </div>

        </div>

        <div id="header3">
            <div id="header3right">
                <div id="payeelabel">
                    <p>Payee:</p>
                </div>
                <div id="payeeoffice">
                    <p>Office:</p>
                </div>
                <div id="payeeaddress">
                    <p>Address:</p>
                </div>
            </div>

            <div id="header3left">
                <div id="payeelabel2">
                    <p><b> {{ $dataid->reg_payee }} </b></p>
                </div>
                <div id="payeeoffice2">
                    <p>{{ request()->reg_office }}</p>
                </div>
                <div id="payeeaddress2">
                    <p>{{ request()->reg_address }}</p>
                </div>
            </div>
        </div>

        <div id="description1">
            <table width="100.1%" id="table1">
                <tr>
                    <th id="th1" width="20.9%">Responsiblity Center</th>
                    <th id="th1" width="40%">Particulars</th>
                    <th id="th1" width="10%">MFO/PAP</th>
                    <th id="th1" width="7%">UACS Code/Expenditure</th>
                    <th id="th1" width="26%">Amount</th>
                </tr>
                <tr>
                    <td id="td1">
                        <!-- RC --> <?php
                               if(empty($dataid->reg_rc))
                               {
                                   $x = 0;
                                   $y = 0;
                               }
                               else
                               {
                                   $x = explode(',',$dataid->reg_rc);
                                   $y = count($x);
                               }
                                if($y!=0){
                                    setlocale(LC_MONETARY, 'en_US');
                                    foreach($x as $z){
                                        if($z!=0)
                                        {
                                        echo $z;
                                        echo "<br>";
                                        }
                                    }
                                }
                            ?></td>
                    <td id="td1">
                        <!-- particulars -->{{ $dataid->reg_particulars }} 
                        <br>
                        <br>
                        <br>
                        <table width="100%">
                            <tr>
                              <td><div >{{ request()->par1 }} </div></td>
                              <td><div >{{ request()->par2 }}</div></td>
                              <td><div >{{ request()->par3 }}</div></td>
                              <td><div >{{ request()->par4 }}</div></td>
                            </tr>
                            <tr>
                              <td><div >{{ request()->par5 }}</div></td>
                              <td><div >{{ request()->par6 }}</div></td>
                              <td><div >{{ request()->par7 }}</div></td>
                              <td><div >{{ request()->par8 }}</div></td>
                            </tr>
                            <tr>
                              <td><div >{{ request()->par9 }}</div></td>
                              <td><div >{{ request()->par10 }}</div></td>
                              <td><div >{{ request()->par11 }}</div></td>
                              <td><div >{{ request()->par12 }}</div></td>
                            </tr>
                            <tr>
                                <td><div >{{ request()->par13 }}</div></td>
                                <td><div >{{ request()->par14 }}</div></td>
                                <td><div >{{ request()->par15 }}</div></td>
                                <td><div >{{ request()->par16 }}</div></td>
                              </tr>
                          </table>
                        
                    </td>
                    <td id="td1">
                        <!-- MFO/PAP -->{{ $dataid->reg_pap }}</td>
                    <td id="td1">
                        <!-- MFO/PAP -->{{ $dataid->reg_uacs }}
                        <?php
                        if(empty($dataid->reg_subaccode))
                        {
                            $x = 0;
                            $y = 0;
                        }
                        else
                        {
                            $x = explode(',',$dataid->reg_subaccode);
                            $y = count($x);
                        }

                        if($y!=0){
                            echo '<br>';
                            echo '<p id="border_line"></p>';
                            foreach($x as $z){
                                echo $z;
                                echo "<br>";
                            }
                        }
                       
                        
                    ?>
                    </td>
                    <td id="amount_table">
                        <!-- Amount --><b>@convertmoney($dataid->reg_amount)</b>
                        <?php
                             if(empty($dataid->reg_subamount))
                             {
                                 $x = 0;
                                 $y = 0;
                             }
                             else
                             {
                                 $x = explode(',',$dataid->reg_subamount);
                                 $y = count($x);
                             }     
                            if($y!=0){
                                setlocale(LC_MONETARY, 'en_US');
                                echo '<br>';
                                echo '<p id="border_line"></p>';
                                foreach($x as $z){
                                    if($z!=0)
                                    {
                                        echo number_format($z, 2, '.' , ',');
                                        echo "<br>";
                                    }
                                   
                                }
                            }
                           
                        ?>
                    </td>
                </tr>
            </table>
            <div id="description1_total">
                <p id="total_1">
                    <b>Total </b>
                </p> 
                <p id="total_amount">
                         @convertmoney($dataid->reg_amount)
                </p>    
            </div>
        </div>

        <div id="description2">
            <!-- height: 180px -->
            <div id="divcertified">
                <div id="certified1">
                    <p id="aa"><b>A.</b></p>
                    <p id="b"><b>Certified:</b> Charges to appropriation/alloment necessary,<br>
                        lawful and under my direct supervision;<br>
                        and supporting documents valid, proper and legal</p>
                </div>
                <div id="certified2">
                    <p id="ab"><b>B.</b></p>
                    <p id="b"><b>Certified:</b>Allotment available and<br>
                        obligated for the purpose/adjustment<br>
                        necessary as indicated above</p>
                </div>
            </div>

            <div id="divcertified2">
                <div id="signaturediv1">
                    <!-- right div -->
                    <div id="signature1">
                        Signature
                    </div>
                    <div id="name1">
                        Printed Name
                    </div>
                    <div id="pos1">
                        Position
                    </div>
                    <div id="date1">
                        Date
                    </div>

                    <div id="leftsignature2">
                        <div id="signature2">

                        </div>
                        <div id="name2">
                            <b>MARY JOY R. MARTINEZ</b>
                        </div>
                        <div id="pos2">
                            AOV (Budget Officer)
                        </div>
                        <div id="date2">

                        </div>
                    </div>
                </div>


                <div id="signaturediv2">
                    <div id="signature1">
                        Signature
                    </div>
                    <div id="name1">
                        Printed Name
                    </div>
                    <div id="pos1">
                        Position
                    </div>
                    <div id="date1">
                        Date
                    </div>

                    <div id="leftsignature2">
                        <div id="signature2">

                        </div>
                        <div id="name2">
                            <b>{{ request()->asignatories_name }}</b>
                        </div>
                        <div id="pos2">
                            {{ $asig_data->asignatories_pos }}
                        </div>
                        <div id="date2">

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div id="description3">
            <!-- height: 190px -->
            <div id="spacediv">
                <!--  SPACE HERE  -->
            </div>

            <div id="title3">
                <div id="c">
                    <b>C.</b>
                </div>
                <div id="statusobli">
                    <b>STATUS OF OBLIGATION<b>
                </div>
            </div>

            <div id="tables">


                <div id="table101">
                    <!-- RIGHT TABLE -->
                    <div id="ref">
                        Reference
                    </div>
                    <table id="table101table">
                        <tr>
                            <th id="id101">Date</th>
                            <th id="id101">Particulars</th>
                            <th id="id101">ORS/JEV/Check<br>
                                ADA/TRA No.</th>
                        </tr>
                        <tr>
                            <td id="id101"> {{ $dataid->reg_date }}</td>
                            <td id="id102">Obligation</td>
                            <td id="id103">
                                <?php
                                 $x = $dataid->reg_orsnum;
                                echo str_replace("/", "-", $x);
                                ?></td>
                        </tr>

                        <tr>
                            <td id="id101"></td>
                            <td id="id101"></td>
                            <td id="id101">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id101"></td>
                            <td id="id101"></td>
                            <td id="id101">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id101"></td>
                            <td id="id101"></td>
                            <td id="id101">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id101"></td>
                            <td id="id101"></td>
                            <td id="id101">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id101"></td>
                            <td id="id101"></td>
                            <td id="id101">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id101"></td>
                            <td id="id101"></td>
                            <td id="id101">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id101"> </td>
                            <td id="id101"></td>
                            <td id="id101">Total</td>
                        </tr>

                    </table>
                </div>

                <div id="table102">
                    <!-- LEFT TABLE -->
                    <div id="ref">
                        Amount
                    </div>
                    <table id="table102table">
                        <tr id="qwe">
                            <th id="id1051">Obligation</th>
                            <th id="id1052">Payable</th>
                            <th id="id1053">Payment</th>
                            </th>
                        </tr>
                        <tr>
                            <td id="id1051">@convertmoney($dataid->reg_amount)</td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051"></td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051"></td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051"></td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051"></td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051"></td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051"></td>
                            <td id="id1052"></td>
                            <td id="id1053">&nbsp;</td>
                        </tr>

                        <tr>
                            <td id="id1051">@convertmoney($dataid->reg_amount)</td>
                            <td id="id1052"></td>
                            <td id="id1053"></td>
                        </tr>

                    </table>

                    <div id="last_table">
                        <div id="last_balance">
                            balance
                        </div>
                        <table <table id="table102table">>
                            <tr>
                                <th id="th_last">Not Yet Due</th>
                                <th id="th_last2">Due and Demandable</th>
                            </tr>
                            @if(request()->option=='dueanddemandable')
                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052">@convertmoney($dataid->reg_amount)</td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>
                                <td id="id1051">&nbsp;</td>
                                <td id="id1052"></td>
                            </tr>
                            @elseif(request()->option=='notyetdue')
                            <tr>
                                <td id="id1051">@convertmoney($dataid->reg_amount)</td>
                                <td id="id1052"></td>
                            </tr>

                            <tr>

                                <td id="id1052"></td>
                                <td id="id1053">&nbsp;</td>
                            </tr>

                            <tr>

                                <td id="id1052"></td>
                                <td id="id1053">&nbsp;</td>
                            </tr>

                            <tr>

                                <td id="id1052"></td>
                                <td id="id1053">&nbsp;</td>
                            </tr>

                            <tr>

                                <td id="id1052"></td>
                                <td id="id1053">&nbsp;</td>
                            </tr>

                            <tr>

                                <td id="id1052"></td>
                                <td id="id1053">&nbsp;</td>
                            </tr>

                            <tr>

                                <td id="id1052"></td>
                                <td id="id1053">&nbsp;</td>
                            </tr>

                            <tr>
                                <td id="id1051"></td>
                                <td id="id1052">&nbsp;</td>

                            </tr>
                            @endif
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>


</body>

</html>
