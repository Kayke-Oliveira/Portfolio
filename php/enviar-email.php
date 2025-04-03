<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variáveis
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
    $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

    // Validação simples
    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
        // Corpo do Email
        $arquivo = "
        <html>
            <p><b>Nome:</b> $nome</p>
            <p><b>Email:</b> $email</p>
            <p><b>Telefone:</b> $telefone</p>
            <p><b>Mensagem:</b> $mensagem</p>
            <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
        </html>";

        // Para quem serão enviados os e-mails
        $destino = "kyolisant@gmail.com";
        $assunto = "Contato pelo Site";

        // Cabeçalhos para garantir que o email seja interpretado corretamente
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: $nome <$email>\r\n";

        // Enviar o e-mail
        $enviado = mail($destino, $assunto, $arquivo, $headers);

        // Verificação de envio
        if ($enviado) {
            echo "<script>alert('Email enviado com sucesso!');</script>";
        } else {
            echo "<script>alert('Falha ao enviar o email.');</script>";
        }

        // Redirecionamento após o envio
        echo "<meta http-equiv='refresh' content='2;URL=../index.html'>";
    } else {
        // Caso os dados não estejam preenchidos corretamente
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
        echo "<meta http-equiv='refresh' content='2;URL=../index.html'>";
    }
}
?>