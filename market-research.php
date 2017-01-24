<?php
$PageTitle = "Market Research";
include "header.php";
?>

<div class="banner overlay">
  <h2>NSI MARKET RESEARCH</h2>
</div>

<div class="market-research">
  NSI's co-op sampling programs include independent market research conducted by WB&amp;A. The objective of the market research is to measure the impact the product samples and offers/coupons had on purchasing behavior. Brands supply their own questions which typically measure changes in brand awareness, usage and purchase.<br>
  <br>

  NSI utilizes a test versus control cell design 2-3 months after distribution. The test group is composed of target audience sample recipients. The control group is comprised of target audience members who did not receive a sample. WB&amp;A &amp; NSI provide a research report on individual brand performance including ROI and a proprietary payback analysis.<br>
  <br>
  <br>

  <hr>

  <h1 id="payback-calculator">PAYBACK CALCULATOR</h1>
  
  <script type="text/javascript" src="inc/jquery.jqplot.min.js"></script>
  <script type="text/javascript" src="inc/jqplot.canvasTextRenderer.js"></script>
  <script type="text/javascript" src="inc/jqplot.canvasAxisLabelRenderer.js"></script>
  <link rel="stylesheet" type="text/css" href="inc/jquery.jqplot.css">

  <script type="text/javascript">
    $(document).ready(function() {
      function Calculate() {
        var total = Math.round($("#samples").val() * $("#point").val());
        var twox = Math.round(total * 0.5);
        var threex = Math.round(twox * 0.75);
        var fourx = Math.round(threex * 0.85);
        var fivex = Math.round(fourx * 0.98);
        var sixx = Math.round(fivex * 0.98);
        
        var minusthirtyfive = ($("#retailprice").val() * 0.35).toFixed(2);
        var contperunit = Math.round((($("#retailprice").val() - minusthirtyfive) - $("#costofgoods").val()) * 100) / 100;
        var totalonex = Math.round(contperunit * total);
        var totaltwox = Math.round(contperunit * twox);
        var totalthreex = Math.round(contperunit * threex);
        var totalfourx = Math.round(contperunit * fourx);
        var totalfivex = Math.round(contperunit * fivex);
        var totalsixx = Math.round(contperunit * sixx);
        var totalvar = totalonex + totaltwox + totalthreex + totalfourx + totalfivex + totalsixx;
        var totalsamplecost = Math.round($("#samples").val() * $("#samplecost").val());
        var totalpayback = Math.round(totalvar - 5000 - totalsamplecost);
        var totalpurchases = Math.round(total + twox + threex + fourx + fivex + sixx);
        
        $(".total").text(total);
        $(".twox").text(twox);
        $(".threex").text(threex);
        $(".fourx").text(fourx);
        $(".fivex").text(fivex);
        $(".sixx").text(sixx);
        
        $(".minusthirtyfive").text("$" + minusthirtyfive);
        $(".contperunit").text("$" + contperunit);
        $(".totalonex").text("$" + totalonex);
        $(".totaltwox").text("$" + totaltwox);
        $(".totalthreex").text("$" + totalthreex);
        $(".totalfourx").text("$" + totalfourx);
        $(".totalfivex").text("$" + totalfivex);
        $(".totalsixx").text("$" + totalsixx);
        $(".totalvar").text("$" + totalvar);
        $(".totalsamplecost").text("$" + totalsamplecost);
        $(".totalpayback").text("$" + totalpayback);
        $(".totalpurchases").text("$" + totalpurchases);
        
        return [total, twox, threex, fourx, fivex, sixx];
      }
      
      $("input[type=\'text\']").keyup( function() {
        var a = Calculate();
        plot1.series[0].data = [[1,a[0]], [2,a[1]], [3,a[2]], [4,a[3]], [5,a[4]], [6,a[5]]];
        plot1.replot({resetAxes: true});
      });
      
      var a = Calculate();
      MyData = [[1,a[0]], [2,a[1]], [3,a[2]], [4,a[3]], [5,a[4]], [6,a[5]]];
      plot1 = $.jqplot("chartdiv", [MyData], {
        title: "ESTIMATED REPEAT DECAY CURVE",
        axesDefaults: { labelRenderer: $.jqplot.CanvasAxisLabelRenderer },
        axes: { xaxis: { label: "# repeat purchases", pad: 1 }, yaxis: { label: "# units sold" } },
        seriesDefaults: { color: "#444444", lineWidth: 1, markerOptions: { style: "filledSquare", size: 8, color: "#00FF00", shadow: false } },
        grid: { gridLineColor: "#000000", background: "#FFFFFF", borderColor: "#000000", borderWidth: 1.0, shadow: false }
      });
    });
  </script>

  <div style="text-align: center; font-weight: bold; font-size: 125%;">
    YEAR 1 ANALYSIS OF Brand X PARTICIPATION IN NSI'S SAMPLING PROGRAM Gift Pack<br>
    <br>
    <br>
    
    Brand X reported a +8 point increase in "Most Likely To Use Next".<br>
    <br>

    It increased from 6% in the Control Cell to 14% in the Test Cell.
  </div>

  <br><br>

  <table class="samples" cellspacing="0" cellpadding="0">
    <tr>
      <td>Gift Pack total samples</td>
      <td><input type="text" id="samples" value="1000000"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Average point increase</td>
      <td><input type="text" id="point" value="0.08"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="total"></td>
      <td>new 1x purchases</td>
    </tr>
  </table>

  <br>

  <div id="chartdiv"></div>

  <br>

  <table cellspacing="0" cellpadding="0" class="ratios">
    <tr>
      <td style="text-align: right;">*repeat purchases</td>
      <td>1x</td>
      <td>2x</td>
      <td>3x</td>
      <td>4x</td>
      <td>5x</td>
      <td>6x</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: right;">units sold</td>
      <td class="total"></td>
      <td class="twox"></td>
      <td class="threex"></td>
      <td class="fourx"></td>
      <td class="fivex"></td>
      <td style="font-style: italic;" class="sixx"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6">&nbsp;</td>
      <td colspan="2"><em>long time<br>loyal users</em></td>
    </tr>
  </table>

  <br><br><br><br>

  <div style="text-align: center; font-weight: bold; font-size: 125%;">
    Brand X YEAR 1 PAYBACK
  </div>

  <br>

  <table cellspacing="0" cellpadding="0" class="payback">
    <tr>
      <td colspan="7">Variable Contribution Per Unit</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td style="text-align: left;" colspan="2">retail price</td>
      <td style="text-align: right;">$<input type="text" id="retailprice" value="2.49"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td style="text-align: right;">-35%</td>
      <td style="text-align: left;" colspan="2">wholesale discount</td>
      <td style="text-align: right;" class="minusthirtyfive"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td style="text-align: right;">(minus)</td>
      <td style="text-align: left;" colspan="2">cost of goods</td>
      <td style="text-align: right;">$<input type="text" id="costofgoods" value="0.60"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="text-align: right;">(equals)</td>
      <td colspan="3">variable contribution per unit</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr><td colspan="7">&nbsp;</td></tr>
    
    <tr>
      <td colspan="7">Variable Contribution Per Unit x Units Sold = Total Variable Contribution</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>x</td>
      <td class="total"></td>
      <td>=</td>
      <td style="text-align: right;" class="totalonex"></td>
      <td>(1x)</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(plus)</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>x</td>
      <td class="twox"></td>
      <td>=</td>
      <td style="text-align: right;" class="totaltwox"></td>
      <td>(2x)</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(plus)</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>x</td>
      <td class="threex"></td>
      <td>=</td>
      <td style="text-align: right;" class="totalthreex"></td>
      <td>(3x)</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(plus)</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>x</td>
      <td class="fourx"></td>
      <td>=</td>
      <td style="text-align: right;" class="totalfourx"></td>
      <td>(4x)</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(plus)</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>x</td>
      <td class="fivex"></td>
      <td>=</td>
      <td style="text-align: right;" class="totalfivex"></td>
      <td>(5x)</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(plus)</td>
      <td style="text-align: right;" class="contperunit"></td>
      <td>x</td>
      <td class="sixx"></td>
      <td>=</td>
      <td style="text-align: right;" class="totalsixx"></td>
      <td>(6x)</td>
    </tr>
    
    <tr>
      <td colspan="5">&nbsp;</td>
      <td><hr></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(equals)</td>
      <td style="text-align: left;" colspan="4">Total variable contribution</td>
      <td style="text-align: right;" class="totalvar"></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(minus)</td>
      <td style="text-align: left;" colspan="4">Total program cost</td>
      <td style="text-align: right;">$5000</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(minus)</td>
      <td style="text-align: left;" colspan="4">Total sample cost $<input type="text" id="samplecost" value="0.10"></td>
      <td style="text-align: right;" class="totalsamplecost"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td colspan="5">&nbsp;</td>
      <td><hr></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td style="text-align: right;">(equals)</td>
      <td style="text-align: left; font-size: 110%; white-space: normal;" colspan="4">Total year 1 payback at 6x repeat</td>
      <td style="text-align: right; font-size: 110%;" class="totalpayback"></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr><td colspan="7">&nbsp;</td></tr>
    
    <tr>
      <td>&nbsp;</td>
      <td style="text-align: left; font-size: 110%; white-space: normal;" colspan="4">Total year 1 incremental purchases</td>
      <td style="text-align: right; font-size: 110%;" class="totalpurchases"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>

<?php include "footer.php"; ?>