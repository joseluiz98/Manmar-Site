<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

define('MAILCHIMP_API_KEY',  '72c433450acd046262c9cded4bde9dee-us12'); // Your Mailchimp API key
define('MAILCHIMP_LIST_ID',  '1989e55012'); // Your list ID

// Your custom field tag
define('MAILCHIMP_NAME_TAG', 'name'); 
define('MAILCHIMP_COUNTRY_TAG', 'country'); 
define('MAILCHIMP_PHONE_TAG', 'phone'); 
// define('MAILCHIMP_VALUE_TAG', 'value'); 

$form = $_POST;

$fields_fill = (
    !empty($form['email']) && !empty($form['phone']) &&
    !empty($form['name']) && !empty($form['country'])
);

if ($fields_fill) {
    try {
        $mailchimp = new Mailchimp(MAILCHIMP_API_KEY);
        $lists = new Mailchimp_Lists($mailchimp);
        $email = [
            'email' => $form['email'],
        ];
        $merge = [
            MAILCHIMP_NAME_TAG    => $form['name'],
            MAILCHIMP_COUNTRY_TAG => $form['country'],
            MAILCHIMP_PHONE_TAG   => $form['phone'],
            // MAILCHIMP_VALUE_TAG   => $form['value'],
        ];
        $lists->subscribe(
            MAILCHIMP_LIST_ID, // List ID
            $email,            // Subscriber ID, his/her email
            $merge,            // Custom fields
            'html',            // E-mail type
            false              // Confirm subscription by email (double opt-in)?
        );

        setcookie("newsletters_cookie", "modal_cookie", time() + (10 * 365 * 24 * 60 * 60), "/");

        // echo "<script type='javascript'>alert('Cadastro efetuado com Sucesso!');";
        header("Location: http://www.btmt.eu/");
    } catch (Mailchimp_List_AlreadySubscribed $e) {
        // echo "<script type='javascript'>alert('Email já cadastrado!');";
        header("Location: http://www.btmt.eu/");
    } catch (Mailchimp_Email_AlreadySubscribed $e) {
        // echo "<script type='javascript'>alert('Email já cadastrado!');";
        header("Location: http://www.btmt.eu/");
    } catch (Mailchimp_Email_NotExists $e) {
        // echo "<script type='javascript'>alert('Email não existe!');";
        header("Location: http://www.btmt.eu/");
    } catch (Mailchimp_Invalid_Email $e) {
        // echo "<script type='javascript'>alert('Email inválido!');";
        header("Location: http://www.btmt.eu/");
    } catch (Mailchimp_List_InvalidImport $e) {
        // echo "<script type='javascript'>alert('Dados inválidos, provavelmente seu email!');";
        header("Location: http://www.btmt.eu/");
    } catch (Exception $e) {
        header("Location: http://www.btmt.eu/");
    }
} 
else {
//     echo 'Please fill all fields. <a href="newsletter.php">Go back</a>';
    header("Location: http://www.btmt.eu/");
}