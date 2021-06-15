<?php

return [
    'whatsapp' => 'Whatsapp',
    'whatsapp_settings' => 'Whatsapp Settings',
    'name' => 'Name',
    'account_sid' => 'Account SID',
    'auth_token' => 'Auth Token',
    'business_phone' => 'Business Phone Number',
    'is_image_inline' => 'Treat All Incoming Images As Inline Attachments?',
    'name_hint' => 'Name of the Account',
    'sid_hint' => 'SID can be found in Twilio Console. If you input SID wrong, messages from whatsapp will not be fetched.',
    'token_hint' => 'Auth token can be found in Twilio Console. If you input token wrong, messages from whatsapp will not be fetched.',
    'business_phone_hint' => 'This is the whatsapp number verified by Twilio.',
    'yes' => "Yes",
    'no' => "No",
    'save' => "Save",
    'app_created' => "Successfully Saved.",
    'app_deleted' => "App Successfully Deleted.",
    'app_create_failed' => "Error Saving WhatsApp Information.",
    'added_num' => 'Added Whatsapp Numbers',
    'whatsapp_edit_acc' => "Edit Whatsapp Account",
    'app_updated' => "Successfully Updated.",
    'app_update_failed' => "Error Updating WhatsApp Information.",
    'create_whatsapp_acc' => "Create Whatsapp Account",
    'webhook_url' => "Webhook URL",
    'webhook_url_hint' => "Webhook URL to put in Twilio Console",
    "select" => "Select New Ticket Interval",
    'new_ticket_interval' => "Days after which user reply will be treated as new ticket",
    "one" => "One Day",
    "seven" => "One Week",
    "fifteen" => "15 Days",
    "thirty" => "1 month" ,
    'upd8' => 'Update',
    'done' => "Ticket(s) created by WhatsApp",
    'whatsapp-info' => "This command creates ticket from Whatsapp Platform",
    'whatsapp_account_deleted' => "Whatsapp account associated with the ticket has been deleted, so replying is not possible.",
    'whatsapp_ticket_cron_init' => "Whatsapp ticket fetch cron initiated.",
    'whatsapp_ticket_cron_exit' => "Whatsapp ticket fetch cron completed.",
    'invalid_settings' => 'Invalid Whatsapp Settings Detected, Replying Failed.',
    'reset' => 'Reset',
    'reset_confirm' => 'Are you sure you want to reset ?',
    'approved_template_hint' => 'Template approved by whatsapp to send reply outside the 24 hour session window. If this value is not provided, the reply will not be delivered through whatsapp outside 24 hour session window',
    'approved_template_for_whatsapp' => 'Approved Template',
    'whatsapp_invalid_format' => 'When replying to whatsapp tickets the attachment file must be of type :formats',
    'whatsapp_no_template' => '24 hour free form messaging session has timed out. Please add the approved template in your whatsapp settings.',
    'whatsapp_not_a_source' => 'Invalid ticket or source',
    'whatsapp_webhook_error' => "Someone is trying to sniff requests from Twilio",
    'whatsapp_only_one_media' => 'Maximum one media file can be attached at a time when replying to whatsapp tickets.',
];
