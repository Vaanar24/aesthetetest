<?php
// Function to handle Portfolio display with fallback
function scanPortfolio() {
    $dir = 'portfolio/';
    if (!is_dir($dir)) return getMockPortfolio();
    $files = glob($dir . "*.{jpg,jpeg,png,webp}", GLOB_BRACE);
    if (empty($files)) return getMockPortfolio();

    $html = "";
    foreach($files as $file) {
        $name = basename($file);
        $displayName = str_replace(['_', '-', '.jpg', '.png'], ' ', $name);
        
        $html .= "
        <div class='bento-card'>
            <img src='$file' alt='$displayName' class='portfolio-img'>
            <div>
                <p style='font-size: 12px; font-weight: 700; color: var(--accent); letter-spacing: 1px; margin-bottom:8px;'>CASE STUDY</p>
                <div style='font-size: 22px; font-weight: 600;'>$displayName</div>
            </div>
        </div>";
    }
    return $html;
}

function getMockPortfolio() {
    return "
    <div class='bento-card'>
        <div style='background: #f3f0ff; height: 260px; width:100%; border-radius:16px; display:flex; align-items:center; justify-content:center; color:#8b5cf6;'>Image Placeholder</div>
        <div>
            <p style='font-size: 12px; font-weight: 700; color: var(--accent); letter-spacing: 1px; margin-bottom:8px;'>FASHION</p>
            <div style='font-size: 22px; font-weight: 600;'>Velvet & Vine Rebrand</div>
            <p style='margin-top:10px; font-size:16px;'>Increased D2C sales by 140% through organic social scaling.</p>
        </div>
    </div>
    <div class='bento-card'>
        <div style='background: #f3f0ff; height: 260px; width:100%; border-radius:16px; display:flex; align-items:center; justify-content:center; color:#8b5cf6;'>Image Placeholder</div>
        <div>
            <p style='font-size: 12px; font-weight: 700; color: var(--accent); letter-spacing: 1px; margin-bottom:8px;'>TECH</p>
            <div style='font-size: 22px; font-weight: 600;'>Aura App Launch</div>
            <p style='margin-top:10px; font-size:16px;'>Top 10 App Store debut with a 3-week influencer sprint.</p>
        </div>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthete Digital | Boutique Marketing Firm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <div class="nav-content">
            <div class="logo">Aesthete.</div>
            <ul class="nav-links">
                <li><a href="#" class="nav-link active" data-target="home">Studio</a></li>
                <li><a href="#" class="nav-link" data-target="expertise">Expertise</a></li>
                <li><a href="#" class="nav-link" data-target="work">Selected Work</a></li>
                <li><a href="#" class="nav-link" data-target="contact">Inquire</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <section id="home" class="active">
            <div class="hero">
                <h1>We curate digital<br>experiences that <span>resonate.</span></h1>
                <p style="max-width: 580px; margin: 0 auto;">
                    Aesthete is a boutique digital consultancy. We blend data science with elegant design to help premium brands find their voice in a noisy world.
                </p>
                <a href="#" class="cta-button nav-trigger" data-target="contact">Schedule a Consultation</a>
            </div>

            <div class="bento-grid">
                <div class="bento-card highlight">
                    <h3>Holistic Growth</h3>
                    <p>We don't just chase clicks. We build sustainable ecosystems where brand loyalty flourishes organically.</p>
                </div>
                <div class="bento-card">
                    <h3>Visual Harmony</h3>
                    <p>Our in-house design team ensures every pixel aligns with your brand's unique aesthetic identity.</p>
                </div>
                <div class="bento-card">
                    <h3>Transparency First</h3>
                    <p>Real-time dashboards. Honest reporting. No hidden fees. You see exactly where every dollar goes.</p>
                </div>
            </div>
        </section>

        <section id="expertise">
            <div style="text-align: center; padding: 80px 20px 40px;">
                <p style="color: var(--accent); font-weight: 600; letter-spacing: 1px; margin-bottom: 10px;">CAPABILITIES</p>
                <h2>Crafted for Conversion.</h2>
            </div>
            <div class="bento-grid">
                <div class="bento-card">
                    <h3>Paid Acquisition</h3>
                    <p>High-precision campaigns on Meta, Google, and TikTok designed to lower CAC and maximize ROAS.</p>
                </div>
                <div class="bento-card highlight">
                    <h3>Content Strategy</h3>
                    <p>From editorial blogs to cinematic video production, we tell stories that compel audiences to act.</p>
                </div>
                <div class="bento-card">
                    <h3>Email & Retention</h3>
                    <p>Turn one-time buyers into lifetime advocates with personalized automation flows.</p>
                </div>
                <div class="bento-card">
                    <h3>SEO & Authority</h3>
                    <p>Technical auditing and white-hat link building to secure your place at the top of search results.</p>
                </div>
            </div>
        </section>

        <section id="work">
            <div style="text-align: center; padding: 80px 20px 40px;">
                <p style="color: var(--accent); font-weight: 600; letter-spacing: 1px; margin-bottom: 10px;">PORTFOLIO</p>
                <h2>Recent Success Stories.</h2>
            </div>
            <div class="bento-grid">
                <?php echo scanPortfolio(); ?>
            </div>
        </section>

        <section id="contact">
            <div class="form-wrapper">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h2>Let's Create Together.</h2>
                    <p>Accepting new partnerships for Q3 2025.</p>
                </div>
                
                <form>
                    <input type="text" placeholder="Your Name or Company" required>
                    <input type="email" placeholder="Email Address" required>
                    <select required style="color: var(--text-muted);">
                        <option value="" disabled selected>How can we help?</option>
                        <option>Brand Re-design</option>
                        <option>Marketing Retainer</option>
                        <option>One-off Campaign</option>
                        <option>Other</option>
                    </select>
                    <textarea rows="5" placeholder="Tell us a bit about your goals..." required></textarea>
                    <button type="submit" class="cta-button" style="width: 100%; border: none; cursor: pointer;">Send Inquiry</button>
                </form>

                <div style="text-align: center; margin-top: 40px; color: var(--text-muted); font-size: 14px;">
                    <p>Prefer email? <a href="mailto:hello@aesthete.agency" style="color: var(--accent); text-decoration: none;">hello@aesthete.agency</a></p>
                    <p style="margin-top: 10px;">New York • London • Tokyo</p>
                </div>
            </div>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>