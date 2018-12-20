<?php
function ssh_desconectado($reason, $message, $language) {
    printf("O servidor foi desconectado, código [%d] e mensagem: %s\n", $reason, $message);
}

// Ajuste aqui com os dados para conexão
$methods = array(
  'kex' => 'diffie-hellman-group1-sha1',
  'client_to_server' => array(
    'crypt' => '3des-cbc',
    'comp' => 'none'),
  'server_to_client' => array(
    'crypt' => 'aes256-cbc,aes192-cbc,aes128-cbc',
    'comp' => 'none'));

$connection = ssh2_connect('shell.example.com', 22, $methods, array('disconnect' => 'ssh_desconectado'));

if (!$connection) die('conexão falhou');
