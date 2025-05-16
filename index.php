<?php

session_start();

// if (isset($_SESSION['username'])) {
//     echo "Hello, " . $_SESSION['username'] . "! You are logged in.";
// } else {
//     echo "You are not logged in.";
// }


     $title = "Site";
    $navLinks = [
        "index.php" => "Home",
        "experts.php" => "Experts",
        "products.php" => "Products",
        "contact.php" => "Contact"
    ];
    
    $profiles = [
    ];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./css/mystyle.css">
    <script> document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".contact a").forEach(link => {
        link.addEventListener("mouseenter", (e) => {
            const id = link.getAttribute("href").split("/").pop().replace(".html", "");
            const profileBox = document.getElementById(id);
            if (profileBox) {
                profileBox.style.display = "block";
                profileBox.style.left = `${e.pageX + 10}px`;
                profileBox.style.top = `${e.pageY + 10}px`;
            }
        });

        link.addEventListener("mouseleave", () => {
            const id = link.getAttribute("href").split("/").pop().replace(".html", "");
            const profileBox = document.getElementById(id);
            if (profileBox) {
                profileBox.style.display = "none";
            }
        });
    });
});
</script>
    <style>
        .profile-box {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px;
            z-index: 1000;
        }
        .profile-box img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        $(document).ready(function() {
            $(".profile-box").draggable({
                containment: "window",
                scroll: false
            });
        });
    </script> 
</head>
<body>
    <header>
    <nav class="topnav">
    <br>
    <a href="login.php">
        <img src="css/logos/logo.png" alt="Logo" class="logo">
    </a>
    <?php foreach ($navLinks as $link => $name): ?>
        <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
    <?php endforeach; ?>


    <span style="float: left; padding-left: 20px; font-weight: bold;">
        <?php
        if (isset($_SESSION['username'])) {
            echo "Hello, " . htmlspecialchars($_SESSION['username']) . "!";
        } else {
            echo "You are not logged in.";
        }
        ?>
    </span>
</nav>

        <br><br><br><br><br><br>
        <br>
        <h1 class="welcome">Leave Your Pet in Safe Hands – Expert Animal Care While You’re Away</h1>
    </header>
    <main>
        <h2 style="text-align: center; width: 50%; margin: auto;">
            Going on vacation? Busy with work? Our trusted pet sitters provide top-quality care for your furry (or feathery) friend while you're away. Because your pet deserves the best!
        </h2>
        <br><br>
        <div class="HIW">
            <h2>How It Works</h2>
            <ul>
                <li><strong>Tell Us About Your Pet:</strong> Let us know what kind of care your pet needs.</li>
                <li><strong>Get Matched with a Trusted Sitter:</strong> We connect you with experienced pet sitters.</li>
                <li><strong>Relax While We Care for Your Pet:</strong> Get updates and photos straight to your phone.</li>
            </ul>
        </div>
        <br><br>
        <div class="WCU">
            <h2>Why Choose Us?</h2>
            <ul>
                <li><strong>Experienced & Loving Sitters:</strong> Our sitters are carefully vetted.</li>
                <li><strong>Safe & Comfortable Environment:</strong> Stress-free setting for your pet.</li>
                <li><strong>Regular Updates & Check-ins:</strong> Receive photos, videos, and updates.</li>
                <li><strong>Emergency Support:</strong> Sitters have basic pet first aid training.</li>
            </ul>
        </div>
    </main>
    <br><br>
<!-- //   refresh buttons -->
    <div class="profile-controls">
    <button id="refreshBtn">Refresh Profiles</button>
    <div class="nav-arrows">
        <button id="prevBtn" class="nav-arrow">&lt;</button>
        <div class="contact" id="ajaxProfiles"></div>
    </div>
        <button id="nextBtn" class="nav-arrow">&gt;</button>
    </div>
</div>



<!-- // for profile -->

    <?php foreach ($profiles as $profile): ?>
        <div id="<?php echo $profile['id']; ?>" class="profile-box" id="profile-box">
            <h3><?php echo $profile['name']; ?></h3>
            <?php if (isset($profile['price'])): ?><p><?php echo $profile['price']; ?></p><?php endif; ?>
            <?php if (isset($profile['experience'])): ?><p>Experience: <?php echo $profile['experience']; ?></p><?php endif; ?>
            <?php if (isset($profile['location'])): ?><p>Location: <?php echo $profile['location']; ?></p><?php endif; ?>
            <?php if (isset($profile['preferences'])): ?><p>Preferences: <?php echo $profile['preferences']; ?></p><?php endif; ?>
            <img src="<?php echo $profile['image']; ?>">
        </div>
    <?php endforeach; ?>
    <div class="testimonials">
        <h2>What Our Clients Say</h2>
        <ul>
            <li>I was nervous about leaving my dog, but the sitter sent me daily pictures and updates. - Emma J.</li>
            <li>My cat bonded with the sitter immediately. I’ll definitely use this service again! - Mark T.</li>
        </ul>
    </div>
    <br><br>
    <div class="form">
        <h2>Subscribe to news</h2>
        <form action="send_email.php" method="post">
            <label for="email">Your Email:</label>
            <br><br>
            <input type="email" id="email" name="email" required>
            <br><br>
            <button type="submit">Subscribe!</button>
            <br><br>
        </form>
    </div>
    <br><br>
    <footer>
        <div class="links">
            <a href="https://www.facebook.com" target="_blank">
                <img class="logos" src="css/logos/Facebook_Logo_Primary.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img class="logos" src="css/logos/Instagram_Glyph_Gradient.png" alt="Instagram">
            </a>
            <a href="https://www.youtube.com" target="_blank">
                <img class="logos" src="css/logos/yt_logo_rgb_light.png" alt="YouTube">
            </a>
        </div>
    </footer>
    <script src="./js/profileSlider.js"></script>
</body>
</html> 


