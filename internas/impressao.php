<?php 
$timeoutOriginal = ini_get('max_execution_time');
$timeoutNovo = 120;

ini_set('memory_limit', '256M');
ini_set('max_execution_time', $timeoutNovo);
set_time_limit($timeoutNovo);

    require(dirname(__FILE__) . "/../painel/suportes/config.php");
    $AdministradorLogado= Funcoes::verificaAdmin();

    $t=0; 
    $exclusoes = array('ormCascated','nOffset','inativo','logo','idunidade','primary','nLimite');

   
    $tamanhoTabela = 'width="1003px"';
    $tamanhoOrientacao = 'A4-L';
    
    $tamanhoTabela = 'width="776px"';
    $tamanhoOrientacao = 'A4'; 
    
    require_once(dirname(__FILE__)."/../painel/modulos/Itensevento/model.php");
    $Itensevento = new Itensevento();
    $Itensevento->get("where idItensEvento ='".$_SESSION['idItensEvento']."'");

    
    require_once(dirname(__FILE__)."/../painel/modulos/Evento/model.php");
    $Evento = new Evento();
    $Evento->get("where idEvento ='".$Itensevento->Evento_idEvento."'");

    // Adicionando o código de barras ao Itensevento
    $Itensevento->codbarras = '2' . str_pad($Evento->{$Evento->primary}, 3, "0", STR_PAD_LEFT) . str_pad($Itensevento->{$Itensevento->primary}, 8, "0", STR_PAD_LEFT);


    require_once(dirname(__FILE__)."/../painel/modulos/Inscrito/model.php");
    $Inscrito= new Inscrito();
    $Inscrito->get($Itensevento->Inscrito_idInscrito);


    require_once(dirname(__FILE__)."/../painel/modulos/Empresa/model.php");
    $Empresa= new Empresa();
    $Empresa->get($Itensevento->Empresa_idEmpresa);


    require_once(dirname(__FILE__)."/../painel/modulos/Tipo/model.php");
    $Tipo= new Tipo();
    $Tipo->get($Empresa->idTipo);

    require_once(dirname(__FILE__)."/../painel/modulos/Cargo/model.php");
    $Cargo= new Cargo();
    $Cargo->get($Inscrito->idCargo);



    
?>

<?php ob_start(); ?>
<table cellpadding="0" cellspacing="0"  class="corpo" border="0" <?php echo $tamanhoTabela; ?>>
    <thead>
        <tr>
            <td class="border-less" width="200px">
                <img src="assets/images/logo/logo.png" height="60px" border="0"/>
            </td>
            <td class="border-less acenter"><h2>Ficha de Inscrição</h2><h3><?php echo $Evento->Evento;?></h3></td>
            <td class="border-less" width="200px">
                &nbsp;
            </td>
        </tr>
    </thead>
</table>
<hr/>
<?php $topo_pdf = ob_get_clean();  ?>
<?php ob_start();?>


<div class="relacao">
		<strong>DADOS PESSOAIS</strong>
        <table cellpadding="0" cellspacing="0"  class="corpo" border="0" <?php echo $tamanhoTabela; ?>>
                <tbody>
                <tr>
<!--                     <td class="acenter" rowspan="4">
						FOTO
					</td> -->
                    <td class="" colspan="2">
						<div class="label">Nome completo</div>
						<?php echo (@$Inscrito->NomeCompleto ? $Inscrito->NomeCompleto : '&nbsp;'); ?>
					</td>
					<td class="lborder-less">
						<div class="label">CPF</div>
						<?php echo Funcoes::formatar_cpf_cnpj($Inscrito->Cpf); ?>
					</td>
                </tr>
                <tr>
                    <td class="" colspan="2">
                        <div class="label">Nome crachá</div>
						<?php echo (@$Inscrito->NomeCracha ? $Inscrito->NomeCracha : '&nbsp;'); ?>
                    </td>
					<td class="lborder-less">
						<div class="label">Cargo</div>
						<?php echo (@$Inscrito->Cargo ? $Inscrito->Cargo : '&nbsp;'); ?>
					</td>
                </tr>
                <tr>
                    <td class="">
                        <div class="label">Celular</div>
						<?php echo ($Inscrito->Tel ? Funcoes::formatar_telefone($Inscrito->Tel) : '&nbsp;'); ?>
                    </td>
					<td class="lborder-less" colspan="2">
						<div class="label">Email</div>
						<?php echo ($Inscrito->Email ? $Inscrito->Email : '&nbsp;'); ?>
					</td>
                </tr>
                    
            </tbody>
		</table>
		
		<strong>DADOS DE ENDEREÇO</strong>
        <table cellpadding="0" cellspacing="0"  class="corpo" border="0" <?php echo $tamanhoTabela; ?>>
                <tbody>
                <tr>
                    <td class="">
                        <div class="label">CEP</div>
						<?php echo (@$Inscrito->cep ? Funcoes::formatar_cep($Inscrito->cep) : '&nbsp;'); ?>
                    </td>
					<td class="lborder-less">
						<div class="label">Rua</div>
						<?php echo (@$Inscrito->Endereco ? $Inscrito->Endereco : '&nbsp;'); ?>
					</td>
					<td class="lborder-less">
						<div class="label">Número</div>
						<?php echo (@$Inscrito->Numero ? $Inscrito->Numero : '&nbsp;'); ?>
					</td>
                </tr>
                <tr>
					<td class="">
						<div class="label">Bairro</div>
						<?php echo (@$Inscrito->bairro ? $Inscrito->bairro : '&nbsp;'); ?>
					</td>
                    <td class="lborder-less" colspan="2">
                        <div class="label">Cidade - UF</div>
						<?php echo (@$Inscrito->cidade ? $Inscrito->cidade : '&nbsp;'); ?> - <?php echo (@$Inscrito->estado ? $Inscrito->estado : '&nbsp;'); ?>
                    </td>
                </tr>
            </tbody>
		</table>
		
		<strong>DADOS DA EMPRESA</strong>
        <table cellpadding="0" cellspacing="0"  class="corpo" border="0" <?php echo $tamanhoTabela; ?>>
                <tbody>
                <tr>
					<td class="" colspan="2">
						<div class="label">Razao Social</div>
						<?php echo (@$Empresa->RazaoSocial ? $Empresa->RazaoSocial : '&nbsp;'); ?>
					</td>
					<td class="lborder-less">
						<div class="label">CNPJ</div>
						<?php echo Funcoes::formatar_cpf_cnpj($Empresa->Cnpj); ?>
					</td>
                </tr>
                <tr>
                    <td class="" colspan="2">
                        <div class="label">Nome Fantasia</div>
						<?php echo (@$Empresa->NomeFantasia ? $Empresa->NomeFantasia : '&nbsp;'); ?>
                    </td>
					<td class="lborder-less">
						<div class="label">Categoria</div>
						<?php echo (@$Tipo->Tipo ? $Tipo->Tipo : '&nbsp;'); ?>
					</td>
                </tr>
                <tr>
                    <td class="">
                        <div class="label">Celular</div>
						<?php echo ($Empresa->Telefone ? Funcoes::formatar_telefone($Empresa->Telefone) : '&nbsp;'); ?>
                    </td>
					<td class="lborder-less">
						<div class="label">Whatsapp</div>
						<?php echo ($Empresa->Fax ? Funcoes::formatar_telefone($Empresa->Fax) : '&nbsp;'); ?>
					</td>
					<td class="lborder-less">
						<div class="label">Email</div>
						<?php echo ($Empresa->Email ? $Empresa->Email : '&nbsp;'); ?>
					</td>
                </tr>
                    
            </tbody>
		</table>
		
		<strong>DADOS DE ENDERECO DA EMPRESA</strong>
        <table cellpadding="0" cellspacing="0"  class="corpo" border="0" <?php echo $tamanhoTabela; ?>>
                <tbody>
                <tr>
                    <td class="">
                        <div class="label">CEP</div>
                        <?php echo (@$Empresa->cep ? Funcoes::formatar_cep($Empresa->cep) : '&nbsp;'); ?>
                    </td>
					<td class="lborder-less">
						<div class="label">Rua</div>
						<?php echo (@$Empresa->Endereco ? $Empresa->Endereco : '&nbsp;'); ?>
					</td>
					<td class="lborder-less">
						<div class="label">Número</div>
						<?php echo (@$Empresa->Numero ? $Empresa->Numero : '&nbsp;'); ?>
					</td>
                </tr>
                <tr>
					<td class="">
						<div class="label">Bairro</div>
						<?php echo (@$Empresa->Bairro ? $Empresa->Bairro : '&nbsp;'); ?>
					</td>
                    <td class="lborder-less" colspan="2">
                        <div class="label">Cidade - UF</div>
						<?php echo (@$Empresa->Cidade ? $Empresa->Cidade : '&nbsp;'); ?> - <?php echo (@$Empresa->Estado ? $Empresa->Estado : '&nbsp;'); ?>
                    </td>
                </tr>
            </tbody>
		</table>
		<strong>TERMO DE ACEITE E REGRAS</strong>
        <table cellpadding="0" cellspacing="0"  class="corpo" border="0" <?php echo $tamanhoTabela; ?>>
                <tbody>
                <tr>
                    <td class="">
                        <div class="label">Você declarou aceitar os seguintes termos:</div>
						<?php echo (@$Evento->termo_aceite ? $Evento->termo_aceite : '&nbsp;'); ?>
                    </td>
                </tr>
            </tbody>
		</table>
</div>



<?php
// Interface para os tipos de código de barras
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeInterface.php');

// Todos os tipos específicos usados
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode128.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode128A.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode128B.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode128C.php');

// Classe principal do Barcode
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Barcode.php');

// Classes principais da biblioteca de código de barras
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGenerator.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorPNG.php');

// Uso da classe
/* use Picqer\Barcode\BarcodeGeneratorPNG;
 */
$numeroCodigoBarras = $Itensevento->codbarras; // Substitua isso pelo número que deseja converter

?>

<?php
// Incluir todos os arquivos necessários
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeInterface.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode39.php'); // Adicionado
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeEanUpcBase.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeEan13.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode128.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Barcode.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGenerator.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorSVG.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorPNG.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorJPG.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorHTML.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorDynamicHTML.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeBar.php');
?>


<?php
// Inclua o arquivo da biblioteca QR Code
require_once dirname(__FILE__) . '/../libs/phpqrcode/qrlib.php';

// Dados dinâmicos para o vCard
$vcardData = <<<EOD
BEGIN:VCARD
VERSION:3.0
FN:{$Inscrito->NomeCompleto}
ORG:{$Empresa->NomeFantasia}
TEL:{$Inscrito->Tel}
EMAIL:{$Inscrito->Email}
END:VCARD
EOD;

// Nome do arquivo gerado
$filename = 'qrcode_vcard.png';

// Gerar QR Code
QRcode::png($vcardData, $filename, 'L', 4, 2);
?>

<?php
// Interface para os tipos de código de barras
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeInterface.php');

// Todos os tipos específicos usados
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Types/TypeCode128.php');

// Classe principal do Barcode
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/Barcode.php');

// Classes principais da biblioteca de código de barras
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGenerator.php');
require_once(dirname(__FILE__) . '/../assets/php-barcode-generator/src/BarcodeGeneratorPNG.php');

// Gerar código de barras
$numeroCodigoBarras = $Itensevento->codbarras;
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
$barcode = base64_encode($generatorPNG->getBarcode($numeroCodigoBarras, $generatorPNG::TYPE_EAN_13));
?>

<table cellpadding="0" cellspacing="0"  class="corpo" border="0" class="lborder-less" <?php echo $tamanhoTabela; ?>>
                <tbody>
                <tr>
<!--                     <td class="acenter" rowspan="4">
						FOTO
					</td> -->
                    <td class="acenter" colspan="" >
                    <img src="data:image/png;base64,<?php echo $barcode; ?>" style="width:150px; height:130px;">
                    <p><?php echo $numeroCodigoBarras; ?></p>

					</td>
					<td >
                    <img class="acenter" src="data:image/png;base64,<?php echo base64_encode(file_get_contents($filename)); ?>" style="width:150px; height:150px;">
					</td>
                </tr>
                <tr>
</tbody>
</table>


<?php $content = ob_get_clean();  ?>

<?php ob_start(); $rodape_pdf='';?>
	<p class="aright"><?php echo ("Gerado em ". date("d/m/Y"). " às " .date("H:i:s"). " - Página: {PAGENO}");?></p>
<?php $rodape_pdf = ob_get_clean();  ?>

<?php
    require_once dirname(__FILE__)."/../painel/plugins/mpdf/mpdf.php";
    $css_file = dirname(__FILE__)."/../painel/plugins/mpdf/custom_mpdf.css";
    if(is_file($css_file)){
        $stylesheet = file_get_contents($css_file);                
    }             

    // get the HTML
    
    
    // convert in PDF
    try
    {
        $mpdf=new mPDF('UTF-8', 'A4', '12px', 'Arial', 6, 6, 30, 6, 6, 6); 
        $mpdf->allow_charset_conversion=true;
        // permite a conversao (opcional)
        $mpdf->charset_in='UTF-8';
        $mpdf->useSubstitutions = false; 
        $mpdf->simpleTables = true;
        $mpdf->packTableData = true;
        // converte todo o PDF para utf-8
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

        $reportFilename = Funcoes::converterURL($Inscrito->NomeCompleto.' - '.$Inscrito->Cpf).".pdf";
		
        $mpdf->SetHTMLHeader(str_replace('\"','\'',@$topo_pdf));
        $mpdf->SetHTMLFooter(str_replace('\"','\'',@$rodape_pdf));
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($content,2);
        $mpdf->Output($reportFilename, 'I'); 
        // $mpdf->Output("../../../arquivos/inscrito/".$reportFilename, 'F'); exit;
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>