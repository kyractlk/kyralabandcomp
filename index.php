<?php
require_once 'includes/functions.php';

$config = get_config();
$about = get_about();
$team = get_team_members();
$projects_ongoing = get_projects('ongoing');
$projects_ended = get_projects('ended');
$gallery = get_gallery_images();
$footer = get_footer();
$seo = get_seo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title><?php echo htmlspecialchars($seo['meta_title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($seo['meta_description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($seo['meta_keywords']); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($seo['meta_author']); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($seo['robots']); ?>">
    <meta name="language" content="<?php echo htmlspecialchars($seo['language']); ?>">
    <?php if (!empty($seo['canonical_url'])): ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($seo['canonical_url']); ?>">
    <?php endif; ?>
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($seo['og_title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seo['og_description']); ?>">
    <?php if (!empty($seo['og_image'])): ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($seo['og_image']); ?>">
    <?php endif; ?>
    <?php if (!empty($seo['og_url'])): ?>
    <meta property="og:url" content="<?php echo htmlspecialchars($seo['og_url']); ?>">
    <?php endif; ?>
    
    <!-- Twitter -->
    <meta name="twitter:card" content="<?php echo htmlspecialchars($seo['twitter_card']); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($seo['twitter_title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seo['twitter_description']); ?>">
    <?php if (!empty($seo['twitter_image'])): ?>
    <meta name="twitter:image" content="<?php echo htmlspecialchars($seo['twitter_image']); ?>">
    <?php endif; ?>
    
    <!-- Site Verification -->
    <?php if (!empty($seo['google_site_verification'])): ?>
    <meta name="google-site-verification" content="<?php echo htmlspecialchars($seo['google_site_verification']); ?>">
    <?php endif; ?>
    <?php if (!empty($seo['bing_site_verification'])): ?>
    <meta name="msvalidate.01" content="<?php echo htmlspecialchars($seo['bing_site_verification']); ?>">
    <?php endif; ?>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo htmlspecialchars($seo['favicon']); ?>">
    <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($seo['apple_touch_icon']); ?>">
    
    <!-- Stylesheets -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        <?php echo generate_theme_css($config['theme']); ?>
        
        .bg-primary { background-color: rgb(var(--color-primary)); }
        .bg-secondary { background-color: rgb(var(--color-secondary)); }
        .bg-accent { background-color: rgb(var(--color-accent)); }
        .text-primary { color: rgb(var(--color-primary)); }
        .text-secondary { color: rgb(var(--color-secondary)); }
        .text-accent { color: rgb(var(--color-accent)); }
        .border-primary { border-color: rgb(var(--color-primary)); }
        
        .hover\:bg-primary:hover { background-color: rgb(var(--color-primary)); }
        .hover\:text-primary:hover { color: rgb(var(--color-primary)); }
        
        /* Hero gradient using theme colors */
        .hero-gradient {
            background: linear-gradient(
                135deg,
                rgba(var(--color-primary), 0.1) 0%,
                rgba(var(--color-accent), 0.08) 50%,
                rgba(var(--color-secondary), 0.1) 100%
            );
        }
        
        /* Hero blobs using theme colors */
        .hero-blob-1 {
            background-color: rgba(var(--color-primary), 0.3);
        }
        
        .hero-blob-2 {
            background-color: rgba(var(--color-secondary), 0.3);
        }
        
        .hero-blob-3 {
            background-color: rgba(var(--color-accent), 0.3);
        }
        
        html { 
            scroll-behavior: smooth;
        }
        
        /* Smooth scroll with custom behavior */
        @media (prefers-reduced-motion: no-preference) {
            html {
                scroll-behavior: smooth;
            }
        }
        
        /* Mobile optimizations */
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }
        
        /* Hero Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .hero-title {
            animation: fadeInDown 1s ease-out;
        }
        
        .hero-subtitle {
            animation: fadeInDown 1.2s ease-out;
        }
        
        .hero-button {
            animation: fadeInUp 1.4s ease-out;
        }
        
        /* Scroll animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .scroll-animate.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .scroll-animate-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .scroll-animate-left.animate-in {
            opacity: 1;
            transform: translateX(0);
        }
        
        .scroll-animate-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .scroll-animate-right.animate-in {
            opacity: 1;
            transform: translateX(0);
        }
        
        .scroll-animate-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .scroll-animate-scale.animate-in {
            opacity: 1;
            transform: scale(1);
        }
        
        /* Smooth transitions */
        .project-card, .team-card, .gallery-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        /* Disable hover effects on touch devices */
        @media (hover: hover) and (pointer: fine) {
            .project-card:hover, .team-card:hover, .gallery-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            }
        }
        
        /* Mobile menu animation */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }
        
        #mobile-menu.active {
            max-height: 500px;
        }
        
        /* Modal improvements */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.8);
            padding: 1rem;
        }
        
        .modal.active { 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            margin: auto;
            max-width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        /* Hide scrollbar but keep functionality */
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        
        /* Mobile text sizing */
        @media (max-width: 640px) {
            .modal-content {
                max-width: 95%;
                max-height: 85vh;
            }
            
            /* Better touch targets */
            button, a {
                min-height: 44px;
                min-width: 44px;
            }
        }
        
        /* Prevent text size adjustment on mobile */
        * {
            -webkit-text-size-adjust: 100%;
            -moz-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="container mx-auto px-4 py-3 md:py-4">
            <div class="flex justify-between items-center">
                <div class="text-xl md:text-2xl font-bold text-primary truncate max-w-[60%] md:max-w-none">
                    <?php echo htmlspecialchars($config['site_title']); ?>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="hover:text-primary transition">Home</a>
                    <?php if ($config['active_pages']['team']): ?>
                        <a href="#team" class="hover:text-primary transition">Team</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['about']): ?>
                        <a href="#about" class="hover:text-primary transition">About</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['projects']): ?>
                        <a href="#projects" class="hover:text-primary transition">Projects</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['gallery']): ?>
                        <a href="#gallery" class="hover:text-primary transition">Gallery</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['contact']): ?>
                        <a href="#contact" class="hover:text-primary transition">Contact</a>
                    <?php endif; ?>
                </div>
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 p-2 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden overflow-hidden">
                <div class="pt-4 pb-2 space-y-1">
                    <a href="#home" class="mobile-menu-link block py-3 px-4 hover:bg-gray-100 rounded-lg hover:text-primary transition">Home</a>
                    <?php if ($config['active_pages']['team']): ?>
                        <a href="#team" class="mobile-menu-link block py-3 px-4 hover:bg-gray-100 rounded-lg hover:text-primary transition">Team</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['about']): ?>
                        <a href="#about" class="mobile-menu-link block py-3 px-4 hover:bg-gray-100 rounded-lg hover:text-primary transition">About</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['projects']): ?>
                        <a href="#projects" class="mobile-menu-link block py-3 px-4 hover:bg-gray-100 rounded-lg hover:text-primary transition">Projects</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['gallery']): ?>
                        <a href="#gallery" class="mobile-menu-link block py-3 px-4 hover:bg-gray-100 rounded-lg hover:text-primary transition">Gallery</a>
                    <?php endif; ?>
                    <?php if ($config['active_pages']['contact']): ?>
                        <a href="#contact" class="mobile-menu-link block py-3 px-4 hover:bg-gray-100 rounded-lg hover:text-primary transition">Contact</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center hero-gradient relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Primary blob cluster -->
            <div class="absolute top-10 right-20 w-96 h-96 hero-blob-1 rounded-full mix-blend-multiply filter blur-2xl opacity-60 animate-blob"></div>
            <div class="absolute top-32 right-40 w-64 h-64 hero-blob-1 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-blob animation-delay-1000"></div>
            
            <!-- Secondary blob cluster -->
            <div class="absolute bottom-20 left-10 w-80 h-80 hero-blob-2 rounded-full mix-blend-multiply filter blur-2xl opacity-60 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-40 left-32 w-72 h-72 hero-blob-2 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob animation-delay-3500"></div>
            
            <!-- Accent blob cluster -->
            <div class="absolute top-1/3 left-1/4 w-88 h-88 hero-blob-3 rounded-full mix-blend-multiply filter blur-2xl opacity-50 animate-blob animation-delay-4000"></div>
            <div class="absolute top-1/2 right-1/3 w-64 h-64 hero-blob-3 rounded-full mix-blend-multiply filter blur-xl opacity-45 animate-blob animation-delay-5500"></div>
            
            <!-- Additional floating blobs for more depth -->
            <div class="absolute top-2/3 right-1/4 w-56 h-56 hero-blob-1 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob-reverse animation-delay-1500"></div>
            <div class="absolute bottom-1/3 left-1/2 w-60 h-60 hero-blob-2 rounded-full mix-blend-multiply filter blur-xl opacity-35 animate-blob-reverse animation-delay-3000"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10 py-20">
            <h1 class="hero-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold mb-6 md:mb-8 text-gray-900 leading-tight tracking-tight">
                <?php echo htmlspecialchars($config['site_title']); ?>
            </h1>
            <p class="hero-subtitle text-lg sm:text-xl md:text-2xl lg:text-3xl mb-8 md:mb-12 text-gray-700 max-w-4xl mx-auto px-4 font-light leading-relaxed">
                <?php echo htmlspecialchars($config['site_description']); ?>
            </p>
            <a href="#team" class="hero-button inline-flex items-center gap-3 bg-primary text-white px-8 sm:px-10 py-4 sm:py-5 rounded-full text-lg sm:text-xl font-semibold hover:opacity-90 hover:scale-105 transition-all duration-300 active:scale-95 shadow-xl hover:shadow-2xl">
                <span>Explore</span>
                <i class="fas fa-arrow-down animate-bounce"></i>
            </a>
        </div>
    </section>
    
    <style>
        @keyframes blob {
            0%, 100% { 
                transform: translate(0px, 0px) scale(1) rotate(0deg);
            }
            25% { 
                transform: translate(40px, -60px) scale(1.15) rotate(90deg);
            }
            50% { 
                transform: translate(-30px, 40px) scale(0.95) rotate(180deg);
            }
            75% { 
                transform: translate(50px, 30px) scale(1.05) rotate(270deg);
            }
        }
        
        @keyframes blob-reverse {
            0%, 100% { 
                transform: translate(0px, 0px) scale(1) rotate(0deg);
            }
            25% { 
                transform: translate(-40px, 60px) scale(0.9) rotate(-90deg);
            }
            50% { 
                transform: translate(30px, -40px) scale(1.1) rotate(-180deg);
            }
            75% { 
                transform: translate(-50px, -30px) scale(0.95) rotate(-270deg);
            }
        }
        
        .animate-blob {
            animation: blob 12s infinite ease-in-out;
        }
        
        .animate-blob-reverse {
            animation: blob-reverse 15s infinite ease-in-out;
        }
        
        .animation-delay-1000 { animation-delay: 1s; }
        .animation-delay-1500 { animation-delay: 1.5s; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-3000 { animation-delay: 3s; }
        .animation-delay-3500 { animation-delay: 3.5s; }
        .animation-delay-4000 { animation-delay: 4s; }
        .animation-delay-5500 { animation-delay: 5.5s; }
    </style>

    <?php if ($config['active_pages']['team']): ?>
    <!-- Team Section -->
    <section id="team" class="py-20 bg-white scroll-animate">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">Our Team</h2>
            <div class="relative">
                <div id="team-scroll" class="flex gap-6 overflow-x-auto scroll-smooth pb-4 hide-scrollbar">
                    <?php foreach ($team as $member): ?>
                        <div class="team-card bg-gray-50 rounded-lg shadow-lg overflow-hidden text-center flex-shrink-0 w-[280px] md:w-[320px]">
                            <?php if (!empty($member['image'])): ?>
                                <img src="<?php echo htmlspecialchars($member['image']); ?>" alt="<?php echo htmlspecialchars($member['name']); ?>" class="w-full h-48 object-cover">
                            <?php else: ?>
                                <div class="w-full h-48 bg-gradient-to-br from-indigo-400 to-purple-600 flex items-center justify-center">
                                    <i class="fas fa-user text-white text-6xl"></i>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <h4 class="text-xl font-bold mb-1"><?php echo htmlspecialchars($member['name']); ?></h4>
                                <p class="text-primary font-semibold mb-3"><?php echo htmlspecialchars($member['title']); ?></p>
                                <p class="text-gray-600 mb-4 text-sm"><?php echo htmlspecialchars($member['bio']); ?></p>
                                <div class="flex justify-center space-x-4">
                                    <?php if (!empty($member['linkedin'])): ?>
                                        <a href="<?php echo htmlspecialchars($member['linkedin']); ?>" target="_blank" class="text-blue-600 hover:text-blue-800 text-xl">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($member['email'])): ?>
                                        <a href="mailto:<?php echo htmlspecialchars($member['email']); ?>" class="text-gray-600 hover:text-gray-800 text-xl">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($config['active_pages']['about']): ?>
    <!-- About Section -->
    <section id="about" class="py-12 md:py-20 bg-gray-50 scroll-animate">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-8 md:mb-12 text-gray-900"><?php echo htmlspecialchars($about['title']); ?></h2>
            <div class="max-w-4xl mx-auto">
                <h3 class="text-2xl font-semibold mb-4 text-primary"><?php echo htmlspecialchars($about['subtitle']); ?></h3>
                <div class="text-lg text-gray-700 mb-8 whitespace-pre-line"><?php echo htmlspecialchars($about['content']); ?></div>
                
                <div class="grid md:grid-cols-2 gap-8 mt-12">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h4 class="text-xl font-bold mb-3 text-primary">Our Mission</h4>
                        <p class="text-gray-700"><?php echo htmlspecialchars($about['mission']); ?></p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h4 class="text-xl font-bold mb-3 text-primary">Our Vision</h4>
                        <p class="text-gray-700"><?php echo htmlspecialchars($about['vision']); ?></p>
                    </div>
                </div>
                
                <?php if (!empty($about['values'])): ?>
                <div class="mt-12">
                    <h4 class="text-2xl font-bold mb-6 text-center">Our Values</h4>
                    <div class="grid md:grid-cols-3 gap-4">
                        <?php foreach ($about['values'] as $value): ?>
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-check-circle text-secondary text-2xl mb-2"></i>
                                <p class="font-semibold"><?php echo htmlspecialchars($value); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($config['active_pages']['projects']): ?>
    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-white scroll-animate">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">Our Projects</h2>
            
            <?php 
            // Merge ongoing and ended projects into one array
            $all_projects = array_merge($projects_ongoing, $projects_ended);
            if (!empty($all_projects)): 
            ?>
            <div class="relative">
                <div id="projects-all-scroll" class="flex gap-6 overflow-x-auto scroll-smooth pb-4 hide-scrollbar">
                    <?php foreach ($all_projects as $project): ?>
                        <div class="project-card bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer flex-shrink-0 w-[280px] md:w-[350px]" onclick="openProjectModal(<?php echo $project['id']; ?>)">
                            <?php if (!empty($project['image'])): ?>
                                <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="w-full h-48 object-cover">
                            <?php else: ?>
                                <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-indigo-600"></div>
                            <?php endif; ?>
                            <div class="p-6">
                                <h4 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($project['title']); ?></h4>
                                <p class="text-gray-600 mb-4 line-clamp-3 text-sm"><?php echo htmlspecialchars($project['description']); ?></p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">
                                        <?php if (!empty($project['end_date'])): ?>
                                            <?php echo date('M Y', strtotime($project['start_date'])); ?> - <?php echo date('M Y', strtotime($project['end_date'])); ?>
                                        <?php else: ?>
                                            Since <?php echo date('M Y', strtotime($project['start_date'])); ?>
                                        <?php endif; ?>
                                    </span>
                                    <span class="<?php echo empty($project['end_date']) ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'; ?> px-3 py-1 rounded-full text-sm font-semibold">
                                        <?php echo empty($project['end_date']) ? 'Ongoing' : 'Completed'; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($config['active_pages']['gallery']): ?>
    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-gray-50 scroll-animate">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">Gallery</h2>
            <div id="gallery-scroll" class="flex gap-4 overflow-x-auto scroll-smooth pb-4 hide-scrollbar">
                <?php foreach ($gallery as $image): ?>
                    <div class="gallery-item rounded-lg overflow-hidden shadow-lg cursor-pointer flex-shrink-0 w-[280px] md:w-[320px]" onclick="openGalleryModal('<?php echo htmlspecialchars($image['image']); ?>', '<?php echo htmlspecialchars($image['title']); ?>')">
                        <?php if (!empty($image['image'])): ?>
                            <img src="<?php echo htmlspecialchars($image['image']); ?>" alt="<?php echo htmlspecialchars($image['title']); ?>" class="w-full h-48 object-cover">
                        <?php endif; ?>
                        <div class="p-4 bg-white">
                            <h5 class="font-semibold"><?php echo htmlspecialchars($image['title']); ?></h5>
                            <?php if (!empty($image['description'])): ?>
                                <p class="text-sm text-gray-600"><?php echo htmlspecialchars($image['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($config['active_pages']['contact']): ?>
    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white scroll-animate">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">Contact Us</h2>
            <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-6">Get in Touch</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary text-xl mr-4 mt-1"></i>
                            <div>
                                <p class="font-semibold">Address</p>
                                <p class="text-gray-600"><?php echo htmlspecialchars($config['address']); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-primary text-xl mr-4 mt-1"></i>
                            <div>
                                <p class="font-semibold">Phone</p>
                                <p class="text-gray-600"><?php echo htmlspecialchars($config['contact_phone']); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-primary text-xl mr-4 mt-1"></i>
                            <div>
                                <p class="font-semibold">Email</p>
                                <p class="text-gray-600"><?php echo htmlspecialchars($config['contact_email']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form class="space-y-4">
                        <input type="text" placeholder="Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                        <input type="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                        <textarea placeholder="Message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"></textarea>
                        <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h4 class="text-xl font-bold mb-4"><?php echo htmlspecialchars($config['site_title']); ?></h4>
                    <p class="text-gray-400"><?php echo htmlspecialchars($config['site_description']); ?></p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Quick Links</h4>
                    <div class="space-y-2">
                        <?php foreach ($footer['quick_links'] as $link): ?>
                            <a href="<?php echo htmlspecialchars($link['url']); ?>" class="block text-gray-400 hover:text-white transition"><?php echo htmlspecialchars($link['title']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <?php if (!empty($footer['social_links']['twitter'])): ?>
                            <a href="<?php echo htmlspecialchars($footer['social_links']['twitter']); ?>" target="_blank" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($footer['social_links']['linkedin'])): ?>
                            <a href="<?php echo htmlspecialchars($footer['social_links']['linkedin']); ?>" target="_blank" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($footer['social_links']['facebook'])): ?>
                            <a href="<?php echo htmlspecialchars($footer['social_links']['facebook']); ?>" target="_blank" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($footer['social_links']['instagram'])): ?>
                            <a href="<?php echo htmlspecialchars($footer['social_links']['instagram']); ?>" target="_blank" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <?php echo htmlspecialchars($footer['copyright']); ?>
            </div>
        </div>
    </footer>

    <!-- Project Modal -->
    <div id="project-modal" class="modal items-center justify-center">
        <div class="modal-content bg-white rounded-lg max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-4 md:p-8">
                <div class="flex justify-between items-start gap-4 mb-6">
                    <h3 id="project-modal-title" class="text-2xl md:text-3xl font-bold flex-1 break-words"></h3>
                    <button onclick="closeProjectModal()" class="text-gray-500 hover:text-gray-700 text-3xl flex-shrink-0 -mt-1">&times;</button>
                </div>
                <div id="project-modal-content"></div>
            </div>
        </div>
    </div>

    <!-- Gallery Modal -->
    <div id="gallery-modal" class="modal items-center justify-center">
        <div class="modal-content">
            <button onclick="closeGalleryModal()" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">&times;</button>
            <img id="gallery-modal-img" src="" alt="" class="max-w-full max-h-screen">
        </div>
    </div>

    <script>
        // Mobile menu toggle with animation
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');
        
        mobileMenuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            mobileMenu.classList.toggle('active');
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });
        
        // Close mobile menu when clicking a link
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            });
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileMenu.classList.remove('active');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        });

        // Project data
        const projectsData = <?php echo json_encode(array_merge($projects_ongoing, $projects_ended)); ?>;
        const teamData = <?php echo json_encode($team); ?>;

        function openProjectModal(projectId) {
            try {
                // Convert to string for comparison since JSON IDs might be strings
                const project = projectsData.find(p => p.id == projectId);
                if (!project) {
                    console.error('Project not found:', projectId, 'Available projects:', projectsData);
                    return;
                }

                document.getElementById('project-modal-title').textContent = project.title;
            
            let content = `
                <div class="mb-6">
                    ${project.image ? `<img src="${project.image}" alt="${project.title}" class="w-full h-64 object-cover rounded-lg mb-4">` : ''}
                    <p class="text-gray-700 text-lg mb-4">${project.description}</p>
                    <div class="flex gap-4 mb-4">
                        <span class="text-sm text-gray-600">Start: ${new Date(project.start_date).toLocaleDateString()}</span>
                        ${project.end_date ? `<span class="text-sm text-gray-600">End: ${new Date(project.end_date).toLocaleDateString()}</span>` : ''}
                    </div>
                </div>
            `;

            // Show articles if available
            if (project.articles && project.articles.length > 0) {
                content += `
                    <div class="mb-6">
                        <h4 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                            Research Articles
                        </h4>
                        <div class="space-y-3">
                `;
                
                project.articles.forEach(article => {
                    content += `
                        <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                            <div class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3 flex-1">
                                    <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-lg">${article.title}</h5>
                                        <p class="text-sm text-gray-500">Uploaded: ${new Date(article.uploaded_at).toLocaleDateString()}</p>
                                    </div>
                                </div>
                                <a href="${article.file}" target="_blank" class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-90 transition whitespace-nowrap">
                                    <i class="fas fa-external-link-alt mr-2"></i>View PDF
                                </a>
                            </div>
                        </div>
                    `;
                });
                
                content += `
                        </div>
                    </div>
                `;
            } 
            // Fallback to old single PDF if articles not available
            else if (project.pdf) {
                content += `
                    <div class="mb-6">
                        <h4 class="text-xl font-bold mb-3">Research Paper</h4>
                        <!-- Show iframe only on desktop (768px+) -->
                        <iframe src="${project.pdf}" class="hidden md:block w-full h-96 border rounded-lg mb-2"></iframe>
                        <a href="${project.pdf}" target="_blank" class="inline-block mt-2 bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition">
                            <i class="fas fa-external-link-alt mr-2"></i>Open PDF in New Tab
                        </a>
                    </div>
                `;
            }

            if (project.team_members && project.team_members.length > 0) {
                content += `
                    <div class="mb-6">
                        <h4 class="text-xl font-bold mb-3">Team Members</h4>
                        <div class="flex gap-4 overflow-x-auto scroll-smooth pb-2 hide-scrollbar">
                `;
                project.team_members.forEach(memberId => {
                    const member = teamData.find(m => m.id === memberId);
                    if (member) {
                        content += `
                            <div class="text-center flex-shrink-0 w-[120px]">
                                ${member.image ? `<img src="${member.image}" alt="${member.name}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">` : `<div class="w-20 h-20 rounded-full mx-auto mb-2 bg-gray-300 flex items-center justify-center"><i class="fas fa-user text-gray-600"></i></div>`}
                                <p class="font-semibold text-sm">${member.name}</p>
                                <p class="text-xs text-gray-600">${member.title}</p>
                                ${member.linkedin ? `<a href="${member.linkedin}" target="_blank" class="text-blue-600 text-sm"><i class="fab fa-linkedin"></i></a>` : ''}
                            </div>
                        `;
                    }
                });
                content += `</div></div>`;
            }

            if (project.external_members && project.external_members.length > 0) {
                content += `
                    <div class="mb-6">
                        <h4 class="text-xl font-bold mb-3">External Collaborators</h4>
                        <div class="flex gap-4 overflow-x-auto scroll-smooth pb-2 hide-scrollbar">
                `;
                project.external_members.forEach(member => {
                    content += `
                        <div class="text-center flex-shrink-0 w-[120px]">
                            <div class="w-20 h-20 rounded-full mx-auto mb-2 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user-tie text-gray-500"></i>
                            </div>
                            <p class="font-semibold text-sm">${member.name}</p>
                            ${member.linkedin ? `<a href="${member.linkedin}" target="_blank" class="text-blue-600 text-sm"><i class="fab fa-linkedin"></i></a>` : ''}
                        </div>
                    `;
                });
                content += `</div></div>`;
            }

                document.getElementById('project-modal-content').innerHTML = content;
                document.getElementById('project-modal').classList.add('active');
            } catch (error) {
                console.error('Error opening project modal:', error);
                alert('Error loading project details. Please try again.');
            }
        }

        function closeProjectModal() {
            document.getElementById('project-modal').classList.remove('active');
        }

        function openGalleryModal(imageSrc, title) {
            document.getElementById('gallery-modal-img').src = imageSrc;
            document.getElementById('gallery-modal-img').alt = title;
            document.getElementById('gallery-modal').classList.add('active');
        }

        function closeGalleryModal() {
            document.getElementById('gallery-modal').classList.remove('active');
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const projectModal = document.getElementById('project-modal');
            const galleryModal = document.getElementById('gallery-modal');
            if (event.target === projectModal) {
                closeProjectModal();
            }
            if (event.target === galleryModal) {
                closeGalleryModal();
            }
        }
        
        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);
        
        // Observe all elements with scroll animation classes
        document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale').forEach(el => {
            observer.observe(el);
        });
        
        // Stagger animation for cards
        const animateCards = () => {
            const cards = document.querySelectorAll('.project-card, .team-card, .gallery-item');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        };
        
        // Run on load
        window.addEventListener('load', animateCards);
        
        // Smooth scroll with custom duration
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                    const startPosition = window.pageYOffset;
                    const distance = targetPosition - startPosition;
                    const duration = 200; // 300ms - faster and snappier
                    let start = null;
                    
                    function animation(currentTime) {
                        if (start === null) start = currentTime;
                        const timeElapsed = currentTime - start;
                        const run = ease(timeElapsed, startPosition, distance, duration);
                        window.scrollTo(0, run);
                        if (timeElapsed < duration) requestAnimationFrame(animation);
                    }
                    
                    function ease(t, b, c, d) {
                        t /= d / 2;
                        if (t < 1) return c / 2 * t * t + b;
                        t--;
                        return -c / 2 * (t * (t - 2) - 1) + b;
                    }
                    
                    requestAnimationFrame(animation);
                }
            });
        });

        // Mouse wheel horizontal scroll for projects and team sections
        function enableMouseWheelScroll(elementId) {
            const element = document.getElementById(elementId);
            if (!element) return;
            
            element.addEventListener('wheel', (e) => {
                // Check if there's horizontal overflow
                if (element.scrollWidth > element.clientWidth) {
                    e.preventDefault();
                    // Convert vertical scroll to horizontal
                    element.scrollLeft += e.deltaY;
                }
            }, { passive: false });
        }
        
        // Enable mouse wheel scroll for projects, team, and gallery
        enableMouseWheelScroll('projects-all-scroll');
        enableMouseWheelScroll('team-scroll');
        enableMouseWheelScroll('gallery-scroll');
    </script>
</body>
</html>

