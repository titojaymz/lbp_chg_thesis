<?php
/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 3/2/2020
 * Time: 7:45 PM
 */
$filename = 'aprv_claims_' . date("Ymdhis") . '.xls'; //save our workbook as this file name

header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
?>
Approved claims
<br><br>
<?php foreach($landclass as $landclassData){ ?>
    <table border="1px">
        <tr>
            <td><?php echo $landclassData->land_class_code ?></td>
            <td>FB</td>
            <td>Area</td>
            <td>Amount</td>
            <td>Cash</td>
            <td>Bond</td>
        </tr>
        <?php foreach($apprv_claims as $claimsData) { ?>
            <tr>
                <td><?php echo $claimsData->status_name ?></td>
                <td><?php echo $claimsData->total_fbs ?></td>
                <td><?php echo $claimsData->AREA ?></td>
                <td><?php echo $claimsData->amount ?></td>
                <td><?php echo $claimsData->CASH ?></td>
                <td><?php echo $claimsData->BOND ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
