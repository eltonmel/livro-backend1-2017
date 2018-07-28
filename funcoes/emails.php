<?php

function agradecer_contato ($nome, $email) {
    // Função para envio do email de confirmação ao candidato, e agradecer o contato.
    
    $assunto = "GB: Agradecemos seu cadastro";
    $mensagem = "Olá, este email está sendo enviado para confirmar o recebimento do seu cadastro. Agradecemos seu contato.";
    
    return mail($email, $assunto, $mensagem);
    
}

function enviar_curriculo_email ($dados, $arquivos) {
    // Função para envio do email para o departamento escolhido pelo candidato com os dados do mesmo.
    
    $assunto = "GB: Novo Currículo Cadastrado";
    $mensagem = "<strong>Dados: <br />Nome: %s / Email: %s <br /><br /></strong>";
    $mensagem = sprintf($mensagem, $dados['nome'], $dados['email']);
    $mensagem .= "Foto: <a href='http://localhost/%s>Ver Foto</a><br />Currículo: <a href='http://localhost/%s>Ver Currículo</a>";
    
    $empresa = include __DIR__ . '/../dados/empresa_departamento.php';
    
    $departamentos = $empresa[$dados['cod_empresa']['departamentos']];
    $destinatario = $departamentos[$dados['cod_departamento']];  
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
    
    return mail($destinatario, $assunto, $mensagem, $headers);
}