<?php

// //////////////////////////////
// [1] FORM VALIDATORS
// //////////////////////////////

/**
 * Check if login is successful
 *
 * @param $form_values
 * @param array $form
 * @return bool
 */
function validate_login($form_values, array &$form): bool
{
    $db_data = file_to_array(DB_FILE);

    foreach ($db_data['users'] as $entry) {
        if ($form_values['email'] === $entry['email']
            && $form_values['password'] === $entry['password']) {

            return true;
        }
    }

    $form['error'] = 'Unable to login: check your email and/or password';

    return false;
}

// //////////////////////////////
// [2] FIELD VALIDATORS
// //////////////////////////////

/**
 * Check if email is available for registration, i.e. if it is not already taken
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_user_unique(string $field_value, array &$field): bool
{
    $db_data = file_to_array(DB_FILE);

    foreach ($db_data as $entry) {
        if ($field_value === $entry['email']) {
            $field['error'] = 'Email is already taken: enter new email.';

            return false;
        }
    }

    return true;
}