<?php
$pageTitle = $pageTitle ?? 'Portfolio';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Jahnavi Jaldu — Software Engineering student at VIT-AP University.">
  <meta name="theme-color" content="#080808">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> | Jahnavi Jaldu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/main.js" defer></script>
</head>
<body>
<header class="site-header">
  <div class="container nav">
    <a class="brand" href="index.php" aria-label="Jahnavi home">J<span>.</span></a>
    <button class="menu-toggle" id="menuToggle" aria-label="Open navigation" aria-expanded="false" aria-controls="navLinks">☰</button>
    <nav class="nav-links" id="navLinks" aria-label="Main navigation">
      <a href="index.php">Home</a>
      <a href="index.php#about">About</a>
      <a href="index.php#skills">Skills</a>
      <a href="index.php#projects">Projects</a>
      <a href="index.php#education">Education</a>
      <a href="academic.php">Academics</a>
      <a href="skills.php">Certifications</a>
      <a href="index.php#contact">Contact</a>
    </nav>
  </div>
</header>
<main>
