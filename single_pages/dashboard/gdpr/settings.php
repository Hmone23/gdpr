<?php
defined('C5_EXECUTE') or die('Access Denied.');
?>

<div class="ccm-dashboard-content-inner">
    <form method="post" action="<?php echo $this->action('save'); ?>">
        <?php
        /** @var $token \Concrete\Core\Validation\CSRF\Token */
        echo $token->output('a3020.gdpr.settings');
        ?>

        <section class="settings-section">
            <header><?php echo t('User logs'); ?></header>

            <div class="form-group">
                <label class="control-label launch-tooltip"
                       title="<?php echo t('This will automatically remove associated user logs when a user is deleted. This is done based on the %1$s column in the %2$s table.', 'uID', 'Logs'); ?>"
                       for="removeBasedOnUserId">
                    <?php
                    /** @var bool $removeBasedOnUserId */
                    echo $form->checkbox('removeBasedOnUserId', 1, $removeBasedOnUserId);
                    ?>
                    <?php echo t('Enable removing associated user logs when a user is deleted'); ?>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label launch-tooltip"
                       title="<?php echo t('Say the email address of the deleted user is %s, then all Logs that contain %s will be deleted.', 'john.doe@gmail.com', 'john.doe@gmail.com'); ?>"
                       for="removeBasedOnEmailAddress">
                    <?php
                    /** @var bool $removeBasedOnEmailAddress */
                    echo $form->checkbox('removeBasedOnEmailAddress', 1, $removeBasedOnEmailAddress);
                    ?>
                    <?php echo t('Enable removing user logs in which the email address is present'); ?>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label launch-tooltip"
                       title="<?php echo t('Say the username of the deleted user is %s, then all Logs that contain %s will be deleted. This option is probably not recommended if you allow users with a short username.', 'john.doe', 'john.doe'); ?>"
                       for="removeBasedOnUsername">
                    <?php
                    /** @var bool $removeBasedOnUsername */
                    echo $form->checkbox('removeBasedOnUsername', 1, $removeBasedOnUsername);
                    ?>
                    <?php echo t('Enable removing user logs in which the username is present'); ?>
                </label><br>

                <small>
                    <?php
                    echo t("Make sure you know what you're doing when changing this option.");
                    ?>
                </small>
            </div>
        </section>

        <section class="settings-section">
            <header><?php echo t('Tracking'); ?></header>

            <div class="form-group">
                <label class="control-label launch-tooltip"
                       title="<?php echo t("concrete5 might pull background images from an external server for the login page. This could leak the visitor's IP address.") ?>"
                       for="disableConcreteBackground">
                    <?php
                    /** @var bool $disableConcreteBackground */
                    echo $form->checkbox('disableConcreteBackground', 1, $disableConcreteBackground);
                    ?>
                    <?php echo t('Disable concrete5 background on Login page'); ?>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label launch-tooltip"
                       title="<?php echo t("This will disable tracking code(s) defined on %s. If you uninstall the add-on or uncheck this option, the tracking code will become active again.",
                           t('System & Settings > SEO & Statistics > Tracking Codes')
                       ); ?>"
                       for="disableTrackingCode">
                    <?php
                    /** @var bool $disableTrackingCode */
                    echo $form->checkbox('disableTrackingCode', 1, $disableTrackingCode);
                    ?>
                    <?php echo t('Disable tracking codes'); ?>
                </label><br>

                <?php
                /** @var bool $trackingCodeFound */
                if ($trackingCodeFound) {
                    echo '<small>'.t('There is a tracking code configured.').'</small>';
                } else {
                    echo '<small>'.t('No tracking code is currently installed.').'</small>';
                }
                ?>
            </div>
        </section>

        <div class="ccm-dashboard-form-actions-wrapper">
            <div class="ccm-dashboard-form-actions">
                <button class="pull-right btn btn-primary" type="submit"><?php echo t('Save') ?></button>
            </div>
        </div>
    </form>
</div>
