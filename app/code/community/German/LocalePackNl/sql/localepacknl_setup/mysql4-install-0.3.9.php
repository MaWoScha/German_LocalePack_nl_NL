<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.3.9
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
Indien u nog vragen heeft, kunt u contact met ons opnemen via email door een bericht te sturen
naar e-mail <a href="mailto:{{var store_email}}">{{var store_email}}</a>,
telefonisch via <a href="tel:{{var store_phone}}">{{var store_phone}}</a>,
via <a title="Mijn servicepagina op Skype" href="skype:mijn.zaken?chat" target="_blank">Skype chat</a> (gebruikersnaam: mijn.zaken)
of op Facebook op onze <a title="Mijn Fanpagina op Facebook" href="http://www.facebook.com/mijn.zaken" target="_blank">Mijn Fanpagina</a>.
EOD;

$storeId = 7;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (nl)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'Geachte mevrouw / heer',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (nl)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (nl)',
        'identifier'    => 'email_template_say_bye',
        'content'       => 'Bedankt voor je aankoop!',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in NL German LocalePack");
    }
}

$installer->endSetup();

?>
