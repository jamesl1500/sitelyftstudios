<!DOCTYPE html>
<html>
<head>
    <!-- meta -->
    <meta charset="<?php echo strtolower($site_info['site_utf']); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta -->
    <meta name="description" content="<?php echo $site_info['site_description']; ?>">
    <meta http-equiv="content-type" content="text/html;charset=<?php echo $site_info['site_utf']; ?>">

    <!-- Title -->
    <title><?php echo $site_info['site_name']; ?><?php echo isset($title_addition) ? ' | ' . $title_addition : ''; ?></title>

    <!-- Stylesheets -->
    <!--<link href="--><?php //$base_url; ?><!--assets/css/main.css" rel="stylesheet">-->
    <link href="<?php $base_url; ?>assets/css/<?php echo $stylesheet; ?>.css" rel="stylesheet">
</head>
<body>
<?php $this->header->render($site_page); ?>
