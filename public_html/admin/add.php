<?php

require '../../bootloader.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'name' => [
            'label' => 'ITEM',
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter item\'s name',
                    'class' => 'input-field',
                ],
            ],
        ],
        'price' => [
            'label' => 'PRICE',
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_numeric',
                'validate_field_range' => [
                    'min' => 1,
                    'max' => 9999,
                ]
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter item\'s price',
                    'class' => 'input-field',
                ],
            ],
        ],
        'image' => [
            'label' => 'IMAGE URL',
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_url',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter item\'s image URL',
                    'class' => 'input-field',
                ],
            ],
        ],
    ],
    'buttons' => [
        'send' => [
            'title' => 'ADD',
            'type' => 'submit',
            'extra' => [
                'attr' => [
                    'class' => 'btn',
                ],
            ],
        ],
    ],
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    $is_valid = validate_form($form, $clean_inputs);

    if ($is_valid) {
        $input = file_to_array(DB_FILE);
        $input['items'][] = $clean_inputs;
        array_to_file($input, DB_FILE);

        $text = 'Item added successfully';
    } else {
        $text = 'Item can not be added';
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include(ROOT . '/core/templates/nav.php'); ?>
<main>
    <h2>ADD ITEM</h2>
    <?php require ROOT . '/core/templates/form.tpl.php'; ?>
    <p><?php if (isset($text)) print $text; ?></p>
</main>
</body>
</html>

