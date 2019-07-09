
<!DOCTYPE html>
<html>
<head>

    <style>
      *
      {
        font-size: 11px;

      }
      #content
      {
        margin-top: 20px;
        margin-left: 20px;
        margin-right: 20px;
      }
      #header
      {
        border: 1px solid #000;
        width: 100%;
        height: 120px;

      }
      #header img
      {
        margin-left: 47px;
        margin-top: 7px;
      }
      #header2
      {
        width: 100%;
        height: 70px;

      }
      #obli
      {
        float: left;
         border: 1px solid #000;
         padding: 30px 18px 30px 20px;
         text-align: center;
         width: 70%;

      }

      #numdate
      {
        float: right;
        border: 1px solid #000;
        width: 24%;

      }

      #num,#date,#fundcluster
      {
        padding-left: 8px;
        padding-top: -5px;
        padding-bottom: -5.7px;

      }
       #header3
      {
        width: 100%;
        border: 1px solid #000;
        height: 80px;
        border-top-style: none;
       margin-top: 5px;



      }
      #header3left
        {
            height: 80px;
            width: 82%;
           float: left;
           margin-left: -58%;
        }
         #header3right
        {
            height: 80px;
            width: 20%;

            border-right: solid 1px #000;
            margin-right: 380.3px;
            border-right: solid 1px #000;
            float: right;
           /* border-left: solid 1px #000;
           border-bottom: solid 1px #000;*/
           margin-left: auto;

           position: relative;
        }

        #payeelabel, #payeeoffice, #payeeaddress,  #payeeoffice2, #payeeaddress2
        {
            text-align: center;
            height: 15px;

        }
        #payeelabel, #payeeoffice,#payeelabel2, #payeeoffice2
        {
            border-bottom: solid 1px #000;
        }
        #payeelabel2, #payeeoffice2, #payeeaddress2
        {
            height: 15px;
            text-align: left;
            padding-left: 20px;
        }
        #description1
        {
          width: 100%;
          height: 190px;

        }
        #description2
        {
           width: 100%;
          height: 180px;
        }
        #description3
        {
           width: 100%;
          height: 190px;

        }
        #table1
        {
          text-align: center;
          border-collapse: collapse;
        }
      /*  table, th, td {
          border: 1px solid #000;
         /* border-collapse: collapse;*/
        }*/
        th
        {
          height: 30px;
        }
        #td1
        {
          height: 120px;
        }
        #amount_table
        {
          text-align: right;
          padding-right: 10px;
        }
        #description1_total
        {
          width: 100%;
          height: 32px;
          border-left: 1px solid #000;
          border-right: 1px solid #000;
          margin-left: .5px;
          margin-top: -11px;
        }
        #total_1
        {
          padding-top: 8px;
          padding-left: 60%;
        }
        #divcertified
        {
          width: 100%;
          height: 80px;
        }
        #divcertified2
        {
          width: 100%;
          height: 80px;
        }
        #certified1, #certified2
        {
          width: 50%;
          height: 80px;
          border-top: 1px solid #000;
          border-bottom: 1px solid #000;
          border-right: 1px solid #000;
        }
        #certified1
        {
          float: left;
          border-left: 1px solid #000;
        }
        #certified2
        {
          float: right;

        }
        #a
        {
          padding-left: 5px;
        }
        #b
        {
          padding-left: 50px;
          padding-top: -5px;
          text-align: justify;
        }
        #descbottom1, #descbottom2
        {

          height: 100px;
          border-top: 1px solid #000;
          border-bottom: 1px solid #000;
          border-right: 1px solid #000;
          margin-top: 80px;
        }
         #descbottom2
        {
          float: left;
          border-left: 1px solid #000;
          background-color: violet;
          width: 48%;
          padding-left: 10px;

        }
        #descbottom1
        {
          float: right;
          background-color: pink;
          width: 100%;
          border-left: 1px solid #000;
        }

        #signaturediv1, #signaturediv2
        {
          height: 100px;

          border-bottom: 1px solid #000;
          border-right: 1px solid #000;
        }
        #signaturediv1
        {
          float: left;
          width: 49.6%;
        }
        #signaturediv2
        {
          float: right;
          width: 50%;
          border-left: 1px solid #000;
          margin-right: -3px;
          margin-top: 1px;

          margin-left: 602px;
        }
        #signature1
        {
          padding-left: 5px;
          padding-top: 5px;
          height: 26px;
          padding-right: 10px;

        }
          #pos1, #date1
        {
          padding: 3px 10px 3px 5px;
           border-top: 1px solid #000;
        }
        #name1
        {
          padding: 3px 10px 10px 5px;
          border-top: 1px solid #000;
        }
        #signature1, #pos1, #date1, #name1
        {
          width: 20%;
          border-right: 1px solid #000;
        }


        #signature2
        {
          padding-left: 5px;
          padding-top: 5px;
          height: 26px;
          padding-right: 10px;


        }
          #pos2, #date2
        {
          padding: 3px 10px 3px 5px;
           border-top: 1px solid #000;
        }
        #name2
        {
          padding: 3px 10px 5px 5px;
          margin-bottom: 4.7px;
          border-top: 1px solid #000;
        }
        #pos2,  #name2
        {

        text-align: center;

        }
        #leftsignature2
        {
            margin-top: -50px;
            width: 75%;
            height: 40px;
            float: right;
            padding-top: -78px;

        }
        #daqte
        {
          margin-bottom: 5px;
        }

        #spacediv1
        {
          width: 100%;
          background-color: yellow;
          height: 30px;
        }
        #spacediv
        {
          width: 100%;

          height: 20px;
          border-right: 1px solid #000;
          border-left: 1px solid #000;
        }
        #title3
        {
          width: 100%;
          height: 20px;
        }
        #c
        {
          width: 14%;
          float: left;
          padding-left: 5px;
          border: 1px solid #000;
        }
        #statusobli
        {
          width: 85%;
          float: right;
          text-align: center;
          border-top: 1px solid #000;
          border-bottom: 1px solid #000;
          border-right: 1px solid #000;
        }
        #tables
        {
          width: 100%;
          height: 170px;

        }
        #table101
        {
          float: left;
          width: 45%;
          height: 170px;

        }
        #table102
        {
          float: right;
          width: 55%;
          height: 170px;
          margin
        }
        #ref
        {
          width: 100%;
          text-align: center;
          border: 1px solid #000;
        }
        #table101table
        {
          width: 100%;
          text-align: center;
          border-collapse: collapse;
        }
         #table102table
        {
          width: 60%;
          text-align: center;

        }
        #table1, #th1, #td1, #table101table, #id101, #id102, #id103
        {
          border: 1px solid #000;
        }
/*        #id1051, #id1052
        {
          border-right: 1px solid #000;
        }
         #id1051, #id1052, #id1053
        {
          border-bottom: 1px solid #000;
        }*/
        #table102table , #id1051, #id1052, #id1053
        {
          border: .55px solid #000;
          /*border-right: 1px solid #000;*/
          margin-left: -1px;
          border-spacing: 0px;
          border-collapse:separate;

        }

        #last_table
        {
          width: 40%;
          height: 170px;

          float: right;
          margin-top: -165px;
        }
        #last_balance
        {
          text-align: center;
          border: 1px solid #000;
        }
        #th_last, #th_last2
        {
           border: .55px solid #000;
          /*border-right: 1px solid #000;*/
          margin-left: -1px;
          border-spacing: 0px;
          border-collapse:separate;
          font-size: 9px;
          padding-top: -6.5px;
          padding-bottom: -6.5px;

        }
        #th_last
        {
          width: 50px;

        }
        #th_last2
        {
          width: 95px;
        }
    </style>
</head>
<body>
<!-- <font size="5px" face="Arial" > -->
<div id="content">
            <div id="header">
                        <img src="{{ base_path() }}/public/img/header.png" width="590" />
            </div>
             <div id="header2">
                            <div id="obli">
                               <b>OBLIGATION REQUEST AND STATUS<b>
                            </div>
                     <div id="numdate">
                        <div id="num">
                        <p><b>No:  {{ $dataid->reg_orsnum }} </b></p>
                        </div>
                        <div id="date">
                        <p><b>Date:  {{ $dataid->reg_date }} </b></p>
                        </div>
                        <div id="fundcluster">
                        <p><b>Fund Cluster:  1 </b></p>
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
                        <p>DOST XI</p>
                        </div>
                        <div id="payeeaddress2">
                        <p>Davao City</p>
                        </div>
                    </div>
            </div>

            <div id="description1">
              <table width="100.1%" id="table1">
                <tr>
                  <th id="th1" width="15%">Responsiblity Center</th>
                  <th id="th1" width="40%">Particulars</th>
                  <th id="th1" width="10%">MFO/PAP</th>
                  <th id="th1" width="10%">UACS Code/Expenditure</th>
                  <th id="th1" width="35%">Amount</th>
                </tr>
                <tr>
                    <td id="td1"><!-- RC -->{{ $dataid->reg_rc }}</td>
                    <td id="td1"><!-- particulars -->{{ $dataid->reg_particulars }}</td>
                    <td id="td1"><!-- MFO/PAP -->{{ $dataid->reg_pap }}</td>
                    <td id="td1"><!-- MFO/PAP -->{{ $dataid->reg_uacs }}</td>
                    <td id="amount_table"><!-- Amount -->{{ $dataid->reg_amount }}</td>
                </tr>
              </table>
                      <div id="description1_total">
                                <p id="total_1"><b>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $dataid->reg_amount }}</b></p>
                      </div>
            </div>

            <div id="description2">
                <!-- height: 180px -->
                <div id="divcertified">
                <div id="certified1">
                      <p id="a"><b>A.</b></p>
                      <p id="b"><b>Certified:</b> Charges to appropriation/alloment necessary,<br>
                        lawful and under my direct supervision;<br>
                        and supporting documents valid, proper and legal</p>
                </div>
                <div id="certified2">
                     <p id="a"><b>B.</b></p>
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
                                  AO V (Budget Officer
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
                                  <b>DR. ANTHONY C. SALES, CESO III</b>
                                </div>
                                <div id="pos2">
                                  Regional Director
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
                        <td id="id103">{{ $dataid->reg_orsnum }}</td>
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
                        <td id="id1051">({{ $dataid->reg_amount }})</td>
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
                        <td id="id1051">({{ $dataid->reg_amount }}) </td>
                        <td id="id1052"></td>
                        <td id="id1053">Total</td>
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
                         <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">({{ $dataid->reg_amount }})</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>
                       <tr>
                        <td id="id1051">&nbsp;</td>
                        <td id="id1052">&nbsp;</td>

                      </tr>

                      </table>

                    </div>

                  </div>

                </div>
            </div>
</div>


</body>
<div class="modal-footer">
        {{--  <a href="{{ url('/pdf_print/pdf') }}" class="print"><i class="fas fa-print fa-2x" id="fafaedit" title="Print"></i></a>
        {{ csrf_field() }}  --}}

    </div>
</html>
