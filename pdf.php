<?php
require_once './classes/dompdf/autoload.inc.php';
require_once './classes/MySql.php';
require_once './config.php';
require_once './classes/Painel.php';

$periodo = filter_input_array(INPUT_GET, FILTER_DEFAULT);
if(isset($_GET['acao_pdf']) ){

   

    $query = "SELECT * FROM chamados WHERE `data` BETWEEN :inicio AND :fim AND status= 1";
    $sql = MySql::conectar()->prepare($query);
    $sql->bindParam(':inicio', $periodo['inicio']);
    $sql->bindParam(':fim', $periodo['fim']);
    $sql->execute();
    $chamados = $sql->fetchAll();
}else{
    $query = "SELECT * FROM chamados WHERE status= 1";
    $sql = MySql::conectar()->prepare($query);
    $sql->execute();
    $chamados = $sql->fetchAll();
}


   $page = '<style>
            table{
                margin: 0 auto;
                width: 80%;
                text-transform: uppercase;
                border-collapse:collapse ;
            }

            img{
                width: 250px;
                margin-top: -50px;
                margin-left: -40px;
                margin-bottom: -70px;
                
            }

            td{
                border: solid 2px #00bfa5;
                text-align: center;
                padding: 50px;
                

            }

            .logo td{
                padding:0;
                border: none;
            }

            .single td{
                padding: 20px;
                text-align: left;
                margin-bottom: 20px; 
            }

            .dual td{
                width: 50%;
                padding:unset;
            }

            table{
                margin-bottom: 10px;
            }

            .info{
                text-align: left;
                padding-left: 10px !important;
            }

            span{
                font-weight: bold;
            }

            .main{
                margin-bottom: 100px;
                page-break-after: always;
            }

            .chamado td{
                width: 50%;
                padding: 10px;                
            }

        </style>';


foreach ($chamados as $key => $value) {
    $tecnico = Painel::select('tb_admin.usuarios','id=?', array($value['tec_id']))['nome'];		
    $usuario = Painel::select('tb_admin.usuarios','id=?',array($value['user_id']))['user'];    
    $nomeAtivo = Painel::select('ativos','id=?',array($value['ativos_id']))['nome'];
   
    $page .= '
        <div class="main">
            <table>
                <tr class="logo">
                    <td><img src="'.INCLUDE_PATH.'images/lhcons_logo.jpeg" alt=""></td>
                </tr>
                <tr class="dual">
                    <td><h1>relatorio de atividades tecnicas</h1></td>
                    <td class="info">
                        <h2>prestador:</h2>
                        <p>'.$tecnico.'</p>
                        <p><span>ref:</span> '.date('d/m/Y',strtotime($value['data'])).'</p>
                    </td> 
                </tr>
            </table>

            <table>

                <tr class="single">
                    <td colspan="2"><p><span>Cliente:</span> BENEFICENCIA HOSPITALAR CESARIO DE LANGE</p></td>
                </tr>
            </table>

            <table>

                <tr class="single">
                    <td colspan="2"><p><span>Unidade:</span> HOSPITAL MUNICIPAL DA CRIANÇA E DO ADOLESCENTE</p></td>
                </tr>
            </table>

            <table>
                <tr class="single">
                    <td colspan="2">
                        <ul class="">
                            <li>'.$usuario.'</li>
                        </ul>
                    </td>
                </tr>
            </table>

            <table>
                <tr class="chamado">
                    <td >'.$value['conteudo'].'</td>
                    <td >'.$value['resposta'].'</td>
                </tr>
            </table>

            <table>

                <tr class="single">
                    <td colspan="2" >'.$nomeAtivo.'</td>
                </tr>
            </table>    
        </div>';
}

$nome = 'relatorio_de_'.$periodo['inicio'].'_a_'.$periodo['fim'];

use Dompdf\Dompdf;

$pdf = new Dompdf(['enable_remote'=>true]);


$pdf->loadHtml($page);

$pdf->render();

$pdf->stream($nome, ['Attachment' => false]);