<?php

// Comando que você quer executar
$command = "cd /home/u425289644/domains/praynow.rfloliveira.com.br && php artisan schedule:run 2> /path/to/error.log";

// Executa o comando
exec($command, $output, $return_var);

// Exibe a saída do comando
print_r($output);
echo "Return status: " . $return_var;

// Leia e exiba o conteúdo do arquivo de log de erros
$error_log = file_get_contents('/home/u425289644/domains/praynow.rfloliveira.com.br/storage/logs/laravel.log');
echo "Error log: " . $error_log;
