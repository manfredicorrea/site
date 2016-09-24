<?php
/**
 * EDIT THE VALUES BELOW THIS LINE TO ADJUST THE CONFIGURATION
 * EACH OPTION HAS A COMMENT ABOVE IT WITH A DESCRIPTION
 */
/**
 * Specify the email address to which all mail messages are sent.
 * The script will try to use PHP's mail() function,
 * so if it is not properly configured it will fail silently (no error).
 */
$mailTo     = 'manfredicorrea@gmail.com';

/**
 * Set the message that will be shown on success
 */
$successMsg = 'Obrigado, em breve entraremos em contato!';

/**
 * Set the message that will be shown if not all fields are filled
 */
$fillMsg    = 'Preencha todos os campos! ';

/**
 * Set the message that will be shown on error
 */
$errorMsg   = 'Desculpe, mas houve erro no envio!';

/**
 * DO NOT EDIT ANYTHING BELOW THIS LINE, UNLESS YOU'RE SURE WHAT YOU'RE DOING
 */

?>
<?php
if(
    !isset($_POST['contact-name']) ||
	!isset($_POST['contact-company-name']) ||
    !isset($_POST['contact-email']) ||
    !isset($_POST['contact-phone']) ||
    !isset($_POST['contact-budget']) ||
	!isset($_POST['contact-type']) ||
    !isset($_POST['contact-message']) ||
    empty($_POST['contact-name']) ||
	empty($_POST['contact-company-name']) ||
    empty($_POST['contact-email']) ||
	empty($_POST['contact-phone']) ||
    empty($_POST['contact-budget']) ||
	empty($_POST['contact-type']) ||
    empty($_POST['contact-message']) 
) {
    echo '<script type="text/javascript">window.parent.$("#contact #alert-msg").html("' . $fillMsg . '");window.parent.$("#contact #alert-msg").show();</script>';
} else {

    ?>
    <?php
	$msg = "Nome: ".$_POST['contact-name']."\r\n";
	$msg .= "Empresa: ".$_POST['contact-company-name']."\r\n";
	$msg .= "E-mail: ".$_POST['contact-email']."\r\n";
	$msg .= "Telefone: ".$_POST['contact-phone']."\r\n";
	$msg .= "Marca/ Produto: ".$_POST['contact-budget']."\r\n";
	$msg .= "Type: ".$_POST['contact-type']."\r\n";
	$msg .= "Mensagem: ".$_POST['contact-message']."\r\n";

    $success = @mail($mailTo, $_POST['contact-email'], $msg, 'From: ' . $_POST['contact-name'] . '<' . $_POST['contact-email'] . '>');
    if ($success) {
        echo '<script type="text/javascript">window.parent.$("#contact #alert-msg").html("' . $successMsg . '");
		window.parent.$("#input_name").val("");
		window.parent.$("#input_compnay_name").val("");
		window.parent.$("#input_email").val("");
		window.parent.$("#input_phone").val("");
		window.parent.$("#input_budget").val("");		
		window.parent.$("#input_type").val(""); 
		window.parent.$("#textarea_message").val(""); 
		window.parent.$("#contact #alert-msg").show();</script>';
    } 
		else {
        echo '<script type="text/javascript">window.parent.$("#contact #alert-msg").html("' . $errorMsg . '");window.parent.$("#contact #alert-msg").show();</script>';
    }
}