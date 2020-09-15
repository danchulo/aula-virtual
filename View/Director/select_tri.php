
 <?php 
session_start();
$tri=$_SESSION['trimestre']; 
foreach ($tri as $IndiceTri => $valTri){}
?>

    <option value="0">Eliga Trimestre</option>
    <?php foreach ($valTri as $trimestre){?>
    <option selected value="<?php echo $trimestre['TRIMESTRE_ID']?>"><?php echo $trimestre['TRIMESTRE_CARGA']?></option>
    <?php } 
   
