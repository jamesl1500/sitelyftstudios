<!DOCTYPE html>
<html>
<head>
    <!-- meta -->
    <meta charset="<?php echo strtolower($site_info['site_utf']); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/icons/sitelyft-circle-logo.png'); ?>"/>

    <!-- SEO Meta -->
    <meta name="description" content="<?php echo $site_info['site_description']; ?>">
    <meta http-equiv="content-type" content="text/html;charset=<?php echo $site_info['site_utf']; ?>">

    <!-- Title -->
    <title><?php echo $site_info['site_name']; ?><?php echo isset($title_addition) ? ' | ' . $title_addition : ''; ?></title>

    <!-- Stylesheets -->
    <link href="<?php echo base_url('assets/css/'); ?>/<?php echo $stylesheet; ?>.css" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"> -->
    <script src="https://use.fontawesome.com/b38b622847.js"></script>
    <meta name="google-site-verification" content="yuQ6iLwS7b-jRXL4tE2dneiyffrTJ5dWrjHBQTq2jdo" />
</head>
<body>
<?php $this->header->render($site_page); ?>
