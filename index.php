<?php
declare(strict_types=1);
$pageTitle = 'Home';
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
  <div class="container hero-inner">
    <span class="eyebrow">Hello, I'm</span>
    <h1>Jahnavi<br><span class="accent">Jaldu.</span></h1>
    <p class="role">Software Engineering Student <span class="accent">|</span> Aspiring Software Developer</p>
    <p class="hero-copy">I’m a Software Engineering student at VIT-AP University with a CGPA of 9.07, interested in software development, cloud computing, and Artificial Intelligence.</p>
    <div class="actions"><a class="btn btn-primary" href="academic.php">Academic Records ↗</a><a class="btn btn-outline" href="skills.php">Skills & Certifications</a></div>
  </div>
</section>
<section id="about">
  <div class="container">
    <div class="section-head"><span class="eyebrow">Get to know me</span><h2>About <span class="accent">Me</span></h2></div>
    <div class="about-layout">
      <div class="about-copy">
        <p>I’m a Software Engineering student at VIT-AP University. I enjoy solving programming problems, learning new technologies, and building practical software projects.</p>
        <p>My interests include software development, cloud computing, databases, full-stack web development, and AI-enabled applications.</p>
      </div>
      <aside class="about-card">
        <div class="info-row"><strong>University</strong><span>VIT-AP University</span></div>
        <div class="info-row"><strong>Degree</strong><span>B.Tech — Software Engineering</span></div>
        <div class="info-row"><strong>Current CGPA</strong><span>9.07</span></div>
        <div class="info-row"><strong>Interests</strong><span>Software Development · Cloud Computing · AI</span></div>
      </aside>
    </div>
  </div>
</section>
<section id="skills">
  <div class="container">
    <div class="section-head"><span class="eyebrow">What I work with</span><h2>Technical <span class="accent">Skills</span></h2></div>
    <div class="cards-grid skills-grid">
      <article class="card skill-card"><div class="card-icon">J</div><h3>Java</h3><p>Programming, object-oriented programming, and problem-solving.</p></article>
      <article class="card skill-card"><div class="card-icon">&lt;/&gt;</div><h3>Web Development</h3><p>HTML, CSS, JavaScript, PHP, and React fundamentals.</p></article>
      <article class="card skill-card"><div class="card-icon">DS</div><h3>Data Structures &amp; Algorithms</h3><p>Algorithmic thinking and coding practice.</p></article>
      <article class="card skill-card"><div class="card-icon">DB</div><h3>Databases</h3><p>SQL and database management concepts.</p></article>
      <article class="card skill-card"><div class="card-icon">PY</div><h3>Python</h3><p>Programming fundamentals and project work.</p></article>
      <article class="card skill-card"><div class="card-icon">Git</div><h3>Developer Tools</h3><p>Git, GitHub, VS Code, and development workflows.</p></article>
    </div>
    <div class="skill-note"><span class="eyebrow">Also exploring</span><p>Cloud computing · AWS · AI/ML · Full-Stack Development</p><a class="text-link" href="skills.php">View skills &amp; certifications from DynamoDB →</a></div>
  </div>
</section>
<section id="projects">
  <div class="container">
    <div class="section-head"><span class="eyebrow">What I've built and explored</span><h2>Featured <span class="accent">Projects</span></h2><p class="section-intro">A selection of academic, prototype, and personal projects.</p></div>
    <div class="cards-grid project-grid">
      <article class="card project-card"><span class="project-label">PROJECT 01</span><h3>HealthFlow</h3><p class="project-subtitle">AI-enabled healthcare coordination</p><p>A healthcare platform concept for patient records, diagnostic tracking, and hospital coordination.</p><ul><li>Organizes patient health records and report access.</li><li>Includes OPD queue tracking and estimated waiting times.</li><li>Explores AI-assisted lab report explanations.</li></ul><div class="pills"><span class="pill">React</span><span class="pill">FastAPI</span><span class="pill">Python</span><span class="pill">SQLite</span></div></article>
      <article class="card project-card"><span class="project-label">PROJECT 02</span><h3>AuraSense</h3><p class="project-subtitle">Smart sensing &amp; monitoring</p><p>A sensor-based prototype exploring presence and fall detection using mmWave radar technology.</p><ul><li>Explores radar-based presence detection.</li><li>Designed around a sensor and microcontroller workflow.</li><li>Includes a monitoring interface concept.</li></ul><div class="pills"><span class="pill">ESP32</span><span class="pill">mmWave Radar</span><span class="pill">Python</span><span class="pill">IoT</span></div></article>
      <article class="card project-card"><span class="project-label">PROJECT 03</span><h3>Women Safety App</h3><p class="project-subtitle">Safety-focused wearable concept</p><p>A women’s safety project concept using a wearable device to support emergency alerts and location-aware assistance.</p><ul><li>Explores an ESP32-based wearable prototype.</li><li>Focuses on quick access to emergency support.</li></ul><div class="pills"><span class="pill">ESP32</span><span class="pill">IoT</span><span class="pill">Safety Tech</span></div></article>
      <article class="card project-card"><span class="project-label">PROJECT 04</span><h3>DSA Journey</h3><p class="project-subtitle">Problem solving &amp; algorithms</p><p>A growing collection of coding practice focused on strengthening algorithmic thinking and Java implementation skills.</p><ul><li>Practices arrays, searching, sorting, and trees.</li><li>Works through algorithmic patterns and complexity.</li></ul><div class="pills"><span class="pill">Java</span><span class="pill">DSA</span><span class="pill">Problem Solving</span></div></article>
      <article class="card project-card"><span class="project-label">PROJECT 05</span><h3>Queue Management System</h3><p class="project-subtitle">Digital queue &amp; waiting-time tracking</p><p>A queue management concept designed to organize people waiting for service and display estimated waiting times.</p><ul><li>Tracks queue status and people waiting.</li><li>Helps users understand their position and expected wait.</li></ul><div class="pills"><span class="pill">JavaScript</span><span class="pill">Web Development</span><span class="pill">Queue Logic</span></div></article>
      <article class="card project-card"><span class="project-label">PROJECT 06</span><h3>CoolDrop Beverages</h3><p class="project-subtitle">Home-based wholesale cold-drinks business</p><p>A personal business initiative focused on supplying chilled drinks and cold drinks at wholesale-friendly prices to local customers and small businesses.</p><ul><li>Highlights beverage products and wholesale pricing.</li><li>Designed to help customers enquire about bulk orders.</li></ul><div class="pills"><span class="pill">Small Business</span><span class="pill">Wholesale</span><span class="pill">Product Catalogue</span></div></article>
    </div>
  </div>
</section>
<section id="education">
  <div class="container education-container">
    <div class="section-head"><span class="eyebrow">My academic journey</span><h2>Education</h2></div>
    <div class="timeline">
      <article class="timeline-item"><span class="timeline-date">2024 – 2028</span><h3>VIT-AP University</h3><p>B.Tech in Software Engineering</p><p class="timeline-detail">Current CGPA: <strong>9.07</strong></p></article>
      <article class="timeline-item"><span class="timeline-date">Intermediate / Class XII</span><h3>Sri Chaitanya Junior College</h3><p>Vijayawada</p><p class="timeline-detail">Percentage: <strong>98.5%</strong></p></article>
      <article class="timeline-item"><span class="timeline-date">Secondary School / Class X</span><h3>Rama Krishan Public School</h3><p>Repalle</p><p class="timeline-detail">Percentage: <strong>96%</strong></p></article>
    </div>
    <div class="academic-cta"><a class="btn btn-outline" href="academic.php">View Academic Records from RDS MySQL ↗</a></div>
  </div>
</section>
<section>
  <div class="container">
    <div class="section-head"><span class="eyebrow">Explore my profile</span><h2>Portfolio <span class="accent">Highlights</span></h2></div>
    <div class="cards-grid">
      <article class="card"><div class="card-icon">01</div><h3>Academic Records</h3><p>Structured subject records and grades loaded from Amazon RDS for MySQL.</p><a class="text-link" href="academic.php">View academic records →</a></article>
      <article class="card"><div class="card-icon">02</div><h3>Skills &amp; Certifications</h3><p>Technical skills and certification details retrieved from Amazon DynamoDB.</p><a class="text-link" href="skills.php">View skills →</a></article>
      <article class="card"><div class="card-icon">03</div><h3>AWS Cloud Project</h3><p>This portfolio is designed to run on Amazon EC2 and connect to managed AWS database services.</p><span class="muted">EC2 · RDS · DynamoDB</span></article>
    </div>
  </div>
</section>
<section id="contact">
  <div class="container"><div class="contact-box"><span class="eyebrow">Let's connect</span><h2>Get In <span class="accent">Touch</span></h2><p>Interested in technology, software development, or collaborating on a project? Feel free to reach out.</p><a class="contact-email" href="mailto:jahnavijaldu1@gmail.com">jahnavijaldu1@gmail.com</a><div class="social-links"><a href="https://github.com/jahnavijaldu1-debug" target="_blank" rel="noopener noreferrer">GitHub ↗</a><a href="https://www.linkedin.com/in/jahnavi-jaldu-b38268336/" target="_blank" rel="noopener noreferrer">LinkedIn ↗</a></div></div></div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
