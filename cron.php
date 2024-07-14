<?php

// Comando que você quer executar
$command = "cd /home/u425289644/domains/praynow.rfloliveira.com.br && php artisan schedule:run >> /dev/null 2>&1";

// Executa o comando
exec($command, $output, $return_var);

// Exibe a saída do comando
print_r($output);
echo "Return status: " . $return_var;
