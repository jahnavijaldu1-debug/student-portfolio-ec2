<?php
declare(strict_types=1);
$pageTitle = 'Academic Records';
require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';

$records = [];
$errorMessage = '';
try {
    $pdo = getPdoConnection();
    $stmt = $pdo->query(
        'SELECT course_code, subject_name, course_type, credits, grade, semester
         FROM academic_records
         ORDER BY semester, course_code'
    );
    $records = $stmt->fetchAll();
} catch (Throwable $e) {
    // Log details to the server, not to the public page.
    error_log('Academic page database error: ' . $e->getMessage());
    $errorMessage = 'Academic records are temporarily unavailable. Check the RDS connection and database setup.';
}
?>
<section class="page-hero">
  <div class="container">
    <a class="back-link" href="index.php">← Back to Portfolio</a>
    <span class="eyebrow">Academic performance</span>
    <h1>Academic <span class="accent">Records</span></h1>
    <p class="hero-copy centered">Structured course data retrieved dynamically from Amazon RDS for MySQL.</p>
    <?php if ($errorMessage === ''): ?>
      <p class="status status-success">✓ Successfully connected to Amazon RDS MySQL</p>
    <?php else: ?>
      <p class="status status-error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
  </div>
</section>
<section class="content-section">
  <div class="container">
    <?php if ($errorMessage === ''): ?>
      <?php if (count($records) > 0): ?>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Course Code</th><th>Subject</th><th>Type</th><th>Credits</th><th>Grade</th><th>Semester</th></tr></thead>
            <tbody>
            <?php foreach ($records as $record): ?>
              <tr>
                <td><?= htmlspecialchars((string)$record['course_code'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$record['subject_name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$record['course_type'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$record['credits'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><span class="grade"><?= htmlspecialchars((string)$record['grade'], ENT_QUOTES, 'UTF-8') ?></span></td>
                <td><?= htmlspecialchars((string)$record['semester'], ENT_QUOTES, 'UTF-8') ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="notice"><h2>No academic records found</h2><p>Run the SQL in <code>database/schema.sql</code> and <code>database/seed.sql</code> to create and populate the table.</p></div>
      <?php endif; ?>
    <?php else: ?>
      <div class="notice"><h2>Database connection needs attention</h2><p><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p><p>Check the environment variables, RDS security group, database name, and whether the schema has been imported.</p></div>
    <?php endif; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
