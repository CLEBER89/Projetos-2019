<?php
// Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
require_once("autenvio/PHPMailerAutoload.php");
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
$mail->IsSMTP(); // Define que a mensagem será SMTP
//$mailer->SMTPDebug = 0;
$mail->Host = "smtp.aguiasat.com"; // Seu endereço de host SMTP
$mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
$mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
$mail->Username = 'contato@aguiasat.com'; // Conta de email existente e ativa em seu domínio
$mail->Password = 'aguiasat@2019'; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = "contato@aguiasat.com"; // Conta de email existente e ativa em seu domínio
$mail->From = "contato@aguiasat.com"; // Sua conta de email que será remetente da mensagem
$mail->FromName = "Contato ÁguiaSat"; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
$mail->AddAddress('contato@aguiasat.com', 'Nome - Recebe1'); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
//$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Formulário de Contato"; // Assunto da mensagem
$mail->Body .= " Nome: ".$_POST['nome']."<br>"; // Texto da mensagem
$mail->Body .= " E-mail: ".$_POST['email']."<br>"; // Texto da mensagem
$mail->Body .= " Assunto: ".$_POST['assunto']."<br>"; // Texto da mensagem
$mail->Body .= " Mensagem: ".nl2br($_POST['mensagem'])."<br>"; // Texto da mensagem
 
// ENVIO DO EMAIL
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
 
// Exibe uma mensagem de resultado do envio (sucesso/erro)
if ($enviado) {
  echo "E-mail enviado com sucesso!";
  echo "<br/>";
  echo "Aguarde o retorno para a página inicial!" ; 
  echo '<meta http-equiv="refresh" content="4;URL=index.html" />';

} else {
  echo "Não foi possível enviar o e-mail.";
  echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
}
?>



