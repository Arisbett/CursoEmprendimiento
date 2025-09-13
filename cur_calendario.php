<?php
/**/ini_set("display_errors", "1");
error_reporting(E_ALL);
/*header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");*/

//include("includes/cur_header.php");
//include ("includes/funciones.php");

$calendario = select("*", "generaciones", "generacion=$id_generacion", "");
/*$m1i = explode('-',$calendario[0]["mod1_inicio"]);
$m1f = explode('-',$calendario[0]["mod1_fin"]);
$me1i = explode('-',$calendario[0]["evaluacion1_inicio"]);
$me1f = explode('-',$calendario[0]["evaluacion1_fin"]);

$m2i = explode('-',$calendario[0]["mod2_inicio"]);
$m2f = explode('-',$calendario[0]["mod2_fin"]);
$me2i = explode('-',$calendario[0]["evaluacion2_inicio"]);
$me2f = explode('-',$calendario[0]["evaluacion2_fin"]);

$m3i = explode('-',$calendario[0]["mod3_inicio"]);
$m3f = explode('-',$calendario[0]["mod3_fin"]);
$me3i = explode('-',$calendario[0]["evaluacion3_inicio"]);
$me3f = explode('-',$calendario[0]["evaluacion3_fin"]);


<?=//$m1i[2].' de '.mes_espaniol($m1i[1]+0)?> al <?=$m1f[2].' de '.mes_espaniol($m1f[1]+0)?>
*/

?>

<h3>Calendario</h3><hr class="red">
        <center>
    <table class="table" style="max-width:80%;">
                                <tbody>
                                    <tr align="center">
                                        <td align="center"><strong>M&oacute;dulo</strong></td>
                                        <td align="center"><strong>Periodo</strong></td>
                                        <td align="center"><strong>Evaluación</strong></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>I</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>II</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>III</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                </tbody>
                            </table>
</center>

                            <!--<ul class="list-unstyled list-inline pull-right">
                                <li>

                                    <button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button>
                                </li>
                            </ul>-->

