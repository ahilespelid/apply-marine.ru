<?php  return array (
  'formit' => 'FormIt',
  'formit.desc' => 'View all submitted forms.',
  'area_formit' => 'FormIt',
  'area_formit_recaptcha' => 'FormIt reCAPTCHA',
  'formit.form' => 'Form',
  'formit.forms' => 'Forms',
  'formit.forms_desc' => 'View all submitted forms.',
  'formit.form_view' => 'View form',
  'formit.form_remove' => 'Remove form',
  'formit.form_remove_confirm' => 'Are you sure you want to remove this form?',
  'formit.forms_remove' => 'Remove forms',
  'formit.forms_remove_confirm' => 'Are you sure you want to remove all forms?',
  'formit.forms_clean' => 'Clean forms',
  'formit.forms_clean_confirm' => 'Are you sure you want to clean all old forms?',
  'formit.forms_export' => 'Export forms',
  'formit.form_encrypt' => 'Encrypt form(s)',
  'formit.form_encrypt_confirm' => 'Are you sure you want to encrypt the form(s)?',
  'formit.form_decrypt' => 'Undo form encryption(s)',
  'formit.form_decrypt_confirm' => 'Are you sure you want to undo the form encryption(s)?',
  'formit.view_ip' => 'View all forms from this IP',
  'formit.encryption' => 'Encrypted form',
  'formit.encryptions' => 'Encrypted forms',
  'formit.encryptions_desc' => 'View all encrypted and non encrypted forms.',
  'formit.label_form_name' => 'Name',
  'formit.label_form_name_desc' => 'The name of the form.',
  'formit.label_form_values' => 'Form values',
  'formit.label_form_values_desc' => 'The values of the form.',
  'formit.label_form_ip' => 'IP number',
  'formit.label_form_ip_desc' => 'The IP number of the visitor that has submitted the form.',
  'formit.label_form_date' => 'Date',
  'formit.label_form_date_desc' => 'The date when the form is submitted.',
  'formit.label_form_encrypted' => 'Encrypted',
  'formit.label_form_encrypted_desc' => '',
  'formit.label_form_decrypted' => 'Not encrypted',
  'formit.label_form_decrypted_desc' => '',
  'formit.label_form_total' => 'Total',
  'formit.label_form_total_desc' => '',
  'formit.label_clean_label' => 'Remove forms older than',
  'formit.label_clean_desc' => 'days',
  'formit.label_export_form' => 'Form',
  'formit.label_export_form_desc' => 'Select a form to export.',
  'formit.label_export_start_date' => 'Date from',
  'formit.label_export_start_date_desc' => 'Select a date to export forms from that date.',
  'formit.label_export_end_date' => 'Date till',
  'formit.label_export_end_date_desc' => 'Select a date to export forms till that date.',
  'formit.label_export_delimiter' => 'CSV delimiter',
  'formit.label_export_delimiter_desc' => 'The Het CSV delimiter to separate the columns. Default is ";".',
  'formit.filter_form' => 'Filter on form',
  'formit.filter_start_date' => 'Filter from',
  'formit.filter_end_date' => 'Filter till',
  'formit.encryption_unavailable' => 'PHP OpenSSL functions openssl_encrypt and openssl_decrypt are not available. Please install PHP OpenSSL on your server. See <a href="https://www.php.net/manual/en/openssl.requirements.php" target="_blank">https://www.php.net/manual/en/openssl.requirements.php</a> for more information.',
  'formit.encryption_unavailable_warning' => '<strong>Warning:</strong> PHP OpenSSL functions openssl_encrypt and openssl_decrypt are not available. This means that you cannot use encryption on your forms. Please install PHP OpenSSL on your server. Visit <a href="https://www.php.net/manual/en/openssl.requirements.php" target="_blank">https://www.php.net/manual/en/openssl.requirements.php</a> for more information.',
  'formit.forms_clean_desc' => 'The European <a href="https://ec.europa.eu/info/law/law-topic/data-protection/eu-data-protection-rules_en" target="_blank">General Data Protection Regulation (GDPR)</a> requires that personal data, which is no longer necessary to possess, is removed. This tool makes it possible to remove saved forms with an age older than the given days. This action can not be undone!',
  'formit.forms_clean_executing' => 'Cleaning up forms',
  'formit.forms_clean_success' => '[[+amount]] form(s) removed.',
  'formit.export_failed' => 'The export of the forms failed, please try again.',
  'formit.export_dir_failed' => 'An error occurred while exporting the form, the export folder could not be created.',
  'formit.contains' => 'Your value must contain the phrase "[[+value]]".',
  'formit.email_invalid' => 'Please enter a valid email address.',
  'formit.email_invalid_domain' => 'Your email address does not have a valid domain name.',
  'formit.email_no_recipient' => 'Please specify a recipient or recipients for the email.',
  'formit.email_not_sent' => 'An error occurred while trying to send the email.',
  'formit.email_tpl_nf' => 'Please specify an email template.',
  'formit.field_not_empty' => 'This field must be empty.',
  'formit.field_required' => 'This field is required.',
  'formit.math_incorrect' => 'Incorrect answer!',
  'formit.math_field_nf' => '[[+field]] input field not specified in form.',
  'formit.max_length' => 'This field cannot be longer than [[+length]] characters long.',
  'formit.max_value' => 'This field cannot be larger than [[+value]].',
  'formit.min_length' => 'This field must be at least [[+length]] characters long.',
  'formit.min_value' => 'This field cannot be smaller than [[+value]].',
  'formit.not_date' => 'This field must be a valid date.',
  'formit.not_lowercase' => 'This field must be all lowercase.',
  'formit.not_number' => 'This field must be a valid number.',
  'formit.not_uppercase' => 'This field must be all uppercase.',
  'formit.password_dont_match' => 'Your passwords do not match.',
  'formit.password_not_confirmed' => 'Please confirm your password.',
  'formit.prioritized_group_text' => 'Frequent Visitors',
  'formit.range_invalid' => 'Invalid range specification.',
  'formit.range' => 'Your value must be between [[+min]] and [[+max]].',
  'formit.recaptcha_err_load' => 'Could not load FormItReCaptcha service class.',
  'formit.spam_blocked' => 'Your submission was blocked by a spam filter: ',
  'formit.spam_marked' => ' - marked as spam.',
  'formit.username_taken' => 'Username already taken. Please choose another.',
  'formit.not_regexp' => 'Your value did not match the expected format.',
  'formit.all_group_text' => 'All Countries',
  'formit.storeAttachment_mediasource_error' => 'Cant find Media Source! Media Source ID is: ',
  'formit.storeAttachment_access_error' => 'Directory is not writable! Check the permissions for: ',
  'formit.migrate' => 'Migrate encrypted form submissions',
  'formit.migrate_desc' => 'Upgrading to FormIt 3.0 will also update the encryption method used for encrypting submitted form data. FormIt 2.x used mcrypt for encrypting and decrypting, but 3.0 uses the openssl methods. For this to work correctly the currently encrypted forms need to be migrated from mcrypt to openssl.',
  'formit.migrate_alert' => 'FormIt was updated, but your encrypted form submissions need to be migrated. Click here to start the migration.',
  'formit.migrate_status' => 'Status',
  'formit.migrate_running' => 'Currently running migration process in the background. Please keep this page open in your browser. <strong>DO NOT CLOSE THIS PAGE!<strong>',
  'formit.migrate_success' => 'Migration completed',
  'formit.migrate_success_msg' => 'All your encrypted forms have been successfully migrated.',
);