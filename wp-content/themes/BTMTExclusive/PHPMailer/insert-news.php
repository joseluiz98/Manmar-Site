<?php 
require_once("../../../wp-load.php");

try {

    $name = strip_tags($_POST['nome']);
    $email = strip_tags($_POST['email']);
    $created = date('Y-m-d H:i:s');

    global $wpdb;
    $wpdb->get_results("SELECT email FROM rdp_newsletter WHERE email LIKE '%" .$email."%'");


    
    if($wpdb->num_rows > 0):
        echo '<p>Erro ao realizar o cadastro. Tente novamente.</p>'; //retorno devolvido para o ajax caso de erro
    else:
        global $wpdb;
        $wpdb->insert('rdp_newsletter',array('name'=>$name,'email'=>$email,'created'=>$created),array('%s','%s','%s'));
        
        echo '<p>Cadastro realizado com sucesso !</p>'; //retorno devolvido para o ajax caso sucesso
    endif;

} catch (phpmailerException $e) {

    echo $e->errorMessage(); //retorno devolvido para o ajax caso erro  36548697
}
?>